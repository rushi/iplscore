<?php
require_once 'config.php';
require_once 'lang.php';
require_once 'class.match.php';
require_once 'commentary.php';

require_once 'lib/requests/Requests.php';
Requests::register_autoloader();

$current_over = array('s' => '', 'o' => 0, 'd' => array()); // o -> over #, d -> balls list
$wicket_tracker = array(); // Array of all the wickets, as a workaround to the bug in IPL feed
$last_bowler = NULL;

$do = true;
while ($do) {
    $headers = array('Accept' => 'application/json');
    $request = Requests::get(getMatchURL(), $headers);
    $json = json_decode(preg_replace('/.+?({.+}).+/','$1',$request->body)); // cleanup jsonp

    if (!isset($json->matchInfo)) {
        echo 'Error - could not fetch match information';
    } else {
        $match = new Match($json);
        $latest_over = $match->getLatestOver();
        $wickets_this_over = $match->getWicketsThisOver();
        $last_ball_commentary = getCommentary($latest_over['s']);
        
        print_r($match->getLastFow());
        die();
        
        $last_ball = end($latest_over['d']);
        $data_string = $latest_over['s'] . " - " . $last_ball;
        
        $last_batsman = $match->getCurrentBatsman($last_ball);
        if ($match->getCurrentBowler() != "Someone") {
            $last_bowler = $match->getCurrentBowler();
        }
        
        $do = $match->isRunning();
        
        $title = DEFAULT_TITLE;
        $level = 4;
        
        // Check our wicket tracker
        foreach($wickets_this_over as $wicket_ball) {
            if (!in_array($wicket_ball, $wicket_tracker)) {
                $fow = $match->getLastFow(); print_r($fow);
                $title = sprintf(WICKET_TITLE, $latest_over['s'], $match->getScore(), $fow['batsman']);
                $msg = sprintf(WICKET_MSG, $fow['text'], $fow['r'], $fow['b'], $fow['4s'], $fow['6s'], $fow['sr']);
                $msg .= "\n" . $last_ball_commentary;
                echo_debug($msg);
                doGrowl($title, $msg, true);
            }
        }
        
        $wicket_tracker = $wickets_this_over;
        
        if ($current_over['s'] != $latest_over['s']) {
            echo_debug(sprintf("%s %s Runs %s, %s to %s", time(), $data_string, $match->getScore(), $last_bowler, $last_batsman)); // Debugging
            echo_debug($last_ball_commentary);
            echo_debug(json_encode($latest_over['d'])); // Debugging
            
            // Analyze the last delivery
            if (preg_match("/W\b/", $last_ball)) {
                $level = 99; // Wicket notification has been handled above already
            } else if (preg_match("/4/", $last_ball)) {
                $title = BOUNDARY_TITLE;
                $msg = sprintf("%s has hit %s for %s runs", $last_batsman, $last_bowler, $last_ball);
                $level = 2;
            } else if (preg_match("/6/", $last_ball)) {
                $title = SIXER_TITLE;
                $msg = sprintf("%s has hit %s for %s runs", $last_batsman, $last_bowler, $last_ball);
                $level = 2;
            } else {
                $plural = (preg_match("/1|\./", $last_ball)) ? 'Run' : 'Runs';
                $last_ball_str = ($last_ball == ".") ? "No " : $last_ball;
                $msg = sprintf("%s to %s, %s %s", $last_bowler, $last_batsman, $last_ball_str, $plural);
                $level = ($last_ball == ".") ? 4 : 3;
            }
            
            $title = $match->getScore() . " - " . $title;
            $msg = ($last_ball_commentary != '') ? $last_ball_commentary : $msg;
            $msg = $latest_over['s'] . " - " . $msg;
            if (VERBOSE >= $level) {
                doGrowl($title, $msg, ($level == 1));
            }
            
            $current_over = $latest_over;
            echo_debug('');
        }
    }

    flush();
    //echo "\nSleeping for " . SLEEP_INTERVAL . "\n";
    sleep(SLEEP_INTERVAL);
}

echo "I'm done, thank you very much!\n";
doGrowl("Completed", "Script Completed, match is not running!");

<?php
require_once 'config.php';

// s -> Summary o.<current_ball> o -> over #, d -> balls list
$current_over = array('s' => '', 'o' => 0, 'd' => array());
 // Array of all the wickets, as a workaround to the bug in IPL feed
$wicket_tracker = array();
$last_bowler = NULL;

$do = true;
while ($do) {
    $json = makeRequest(getMatchURL());

    if (isset($json->matchInfo)) {
        
        $match = new Match($json);
        $latest_over = $match->getLatestOver();
        $wickets_this_over = $match->getWicketsThisOver();
        $last_ball_commentary = Commentary::get($latest_over['s']);
        
        $last_ball = end($latest_over['d']);
        
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
            // Debugging
            echo_debug(sprintf("%s %s - %s Runs %s, %s to %s", time(), $latest_over['s'], $last_ball, $match->getScore(), $last_bowler, $last_batsman));
            echo_debug($last_ball_commentary);
            echo_debug(json_encode($latest_over['d'])); // Debugging
            
            // Analyze the last delivery
            if (preg_match("/W\b/", $last_ball)) {
                $level = 99; // Wicket notification has been handled above already
            } else if (preg_match("/[4-9]/", $last_ball, $matches)) {
                $title = "Shot: {$matches[0]} runs!";
                $msg = sprintf("%s has hit %s for %s runs", $last_batsman, $last_bowler, $last_ball);
                $level = 2;
            } else {
                $plural = (preg_match("/1|\./", $last_ball)) ? 'Run' : 'Runs';
                $last_ball_str = ($last_ball == ".") ? "No " : $last_ball;
                $level = ($last_ball == ".") ? 4 : 3;
                $msg = sprintf("%s to %s, %s %s", $last_bowler, $last_batsman, $last_ball_str, $plural);
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
    sleep(SLEEP_INTERVAL);
}

echo "I'm done, thank you very much!\n";
doGrowl("Completed", "Script Completed, match is not running!");

<?php

class Match {
    
    private $matchInfo = array();    
    private $matchId = array();    
    private $innings = array();    
    private $currentState = array();    
    
    function __construct($j) {
        
        $this->matchInfo = $j->matchInfo;
        $this->matchId = $j->matchId;
        $this->innings = $j->innings;
        $this->currentState = $j->currentState;
    }
    
    function isRunning() {
        
        /*
        Phases:
        C - Completed
        1 - First Innings
        2 - Second Innings
        E - Match not begun.
        */
        
        $negative = array('C');
        if (in_array($this->currentState->phase, $negative)) {
            return false;
        }
        
        return true;
    }
    
    function getScore() {
        $scorecard = end($this->innings)->scorecard;
        $str = $scorecard->runs . "/" . $scorecard->wkts;
        return $str;
    }
    
    /**
     * Get the latest over along with info on the balls
     * @return array - array('s' => '', 'o' => 0, 'd' => array()); // s -> s.x o -> over #, d -> balls list
     */
    function getLatestOver() {
        $recentOvers = $this->currentState->recentOvers;
                
        // Not assuming the overs are in order
        $latest_over = array('s' => '', 'o' => 0, 'd' => array()); // s -> s.x o -> over #, d -> balls list
        if (!is_array($recentOvers))
            return $latest_over;
        
        foreach($recentOvers as $over) {
            if ($over->ovNo > $latest_over['o']) {
                $latest_over['o'] = intval($over->ovNo) - 1;
                $latest_over['d'] = $over->ovBalls;
            }
        }

        // s -> Summary
        $latest_over['s'] = $latest_over['o'] . "." . count($latest_over['d']);
        return $latest_over;
    }
    
    /**
     * Return the list of deliveries in this over where wickets have fallen
     * @return [type] [description]
     */
    function getWicketsThisOver() {
        $latest_over = $this->getLatestOver();
        
        $wickets = array();
        $idx = 1;
        foreach ($latest_over['d'] as $ball) {
            if ((preg_match("/W\b/i", $ball)))
                array_push($wickets, $latest_over['o'] . "." . $idx);
            $idx++;
        }
        
        return $wickets;
    }
    
    // Get who's facing the current delivery
    function getCurrentBatsman($ball=NULL) {

        // check if players have switched ends
        if ($ball != NULL && preg_match("/^(1|3)W?[^(Wd|Nb)]/", $ball)) {
            return $this->getNonStriker();
        }
        
        if ($this->isLastBall())
            return $this->getNonStriker();

        $batsman_id = $this->currentState->facingBatsman;
        if ($batsman_id == -1)
            return "Someone";
        
        return $this->getPlayerName($batsman_id, true);
    }

    function getNonStriker() {
        $batsman_id = $this->currentState->nonFacingBatsman;
        if ($batsman_id == -1)
            return "Someone";
        
        return $this->getPlayerName($batsman_id, true);
    }
    
    // Get who's bowling the current delivery
    function getCurrentBowler() {
        $bowler_id = $this->currentState->currentBowler;
        if ($bowler_id == -1)
            return "Someone";
        
        return $this->getPlayerName($bowler_id, true);
    }
    
    function getLastFow() {
        $battingStats = end($this->innings)->scorecard->battingStats;
        
        $data = array(
            'batsman' => '',
            'bowler' => '',
            'text' => '', 
            'r' => '', 
            'b' => '',
        );
        
        // Calculate the last fall of wicket based on the latest over
        $maxOver = 0; $maxBall = 0;
        foreach ($battingStats as $bs) {
            $dbp = $bs->mod->dismissedBp;
            $total_balls_dbp = ($dbp->over * 6) + $dbp->ball;
            $total_balls_max = ($maxOver * 6) + $maxBall;
            if (isset($bs->mod) && $total_balls_dbp > $total_balls_max) {
                $maxOver = $dbp->over;
                $maxBall = $dbp->ball;
                $data = array(
                    'batsman' => $this->getPlayerName($bs->playerId),
                    'bowler' => $this->getPlayerName($bs->mod->bowlerId),
                    'text' => $bs->mod->text,
                    'r' => $bs->r,
                    'b' => $bs->b,
                    'sr' => $bs->sr,
                    '4s' => $bs->{"4s"},
                    '6s' => $bs->{"6s"}
                );
            }
        }
        
        return $data;
    }
    
    public function isLastBall() {
        
        if ($this->getTotalBalls(true) == 6)
            return true;
        
        return false;
    }
    
    private function getTotalBalls($legal=false) {
        
        $latest_over = $this->getLatestOver();
        if (!$legal)
            return count($latest_over['d']);
        
        $total_count = 0;
        foreach ($latest_over['d'] as $ball) {
            if (!preg_match("/Wd|Nb/", $ball))
                $total_count++;
        }
        
        return $total_count;
    }
    
    private function getPlayerName($id, $short=false) {
        
        $teams = $this->matchInfo->teams;
        foreach ($teams as $team) {
            foreach ($team->players as $player) {
                if ($player->id == $id) {
                    return ($short) ? $player->shortName : $player->fullName;
                }
            }
        }
        
        return "Someone [$id]";
    }
}
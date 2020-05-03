<?php

class Commentary {

    public $meta_count = 0;
    private $data;

    function __construct($j) {

        if ($j->timestamps) {
            $this->meta_count = count($j->timestamps);
        }

        $this->data = new stdClass();
    }

    function setData($d) {
        $this->data = $d;
    }

    public static function get($ball) {
        
        $json = makeRequest(getCommentaryURL('meta'));
        $commentary = new Commentary($json);

        $json2 = makeRequest(getCommentaryURL($commentary->meta_count));
        $commentary->setData($json2);

        return $commentary->getLatestCommentary($ball);
    }
    
    function getLatestCommentary($progress, $ball=NULL) {
        
        $over = NULL;
        $pos = strpos($progress, ".");        
        if ($pos === FALSE) {
            $over = $progress;
        } else {
            list($over, $ball) = explode(".", $progress);
        }

        $commentaries = $this->data->commentaries;
        if (is_array($commentaries)) {
            foreach ($commentaries as $c) {
                if ($c->countingProgress && $c->countingProgress->over == $over && $c->countingProgress->ball == $ball) {
                    return $this->getCommentaryText($c);
                }
            }
        }

        return NULL;
    }

    function getCommentaryText($c) {

        if ($c->message->text && $c->message->text != "") {
            return strip_tags($c->message->text);
        }

        if ($c->autoText != "") {
            $text = $c->autoText;
            if (strpos($c->autoText, "%SPEED%") !== FALSE && $c->speed > 0) {
                $speed = number_format(($c->speed * 3600)/1000, 2);
                $text = str_replace("%SPEED%", "$speed km/h", $text);
            }
            
            return strip_tags($text);
        }

        return NULL;
    }
}
<?php
function getMatchURL() {
    $url = BASE_URL . MATCH_NUMBER . "/scoring.js?_" . time() . "=";
    return $url;
}

function getCommentaryURL($meta='meta') {
    $url = BASE_URL . MATCH_NUMBER . "/commentary-$meta.js?_" . time() . "=";
    return $url;
}

function makeRequest($url) {
    $headers = array('Accept' => 'application/json');

    $json = NULL;    
    try {
        $request = Requests::get($url, $headers);
        $json = json_decode(preg_replace('/.+?({.+}).+/','$1',$request->body)); // cleanup jsonp
    } catch (Requests_Exception $e) {
        doGrowl("Requests Exception Caught", $e->getMessage(), true);
    }
    
    return $json;
}

function doGrowl($title, $msg, $sticky=false) {
    // For OSX Use Growl, for others use Notify Send on Windows
    if (php_uname('s') == 'Darwin') {
        doOSXGrowl($title, $msg, $sticky);
    } else {
        doUbuntuNS($title, $msg, $sticky);
    }
}

function doOSXGrowl($title, $msg, $sticky=false) {
    // man growlnotify
    $image_path = BASE_PATH . "/img/cricket.png";
    $s = ($sticky) ? "-s" : "";
    $cmd = "/usr/local/bin/growlnotify $s --image '$image_path' -n 'Cricket Score' -m \"" . addslashes($msg) . "\" \"$title\"";
    exec($cmd);
}

function doUbuntuNS($title, $msg, $sticky=false) {
    // notify-send http://www.thegeekstuff.com/2010/12/ubuntu-notify-send/
    $image_path = BASE_PATH . "/img/cricket.png";
    $cmd = "notify-send -i '$image_path' \"$title\" \"$msg\"";
    exec($cmd);
}

function echo_debug($msg) {
    if (DEBUG)
        echo $msg . "\n";
}
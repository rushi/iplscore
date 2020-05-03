<?php
require_once 'lang.php';
require_once 'classes/class.match.php';
require_once 'classes/class.commentary.php';
require_once 'lib/requests/Requests.php';
require_once 'helpers.php';

define('BASE_URL',"http://dynamic.pulselive.com/dynamic/data/core/cricket/2012/ipl2013/ipl2013-");
define('_MATCH_NUMBER', 46);
define('SLEEP_INTERVAL', 5);
define('BASE_PATH', dirname(__FILE__));

Requests::register_autoloader();

/*
 * 1 = Wickets Only
 * 2 = Wickets, 4 & 6
 * 3 = Everything except dot deliveries
 * 4 = Everything, including dot balls
 */
define('VERBOSE', 2);

define('DEBUG', true);

global $argv;
if (isset($argv[1])) {
    define('MATCH_NUMBER', $argv[1]);
} else {
    define('MATCH_NUMBER', _MATCH_NUMBER);
}
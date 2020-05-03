# IPL Score Tracker App

## Config
* Needs configuration - update MATCH_NUMBER to the latest match number
* Adjust Verbose as required to get what notifications you need

## over_watch
Run /path/to/php over_watch.php

* Gives you ball by ball commentary
* Sends notifications based on your verbose configuration

## Notifications
* Growl Path is hardcoded to `/usr/local/bin/growlnotify`
* For Ubuntu we need `notify-send` on the path
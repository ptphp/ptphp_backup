#!/usr/bin/env php
<?php
define("PATH_PRO", dirname(__DIR__));
define("PATH_PUB", __DIR__."/webroot");
define("PATH_APP", PATH_PRO."/App");
include PATH_APP."/boot.php";
run();

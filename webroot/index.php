<?php

define("PATH_PRO", realpath("./.."));
define("PATH_PUB", __DIR__);
define("PATH_APP", PATH_PRO."/App");
include PATH_APP."/boot.php";
run();
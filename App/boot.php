<?php
defined("PATH_APP") or define("PATH_APP", __DIR__);
defined("PATH_PRO") or define("PATH_PRO", dirname(__DIR__));

define("PATH_PTPHP",PATH_PRO."/PtPHP");
include PATH_PTPHP."/init.php";

if(is_file(PATH_APP."/Lib/common.php")){
    include PATH_APP."/Lib/common.php";
}

if(is_file(PATH_APP."/Config/default.php")){
    include PATH_APP."/Config/default.php";
}

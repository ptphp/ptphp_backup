<?php
defined("PATH_APP") or define("PATH_APP", __DIR__);
defined("PATH_PRO") or define("PATH_PRO", dirname(__DIR__));
defined("PATH_PUB") or define("PATH_PUB", PATH_PRO."/webroot");

define("PATH_PTPHP",PATH_PRO."/PtPHP");
include PATH_PTPHP."/init.php";

$PT_MODE = get_mode();


if($PT_MODE === FALSE){
    $config['mode'] = "product";
}else{
    $config['mode'] = $PT_MODE;
}
define("PT_MODE",$PT_MODE);

if(is_file(PATH_APP."/Config/".PT_MODE.".php")){
    include PATH_APP."/Config/".PT_MODE.".php";
}

if(is_file(PATH_APP."/Lib/common.php")){
    include PATH_APP."/Lib/common.php";
}

if(is_file(PATH_PRO.'/vendor/autoload.php')){
    include PATH_PRO.'/vendor/autoload.php';
}

Pt::set_config($config);
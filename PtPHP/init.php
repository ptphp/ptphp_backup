<?php
defined("PATH_PTPHP") or define("PATH_PTPHP", __DIR__);
defined("PATH_APP") or define("PATH_APP", realpath("./../App"));
$config = array();
$console_array = array();
include PATH_PTPHP."/Config/default.php";
include PATH_PTPHP."/Lib/utils.php";

spl_autoload_register('__pt_autoload');
register_shutdown_function("shut_down_fun");
if(PHP_SAPI != "cli"){
    ob_start();
    set_error_handler("pt_error_handler");
}

class Pt{
    static  $config;
    static function config($k){
        return isset(self::$config[$k])?self::$config[$k]:FALSE;
    }
    static function set_config($config){
        self::$config = $config;
        if(isset($config['debug'])){
            define("DEBUG",$config['debug']);
        }else{
            define("DEBUG",false);
        }

        if(DEBUG){
            @ini_set('display_errors', 'On');
            error_reporting(E_ALL);
        }else{
            @ini_set('display_errors', 'Off');
            #@ini_set('log_errors', 'On');
            error_reporting(E_ALL & ~E_DEPRECATED);
        }
    }
}
class Console extends Lib\PtConsole{}

function View($_path){
    $info = pathinfo($_path);
    if(!isset($info['extension'])){
        $_path = $_path.".php";
    }
    $path = PATH_APP."/View/".ltrim($_path,"/");
    if(!is_file($path)){
        $path_sys = PATH_PTPHP."/View/".$_path;
        if(!is_file($path_sys)){
            trigger_error("Template not fonnd! ".$path);
        }
        $path = $path_sys;
    }
    return $path;
}

function parse_router(){
    if(PHP_SAPI == "cli"){
        $argv = $_SERVER['argv'];
        unset($argv[0]);
        foreach ($argv as $a){
            $t = explode("=", $a);
            #echo $t[0].PHP_EOL;
            if(count($t) == 2){
                $_GET[ltrim($t[0],"-")] = $t[1];
            }
        }
        if(isset($_GET['_data'])){
            $_SERVER['REQUEST_METHOD'] = "post";
        }else{
            $_SERVER['REQUEST_METHOD'] = "get";
        }
    }

    $url_mod = 0;
    $router = array();

    if($url_mod == 1){
        $controller = (isset($_GET['_c']) && $_GET['_c']) ? $_GET['_c']:"index";
        $action     = (isset($_GET['_a']) && $_GET['_a']) ? $_GET['_a']:"index";
        $module     = isset($_GET['_m'])?$_GET['_m']:"";

        $controller = ucfirst(strtolower($controller));
        $action = ucfirst(strtolower($action));
        if($module)
            $module = ucfirst(strtolower($module));

        if($module){
            $router['base_path'] = "Controller"."/".$module."/".$controller;
            $router['namespace'] = "Controller"."\\".$module."\\".$controller."\\".$action;
        }else{
            $router['base_path'] = "Controller"."/".$controller;
            $router['namespace'] = "Controller"."\\".$controller."\\".$action;
        }

    }else{
        $__R__ = (isset( $_GET['__R__'] ) && $_GET['__R__'] )? $_GET['__R__'] : "index/index";
        //var_dump($__R__);
        if($__R__ == "/"){
            $__R__ = "index/index";
        }
        $__R__ = ltrim($__R__,"/");
        $len = strlen($__R__);
        if(substr($__R__,$len-1) == "/"){
            $__R__ .= "index";
        }
        $r = explode("/",$__R__);
        if(count($r) == 1){
            $__R__ .= "/index";
        }
        $r = explode("/",$__R__);
        $len = count($r);
        $__action = $r[$len-1];

        $__namespace = $__path = 'Controller';
        for($i = 0;$i < $len-1;$i++){
            // echo $r[$i];
            $__path .= "/".ucfirst(strtolower($r[$i]));
            $__namespace .= "\\".ucfirst(strtolower($r[$i]));
        }
        $action = ucfirst(strtolower($__action));
        $router['base_path'] = $__path;
        $router['namespace'] = $__namespace."\\".$action;
        //var_dump($router);
        //exit;
    }

    $router['action'] = $action;
    $router['controller_path'] = $router['base_path'].".php";
    $router['method'] = strtolower($_SERVER['REQUEST_METHOD']);
    //console($router);
    //exit;
    return $router;
}

function run(){
    global $config;
    $router = parse_router();
    $controller = PATH_APP.'/'.$router['controller_path'];

    if(!is_file($controller)){
        $controller = PATH_PTPHP.'/'.$router['controller_path'];
    }
    if(DEBUG){
        console($router);
    }
    //exit;
    if($router['controller_path'] == 'Controller/Pttest.php'){
        include_once PATH_PTPHP . '/ptunittest.php';
    }
    //exit;
    if(!is_file($controller)){
        trigger_error("404");
    }
    include $controller;
    $controller_obj = new $router['namespace']();
    $controller_obj->$router['method']();
}
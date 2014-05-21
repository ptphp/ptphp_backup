<?php
defined("PATH_PTPHP") or define("PATH_PTPHP", __DIR__);
defined("PATH_APP") or define("PATH_APP", realpath("./../App"));
$config = array();
$console_array = array();
if(PHP_SAPI != "cli"){
    ob_start();
    set_error_handler("pt_error_handler");
}
function get_mode(){
    return isset($_SERVER['PT_MODE'])?$_SERVER['PT_MODE']:FALSE;
}
function set_test(){

    if(isset($GLOBALS['PT_MODE'])){
        $_SERVER['PT_MODE'] = "test";
    }
}
set_test();
include PATH_PTPHP."/Config/default.php";

class Pt{
    static  $config;
    static function config($k){
        return isset(self::$config[$k])?self::$config[$k]:FALSE;
    }
    static function set_config($config){
        self::$config = $config;
        define("DEBUG",$config[$config['mode']]['debug']);
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


function pt_error_handler($errno, $errstr, $errfile, $errline )
{
    if(!defined('E_STRICT'))            define('E_STRICT', 2048);
    if(!defined('E_RECOVERABLE_ERROR')) define('E_RECOVERABLE_ERROR', 4096);
    $trace = debug_backtrace();
    array_shift($trace);
    $res['result']['msg']        = $errstr;
    $res['result']['errfile']    = $errfile;
    $res['result']['errline']    = $errline;
    $res['result']['trace']      = $trace;
    $res['error']                = 1;
    $res['id']                   = null;
    if(PHP_SAPI == "cli"){
        console($res);
    }else{
        ob_end_clean();
        ob_start();
        if(DEBUG){
            if(is_xhr()){
                echo json_encode($res);
            }else{
                include PATH_PTPHP.'/View/Block/site/debug.html';
            }
        }else{
            $msg = "System Error: ".md5(time());
            if(is_xhr()){
                if($errstr != '404'){
                    error_log($msg."==>".var_export($res,1));
                }
                $res_ajax                   = array();
                $res_ajax['result']['msg']  = $msg;
                $res_ajax['error']          = 1;
                $res_ajax['id']             = null;
                echo json_encode($res_ajax);
            }else{
                if($errstr == '404'){
                    if(file_exists(PATH_APP.'/View/Block/site/tpl/404.html')){
                        include PATH_APP.'/View/Block/site/tpl/404.html';
                    }else{
                        include PATH_PTPHP.'/View/Block/site/404.html';
                    }
                }else{
                    error_log($msg."==>".var_export($res,1));
                    $view_msg = $msg;
                    if(file_exists(PATH_APP.'/View/Block/site/tpl/505.html')){
                        include PATH_APP.'/View/Block/site/tpl/505.html';
                    }else{
                        include PATH_PTPHP.'/View/Block/site/505.html';
                    }
                }
            }
        }
        ob_end_flush();
        exit;
    }


}

function __pt_autoload($class_name){
	//echo $class_name;
    //console($class_name);
    $config = Pt::$config;
    $t = explode("\\",$class_name);
    $f = $t[0];
    if(isset($config['namespaces'])){
        $namespaces = $config['namespaces'];
        if(array_key_exists($f,$namespaces)){
            $path = $namespaces[$f].'\\'.str_replace( "\\", "/",$class_name).".php";
            require_once $path;
        }
    }
	if ( $f == "Controller" ){
		$path = PATH_APP."/".str_replace( "\\", "/",$class_name).".php";
		#var_dump($path);
		require_once $path;
	}
	if ( $f == "Model" ){
		$path = PATH_APP."/".str_replace( "\\", "/",$class_name).".php";
		require_once $path;
	}
	if ($f == "Module" ){
		#echo $class_name;
		#echo PHP_EOL;
		$path = PATH_APP."/".str_replace( "\\", "/",$class_name).".php";
		require_once $path;
	}

	if ( $f == "Lib" ){
        $path = PATH_APP."/".str_replace( "\\", "/",$class_name).".php";
        if(!is_file($path)){
            $path = PATH_PTPHP."/".str_replace( "\\", "/",$class_name).".php";
        }
		require_once $path;
	}
}

spl_autoload_register('__pt_autoload');
function get_pid(){
    return getmypid();
}
function is_win(){
    return PHP_OS == "WINNT";
}

function print_pre($v){
	echo "<pre>";
	print_r($v);
	echo "</pre>";	
}
function is_xhr(){
	return TRUE === (isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] == "XMLHttpRequest");
}
function shut_down_fun(){	
	if(PHP_SAPI == "cli"){
		return;
	}
	if(is_xhr()){
		return;
	}
	global $config;
	if(DEBUG){
		global $console_array;
		array_unshift($console_array,$_SERVER);
		$data = json_encode($console_array);
		$res = <<<RES
	<script>
		var __data= $data;
				for(i in __data){
					console.log(__data[i]);
				}
	</script>
RES;
		echo$res;
	}	
}



register_shutdown_function("shut_down_fun");

function get_line_and_filename($trace){
    $info = '';
    if(isset($trace[1]['class']) && $trace[1]['class']){
        $info .= $trace[1]['class']."::";
    }else{
        $info .= basename($trace[0]['file'])."::";
    }
    $info .= $trace[1]['function']."()";
    return $info.":".$trace[0]['line'];
}
function console_log($var){
    $curl = new Lib\PtCurl();
    if(is_array($var) ||  is_object($var)){
        $data = json_encode($var,True);
    }else{
        $data = $var;
    }
    $url = "http://chat.ptphp.com/push/push?cname=log&content=".urlencode($data);
    $curl->get($url);
}


function console($var){		
    $trace = debug_backtrace();
    $file_info = get_line_and_filename($trace);
	global $config;
    $pid = get_pid();
	$hd = "[".date("m-d H:i:s")."] [$pid] [$file_info] ";
	if(PHP_SAPI == "cli"){
		echo $hd;
        if(is_array($var) || is_object($var)){
            print_r($var);
            console_log($hd.json_encode($var));
        }else{
            echo $var;
            console_log($hd.$var);
        }
		echo PHP_EOL;
	}
	
	if(!DEBUG){
		return;
	}	
	
	global $console_array;
	$tree = debug_backtrace();
	//print_pre(debug_backtrace());

	$console_array[] = array(
			"data"=>$var,
			"line"=>$tree[0]['line'],
			"file"=>str_replace(PATH_PRO, '',$tree[0]['file']),
	);
}

function View($_path){
	$path = PATH_APP."/View/".$_path.".php";

	if(!is_file($path)){
		$path = PATH_PTPHP."/View/".$_path.".php";
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
	//console($router);
	//exit;
	if($router['controller_path'] == 'Controller/Pttest.php'){
		include_once PATH_PTPHP.'/ptunittest.php';	
	}
	//exit;
	if(!is_file($controller)){
        trigger_error("404");
	}
	include $controller;
	$controller_obj = new $router['namespace']();
	$controller_obj->$router['method']();
}
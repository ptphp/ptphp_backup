<?php
defined("PATH_PTPHP") or define("PATH_PTPHP", __DIR__);
defined("PATH_APP") or define("PATH_APP", realpath("./../App"));
$config = array();
$console_array = array();
include PATH_PTPHP."/Config/default.php";

function __pt_autoload($class_name){
	//echo $class_name;
	if ( substr($class_name, 0,10) == "Controller" ){		
		$path = PATH_APP."/".str_replace( "\\", "/",$class_name).".php";
		#var_dump($path);
		require_once $path;
	}
	if ( substr($class_name, 0,5) == "Model" ){
		$path = PATH_APP."/".str_replace( "\\", "/",$class_name).".php";
		require_once $path;
	}
	if ( substr($class_name, 0,6) == "Module" ){
		#echo $class_name;
		#echo PHP_EOL;
		$path = PATH_APP."/".str_replace( "\\", "/",$class_name).".php";
		require_once $path;
	}
	if ( substr($class_name, 0,3) == "Lib" ){
		$path = PATH_PTPHP."/".str_replace( "\\", "/",$class_name).".php";
		require_once $path;
	}
}

spl_autoload_register('__pt_autoload');

function print_pre($v){
	echo "<pre>";
	print_r($v);
	echo "</pre>";	
}

function tail_log($msg){
	if(is_array($msg)){
		$_msg = var_export($msg,TRUE);
	}else{
		$_msg = $msg;
	}
	error_log("[ ".date("m/d H:i:s",time())." ] ".str_replace("\n", "\n\t", $_msg)."\n",3,"c:\\log.txt");
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
	if($config['debug']){
		global $console_array;
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

function console($var){		
	global $config;
	
	if(PHP_SAPI == "cli"){
		echo "[".date("m-d H:i:s")."] ";
		print_r($var);
		echo PHP_EOL;
	}
	
	if(!$config['debug']){
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
        $__R__ = isset( $_GET['__R__'] ) ? $_GET['__R__'] : "index/index";

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
	console($router);
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
	//print_pre($router);
	//exit;
	if($router['controller_path'] == 'Controller/Pttest.php'){
		include_once PATH_PTPHP.'/ptunittest.php';	
	}
	//exit;
	if(!is_file($controller)){
		die("not found");
	}
	include $controller;
	$controller_obj = new $router['namespace']();
	$controller_obj->$router['method']();
}
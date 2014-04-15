<?php
defined("PATH_PTPHP") or define("PATH_PTPHP", __DIR__);
defined("PATH_APP") or define("PATH_APP", realpath("./../App"));
$config = array();
$console_array = array();
include PATH_PTPHP."/Config/default.php";

function print_pre($v){
	echo "<pre>";
	print_r($v);
	echo "</pre>";	
}
function shut_down_fun(){		
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

register_shutdown_function(shut_down_fun);

function console($var){	
	global $config;
	if(!$config['debug']){
		return;
	}	
	global $console_array;
	$tree = debug_backtrace();
	//print_pre(debug_backtrace());
	$console_array[] = array(
			data=>$var,
			line=>$tree[0]['line'],
			file=>str_replace(PATH_PRO, '',$tree[0]['file']),
	);
}

function View($path){
	return PATH_APP."/View/".$path.".php";
}

function parse_router(){
	$router = array();
	$uri = $_SERVER['REQUEST_URI'];
	$url_array = parse_url($uri);
	
	$c_path = $url_array['path'];
	
	if(substr($c_path, strlen($c_path)-1) == "/"){
		$c_path .= "index";
	}
	
	$path_array = pathinfo($c_path);	
	$base_path = $path_array['dirname']."/".$path_array['filename'];
	
	$t = explode('/', $base_path);
	$_base_path = "";
	foreach ($t as $_t){
		if($_t){
			$_base_path .= "/".ucfirst(strtolower($_t));
		}
		
	}
	$router['base_path'] = "Controller".$_base_path;
	$router['namespace'] = str_replace("/", "\\", $router['base_path']);
	$router['controller_path'] = $router['base_path'].".php";
	$router['method'] = strtolower($_SERVER['REQUEST_METHOD']);
	console($router);
	return $router;
}


function run(){
	global $config;
	$router = parse_router();
	$controller = PATH_APP.'/'.$router['controller_path'];
	if(!is_file($controller)){
		$controller = PATH_PTPHP.'/'.$router['controller_path'];
	}
	
	if(!is_file($controller)){
		die("not found");
	}
	
	include $controller;	
	$controller_obj = new $router['namespace']();
	$controller_obj->$router['method']();
}
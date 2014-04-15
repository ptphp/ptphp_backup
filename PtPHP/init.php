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

class PtCurl{
	var $cache = FALSE;
	var $cache_file = '';
	var $del_cache = FALSE;
	function request($method = 'GET',$url = '',$query='',$_options = array()){
		$cache_file = '';

		if($this->cache){
			$cache_file = sys_get_temp_dir().'/curl'.md5($url);
				
			if(is_file($cache_file)){
				if($this->del_cache){
					unlink($cache_file);
				}else{
					return include $cache_file;
				}
				//print_pre($cache_file);


			}
		}
		$http_header = array(
				"Connection: keep-alive",
		);
		$options = array(
				CURLOPT_URL 			=> $url,
				CURLOPT_RETURNTRANSFER 	=> 1,
				CURLOPT_TIMEOUT 		=> 10,
				CURLOPT_USERAGENT  		=> 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.152 Safari/537.36',
				CURLOPT_HTTPHEADER  	=> $http_header,
				CURLOPT_CUSTOMREQUEST 	=> $method, // GET POST PUT PATCH DELETE HEAD OPTIONS
		);

		$ch = curl_init();
		$options = $_options + $options;
		curl_setopt_array($ch, $options);

		//print_pre($options);
		$content = curl_exec($ch);
		//print_pre($content);
		$res = array();
		$res['header'] = '';
		$res['cookie'] = '';
		if(isset($options[CURLOPT_HEADER]) && $options[CURLOPT_HEADER] == 1){
			//print_pre($content);
			$t = explode("\r\n\r\n", $content);
			$res['header'] = $t[0];
			$res['body'] = str_replace($res['header']."\r\n\r\n","",$content);
			$res['cookie'] = $this->get_cookie($res['header']);
		}else{
			$res['body'] = $content;
		}

		if($this->cache){
			$res['cache_file'] = $cache_file;
			$this->cache_file = $cache_file;
			file_put_contents($cache_file, "<?php \nreturn ".var_export($res,true).";");
		}
		//print_pre($res);
		return $res;
	}
	function get_cookie($header){
		preg_match_all("/set\-cookie:([^\r\n]*)/i", $header, $matches);
		$cookies = implode(';', $matches[1]);
		return $cookies;
	}
	function get($url,$_options = array()){
		return $this->request('GET',$url,'',$_options);
	}

	function post($url,$data,$_options = array()){
		$_options[CURLOPT_POST] = 1;
		$_options[CURLOPT_POSTFIELDS] = $data;

		return $this->request('POST',$url,$data,$_options);
	}
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
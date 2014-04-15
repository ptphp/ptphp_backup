<?php
namespace PtPHP\Lib;

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
				//CURLOPT_PROXY  			=> $proxy,
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
		$res['location'] = '';
		$res['body'] = '';

		if(!$content){
			return $res;
		}

		if(isset($options[CURLOPT_HEADER]) && $options[CURLOPT_HEADER] == 1){
			$t = explode("\r\n\r\n", $content);
			//var_dump($content);
			//var_dump($t);
			if(isset($options[CURLOPT_PROXY])){
				$res['header'] = $t[1];
				$res['body'] = str_replace($t[0]."\r\n\r\n","",$content);
				$res['body'] = str_replace($t[1]."\r\n\r\n","",$res['body']);
			}else{
				$res['header'] = $t[0];
				$res['body'] = str_replace($res['header']."\r\n\r\n","",$content);
			}
			//var_dump($res);
			//exit;
			$res['cookie'] = $this->get_cookie($res['header']);
			$res['location'] = $this->get_location($res['header']);
				

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
	function get_location($header){
		preg_match("/Location:([^\r\n]*)/i", $header, $matches);

		return $matches?trim($matches[1]):'';
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
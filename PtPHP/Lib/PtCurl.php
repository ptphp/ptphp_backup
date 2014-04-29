<?php
namespace Lib;

class PtCurl{
	var $cache = FALSE;
	var $cache_file = '';
	var $del_cache = FALSE;
	var $_proxy = '';
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
				#"Connection: keep-alive",
				"Accept-Encoding:gzip,deflate,sdch",
				"Accept-Language:zh-CN,zh;q=0.8,en;q=0.6"
		);

		$options = array(
				CURLOPT_URL 			=> $url,
				CURLOPT_RETURNTRANSFER 	=> 1,
				CURLOPT_TIMEOUT 		=> 30,
				CURLOPT_ENCODING 		=> "gzip",
				CURLOPT_USERAGENT  		=> 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.152 Safari/537.36',
				CURLOPT_HTTPHEADER  	=> $http_header,
				CURLOPT_CUSTOMREQUEST 	=> $method, // GET POST PUT PATCH DELETE HEAD OPTIONS
				//CURLOPT_PROXY  			=> $proxy,
		);

		$ch = curl_init();
		$options = $_options + $options;
		if($this->_proxy)
			$options[CURLOPT_PROXY] = $this->_proxy;
		//print_pre($options);
		curl_setopt_array($ch, $options);
		
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
				
		if($this->is_gzip($res['body']))
			$res['body'] = gzdecode($res['body']);
		
		if($this->cache){
			$res['cache_file'] = $cache_file;
			$this->cache_file = $cache_file;
			file_put_contents($cache_file, "<?php \nreturn ".var_export($res,true).";");
		}
		//print_pre($res);
		return $res;
	}
	function is_gzip($content){
		if(!$content)
			return FALSE;
		$bin = substr($content, 0 , 2);
		$strInfo = @unpack("C2chars", $bin);		
		$typeCode = intval($strInfo['chars1'].$strInfo['chars2']);
		
		$isGzip = FALSE;
		switch ($typeCode)
		{
			case 31139:
				//网站开启了gzip
				$isGzip = TRUE;
				break;
			default:
				$isGzip = FALSE;
		}
		return $isGzip;
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
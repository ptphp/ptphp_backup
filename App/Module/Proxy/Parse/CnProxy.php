<?php
namespace parse;
use ParseIf;
use Http;


class ParseCnProxy extends ParseBase implements ParseIf{
	var $domain = "http://www.cnproxy.com";
	public $source = "cnproxy";
	var $page_urls = array();

	function get_page_lists($url)
	{
		self::log("loading ==> $url",$this->source);
		Http::$cache = True;
		$res = Http::get($url);
		preg_match('/<link[^>]+>\s+<SCRIPT[^>]+>\s+([^>]+)<\/SCRIPT>/', $res, $matches);
		$js = $matches[1];
		preg_match_all('/<td>(\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3})<SCRIPT[^>]+>document.write\(\":\"([a-z+]+)\)/',$res,$matches,PREG_SET_ORDER);
		//print_r($matches);
		$res = array();
		foreach ($matches as $match){
			$ip = $match[1];
			$port_str = $match[2];
			$src_dir = PATH_ROOT;
			$cmd = "node $src_dir/src/api1.js '$js' '\"\"$port_str'";
			$port =  trim(shell_exec($cmd));
			$this->handle_result($ip,$port);
		}
	}
	function run(){
		for($i=1;$i<11;$i++){
			$this->get_page_lists("http://www.cnproxy.com/proxy".$i.".html");			
		}
		
	}
}




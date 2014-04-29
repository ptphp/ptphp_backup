<?php
namespace parse;
use ParseIf;
use Http;

class ParseFreeProxyList extends ParseBase implements ParseIf{
	var $domain = "http://free-proxy-list.net";
	var $page_urls = array();
	var $source = "FPL";
	function get_page_lists($url)
	{
		self::log("loading ==> $url",$this->source);
		#Http::$cache = True;
		$res = Http::get($url);
		
		preg_match_all('/<td>(\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3})<\/td><td>([\d]+)<\/td>/', $res, $matches,PREG_SET_ORDER);
		
		$res = array();
		foreach ($matches as $match){
			$ip = $match[1];
			$port = $match[2];
			//echo $cmd;			
			$this->handle_result($ip,$port);	
		}
	}


	function run(){
		$this->get_page_lists($this->domain."/");
	}
}




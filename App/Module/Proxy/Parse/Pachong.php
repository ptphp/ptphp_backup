<?php
namespace parse;
use ParseIf;
use Http;

class ParsePachong extends ParseBase implements ParseIf{
	var $domain = "http://pachong.org";
	var $page_urls = array();
	var $source = "pachong";
	
	function get_page_detail($url){	
		self::log("loading ==> $url",$this->source);
		$res = Http::get($url);
		preg_match_all('/<td>(\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3})<\/td>\s+<td>(\d+)<\/td>/', $res, $matches,PREG_SET_ORDER);
	
		$res = array();
		foreach($matches as $match){			
			$res[] = array(
					'ip'=>$match[1],
					'port'=>$match[2],
			);
			$ip = $match[1];
			$port = $match[2];
			$this->handle_result($ip,$port);
		}
		//var_dump($res);
		return $res;
	}
	
	function run(){		
		$cats_urls = array(
				'http://pachong.org/anonymous.html',
				'http://pachong.org/transparent.html',
				);			

		foreach($cats_urls as $page_list_url){
			$this->get_page_detail($page_list_url);
		}
		
	}
}




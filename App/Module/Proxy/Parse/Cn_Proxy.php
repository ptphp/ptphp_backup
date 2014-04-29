<?php
namespace parse;
use ParseIf;
use Http;

class ParseCn_Proxy extends ParseBase implements ParseIf{
	var $domain = "http://pachong.org";
	var $page_urls = array();
	var $source = "cn_proxy";
	function get_page_lists($url)
	{
		
		self::log("loading ==> $url",$this->source);
		$res = Http::get($url);		
		$res = iconv("gbk","utf-8",$res);
		
		preg_match_all('/<li><span class="box_r">[-\d]+<\/span><a href="([^>^"]+)">([^>]+)<\/a><\/li>/', $res, $matches,PREG_SET_ORDER);
		preg_match('/<a class="next" href="([^"]+)">下一页<\/a>/', $res, $next_matches);
		$res = array();
		foreach ($matches as $match){			
			$title =  $match[2];
			$url = $match[1];
			//echo $this->domain.$url;
			//echo "\n";
			if(!in_array($this->domain.$url, $this->page_urls)){				
				$this->page_urls[] = $this->domain.$url;
			}
			
		}
		
		if($next_matches){
			$this->get_page_lists($this->domain.$next_matches[1]);
		}
		
	}
	
	function get_page_detail($url){		
		self::log("loading ==> $url",$this->source);
		$res = Http::get($url);
		//echo $res;
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
				'http://cn-proxy.com/',
				);
		
		foreach($cats_urls as $page_list_url){
			$this->get_page_detail($page_list_url);
		}
		
	}
}




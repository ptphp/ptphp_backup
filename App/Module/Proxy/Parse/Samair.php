<?php
namespace Module\Proxy\Parse;
use Module\Proxy\Parse\Base\ParseBase as ParseBase;
use Module\Proxy\Parse\Base\ParseInterface as ParseInterface;
use Lib\PtCurl;

class Samair extends ParseBase implements ParseInterface{	
	var $domain = "http://www.samair.ru";
	var $page_urls = array();
	var $source = "samair";
    var $need_pub = True;
	function  __construct(){
		$this->curl = new PtCurl();
	}
	function get_page_lists($url)
	{
		console("loading ==> $url");		
		$res = $this->curl->get($url);		
		
		if(!preg_match('/<script src="(\/js\/[\d]+\.js)" type="text\/javascript"><\/script>/', $res['body'], $js_matches)){
			console("parse js file error");
			return;
		}
		$url = $this->domain.$js_matches[1];
		console("get:".$url);
		$js = $this->curl->get($url);		
		console("parse:".$url);
		if(!preg_match('/\(\'([0-9a-z=;]+)\',20,20,\'([|a-z]+)\'.*\)/', $js['body'], $jsres_matches)){
			console("parse js content error");
			return;
		}	
		#console($jsres_matches);
		$s0 = $jsres_matches[1];		
		$s1 = $jsres_matches[2];
		
		preg_match('/<a class="page" href="(proxy-[\d]+.htm)">next<\/a>/', $res['body'], $next_matches);

		if(!preg_match_all('/(\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3})<script type="text\/javascript">document.write\(":"\+([^>]+)\)<\/script>/', $res['body'], $matches,PREG_SET_ORDER)){
			console("parse proxys error");
			return;
		}	
		$res = array();
		foreach ($matches as $match){
			$ip = $match[1];			
			$port_str = $match[2];
			$src_dir = __DIR__."/js";
			//console("proxy: ".$ip.":".$port_str);
			$cmd = "node $src_dir/api.js \"$s0\" \"$s1\" '\"\"+$port_str'";
			//echo $cmd;			
			console($cmd);
			$port = trim(shell_exec($cmd));
            if(!is_numeric($port)){
                console("proxy: ".$ip.":".$port."is invalid!");
            }else{
                console("proxy: ".$ip.":".$port);
                if($this->need_pub && $port){
                    $this->handle_result($ip,$port);
                }
            }


		}
		if($next_matches){
			$this->get_page_lists($this->domain."/proxy/".$next_matches[1]);
		}
	}

	function run(){
		$url = $this->domain."/proxy/";
		console("Starting ".$this->source);
		$this->get_page_lists($url);
	}
	
	function api_js($port_str,$s0,$s1){
		$src_dir = __DIR__."/js";
		console("proxy: ".$port_str);
		$cmd = "node $src_dir/api.js \"$s0\" \"$s1\" '\"\"$port_str'";
		//echo $cmd;			
		console($cmd);
		$port = trim(shell_exec($cmd));
		console($port);
		return $port;
	}
}




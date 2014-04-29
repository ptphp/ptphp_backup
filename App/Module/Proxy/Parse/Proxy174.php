<?php 
namespace Module\Proxy\Parse;

class Proxy174{
	var $need_pub = True;
	var $source = 'Proxy174';
	public function __construct(){
		$this->curl = new \Lib\PtCurl();
	}
	public function handle_result($ip,$port){
		$url = "http://sdc2.weilver.com/proxy/pages/addproxy.php";
		$data = array(
				'source'=>$this->source,
				'ip'=>$ip,
				'port'=>$port,
		);
		
		$this->curl->post($url, http_build_query($data));	
		console("Published");
	}
	
	function get_list(){	
		$url = "http://174.139.241.42/msn/lists/check/";
		$curl = $this->curl;
		console("get:".$url);
		$res = $curl->get($url);
		console("parse:".$url);
		//print_pre($res);
		preg_match_all("/a href=\"(.*?)\"/", $res['body'],$matches,PREG_SET_ORDER);
		//print_pre($matches);
		define("PREG_IP_PATTERN",'/(\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3}):([\d]+)/');
		foreach($matches as $match){
			if($match[1] == "/msn/lists/")
				continue;
			$url = "http://174.139.241.42/msn/lists/check/" .$match[1];
			console("get:".$url);
			$res = $curl->get($url);
			console("parse:".$url);
			//print_pre($res['body']);	
			$m = preg_match_all(PREG_IP_PATTERN, $res['body'],$proxy_matches,PREG_SET_ORDER);
			//print_pre($proxy_matches);
			foreach ($proxy_matches as $proxy_match){
				//print_pre($proxy_match);
				$ip = $proxy_match[1];
				$port = $proxy_match[2];
				console("proxy: ".$ip.":".$port);
				if($this->need_pub){
					$this->handle_result($ip,$port);
				}
				#
			}
		}
	}	
	function run(){
		console($this->source . " is Running...");
		$this->get_list();
	}
}

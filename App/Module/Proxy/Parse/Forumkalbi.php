<?php 
namespace Module\Proxy\Parse;
use Module\Proxy\Parse\Base\ParseBase as ParseBase;
use Module\Proxy\Parse\Base\ParseInterface as ParseInterface;
use Lib\PtCurl;
class Forumkalbi extends ParseBase implements ParseInterface{
	var $source = 'Forumkalbi';
	var $need_pub = True;
	var $t = 0;
    public function __construct(){
		$this->curl = new PtCurl();
	}
	function get_list(){	
		$url = "http://www.forumkalbi.com/proxy-list/";
		console("get:".$url);
		$curl = $this->curl;
		$res = $curl->get($url);
        if($res['error']){
            console($res['error']);
            return;
        }
		console("parse:".$url);
		//print_pre($res);
		//exit;
		if(!preg_match_all("/<a href=\"([^\"]+)\" id=\"thread_title_\d+\"[^>]+>/", $res['body'],$matches,PREG_SET_ORDER)){
            console("parse url list error");
            return;
        }
		//print_pre($matches);

		define("PREG_IP_PATTERN",'/(\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3}):([\d]+)/');
		foreach($matches as $match){			
			$url = $match[1];		
			console("get:".$url);
			$res = $curl->get($url);	
			console("parse:".$url);
			$m = preg_match_all(PREG_IP_PATTERN, $res['body'],$proxy_matches,PREG_SET_ORDER);			
			//print_pre($proxy_matches);
			foreach ($proxy_matches as $proxy_match){
				//print_pre($proxy_match);
				$ip = $proxy_match[1];
				$port = $proxy_match[2];				
				console("proxy: ".$ip.":".$port);
                echo $this->t++;
				if($this->need_pub){
					$this->handle_result($ip,$port);
				}
			}
		}
	}	
	function run(){
		console($this->source . " is Running...");
		$this->get_list();
	}
}

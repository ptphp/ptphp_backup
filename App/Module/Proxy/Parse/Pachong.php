<?php
namespace Module\Proxy\Parse;
use Module\Proxy\Parse\Base\ParseBase as ParseBase;
use Module\Proxy\Parse\Base\ParseInterface as ParseInterface;
use Lib\PtCurl;

class Pachong extends ParseBase implements ParseInterface{
    var $domain = "http://pachong.org";
    var $page_urls = array();
    var $source = "pachong";
    function  __construct(){
        $this->curl = new PtCurl();
    }

	function get_page_detail($url){
        console("get:".$url);
        $curl = $this->curl;
        $res = $curl->get($url);
        console("parse:".$url);

        if(  !preg_match_all('/<td>(\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3})<\/td>\s+<td>(\d+)<\/td>/', $res['body'], $matches,PREG_SET_ORDER)){
            console("parse error!");
            return;
        }

        foreach($matches as $match){
            $ip = $match[1];
            $port = $match[2];
            console("proxy: ".$ip.":".$port);
            if($this->need_pub){
                $this->handle_result($ip,$port);
            }
        }
	}
	
	function run(){		
		$cats_urls = array(
				'http://pachong.org/anonymous.html',
				'http://pachong.org/transparent.html',
				);			

		foreach($cats_urls as $page_list_url){
            //console($page_list_url);
			$this->get_page_detail($page_list_url);
            sleep(1);
		}
		
	}
}




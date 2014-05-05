<?php
namespace Module\Proxy\Parse;
use Module\Proxy\Parse\Base\ParseBase as ParseBase;
use Module\Proxy\Parse\Base\ParseInterface as ParseInterface;
use Lib\PtCurl;

class Cn_Proxy extends ParseBase implements ParseInterface{
	var $domain = "";
	var $page_urls = array();
	var $source = "cn_proxy";
    function  __construct(){
        $this->curl = new PtCurl();

    }
	function get_page_detail($url){
        console("get:".$url);
        $res = $this->curl->get($url);
        console("parse:".$url);
        if(!preg_match_all('/<td>(\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3})<\/td>\s+<td>(\d+)<\/td>/', $res['body'], $matches,PREG_SET_ORDER)){
            console("parse proxy error!");
            return;
        }
        foreach($matches as $match){
            $ip = $match[1];
            $port = $match[2];
            console("proxy: ".$ip.":".$port);
            if($this->need_pub && $port){
                $this->handle_result($ip,$port);
            }
        }
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




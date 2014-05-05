<?php
namespace Module\Proxy\Parse;
use Module\Proxy\Parse\Base\ParseBase as ParseBase;
use Module\Proxy\Parse\Base\ParseInterface as ParseInterface;
use Lib\PtCurl;

class FreeProxyList extends ParseBase implements ParseInterface{
    var $domain = "http://free-proxy-list.net";
    var $page_urls = array();
    var $source = "FPL";
    var $need_pub = True;
    function  __construct(){
        $this->curl = new PtCurl();
    }
	function get_page_lists($url)
	{
        console("get:".$url);
        $curl = $this->curl;
        $res = $curl->get($url);
        console("parse:".$url);

        if(!preg_match_all('/<td>(\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3})<\/td><td>([\d]+)<\/td>/', $res['body'], $matches,PREG_SET_ORDER)){
            console("parse error");
            return;
        }
        foreach ($matches as $match){
            $ip = $match[1];
            $port = $match[2];
            console("proxy: ".$ip.":".$port);
            if($this->need_pub && $port){
                $this->handle_result($ip,$port);
            }
        }
	}

	function run(){
		$this->get_page_lists($this->domain."/");
	}
}




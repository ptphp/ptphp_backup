<?php
namespace Module\Proxy\Parse;
use Module\Proxy\Parse\Base\ParseBase as ParseBase;
use Module\Proxy\Parse\Base\ParseInterface as ParseInterface;
use Lib\PtCurl;

class Dn28 extends ParseBase implements ParseInterface{
	var $domain = "http://www.dn28.com";
	var $page_urls = array();
	var $source = "dn28";

    function  __construct(){
        $this->curl = new PtCurl();
    }

    function get_page_lists($url)
	{
        console("get:".$url);
        $res = $this->curl->get($url);
        console("parse link list");
        //$res['body'] = iconv("gbk","utf-8",$res['body']);
        if(!preg_match_all('/<li><span class="box_r">([-\d]+)<\/span><a href="([^>^"]+)">([^>]+)<\/a><\/li>/', $res['body'], $matches,PREG_SET_ORDER)){
            console("parse link list error");
            return;
        }
        preg_match('/<a class="next" href="([^"]+)">下一页<\/a>/', $res['body'], $next_matches);
        foreach ($matches as $match){
            $title =  $match[3];
            $url = $match[2];
            if(!in_array($this->domain.$url, $this->page_urls)){
                console($this->domain.$url);
                $this->page_urls[] = $this->domain.$url;
            }
        }

        if(count($next_matches) > 0){
            console("next...");
            $this->get_page_lists($this->domain.$next_matches[1]);
        }
    }
	
	function get_page_detail($url){		
		console("get:".$url);
        $res = $this->curl->get($url);
        preg_match('/时间：(\d+年\d+月\d+)日 /', iconv("gbk", "utf-8", $res['body']), $match);
        $time = str_replace(array("年","月"),'-',$match[1]);

        $t = strtotime($time);
        if($t <  time()-7*24*3600)
            return;
        preg_match_all('/(\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3}):(\d+)@/', $res['body'], $matches,PREG_SET_ORDER);
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
				'http://www.dn28.com/html/26/category-catid-126.html', //qq代理ip qq代理服务器 qqip代理地址
				'http://www.dn28.com/html/41/category-catid-141.html', // 国外代理服务器 国内代理IP 国外ip代理
				'http://www.dn28.com/html/27/category-catid-127.html', //免费代理ip 最新ip代理 http代理服务器
				'http://www.dn28.com/html/40/category-catid-140.html', //socks5代理ip地址 socks4代理服务器
				'http://www.dn28.com/html/31/category-catid-131.html',  //qq代理设置 在线代理 vpn代理 ssh代理
				'http://www.dn28.com/html/36/category-catid-136.html', //qq代理设置 在线代理 vpn代理 ssh代理
				);	
		#$this->get_page_detail("http://www.dn28.com/html/72/n-5872.html");
		#return;
		foreach($cats_urls as $page_list_url){
			$this->get_page_lists($page_list_url);	
			foreach($this->page_urls as $detail_url){	
				$this->get_page_detail($detail_url);
				sleep(1);
			}
			$this->page_urls = array();			
		}
	}
}
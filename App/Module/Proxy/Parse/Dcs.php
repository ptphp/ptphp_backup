<?php
namespace Module\Proxy\Parse;
use Module\Proxy\Parse\Base\ParseBase as ParseBase;
use Module\Proxy\Parse\Base\ParseInterface as ParseInterface;
use Lib\PtCurl;

class Dcs extends ParseBase implements ParseInterface{
	var $domain = "http://www.dcsproxy.com";
	var $login_url = "http://www.dcsproxy.com/login.php?do=login";
	var $test_login_url = "http://www.dcsproxy.com/usercp.php";
	public $source = "DCS";
	var $page_urls = array();
	var $cookie = null;
	var $push = TRUE;
	
	function __construct(){
		$this->curl = new PtCurl();
	}
	
	function login(){
		$url = $this->login_url;
		#$url = "http://www.ptphp.dev/test.php";
		$data = "do=login&url=%2Fforumdisplay.php%3Ff%3D15&vb_login_md5password=c75ce8cfa90b8184147b4057dc780241&vb_login_md5password_utf=c75ce8cfa90b8184147b4057dc780241&s=&securitytoken=guest&vb_login_username=weilver&vb_login_password=";
		$res = $this->curl->post($url,$data,array(CURLOPT_HEADER=>1));
		$this->cookie = $res['cookie'];		
		//print_pre($res['cookie']);
        //exit;
		return strpos($res['body'],'Thank you for logging in, weilver.') > 0;
	}
	
	function test_login(){
		$url = $this->test_login_url;
		#$url = "http://www.ptphp.dev/test.php";
		$res = $this->curl->get($url,array(CURLOPT_COOKIE=>$this->cookie));
        $is_login = strpos($res['body'],'Welcome, weilver.') > 0;
        //var_dump($is_login);
        //exit;
		return $is_login;
	}
	
	function parseProxy($url){
		$res = $this->curl->get($url,array(
				CURLOPT_COOKIE=>$this->cookie
		));
		print_pre($res['cookie']);
		
		$m = preg_match_all('/(\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3}):([\d]+)/', $res['body'],$matches,PREG_SET_ORDER);
		$proxys = array();
		print_pre($m);
        exit;
		if($m){
			//print_pre($matches);			
			foreach ($matches as $match){
				$ip = $match[1];
				$port = $match[2];
				$proxys[] = array(
					'ip'=>$ip,
					'port'=>$port,
					'source'=>$this->source,
				);
				
				if($this->push){
					$this->handle_result($ip, $port);
				}
			}
		}
		//self::log($proxys);
		var_dump(count($proxys));
		return $proxys;
	}
	
	function get_proxy_page_lists($url)
	{
		$res = $this->curl->get($url,array(CURLOPT_COOKIE=>$this->cookie));
		$urls = array();
		preg_match_all('/Verified Time: ([^,]+),[^>]+>\s+<div>\s+<a href="([^"]+)" id="[^"]+">[^<]+<\/a>/', 
		$res['body'],$matches,PREG_SET_ORDER);
		foreach ($matches as $match){			
			$url = $match['2'];
			$date = $match['1'];
			//print_pre($url);
			$urls[] = $url;
		}
		return $urls;
	}
	
	function run(){
		$this->login();
		$url = "http://www.dcsproxy.com/anonymous-http-proxies/";
		$urls = $this->get_proxy_page_lists($url);
		foreach ($urls as $url){
			$this->parseProxy($url);
		}
	}
}
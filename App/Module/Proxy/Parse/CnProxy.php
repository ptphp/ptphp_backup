<?php
namespace Module\Proxy\Parse;
use Module\Proxy\Parse\Base\ParseBase as ParseBase;
use Module\Proxy\Parse\Base\ParseInterface as ParseInterface;
use Lib\PtCurl;

class CnProxy extends ParseBase implements ParseInterface{
	var $domain = "http://www.cnproxy.com";
	public $source = "cnproxy";
	var $page_urls = array();
    function  __construct(){
        $this->curl = new PtCurl();
    }

    function get_page_lists($url)
	{
        console("get:".$url);
        $res = $this->curl->get($url);

        console("parse js string");
        if(!preg_match('/<link[^>]+>\s+<SCRIPT[^>]+>\s+([^>]+)<\/SCRIPT>/', $res['body'], $matches)){
            console("parse js error");
            return;
        }
        $js = $matches[1];
        console("parse:".$url);
        if(!preg_match_all('/<td>(\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3})<SCRIPT[^>]+>document.write\(\":\"([a-z+]+)\)/',$res['body'],$matches,PREG_SET_ORDER)){
            console("parse proxys error");
            return;
        }
        foreach ($matches as $match){
            $ip = $match[1];
            $port_str = $match[2];
            $src_dir = __DIR__."/js";
            $cmd = "node $src_dir/api1.js '$js' '\"\"$port_str'";
            console($cmd);
            $port =  trim(shell_exec($cmd));
            if(!is_numeric($port)){
                console("proxy: ".$ip.":".$port."is invalid!");
            }else{
                console("proxy: ".$ip.":".$port);
                if($this->need_pub && $port){
                    $this->handle_result($ip,$port);
                }
            }
        }
	}
	function run(){
		for($i=1;$i<11;$i++){
			$this->get_page_lists("http://www.cnproxy.com/proxy".$i.".html");			
		}
	}
}




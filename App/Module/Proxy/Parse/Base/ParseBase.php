<?php 
namespace Module\Proxy\Parse\Base;

class ParseBase{	
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
}

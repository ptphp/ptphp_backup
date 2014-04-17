<?php
namespace PtPHP\Lib;
use Redis as Redis;
class PtRedis{
	function __construct($host = "127.0.0.1",$port = "6379"){
		$this->__redis = new Redis();
		$this->__redis->connect($host,intval($port));
	}
	
	function set($key,$value){
		$this->__redis->set($key,$value);
	}
	function get($key){
		return $this->__redis->get($key);
	}
}
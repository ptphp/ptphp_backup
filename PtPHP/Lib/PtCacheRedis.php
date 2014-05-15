<?php
namespace PtPHP\Lib;
use Redis as Redis;
class PtRedis implements PtCacheInterface{
    var $_cache;
	function __construct($host = "127.0.0.1",$port = "6379"){
		$this->_cache = new Redis();
		$this->_cache->connect($host,intval($port));
	}
	
	function set($key,$value){
		$this->_cache->set($key,$value);
	}
	function get($key){
		return $this->_cache->get($key);
	}

    function del($key){
        return $this->_cache->set($key,"");
    }
}
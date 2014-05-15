<?php
namespace PtPHP\Lib;
use Memcache as Memcache;
class PtMem implements PtCacheInterface{
    var $_cache;
	function __construct($host = "127.0.0.1",$port = "11211"){
        $this->_cache = new Memcache;
        $this->_cache->connect($host, $port);
	}
	
	function set($key,$value){
		$this->_cache->set($key,$value);
	}
	function get($key){
		return $this->_cache->get($key);
	}
}
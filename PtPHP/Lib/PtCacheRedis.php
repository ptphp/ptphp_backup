<?php
namespace Lib;
use Redis as Redis;
class PtCacheRedis implements PtCacheInterface{
    var $_cache;
    var $config = array(
        "host" => "127.0.0.1",
        "port" => 6379,
    );
	function __construct($config){
		$this->_cache = new Redis();
        $this->_cache->connect($config['host'], intval($config['port']));
	}

    function set($key,$value){
        $this->_cache->set($key,$value);
    }
    function get($key,$time = -1){
        return $this->_cache->get($key);
    }
    function del($key){
        return $this->_cache->set($key,"");
    }
}
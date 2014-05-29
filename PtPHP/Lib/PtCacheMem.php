<?php
namespace Lib;
use Memcache as Memcache;
class PtCacheMem implements PtCacheInterface{
    var $obj;
    var $config = array(
        "host" => "127.0.0.1",
        "port" => 11211,
    );
	function __construct($config){
        $this->obj = new Memcache();
        $this->obj->connect($config['host'], intval($config['port']));
	}
    function __call($name, $arguments){
        return call_user_func_array(array($this->obj,$name),$arguments);
    }

}
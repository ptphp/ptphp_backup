<?php
namespace Lib;
use Redis as Redis;
class PtCacheRedis implements PtCacheInterface{
    var $obj;
    var $config = array(
        "host" => "127.0.0.1",
        "port" => 6379,
    );

	function __construct($config){
	    $this->obj  = new Redis();
        if(isset($config['pconnect']) && $config['pconnect']){
            $this->obj->pconnect($config['host'],intval($config['port']));
        }else{
            $this->obj->connect($config['host'],intval($config['port']));
        }
	}

    function __call($name, $arguments){
        return call_user_func_array(array($this->obj,$name),$arguments);
    }
}
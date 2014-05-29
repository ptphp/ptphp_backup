<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 14-5-15
 * Time: 上午11:45
 */

namespace Lib;

require_once PATH_PTPHP."/Ext/SSDB.php";

class PtCacheSSDB implements PtCacheInterface{
    var $obj;

    var $config = array(
        "host" => "127.0.0.1",
        "port" => 8430,
    );
    function __construct($config){
        $host = $config['host'];
        $port = $config['port'];
       try{
           $this->obj = new \SimpleSSDB($host, $port);
            //$ssdb->easy();
        }catch(Exception $e){
            die(__LINE__ . ' ' . $e->getMessage());
        }
    }

    function __call($name, $arguments){
        return call_user_func_array(array($this->obj,$name),$arguments);
    }
}
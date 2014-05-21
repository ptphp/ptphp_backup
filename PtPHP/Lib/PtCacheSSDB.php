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
    var $_cache;
    var $org;
    var $config = array(
        "host" => "127.0.0.1",
        "port" => 8430,
    );
    function __construct($config){
        $host = $config['host'];
        $port = $config['port'];
       try{
           $this->_cache = new \SimpleSSDB($host, $port);
            //$ssdb->easy();
        }catch(Exception $e){
            die(__LINE__ . ' ' . $e->getMessage());
        }
        $this->org = $this->_cache;
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
<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 14-5-15
 * Time: 上午11:45
 */

namespace Lib;
require_once PATH_PTPHP."/Ext/SSDB.php";

class PtSSDB implements PtCacheInterface{
    var $_cache;
    function __construct($host = "127.0.0.1",$port = "8888"){
       try{
           $this->_cache = new \SimpleSSDB($host, $port);
            //$ssdb->easy();
        }catch(Exception $e){
            die(__LINE__ . ' ' . $e->getMessage());
        }
    }

    function set($key,$value){
        $this->_cache->set($key,$value);
    }
    function get($key){
        return $this->_cache->get($key);
    }
    function del(){

    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 14-5-15
 * Time: 下午1:16
 */

namespace Lib;


class PtMemTest extends \PHPUnit_Framework_TestCase {
    function setUp(){
        exit;
        $config = array(
            "host"=>"127.0.0.1",
            "port"=>11211,
        );
        $this->cache = new PtCacheMem($config);
    }
    function test_set(){
        for($i = 0;$i < 100000 ;$i++){
            $key = "tset".$i;
            console($key);
            $this->cache->set($key,"safsdsfs");
        }
    }

    function test_get(){
        echo  $this->cache->get("tset");
    }
    function test_del(){
        $this->cache->del("tset");
        echo  $this->cache->get("tset");
    }

}

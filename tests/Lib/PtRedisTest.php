<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 14-5-15
 * Time: 下午1:24
 */

namespace Lib;


class PtRedisTest extends \PHPUnit_Framework_TestCase {
    function setUp(){
        $config = array(
            "host"=>"127.0.0.1",
            "port"=>6379,
        );
        $this->cache = new PtCacheRedis($config);
    }
    function test_set(){
        $this->cache->set("tset","safsdsfs");
    }

    function test_get(){
        echo  $this->cache->get("tset");
    }
    function test_del(){
        $this->cache->del("tset");
        echo  $this->cache->get("tset");
    }
}
 
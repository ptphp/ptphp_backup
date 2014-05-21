<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 14-5-15
 * Time: 下午12:51
 */

namespace Lib;

class PtFileCacheTest extends \PHPUnit_Framework_TestCase {
    function setUp(){
        $config = array(
            "cache_dir"=>"c:\\tmp",
            "length"=>3000,
        );
        $this->cache = new PtCacheFile($config);
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

<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 14-5-15
 * Time: 下午1:33
 */

namespace Lib;

class PtCacheTest extends \PHPUnit_Framework_TestCase {
    function __construct(){
        $this->cache_file  = PtCache::init("file");
        $this->cache_redis  = PtCache::init("redis");
        $this->cache_mem  = PtCache::init("mem");
        #$this->cache_ssdb  = PtCache::init("SSDB");
    }
    function setUp(){


    }
    function test_set(){
        $this->cache_file->set("test","cache_file");
        $this->cache_redis->set("test","cache_redis");
        $this->cache_mem->set("test","cache_mem");
        #$this->cache_ssdb->set("test","cache_ssdb");
    }
    function test_get(){
        console($this->cache_file->get("test"));
        console($this->cache_redis->get("test"));
        console($this->cache_mem->get("test"));
        #console($this->cache_ssdb->get("test"));
    }
    function test_del(){
        $this->cache_file->del("test");
        $this->cache_redis->del("test");
        $this->cache_mem->del("test");
        #$this->cache_ssdb->del("test");
    }
}
 
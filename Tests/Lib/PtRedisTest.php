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

    function test_page(){
        #for ($i=0;$i<25000;$i++)
        #	$this->redis->__redis->lpush('mylist',$i);

        $length = $this->cache->org->llen('mylist');

        $pagesize = 5;
        $pageno = max(1,7);
        $totalpage = ceil($length/$pagesize);
        $start = ($pageno-1)*$pagesize;
        $end = $start+$pagesize;

        $lists = $this->cache->org->lrange('mylist',$start,$end);

        var_dump($lists);
    }
}
 
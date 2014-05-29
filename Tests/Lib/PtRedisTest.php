<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 14-5-15
 * Time: 下午1:24
 */

namespace Lib;


class PtRedisTest extends \PHPUnit_Framework_TestCase {
    var $cache;
    function __construct(){
        $config = array(
            "host"=>"127.0.0.1",
            "port"=>6379,
        );
        $this->cache = new PtCacheRedis($config);
    }
    function setUp(){

    }
    function test_set(){
        $this->cache->set("test","safsdsfs");
    }

    function test_get(){
        $value =  $this->cache->get("test");
        PtConsole::log($value);
    }
    function test_del(){
        $this->cache->del("test");
        echo  $this->cache->get("test");
    }

    function test_page(){
        for ($i=0;$i<25000;$i++)
        	$this->cache->lpush('mylist',$i);

        $length = $this->cache->obj->llen('mylist');

        $pagesize = 5;
        $pageno = max(1,7);
        $totalpage = ceil($length/$pagesize);
        $start = ($pageno-1)*$pagesize;
        $end = $start+$pagesize;

        $lists = $this->cache->obj->lrange('mylist',$start,$end);

        var_dump($lists);
    }
}
 
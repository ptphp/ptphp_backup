<?php
require_once('PtPHP/boot_test.php');

class TestPtRedis extends UnitTestCase{	
	function setUp(){
		$this->redis = new PtPHP\Lib\PtRedis();
	}
	
	function test_set(){
		$this->redis->set("test",time());
		$this->assertTrue($this->redis->get("test"));
	}
	function test_page(){		
		#for ($i=0;$i<25000;$i++)
		#	$this->redis->__redis->lpush('mylist',$i);
				
		$length = $this->redis->__redis->llen('mylist');
		
		$pagesize = 5;
		$pageno = max(1,7);
		$totalpage = ceil($length/$pagesize);		
		$start = ($pageno-1)*$pagesize;
		$end = $start+$pagesize;
		
		$lists = $this->redis->__redis->lrange('mylist',$start,$end);

		var_dump($lists);
	}
	
}

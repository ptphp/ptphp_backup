<?php

class test_proxy_parse_proxy174 extends PtTestCase{
	var $obj;
	function setUp(){
		$this->obj = new Module\Proxy\Parse\Proxy174();
		$this->obj->need_pub =FALSE;
	}
	
	public function test_included()
	{		
		$this->assertTrue(class_exists("Module\Proxy\Parse\Proxy174"));
	}
	function test_get_list(){
		$this->obj->get_list();
	}
}
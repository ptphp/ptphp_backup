<?php
class test_proxy_parse_cnproxy extends PtTestCase {
	var $obj;
	function setUp(){
		$this->obj = new Module\Proxy\Parse\CnProxy();
		$this->obj->need_pub =FALSE;
		$this->obj->curl->_proxy = "127.0.0.1:8888";
	}

	public function test_included()
	{
		$this->assertTrue(class_exists("Module\Proxy\Parse\CnProxy"));
	}
	function test_run(){
		$this->obj->run();
	}
}
<?php
class test_proxy_parse_freeproxylist extends PtTestCase{
	var $obj;
	function setUp(){
		$this->obj = new Module\Proxy\Parse\FreeProxyList();
		$this->obj->need_pub =FALSE;
		$this->obj->curl->_proxy = "127.0.0.1:8888";
	}
	public function test_included()
	{
		$this->assertTrue(class_exists("Module\Proxy\Parse\FreeProxyList"));
	}
	function test_run(){
		$this->obj->run();
	}
}
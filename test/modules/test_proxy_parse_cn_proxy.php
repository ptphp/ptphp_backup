<?php
class test_proxy_parse_cn_proxy extends PtTestCase {
	var $obj;
	function setUp(){
		$this->obj = new Module\Proxy\Parse\Cn_Proxy();
		$this->obj->need_pub =FALSE;
		$this->obj->curl->_proxy = "127.0.0.1:8888";
	}

	public function test_included()
	{
		$this->assertTrue(class_exists("Module\Proxy\Parse\Cn_Proxy"));
	}

	function test_run(){
		$this->obj->run();
	}
}
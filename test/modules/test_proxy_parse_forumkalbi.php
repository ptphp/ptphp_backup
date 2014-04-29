<?php

class test_proxy_parse_forumkalbi extends PtTestCase{
	var $obj;
	function setUp(){
		$this->obj = new Module\Proxy\Parse\Forumkalbi();
		$this->obj->need_pub =FALSE;
		$this->obj->curl->_proxy = "127.0.0.1:8888";
	}
	public function test_included()
	{
		$this->assertTrue(class_exists("Module\Proxy\Parse\Forumkalbi"));
	}
	function test_get_list(){
		$this->obj->get_list();
	}
}
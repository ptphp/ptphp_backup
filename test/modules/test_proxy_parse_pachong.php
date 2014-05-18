<?php
class test_proxy_parse_pachong extends PtTestCase{
	var $obj;
	function setUp(){
		$this->obj = new Module\Proxy\Parse\Pachong();
		$this->obj->need_pub =FALSE;
		$this->obj->curl->_proxy = "127.0.0.1:8888";
	}
	public function test_included()
	{
		$this->assertTrue(class_exists("Module\Proxy\Parse\Pachong"));
	}
    function test_get_page_detail(){
        $this->obj->get_page_detail("http://pachong.org/anonymous.html");
    }
    function test_run(){
        $this->obj->run();
    }
}
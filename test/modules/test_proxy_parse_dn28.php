<?php
class test_proxy_parse_cnproxy extends PtTestCase {
	var $obj;
	function setUp(){
		$this->obj = new Module\Proxy\Parse\Dn28();
		$this->obj->need_pub =FALSE;
		$this->obj->curl->_proxy = "127.0.0.1:8888";
	}

	public function test_included()
	{
		$this->assertTrue(class_exists("Module\Proxy\Parse\Dn28"));
	}
    function test_get_page_lists(){
        $url = "http://www.dn28.com/html/26/category-catid-126.html";
        $this->obj->get_page_lists($url);
    }
    function test_get_page_detail(){
        $url = "http://www.dn28.com/html/51/n-6751.html";
        $this->obj->get_page_detail($url);
    }
	function test_run(){
		$this->obj->run();
	}
}
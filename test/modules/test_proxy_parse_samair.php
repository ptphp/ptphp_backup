<?php
class test_proxy_parse_samair extends PtTestCase{
	var $obj;
	function setUp(){
		$this->obj = new Module\Proxy\Parse\Samair();
		$this->obj->need_pub =FALSE;
		$this->obj->curl->_proxy = "127.0.0.1:8888";
	}
	public function test_included()
	{
		$this->assertTrue(class_exists("Module\Proxy\Parse\Samair"));
	}
    function test_get_page_lists(){
        $this->obj->get_page_lists("http://www.samair.ru/proxy/proxy-04.htm");
    }

	function test_run(){
		$this->obj->run();
	}
	function test_api_js(){
		$this->obj->api_js('+j+p+j+p',"j=8;a=1;g=9;d=3;c=5;i=6;b=0;e=4;h=2;f=7;","||||||||||x|p|l|k|s|r||z||");
	}
}
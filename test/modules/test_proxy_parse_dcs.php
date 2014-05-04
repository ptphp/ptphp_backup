<?php
class test_proxy_parse_dcs extends PtTestCase {
	var $obj;
	function setUp(){
		$this->obj = new Module\Proxy\Parse\Dcs();
		$this->obj->need_pub =FALSE;
		$this->obj->curl->_proxy = "127.0.0.1:8888";
	}

	public function test_included()
	{
		$this->assertTrue(class_exists("Module\Proxy\Parse\Dcs"));
	}
    function test_LoginFunctionExists(){
        $this->assertTrue(method_exists($this->obj,'login'));
    }

    function test_Login(){
        #$this->assertTrue($this->obj->login());
        #print_r($this->obj->cookie);
        if(False == $this->obj->test_login()){
            $this->obj->login();
        }
        $this->assertTrue($this->obj->test_login());
    }

    function test_ParseProxy(){
        $this->test_Login();
        $url = "http://www.dcsproxy.com/anonymous-http-proxies/36899-2014-03-31-275-scrapebox-passed-http-proxies-freshly-verified-w-screenshot.html";
        $this->obj->curl->cache = true;
        $this->obj->curl->del_cache = true;
        $res = $this->obj->parseProxy($url);
        //print_pre($res);
        //print_pre($this->obj->curl->cache_file);
        $this->assertTrue(count($res) > 0);

    }

    function test_get_proxy_page_lists(){
        $url = "http://www.dcsproxy.com/anonymous-http-proxies/";
        $this->obj->curl->cache = true;
        $this->obj->curl->del_cache = true;
        $res = $this->obj->get_proxy_page_lists($url);
        $this->assertTrue(count($res) > 0);
    }

    function test_Run(){
        $this->obj->curl->cache = false;
        $this->obj->run();
    }
}
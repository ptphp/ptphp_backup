<?php
set_include_path("C:\Users\joseph\Desktop\workspace\PtPHP".PATH_SEPARATOR.get_include_path());

require_once('PtExt/simpletest/autorun.php');

class TestPtCurl extends UnitTestCase{
	
	function setUp(){
		
	}
	function test_open(){
		$this->assertTrue(0);
	}
}
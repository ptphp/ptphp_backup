<?php
class test_user extends PtTestCase
{
	public function __construct()
	{
		parent::__construct('Model');	
	}	
	
	public function test_included()
	{		
		$this->assertTrue(class_exists("Model\Proxy"));
	}

}

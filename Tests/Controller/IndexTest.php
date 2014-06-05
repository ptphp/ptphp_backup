<?php
namespace Controller;

class IndexTest extends \PHPUnit_Framework_TestCase {
    function test_tset(){
        $data =array("tst"=>1);
        $this->assertTrue(is_array($data));
    }
}

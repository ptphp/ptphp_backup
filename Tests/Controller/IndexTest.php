<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 14-5-20
 * Time: 下午2:11
 */

namespace Controller;

class IndexTest extends \PHPUnit_Framework_TestCase {
    function test_tset(){
        $data =array("tst"=>1);
        $this->assertTrue(is_array($data));
    }
}
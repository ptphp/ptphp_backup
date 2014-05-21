<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 14-5-21
 * Time: 上午9:39
 */




class InitTest extends PHPUnit_Framework_TestCase {
    function test_is_win(){
        $this->assertTrue(is_win());
    }
    function test_get_pid(){
        echo get_pid();
    }
    function test_console(){
        console("test");
    }

}
 
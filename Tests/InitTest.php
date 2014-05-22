<?php
class InitTest extends PHPUnit_Framework_TestCase {
    function test_is_win(){
        $this->assertTrue(is_win());
    }
    function test_get_pid(){
        echo get_pid();
    }
    function test_console(){
        set_test("test");
    }
}
<?php
class InitTest extends PHPUnit_Framework_TestCase {
    function test_get_pid(){
        #echo get_pid();
        Console::log("tset {1}{2}","test",array(1));
        $this->assertTrue(True);
    }
    function test_console(){
        #set_test("test");
        $this->assertTrue(True);
    }
}
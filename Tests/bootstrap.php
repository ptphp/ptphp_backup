<?php
define("PATH_PRO", dirname(__DIR__));
require PATH_PRO."/App/boot.php";

class BaseTestCase extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        #$GLOBALS
    }

    public function tearDown()
    {

    }
}

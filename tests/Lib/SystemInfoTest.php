<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 14-5-21
 * Time: 上午10:41
 */

namespace Lib;


class SystemInfoTest extends \PHPUnit_Framework_TestCase {
    function test_get_pid(){
        echo getmypid() ;
        $sys = new SystemInfo();
        print_r($sys->mac_addr) ;
    }
}
 
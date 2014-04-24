<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-3-9
 * Time: 下午10:03
 * To change this template use File | Settings | File Templates.
 */
class Test extends CodeIgniterUnitTestCase
{
    public function __construct()
    {
        parent::__construct('test controll');
    }
    public function test1()
    {
        $this->assertEqual(11,11);
    }
}
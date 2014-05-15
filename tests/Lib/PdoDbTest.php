<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 14-5-15
 * Time: 上午11:18
 */
namespace Lib;

class PdoDbTest extends \PHPUnit_Framework_TestCase {
    var $db;
    function setUp(){
        PtDb::$config = array(
            'default'=>array(
                'type'=>'mysql',
                'host'=>'127.0.0.1',
                'port'=>3306,
                'dbname'=>'mysql',
                'dbuser'=>'root',
                'dbpass'=>'root',
                'charset'=>'utf8',
            )
        );
        $this->db = PtDb::init("default");
    }
    function test_include(){

    }
}
 
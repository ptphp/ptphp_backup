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
                'dbname'=>'test',
                'dbuser'=>'root',
                'dbpass'=>'root',
                'charset'=>'utf8',
            )
        );
        $this->db = PtDb::init("default");
    }

    function test_runSql(){

    }
    function test_query(){

    }
    function test_getOne(){

    }
    function test_getAll(){

    }
    function test_exec(){
        $sql = "
CREATE TABLE `test_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(255) DEFAULT NULL COMMENT 'username',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8
 ";
        $this->db->exec($sql);
    }
    function test_exec_many(){
        $sql = "
CREATE TABLE `test_user2111` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(255) DEFAULT NULL COMMENT 'username',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `test_user2121` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(255) DEFAULT NULL COMMENT 'username',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8
 ";
        echo $this->db->exec($sql);

        $sql = "
CREATE TABLE `test_user3111` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(255) DEFAULT NULL COMMENT 'username',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `test_user3121` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(255) DEFAULT NULL COMMENT 'username',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8
 ";
        echo $this->db->exec($sql);

    }

    function test_drop_table(){

        $tables = $this->db->listTables("test_%");
        foreach($tables as $table){
            $sql = 'DROP TABLE '.$table;
            console($sql);
            $this->db->exec($sql);
        }
    }

    function test_show_tables(){
        $tables = $this->db->listTables("test_%");
        console($tables);
    }
    function test_desc_table(){
        $tablename = "test_user_desc";
        $sql = "
CREATE TABLE if not exists `$tablename` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(255) DEFAULT NULL COMMENT 'username',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8
 ";

        $this->db->exec($sql);
        $des = $this->db->descTable($tablename);
        console($des);
        $des = $this->db->showCreateTable($tablename);
        console($des);
        $this->db->exec("drop table if exists ".$tablename);
    }
}
 
<?php
/**
 * Created by PhpStorm.
 * User: Amy
 * Date: 14-5-16
 * Time: 上午9:27
 */

namespace Lib;


class PtAmqpTest extends \PHPUnit_Framework_TestCase {
    function test_push(){
        $amq = new PtAmqp();
        $config = array(
            "host"=>"al.ptphp.com",
            "port"=>5672,
            "username"=>"guest",
            "password"=>"guest",
        );
        $amq->connect($config);

        $amq->queue_declare("hello");
        for($i = 0;$i < 200 ;$i++){
            $amq->push("from php 看看 =>".$i);
            sleep(1);
        }

    }
    function test_pull(){
        $amq = new PtAmqp();
        $config = array(
            "host"=>"www.ptphp.com",
            "port"=>5672,
            "username"=>"guest",
            "password"=>"guest",
        );
        $amq->connect($config);
        $amq->queue_declare("hello");
        $callback = function($msg) {
            console(" [x] Received ".$msg->body) ;
        };
        $amq->pull($callback);
    }


}
 
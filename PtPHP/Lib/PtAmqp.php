<?php
namespace Lib;
use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;

class PtAmqp {
    var $config = array(
        "host"=>"www.ptphp.com",
        "port"=>5672,
        "username"=>"guest",
        "password"=>"guest",
    );
    var $conn;
    var $channel;
    var $queue;
    function connect($config){
        $this->conn = new AMQPConnection(
            $config['host'],
            intval($config['port']),
            $config['username'],
            $config['password']
            );
        $this->channel = $this->conn->channel();
    }
    function queue_declare($q){
        $this->queue = $q;
        $this->channel->queue_declare($q, false, false, false, false);
    }
    function push($msg,$q = ""){
        $msg_obj = new AMQPMessage($msg);
        if($q){
            $this->queue_declare($q);
        }
        $this->channel->basic_publish($msg_obj, '', $this->queue);
        console(" [x] Sent '$msg!'");
    }

    function pull($callback){
        console(' [*] Waiting for messages. To exit press CTRL+C');
        $this->channel->basic_consume($this->queue, '', false, true, false, false, $callback);
        while(count($this->channel->callbacks)) {
            $this->channel->wait();
            sleep(1);
        }
    }
    function close(){
        #$this->channel->close();
        $this->conn->close();
    }
    function __destruct(){
        #$this->close();
    }
} 
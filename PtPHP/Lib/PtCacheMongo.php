<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 14-5-15
 * Time: 上午11:41
 */

namespace Lib;

class PtMongo {
    function __construct($host = "127.0.0.1",$port = "27017"){
        $this->_mongo = new Mongo("mongodb://".$host.":".$port."/admin:admin");
    }
} 
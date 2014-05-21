<?php
namespace Controller\Log;
class Index{
    function get(){
        $url = "http://chat.ptphp.com/icomet/poll?cname=log&cb=icomet_cb&seq=";
        include View('log/index');
    }
}

class Push{
    function get(){
        $curl = new \Lib\PtCurl();
        $cname = isset($_GET['cname'])?$_GET['cname']:"log";
        $content = isset($_GET['content'])?$_GET['content']:"content";
        $cache  = \Lib\PtCache::init("SSDB")->org;
        $cache->set("test","ssfd11");
        $url = "http://chat.ptphp.com/push/push?cname=".$cname."&content=".$content;
        $curl->get($url);
    }
}
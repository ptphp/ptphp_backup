<?php
namespace Controller\Log;
class Index{
    function get(){
        #http://chat.ptphp.com/push/push?cname=log&content=1111111
        $url = "http://chat.ptphp.com/icomet/poll?cname=log&cb=icomet_cb&seq=";
        include View('log/index');
    }
}
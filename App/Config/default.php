<?php
$PT_MODE = get_mode();
if($PT_MODE === FALSE){
    $config['mode'] = "product";
}else{
    $config['mode'] = $PT_MODE;
}
$config['develop']['debug'] = 1;
$config['product']['debug'] = FALSE;

$config['namespaces']= array(
    'PhpAmqpLib'=>"E:\\usr\\local\\php\\lib\\php-amqplib",
);
<?php
$PT_MODE = getenv('PT_MODE');

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
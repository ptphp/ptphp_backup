<?php
$config['debug'] = FALSE;
$config['mode'] = "develop";

$config['namespaces']= array(

);

$config['db']["develop"] = array(
    'default'=>array(
        'type'=>'mysql',
        'host'=>'127.0.0.1',
        'port'=>3306,
        'dbname'=>'root',
        'dbuser'=>'root',
        'dbpass'=>'root',
        'charset'=>'utf8',
    )
);

$config['cache']["develop"] = array(
    'file'=>array(
        'cache_dir' => PATH_PRO.'/tmp/filecache',
        'length'    => 3000,
    ),
    'redis'=>array(
        'host' => '127.0.0.1',
        'port' => 6379,
    ),
    'mem'=>array(
        'host' => '127.0.0.1',
        'port' => 11211,
    ),
    'SSDB'=>array(
        'host' => '127.0.0.1',
        'port' => 8430,
    )
);
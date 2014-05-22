PtPHP Framework

===================

[![Build Status](https://travis-ci.org/ptphp/PtPHP.svg)](https://travis-ci.org/ptphp/PtPHP)

**Requirements: PHP 5.3** + due to the use of `namespaces`.


# 配置 #


## 开发 ##

`nginx`

    fastcgi_param PT_MODE develop;

`App/Config/default.php`

    $config['develop'] = array(
        "debug" => 0
    );

## 测试 ##

`nginx`

    fastcgi_param PT_MODE test;

`App/Config/default.php`

    $config['test'] = array(
        "debug" => 0
    );

## 生产 ##

    $config['product'] = array(
        "debug" => 0
    );
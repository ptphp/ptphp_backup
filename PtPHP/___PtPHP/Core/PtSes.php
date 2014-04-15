<?php
namespace Core;
class PtSes{
    static function auth($type = '',$login = '/',$admin = 'user'){
            
        global $config;
        if(!$type){
            if(!isset($_SESSION[$admin])){
                    header('Content-Type:text/html;charset=utf-8');
                    $location = $login."?r=".$_SERVER['REQUEST_URI'];                        
                    alert('您没有登陆',$location);
            }
        }else{
                if(!isset($_SERVER['PHP_AUTH_USER']) || ($_SERVER['PHP_AUTH_PW']!= $config['admin']['password'] || $_SERVER['PHP_AUTH_USER'] != $config['admin']['username'])|| !$_SERVER['PHP_AUTH_USER'])
                {
                        header('WWW-Authenticate: Basic realm="ADMIN auth"');
                        header('HTTP/1.0 401 Unauthorized');
                        echo 'Auth failed';
                        exit;
                }
                //PtSes::set(array('admin'=>array('username'=>$_SERVER['PHP_AUTH_USER'])));
        }
    }

    static function get($key){
            if(isset($_SESSION[$key]) && $_SESSION[$key]){
                    return $_SESSION[$key];
            }else{
                    return '';
            }
    }
    static function set($key,$value){
            $_SESSION[$key] = $value;
    }
    static function user($key){
            if(isset($_SESSION['user'][$key]) && $_SESSION['user'][$key] != ''){
                    return $_SESSION['user'][$key];
            }else{
                    return '';
            }
    }
    static function admin($key){
            if(isset($_SESSION['admin'][$key]) && $_SESSION['admin'][$key]){
                    return $_SESSION['admin'][$key];
            }else{
                    return '';
            }
    }
}
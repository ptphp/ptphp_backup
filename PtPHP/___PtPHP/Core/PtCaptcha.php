<?php
namespace Core;
use SimpleCaptcha as SimpleCaptcha;
class PtCaptcha {
    static function setCaptcha($key){
        include PATH_PTPHP.'/Lib/Ext/captcha/main.php';
        $captcha = new SimpleCaptcha();
        $type = isset($type)?$type:'img';
        $captcha->session_var = $key;
        $captcha->CreateImage();
    }
    static function verify($captcha,$key) {
        if(!$captcha)
            alert('验证码不能为空');

        $_captcha = '';
        if(isset($_SESSION['captcha']) && isset($_SESSION['captcha'][$key])){
            $_captcha = $_SESSION['captcha'][$key];
        }

        if(strtolower($captcha) != $_captcha){
            alert('验证码不正确！');
        }
    }
}
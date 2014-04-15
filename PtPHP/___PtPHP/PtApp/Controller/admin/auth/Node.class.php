<?php
class Login extends PtNode{    
    function get($r){     
        if(is_admin())
            alert('您已登陆','/admin/index.html');        
        $this->var['r'] = '/admin/index.html';
    }
    
    function post($account,$passwd,$redirect,$captcha){
        $userObj = new Model\Admin\PtUser();
        $userObj->admin_login($account,$passwd,$redirect,$captcha);        
    }    
}

class Logout extends PtNode{
    function get(){
        $user = new Model\Admin\PtUser();
        $user->admin_logout();
    }	
}
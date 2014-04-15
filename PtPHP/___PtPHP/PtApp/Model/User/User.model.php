<?php
namespace Model\User;
use Core\PtModel as PtModel;
use Core\PtCaptcha as PtCaptcha;
use Core\PtPassword as PtPassword;
use Core\PtFilter as Ptfilter;

use PtMailer as PtMailer;
//include PATH_PTEXT."/PtMailer/PtMailer.class.php";

class User extends PtModel{
    var $table  = "users";
    var $pk     = "user_id";
    
    function getUserList($page= 1,$limit = 50) {
        $from = "from {$this->table} where 1=1 order by {$this->pk} desc"; 
        $data = self::db()->pager(
                        "select count({$this->pk}) ",
                        "select * ",
                        $from,
                        $limit,$page);
                        
        return $data;
    }
    
    function deleteByPk($id) {
        parent::deleteByPk($id);
    }
    
    function changePasswd($user_id,$password,$new_password,$re_password){
        global $config;
        
        if(mb_strlen($new_password)<6)
            alert(array('msg'=>'新密码不能少于6位'));
        
        if($new_password != $re_password)
            alert(array('msg'=>'新密码与重复新密码不一致！'));        
        
        $user = $this->getUserById($user_id);
        $_passwd = md5($config['secret_key'].md5($password));
        
        if(!PtPassword::verify($user['user_pwd'], $_passwd))
            alert(array('msg'=>'原密码输入不正确！'));
        
        $this->db()->update('users',array('user_pwd'=>PtPassword::hash(md5($config['secret_key'].md5($new_password)))),array('user_id'=>$user_id));
        
    }
    
    function saveByEmailVerified($passwd,$re_passwd,$idcard,$realname,$email,$ac){
        
        if(!$passwd || !$re_passwd || !$idcard || !$realname)
            alert("数据不能为空");
        
        if($passwd != $re_passwd)
            alert("两次密码不一致");
        
        $idcard     = html($idcard);
        $realname   = html($realname);
        
        global $config;
        if($this->checkExistsEmailAccount($email))
            alert($email."已存在");
        
        $row = array();
        $row['user_email']      = $email;
        $row['user_pwd']        = PtPassword::hash(md5($config['secret_key'].$passwd));
        $row['user_addtime']    = fDate();
        $row['user_rn']         = $realname;
        $row['user_idcard']     = $idcard;
        $user_id = self::db()->insert('users',$row);
        if(!$user_id){
            alert("系统错误");
        }        
        self::db()->update('user_email_verify',array('uev_status'=>1),array('uev_hash'=>$ac));
        $this->setLogin($user_id); 
    }
    
    function validEmail($hash,$email){
        $t = fDate(time()-3600*24);
        $res = self::db()->getOne("select uev_id,user_email from user_email_verify where uev_hash = :hash and uev_status = 0 and uev_addtime >= :t",array('hash'=>$hash,'t'=>$t));
        
        return (!$res || $res['user_email'] != $email) ? false :true;        
    }
    function sendEmailVerifyUrl($email){
        $hash = md5(time().$email);
        $row = array();
        $row['user_email']  = $email;
        $row['uev_hash']    = $hash;
        $row['uev_addtime'] = fDate();
        
        if(self::db()->insert("user_email_verify",$row)){
            global $config;
            $email_urlencode = urlencode($email);
            $hash_url = $config[PT_ENV]['user_email_valid_url']."?ac={$hash}&email={$email_urlencode}";
            
            $email_content = <<< eof
亲爱的{$email}，<br>

您距离成功注册爱码只差一步了。<br><br>


如果点击无效，请复制下方网页地址到浏览器地址栏中打开：<br>
<a href="{$hash_url}">{$hash_url}</a><br><br><br><br>
为什么我会收到这封邮件？<br>

您在注册爱码网站时，填写了此电子邮箱作为账户名，我们发送这封邮件，以确认您的确是邮箱的主人。<br>
如果您没有注册爱码，请忽略此邮件。可能是有人在注册时填错了自己的邮箱。<br><br>

此为系统邮件，请勿回复  Copyright 爱码 2008-2013 All Right Reserved

eof;
            
            $mail = new PtMailer();
            if(PHP_OS != "Linux"){
                $res_mail = $mail->send1($email,"爱码网络",'请激活您的爱码账户！',$email_content,1);
            }else{
                $res_mail = $mail->send($email,"爱码网络",'请激活您的爱码账户！',$email_content,1);
            }
            //PtLog::debug($mail->debugMsg,"mail_debug");
            if($res_mail){
                $_SESSION['user_email_verify'] = $email;
                success(array('email'=>$email));
            }
            else                
                alert("邮件发送失败，请重新再试！");
        }else{
            alert("邮箱写入错误!");
        }
        
    }
    
    function sendMobileCaptcha($mobile){        
        if(1){
            $_SESSION['user_mobile_verify'] = $mobile;
            success(array('mobile'=>$mobile));
        }
        else                
            alert("邮件发送失败，请重新再试！");
    }
    function checkExistsEmailAccount($email){
        return self::db()->getOne("select user_id from {$this->table} where user_email = :email",array("email"=>$email)) ? true:false;
    }
    function checkExistsMobileAccount($mobile){
        return self::db()->getOne("select user_id from {$this->table} where user_mobile = :mobile",array("mobile"=>$mobile)) ? true:false;
    }
    function regCheckAcount($account,$captcha){
        if(!$account)
            alert("帐户名不能为空`!");

        PtCaptcha::verify($captcha, "reg");
        $email = false;
        if(PtFilter::email($account)){//email
           $email = true;
        }else{
           if(!Ptfilter::mobile($account))
               alert("手机号不合法！");
        }
        if($email){
            if($this->checkExistsEmailAccount($account))
                alert("邮箱账户已存在！");
            else                
                $this->sendEmailVerifyUrl($account);
        }else{
            if($this->checkExistsMobileAccount($account))
                alert("手机账户已存在！");
            else                
                $this->sendMobileCaptcha($account);
        }
    }

    function logout(){
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }
        location("/");
    }

    function login($account,$passwd,$captcha,$redirect) {
        if(!$account)
            alert("帐户不能为空");
        
        if(!$passwd)
            alert("密码不能为空");
        $_SESSION['need_captcha'] = 0;
        if($captcha || (isset($_SESSION['need_captcha']) && $_SESSION['need_captcha'] >= 3)){            
            PtCaptcha::verify($captcha, "login");
        }
        
        $user = $this->getUserByEmail($account);
        global $config;
        $_passwd = md5($config['secret_key'].$passwd);
        if(!PtPassword::verify($user['user_pwd'], $_passwd)){            
            if(!isset($_SESSION['need_captcha']))
                $_SESSION['need_captcha'] =1;
            else
                $_SESSION['need_captcha'] += 1;
            
            alert("帐户和密码不正确！");
        }
        $this->setLogin($user['user_id']);   
        
        if(!$redirect){
            $redirect = "/user/";
        }
        unset($_SESSION['captcha']);
        $_SESSION['need_captcha'] = 0;
        success(array('location'=>$redirect));
            
    }
    
    function getUserByEmail($email){
        $user = self::db()->getOne("select * from users where user_email = :email",array('email'=>$email));		
        return $user?$user:false;		
    }
    function getUserById($user_id){
        $user = self::db()->getOne("select * from users where user_id = :id",array('id'=>$user_id));		
        return $user?$user:false;		
    }
    function setLogin($user_id){
        $user = $this->getUserById($user_id);
        $_SESSION['user'] = $user;
    }	
}
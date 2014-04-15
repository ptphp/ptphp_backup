<?php
namespace Model\Admin;
use Core\PtModel as PtModel;
use Core\PtCaptcha as PtCaptcha;
use Core\PtPassword as PtPassword;

class PtUser extends PtModel{   
    function genPassword($password){
        return PtPassword::hash($password);
    }
    function admin_logout(){
        unset($_SESSION['admin']);
        location('/');
    }
    
    function admin_login($username,$password,$redirect = null,$captcha){			
        PtCaptcha::verify($captcha, 'login_admin');        
        if(!$username)
            alert("用户名不能为空");

        if(!$password)
            alert("密码不能为空");
        
        $username = html($username);
        if($username == 'admin'){      
            if($password != '304f33621a85a7ad66a924771ea2f2d7'){
                alert("用户和密码不正确!!");
            }
            $user['user_name'] = 'admin';
            $user['user_id']   = 0;
            $user['role_id']   = 0;
        }else{
        	alert("用户名和密码不正确!");
        }
        
        unset($_SESSION['captcha']);
        $this->setAdminLogin($user);
        
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }
        
        if($redirect){
            location($redirect);
        }else{
            location("/");
        }		
    }

    function getUserById($id){
        $id = intval($id);
        return self::db()->getOne("select * from pt_user where user_id = :id",array('id'=>$id));
    }
    /**
     *
     * @param int $user
     */
    function deleteUserById($id){
        $id = intval($id);
        self::db()->runSql("delete from pt_user where user_id = ".$id);
    }

    function setAdminLogin($user){		
        $_SESSION['admin'] = array(
                'user_name'=>$user['user_name'],
                'user_id'	=>$user['user_id'],
                'role_id'	=>$user['role_id'],
        );
    }

    function save($user_id,$user_name,$user_pwd,$role_id){
        if(strtolower($user_name) == 'admin')
                alert("用户名不能为ADMIN");		

        $user_name = html($user_name);
        $user_pwd = html($user_pwd);
        $role_id = intval($role_id);
        
        if(!$user_name)
                alert("用户名不能为空！");

        if(!$user_pwd)
                alert("密码不能为空！");
        $user_pwd = $this->genPassword(md5($user_pwd));

        $row = array('role_id'=>$role_id,'user_pwd'=>$user_pwd,'user_name'=>$user_name);

        if($user_id){
                $user_id = intval($user_id);
                self::db()->update('pt_user',$row,array('user_id'=>$user_id));
        }else{
                $user_id = self::db()->insert('pt_user',$row);
        }

        location("/admin/ptuser/index");
    }
}

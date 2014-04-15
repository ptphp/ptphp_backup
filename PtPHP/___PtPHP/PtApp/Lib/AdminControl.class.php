<?php
namespace Lib;
use PtNode as PtNode;
use Model\Admin\PtUser as PtUser;
class AdminControl extends PtNode {
	function __construct(){
		if(!isset($_SESSION['admin'])){			
			if($_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
				$user['user_name'] = 'admin';
				$user['user_id']   = 0;
				$user['role_id']   = 0;
				$admin = new PtUser();
				$admin->setAdminLogin($user);
			}else{
				alert('您没有登陆','/admin/auth/login.html');
			}
		}
	}
}
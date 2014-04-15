<?php
namespace Lib;
use PtNode as PtNode;
class UserControl extends PtNode{
	function __construct(){
		if(!isset($_SESSION['user'])){
			alert('您没有登陆','/admin/auth/login.html');
		}
	}
    function getUserId(){
        return intval($_SESSION['user']['user_id']);
    }
}
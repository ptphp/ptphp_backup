<?php
namespace Core;


class PtReq{
	static public $ajax = false;
	static public $method = false;

	static function checkAjax(){
		return isset($_SERVER['HTTP_X_REQUESTED_WITH'])?true:false;
	}

	static function init(){
		self::$ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']);
		self::$method = strtolower($_SERVER['REQUEST_METHOD']);
	}
	static function get($key = '',$type = 'string'){
		return self::getVal($key,$type,'get');
	}
	static function post($key = '',$type = 'string'){
		return self::getVal($key,$type,'post');
	}
	static function getVal($key,$type,$method){

		if($method == 'post'){
			if(empty($_POST[$key]))
				return '';
			else
				$v = $_POST[$key];
		}else{
			if(empty($_GET[$key]))
				return '';
			else
				$v = $_GET[$key];
		}

		switch ($type) {
			case 'int':
				$v = intval($v);
				break;
			case 'float':
				$v = floatval($v);
				break;
			case 'bool':
				$v = boolval($v);
				break;
			case 'html':
				//ENT_NOQUOTES
				//ENT_QUOTES
				$v = htmlentities(trim($v),ENT_NOQUOTES,"UTF-8");
				break;
			case 'array':
				$v = $v;
				break;
			default:
				$v = trim($v);
				break;
		}
		return $v;
	}
}

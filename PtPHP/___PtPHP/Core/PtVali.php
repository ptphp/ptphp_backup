<?php
namespace Core;
class PtVali{
    static function len(){
        return true;
    }
	static function regx($val,$title = '' ,$regx = ''){
		var_dump(preg_match($regx, $val));
		if(!preg_match($regx, $val)){
			die('error|'.$title.'不合法');
		}
	}
        
	static function word($val,$title,$max,$min = 0){
		self::len($val,$title,$max,$min);
		if(!preg_match("/^[\w]+$/", $val)){
			die('error|'.$title.'不合法');
		}
	}

	static function url($val,$title,$max,$min = 0){
		self::len($val,$title,$max,$min);
		if(!filter_var($val, FILTER_VALIDATE_URL)){
			die('error|'.$title.'不合法 ');
		}
	}

	static function cn($val,$title,$max,$min = 0){
		self::len($val,$title,$max,$min);
		if(!preg_match("/^[\x{4e00}-\x{9fa5}]+$/u", $val)){
			die('error|'.$title.'不合法');
		}

	}
	static function ip($val,$title,$max,$min = 0){
		self::len($val,$title,$max,$min);
		if(!filter_var($val, FILTER_VALIDATE_IP)){
			die('error|'.$title.'不合法 ');
		}
	}
	static function date($val,$title){
		if(!self::checkDate($val)){
			die('error|'.$title.'不合法 ');
		}
	}
	static function datetime($val,$title){
		if(!self::checkDateTime($val)){
			die('error|'.$title.'不合法 ');
		}
	}

	static function email($val){
		return filter_var($val, FILTER_VALIDATE_EMAIL)?true:false;
	}
	static function idcard($val){
		$title = '身份证';
		self::len($val,$title,18,15);
		if(!PtIdcard::valid($val)){
			die('error|'.$title.'不合法 ');
		}
	}
	static function zip(){
		$title = '邮箱';
		self::len($val,$title,6,6);
		if(!preg_match("/^[0-9]d{5}$/",$str)){
			die('error|'.$title.'不合法 ');
		}
	}
	static function mobile($val){
		$title = '手机号';
		self::len($val,$title,11,11);
		//13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|18[0-9]{9}
		if(!preg_match("/^13[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}$|18[0-9]{9}$/",$val)){
			die('error|'.$title.'不合法 ');
		}
	}

	static function checkDateTime($str) {
		if (date('Y-m-d H:i:s', strtotime($str)) == $str) {
			return true;
		} else {
			return false;
		}
	}
	static function checkDate($str)
	{
		$stamp = strtotime($str);
		if (!is_numeric($stamp))
			return FALSE;
		//echo $stamp," : ",date('m', $stamp),"-", date('d', $stamp),"-", date('Y', $stamp);
		//checkdate(month, day, year)
		if ( checkdate(date('m', $stamp), date('d', $stamp), date('Y', $stamp)) )
		{
			return TRUE;
		}
		return FALSE;
	}
	static function validEmail($email)
	{
		$isValid = true;
		$atIndex = strrpos($email, "@");
		if (is_bool($atIndex) && !$atIndex)
		{
			$isValid = false;
		}
		else
		{
			$domain = substr($email, $atIndex+1);
			$local = substr($email, 0, $atIndex);
			$localLen = strlen($local);
			$domainLen = strlen($domain);
			if ($localLen < 1 || $localLen > 64)
			{
				// local part length exceeded
				$isValid = false;
			}
			else if ($domainLen < 1 || $domainLen > 255)
			{
				// domain part length exceeded
				$isValid = false;
			}
			else if ($local[0] == '.' || $local[$localLen-1] == '.')
			{
				// local part starts or ends with '.'
				$isValid = false;
			}
			else if (preg_match('/\\.\\./', $local))
			{
				// local part has two consecutive dots
				$isValid = false;
			}
			else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
			{
				// character not valid in domain part
				$isValid = false;
			}
			else if (preg_match('/\\.\\./', $domain))
			{
				// domain part has two consecutive dots
				$isValid = false;
			}
			else if(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',
					str_replace("\\\\","",$local)))
			{
				// character not valid in local part unless
				// local part is quoted
				if (!preg_match('/^"(\\\\"|[^"])+"$/',
						str_replace("\\\\","",$local)))
				{
					$isValid = false;
				}
			}
			if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
			{
				// domain not found in DNS
				$isValid = false;
			}
		}
		return $isValid;
	}
}
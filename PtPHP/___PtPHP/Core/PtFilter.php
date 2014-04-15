<?php
namespace Core;

class PtFilter{
    static function email($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;
    }
    
    static function mobile($mobile){        
        //13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|18[0-9]{9}
        return preg_match("/^13[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}$|18[0-9]{9}$/",$mobile)? true : false;
    }
}
class PtIdcard {
	static public function valid($idNum) {
		if (strlen($idNum) == 18) {
			return self::idcardCheckSum18($idNum);
		} elseif ((strlen($idNum) == 15))    {
			$idNum = self::idcard_15to18($idNum);
			return self::idcardCheckSum18('"' . $idNum . '"');
		} else    {
			return false;
		}
	}

	// 计算身份证校验码，根据国家标准GB 11643-1999
	static public function idcardVerifyNumber($idcardBase)
	{
		if(strlen($idcardBase) != 17)
		{
			return false;
		}

		//加权因子
		$factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);

		//校验码对应值
		$verify_number_list = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
		$checksum = 0;
		for ($i = 0; $i < strlen($idcardBase); $i++)
		{
			$checksum += substr($idcardBase, $i, 1) * $factor[$i];
		}
		$mod = $checksum % 11;
		$verify_number = $verify_number_list[$mod];
		return $verify_number;
	}

	// 将15位身份证升级到18位
	static public function idcard_15to18($idcard){
		if (strlen($idcard) != 15){
			return false;
		}else{

			// 如果身份证顺序码是996 997 998 999，这些是为百岁以上老人的特殊编码
			if (array_search(substr($idcard, 12, 3), array('996', '997', '998', '999')) !== false){
				$idcard = substr($idcard, 0, 6) . '18'. substr($idcard, 6, 9);
			}else{
				$idcard = substr($idcard, 0, 6) . '19'. substr($idcard, 6, 9);
			}
		}
		$idcard = $idcard . self::idcard_verify_number($idcard);
		return $idcard;
	}

	// 18位身份证校验码有效性检查
	static public function idcardCheckSum18($idcard){
		if (strlen($idcard) != 18){ return false; }
		$idcard_base = substr($idcard, 0, 17);
		if (self::idcardVerifyNumber($idcard_base) != strtoupper(substr($idcard, 17, 1))){
			return false;
		}else{
			return true;
		}
	}
}
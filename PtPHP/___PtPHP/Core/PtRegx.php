<?php
namespace Core;

class PtRegx{
	static function test($str,$type){
		switch ($type) {
			case 'email':
				return intV($str);
				break;
					
			default:
				# code...
				break;
		}
	}
	static function intV($int){
		if(is_int($int)){

		}
	}
}
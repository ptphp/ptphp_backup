<?php
namespace Controller\Theme\Index;

class Index{
	function get(){
		$cat = isset($_GET['cat'])?$_GET['cat']:"index";
		$cat = strtolower(str_replace(".html", "", $cat));
        echo 11;
		#include View('manage/'.$cat);
	}
}
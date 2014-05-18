<?php
namespace Controller\Theme\Unicorn;

class Index{
	function get(){
		$cat = isset($_GET['cat'])?$_GET['cat']:"index";
		$cat = strtolower(str_replace(".html", "", $cat));
        //echo $cat;
        //exit;
		include View('theme/unicorn/'.$cat);
	}
}
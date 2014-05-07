<?php
namespace Controller\Theme\Neat;

class Index{
	function get(){
		$cat = isset($_GET['cat'])?$_GET['cat']:"dashboard";
		$cat = strtolower(str_replace(".html", "", $cat));
        //echo $cat;
        //exit;
		include View('theme/neat/'.$cat);
	}
}
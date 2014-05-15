<?php
namespace Controller\Manage\Index;

class Index{
	function get(){
		$cat = isset($_GET['cat'])?$_GET['cat']:"index";

		$cat = strtolower(str_replace(".html", "", $cat));
		include View('manage/'.$cat);
	}
}
<?php
namespace Controller\Index;
class Index{
	function get(){
		echo "index";
		//header("Location:/manage/");
		#include View('index');
	}
	function post(){		
		print_r($_SERVER);
	}
}
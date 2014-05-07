<?php
namespace Controller\Index;
class Index{
	function get(){
        include View('theme/neat/dashboard');
	}
	function post(){		
		print_r($_SERVER);
	}
}

class Action{
	function get(){
		echo "Action";
		//header("Location:/manage/");
		#include View('index');
	}
	function post(){
		print_r($_SERVER);
	}
}
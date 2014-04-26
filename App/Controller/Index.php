<?php
namespace Controller;

class Index{	
	function get(){
		//header("Location:/manage/");
		#include View('index');
	}
	function post(){		
		print_r($_SERVER);
	}
}
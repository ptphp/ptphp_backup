<?php
namespace Controller;

class Index{	
	function get(){		
		include View('index');
	}
	function post(){		
		print_r($_SERVER);
	}
}
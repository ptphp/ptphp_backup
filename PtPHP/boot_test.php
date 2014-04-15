<?php
set_include_path(
	get_include_path().PATH_SEPARATOR.
	__DIR__
);

require_once('Ext/simpletest/autorun.php');

function __pt_test_autoload($class_name){	
	if ( substr($class_name, 0,5) == "PtPHP" ){		
		$path = str_replace( "\\", "/",$class_name).".php";
		require_once $path;	
	}
}

spl_autoload_register('__pt_test_autoload');

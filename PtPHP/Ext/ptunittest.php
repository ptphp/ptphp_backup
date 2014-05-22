<?php
define('PATH_SIMPLE_TEST', PATH_PTPHP."/Ext/simpletest");
define('PATH_TEST', PATH_PRO."/test");

//do not use autorun as it output ugly report upon no test run
require_once PATH_SIMPLE_TEST . '/unit_tester.php';
require_once PATH_SIMPLE_TEST . '/mock_objects.php';
require_once PATH_SIMPLE_TEST . '/collector.php';
require_once PATH_SIMPLE_TEST . '/web_tester.php';
require_once PATH_SIMPLE_TEST . '/extensions/my_reporter.php';
require_once PATH_SIMPLE_TEST . '/extensions/cli_reporter.php';


function get_unit_tests($path){
	$tests = array();
	if(!is_file($path)){
		return array();
	}
	$content = file_get_contents($path);
	preg_match_all("/function\s+(test_\w+)\(\)/", $content,$m,PREG_SET_ORDER);

	foreach ($m as $_m){
		$name = $_m[1];
		$tests[] = array(
				'test_name'=>$name,
				'title'=>get_test_title($name),
				'path'=>$path,
				'id'=>md5($path.$name)
		);
	}
	return $tests;
}
function get_test_title($name){
	$arrs = explode("_", $name);
	$title = '';
	foreach ($arrs as $arr){
		$title .= " ".ucfirst(strtolower($arr));
	}
	return trim($title);
}
function directory_map($source_dir, $directory_depth = 0, $hidden = FALSE)
{
    if(!is_dir($source_dir)){
        return array();
    }
	if ($fp = @opendir($source_dir))
	{
		$filedata	= array();
		$new_depth	= $directory_depth - 1;
		$source_dir	= rtrim($source_dir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
		while (FALSE !== ($file = readdir($fp)))
		{
			if ( ! trim($file, '.') OR ($hidden == FALSE && $file[0] == '.')) continue;

			if (($directory_depth < 1 OR $new_depth > 0) && @is_dir($source_dir.$file))
			{
				$filedata[] = directory_map($source_dir.$file.DIRECTORY_SEPARATOR, $new_depth, $hidden);
			}
			else
			{
				if($file == "index.html" || substr($file, 0,5) != "test_") continue;
				$path = $source_dir.$file;
				$arr = pathinfo($path);
				$arr['id'] = md5($path);
				$arr['rel_path'] = str_replace(PATH_PRO, "", $path);
				$arr['abs_path'] = $path;
				$arr['tests'] = get_unit_tests($path);
				$filedata[] = $arr;
			}
		}
		closedir($fp);
		return $filedata;
	}

	return FALSE;
}

function get_test_files($obj = ''){
	$files = array();

	$test_objs = array('controllers','modules','model','views','libraries','bugs','helpers');
	if($obj){
		$_test_objs = array($obj);
	}else{
		$_test_objs = $test_objs;
	}

	foreach($_test_objs as $test_obj){
		$dir = PATH_TEST.'/'.$test_obj;
		$f = directory_map($dir);
		$files[$test_obj] = $f;
	}
	//print_r($files);
	return $files;
}


class PtTestCase extends UnitTestCase {

	public function __construct($name = '')
	{
		parent::__construct($name);
	}
	public function setUp()
	{
	
	}
	
	public function tearDown()
	{
		
	}
	
}
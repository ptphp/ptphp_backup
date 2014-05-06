<?php 
namespace Controller\Pttest;

class Test_tree{	
	function get(){
		$tree_test = get_unit_tests($_GET['path']);		
		foreach ($tree_test as $_u_test){
			$test_path = str_replace(PATH_TEST."/", "", $_u_test['path']);
			echo "<h3>".$_u_test['title']."</h3>";
			echo $_u_test['test_name'];			
			echo '<button onclick="on_test_btn_click(this)" class="test_btn" data-id="'.$_u_test['id'].'" data-method="'. $_u_test['test_name'].'" data-path="'.$test_path.'">Test</button>';
			echo "<button onclick=\"do_copy('".$_u_test['id']."')\">CLI</button><br />";			
			echo "<div style=\"display:none\" id=\"cli_txt_".$_u_test['id']."\">php bin/run.php -_c=pttest -_a=run -path=".$test_path." -method=".$_u_test['test_name']."</div>";
			echo "<br /><hr>\n";
		}
	}
}
class Test_select{
	function get(){
		$all_tests = get_test_files();
		echo '<option value="">select tests</option>';
		foreach ($all_tests as $key=>$test_obj) { 
			echo "<optgroup label=".$key.">";
			if(is_array($test_obj)){
				foreach ($test_obj as $value) {
					echo '<option value="'.$value['abs_path'].'" >'.str_replace("\\", "/", $value['rel_path']).'</option>';
				}
			}			
			echo "</optgroup>";
		}
	}
}

class Index{	
	function get(){
		error_reporting(-1);
		$test_suite = new \TestSuite();
		$test_suite->_label = 'PtPHP Test Suite';
		include View("pttest/index");
	}
	
	function post(){		
		$file =  PATH_TEST."/".$_POST['path'];
		$test_suite = new \TestSuite();
		$test_suite->addFile($file);
		ob_start();
		#$trace = file_get_contents(xdebug_get_tracefile_name());
		$test_suite->run(new \MyReporter());
		$content = ob_get_clean();
		echo str_replace(PATH_PRO, ".", $content."");
		//print_pre(get_included_files());
	}
}
/*
 * usage:
 * 		php index.php -c=pttest -a=run -path= -method=
 */
class Run{	
	function get()
	{				
		$file =  PATH_TEST."/".$_GET['path'];
		$_REQUEST['method'] =  $_GET['method'];	
		
		console($_GET['path']." : ".$_GET['method']);
		$test_suite = new \TestSuite();
		$test_suite->addFile($file);
		$test_suite->run(new \CliReporter());
		
	}
}


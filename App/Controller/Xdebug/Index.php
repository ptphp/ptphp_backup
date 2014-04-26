<?php
namespace Controller\Xdebug;
class Index{
	function get_code(){	
		include View("xdebug/code");
		
	}
	function del_files(){		
		$trace_output_dir = ini_get('xdebug.trace_output_dir');
		$files = new \DirectoryIterator ( $trace_output_dir );
		foreach ( $files as $file ) {
			if(is_file($trace_output_dir.'/'.$file->getFilename ())){
				unlink($trace_output_dir.'/'.$file->getFilename ());
			}
			
		}
	}
	
	function get(){		
		if(isset($_GET['op']) && $_GET['op'] == "del_files"){
			$this->del_files();
			exit;
		}
		if(isset($_GET['op']) && $_GET['op'] == "get_code"){
			$this->get_code();
			exit;
		}
		$options = '<option value="" selected="selected"> -- Select -- </option>';
		
		$trace_output_dir = ini_get('xdebug.trace_output_dir');
		$files = new \DirectoryIterator ( $trace_output_dir );
		
		foreach ( $files as $file ) {
			if (substr_count ( $file->getFilename (), '.xt' ) == 0) {
				continue;
			}
			$date = explode ( '.', $file->getFilename () );		
			$date = date ( 'm-d H:i:s', $date [1] );
			$options .= '<option value="' . $file->getFilename () . '"> ' . $date . ' - ' . $file->getFilename () . ' </option>';
		}
		
		include View("xdebug/xdebug");
		
	}
	function post(){	
		$trace_output_dir = ini_get('xdebug.trace_output_dir');
		$file = $_POST['file'];
		$memJump = 1;
		if(isset($_POST['memory'])) {
			$memJump = (float) $_POST['memory'];
		}
		$timeJump = 1;
		if(isset($_POST['time'])) {
			$timeJump = (float) $_POST['time'];
		}
		
		$file_path = $trace_output_dir."/".$file;
		echo $file_path;
		$trace = file_get_contents ( $file_path );
		
		$lines = explode ( "\n", $trace );
		
		
		foreach ( $lines as $line1 ) {
			
			$data = explode("\t",$line1);
			list($level, $id, $point, $time, $memory, $function, $type, $file, $filename, $line) = $data;
		
			// we want that in megabytes
			$memory = round ( $memory	 / (1024 * 1024), 4 );
		
			if(empty($function)) {
				$fullTrace[$id]['timeOnExit'] = $time;
				$fullTrace[$id]['memoryOnExit'] = $memory;
				continue;
			}
		
			if($point == 0) {
				// starting function
				$fullTrace[$id] = array( 'level'=>$level, 'id'=>$id, 'timeOnEntry'=>$time, 'memoryOnEntry' => $memory, 'function'=>$function, 'type'=>$type, 'file'=>$file, 'filename'=>$filename, 'line'=>$line );
					
				if( ($memory - $lastMemory) > $memJump ) {
					$fullTrace[$id]['memoryAlert'] = $memory - $lastMemory;
				} else{
					$fullTrace[$id]['memoryAlert'] = false;
				}
					
		
				if( ($time - $lastTime) > $timeJump ) {
					$fullTrace[$id]['timeAlert'] = $time - $lastTime;
				} else{
					$fullTrace[$id]['timeAlert'] = false;
				}
					
				$lastMemory = $memory;
				$lastTime = $time;
				
			} else {
				$fullTrace[$id]['timeOnExit'] = $time;
				$fullTrace[$id]['memoryOnExit'] = $memory;
			}
			$fullTrace[$id]['tmp'] = $line1;
		
		}
		include View("xdebug/trace_table");
		
	}
}
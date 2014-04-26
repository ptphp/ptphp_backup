<?php
namespace Controller\Xdebug;
class Test{
	function get(){		
		$content = file_get_contents(xdebug_get_tracefile_name());
		$lines = explode("\n", trim($content));
		$fullTrace = array();
		$memJump = 0.3;
		$timeJump = 0.3;
		foreach ($lines as $_line){
			$_data = explode("\t", $_line);
			if(count($_data)==1){
				continue;
			}
						
			list($level, $id, $point, $time, $memory, $function, $type, $file, $filename, $line,$arg_num) = $_data;
						
			// we want that in megabytes
			$memory = round ( $memory	 / (1024 * 1024), 4 );
			
			if(empty($function)) {
				$fullTrace[$id]['timeOnExit'] = $time;
				$fullTrace[$id]['memoryOnExit'] = $memory;
				continue;
			}
			
			if($point == 0) {
				$args = array();
				if(intval($arg_num) > 0){
					for($i=11;$i < (count($_data));++$i){
						//print_pre($_data[$i]);
						$args[] = $_data[$i];
					}
				
				}
				// starting function
				$fullTrace[$id] = array( 
						'level'=>$level,
						'id'=>$id, 
						'timeOnEntry'=>$time, 
						'memoryOnEntry' => $memory, 
						'function'=>$function, 
						'type'=>$type, 
						'file'=>$file, 
						'filename'=>$filename, 
						'line'=>$line,
						'arg_num'=>$arg_num,
						'args'=>$args,
				);							
				
				$fullTrace[$id]['memoryAlert']['args'] = $args;
								
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
			
			//var_dump($fullTrace[$id]);
		}
		//exit;
		//print_pre($lines) ;
		include View("xdebug/test");
	}
	
}
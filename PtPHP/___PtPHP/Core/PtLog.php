<?php
namespace Core;
define('LEVEL_FATAL', 0);
define('LEVEL_ERROR', 1);
define('LEVEL_WARN', 2);
define('LEVEL_INFO', 3);
define('LEVEL_DEBUG', 4);

class PtLog {
	static $logger_root = PATH_PTAPP;
	
	static $LOG_LEVEL_NAMES = array(
			'FATAL', 'ERROR', 'WARN', 'INFO', 'DEBUG'
	);

	static $level = LEVEL_DEBUG;
	
	static function setLogLevel($lvl) {
		if($lvl >= count(self::$LOG_LEVEL_NAMES)  || $lvl < 0) {
			throw new Exception('invalid log level:' . $lvl);
		}
		self::$level = $lvl;
	}

	static function _log($level, $message, $name) {
		if($level > self::$level) {
			return;
		}
		if(!self::$logger_root){
			$log_file_path = $_ENV['TMP']."/" . $name . '.log';
		}else{
			$log_file_path = self::$logger_root ."/Runtime/log/" . $name . '.log';
		}
 
		if(is_array($message)){
			$message = var_export($message,true);
		}
		
		$log_level_name = self::$LOG_LEVEL_NAMES[self::$level];
		$content = date('Y-m-d H:i:s') . ' [' . $log_level_name . '] ' . $message . "\n";
		
		pt_mkdir(dirname($log_file_path));
		file_put_contents($log_file_path, $content, FILE_APPEND);
		//error_log($content,$log_file_path,3);
	}

	static function debug($message, $name = 'debug') {
		self::_log(LEVEL_DEBUG, $message, $name);
	}
	static function info($message, $name = 'info') {
		self::_log(LEVEL_INFO, $message, $name);
	}
	static function warn($message, $name = 'warn') {
		self::_log(LEVEL_WARN, $message, $name);
	}
	static function error($message, $name = 'error') {
		self::_log(LEVEL_ERROR, $message, $name);
	}
	static function fatal($message, $name = 'fatal') {
		self::$_log(LEVEL_FATAL, $message, $name);
	}
}

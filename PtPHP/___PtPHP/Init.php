<?php
defined("PATH_PTPHP") or die("access error");
define("BR","<br>\n");
set_error_handler("pt_error_handler"); #设置error异常处理函数

function setProductDebug(){
	global $config;
	if(isset($config['product_debug']) && $config['product_debug'] == array_value($_GET, '_d')){
		#显示系统错误
		@ini_set('display_errors', 'On');
		error_reporting(E_ALL);
		$GLOBALS['config']['view_compress'] = 0;
	}
}

function pt_error_handler($errno, $errstr, $errfile, $errline )
{    
    ob_end_clean();
    ob_start();
    db()->rollback();
    if(!defined('E_STRICT'))            define('E_STRICT', 2048);
    if(!defined('E_RECOVERABLE_ERROR')) define('E_RECOVERABLE_ERROR', 4096);
    $trace = debug_backtrace();
    array_shift($trace);
    
    $res['result']['msg']        = $errstr;
    $res['result']['errfile']    = $errfile;
    $res['result']['errline']    = $errline;
    $res['result']['router']     = PtApp::$router;
    $res['result']['trace']      = $trace;
    $res['error']                = 1;
    $res['id']                   = null;
    
    if(DEBUG){        
        if(PtApp::$router['is_ajax']){
            echo json_encode($res);
        }else{            
            include PATH_PTPHP.'/PtApp/Block/site/debug.html';
        }
    }else{
        global $config;
        if($errstr == '404'){
            if(file_exists(PATH_PTAPP.'/Block/site/tpl/404.html')){
                include PATH_PTAPP.'/Block/site/tpl/404.html';
            }else{
                include PATH_PTPHP.'/PtApp/Block/site/404.html';
            }
        }else{
            $id = md5(time());
            $res['id'] = $id;
            Core\PtLog::error($res,'error');
            if(PtApp::$router['is_ajax']){
                $res_ajax                   = array();
                $res_ajax['result']['msg']  = "System Error";
                $res_ajax['error']          = 1;
                $res_ajax['id']             = null;
                echo json_encode($res_ajax);
            }else{
                $view_msg = "System Error :".$id;
                
                if(file_exists(PATH_PTAPP.'/Block/site/tpl/505.html')){
                    include PATH_PTAPP.'/Block/site/tpl/505.html';
                }else{
                    include PATH_PTPHP.'/PtApp/Block/site/505.html';
                }
            }
        }
            
    }
    ob_end_flush();
    exit;
}

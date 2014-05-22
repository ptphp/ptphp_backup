<?php

function list_files($dir){
    $files = array();
    foreach (new DirectoryIterator($dir) as $fileInfo) {
        if($fileInfo->isDot()) continue;
        if($fileInfo->isFile()){
            $files[] = $dir.DIRECTORY_SEPARATOR.$fileInfo->getFilename();
        }
    }
    return $files;
}

function list_dirs($dir){
    $dirs = array();
    foreach (new DirectoryIterator($dir) as $fileInfo) {
        if($fileInfo->isDot()) continue;
        if($fileInfo->isDir()){
            $dirs[] = $dir.DIRECTORY_SEPARATOR.$fileInfo->getFilename();
        }
    }
    return $dirs;
}


function pt_error_handler($errno, $errstr, $errfile, $errline )
{
    if(!defined('E_STRICT'))            define('E_STRICT', 2048);
    if(!defined('E_RECOVERABLE_ERROR')) define('E_RECOVERABLE_ERROR', 4096);
    $trace = debug_backtrace();
    array_shift($trace);
    $res['result']['msg']        = $errstr;
    $res['result']['errfile']    = $errfile;
    $res['result']['errline']    = $errline;
    $res['result']['trace']      = $trace;
    $res['error']                = 1;
    $res['id']                   = null;
    if(PHP_SAPI == "cli"){
        console($res);
    }else{
        ob_end_clean();
        ob_start();
        if(DEBUG){
            if(is_xhr()){
                echo json_encode($res);
            }else{
                include PATH_PTPHP.'/View/Block/site/debug.html';
            }
        }else{
            $msg = "System Error: ".md5(time());
            if(is_xhr()){
                if($errstr != '404'){
                    error_log($msg."==>".var_export($res,1));
                }
                $res_ajax                   = array();
                $res_ajax['result']['msg']  = $msg;
                $res_ajax['error']          = 1;
                $res_ajax['id']             = null;
                echo json_encode($res_ajax);
            }else{
                if($errstr == '404'){
                    if(file_exists(PATH_APP.'/View/Block/site/tpl/404.html')){
                        include PATH_APP.'/View/Block/site/tpl/404.html';
                    }else{
                        include PATH_PTPHP.'/View/Block/site/404.html';
                    }
                }else{
                    error_log($msg."==>".var_export($res,1));
                    $view_msg = $msg;
                    if(file_exists(PATH_APP.'/View/Block/site/tpl/505.html')){
                        include PATH_APP.'/View/Block/site/tpl/505.html';
                    }else{
                        include PATH_PTPHP.'/View/Block/site/505.html';
                    }
                }
            }
        }
        ob_end_flush();
        exit;
    }

}

function __pt_autoload($class_name){
    //echo $class_name;
    //console($class_name);
    $config = Pt::$config;
    $t = explode("\\",$class_name);
    $f = $t[0];
    if(isset($config['namespaces'])){
        $namespaces = $config['namespaces'];
        if(array_key_exists($f,$namespaces)){
            $path = $namespaces[$f].'\\'.str_replace( "\\", "/",$class_name).".php";
            require_once $path;
        }
    }
    if ( $f == "Controller" ){
        $path = PATH_APP."/".str_replace( "\\", "/",$class_name).".php";
        #var_dump($path);
        require_once $path;
    }
    if ( $f == "Model" ){
        $path = PATH_APP."/".str_replace( "\\", "/",$class_name).".php";
        require_once $path;
    }
    if ($f == "Module" ){
        #echo $class_name;
        #echo PHP_EOL;
        $path = PATH_APP."/".str_replace( "\\", "/",$class_name).".php";
        require_once $path;
    }

    if ( $f == "Lib" ){
        $path = PATH_APP."/".str_replace( "\\", "/",$class_name).".php";
        if(!is_file($path)){
            $path = PATH_PTPHP."/".str_replace( "\\", "/",$class_name).".php";
        }
        require_once $path;
    }
}

function get_pid(){
    return getmypid();
}
function is_win(){
    return PHP_OS == "WINNT";
}

function print_pre($v){
    echo "<pre>";
    print_r($v);
    echo "</pre>";
}
function is_xhr(){
    return TRUE === (isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] == "XMLHttpRequest");
}
function shut_down_fun(){
    if(PHP_SAPI == "cli"){
        return;
    }
    if(is_xhr()){
        return;
    }
    global $config;
    if(DEBUG){
        global $console_array;
        array_unshift($console_array,$_SERVER);
        $data = json_encode($console_array);
        $res = <<<RES
	<script>
		var __data= $data;
				for(i in __data){
					console.log(__data[i]);
				}
	</script>
RES;
        echo$res;
    }
}


/**
 * __mkdirs
 *
 * 循环建立目录的辅助函数
 *
 * @param dir    目录路径
 * @param mode    文件权限
 */
function pt_mkdir($dir, $mode = 0777)
{
    if (!is_dir($dir)) {
        pt_mkdir(dirname($dir), $mode);
        return mkdir($dir, $mode);
    }
    return true;
}

function get_mode(){
    return isset($_SERVER['PT_MODE'])?$_SERVER['PT_MODE']:FALSE;
}
function set_test(){

    if(isset($GLOBALS['PT_MODE'])){
        $_SERVER['PT_MODE'] = "test";
    }
}

function get_line_and_filename($trace){
    $info = '';
    if(isset($trace[1]['class']) && $trace[1]['class']){
        $info .= $trace[1]['class']."::";
    }else{
        $info .= basename($trace[0]['file'])."::";
    }
    $info .= $trace[1]['function']."()";
    return $info.":".$trace[0]['line'];
}
function console_log($var){
    $curl = new Lib\PtCurl();
    if(is_array($var) ||  is_object($var)){
        $data = json_encode($var,True);
    }else{
        $data = $var;
    }
    $url = "http://chat.ptphp.com/push/push?cname=log&content=".urlencode($data);
    $curl->get($url);
}


function console($var){
    $trace = debug_backtrace();
    $file_info = get_line_and_filename($trace);
    global $config;
    $pid = get_pid();
    $hd = "[".date("m-d H:i:s")."] [$pid] [$file_info] ";
    if(PHP_SAPI == "cli"){
        echo $hd;
        if(is_array($var) || is_object($var)){
            print_r($var);
            console_log($hd.json_encode($var));
        }else{
            echo $var;
            console_log($hd.$var);
        }
        echo PHP_EOL;
    }

    if(!DEBUG){
        return;
    }

    global $console_array;
    $tree = debug_backtrace();
    //print_pre(debug_backtrace());

    $console_array[] = array(
        "data"=>$var,
        "line"=>$tree[0]['line'],
        "file"=>str_replace(PATH_PRO, '',$tree[0]['file']),
    );
}
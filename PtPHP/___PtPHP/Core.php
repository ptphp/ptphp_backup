<?php
defined('PATH_PTAPP') or define('PATH_PTAPP',__DIR__.'/PtApp');
defined('PATH_PTPHP') or define('PATH_PTPHP',__DIR__);
defined ('PT_ENV') or define ('PT_ENV', 'dev');
defined ('DEBUG') or define ('DEBUG', True);

include PATH_PTPHP.'/Lib/Helper.php';
spl_autoload_register("pt_loader");

function pt_loader($className){    
    $path = '';    
    if(strpos($className, 'Model') === 0){        
    	$path = PATH_PTAPP.'/'.str_replace("\\", "/", $className).'.model.php';
        if(!file_exists($path)){
        	$path = PATH_PTPHP.'/PtApp/'.str_replace("\\", "/", $className).'.model.php';
        }
        
    }else if(strpos($className, "Core\\") === 0){
        $path = PATH_PTPHP.'/'.str_replace("\\", "/", $className).'.php';
    }else if(strpos($className, "Lib\\") === 0){
    	
        $path = PATH_PTAPP.'/'.str_replace("\\", "/", $className).'.class.php';
      
        if(!file_exists($path)){
            $path = PATH_PTPHP.'/PtApp/'.str_replace("\\", "/", $className).'.class.php';
        }
    } 
    
    if($path)
        require_once $path;
}

function  db($key='default'){
    return Core\db\PtDb::init($key);
}


function check_ptphp_phpversion(){
    if (version_compare(PHP_VERSION, '5.3.0', '<')) {
        if(DEBUG)
            die("PtPHP 所需版本至少为：5.3.0，当前PHP版本为：".PHP_VERSION);
        else
            die("支持版本太低");
    }
}

function print_pre($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
/**
 * pt_mkdir
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
        return @mkdir($dir, $mode);
    }
    return true;
}

function array_value($array,$key,$default=''){
    if(key_exists($key, $array)){
        return $array[$key];
    }
    return $default;
}


function html($v,$type = 'ent',$ent = ENT_NOQUOTES,$charset = "UTF-8"){
    if($type == 'ent'){
        return htmlentities(trim($v),$ent,$charset);
    }else{
        return htmlspecialchars(trim($v),$ent,$charset);
    }	
}

function html_q($v){
    return html($v,'ent',ENT_QUOTES);
}

function html_nq($v){
    return html($v,'ent',ENT_NOQUOTES);
}

function html_cq($v){
    return html($v,'ent',ENT_COMPAT);
}

/*
 *
* 列出目录下所有文件和文件夹
*/
function dirList($dir){
    $files = array();
    if(is_dir($dir)){
        if($dh = opendir($dir)){
            while (($file = readdir($dh)) !== false){
                if($file == '.' || $file == '..')
                    continue;
                $files[] = $dir.'/'.$file;

            }
            closedir($dh);
        }
    }
    return $files;
}

/*
 *
* 列出目录下所有文件夹
*/
function dirListDirs($dir){
    $files = array();
    if(is_dir($dir)){
        if($dh = opendir($dir)){
            while (($file = readdir($dh)) !== false){
                if($file == '.' || $file == '..')
                    continue;
                if(is_dir($file)){
                    $files[] = $dir.'/'.$file;
                }
            }
            closedir($dh);
        }
    }
    return $files;
}

/*
 *
* 列出目录下所有文件（不包括文件夹）
*
*/
function dirListFiles($dir){
    $files = array();
    if(is_dir($dir)){
        if($dh = opendir($dir)){
            while (($file = readdir($dh)) !== false){
                if($file == '.' || $file == '..' || is_dir($dir.'/'.$file))
                        continue;
                $files[] = $dir.'/'.$file;
            }
            closedir($dh);
        }
    }
    return $files;
}

function location($url){	
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])){		
        json_result(array('location'=>$url));
    }else{
        die('<script type="text/javascript">location.href="'.$url.'"</script>');
    }
}

function json_result($_res, $error = null,$id = null){    
    $res['result'] = $_res;
    $res['error']  = $error;
    $res['id']  = $id;
    header('Content-Type: application/json;charset=utf-8');
    die(json_encode($res));
}

function js_result($msg,$location){
    if(is_array($msg)){
        if(isset($msg['location'])) $_location = $msg['location'];
        else $_location = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'';   
        $_msg = $msg['msg'];
    }else{
        if(!$location) $_location = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'';
        else $_location = $location; 
        $_msg = $msg;
    }
    //
    $wait = DEBUG? 1000:3;
    $html = <<< html
<!DOCTYPE html><html style="background: url(http://s.ptphp.com/img/bg/bg.gif) repeat #edece9;"><head><meta charset="utf-8"/><title>{$_msg}</title></head><body style="margin-top:50px;"><div class="wrap" style="width:400px;margin:0 auto"><div style="border-radius:3px;background-color: #fff;padding:20px;box-shadow: 0 1px 3px rgba(34,25,25,.4);-moz-box-shadow: 0 1px 3px rgba(34,25,25,.4);-webkit-box-shadow: 0 1px 3px rgba(34,25,25,.4);"><div class="region"><div style="padding-left: 46px;"><div class="body" style="position:relative"><img src="http://s.ptphp.com/img/icon/info.png" style="position:absolute;top: -1px;left: -40px;"><h1 style="font-size:20px;color:#999;padding-left: 10px;padding-bottom: 17px;border-bottom: 1px solid #d9d9d9;">{$_msg}</h1></div><div class="foot" style="font-size:12px;margin-top:16px;margin-bottom:20px;margin-left: 13px;"><span id="redirect" class="dn"><a href="{$_location}"><span id="t_s"></span></a> <span class="sep10">|</span></span> </span> <a href="/">返回首页</a></div></div></div></div></div><script type="text/javascript">var url = "{$_location}";var wait = {$wait};if(url){document.getElementById("t_s").innerHTML = wait+" 秒后跳转";setInterval(T,1000);document.getElementById("redirect").style.display = "inline";var o =setTimeout(R,wait*1000);}function T(){if(wait < 0){document.getElementById("t_s").innerHTML = "点击跳转";clearTimeout(o);}else{wait--;document.getElementById("t_s").innerHTML = wait+" 秒后跳转";}}function R(){location.href=url}</script></body></html>
html;
    die($html);
    exit;
}


function success($msg,$location ='',$id = null){
	if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])){	
            if($location){
                $res['msg'] = $msg;
                $res['location'] = $location;
            }else{
                if(!is_array($msg)){
                     $res['msg'] = $msg;
                }else{
                     $res = $msg;
                }
            }            
            json_result($res,null,$id);
	}else js_result($msg,$location);	
}

function alert($msg,$location ='',$id = null){    
	if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])){	     
            if($location){
                $res['msg'] = $msg;
                $res['location'] = $location;
            }else{
                
                if(!is_array($msg)){
                     
                     $res['msg'] = $msg;
                }else{
                     $res = $msg;
                }
            }            
            json_result($res,1,$id);
	}else
            js_result($msg,$location);	
}
function alert_s($msg){	
	$msg = "<html><head><meta charset='utf-8'></head><body><h4>".$msg."<h4>";
	$msg .= '<hr><button onclick="history.go(-1)">返回重新上传</button></body></html>';
	echo $msg;
	exit;
}
function fDate($t = ''){
    if(!$t) $t = time();
    return date("Y-m-d H:i:s",$t);
}






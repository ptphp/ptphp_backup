<?php
$start_run_time = microtime(1);
defined('PATH_PTAPP') or define('PATH_PTAPP',__DIR__.'/PtApp');
defined('PATH_PTPHP') or define('PATH_PTPHP',__DIR__);
defined ('PT_ENV') or define ('PT_ENV', 'dev');

defined("DEBUG") or define('DEBUG',isset($config[PT_ENV]['debug'])?$config[PT_ENV]['debug']:false);

include PATH_PTPHP.'/Init.php';
include PATH_PTPHP.'/Core.php';

header("Content-type:text/html;charset=utf-8");
session_start();

check_ptphp_phpversion();
if(DEBUG)
{
    #显示系统错误
    @ini_set('display_errors', 'On');
    error_reporting(E_ALL);
}
else
{
    @ini_set('display_errors', 'Off');
    error_reporting(0);
}

class PtApp{
    static $router;
    static function handleRouter(){
        global $config;
        $url_path = isset($_SERVER['PATH_INFO'])?
                $_SERVER['PATH_INFO']:(isset($config['controller']['defaultController']) ?
                $config['controller']['defaultController']:'index.html');
        $url_path = ltrim($url_path,'/');
       
        if(substr($url_path, -1, 1) == '/')
            $url_path .= isset ($config['controller']['controllerIndex']) ? 
                $config['controller']['controllerIndex']:'index.html';
        
        $pathinfo = pathinfo($url_path);
        if($pathinfo['dirname'] == '.'){
            $pathinfo['dirname'] = '';
        }else{
           $pathinfo['dirname'] = str_replace('.', '', $pathinfo['dirname']).'/'; 
        }

        self::$router = array(
            'auto_view'         => isset($pathinfo['extension']) ? $pathinfo['extension'] : '',
            'method'            => strtolower($_SERVER['REQUEST_METHOD']),
            'is_ajax'           => isset($_SERVER['HTTP_X_REQUESTED_WITH'])? 1 : 0,
            'controller_name'   => ucfirst($pathinfo['filename']),
            'controller_path'   => isset($config['controller']['dir'])?$config['controller']['dir']:'Controller'.'/'.$pathinfo['dirname'].(isset($config['controller']['classFileName'])?$config['controller']['classFileName']:'Node.class.php'),
            'view_path'         => isset($config['view']['dir'])?$config['view']['dir']:'Controller'.'/'.$pathinfo['dirname'].$pathinfo['filename'].'.'.(isset($config['view']['suffix'])?$config['view']['suffix']:'html')
        );
    }
    static function actionValue($action,$key){
        if(key_exists($key, $_REQUEST)){
            return $_REQUEST[$key];
        }else{
            return '';
        }
    }
    static function dispatch(){
        $controller_path = PATH_PTAPP.'/'.self::$router['controller_path'];
        $view_path       = PATH_PTAPP.'/'.self::$router['view_path'];
        //echo $view_path;
        $hasNode= false;
        if(file_exists($controller_path)){
            include $controller_path;
            if(class_exists(self::$router['controller_name']) && method_exists(self::$router['controller_name'],self::$router['method']))
                $hasNode = true;
        }
        self::$router['hasNode'] = $hasNode;
        $action = self::$router['method'];
        $params = array();
        if($hasNode){
            $controllerObj = new self::$router['controller_name'];
            $ref = new ReflectionClass($controllerObj);
            $_params = $ref->getMethod($action)->getParameters();
            if(!empty($_params)){
                $params = array();
                foreach($_params as $p){			
                    $params[] = self::actionValue($action,$p->name);
                }			
            }
        }else{
            if(file_exists($view_path)){
                $controllerObj = new PtAutoView();
            }else{               
                trigger_error('404');
                exit;
            }
        }
        call_user_func_array(array($controllerObj,$action),$params);
     
        if(self::$router['auto_view'] && method_exists($controllerObj, 'render') ){
            call_user_func(array($controllerObj,'render'),self::$router['view_path']);
        }
    }
    
    static function run(){
        self::handleRouter();
        //print_pre(self::$router);
        self::dispatch();        
        #echo convert_size(memory_get_peak_usage(TRUE));
        #echo convert_size(memory_get_usage(TRUE));
    }
}

class PtNode{
    var $cur_nav = 'index';
    var $var;
    var $need_html = true;
    var $charset = 'utf-8';
    var $__title = '';
    var $_title = '';
    var $__keywords = '';
    var $_keywords = '';
    var $__description = '';
    var $_description = '';
    var $__titleSep = ' ';
    var $__titleType = 0;
    var $linkArray = array();
    var $scriptArray = array();
    var $__titleRecover = 0;
    var $__Copyright = 0;
    var $__author = 0;
    var $__favicon = 0;
    var $scriptBlockArray = array();
    var $__jquery ='';
    function getViewPath($path){
        $abs_path = PATH_PTAPP.'/'.$path;
     	//echo $abs_path;
        if(!file_exists($abs_path)){
            trigger_error('404');
            exit;
        }
        $cach_path = PATH_PTAPP.'/Runtime/tpl/'.md5($abs_path).'.php';
        if(DEBUG || !file_exists($cach_path))
            $this->cacheView($abs_path, $cach_path);
        
        return $cach_path;
    }
    
    function getVersion(){
        global $config;
        if(isset($config[PT_ENV]['debug']) && $config[PT_ENV]['debug']){
            $ver = '?v='.time();
        }else{
            $ver = '?v='.(isset($config['version']) ? $config['version'] : time());
        }
        return $ver;
    }
    
    function getLinks(){
        $l = '';
        $ver    = $this->getVersion();
        
        foreach ($this->linkArray as $i){
            $l .= '<link rel="stylesheet" type="text/css" href="'.$i.$ver.'">'."\n";
        }
        return $l;
    }
    
    function getScripts(){
        $s      = '';
        $ver    = $this->getVersion();
        
        foreach ($this->scriptArray as $i){
            $s .= '<script type="text/javascript" src="'.$i.$ver.'"></script>'."\n";
        }
        return $s;
    }
    function getScriptBlock(){
        //$this->scriptBlockArray
        if($this->scriptBlockArray){
            $s     = '<script type="text/javascript">'."\n";
            foreach ($this->scriptBlockArray as $i){
                $s .= $i."";
            }
            $s      .= "\n</script>";
            return $s;
        }else{
            return "";
        }
        
    }
    
    function genHtml($content){
        $res = preg_match('/<\/head>[\s]*?<body/i', $content,$match);
        if(!$res && $this->need_html){
            if($this->__titleType === 'append'){
                $title = $this->__title.$this->__titleSep.'<? echo $this->_title ;?>';
            }else if($this->__titleType === "prepend" ){
                
                if($this->__titleRecover === 1){
                    $title = $this->_title.$this->__titleSep.$this->__title;
                }else{
                    $title = '<? echo $this->_title ;?>'.$this->__titleSep.$this->__title;
                }
                
            }else{
                if($this->_title){
                    $title = $this->_title;
                }else{
                    $title = $this->__title;
                }
            }
            
            if($this->__jquery){
            	$this->__jquery = '<script type="text/javascript" src="'.$this->__jquery.'"></script>';
            }
            
            $links = $this->getLinks();
            $scripts = $this->getScripts();            
            $sb = $this->getScriptBlock();
            $content = <<< html
<!DOCTYPE HTML>
<head>
<meta charset="{$this->charset}">
<title>{$title}</title>
<meta name="keywords" content="{$this->__keywords}" />
<meta name="description" content="{$this->__description}" />
<meta name="google-site-verification" content="{$this->__description}" />
<meta name="Copyright" content="{$this->__Copyright}" />
<meta name="author" content="{$this->__author}" />
<link rel="shortcut icon" href="{$this->__favicon}" />
{$links}
{$this->__jquery}
{$scripts}
</head>
<body>    
{$content}
{$sb}
</body>
</html>
html;
        }
        return $content;
    }
    function setTitle($title,$type = 0,$sep = " ",$r = 0){
    
        $this->_title = $title;
        $this->__titleSep = $sep;
        $this->__titleType = $type;
        $this->__titleRecover = $r;
    }
    function handleArticle($filename){
        global $config;
        
        if(!PtApp::$router['hasNode'] && isset($config[PT_ENV]['article_dir']) && strpos($filename, 'Controller/article/') !== FALSE){
            $html = Lib\Ext\PtMarkdown\PtMarkdown::parseContent($filename,$this);
        }else{
            $html = file_get_contents($filename);
        }
        return $html;
    }
    function cacheView($filename,$cache_path){
        
        global $config;
        $this->__title = isset($config['site']['title']) ? $config['site']['title'] : '';
        $this->__keywords = isset($config['site']['keywords']) ? $config['site']['keywords'] : '';
        $this->__description = isset($config['site']['description']) ? $config['site']['description'] : '';
        
        $this->__author = isset($config['site']['author']) ? $config['site']['author'] : 'joseph@ptphp.com';
        $this->__Copyright = isset($config['site']['Copyright']) ? $config['site']['Copyright'] : 'ptphp.com';
        $this->__favicon = isset($config['site']['favicon']) ? $config['site']['favicon'] : 'favicon.ico';
        
        $this->__static_url = isset($config[PT_ENV]['static_url']) ? $config[PT_ENV]['static_url'] : '/static';
        
        $html = $this->handleArticle($filename);
        
        $content = $this->parseContent($html);
        pt_mkdir(dirname($cache_path));	
        $content = $this->genHtml($content);
        $content = $this->compress($content);		

        file_put_contents($cache_path, "<?php defined('PATH_PUBLIC') or die('acess error'); ?>".$content);
    }
    
    function parseBlock($_filename){
        $filename = $this->clearPath($_filename[1]);   
        $filename = PATH_PTAPP.'/Block/'.$filename.'.html';
        if(!file_exists($filename)){
            trigger_error($filename."不存在");
            exit;
        }
        return $this->parseContent(file_get_contents($filename));
    }
    function parseLink($filename){
        $filename = $filename[1];
        $this->linkArray[] = $filename;
        return '';
    }

    function parseScript($filename){
        $filename = $filename[1];
        $this->scriptArray[] = $filename;
        return '';
    }
    
    function parseJs($filename){
        $filename = $this->clearPath($filename[1]);        
        $this->scriptArray[] = $this->__static_url.'/js/'.$filename.'.js';
        return '';
    }
    function parseCss($filename){
        $filename = $this->clearPath($filename[1]);
        $url = $this->__static_url.'/css/'.$filename.'.css';        
        if(!in_array($url, $this->linkArray)){
            $this->linkArray[] = $url;
        } 
        return '';
    }
    function parseJquery($filename){
        if(!$filename[1]){
            $ver = "1.8.3";
        }else{
            $ver = $filename[1];
        }
        $this->__jquery = $this->__static_url.'/ptjs/jquery/'.$ver.'/jquery-'.$ver.'.min.js';
        
        return "";
    }
    
    function clearPath($path){
        
        if(strpos($path, '/') === 0){
            $path = substr($path, 1);
        }
        $t = explode('.', $path);
        $n = count($t);
        if($n > 1){
            if(in_array($t[$n-1], array('js','html','css'))){
                unset($t[$n-1]);
            }
            $path = implode('.', $t);
        }
        
        return $path;
    }
    function parsePtjs($filename){        
        $filename = $this->clearPath($filename[1]);  
        $url = $this->__static_url.'/ptjs/'.$filename.'.js';
        if(!in_array($url, $this->scriptArray)){
            $this->scriptArray[] = $url;
        }        
        return '';
    }
    
    function parseScriptBlock($s){
    
        $this->scriptBlockArray[] = $s[1];
        return "";
    }
    function parseContent($html){
        $html = preg_replace("/{(\\$[a-zA-Z_]\w*(?:\[[\w\.\"\'\[\]\$]+\])*)}/i", "<?php echo $1; ?>", $html);//替换变量
        $html = preg_replace("/{foreach\((.*)\)}/i", "<?php foreach($1){ ?>", $html);
        $html = preg_replace("/{loop\((.*)\)}/i", "<?php foreach($1){ ?>", $html);
        $html = preg_replace("/{if\((.*)\)}/i", "<?php if($1){ ?>", $html);
        $html = preg_replace("/{elseif\((.*)\)}/i", "<?php } elseif($1){ ?>", $html);		
        $html = str_replace("{else}", "<?php }else{ ?>", $html);
        $html = str_replace("{end}", "<?php } ?>", $html);
        $html = str_replace("{}}", "<?php } ?>", $html);

        $html = str_replace(array('<!--{','}-->'), array('<?php ',' ?>'), $html);
        $html = str_replace(array('{%=','%}'), array('<?php echo ',' ?>'), $html);
        $html = str_replace(array('{%','%}'), array('<?php ',' ?>'), $html);
        $html = preg_replace_callback("/{block\((.*)\)}/i",array($this, 'parseBlock'), $html);
        $html = preg_replace_callback("/{jquery\((.*)\)}/i",array($this, 'parseJquery'), $html);
        $html = preg_replace_callback("/{ptjs\((.*)\)}/i",array($this, 'parsePtjs'), $html);
        
        $html = preg_replace_callback("/{link\((.*)\)}/i",array($this, 'parseLink'), $html);
        $html = preg_replace_callback("/{script\((.*)\)}/i", array($this, 'parseScript'), $html);
        
        $html = preg_replace_callback("/{css\((.*)\)}/i",array($this, 'parseCss'), $html);        
        $html = preg_replace_callback("/{js\((.*)\)}/i",array($this, 'parseJs'), $html);
        
        #$html = preg_replace_callback("/\{S(.*+)\}/isU",array($this, 'parseScriptBlock'), $html);  
        
        return $html;
    }
    
    function compress($content){
        if(isset($GLOBALS['config'][PT_ENV]['viewmini']) && $GLOBALS['config'][PT_ENV]['viewmini']){
            $content = preg_replace('/\n[\s\t]+/i', "\n", $content);
            $content = preg_replace('/\t+/i', "", $content);
            //$content = preg_replace('/\n/i', "", $content);
        }
        return $content;	
    }
    
    function render($path){
        //echo $path;
        $view_path = $this->getViewPath($path);
        if(!empty($this->var) && is_array($this->var)) extract($this->var);        
        include $view_path;
    }
}

class PtAutoView extends PtNode{
    function get(){
    }
    function post(){ 
    }
}
class PtGenView extends PtNode{
	function get($array){
		$this->var = $array;		
	}
}

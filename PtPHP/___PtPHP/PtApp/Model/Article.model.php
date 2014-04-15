<?php
namespace Model;
use Core\PtModel as PtModel;
class Article extends PtModel{
    var $files = array();
    function collect(){
        global $config;
        if(!isset($config[PT_ENV]['article_dir']))
            alert("article_dir没有设置");
        $path = $config[PT_ENV]['article_dir'];
        
        $cache_path = PATH_PTAPP.'/Runtime/data/'.md5($path).'.php';
        if(!file_exists($cache_path) || DEBUG){
            $this->files = array();
            $html = '';
            $this->getHtmlFiles($path);
            $html .= '<ul>';
            foreach ($this->files as $f){
                $html .= '<li>';
                $html .= '<a target="_blank" href="'.str_replace($path, '/article', $f).'">';
                $html .= $this->getMdTitle($f);  
                $html .= '</a></li>';
            }
            $html .= '</ul>';
            pt_mkdir(dirname($cache_path));
            file_put_contents($cache_path,$html);
        }
        $html = file_get_contents($cache_path);
        return $html;
    }
    function getMdTitle($path){
        $content = file_get_contents($path);        
        $res = preg_match("/#title:(.*?)\n/", $content,$match);
        return $res?  trim($match[1]):'';
    }
    function getHtmlFiles($dir){
	if(is_dir($dir)){
            if($dh = opendir($dir)){
                while (($file = readdir($dh)) !== false){
                    if($file == '.' || $file == '..')
                        continue;
                    if(is_dir($dir.'/'.$file)){
                        $this->getHtmlFiles($dir.'/'.$file);
                       
                    }
                    
                    $f = $dir.'/'.$file;
                    $pathinfo = pathinfo($f);
                    if(!in_array($f, $this->files) && isset($pathinfo['extension']) && $pathinfo['extension'] == 'html'){
                        $this->files[] = $f;
                    }
                    
                }
                closedir($dh);
            }
	}
    }   
     
}
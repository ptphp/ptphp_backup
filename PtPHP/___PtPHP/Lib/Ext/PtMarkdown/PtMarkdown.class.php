<?php
namespace Lib\Ext\PtMarkdown;
use Lib\Ext\PtMarkdown\Michelf\Markdown;
class PtMarkdown{
    static function parseContent($filename,$view){
        $html = file_get_contents($filename);
        $layout_path = PATH_PTAPP.'/Block/Article/Layout.html';
        
        preg_match("/#title:(.*?)\n/", $html,$match);
        $title = '';
        if($match){
            $title = $match[1];
            $title = trim($title);
            $html = preg_replace("/#title:(.*?)\n/", "#$1",$html);
        }
        $mdObj = new Markdown();
        $html = $mdObj->transform($html);
        
        $html = str_replace('#content#', $html, file_get_contents($layout_path));
        
        if($title){
            $view->setTitle($title,'prepend'," - ",1);
        }
        return $html;
    }
}
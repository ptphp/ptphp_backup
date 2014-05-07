<?php
namespace Controller\Theme\Neat;

class Index{
	function get(){
		$cat = isset($_GET['cat'])?$_GET['cat']:"dashboard";
		$cat = strtolower(str_replace(".html", "", $cat));
        //echo $cat;
        //exit;
		include View('theme/neat/'.$cat);
	}
}

class Tools{
    function get(){
        $dir = "C:\\Users\\joseph\\Desktop\\workspace\\PtPHP\\App\\View\\theme\\neat";
        foreach (new \DirectoryIterator($dir) as $fileInfo) {
            if($fileInfo->isDot()) continue;
            if($fileInfo->getExtension() == "php"){
                $path = $dir."/".$fileInfo->getFilename();
                $content = file_get_contents($path);
                $content = preg_replace('/("|\')css\//','"/static/theme/neat/css/',$content);
                $content = preg_replace('/("|\')js\//','"/static/theme/neat/js/',$content);
                $content = preg_replace('/("|\')img\//','"/static/theme/neat/img/',$content);
                file_put_contents($path,$content);
                echo $path;
                echo "<br>";
            }
        }

    }
}
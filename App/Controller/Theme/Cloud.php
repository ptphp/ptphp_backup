<?php
namespace Controller\Theme\Cloud;

class Index{
	function get(){
        console($_GET);
		$cat = isset($_GET['cat'])?$_GET['cat']:"index.html";
		#$cat = strtolower(str_replace(".html", "", $cat));
		include View('theme/cleanzone/'.$cat);
	}
}

class Tools{
    function get(){
        $dir = PATH_APP."/View/theme/cleanzone";
        $files = list_files($dir);
        foreach($files as $file){
            $content = file_get_contents($file);
            $content = preg_replace('/"css\//','"/static/theme/cleanzone/css/',$content);
            $content = preg_replace('/"js\//','"/static/theme/cleanzone/js/',$content);
            $content = preg_replace('/"images\//','"/static/theme/cleanzone/images/',$content);
            $content = preg_replace('/"fonts\//','"/static/theme/cleanzone/fonts/',$content);
            $content = str_replace("<script src=\"https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false\"></script>","<!--<script src=\"https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false\"></script>-->",$content);
            #$content = str_replace("<link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>","<!--<link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>-->",$content);
            #$content = str_replace("<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>","<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>-->",$content);

            file_put_contents($file,$content);
            #console($file);
            #echo($content);
            #exit;
        }
    }
}
<?php
namespace Controller\Theme\Neat;

class Index{
	function get(){

        $menus = array(
            "dashboard"=>array(
                "active"  => False,
                "open"  => False,
                "name"    => "Dashboard",
                "warning" => 10,
                "icon"    =>"home",
                "url"      => "/theme/neat/?cat=dashboard"
            ),
            "Forms"=>array(
                "active"  => False,
                "open"  => False,
                "name"    => "Forms",
                "info"    => 1,
                "icon"    =>"list",
                "url"     => "/theme/neat/?cat=Forms",
            ),
            "tables"=>array(
                "active"  => False,
                "open"  => False,
                "name"    => "Tables",
                "icon"    =>"th-large",
                "url"     => "#",
                "sub_menu" =>array(
                    "datatables"=>array(
                        "name"=>"Data Tables",
                        "url"=>"/theme/neat/?cat=datatables",
                    ),
                    "mediatables"=>array(
                        "name"=>"Media Tables",
                        "url"=>"/theme/neat/?cat=mediatables",
                    ),
                    "plaintables"=>array(
                        "name"=>"Plain Tables",
                        "url"=>"/theme/neat/?cat=plaintables",
                    )
                )
            ),
            "elements"=>array(
                "active"  => False,
                "open"  => False,
                "name"    => "Interface Elements",
                "icon"    =>"tasks",
                "url"     => "#",
                "sub_menu" =>array(
                    "buttons"=>array(
                        "name"=>"Buttons & Icons",
                        "url"=>"/theme/neat/?cat=buttons",
                    ),
                    "sliders"=>array(
                        "name"=>"Sliders & Progress-Bars",
                        "url"=>"/theme/neat/?cat=sliders",
                    ),
                    "tooltips"=>array(
                        "name"=>"Tooltips, Alerts & Notification",
                        "url"=>"/theme/neat/?cat=tooltips",
                    ),
                    "tabs"=>array(
                        "name"=>"Tabs, Pills & Accordion",
                        "url"=>"/theme/neat/?cat=tabs",
                    ),
                )
            ),

            "charts"=>array(
                "active"  => False,
                "open"  => False,
                "name"    => "Statistics",
                "icon"    =>"signal",
                "url"     => "/theme/neat/?cat=statistics",
                "important"=>3
            ),

            "layouts"=>array(
                "active"  => False,
                "open"  => False,
                "name"    => "Layouts",
                "icon"    =>"resize-full",
                "url"     => "/theme/neat/?cat=statistics",
                "sub_menu" =>array(
                    "set-fixed"=>array(
                        "name"=>"Fixed",
                        "class"=>'set-fixed',
                        "url"=>"#",
                    ),
                    'set-liquid'=>array(
                        "name"=>"Liquid",
                        "class"=>'set-liquid',
                        "url"=>"#",
                    ),
                )
            ),
            "error_pages"=>array(
                "active"  => False,
                "open"  => False,
                "name"    => "Error Pages",
                "icon"    =>"exclamation-sign",
                "url"     => "#",
                "sub_menu" =>array(
                    "p403"=>array(
                        "name"=>"403",
                        "url"=>"#/theme/neat/?cat=403",
                    ),
                    "p404"=>array(
                        "name"=>"404",
                        "url"=>"#/theme/neat/?cat=404",
                    ),
                    "p500"=>array(
                        "name"=>"500",
                        "url"=>"#/theme/neat/?cat=500",
                    ),
                )
            ),
            "Sample_Pages"=>array(
                "active"  => False,
                "open"  => False,
                "name"    => "Sample Pages",
                "icon"    => "book",
                "url"     => "#",
                "sub_menu" =>array(
                    "gallery"=>array(
                        "name"=>"Gallery",
                        "url"=>"/theme/neat/?cat=gallery",
                    ),
                    "messages"=>array(
                        "name"=>"Messages",
                        "url"=>"/theme/neat/?cat=messages",
                    ),
                    "userprofile"=>array(
                        "name"=>"User Profile",
                        "url"=>"/theme/neat/?cat=userprofile",
                    ),
                    "index"=>array(
                        "name"=>"Login",
                        "url"=>"/theme/neat/?cat=index",
                    ),
                    "results"=>array(
                        "name"=>"Search results",
                        "url"=>"/theme/neat/?cat=results",
                    ),
                    "view"=>array(
                        "name"=>"View form",
                        "url"=>"/theme/neat/?cat=view",
                    ),
                    "invoice"=>array(
                        "name"=>"Invoice",
                        "url"=>"/theme/neat/?cat=invoice",
                    ),
                    "navigation_hover"=>array(
                        "name"=>"Navigation expand on hover",
                        "url"=>"/theme/neat/?cat=navigation_hover",
                    ),
                    "calendar"=>array(
                        "name"=>"Calendar",
                        "url"=>"/theme/neat/?cat=calendar",
                    ),
                )
            ),
        );


		$cat = isset($_GET['cat'])?$_GET['cat']:"dashboard";

        if(in_array($cat,array_keys($menus))){
            $menus[$cat]['active'] = TRUE;
        }else{
            foreach($menus as $key => $menu){
                if(isset($menu['sub_menu'])){
                    foreach($menu['sub_menu'] as $key1 => $sub_menu){
                        if($key1 == $cat){
                            $menus[$key]['open'] = True;
                            console($key);
                        }
                    }
                }
            }
        }

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
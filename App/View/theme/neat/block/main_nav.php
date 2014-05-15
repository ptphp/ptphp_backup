
<?php
$cat  = isset($cat)?$cat:"dashboard";
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
?>
<ul class='main-nav'>
    <?php foreach($menus as $menu){ ?>
        <li class='<?php if($menu['active']){echo "active";}?> <?php if($menu['open']){echo "open";}?>'>
            <a href="<?php echo $menu['url'] ?>" class='light<?php if(isset($menu['sub_menu'])){echo " toggle-collapsed";}?>'>
                <div class="ico"><i class="icon-<?php echo $menu['icon'];?> icon-white"></i></div>
                <?php echo $menu['name']?>
                <?php if(isset($menu['warning'])){ ?>
                    <span class="label label-warning"><?php echo $menu['warning']?></span>
                <?php }  ?>
                <?php if(isset($menu['info'])){ ?>
                    <span class="label label-info"><?php echo $menu['info']?></span>
                <?php }  ?>

                <?php if(isset($menu['important'])){ ?>
                    <span class="label label-important"><?php echo $menu['important']?></span>
                <?php }  ?>
                <?php if(isset($menu['sub_menu'])){ ?>
                    <img src="/static/theme/neat/img/toggle-subnav-down.png" alt="">
                <?php }  ?>
            </a>
            <?php if(isset($menu['sub_menu'])){ ?>
            <ul class='collapsed-nav <?php if(!$menu['open']){echo "closed";}?>'>
                <?php foreach($menu['sub_menu'] as $key1 => $sub_menu){ ?>
                <li >
                    <a <?php if($cat == $key1){ ?> style="background-color:#EEE" <?php } ?>href="<?php echo $sub_menu['url'];?>">
                        <?php echo $sub_menu['name'];?>
                    </a>
                </li>
                <?php } ?>
            </ul>
            <?php }  ?>
        </li>
    <?php } ?>



</ul>
	
    
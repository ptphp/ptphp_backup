
<?php
$cat  = isset($cat)?$cat:"dashboard";
$menus = array(
    "dashboard"=>array(
        "active"  => False,
        "open"  => False,
        "name"    => "首页",
        "icon"    =>"home",
        "url"      => "/"
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
	
    
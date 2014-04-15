<?php
use Model\Category as Category;
class Index extends Lib\AdminControl{
    function get(){
    	$model = new Category();
    	$this->var['nav_tree'] = $model->getNavTree();
    }	
}
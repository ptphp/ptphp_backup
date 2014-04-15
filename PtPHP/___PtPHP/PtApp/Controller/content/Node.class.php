<?php
use Model\Category as Category;
use Model\Content as Content;
class Index extends PtNode{
    function get($path,$page){
    	$model = new Category();
    	$res = $model->getDetail($path,$page,20,1);
    	$this->var['data'] = $res['data'];
    }
}

class Detail extends PtNode{
	function get($path,$id){
		$model = new Content();		
		$res = $model->getDetail($path,$id);		
		$this->var['row'] = $res['row'];
		$this->var['breadcrumb'] = $res['breadcrumb'];
	}
}
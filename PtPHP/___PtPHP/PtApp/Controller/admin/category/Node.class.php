<?php
use Model\Category as Category;
class Index extends PtNode{
	function get(){
		$model = new Category();
		$this->var['trs'] = $model->getTrs();
	}
}

class Change_sort extends PtNode{
	function post($c_sort,$c_id){
		$model = new Category();
		$model->updateSort($c_sort,$c_id);
	}
}

class Gen extends PtNode{
	function get($cid){
		$model = new Category();
		$model->genContent($cid);
		success('成功','/admin/category/');
	}
}

class Genall extends PtNode{
	function get($cid){
		$model = new Category();
		$model->genAllContent($cid);
		success('成功','/admin/category/');
	}
	
}
class Delete extends PtNode{
	function post($cid){
		$model = new Category();
		$model->deleteCat($cid);
		#location("/admin/category/");
	}
}
class Statics extends PtNode{
	function get($path){
		$file = PATH_PUBLIC.$path;
		pt_mkdir(dirname($file));
		$c = file_get_contents("http://www.ptphp.net/index.php/".$path);
		file_put_contents($file, $c);
		alert("操作成功",'/admin/category/');
	}
}
class Node extends PtNode{
	function get($path){		
		$file = PATH_PTAPP.'/Controller'.$path;
		if(!file_exists($file)){
			pt_mkdir(dirname($file));
			file_put_contents($file, $file);
			alert("操作成功",'/admin/category/');
		}else{
			alert("文件已存在",'/admin/category/');
		}
	}
}
class Edit extends PtNode{
    function get($cid){
    	$model = new Category();
    	$row = array();
    	if($cid){
    		$res = $model->getDetailByCid($cid);
    		if($res) $row = $res;
    	}
    	$this->var['row'] 	  = $row;
    	$this->var['c_id'] 	  = $cid;
        $this->var['options'] = $model->getOptions();
    }
    
	function post($c_id,$c_pid,$c_title,$c_name,$c_tpy,$c_keys,$c_desc,$c_content,$c_tpl){	
		$model = new Category();				
		$c_id = $model->save($c_id,$c_pid,$c_title,$c_name,$c_tpy,$c_keys,$c_desc,$c_content,$c_tpl);
		success("操作成功",'/admin/category/edit.html?cid='.$c_id);
	}
}
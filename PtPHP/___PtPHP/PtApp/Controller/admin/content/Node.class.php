<?php
use Model\Category as Category;
use Model\Content as Content;
class Index extends Lib\AdminControl{
    function get($path,$page){
    	$model    = new Content();
    	$modelCat = new Category();    
    	$page     = intval($page);
    	$page     = $page?$page:1;
    	$limit    = isset($_COOKIE['limit'])?$_COOKIE['limit']:10;
    	$status   = isset($_COOKIE['status'])?$_COOKIE['status']:2;  	
    	
    	$this->var['lists'] = $model->getContentListByPath($path,$page,$limit,$status);    	
    	$this->var['options'] = $modelCat->getOptions();
    	$this->var['crt_cat'] = $crt_cat = $modelCat->getCatInfoByCpath($path);
    	$this->var['position'] = array();
    	if($crt_cat){    		
    		$this->var['position'] = $modelCat->getPostionByCid($crt_cat['c_id']);    
    	}
    	
    	$this->var['limit'] = $limit;
    	$this->var['status'] = $status;
    	
    }	
    function getUrl($row){
    	Content::getContentUrl($row);    	
    }
}
class Gen extends PtNode{
	function get($id){
		$model = new Content();
		$model->genContent($id);
	
	}
}
class Edit extends Lib\AdminControl{
	function get($id){
		$modelCat = new Category();
		$model = new Content();
		$row = array();
		if($id){
			$id = intval($id);
			$res = $model->getInfoById($id);
			if($res){
				$row = $res;
			}else{
				alert("记录不存在");
			}
		}	
		$this->var['id'] = $id;
		$this->var['row'] = $row;
		$this->var['options'] = $modelCat->getOptions();
	}
	
	function post(){
		$model = new Content();
		$model->save();
	}
}
class Delete extends Lib\AdminControl{
	function get($id){		
		$model = new Content();		
		$model->deleteContentById($id);
		location("/admin/content/index.html");
	}
}
class Upload extends Lib\AdminControl{
	function get($id){
		$this->var['iid'] = $id;
	}

	function post($iid){
		$file_name = $_FILES['file']['name'];
		$info = pathinfo($file_name);

		$allowedExtensions = array("jpg","jpeg","gif","png");
		if (!isset($info['extension']) || !in_array(strtolower($info['extension']),$allowedExtensions)){
			alert_s("上传文件不正确,扩展名只能为：".  implode(',', $allowedExtensions));			
		}
			
		if($_FILES['file']['error'] != UPLOAD_ERR_OK)
			alert_s(upload_err_msg($_FILES['file']['error']));

		global $config;
		$name = md5(time().$file_name).".".strtolower($info['extension']);

		$p = date("Y")."/".date("m")."/".date('d');

		$upload_dir = PATH_PUBLIC.'/static/upload/sucai/'.$p;
		$upload_url = '/static/upload/sucai/'.$p;
		$path = $upload_dir.'/'.$name;
		$url = $upload_url.'/'.$name;
		// echo $path;
		//echo BR;
		pt_mkdir(dirname($path));
		$res = move_uploaded_file($_FILES['file']['tmp_name'], $path);

		if(!$res){
			alert_s("上传失败");
		}
		echo <<< script
        <script type="text/javascript">
            alert("上传成功！");
	   		top.$.ptbox_close_from_up('{$url}','{$iid}')
	   </script>
script;


	}
}
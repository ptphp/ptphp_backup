<?php
namespace Model;
use Core\PtModel as PtModel;
use \PtGenView as PtGenView;
class Content extends PtModel{
	function __construct(){
		#$this->creatTable();
	}
	function creatTable(){
		$sql = "
				DROP TABLE IF EXISTS `pt_content`;
				CREATE TABLE IF NOT EXISTS `pt_content`(
					`id` BIGINT UNSIGNED  NOT NULL AUTO_INCREMENT,						
					PRIMARY KEY(`id`)
				)ENGINE=MyISAM DEFAULT CHARSET=utf8;
				";
		db()->exec($sql);
	}
	
	function getContentListByPath($path,$page,$limit,$status,$page_type = 0){	
		$from = " from pt_content as c 
				left join pt_category as cat on cat.c_id = c.c_id 
				left join pt_content_view as cv on cv.cv_id = c.id 
				left join pt_content_info as ci on ci.ci_id = c.id 				
				where 1=1 ";
		
		$args = array();
	
		if(intval($status) < 2){
			$from .= " and c.status = :status ";
			$args['status'] = $status;
		}
	
		if($path){
			$from .= " and cat.c_path like :path ";
			$args['path'] = $path."%";
		}
	
		$from .= " order by c.id desc";
		$field = "c.id,c.uptime,ci.url_name,c.thumb,c.title,cat.*,cv.views,ci.url_name";
		return $this->db()->page("c.id",$field,$from,$args,$page,$limit,$page_type);
	}
	
	static function getContentUrl($row,$t = 0){
		$url = "/";
		if($row['c_path']){
			$url .= $row['c_path']."/";
		}
		 
		if($row['url_name']){
			$url .= $row['url_name'];
		}else{
			$url .= $row['id'];
		}		
		$url .= ".html";
		if($t){
			return $url;
		}else{
			echo $url;
		}
	}
	function deleteContentById($id){
		db()->runSql("delete from pt_content where id = ".intval($id));
		db()->runSql("delete from pt_content_info where ci_id = ".intval($id));
		db()->runSql("delete from pt_content_data where cd_id = ".intval($id));
		db()->runSql("delete from pt_content_view where cv_id = ".intval($id));
		db()->runSql("delete from pt_content_down where co_id = ".intval($id));
	}
	
	function getInfoById($id){
		$res = db()->getOne("select c.*,ci.*,cd.*,cv.*,cat.*,co.* from pt_content as c
				left join pt_content_info as ci on ci.ci_id = c.id 
				left join pt_content_data as cd on cd.cd_id = c.id 
				left join pt_content_view as cv on cv.cv_id = c.id 
				left join pt_content_down as co on co.co_id = c.id 
				left join pt_category as cat on cat.c_id = c.c_id 
				where c.id = ".intval($id));
		return $res;
	}
	
	function getThumb($content){		
		preg_match("/img src=\"(.*?)\"/i",$content,$m);
		return $m?$m[1]:'';		
	}
	function save(){		
		$id  				 = $_POST['id'];
		$data['content']    = $_POST['content'];
		$content['title']    = $_POST['title'];
		$content['c_id']     = $_POST['c_id'];
		$content['thumb']    = $_POST['thumb']?$_POST['thumb']:$this->getThumb($_POST['content']);
		$content['status']   = isset($_POST['status']) ? intval($_POST['status']):0;		
		$content['uptime']   = $_POST['uptime']?$_POST['uptime']:fDate();
		$content['addtime']	 = $content['uptime'];
		$content['keys']     = $_POST['keys'];
		$content['desc']     = $_POST['desc'];
		$content['url_from'] = $_POST['url_from'];
		$content['tpy']      = $_POST['tpy'];
		$content['is_top']   = isset($_POST['is_top'])?intval($_POST['is_top']):0;
		$content['is_index'] = isset($_POST['is_index'])?intval($_POST['is_index']):0;
		$content['is_hd']    = isset($_POST['is_hd'])?intval($_POST['is_hd']):0;
		
		$view['views']      = $_POST['views']?$_POST['views']:0;
		
		if(isset($_POST['down_path'])){
			$down['down_path']  = $_POST['down_path'];
			$down['down_size']  = $_POST['down_size']?$_POST['down_size']:0;
			$down['down_hash']  = $_POST['down_hash'];
			$down['down_num']   = $_POST['down_num']?$_POST['down_num']:0;
		}
		
		$info['oid']        	= $_POST['oid']?$_POST['oid']:0;
		$info['url_name']       = $_POST['url_name'];
		$info['tpl']       		= $_POST['tpl'];
		
		//print_pre($_POST);
		//print_pre($data);
		//print_pre($info);
		//print_pre($content);
		
		if($id){//update			
			db()->update('pt_content',$content,array('id'=>$id));
			db()->update('pt_content_info',$info,array('ci_id'=>$id));
			db()->update('pt_content_data',$data,array('cd_id'=>$id));
			db()->update('pt_content_view',$view,array('cv_id'=>$id));
			if(isset($_POST['down_path'])){
				db()->update('pt_content_down',$down,array('co_id'=>$id));
			}
			
		}else{//insert
			$id = db()->insert("pt_content",$content);
			$info['ci_id'] = $id;
			db()->insert("pt_content_info",$info);
			$data['cd_id'] = $id;
			db()->insert("pt_content_data",$data);
			
			$view['cv_id'] = $id;
			db()->insert("pt_content_view",$view);
			
			if(isset($_POST['down_path'])){
				$down['co_id'] = $id;
				$this->insert('pt_content_down',$down);
			}
		}
		
		success('操作成功',"/admin/content/edit.html?id=".$id);
		
	}
	function getDetail($path,$id){
		$id = intval($id);
		if(!$id || !$path){
			alert("参数无效！");
		}
				
		$modelCat = new Category();
		$row = $this->getInfoById($id);
		if(!$row){
			alert("没有找到记录");
		}
		if($row['c_path'] != $path){
			alert("位置不正确");
		}
		
		$cat_crt = $modelCat->getCatInfoByCid($row['c_id']);
		$cat_link = $modelCat->getPostionByCid($row['c_id']);
		$res['breadcrumb'] = $modelCat->getBreadCrumb($cat_link);
		$res['row'] = $row;
		$res['cat_crt'] = $cat_crt;
		$res['cat_link'] = $cat_link;
		return $res;
	}
	
	function genContent($id){
		
		$row = $this->getInfoById($id);
		$path = $row['c_path'];
		$res =$this->getDetail($path,$id);
		$n = new PtGenView();
		$n->get($res);		
		//print_pre($n->var);		
		ob_start();
		$n->render("Controller/content/detail.html");
		$content = ob_get_clean();
		$url = self::getContentUrl($row,1);
		
		$file_path = PATH_PUBLIC.$url;
		pt_mkdir(dirname($file_path));
		file_put_contents($file_path, $content);
		success('成功','/admin/content/');
	}
	
}
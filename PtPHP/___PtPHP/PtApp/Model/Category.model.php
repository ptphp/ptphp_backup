<?php
namespace Model;
use \PtGenView as PtGenView;
use Core\PtModel as PtModel;

class Category extends PtModel{
	function __construct(){
		#$this->creatTable();
	}
	function creatTable(){
		$sql = "
				DROP TABLE IF EXISTS `pt_category`;
				CREATE TABLE IF NOT EXISTS `pt_category`(
					`c_id` INT UNSIGNED  NOT NULL AUTO_INCREMENT,	
					`c_pid` INT UNSIGNED NOT NULL DEFAULT 0,	
					`c_title` VARCHAR(255) NOT NULL,
					`c_name` VARCHAR(255) NOT NULL,
					`c_path` VARCHAR(255) NOT NULL,
					`c_sort` INT UNSIGNED NOT NULL DEFAULT 0,		
					PRIMARY KEY(`c_id`)
				)ENGINE=MyISAM DEFAULT CHARSET=utf8;
				";
		db()->exec($sql);
	}
	
	function getCatForTreee(){
		return db()->getAll("select c_id,c_pid,c_path,c_sort,c_title,c_name from pt_category order by c_id desc,c_sort desc");
	}
	
	function genTreeOption($tree,$l = 0){
		$html = '';		
		$n = count($tree);
		$i = 0;
		$l = $l +1;
		foreach ($tree as $t){			
			$i = $i+1;
			#$sep =($n == $i)? "└":"├";		
			$sep = '';
			$space = str_repeat(str_repeat("&nbsp",3),$l);	
			#$space= '';
			$html .= '<option value="'.$t['c_id'].'">'.$space.$sep."".$t['c_title'].'</option>';
			if(isset($t['son']) && $t['son']){				
				$html .= $this->genTreeOption($t['son'],$l);
			}
		}
		return $html;
	}
	
	function genTreeTr($tree,$l = 0,$url = '/'){
		$html = '';
		$l = $l +1;
		$n = count($tree);
		$i = 1;
		foreach ($tree as $t){			
			$_url = $url.$t['c_name'].'/';
			#$sep =($n == $i)? "└":"├";
			$i = $i+1;
			#$space= '';
			$space = str_repeat(str_repeat("&nbsp",6),$l);
			$sep = '';
			$__url = $_url.'index.html';
			$html .= '<tr data-id="'.$t['c_id'].'">					
						<td>'.$space.$sep.'<a href="/admin/category/edit.html?cid='.$t['c_id'].'">'.$t['c_title'].'</a></td>
						<td>'.$t['c_name'].'</td>
						<td><a onclick="return $(this).admin_del_row();" href="/admin/category/delete?cid='.$t['c_id'].'">删除<a></td>
						<td>'.$t['c_id'].'</td>		
						<td><a target="_blank" href="/content/index.html?path='.$t['c_path'].'">查看</a></td>														
						<td><input class="sort_change" style="width:40px;margin-right:10px" value="'.$t['c_sort'].'"></td>						
						<td><a href="/admin/category/gen?cid='.$t['c_id'].'">生成</a></td>					
						<td><a href="'.$__url.'" target="_blank">'.$__url.'</a></td>
							
						
					</tr>';
			if(isset($t['son']) && $t['son']){
				$html .= $this->genTreeTr($t['son'],$l,$_url);
			}
		}
		return $html;
	}
	function genTreeNav($tree,$l = 0){
		$c = $l ? "p-dn" : "p-db";
		$left = ($l+1)*20;
		$html = '<ul class="'.$c.'">';
		$n = count($tree);
		$i = 0;
		$l = $l +1;
		foreach ($tree as $t){
			$i = $i+1;
			$plus = "";
			if(isset($t['son']) && $t['son']){
				$plus = "+";
			}
			$html .= '<li data-id="'.$t['c_id'].'">
						<a data-iframe="1" style="padding-left:'.$left.'px" href="/admin/content/index.html?path='.$t['c_path'].'">
								'.$t['c_title'].' '.$plus.'</a>';
			if(isset($t['son']) && $t['son']){
				$html .= $this->genTreeNav($t['son'],$l);
			}
			$html .= "</li>";
		}
		$html .= '</ul>';
		return $html;
	}
	function getNavTree(){
		$rows = $this->getCatForTreee();
		$tree = genTree($rows,'c_id','c_pid');
		$html = $this->genTreeNav($tree);
		return $html;
	}
	function getTrs(){
		$rows = $this->getCatForTreee();
		$tree = genTree($rows,'c_id','c_pid');
		$html = $this->genTreeTr($tree);
		return $html;
	}
	
	function getOptions(){		
		$rows = $this->getCatForTreee();		
		$tree = genTree($rows,'c_id','c_pid');	
		$html = $this->genTreeOption($tree);				
		return $html;
	}
	function getDetailByCid($cid){
		return db()->getOne("select c.*,d.* from pt_category as c left join pt_category_data as d on d.cd_id = c.c_id where c.c_id = ".intval($cid));
	}
	
	function save($c_id,$c_pid,$c_title,$c_name,$c_tpy,$c_keys,$c_desc,$c_content,$c_tpl){	
		$row = array();		
		$row['c_pid']   = $c_pid;
		$row['c_title'] = $c_title;
		$row['c_name']  = $c_name;
		$row['c_tpy']  = $c_tpy;
		
		$data['c_keys'] = $c_keys;
		$data['c_desc'] = $c_desc;
		$data['c_content'] = $c_content;
		$data['c_tpl'] = $c_tpl;
		
		if($c_pid == 0){
			$row['c_path']  = $row['c_name'];
		}else{
			$row['c_path']  = $this->getCatUrlByCid($c_pid).'/'.$row['c_name'];
		}
				
		if($c_id){			
			db()->update("pt_category",$row,array('c_id'=>$c_id));
			$r = db()->getOne("select cd_id from pt_category_data where cd_id = ".intval($c_id));	
			if($r){
				db()->update("pt_category_data",$data,array('cd_id'=>$c_id));
			}else{
				$data['cd_id'] = $c_id;
				db()->insert("pt_category_data",$data);
			}
			
		}else{			
			$c_id = db()->insert("pt_category",$row);
			$data['cd_id'] = $c_id;
			db()->insert("pt_category_data",$data);			
		}
		return $c_id;
	}
	
	function getCatInfoByCid($cid){
		$res = db()->getOne("select c.*,d.* from pt_category as c left join pt_category_data as d on d.cd_id = c.c_id where c.c_id = ".intval($cid));
		return $res;
	}
	
	function getCatInfoByCpath($cpath){
		$res = db()->getOne("select c.*,d.* from pt_category as c left join pt_category_data as d on d.cd_id = c.c_id where c.c_path = :path",array("path"=>$cpath));
		return $res;
	}
	 
	function getCatUrlByCid($cid){
		$res = $this->getCatInfoByCid($cid);
		$url = $res['c_name'];
		if($res['c_pid'] > 0){
			$url = $this->getCatUrlByCid($res['c_pid'])."/".$url;
		}
		return $url;
	}
	
	function getBreadCrumb($links){
		$html ='<ol class="breadcrumb">';
		$html .='<li><a href="/index.html">首页</a></li>';
		$n = count($links);
		$i = 0;
		foreach($links as $link){
			$i = $i+1;
			$c = ($i == $n)?'class="active"':'';
			$html .='<li '.$c.'><a href="/'.$link['c_path'].'/index.html">'.$link['c_title'].'</a></li>';
		}
		$html .='</ol>';
		return $html;
	}	
	
	function getPostionByCid($cid){
		$a = array();
		$cat = $this->getCatInfoByCid($cid);
		$a[] = $cat;
		if($cat['c_pid'] > 0){
			$_a = $this->getPostionByCid($cat['c_pid']);
			$a = array_merge($_a,$a);
		}
		return $a;
	}
	
	
	function updateSort($sort,$cid){
		db()->update('pt_category',array('c_sort'=>$sort),array('c_id'=>$cid));
	}
	
	function deleteCat($cid){
		db()->runSql("delete from pt_category where c_id = ".intval($cid));
		db()->runSql("delete from pt_category_data where cd_id = ".intval($cid));
	}
	
	function getDetail($path,$page,$limit = 20,$status = 2,$page_type = 0,$static = FALSE){
		$res = array();		
		$cat = $this->getCatInfoByCpath($path);
		$contentObj = new Content();		
		$page = intval($page);
		$page = $page?$page:1;
		
		$res['data'] = $contentObj->getContentListByPath($path,$page,$limit,$status,$page_type);
		
		$cat_link = $this->getPostionByCid($cat['c_id']);
		
		$res['crt_cat'] = $cat;
		$res['cat_link'] = $cat_link;
		
		if($static){
			$n = $res['data']['page']['num_total'];
			for($i = 0; $i < $n;$i++){
				//echo $i;
			}
		}
		
		return $res;
	}
	
	function genAllContent(){
		$rows = db()->getAll("select * from pt_category");
		foreach($rows as $row){
			$this->genContent($row['c_id']);
		}
	}
	function genContent($cid){
		$cat = $this->getCatInfoByCid($cid);
		$path = $cat['c_path'];
		$page = 1;		
		$res = $this->getDetail($path,$page,20,1,1,TRUE);
		
		$n = new PtGenView();
		$n->get($res);
		//print_pre($n->var);
		ob_start();
		$n->render("Controller/content/index.html");
		$content = ob_get_clean();
	
		$url = '/'.$path.'/index.html';
		$file_path = PATH_PUBLIC.$url;
		pt_mkdir(dirname($file_path));
		file_put_contents($file_path, $content);		
	}
}
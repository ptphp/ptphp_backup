<?php
namespace Core;

class PtHtml{
	static $v = "0.0.1";
	static function link($name,$rel='stylesheet',$type='text/css'){
		global $config;
		if(strpos($name, 'http://') === 0){
			$href = $name;
		}else{
			if($config['static_host']){
				$href = rtrim($config['static_host'],'/').'/'.ltrim($name,'/');
			}else{
				$href = $name;
			}
		}
		if(DEBUG){
			self::$v = time();
		}elseif(isset($config['version'])){
			self::$v = $config['version'];
		}

		return '<link rel="'.$rel.'" type="'.$type.'" href="'.$href.'?v='.self::$v.'">'."\n";
	}
	static function script($name){
		global $config;
		if(strpos($name, 'http://') === 0){
			$src = $name;
		}else{
			if($config['static_host']){
				$src = rtrim($config['static_host'],'/').'/'.ltrim($name,'/');
			}else{
				$src = $name;
			}
		}
		if(DEBUG){
			self::$v = time();
		}elseif(isset($config['version'])){
			self::$v = $config['version'];
		}
		return '<script src="'.$src.'?v='.self::$v.'"></script>'."\n";
	}
	static function table($sql,$parame){
		$res = PdoDb::getObj()->getAll($sql);
		//echo $sql;
		//print_r($res);
		$html = '<table class="table table-hover table-striped table-bordered table-condensed"><thead><tr>';
		$head = '';
		$body = array();
		foreach ($parame as $key => $value) {
			$html .= '<th>'.$value.'</th>';
			$body[] = $key;
		}

		$html .= '<th>操作</th></tr></thead><tbody>';


		foreach ($res as $k => $v) {
			$html .='<tr>';
			foreach ($body as $vv) {
				$html .= '<td>'.$v[$vv].'</td>';
			}
			$html .='<td><button class="btn btn-mini btn-primary" onclick="location.href=\'/index.php?mod=agent&rid='.$v['id'].'\'">详细</button></td></tr>';
		}

		$html .= '</tbody></table>';
		echo $html;
	}
}


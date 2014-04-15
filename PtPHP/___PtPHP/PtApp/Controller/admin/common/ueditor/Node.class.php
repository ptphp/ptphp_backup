<?php
include PATH_PTAPP."/Lib/ueditor/Uploader.class.php";
/**
 * 向浏览器返回数据json数据
 * {
 *   'url'      :'a.rar',        //保存后的文件路径
 *   'fileType' :'.rar',         //文件描述，对图片来说在前端会添加到title属性上
 *   'original' :'编辑器.jpg',   //原始文件名
 *   'state'    :'SUCCESS'       //上传状态，成功时返回SUCCESS,其他任何值将原样返回至图片上传框中
 * }
 */


class Fileup extends Lib\AdminControl{
	function post(){
		$config = array(
				"savePath" => "static/upload/file/", //保存路径
				"allowFiles" => array( ".rar" , ".doc" , ".docx" , ".zip" , ".pdf" , ".txt" , ".swf" , ".wmv" ) , //文件允许格式
				"maxSize" => 1000000 //文件大小限制，单位KB
		);
		$up = new Uploader( "upfile" , $config );
		$info = $up->getFileInfo();
		echo '{"url":"' .$info[ "url" ] . '","fileType":"' . $info[ "type" ] . '","original":"' . $info[ "originalName" ] . '","state":"' . $info["state"] . '"}';
	}

}

class Scrawlup extends Lib\AdminControl{
	function post(){
		$config = array(
				"savePath" => "static/upload/scraw/" ,             //存储文件夹
				"maxSize" => 10000 ,                   //允许的文件最大尺寸，单位KB
				"allowFiles" => array( ".gif" , ".png" , ".jpg" , ".jpeg" , ".bmp" )  //允许的文件格式
		);
		//临时文件目录
		$tmpPath = "static/upload/tmp/";
		//获取当前上传的类型
		$action = htmlspecialchars( isset($_GET[ "action" ])?$_GET[ "action" ]:"" );
		if ( $action == "tmpImg" ) { // 背景上传
			//背景保存在临时目录中
			$config[ "savePath" ] = $tmpPath;
			$up = new Uploader( "upfile" , $config );
			$info = $up->getFileInfo();
			/**
			 * 返回数据，调用父页面的ue_callback回调
			*/
			echo "<script>parent.ue_callback('" . $info[ "url" ] . "','" . $info[ "state" ] . "')</script>";
		} else {
			//涂鸦上传，上传方式采用了base64编码模式，所以第三个参数设置为true
			$up = new Uploader( "content" , $config , true );
			//上传成功后删除临时目录
			if(file_exists($tmpPath)){
				delDir($tmpPath);
			}
			$info = $up->getFileInfo();
			echo "{'url':'" . $info[ "url" ] . "',state:'" . $info[ "state" ] . "'}";
		}
	}
}

class Imguploader extends Lib\AdminControl{
	function post($pictitle,$dir){
		$title = htmlspecialchars($pictitle, ENT_QUOTES);
		$path = htmlspecialchars($dir, ENT_QUOTES);
		//上传配置
		$config = array(
				"savePath" => ($path == "1" ? "static/upload/pic" : "static/upload/pic1"),
				"maxSize" => 100000, //单位KB
				"allowFiles" => array(".gif", ".png", ".jpg", ".jpeg", ".bmp")
		);
		$up = new Uploader("upfile", $config);
		$info = $up->getFileInfo();
		echo "{'url':'" . $info["url"] . "','title':'" . $title . "','original':'" . $info["originalName"] . "','state':'" . $info["state"] . "'}";
	}
}


class Imagemanager extends Lib\AdminControl{
	function post(){
			
		//需要遍历的目录列表，最好使用缩略图地址，否则当网速慢时可能会造成严重的延时
		$paths = array('static/upload/');		
		$action = htmlspecialchars( isset($_POST[ "action" ])?$_POST[ "action" ]:'' );
		if ( $action == "get" ) {
			$files = array();
			foreach ( $paths as $path){
				$tmp = getfiles( $path );
				if($tmp){
					$files = array_merge($files,$tmp);
				}
			}
			if ( !count($files) ) return;
			rsort($files,SORT_STRING);
			$str = "";
			foreach ( $files as $file ) {
				$str .= $file . "ue_separate_ue";
			}
			echo $str;
		}
	}
}
class Getmovie extends Lib\AdminControl{
	function post(){
		$key =htmlspecialchars($_POST["searchKey"]);
		$type = htmlspecialchars($_POST["videoType"]);
		$html = file_get_contents('http://api.tudou.com/v3/gw?method=item.search&appKey=myKey&format=json&kw='.$key.'&pageNo=1&pageSize=20&channelId='.$type.'&inDays=7&media=v&sort=s');
		echo $html;
	}
}

class Getremoteimage extends PtNode{
	function post(){
		//远程抓取图片配置
		$config = array(
				"savePath" => "static/upload/pic/" ,            //保存路径
				"allowFiles" => array( ".gif" , ".png" , ".jpg" , ".jpeg" , ".bmp" ) , //文件允许格式
				"maxSize" => 3000                    //文件大小限制，单位KB
		);
		$uri = htmlspecialchars( $_POST[ 'upfile' ] );
		$uri = str_replace( "&amp;" , "&" , $uri );
		getRemoteImage( $uri,$config );
	}	
}
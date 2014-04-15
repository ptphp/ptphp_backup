<?php
namespace Core;

class PtImgSingleUpload{
	public $error = '';
	function __construct(){

	}

	function go($upload_dir,$upload_url,$fileElementName){

		$error = "";
		if(!empty($_FILES[$fileElementName]['error']))
		{
			switch($_FILES[$fileElementName]['error'])
			{
				case '1':
					$error = '上传文件超出范围，大小不能超过'.@ini_get('upload_max_filesize');
					break;
				case '2':
					$error = '上传文件太大超出浏览器设置MAX_FILE_SIZE的范围';
					break;
				case '3':
					$error = '文件只有部分被上传';
					break;
				case '4':
					$error = '没有文件被上传';
					break;

				case '6':
					$error = '找不到临时文件夹。';
					break;
				case '7':
					$error = '文件写入失败';
					break;
				case '8':
					$error = '上传中断';
					break;
				case '999':
				default:
					$error = '上传错误';
			}
		}elseif(empty($_FILES[$fileElementName]['tmp_name']) || $_FILES[$fileElementName]['tmp_name'] == 'none')
		{
			$error = '没有上传文件';
		}else
		{

			$type 		= $_FILES[$fileElementName]['type'];
			$size 		= $_FILES[$fileElementName]['size'];
			//$name 		= $_FILES[$fileElementName]['name'];
			$tmp_name 	= $_FILES[$fileElementName]['tmp_name'];

			switch ($type) {
				case 'image/jpeg':
				case 'image/jpg':
				case 'image/pjpeg':
				case 'image/png':
				case 'image/gif':
					$info = getimagesize($tmp_name);
					if($info){
						$ext = str_replace('image/', '', $info['mime']);
						if($ext == 'jpeg' || $ext == 'pjpeg')
							$ext = 'jpg';
							
					}else{
						$error = '图片格式不正确';
					}
					break;
				default:
					$error = '上传文件不在允许的范围';
					break;
			}

			if($error == ''){
				$file_path = date('Y').'/'.date('m').'/'.date('d').'/'.str_replace('.', '_', microtime(true).rand(100, 999)).'.'.$ext;
				$dir =	dirname($upload_dir."/".$file_path);
				if(!is_dir($dir)){
					pt_mkdir($dir);
				}

				if(!is_dir($dir)){
					$error = '上传目录不可写';
				}

				if($error == ''){
					$des_filename = $upload_dir.'/'.$file_path;
					move_uploaded_file($tmp_name, $des_filename);
				}
			}
		}
		if($error == ''){
			return $upload_url.'/'.$file_path;
		}else{
			$this->error = $error;
		}
		//$upload_handler = new UploadHandler($options);

	}


}

<?php
class DownImage {
	var $source;//保存远程图片的URL
	var $save_to;//初始值为本地图片的保存目录
	var $set_extension;//是否指定扩展名的标志
	var $quality;//下载后图片的品质(默认为100%)
	//定义图片下载方法。参数为使用的方式标志，默认为使用cURL库进行图片下载
	function download($method = 'curl')
	{
		//调用GD库中的GetImageSize函数，取得远程图片的信息，并从其中的mime元素中分离出图片的类型名$type
		$info = @GetImageSize($this->source);
		$mime = $info['mime'];
		$type = substr(strrchr($mime, '/'), 1);
		//根据图片类型的不同，决定不同的图像生成函数ImageCreateFromXXX,图像保存函数ImageXXX,以及图片扩展名
		switch ($type){
			case 'jpeg':
				$image_create_func = 'ImageCreateFromJPEG';
				$image_save_func = 'ImageJPEG';
				$new_image_ext = 'jpg';
				$quality = isSet($this->quality) ? $this->quality : 100;
				break;
			case 'png':
				$image_create_func = 'ImageCreateFromPNG';
				$image_save_func = 'ImagePNG';
				$new_image_ext = 'png';
				$quality = isSet($this->quality) ? $this->quality : 0;
				break;
			case 'bmp':
				$image_create_func = 'ImageCreateFromBMP';
				$image_save_func = 'ImageBMP';
				$new_image_ext = 'bmp';
				break;
			case 'gif':
				$image_create_func = 'ImageCreateFromGIF';
				$image_save_func = 'ImageGIF';
				$new_image_ext = 'gif';
				break;
			case 'vnd.wap.wbmp':
				$image_create_func = 'ImageCreateFromWBMP';
				$image_save_func = 'ImageWBMP';
				$new_image_ext = 'bmp';
				break;
			case 'xbm':
				$image_create_func = 'ImageCreateFromXBM';
				$image_save_func = 'ImageXBM';
				$new_image_ext = 'xbm';
				break;
			default:
				$image_create_func = 'ImageCreateFromJPEG';
				$image_save_func = 'ImageJPEG';
				$new_image_ext = 'jpg';
		}
		//根据‘指定扩展名标志’set_extension属性来合成本地图片文件名
		if(isSet($this->set_extension)){
			$ext = strrchr($this->source, ".");
			$strlen = strlen($ext);
			$new_name = basename(substr($this->source, 0, -$strlen)).'.'.$new_image_ext;
		}else{
			$new_name = basename($this->source);
		}
		
		
		$new_name = md5($this->source).'.'.$new_image_ext;
		
		
		$path = date('Y').'/'.date('m').'/'.date('d');
		
		//生成本地图片文件路径
		$save_to = $this->save_to.$path.'/'.$new_name;
		pt_mkdir(dirname($save_to));
		$file_path = $path.'/'.$new_name;
		
		
		//图片下载方式为curl时，调用LoadImageCURL进行图片的下载
		if($method == 'curl'){
			$save_image = $this->LoadImageCURL($save_to);
			//下载方式为gd时，调用与图片类型对应的GD图像进行图片下载。函数ImageCreateFromXXX用于读入远程图片文件，ImageXXX用于在新的文件中保存图像数据
		}elseif($method == 'gd'){
			$img = $image_create_func($this->source);
			if(isSet($quality)){
				$save_image = $image_save_func($img, $save_to, $quality);
			}else{
				$save_image = $image_save_func($img, $save_to);
			}
		}
		return $file_path;
	}
	//定义利用cURL库进行图片下载的方法，参数为远程图片的URL。
	function LoadImageCURL($save_to)
	{
		$ch = curl_init($this->source);//初始化curl，读入远程图片文件
		$fp = fopen($save_to, "wb");//新建本地图片文件
		//结合curl的各个参数，包括本地文件句柄，头信息有无标志，递归设置(启用时会将服务器返回的"Location:"放在header中递归时返回给服务器)，设置超时限制
		$options = array(CURLOPT_FILE => $fp,
				CURLOPT_HEADER => 0,
				CURLOPT_FOLLOWLOCATION => 1,
				CURLOPT_TIMEOUT => 60);
		curl_setopt_array($ch, $options);//设置curl选项
		curl_exec($ch);//执行请求
		curl_close($ch);//关闭curl句柄以及文件句柄
		fclose($fp);
	}
}

server {
	listen       80;
	server_name  test.ptphp.net;
	autoindex on;
	root   C:/Users/joseph/Desktop/workspace/PtPHP;

	location / {
		index index.php;
	}


	location ~* .*\.php($|/){
		fastcgi_pass   127.0.0.1:9002;	
		include        fastcgi_params;
		
		# php.ini cgi.fix_pathinfo=0
		
		#定义变量 $path_info ，用于存放pathinfo信息
		set $path_info "";
		#定义变量 $real_script_name，用于存放真实地址
		set $real_script_name $fastcgi_script_name;
		#如果地址与引号内的正则表达式匹配
		if ($fastcgi_script_name ~ "^(.+?.php)(/.+)$") {
				#将文件地址赋值给变量 $real_script_name
				set $real_script_name $1;
				#将文件地址后的参数赋值给变量 $path_info
				set $path_info $2;
		}
		#配置fastcgi的一些参数
		fastcgi_param SCRIPT_FILENAME $document_root$real_script_name;
		fastcgi_param SCRIPT_NAME $real_script_name;
		fastcgi_param PATH_INFO $path_info;			
		try_files $fastcgi_script_name =404;			
	}
	
}

server {
	listen       80;
	server_name  www.ptphp.net;
	autoindex on;
	root   C:\Users\joseph\Desktop\workspace\PtPHP\Public;

	location / {
		index index.php;
	}
	
	location /test/ {
		autoindex on;
		root C:\Users\joseph\Desktop\workspace\PtPHP\test\;
	}
	
	#如果请求既不是一个文件，也不是一个目录，则执行一下重写规则
	if (!-e $request_filename)
	{
		#地址作为将参数rewrite到index.php上。
		rewrite ^/(.*)$ /index.php/$1;
	}
	
	
	location ~* .*\.php($|/){
		fastcgi_pass   127.0.0.1:9002;	
		include        fastcgi_params;
		
		# php.ini cgi.fix_pathinfo=0
		
		#定义变量 $path_info ，用于存放pathinfo信息
		set $path_info "";
		#定义变量 $real_script_name，用于存放真实地址
		set $real_script_name $fastcgi_script_name;
		#如果地址与引号内的正则表达式匹配
		if ($fastcgi_script_name ~ "^(.+?.php)(/.+)$") {
				#将文件地址赋值给变量 $real_script_name
				set $real_script_name $1;
				#将文件地址后的参数赋值给变量 $path_info
				set $path_info $2;
		}
		#配置fastcgi的一些参数
		fastcgi_param SCRIPT_FILENAME $document_root$real_script_name;
		fastcgi_param SCRIPT_NAME $real_script_name;
		fastcgi_param PATH_INFO $path_info;			
		try_files $fastcgi_script_name =404;			
	}	
}

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
		
		#������� $path_info �����ڴ��pathinfo��Ϣ
		set $path_info "";
		#������� $real_script_name�����ڴ����ʵ��ַ
		set $real_script_name $fastcgi_script_name;
		#�����ַ�������ڵ�������ʽƥ��
		if ($fastcgi_script_name ~ "^(.+?.php)(/.+)$") {
				#���ļ���ַ��ֵ������ $real_script_name
				set $real_script_name $1;
				#���ļ���ַ��Ĳ�����ֵ������ $path_info
				set $path_info $2;
		}
		#����fastcgi��һЩ����
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
	
	#�������Ȳ���һ���ļ���Ҳ����һ��Ŀ¼����ִ��һ����д����
	if (!-e $request_filename)
	{
		#��ַ��Ϊ������rewrite��index.php�ϡ�
		rewrite ^/(.*)$ /index.php/$1;
	}
	
	
	location ~* .*\.php($|/){
		fastcgi_pass   127.0.0.1:9002;	
		include        fastcgi_params;
		
		# php.ini cgi.fix_pathinfo=0
		
		#������� $path_info �����ڴ��pathinfo��Ϣ
		set $path_info "";
		#������� $real_script_name�����ڴ����ʵ��ַ
		set $real_script_name $fastcgi_script_name;
		#�����ַ�������ڵ�������ʽƥ��
		if ($fastcgi_script_name ~ "^(.+?.php)(/.+)$") {
				#���ļ���ַ��ֵ������ $real_script_name
				set $real_script_name $1;
				#���ļ���ַ��Ĳ�����ֵ������ $path_info
				set $path_info $2;
		}
		#����fastcgi��һЩ����
		fastcgi_param SCRIPT_FILENAME $document_root$real_script_name;
		fastcgi_param SCRIPT_NAME $real_script_name;
		fastcgi_param PATH_INFO $path_info;			
		try_files $fastcgi_script_name =404;			
	}	
}
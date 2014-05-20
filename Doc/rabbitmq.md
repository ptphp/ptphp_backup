http://blog.csdn.net/linvo/article/details/5752773
http://blog.csdn.net/linvo/article/details/7821935

http://blog.csdn.net/chenjiebin/article/details/8253433

sudo apt-get install rabbitmq-server
sudo apt-get install python-pip
apt-get install python-pika



下载地址 http://www.erlang.org/download.html
在win7下安装Erlang最好默认安装。
配置环境变量 ERLANG_HOME=C:\Program Files (x86)\erl6.0
添加到PATH=%ERLANG_HOME%\bin;


配置环境变量 C:\Program Files (x86)\RabbitMQ Server
添加到PATH=%RABBITMQ_SERVER%\sbin;

RabbitMQ 有个很和谐的web管理插件叫 rabbitmq_management
官网原文：http://www.rabbitmq.com/management.html
安装非常容易，首先确保以administrator身份打开rabbitmq的终端
输入以下命令即可：
>rabbitmq-plugins.bat enable rabbitmq_management
>rabbitmq-service.bat stop
>rabbitmq-service.bat install
>rabbitmq-service.bat start
打开浏览器登录：http://127.0.0.1:55672
登录 账号密码都是 guest

rabbitmq-plugins enable rabbitmq_management
rabbitmq-service stop
rabbitmq-service install
rabbitmq-service start


/usr/lib/rabbitmq/bin/rabbitmq-plugins enable rabbitmq_management
service rabbitmq-server restart



打开浏览器登录：http://127.0.0.1:55672


sudo rabbitmqctl list_queues
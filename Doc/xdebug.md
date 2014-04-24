符号 含义 配置样例 样例文件名 
%c 当前工作目录的crc32校验值 trace.%c trace.1258863198.xt 
%p 当前服务器进程的pid trace.%p trace.5174.xt 
%r 随机数 trace.%r trace.072db0.xt 
%s 脚本文件名(注) cachegrind.out.%s cachegrind.out._home_httpd_html_test_xdebug_test_php 
%t Unix时间戳(秒) trace.%t trace.1179434742.xt 
%u Unix时间戳(微秒) trace.%u trace.1179434749_642382.xt 
%H $_SERVER['HTTP_HOST'] trace.%H trace.kossu.xt 
%R $_SERVER['REQUEST_URI'] trace.%R trace._test_xdebug_test_php_var=1_var2=2.xt 
%S session_id (来自$_COOKIE 如果设置了的话) trace.%S trace.c70c1ec2375af58f74b390bbdd2a679d.xt 
%% %字符 trace.%% trace.%.xt 注 此项不适用于trace file的文件名

从上表可以找到一些适合你的参数。
比如，我想针对每个文件生成一个输出文件。
那么我可以用：
xdebug.profiler_output_name = cachegrind.out.%s
多个域名的话，也可以组合使用
xdebug.profiler_output_name = cachegrind.out.%H.%u.%s


[Xdebug]
zend_extension = ext\php_xdebug-2.2.4-5.3-vc9-nts.dll
xdebug.trace_output_dir="c:/xdebug"  
xdebug.profiler_output_dir="c:/xdebug"  

;xdebug.profiler_output_name = cachegrind.out.%p
;xdebug.profiler_output_name = cachegrind.out.%H.%u.%s
xdebug.profiler_output_name = cachegrind.out.%s
;是否开启自动跟踪
xdebug.auto_trace= On
;是否开启异常跟踪
xdebug.show_exception_trace= On
;是否收集变量
xdebug.collect_vars= On
;是否收集返回值
xdebug.collect_return= On
;是否收集参数
xdebug.collect_params= On
;是否开启调试内容
xdebug.profiler_enable=On
xdebug.profiler_enable_trigger=1 

xdebug.dump_once=On 
xdebug.dump_globals=On 
xdebug.dump_undefined=On 
xdebug.dump.REQUEST=* 
xdebug.dump.SERVER=REQUEST_METHOD,REQUEST_URI,HTTP_USER_AGENT 
xdebug.default_enable=On 
xdebug.show_local_vars=1 
xdebug.max_nesting_level=50 
xdebug.var_display_max_depth=6 

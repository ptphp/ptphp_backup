���� ���� �������� �����ļ��� 
%c ��ǰ����Ŀ¼��crc32У��ֵ trace.%c trace.1258863198.xt 
%p ��ǰ���������̵�pid trace.%p trace.5174.xt 
%r ����� trace.%r trace.072db0.xt 
%s �ű��ļ���(ע) cachegrind.out.%s cachegrind.out._home_httpd_html_test_xdebug_test_php 
%t Unixʱ���(��) trace.%t trace.1179434742.xt 
%u Unixʱ���(΢��) trace.%u trace.1179434749_642382.xt 
%H $_SERVER['HTTP_HOST'] trace.%H trace.kossu.xt 
%R $_SERVER['REQUEST_URI'] trace.%R trace._test_xdebug_test_php_var=1_var2=2.xt 
%S session_id (����$_COOKIE ��������˵Ļ�) trace.%S trace.c70c1ec2375af58f74b390bbdd2a679d.xt 
%% %�ַ� trace.%% trace.%.xt ע ���������trace file���ļ���

���ϱ�����ҵ�һЩ�ʺ���Ĳ�����
���磬�������ÿ���ļ�����һ������ļ���
��ô�ҿ����ã�
xdebug.profiler_output_name = cachegrind.out.%s
��������Ļ���Ҳ�������ʹ��
xdebug.profiler_output_name = cachegrind.out.%H.%u.%s


[Xdebug]
zend_extension = ext\php_xdebug-2.2.4-5.3-vc9-nts.dll
xdebug.trace_output_dir="c:/xdebug"  
xdebug.profiler_output_dir="c:/xdebug"  

;xdebug.profiler_output_name = cachegrind.out.%p
;xdebug.profiler_output_name = cachegrind.out.%H.%u.%s
xdebug.profiler_output_name = cachegrind.out.%s
;�Ƿ����Զ�����
xdebug.auto_trace= On
;�Ƿ����쳣����
xdebug.show_exception_trace= On
;�Ƿ��ռ�����
xdebug.collect_vars= On
;�Ƿ��ռ�����ֵ
xdebug.collect_return= On
;�Ƿ��ռ�����
xdebug.collect_params= On
;�Ƿ�����������
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

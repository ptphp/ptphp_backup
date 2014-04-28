<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> <?php echo $test_suite->_label; ?></title>
<style>
body {
	font: 0.75em "Helvetica Neue", Arial, Helvetica, sans-serif;
	color: #000;
	margin: 0;
	padding: 0;
}
code, pre {
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	font-family: "Bitstream Vera Sans Mono", monospace;
	font-size: 12px;
	margin: 14px 5px 14px 5px;
	padding: 12px 10px 12px 10px;
}
#header {
	background: #eee;
	border-bottom: 1px solid #ddd;
	padding: 10px;
}
#header h2 {
	color: #900;
	margin: 0;
}
#nav {
	margin: 10px 20px;
}



.test {
	border-bottom: 1px solid #ddd;
	padding: 5px 0;
}
.test h3 {
	display: inline;
	font-weight: normal;
}
.test.pass h3 { color: #090; }
.test.fail h3 { color: #e00; }
.test div.result {
	color: #fff;
	float: left;
	font-weight: bold;
	margin-right: 8px;
	text-align: center;
	width: 55px;
}
.test.fail div.result, .summary.fail {
	background: #c00;
	border: 1px solid #900;
}
.test.pass div.result, .summary.pass {
	background: #0a0;
	border: 1px solid #080;
}
.summary {
	color: #fff;
	font-weight: bold;
	font-size: 1.5em;
	padding: 10px;
	margin: 10px 0;
	position: absolute;
	top: 0;
}
.test div.time {
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #666 !important;
	float: left;
	font: 1.15em 'Courier New', monospace;
	margin-left: -65px;
	text-align: center;
	width: 55px;
}
.test .details {
	padding-top: 5px;
	padding-left: 65px;
}
.test.pass .details {
	color: #999;
}
.test.fail .details {
	color: #444;
}
.test.fail .details strong {
	color: #900;
}
form {
	margin: 0;
	padding: 0;
	display: inline;
}
#running {
display:none;
border:				#999 1px solid;
line-height: 30px;
vertical-align:middle;
background-color:	#fff;
padding:			20px 20px 12px 20px;
}

#running img {
	margin:10px;
	width:15px;
	height:15px;
	vertical-align:middle;
}

#test_pan{
	position:absolute;
	top:80px;;
	bottom:0;
	left:0;
	right:0;
	padding:20px;
}

#report {
	padding: 50px 0 0 0;
	margin: 0 20px 20px;
	position: absolute;
	float:right;
	left:350px;
	right:0;
}

#test_tree{
	width:300px;
	top:0;
	bottom:0;
	position: absolute;
}

</style>
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
<script src="http://cdn.bootcss.com/Cookies.js/0.3.1/cookies.min.js"></script>
</head>
<body>
	<div id="header">
		<h2><?php echo $test_suite->_label; ?> &rsaquo; Index</h2>
	</div>
	<div style="padding:10px 20px;">
		<button onclick="refresh_select()">Refresh tree</button>
		<button onclick="refresh_tests()">Refresh tests</button>
		<select name="test" id="test_select" onchange="on_select_unit_test_changed(this)"></select>
		
	</div>
	<div id="test_pan">	
		<div id="test_tree">
			
		</div>
		<div id="report">
		
		</div>
	</div>
	<script>
	var on_test_btn_click = function(obj){
		var id = $(obj).data("id");
		var path = $(obj).data("path");
		var method = $(obj).data("method");
		//console.log(id,path);
		$.post(location.href,{id:id,method:method,path:path,op:"do_test"},function(data){
			//console.log(data);
			$("#report").html(data);
		});
	}
	function on_select_unit_test_changed(obj){
		var v = obj.value;
		get_tests(v)
	}
	function refresh_tests(){
		get_tests($("#test_select").val());
	}
	function refresh_select(){
		get_test_select();
	}
	
	function get_tests(v){		
		if(!v){
			return false;
		}
		Cookies.set("v",v);
		var url = "/pttest/test_tree?path="+v+"&_t="+(+new Date());
		$.get(url,function(data){
			$("#test_tree").html(data);
		})
	}
	function get_test_select(){
		var url = "/pttest/test_select?_t="+(+new Date())
		$("#test_select").load(url);
	}
	$(function(){
		get_test_select();
		var v = Cookies.get("v");
		if(v){
			get_tests(v);
			$("#test_select").val(v);
		}
	})
	</script>
</body>
</html>

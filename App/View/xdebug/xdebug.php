<html>
<head>
	<title>Xdebug Trace File Parser</title>
	<style>
	
	*,html * {
	font: 12px verdana, sans-serif;
	color: black;
}

strong {
	font-weight: bold;
}

small {
	font-size: 11px;
}

h1 {
	font-size: 24px;
	font-weight: bold;
}

h2 {
	font-size: 18px;
}

label {
	display: block;
	margin-bottom: 5px;
}

img {
	vertical-align: middle;
	border: 0;
}

table {
	width: 100%;
}

td,th {
	padding: 3px;
	vertical-align: top;
}

th {
	background: #343434;
	color: white;
	text-align: left;
}

td.digit {
	text-align: right;
}

a {
	color: navy;
	text-decoration: none;
}

a:hover {
	text-decoration: underline;
}

a:visited {
	color: purple;
}

span.warning {
	font-weight: bold;
	color: maroon;
	font-size: 11px;
}

tr.near td {
	background: #fffac1;
}

tr.line td {
	background: #f7f09f;
}
	</style>
</head>
<body>
<h1>Xdebug Trace File Parser</h1>
<h2>Settings</h2>
<form method="get">
	<input onclick="do_remove()" type="button" value="remove" />
	<label>File
	<select name="file">
	<?=$options;?>
	</select>
	</label>	
	<label>If the memory jumps <input type="text" name="memory" value="0.3" style="text-align:right" size="5"/> MB, provide an alert</label>
	<label>If the execution time jumps <input type="text" name="time" value="0.3" style="text-align:right" size="5"/> seconds, provide an alert</label>
	<input onclick="do_parse()" type="button" value="parse" />
</form>

<h2>Output</h2>
<div id="output">


</div>
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
<script type="text/javascript">

function do_parse(){
	var file = $("select[name=file]").val();
	if(!file){
		$("select[name=file]").focus();
		return false;
	}
	var memory = $("input[name=memory]").val();
	var time = $("input[name=time]").val();

	$.post(location.href,{file:file,time:time,memory:memory},function(data){
		//console.log(data);
		$("#output").html(data);
	})
}
function do_remove(){

	$.get("/index.php?_r=/xdebug/&op=del_files",function(data){
		console.log(data);
		//$("#output").html(data);
	})
}
function showCode(where) {
	var file = $(where).data("file");
	var line = $(where).data("line");
	window.open('/index.php?_r=/xdebug/&op=get_code&line=' +line + '&file=' + file + '#l' + line, 'code', 'width=500,height=400,toolbar=no,status=no,menubar=no,scrollbars=yes');
}

</script>
</body>
</html>
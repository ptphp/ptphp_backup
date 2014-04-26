<html>
<head>
<meta charset="utf-8"/>
<link href="http://datatables.net/release-datatables/examples/examples_support/themes/smoothness/jquery-ui-1.8.4.custom.css" rel="stylesheet">
<link href="http://cdn.bootcss.com/datatables/1.9.4/css/demo_page.css" rel="stylesheet">
<link href="http://cdn.bootcss.com/datatables/1.9.4/css/demo_table_jui.css" rel="stylesheet">
<style>
body{
font:  12px Verdana, Arial, Helvetica, sans-serif;
margin: 0;
padding: 0;
color: #333;
background-color: #fff;
}
</style>
</head>
<body>
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
		<thead>
			<tr>
				<th>id</th>
				<th>function</th>
				<th>Time</th>
				<th>Memory(MB)</th>
				<th>filename</th>
				<th>arg_num</th>
				<th>args</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 0;			
			foreach($fullTrace as $row){
			$i++;
			?>
			<tr class="gradeA">
				<td><?php echo $row['id']?></td>	
				<td style="padding-left:<?php echo ($row['level'] * 30) ?>px">
					<?php if($row['type'] == 0) {?>
					<a target="_blank" href="http://php.net/<?php echo $row['function']; ?>">
					<img width="15px" height="15px" src="/static/img/xdebug/native.png" alt="PHP Native Function" /></a><?php } else {?>										
					<img width="15px" height="15px" src="/static/img/xdebug/user.png" alt="User Defined Function" /><?php } ?>
					<strong>
					<?php if($row['type'] == 0) {?>php::<?php } ?><?php echo $row['function']; ?>
					</strong>
					<br />
					<span class="warning">
					<?php if($row['timeAlert']) {?><br />Warning, time jump exceeds trigger! <?php echo $row['timeAlert']; } ?>
					<?php if($row['memoryAlert']) {?><br />Warning, memory jump exceeds trigger! <?php echo $row['memoryAlert']; } ?>
					</span>
				</td>
				<td><?php echo $row['timeOnEntry']; ?>-<?php echo $row['timeOnExit']; ?></td>
				<td><?php echo $row['memoryOnEntry']; ?>-<?php echo $row['memoryOnExit']; ?></td>
				<td>
					<span data-line="<?php echo $row['line']?>" data-file="<?php echo $row['filename']?>" style="cursor:pointer" onclick="showCode(this)">
					<?php echo str_replace("C:\\Users\\joseph\\Desktop\\workspace", ".", $row['filename']);?>:
					<?php echo $row['line']?>
					</span>
				</td>		
				<td><?php echo $row['arg_num']?></td>	
				<td><?php 
				foreach ($row['args'] as $arg){					
					var_dump($arg);
				}
				?></td>		
			</tr>
			<?php } ?>
		</tbody>
	</table>
	
	<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
	<script src="http://libs.baidu.com/jqueryui/1.8.22/jquery-ui.min.js "></script>
	
	<script src="http://cdn.bootcss.com/datatables/1.9.4/jquery.dataTables.js"></script>
	<script>
		$(document).ready( function () {
			var oTable = $('#example').dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers",
				"bLengthChange": false,
				"bPaginate": false,
			} );
		} );
		function showCode(obj) {
			var file = $(obj).data("file");
			var line = $(obj).data("line");
			window.open('/index.php?_r=/xdebug/&op=get_code&line=' +line + '&file=' + file + '#l' + line, 'code', 'width=500,height=400,toolbar=no,status=no,menubar=no,scrollbars=yes');
		}
	</script>
</body>
</html>
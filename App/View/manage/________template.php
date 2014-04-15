<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="utf-8">
	<title>Title</title>	
	<?php include View('block/manage/head');?>		
</head>
<body>		
	<?php include View('block/manage/topbar');?>
		<div class="container-fluid">
		<div class="row-fluid">
			<?php include View('block/manage/leftmenu');?>			
			<noscript><div class="alert alert-block span10"><h4 class="alert-heading">Warning!</h4><p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p></div></noscript>
			<div id="content" class="span10">
			<!-- content starts -->
			
			<!-- content ends -->
			</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		<?php include View('block/manage/footer');?>		
	</div><!--/.fluid-container-->
	<?php include View('block/manage/js');?>		
</body>
</html>
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
			
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Calendar</a>
					</li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
				  <div class="box-header well" data-original-title>
					  <h2><i class="icon-calendar"></i>Calendar</h2>
					  <div class="box-icon">
						  <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
						  <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						  <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
				  </div>
				  <div class="box-content">
					<div id="external-events" class="well">
						<h4>Draggable Events</h4>
						<div class="external-event badge">Default</div>
						<div class="external-event badge badge-success">Completed</div>
						<div class="external-event badge badge-warning">Warning</div>
						<div class="external-event badge badge-important">Important</div>
						<div class="external-event badge badge-info">Info</div>
						<div class="external-event badge badge-inverse">Other</div>
						<p>
						<label for="drop-remove"><input type="checkbox" id="drop-remove" /> remove after drop</label>
						</p>
						</div>

						<div id="calendar"></div>

						<div class="clearfix"></div>
					</div>
				</div>
			</div><!--/row-->
		
					<!-- content ends -->
			</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		<?php include View('block/manage/footer');?>		
	</div><!--/.fluid-container-->
	<?php include View('block/manage/js');?>		
</body>
</html>
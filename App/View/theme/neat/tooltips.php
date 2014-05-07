<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Neat Admin Template</title>
<meta name="description" content="">

<meta name="viewport" content="width=device-width">

<link rel="stylesheet" href="/static/theme/neat/css/bootstrap.css">
<link rel="stylesheet" href="/static/theme/neat/css/bootstrap-responsive.css">
<link rel="stylesheet" href="/static/theme/neat/css/jquery.fancybox.css">
<link rel="stylesheet" href="/static/theme/neat/css/uniform.default.css">
<link rel="stylesheet" href="/static/theme/neat/css/bootstrap.datepicker.css">
<link rel="stylesheet" href="/static/theme/neat/css/jquery.cleditor.css">
<link rel="stylesheet" href="/static/theme/neat/css/jquery.plupload.queue.css">
<link rel="stylesheet" href="/static/theme/neat/css/jquery.jgrowl.css">
<link rel="stylesheet" href="/static/theme/neat/css/jquery.tagsinput.css">
<link rel="stylesheet" href="/static/theme/neat/css/jquery.ui.plupload.css">
<link rel="stylesheet" href="/static/theme/neat/css/chosen.css">
<link rel="stylesheet" href="/static/theme/neat/css/chosen.css">
<link rel="stylesheet" href="/static/theme/neat/css/smoothness/jquery-ui-1.8.22.custom.css">
<link rel="stylesheet" href="/static/theme/neat/css/style.css">
</head>
<body>
<?php include View("theme/neat/block/style_switch");?>
<?php include View("theme/neat/block/topbar");?>
<?php include View("theme/neat/block/breadcrumbs");?>

<div class="main">
    <div class="container-fluid">
        <div class="navi">
            <?php include View("theme/neat/block/main_nav");?>

	</div>
	<div class="content">
			<div class="row-fluid">
				<div class="span6">
					<div class="box">
						<div class="box-head">
							<h3>Simple tooltips</h3>
						</div>
						<div class="box-content">
							<div class="alert alert-info">
								<strong>Information!</strong> Just hover the links!
							</div>
							Lorem ipsum laboris voluptate <a href="#" class='tip' title="This is a simple tooltip">amet ut quis nulla</a> eu. Lorem ipsum fugiat amet dolor dolor dolore consectetur veniam pariatur dolore ex magna in laborum tempor. <a href="#" class='tip' title="This is a simple tooltip">Lorem ipsum velit</a> ut nulla nostrud labore tempor labore esse amet ex est quis aliquip. Lorem ipsum in nisi dolor dolor in cillum irure ut elit. Lorem ipsum sed dolore in id Ut laborum. Lorem ipsum aliqua magna ea in ea magna laboris eiusmod dolor quis <a href="#" class='tip' title="This is a simple tooltip">incididunt sed</a> sit ea do. Lorem ipsum nostrud deserunt est occaecat ea Duis elit nulla qui incididunt mollit. Lorem ipsum sed <a href="#" class='tip' title="This is a simple tooltip">labore dolor</a> ad consequat consectetur incididunt pariatur laborum magna commodo proident nisi aute incididunt. Lorem ipsum non fugiat mollit <a href="#" class='tip' title="This is a simple tooltip">aute pariatur</a> mollit nostrud mollit cillum officia amet laborum ad tempor. Lorem ipsum magna amet labore magna quis sit. <a href="#" class='tip' title="This is a simple tooltip">Lorem ipsum cillum</a> eiusmod ex nostrud Duis ullamco ea eu sunt. 
						</div>
					</div>
				</div>
				<div class="span6">
					<div class="box">
						<div class="box-head">
							<h3>Tooltip placements (custom button colors)</h3>
						</div>
						<div class="box-content">
							<a href="#" class='btn tip btn-darkgrey' title="This is right" data-placement="right">Right</a>
							<a href="#" class='btn tip btn-lightgreen' title="This is left" data-placement="left">left</a>
							<a href="#" class='btn tip btn-lightblue' title="This is bottom" data-placement="bottom">Bottom</a>
							<a href="#" class='btn tip btn-lightred' title="This is top" data-placement="top">Top</a>
							<div class="btn-toolbar">
								<p>You only have to use <code>data-placement="right/left/top/bottom"</code> to set the tooltip on a specific side!</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<div class="box">
						<div class="box-head">
							<h3>Alerts</h3>
						</div>
						<div class="box-content">
							<div class="alert alert-block">
							  <a class="close" data-dismiss="alert" href="#">×</a>
							  <h4 class="alert-heading">Warning!</h4>
							  Best check yo self, you're not...
							</div>
							<div class="alert alert-block alert-success">
							  <a class="close" data-dismiss="alert" href="#">×</a>
							  <h4 class="alert-heading">Success!</h4>
							  Best check yo self, you're not...
							</div>
							<div class="alert alert-block alert-info">
							  <a class="close" data-dismiss="alert" href="#">×</a>
							  <h4 class="alert-heading">Info!</h4>
							  Best check yo self, you're not...
							</div>
							<div class="alert alert-block alert-danger">
							  <a class="close" data-dismiss="alert" href="#">×</a>
							  <h4 class="alert-heading">Danger!</h4>
							  Best check yo self, you're not...
							</div>
						</div>
					</div>
				</div>
				<div class="span6">
					<div class="box">
						<div class="box-head">
							<h3>jGrowl notification</h3>
						</div>
						<div class="box-content">
								<a href="#" class='opengrowl btn btn-primary' data-content="Some sample content">Give me a notification!</a>
							<div class="btn-toolbar">
								<a href="#" class='opengrowl hasheader btn btn-success' data-header="HEAD" data-content="Some sample content">Notification with header</a>
							</div>
							<div class="btn-toolbar">
								<a href="#" class='opengrowl hasheader btn btn-lightgreen' data-header="Another head" data-content="More content!">More</a>
							</div>
							<div class="btn-toolbar">
								<a href="#" class='opengrowl hasheader btn btn-darkgrey' data-header="HEAD" data-content="Lorem ipsum nostrud ullamco labore aliqua cupidatat do ut tempor. ">Lorem</a>
							</div>
							<p>
								No javascript needed. Header and content are set with <code>data</code> attributes.
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<div class="box">
						<div class="box-head">
							<h3>Modals</h3>
						</div>
						<div class="box-content">
							<a class="btn btn-primary" data-toggle="modal" href="#myModal" >Launch Modal</a>
							<div class="modal hide" id="myModal">
							  <div class="modal-header">
							    <button type="button" class="close" data-dismiss="modal">×</button>
							    <h3>Modal header</h3>
							  </div>
							  <div class="modal-body">
							    <p>One fine body…</p>
							  </div>
							  <div class="modal-footer">
							    <a href="#" class="btn" data-dismiss="modal">Close</a>
							    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
							  </div>
							</div>
							<div class="btn-toolbar">
								Not a single line of javascript needed! Just add a modal-container and use <code>data-toggle="modal"</code>. 
							</div>
						</div>
					</div>
				</div>
				<div class="span6">
					<div class="box">
						<div class="box-head">
							<h3>Popovers</h3>
						</div>
						<div class="box-content">
							<p>You can see some sample popovers on the topbar. Hover the username!</p>
							<div class="btn-toolbar">
								<a href="#" class='pover btn btn-success' data-title="This is a title" data-content="Lorem ipsum commodo nisi reprehenderit nostrud sed Duis nostrud elit commodo occaecat pariatur fugiat consectetur Excepteur sed eiusmod. Lorem ipsum in ullamco incididunt ea consectetur fugiat tempor enim officia laborum. " data-trigger='hover'>Hover for popover</a>
								<a href="#" class='pover btn btn-danger' data-placement="top" data-title="This is a title" data-content="Lorem ipsum elit sed aliquip Duis veniam in non in non nulla incididunt do id in ut.  " data-trigger='hover'>Popover top</a>
								<a href="#" class='pover btn btn-inverse' data-trigger="manual" data-title="This is a title" data-content="Lorem ipsum veniam eu enim laborum Ut tempor qui et veniam eu. Lorem ipsum commodo ut in Ut Excepteur reprehenderit minim fugiat ea dolore labore exercitation. ">Click for popover toggle</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>	
<script src="/static/theme/neat/js/jquery.js"></script>
<script src="/static/theme/neat/js/less.js"></script>
<script src="/static/theme/neat/js/bootstrap.min.js"></script>
<script src="/static/theme/neat/js/jquery.uniform.min.js"></script>
<script src="/static/theme/neat/js/bootstrap.timepicker.js"></script>
<script src="/static/theme/neat/js/bootstrap.datepicker.js"></script>
<script src="/static/theme/neat/js/chosen.jquery.min.js"></script>
<script src="/static/theme/neat/js/jquery.fancybox.js"></script>
<script src="/static/theme/neat/js/plupload/plupload.full.js"></script>
<script src="/static/theme/neat/js/plupload/jquery.plupload.queue/jquery.plupload.queue.js"></script>
<script src="/static/theme/neat/js/jquery.cleditor.min.js"></script>
<script src="/static/theme/neat/js/jquery.inputmask.min.js"></script>
<script src="/static/theme/neat/js/jquery.tagsinput.min.js"></script>
<script src="/static/theme/neat/js/jquery.mousewheel.js"></script>
<script src="/static/theme/neat/js/jquery.dataTables.min.js"></script>
<script src="/static/theme/neat/js/jquery.jgrowl_minimized.js"></script>
<script src="/static/theme/neat/js/jquery.dataTables.bootstrap.js"></script>
<script src="/static/theme/neat/js/jquery.textareaCounter.plugin.js"></script>
<script src="/static/theme/neat/js/jquery-ui-1.8.22.custom.min.js"></script>
<script src="/static/theme/neat/js/ui.spinner.js"></script>
<script src="/static/theme/neat/js/jquery.cookie.js"></script>
<script src="/static/theme/neat/js/custom.js"></script><script src="/static/theme/neat/js/demo.js"></script>
</body>
</html>
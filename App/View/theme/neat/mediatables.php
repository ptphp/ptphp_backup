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
<link rel="stylesheet" href="/static/theme/neat/css/jquery.tagsinput.css">
<link rel="stylesheet" href="/static/theme/neat/css/jquery.ui.plupload.css">
<link rel="stylesheet" href="/static/theme/neat/css/chosen.css">
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
				<div class="span12">
					<div class="box">
						<div class="box-head tabs">
							<h3>Media tables</h3>
						</div>
						<div class="box-content box-nomargin">
							<div class="alert alert-info alert-block">
								<a class="close" data-dismiss="alert" href="#">×</a>
  								<h4 class="alert-heading">Feature!</h4>
  								Hover the images for a nice preview! Click them for full image.
							</div>
							<table class='table table-striped table-media table-bordered'>
								<thead>
									<tr>
										<th>Preview</th>
										<th>Browser</th>
										<th>Platform(s)</th>
										<th>Engine version</th>
										<th>CSS grade</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class='table-image'>
											<a href="/static/theme/neat/img/sample/500.gif" class='preview fancy'><img src="/static/theme/neat/img/sample/60.gif" alt="" title="Image title"></a>
										</td>
										<td>Internet
											 Explorer 4.0</td>
										<td>Win 95+</td>
										<td>4</td>
										<td>X</td>
									</tr>
									<tr>
										<td class='table-image'><a href="/static/theme/neat/img/sample/500.gif" class='preview fancy'><img src="/static/theme/neat/img/sample/60.gif" alt="" title="Image title"></a></td>
										<td>Nokia N800</td>
										<td>N800</td>
										<td>-</td>
										<td>A</td>
									</tr>
									<tr>
										<td class='table-image'><a href="/static/theme/neat/img/sample/500.gif" class='preview fancy'><img src="/static/theme/neat/img/sample/60.gif" alt="" title="Image title"></a></td>
										<td>PSP browser</td>
										<td>PSP</td>
										<td>-</td>
										<td>C</td>
									</tr>
									<tr>
										<td class='table-image'><a href="/static/theme/neat/img/sample/500.gif" class='preview fancy'><img src="/static/theme/neat/img/sample/60.gif" alt="" title="Image title"></a></td>
										<td>All others</td>
										<td>-</td>
										<td>-</td>
										<td>U</td>
									</tr>
								</tbody>
							</table>
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
<script src="/static/theme/neat/js/jquery.dataTables.bootstrap.js"></script>
<script src="/static/theme/neat/js/jquery.textareaCounter.plugin.js"></script>
<script src="/static/theme/neat/js/ui.spinner.js"></script>
<script src="/static/theme/neat/js/jquery.cookie.js"></script>
<script src="/static/theme/neat/js/custom.js"></script><script src="/static/theme/neat/js/demo.js"></script>
</body>
</html>
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
				<div class="span4">
					<div class="box">
						<div class="box-head">
							<h3>Proress bars animated with value</h3>
						</div>
						<div class="box-content">
							<div class="progress progress-striped progress-info progress-preview active">
								<div class="bar" style='width:15%'></div>
							</div>
							<div class="progress progress-striped progress-danger progress-preview active">
								<div class="bar" style='width:30%'></div>
							</div>
							<div class="progress progress-striped progress-success progress-preview active">
								<div class="bar" style='width:45%'></div>
							</div>
							<div class="progress progress-striped progress-warning progress-preview active">
								<div class="bar" style='width:60%'></div>
							</div>
						</div>
					</div>
				</div>
				<div class="span4">
					<div class="box">
						<div class="box-head">
							<h3>Proress bars</h3>
						</div>
						<div class="box-content">
							<div class="row-fluid force-margin">
								<div class="span6">
									<h4>Default</h4>
									<div class="progress">
										<div class="bar" style='width:15%'></div>
									</div>
									<div class="progress progress-danger">
										<div class="bar" style='width:30%'></div>
									</div>
									<div class="progress progress-success">
										<div class="bar" style='width:45%'></div>
									</div>
									<div class="progress progress-warning">
										<div class="bar" style='width:60%'></div>
									</div>
								</div>
								<div class="span6">
									<h4>Striped</h4>
									<div class="progress progress-info progress-striped">
										<div class="bar" style='width:15%'></div>
									</div>
									<div class="progress progress-danger progress-striped">
										<div class="bar" style='width:30%'></div>
									</div>
									<div class="progress progress-success progress-striped">
										<div class="bar" style='width:45%'></div>
									</div>
									<div class="progress progress-warning progress-striped">
										<div class="bar" style='width:60%'></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="span4">
					<div class="box">
						<div class="box-head">
							<h3>Proress bars rounded (bootstrap default)</h3>
						</div>
						<div class="box-content">
							<div class="progress progress-striped progress-info progress-round">
								<div class="bar" style='width:15%'></div>
							</div>
							<div class="progress progress-striped progress-danger progress-round">
								<div class="bar" style='width:30%'></div>
							</div>
							<div class="progress progress-striped progress-success progress-round">
								<div class="bar" style='width:45%'></div>
							</div>
							<div class="progress progress-striped progress-warning progress-round">
								<div class="bar" style='width:60%'></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Custom bars</h3>
						</div>
						<div class="box-content">
							<div class="row-fluid force-margin">
								<div class="span6">
									<h4>Colors</h4>
									<div class="progress progress-striped progress-inverse progress-preview active">
										<div class="bar" style='width:15%'></div>
									</div>
									<div class="progress progress-striped progress-darkgrey progress-preview active">
										<div class="bar" style='width:30%'></div>
									</div>
									<div class="progress progress-striped progress-lightgreen progress-preview active">
										<div class="bar" style='width:45%'></div>
									</div>
									<div class="progress progress-striped progress-blue progress-preview active">
										<div class="bar" style='width:60%'></div>
									</div>
								</div>
								<div class="span6">
									<h4>Sizes</h4> 
									<div class="progress progress-mini progress-inverse">
										<div class="bar" style='width:15%'>15%</div>
									</div>
									<div class="progress progress-darkgrey">
										<div class="bar" style='width:30%'>30%</div>
									</div>
									<div class="progress progress-large progress-blue">
										<div class="bar" style='width:45%'>45%</div>
									</div>
									<div class="progress progress-mega progress-lightgreen">
										<div class="bar" style='width:60%'>60%</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Sliders</h3>
						</div>
						<div class="box-content">
							<div class="row-fluid">
				            	<div class="span12">
				                	<h4>Default slider</h4>
				            		<div class="btn-toolbar">
				              			<div class="slider">
				                			<div class="slide"></div>
				             			</div>
				            		</div>
				              	</div>
				            </div>
				            <div class="row-fluid">
				              	<div class="span12">
				                	<h4>Slider with value</h4>
				            		<div class="btn-toolbar">
				              			<div class="slider">
				                			<div class="amount"></div>
				                			<div class="slide"></div>
				              			</div>
				            		</div>
				              	</div>
				            </div>
				            <div class="row-fluid">
				              	<div class="span12">
				                	<h4>Slider with min and max value</h4>
				            		<div class="btn-toolbar">
				              			<div class="slider" data-min="10" data-max="20">
				                			<div class="amount"></div>
				                			<div class="slide"></div>
				              			</div>
				            		</div>
				              	</div>
				            </div>
				            <div class="row-fluid">
				              	<div class="span12">
				                	<h4>Slider with custom steps</h4>
				            		<div class="btn-toolbar">
				              			<div class="slider" data-step="12">
				                			<div class="amount"></div>
				                			<div class="slide"></div>
				              			</div>
				            		</div>
				              	</div>
				            </div>
				            <div class="row-fluid">
				              	<div class="span12">
				                	<h4>Range slider</h4>
				            		<div class="btn-toolbar">
				              			<div class="slider" data-range="true" data-rangestart="10" data-rangestop="20" >
				                			<div class="amount"></div>
				                			<div class="slide"></div>
				              			</div>
				            		</div>
				              	</div>
				            </div>
				            <div class="row-fluid">
				              	<div class="span12">
				                	<h4>Range slider with steps</h4>
				            		<div class="btn-toolbar">
				              			<div class="slider" data-range="true" data-rangestart="12" data-rangestop="24" data-max="48" data-min="0" data-step="12">
				                			<div class="amount"></div>
				                			<div class="slide"></div>
				              			</div>
				            		</div>
				              	</div>
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
<script src="/static/theme/neat/js/jquery.dataTables.bootstrap.js"></script>
<script src="/static/theme/neat/js/jquery.textareaCounter.plugin.js"></script>
<script src="/static/theme/neat/js/jquery-ui-1.8.22.custom.min.js"></script>
<script src="/static/theme/neat/js/ui.spinner.js"></script>
<script src="/static/theme/neat/js/jquery.cookie.js"></script>
<script src="/static/theme/neat/js/custom.js"></script><script src="/static/theme/neat/js/demo.js"></script>
</body>
</html>
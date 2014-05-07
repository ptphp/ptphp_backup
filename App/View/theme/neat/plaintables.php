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
							<h3>Tables</h3>
							<ul class='nav nav-tabs'>
								<li class='active'>
									<a href="#basic" data-toggle="tab">Basic</a>
								</li>
								<li>
									<a href="#condensed" data-toggle="tab">Condensed</a>
								</li>
							</ul>
						</div>
						<div class="box-content box-nomargin">
							<div class="tab-content">
									<div class="tab-pane active" id="basic">
										<table class='table table-striped table-bordered'>
											<thead>
												<tr>
													<th>Rendering engine</th>
													<th>Browser</th>
													<th>Platform(s)</th>
													<th>Engine version</th>
													<th>CSS grade</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Trident</td>
													<td>Internet
														 Explorer 4.0</td>
													<td>Win 95+</td>
													<td>4</td>
													<td>X</td>
												</tr>
												<tr>
													<td>Presto</td>
													<td>Nokia N800</td>
													<td>N800</td>
													<td>-</td>
													<td>A</td>
												</tr>
												<tr>
													<td>Misc</td>
													<td>NetFront 3.4</td>
													<td>Embedded devices</td>
													<td>-</td>
													<td>A</td>
												</tr>
												<tr>
													<td>Misc</td>
													<td>Dillo 0.8</td>
													<td>Embedded devices</td>
													<td>-</td>
													<td>X</td>
												</tr>
												<tr>
													<td>Misc</td>
													<td>Links</td>
													<td>Text only</td>
													<td>-</td>
													<td>X</td>
												</tr>
												<tr>
													<td>Misc</td>
													<td>Lynx</td>
													<td>Text only</td>
													<td>-</td>
													<td>X</td>
												</tr>
												<tr>
													<td>Misc</td>
													<td>IE Mobile</td>
													<td>Windows Mobile 6</td>
													<td>-</td>
													<td>C</td>
												</tr>
												<tr>
													<td>Misc</td>
													<td>PSP browser</td>
													<td>PSP</td>
													<td>-</td>
													<td>C</td>
												</tr>
												<tr>
													<td>Other browsers</td>
													<td>All others</td>
													<td>-</td>
													<td>-</td>
													<td>U</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="tab-pane" id="condensed">
										<table class='table table-striped table-condensed table-bordered'>
											<thead>
												<tr>
													<th>Rendering engine</th>
													<th>Browser</th>
													<th>Platform(s)</th>
													<th>Engine version</th>
													<th>CSS grade</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Trident</td>
													<td>Internet
														 Explorer 4.0</td>
													<td>Win 95+</td>
													<td>4</td>
													<td>X</td>
												</tr>
												<tr>
													<td>Presto</td>
													<td>Nokia N800</td>
													<td>N800</td>
													<td>-</td>
													<td>A</td>
												</tr>
												<tr>
													<td>Misc</td>
													<td>NetFront 3.4</td>
													<td>Embedded devices</td>
													<td>-</td>
													<td>A</td>
												</tr>
												<tr>
													<td>Misc</td>
													<td>Dillo 0.8</td>
													<td>Embedded devices</td>
													<td>-</td>
													<td>X</td>
												</tr>
												<tr>
													<td>Misc</td>
													<td>Links</td>
													<td>Text only</td>
													<td>-</td>
													<td>X</td>
												</tr>
												<tr>
													<td>Misc</td>
													<td>Lynx</td>
													<td>Text only</td>
													<td>-</td>
													<td>X</td>
												</tr>
												<tr>
													<td>Misc</td>
													<td>IE Mobile</td>
													<td>Windows Mobile 6</td>
													<td>-</td>
													<td>C</td>
												</tr>
												<tr>
													<td>Misc</td>
													<td>PSP browser</td>
													<td>PSP</td>
													<td>-</td>
													<td>C</td>
												</tr>
												<tr>
													<td>Other browsers</td>
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
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Table with actions in header</h3>
							<div class="actions">
								<ul>
									<li class="dropdown">
										<a href="#" class='tip btn btn-mini btn-square dropdown-toggle' title="Click for more actions" data-toggle="dropdown">
											<img src="/static/theme/neat/img/icons/fugue/gear.png" alt="">
										</a>
										<ul class="dropdown-menu pull-right custom">
											<li>
												<a href="#" class='fugue'><img src="/static/theme/neat/img/icons/fugue/printer.png" alt=""> Print table</a>
											</li>	
											<li class="divider"></li>
											<li>
												<a href="#" class='fugue'><img src="/static/theme/neat/img/icons/fugue/gear.png" alt=""> Table settings</a>
											</li>
											<li>
												<a href="#" class='fugue'><img src="/static/theme/neat/img/icons/fugue/bin-metal.png" alt=""> Delete table</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="#" class='btn btn-mini btn-square tip' title="Download this table">
											<img src="/static/theme/neat/img/icons/fugue/arrow-270.png" alt="">
										</a>
									</li>
									<li>
										<a href="#" class='btn btn-mini btn-square tip' title="Save this table">
											<img src="/static/theme/neat/img/icons/fugue/disk-black.png" alt="">
										</a>
									</li>
								</ul>	
							</div>
						</div>
						<div class="box-content box-nomargin">
							<table class='table table-striped table-bordered'>
								<thead>
									<tr>
										<th>Rendering engine</th>
										<th>Browser</th>
										<th>Platform(s)</th>
										<th>Engine version</th>
										<th>CSS grade</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Trident</td>
										<td>Internet
											 Explorer 4.0</td>
										<td>Win 95+</td>
										<td>4</td>
										<td>X</td>
									</tr>
									<tr>
										<td>Presto</td>
										<td>Nokia N800</td>
										<td>N800</td>
										<td>-</td>
										<td>A</td>
									</tr>
									<tr>
										<td>Misc</td>
										<td>NetFront 3.4</td>
										<td>Embedded devices</td>
										<td>-</td>
										<td>A</td>
									</tr>
									<tr>
										<td>Misc</td>
										<td>Dillo 0.8</td>
										<td>Embedded devices</td>
										<td>-</td>
										<td>X</td>
									</tr>
									<tr>
										<td>Misc</td>
										<td>Links</td>
										<td>Text only</td>
										<td>-</td>
										<td>X</td>
									</tr>
									<tr>
										<td>Misc</td>
										<td>Lynx</td>
										<td>Text only</td>
										<td>-</td>
										<td>X</td>
									</tr>
									<tr>
										<td>Misc</td>
										<td>IE Mobile</td>
										<td>Windows Mobile 6</td>
										<td>-</td>
										<td>C</td>
									</tr>
									<tr>
										<td>Misc</td>
										<td>PSP browser</td>
										<td>PSP</td>
										<td>-</td>
										<td>C</td>
									</tr>
									<tr>
										<td>Other browsers</td>
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
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Table with checkbox</h3>
						</div>
						<div class="box-content box-nomargin">
							<table class='table table-striped table-bordered'>
								<thead>
									<tr>
										<th class='table-checkbox'><input type="checkbox" class='sel_all'></th>
										<th>Rendering engine</th>
										<th>Browser</th>
										<th>Platform(s)</th>
										<th>Engine version</th>
										<th>CSS grade</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class='table-checkbox'><input type="checkbox" class='selectable-checkbox'></td>
										<td>Trident</td>
										<td>Internet
											 Explorer 4.0</td>
										<td>Win 95+</td>
										<td>4</td>
										<td>X</td>
									</tr>
									<tr>
										<td class='table-checkbox'><input type="checkbox" class='selectable-checkbox'></td>
										<td>Presto</td>
										<td>Nokia N800</td>
										<td>N800</td>
										<td>-</td>
										<td>A</td>
									</tr>
									<tr>
										<td class='table-checkbox'><input type="checkbox" class='selectable-checkbox'></td>
										<td>Misc</td>
										<td>NetFront 3.4</td>
										<td>Embedded devices</td>
										<td>-</td>
										<td>A</td>
									</tr>
									<tr>
										<td class='table-checkbox'><input type="checkbox" class='selectable-checkbox'></td>
										<td>Misc</td>
										<td>Dillo 0.8</td>
										<td>Embedded devices</td>
										<td>-</td>
										<td>X</td>
									</tr>
									<tr>
										<td class='table-checkbox'><input type="checkbox" class='selectable-checkbox'></td>
										<td>Misc</td>
										<td>Links</td>
										<td>Text only</td>
										<td>-</td>
										<td>X</td>
									</tr>
									<tr>
										<td class='table-checkbox'><input type="checkbox" class='selectable-checkbox'></td>
										<td>Misc</td>
										<td>Lynx</td>
										<td>Text only</td>
										<td>-</td>
										<td>X</td>
									</tr>
									<tr>
										<td class='table-checkbox'><input type="checkbox" class='selectable-checkbox'></td>
										<td>Misc</td>
										<td>IE Mobile</td>
										<td>Windows Mobile 6</td>
										<td>-</td>
										<td>C</td>
									</tr>
									<tr>
										<td class='table-checkbox'><input type="checkbox" class='selectable-checkbox'></td>
										<td>Misc</td>
										<td>PSP browser</td>
										<td>PSP</td>
										<td>-</td>
										<td>C</td>
									</tr>
									<tr>
										<td class='table-checkbox'><input type="checkbox" class='selectable-checkbox'></td>
										<td>Other browsers</td>
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
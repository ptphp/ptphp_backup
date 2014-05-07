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
<link rel="stylesheet" href="/static/theme/neat/css/jquery.jgrowl.css">
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
			<div class="row-fluid no-margin">
				<div class="span12">
					<ul class="quicktasks">
						<li>
							<a href="#">
								<img src="/static/theme/neat/img/icons/essen/32/settings.png" alt="">
								<span>My settings</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="/static/theme/neat/img/icons/essen/32/logout.png" alt="">
								<span>Logout</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="/static/theme/neat/img/icons/essen/32/heart.png" alt="">
								<span>My favourites</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head tabs">
							<h3>User profile</h3>
							<ul class="nav nav-tabs">
								<li class='active'>
									<a href="#basic" data-toggle='tab'>Basic information</a>
								</li>
								<li>
									<a href="#sec" data-toggle='tab'>Security</a>
								</li>
								<li>
									<a href="#not" data-toggle='tab'>Notifications</a>
								</li>
							</ul>
						</div>
						<div class="box-content">
							<form action="#" class="form-horizontal">
							<div class="tab-content">
								<div class="tab-pane active" id="basic">
										<div class="control-group">
											<label for="username" class="control-label">Username</label>
											<div class="controls">
												<input type="text" name="username" id="username" value="MyUsername">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Password</label>
											<div class="controls">
												<div class="input-append">
													<span class="input-medium uneditable-input">******</span><span class="add-on"><i class="icon-lock"></i></span>
												</div>
												<a href="#" class="btn-danger btn">New password</a>
												<p class="help-block">The password is for security reasons hidden!</p>
											</div>
										</div>
										<div class="control-group">
											<label for="email" class="control-label">Email</label>
											<div class="controls">
												<div class="input-append">
													<input type="text" name="email" id="email" value="info@sitename.com"><span class="add-on"><i class="icon-envelope"></i></span>
												</div>
											</div>
										</div>
										<div class="control-group">
											<label for="date" class="control-label">Birthday</label>
											<div class="controls">
												<div class="input-append">
													<input type="text" name="date" class='datepick' id="date" value="06/10/1900"><span class="add-on"><i class="icon-calendar"></i></span>
												</div>
											</div>
										</div>
										
								</div>
								<div class="tab-pane" id="sec">
									<div class="control-group">
										<label class="control-label">Cookie duration</label>
										<div class="controls">
											<label class="radio"><input type="radio" name="duration"> 1 day</label>
											<label class="radio"><input type="radio" name="duration"> 7 days</label>
											<label class="radio"><input type="radio" name="duration"> 24 days</label>
											<label class="radio"><input type="radio" name="duration"> 1 year</label>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Hide my email</label>
										<div class="controls">
											<label class="radio"><input type="radio" name="hide"> Yes</label>
											<label class="radio"><input type="radio" name="hide"> No</label>
										</div>
									</div>
									<div class="control-group">
											<label for="crondate" class="control-label">Cronjob date</label>
											<div class="controls">
												<div class="input-append">
													<input type="text" name="crondate" class='datepick' id="crondate" value="06/10/1900"><span class="add-on"><i class="icon-calendar"></i></span>
												</div>
											</div>
										</div>
								</div>
								<div class="tab-pane" id="not">
									<div class="control-group">
											<label class="control-label">When to email</label>
											<div class="controls">
												<label class="checkbox"><input type="checkbox" checked name="purch"> Product was purchased</label>
												<label class="checkbox"><input type="checkbox" checked name="comm"> Comment on my products</label>
												<label class="checkbox"><input type="checkbox" name="rat"> New rating on product</label>
												<label class="checkbox"><input type="checkbox" checked name="messa"> Message from admin</label>
												<label class="checkbox"><input type="checkbox" name="messu"> Message from user</label>
											</div>
										</div>
								</div>
							</div>
								<div class="form-actions">
									<input type="submit" class='btn btn-primary' value="Save">
									<input type="reset" class='btn btn-danger' value="Reset">
								</div>
							</form>
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
<script src="/static/theme/neat/js/jquery.peity.js"></script>
<script src="/static/theme/neat/js/jquery.uniform.min.js"></script>
<script src="/static/theme/neat/js/bootstrap.timepicker.js"></script>
<script src="/static/theme/neat/js/bootstrap.datepicker.js"></script>
<script src="/static/theme/neat/js/chosen.jquery.min.js"></script>
<script src="/static/theme/neat/js/plupload/plupload.full.js"></script>
<script src="/static/theme/neat/js/plupload/jquery.plupload.queue/jquery.plupload.queue.js"></script>
<script src="/static/theme/neat/js/jquery.cleditor.min.js"></script>
<script src="/static/theme/neat/js/jquery.inputmask.min.js"></script>
<script src="/static/theme/neat/js/jquery.tagsinput.min.js"></script>
<script src="/static/theme/neat/js/jquery.mousewheel.js"></script>
<script src="/static/theme/neat/js/jquery.textareaCounter.plugin.js"></script>
<script src="/static/theme/neat/js/ui.spinner.js"></script>
<script src="/static/theme/neat/js/jquery.fancybox.js"></script>
<script src="/static/theme/neat/js/jquery.flot.js"></script>
<script src="/static/theme/neat/js/jquery.flot.pie.js"></script>
<script src="/static/theme/neat/js/jquery.dataTables.min.js"></script>
<script src="/static/theme/neat/js/jquery.jgrowl_minimized.js"></script>
<script src="/static/theme/neat/js/jquery.dataTables.bootstrap.js"></script>
<script src="/static/theme/neat/js/jquery.color.js"></script>
<script src="/static/theme/neat/js/jquery.flot.resize.js"></script>
<script src="/static/theme/neat/js/jquery.flot.orderBars.js"></script>
<script src="/static/theme/neat/js/jquery.cookie.js"></script>
<script src="/static/theme/neat/js/custom.js"></script><script src="/static/theme/neat/js/demo.js"></script>
</body>
</html>
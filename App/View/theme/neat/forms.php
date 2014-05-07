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
        <?php include View("theme/neat/block/main_nav")?>
	</div>
	<div class="content">
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Basic form elements</h3>
						</div>
						<div class="box-content">
							<div class="alert alert-info alert-block">
								<a class="close" data-dismiss="alert" href="#">×</a>
  								<h4 class="alert-heading">Information!</h4>
  								The input-elements have square corners. Of course the bootstrap rounded-corners style is also available!
							</div>
							<form action="#" class="form-horizontal">
									<legend>Legend text</legend>
									<div class="control-group">
										<label for="basic" class="control-label">Square basic input</label>
										<div class="controls">
											<input type="text" name="basic" id="basic" class='input-square'>
										</div>
									</div>
									<div class="control-group">
										<label for="basicround" class="control-label">Round basic input</label>
										<div class="controls">
											<input type="text" name="basic" id="basicround">
										</div>
									</div>
									<div class="control-group">
										<label for="password" class="control-label">Password input</label>
										<div class="controls">
											<input type="password" name="password" id="password" class='input-square'>
										</div>
									</div>
									<div class="control-group">
										<label for="placeholder" class="control-label">Placeholder</label>
										<div class="controls">
											<input type="text" name="placeholder" placeholder="Some text here.." id="placeholder" class='input-square'>
										</div>
									</div>
									<div class="control-group">
										<label for="icon" class="control-label">Input with icon</label>
										<div class="controls">
											<div class="input-prepend">
												<span class="add-on"><i class="icon-envelope"></i></span><input type="text" name="icon" id="icon" class='input-square'>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label for="twoicons" class="control-label">Two icons</label>
										<div class="controls">
											<div class="input-prepend input-append">
												<span class="add-on">$</span><input type="text" class='input-square' name="twoicons" id="twoicons"><span class="add-on">.00</span>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label for="support" class="control-label">Input with support text</label>
										<div class="controls">
											<input type="text" name="support" id="support" class='input-square'>
											<p class="help-block">
												Some support text 
											</p>
										</div>
									</div>
									<div class="control-group">
										<label for="tooltipinput" class="control-label">Tooltip</label>
										<div class="controls">
											<input type="text" name="tooltipinput" id="tooltipinput" class='tip input-square' title="Help here" data-placement="right">
										</div>
									</div>
									<div class="control-group">
										<label for="grid12" class="control-label">Grid size .span12</label>
										<div class="controls">
											<input type="text" name="grid" id="grid12" class='span12 input-square'>
										</div>
									</div>
									<div class="control-group">
										<label for="grid9" class="control-label">Grid size .span9</label>
										<div class="controls">
											<input type="text" name="grid" id="grid9" class='span9 input-square'>
										</div>
									</div>
									<div class="control-group">
										<label for="grid6" class="control-label">Grid size .span6</label>
										<div class="controls">
											<input type="text" name="grid" id="grid6" class='span6 input-square'>
										</div>
									</div>
									<div class="control-group">
										<label for="grid3" class="control-label">Grid size .span3</label>
										<div class="controls">
											<input type="text" name="grid" id="grid3" class='span3 input-square'>
										</div>
									</div>
									<div class="control-group">
										<label for="large" class="control-label">Large</label>
										<div class="controls">
											<input type="text" name="large" id="large" class='input-xlarge input-square'>
										</div>
									</div>
									<div class="control-group">
										<label for="medium" class="control-label">Medium</label>
										<div class="controls">
											<input type="text" name="medium" id="medium" class='input-medium input-square'>
										</div>
									</div>
									<div class="control-group">
										<label for="small" class="control-label">Small</label>
										<div class="controls">
											<input type="text" name="small" id="small" class='input-small input-square'>
										</div>
									</div>
									<div class="control-group">
										<label for="mini" class="control-label">Mini</label>
										<div class="controls">
											<input type="text" name="mini" id="mini" class='input-mini input-square'>
										</div>
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>More basic elements</h3>
						</div>
						<div class="box-content">
							<form action="#" class="form-horizontal">
									<div class="control-group">
										<label class="control-label">Read-only</label>
										<div class="controls">
											<span class="uneditable-input input-xlarge input-square">Read-only</span>
										</div>
									</div>
									<div class="control-group">
										<label for="disabled" class="control-label">Disabled input</label>
										<div class="controls">
											<input type="text" name="disabled" id="disabled" disabled class='input-square'>
										</div>
									</div>
									<div class="control-group error">
										<label for="error" class="control-label">Error</label>
										<div class="controls">
											<input type="text" name="error" id="error" class='input-square'>
											<span class="help-inline">Woops, error!</span>
										</div>
									</div>
									<div class="control-group warning">
										<label for="warning" class="control-label">Warning</label>
										<div class="controls">
											<input type="text" name="warning" id="warning" class='input-square'>
											<span class="help-inline">Hm, just a warning - nothing critical!</span>
										</div>
									</div>
									<div class="control-group success">
										<label for="success" class="control-label">Success</label>
										<div class="controls">
											<input type="text" name="success" id="success" class='input-square'>
											<span class="help-inline">Yay! Correct.</span>
										</div>
									</div>
									<div class="control-group">
										<label for="check" class="control-label">Checkboxes</label>
										<div class="controls">
											<label class="checkbox"><input type="checkbox" name="check" id="check"> Just a little checkbox</label>
											<label class="checkbox"><input type="checkbox" name="check"> Lorem ipsum dolor ad tempor enim sed amet esse. </label>
										</div>
									</div>
									<div class="control-group">
										<label for="radio" class="control-label">Radios</label>
										<div class="controls">
											<label class="radio"><input type="radio" name="radio" id="radio"> Lorem ipsum minim adipisicing pariatur do deserunt ut aute officia voluptate nisi ut. </label>
											<label class="radio"><input type="radio" name="radio"> Lorem ipsum in dolor enim laborum ullamco sed adipisicing ex ut.  </label>
											<label class="radio"><input type="radio" name="radio"> Lorem ipsum ut aliqua sed ut dolor reprehenderit consectetur elit.  </label>
										</div>
									</div>
									<div class="control-group">
										<label for="select" class="control-label">Selects</label>
										<div class="controls">
											<select name="select" id="select">
												<option value="1">Option-1</option>
												<option value="2">Option-2</option>
												<option value="3">Option-3</option>
												<option value="4">Option-4</option>
												<option value="5">Option-5</option>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label for="file" class="control-label">File upload</label>
										<div class="controls">
											<input type="file" name="file" id="file">
										</div>
									</div>
									<div class="control-group">
										<label for="basictext" class="control-label">Basic textarea</label>
										<div class="controls">
											<textarea name="basic" id="basictext" class='span9 input-square' rows="6"></textarea>
										</div>
									</div>
									<div class="control-group">
										<label for="textcounter" class="control-label">Textarea with counter</label>
										<div class="controls">
											<textarea name="textcounter" id="textcounter" class='input-square span9 counter' data-max="150" rows='6'></textarea>
										</div>
									</div>
									<div class="form-actions">
										<button class="btn btn-primary" type="submit">Send</button>
										<input type="reset" class='btn btn-danger' value="reset">
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Uniform</h3>
						</div>
						<div class="box-content">
							<form action="#" class="form">
									<div class="row-fluid force-margin">
										<div class="span3">
											<div class="control-group">
												<label for="select2" class="control-label">Select</label>
												<div class="controls">
													<select name="select" id="select2" class='uniform'>
														<option value="1">Option-1</option>
														<option value="2">Option-2</option>
														<option value="3">Option-3</option>
														<option value="4">Option-4</option>
														<option value="5">Option-5</option>
													</select>
												</div>
											</div>
										</div>
										<div class="span3">
											<div class="control-group">
												<label for="file2" class="control-label">File upload</label>
												<div class="controls">
													<input type="file" name="file" id="file2" class='uniform'>
												</div>
											</div>
										</div>
										<div class="span3">
											<div class="control-group">
												<label for="radio2" class="control-label">Radio</label>
												<div class="controls">
													<label class="radio"><input type="radio" name="radio" class='uniform' id="radio2"> adipisicing pariatur</label>
													<label class="radio"><input type="radio" class='uniform' name="radio"> Lorem</label>
													<label class="radio"><input type="radio" class='uniform' name="radio"> Lorem ipsum</label>
												</div>
											</div>
										</div>
										<div class="span3">
											<div class="control-group">
												<label for="check2" class="control-label">Checkbox</label>
												<div class="controls">
													<label class="checkbox"><input type="checkbox" class='uniform' name="check" id="check2"> Just </label>
													<label class="checkbox"><input type="checkbox" name="check" class='uniform'> Lorem ipsum</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span12">
											<div class="form-actions">
												<button class="btn btn-primary" type="submit">Send</button>
												<input type="reset" class='btn btn-danger' value="reset">
											</div>
										</div>
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Extended Form elements</h3>
						</div>
						<div class="box-content">
							<form action="#" class="form-horizontal">
									<div class="control-group">
										<label for="tags" class="control-label">Tags</label>
										<div class="controls">
											<input type="text" id="tags" value="Laravel,Codeigniter,jQuery" class='tagsinput span12'>
										</div>
									</div>
									<div class="control-group">
										<label for="selsear" class="control-label">Select with search</label>
										<div class="controls">
											<select name="select1" id="selsear" class='cho'>
												<option value="1">Option-1</option>
												<option value="2">Option-2</option>
												<option value="3">Option-3</option>
												<option value="4">Option-4</option>
												<option value="5">Option-5</option>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label for="select5" class="control-label">Multiselect</label>
										<div class="controls">
											<select name="select" id="select5" class='cho span6' multiple>
												<option value="1">Option-1</option>
												<option value="2">Option-2</option>
												<option value="3">Option-3</option>
												<option value="4">Option-4</option>
												<option value="5">Option-5</option>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label for="spinnn" class="control-label">Spinner</label>
										<div class="controls">
											<div class="input-mini">
												<input type="text" id="spinnn" value="5" class='spinner'>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label for="datepicker" class="control-label">Datepicker</label>
										<div class="controls">
											<input type="text" name="datepicker" id="datepicker" class='datepick'>
										</div>
									</div>
									<div class="control-group">
										<label for="timepicker" class="control-label">Timepicker</label>
										<div class="controls">
											<input type="text" name="timepicker" id="timepicker" class='timepicker'>
										</div>
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Masked inputs</h3>
						</div>
						<div class="box-content">
							<form action="#" class="form-horizontal">
									<div class="control-group">
										<label for="datemask" class="control-label">Date</label>
										<div class="controls">
											<input type="text" name="datemask" id="datemask" class='mask_date'>
											<p class="help-block">
												9999/99/99
											</p>
										</div>
									</div>
									<div class="control-group">
										<label for="phonemask" class="control-label">Phone</label>
										<div class="controls">
											<input type="text" name="phonemask" id="phonemask" class='mask_phone'>
											<p class="help-block">
												(999) 999-9999
											</p>
										</div>
									</div>
									<div class="control-group">
										<label for="serialnumber" class="control-label">Serial number</label>
										<div class="controls">
											<input type="text" name="serialnumber" id="serialnumber" class='mask_serialNumber'>
											<p class="help-block">
												9999-9999-99
											</p>
										</div>
									</div>
									<div class="control-group">
										<label for="productnumber" class="control-label">Product number</label>
										<div class="controls">
											<input type="text" name="productnumber" id="productnumber" class='mask_productNumber'>
											<p class="help-block">
												AAA-9999-A
											</p>
										</div>
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>WYSIWYG</h3>
						</div>
						<div class="box-content box-nomargin">
							<textarea name="a" class='span12 cleditor'></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Multi upload</h3>
						</div>
						<div class="box-content box-nomargin">
							<div class="plupload"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Form wizard with validation</h3>
						</div>
						<div class="box-content box-nomargin">
							<div class="modal hide" id="myModal">
							  <div class="modal-header">
							    <button type="button" class="close" data-dismiss="modal">×</button>
							    <h3>Success</h3>
							  </div>
							  <div class="modal-body">
							    <p>Wizard was submit!</p>
							  </div>
							  <div class="modal-footer">
							    <a href="#" class="btn btn-primary" data-dismiss="modal">Ok, thanks!</a>
							  </div>
							</div>
							<form method="post" action="forms.html" class='form-horizontal bbq wizard'>
								<div class="step" id="step1">
									<h4>Step 1 description</h4>
									<div class="control-group">
										<label for="uname1" class="control-label">Username</label>
										<div class="controls">
											<input type="text" name="uname1" id="uname1" class='required'>
										</div>
									</div>
									<div class="control-group">
										<label for="email1" class="control-label">Email</label>
										<div class="controls">
											<input type="text" name="email1" id="email1" class='email required'>
										</div>
									</div>
								</div>
								<div class="step" id="step2">
									<h4>Step 2 description</h4>
									<div class="control-group">
										<label for="pw6" class="control-label">Password</label>
										<div class="controls">
											<input type="password" name="pw6" id="pw6" class='required'>
										</div>
									</div>
								</div>
								<div id="navigation">
									<div class="form-actions">
										<input class="navigation_button btn btn-danger" id="back" value="Back" type="reset" />
										<input class="navigation_button btn btn-primary" id="next" value="Next" type="submit" />
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Form wizard with custom style</h3>
						</div>
						<div class="box-content box-nomargin">
							<div class="modal hide" id="myModal2">
							  <div class="modal-header">
							    <button type="button" class="close" data-dismiss="modal">×</button>
							    <h3>Success</h3>
							  </div>
							  <div class="modal-body">
							    <p>Wizard was submit!</p>
							  </div>
							  <div class="modal-footer">
							    <a href="#" class="btn btn-primary" data-dismiss="modal">Ok, thanks!</a>
							  </div>
							</div>
							<form method="post" action="forms.html" class='form-horizontal bbq wizard'>
								<div class="step" id="step3">
									<ul class="steps">
										<li class="active">
											Step 1
											<span>Description</span>
										</li>
										<li>
											Step 2
											<span>Description</span>
										</li>
										<li>
											Step 3
											<span>Lorem ipsum</span>
										</li>
									</ul>
									<div class="control-group">
										<label for="uname" class="control-label">Username</label>
										<div class="controls">
											<input type="text" name="uname" id="uname" class='required'>
										</div>
									</div>
									<div class="control-group">
										<label for="email2" class="control-label">Email</label>
										<div class="controls">
											<input type="text" name="email2" id="email2" class='email required'>
										</div>
									</div>
								</div>
								<div class="step" id="step4">
									<ul class="steps">
										<li>
											Step 1
											<span>Description</span>
										</li>
										<li class="active">
											Step 2
											<span>Description</span>
										</li>
										<li>
											Step 3
											<span>Lorem ipsum</span>
										</li>
									</ul>
									<h4>Step 2 description</h4>
									<div class="control-group">
										<label for="pw1" class="control-label">Password</label>
										<div class="controls">
											<input type="password" name="pw1" id="pw1" class='required'>
										</div>
									</div>
								</div>
								<div class="step" id="step8">
									<ul class="steps">
										<li>
											Step 1
											<span>Description</span>
										</li>
										<li>
											Step 2
											<span>Description</span>
										</li>
										<li class="active">
											Step 3
											<span>Lorem ipsum</span>
										</li>
									</ul>
									<h4>Step 3 description</h4>
									<div class="control-group">
										<label class="control-label">Check it</label>
										<div class="controls">
											<label class="checkbox"><input type="checkbox"></label>
										</div>
									</div>
								</div>
								<div id="navigation2">
									<div class="form-actions">
										<input class="navigation_button btn btn-danger" id="back2" value="Back" type="reset" />
										<input class="navigation_button btn btn-primary" id="next2" value="Next" type="submit" />
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Form validation</h3>
						</div>
						<div class="box-content">
							<form action="#" class='validate form-horizontal'>
								<div class="control-group">
									<label for="req" class="control-label">Required</label>
									<div class="controls">
										<input type="text" name="req" id="req" class='required'>
									</div>
								</div>
								<div class="control-group">
									<label for="pw3" class="control-label">Password</label>
									<div class="controls">
										<input type="password" name="pw3" id="pw3" class='required'>
									</div>
								</div>
								<div class="control-group">
									<label for="pw4" class="control-label">Repeat password</label>
									<div class="controls">
										<input type="password" name="pw4" id="pw4" class='required' equalTo="#pw3">
										<p class="help-block">Must match 'password'</p>
									</div>
								</div>
								<div class="control-group">
									<label for="email3" class="control-label">Email</label>
									<div class="controls">
										<input type="text" name="email3" id="email3" class='required email'>
									</div>
								</div>
								<div class="control-group">
									<label for="sela" class="control-label">Select</label>
									<div class="controls">
										<select name="sela" id="sela" class='{required:true}'>
											<option value=''>Choose one</option>
											<option value="1">Option 1</option>
											<option value="2">Option 2</option>
											<option value="3">Option 3</option>
											<option value="4">Option 4</option>
											<option value="5">Option 5</option>
											<option value="6">Option 6</option>
											<option value="7">Option 7</option>
											<option value="8">Option 8</option>
											<option value="9">Option 9</option>
											<option value="10">Option 10</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label for="aaa" class="control-label">Checkbox</label>
									<div class="controls">
										<label class="checkbox"><input type="checkbox" name='aaa' value='1' class='{required:true}'> Yes ??</label>
									</div>
								</div>
								<div class="control-group">
									<label for="bbb" class="control-label">Radio</label>
									<div class="controls">
										<label class="radio"><input type="radio" name='bbb' value='1' class='{required:true}'> Radio 1</label>
										<label class="radio"><input type="radio" name='bbb' value='2' class='{required:true}'> Radio 2</label>
										<label class="radio"><input type="radio" name='bbb' value='3' class='{required:true}'> Radio 3</label>
									</div>
								</div>
								<div class="form-actions">
									<input type="submit" class='btn btn-primary'>
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
<script src="/static/theme/neat/js/jquery.textareaCounter.plugin.js"></script>
<script src="/static/theme/neat/js/ui.spinner.js"></script>
<script src="/static/theme/neat/js/jquery.jgrowl_minimized.js"></script>
<script src="/static/theme/neat/js/jquery.form.js"></script>
<script src="/static/theme/neat/js/jquery.validate.min.js"></script>
<script src="/static/theme/neat/js/bbq.js"></script>
<script src="/static/theme/neat/js/jquery-ui-1.8.22.custom.min.js"></script>
<script src="/static/theme/neat/js/jquery.form.wizard-min.js"></script>
<script src="/static/theme/neat/js/jquery.cookie.js"></script>
<script src="/static/theme/neat/js/jquery.metadata.js"></script>
<script src="/static/theme/neat/js/custom.js"></script>
<script src="/static/theme/neat/js/demo.js"></script>
</body>
</html>
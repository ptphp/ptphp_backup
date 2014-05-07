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
							<h3>Quick statistics</h3>
						</div>
						<div class="box-content">
							Quick statistics can be easily used and this can be done <strong>without javascript</strong>!
							<ul class="quickstats">
								<li>
									<div class="small-chart" data-color="6a9d29" data-stroke="345010" data-type="line">5,3,9,6,5,9,7,3,5,10</div>
									<div class="chart-detail">
										<span class="amount green">+ 9834.41 $</span>
										<span class="description">Current balance</span>
									</div>
								</li>
								<li>
									<div class="small-chart" data-color="2c5b96" data-stroke="102c50" data-type="bar">2,5,4,6,5,4,7,8</div>
									<div class="chart-detail">
										<span class="amount">128.32</span>
										<span class="description">Orders per month</span>
									</div>
								</li>
								<li>
									<div class="small-chart" data-color="962c2c" data-stroke="651111" data-type="pie">6/10</div>
									<div class="chart-detail">
										<span class="amount">60%</span>
										<span class="description">Member qoute</span>
									</div>
								</li>
								<li>
									<div class="small-chart" data-color="6a9d29" data-stroke="345010" data-type="line">5,3,9,6,5,9,7,3,5,10</div>
									<div class="chart-detail">
										<span class="amount green">+ 9834.41 $</span>
										<span class="description">Current balance</span>
									</div>
								</li>
								<li>
									<div class="small-chart" data-color="2c5b96" data-stroke="102c50" data-type="bar">2,5,4,6,5,4,7,8</div>
									<div class="chart-detail">
										<span class="amount">128.32</span>
										<span class="description">Orders per month</span>
									</div>
								</li>
								<li>
									<div class="small-chart" data-color="962c2c" data-stroke="651111" data-type="pie">6/10</div>
									<div class="chart-detail">
										<span class="amount">60%</span>
										<span class="description">Member qoute</span>
									</div>
								</li>
							</ul>
							The color is set in <code>data</code> attributes. You can easily customize it by just changing that attribute.
						</div>
					</div>
				</div>
				<div class="span6">
					<div class="box">
						<div class="box-head">
							<h3>Pie statistics</h3>
						</div>
						<div class="box-content">
							<div class="flot flot-pie"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Bars</h3>
						</div>
						<div class="box-content">
							<div class="flot flot-bar"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Lines</h3>
						</div>
						<div class="box-content">
							<div class="flot flot-line"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Live charts</h3>
						</div>
						<div class="box-content">
							<div class="flot flot-live"></div>
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
<script src="/static/theme/neat/js/jquery.color.js"></script>
<script src="/static/theme/neat/js/jquery.flot.resize.js"></script>
<script src="/static/theme/neat/js/jquery.flot.orderBars.js"></script>
<script src="/static/theme/neat/js/jquery.cookie.js"></script>
<script src="/static/theme/neat/js/custom.js"></script><script src="/static/theme/neat/js/demo.js"></script>
</body>
</html>
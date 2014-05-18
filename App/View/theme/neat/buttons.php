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
						<div class="box-head">
							<h3>Custom quick-task buttons</h3>
						</div>
						<div class="box-content">
							These quick-task buttons use the PC.de Essen iconset you find on the bottom of this page. That are over 100 icons that are available for quick-tasks!
							<ul class="quicktasks">
								<li>
									<a href="#">
										<img src="/static/theme/neat/img/icons/essen/32/shipping.png" alt="">
										<span>Shipping</span>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/static/theme/neat/img/icons/essen/32/lock.png" alt="">
										<span>Security</span>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/static/theme/neat/img/icons/essen/32/free-for-job.png" alt="">
										<span>Cloud settings</span>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/static/theme/neat/img/icons/essen/32/database.png" alt="">
										<span>Database</span>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/static/theme/neat/img/icons/essen/32/email.png" alt="">
										<span>Messages</span>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/static/theme/neat/img/icons/essen/32/address.png" alt="">
										<span>Adressbook</span>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/static/theme/neat/img/icons/essen/32/date.png" alt="">
										<span>Events</span>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/static/theme/neat/img/icons/essen/32/home.png" alt="">
										<span>Dashboard</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Default buttons</h3>
						</div>
						<div class="box-content">
							<div class="row-fluid">
								<div class="span3">
									<h4>Colors</h4>
									<div class="btn-toolbar">
										<button class="btn">Default</button>
										<button class="btn btn-primary">Primary</button>
										<button class="btn btn-danger">Danger</button>
									</div>
									<div class="btn-toolbar">
										<button class="btn btn-success">Success</button>
										<button class="btn btn-warning">Warning</button>
										<button class="btn btn-info">Info</button>
									</div>
									<div class="btn-toolbar">
										<button class="btn btn-inverse">Inverse</button>
									</div>
								</div>
								<div class="span3">
									<h4>Sizes</h4>
									<div class="btn-toolbar">
										<button class="btn btn-large">Large</button>
										<button class="btn">Default</button>
										<button class="btn btn-small">Small</button>
									</div>
									<div class="btn-toolbar">
										<button class="btn btn-mini">Mini</button>
									</div>
								</div>
								<div class="span3">
									<h4>Dropdown / Dropup</h4>
									<div class="btn-toolbar">
										<div class="btn-group">
									  		<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
									    		Dropdown menu
									    		<span class="caret"></span>
									  		</a>
									  		<ul class="dropdown-menu">
									  			<li>
									  				<a href="#">Link-1</a>
									  				<a href="#">Link-2</a>
									  				<a href="#">Link-3</a>
									  			</li>
									  		</ul>
										</div>
									</div>
									<div class="btn-toolbar">
										<div class="btn-group dropup">
									  		<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
									    		Dropup menu
									    		<span class="caret"></span>
									  		</a>
									  		<ul class="dropdown-menu">
									  			<li>
									  				<a href="#">Link-1</a>
									  				<a href="#">Link-2</a>
									  				<a href="#">Link-3</a>
									  			</li>
									  		</ul>
										</div>
									</div>
								</div>
								<div class="span3">
									<h4>Toolbar</h4>
									<div class="btn-toolbar">
										<div class="btn-group">
											<button class="btn">1</button>
											<button class="btn">2</button>
											<button class="btn">3</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<div class="box">
						<div class="box-head">
							<h3>Round buttons</h3>
						</div>
						<div class="box-content">
							<div class="btn-toolbar">
								<button class="btn btn-round btn-mini">Rounded</button>
								<button class="btn btn-round">Rounded</button>
								<button class="btn btn-large btn-round">Rounded</button>
							</div>
						</div>
					</div>
				</div>
				<div class="span6">
					<div class="box">
						<div class="box-head">
							<h3>Custom dropdown</h3>
						</div>
						<div class="box-content">
							<div class="btn-group dropdown">
						  		<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						    		Dropdown menu
						    		<span class="caret"></span>
						  		</a>
						  		<ul class="dropdown-menu custom">
						  			<li>
						  				<a href="#">Link-1</a>
						  				<a href="#">Link-2</a>
						  				<a href="#">Link-3</a>
						  			</li>
						  		</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Custom button colors</h3>
						</div>
						<div class="box-content">
								<div class="row-fluid">
									<div class="span12">
										<h4>Gray</h4>
										<button class="btn btn-gray1">Gray 1</button>
										<button class="btn btn-gray2">Gray 2</button>
										<button class="btn btn-gray3">Gray 3</button>
										<button class="btn btn-gray4">Gray 4</button>
										<button class="btn btn-gray5">Gray 5</button>
										<button class="btn btn-gray6">Gray 6</button>
										<button class="btn btn-gray7">Gray 7</button>
										<button class="btn btn-gray8">Gray 8</button>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<h4>Blue</h4>
										<button class="btn btn-blue1">Blue 1</button>
										<button class="btn btn-blue2">Blue 2</button>
										<button class="btn btn-blue3">Blue 3</button>
										<button class="btn btn-blue4">Blue 4</button>
										<button class="btn btn-blue5">Blue 5</button>
										<button class="btn btn-blue6">Blue 6</button>
										<button class="btn btn-blue7">Blue 7</button>
										<button class="btn btn-blue8">Blue 8</button>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<h4>Red</h4>
										<button class="btn btn-red1">Red 1</button>
										<button class="btn btn-red2">Red 2</button>
										<button class="btn btn-red3">Red 3</button>
										<button class="btn btn-red4">Red 4</button>
										<button class="btn btn-red5">Red 5</button>
										<button class="btn btn-red6">Red 6</button>
										<button class="btn btn-red7">Red 7</button>
										<button class="btn btn-red8">Red 8</button>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<h4>Green</h4>
										<button class="btn btn-green1">Green 1</button>
										<button class="btn btn-green2">Green 2</button>
										<button class="btn btn-green3">Green 3</button>
										<button class="btn btn-green4">Green 4</button>
										<button class="btn btn-green5">Green 5</button>
										<button class="btn btn-green6">Green 6</button>
										<button class="btn btn-green7">Green 7</button>
										<button class="btn btn-green8">Green 8</button>
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
							<h3>Fugue - 3100+ icons</h3>
						</div>
						<div class="box-content">
							This theme comes with the awesome fugue icon collection. You have access to over 3100 icons!
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>PC.de - 100+ icons</h3>
						</div>
						<div class="box-content">
							<div class="row-fluid">
								<div class="span6">
									<h4>16px</h4>
									<ul class='ico-prev'><li><img alt="" src="/static/theme/neat/img/icons/essen/16/address.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/administrative-docs.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/advertising.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/archives.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/attibutes.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/bank.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/basket.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/bestseller.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/billing.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/bookmark.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/brainstorming.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/business-contact.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/busy.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/calendar.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/category.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/check.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/collaboration.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/comment.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/communication.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/config.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/consulting.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/contact.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/cost.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/credit-card.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/credit.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/current-work.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/customers.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/cv.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/database.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/date.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/delicious.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/document-library.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/donate.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/drawings.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/edit.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/email.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/facebook.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/featured.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/feed.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/finished-work.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/flag.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/folder.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/free-for-job.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/freelance.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/full-time.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/future-projects.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/graphic-design.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/heart.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/hire-me.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/home.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/illustration.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/invoice.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/issue.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/library.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/lightbulb.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/limited-edition.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/link.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/lock.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/login.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/logout.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/milestone.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/my-account.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/networking.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/old-versions.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/order-192.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/order.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/payment-card.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/paypal.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/pc.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/pen.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/pencil.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/phone.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/photography.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/plus.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/premium.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/print.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/process.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/product-193.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/product-design.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/product.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/project.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/publish.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/refresh.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/search.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/settings.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/shipping.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/showreel.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/sign-in.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/sign-out.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/sign-up.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/sitemap.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/special-offer.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/star.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/statistics.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/suppliers.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/tag.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/ticket.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/twitter.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/upcoming-work.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/user.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/world.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/16/zoom.png"></li></ul>
								</div>
								<div class="span6">
									<h4>32px</h4>
									<ul class='ico-prev'><li><img alt="" src="/static/theme/neat/img/icons/essen/32/address.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/administrative-docs.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/advertising.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/archives.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/attibutes.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/bank.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/basket.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/bestseller.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/billing.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/bookmark.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/brainstorming.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/business-contact.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/busy.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/calendar.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/category.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/check.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/collaboration.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/comment.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/communication.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/config.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/consulting.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/contact.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/cost.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/credit-card.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/credit.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/current-work.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/customers.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/cv.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/database.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/date.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/delicious.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/document-library.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/donate.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/drawings.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/edit.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/email.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/facebook.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/featured.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/feed.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/finished-work.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/flag.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/folder.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/free-for-job.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/freelance.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/full-time.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/future-projects.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/graphic-design.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/heart.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/hire-me.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/home.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/illustration.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/invoice.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/issue.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/library.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/lightbulb.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/limited-edition.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/link.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/lock.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/login.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/logout.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/milestone.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/my-account.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/networking.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/old-versions.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/order-149.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/order.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/payment-card.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/paypal.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/pc.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/pen.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/pencil.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/phone.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/photography.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/plus.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/premium.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/print.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/process.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/product-163.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/product-design.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/product.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/project.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/publish.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/refresh.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/search.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/settings.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/shipping.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/showreel.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/sign-in.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/sign-out.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/sign-up.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/sitemap.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/special-offer.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/star.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/statistics.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/suppliers.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/tag.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/ticket.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/twitter.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/upcoming-work.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/user.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/world.png"></li><li><img alt="" src="/static/theme/neat/img/icons/essen/32/zoom.png"></li></ul>
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
<script src="/static/theme/neat/js/custom.js"></script>
<script src="/static/theme/neat/js/demo.js"></script>
</body>
</html>
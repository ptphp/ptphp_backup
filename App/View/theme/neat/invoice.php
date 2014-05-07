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
<link rel="stylesheet" href="/static/theme/neat/css/style.css" media="all">
<link rel="stylesheet" href="/static/theme/neat/css/print.css" media='print'>
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
		<div class="row-fluid force-margin">
			<div class="span12">
				<div class="alert alert-info">
					<strong>Information</strong> This invoice can be printed!
				</div>
			</div>
		</div>
		<div class="row-fluid printable no-margin">
			<div class="span12">
				<div class="box">
					<div class="box-head">
						<h3>Printable invoice</h3>
						<div class="actions">
							<ul>
								<li>
									<a href="#" class='btn btn-mini tip' title="Print this invoice">
										<img src="/static/theme/neat/img/icons/fugue/printer.png" alt="">
									</a>
								</li>
							</ul>	
						</div>
					</div>
					<div class="box-content">
						<div class="invoice">
							<div class="invoice-name">
								INVOICE
							</div>
							<div class="invoice-company">
								<h2>YOUR COMPANY NAME</h2>
							</div>
							<div class="invoice-from">
								<strong>Company Name</strong>
								<address>
									Street Address <br>
									City, ST ZIP Code <br>
									<abbr title="Phone">Phone:</abbr> (125) 358123-581 <br>
									<abbr title="Fax">Fax:</abbr> (125) 251656-222 
								</address>
							</div>
							<div class="invoice-to">
								<strong>Max Mustermann</strong>
								<address>
									Street Address <br>
									City, ST ZIP Code <br>
									<abbr title="Phone">Phone:</abbr> (125) 358123-581 <br>
									<abbr title="Fax">Fax:</abbr> (125) 251656-222 
								</address>
							</div>
							<div class="invoice-infos">
								<table>
									<tr>
										<th>Date:</th>
										<td>Aug 06, 2012</td>
									</tr>
									<tr>
										<th>Invoice #:</th>
										<td>0001752188s</td>
									</tr>
									<tr>
										<th>Product:</th>
										<td>Service Hotline</td>
									</tr>
								</table>
							</div>
							<table class="table table-striped table-invoice table-bordered">
								<thead>
									<tr>
										<th>Description</th>
										<th>Price</th>
										<th>Qty</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class='name'>Lorem ipsum in eu quis</td>
										<td class='price'>$30.00</td>
										<td class='qty'>3</td>
										<td class='total'>$90.00</td>
									</tr>
									<tr>
										<td class='name'>Lorem ipsum in eu quis</td>
										<td class='price'>$30.00</td>
										<td class='qty'>3</td>
										<td class='total'>$90.00</td>
									</tr>
									<tr>
										<td class='name'>Lorem ipsum in eu quis</td>
										<td class='price'>$30.00</td>
										<td class='qty'>3</td>
										<td class='total'>$90.00</td>
									</tr>
									<tr>
										<td class='name'>Lorem ipsum in eu quis</td>
										<td class='price'>$30.00</td>
										<td class='qty'>3</td>
										<td class='total'>$90.00</td>
									</tr>
									<tr>
										<td class='name'>Lorem ipsum in eu quis</td>
										<td class='price'>$30.00</td>
										<td class='qty'>3</td>
										<td class='total'>$90.00</td>
									</tr><tr>
										<td></td>
										<td></td>
										<td class='bottom'>Subtotal:</td>
										<td class='total'>$413.55</td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td class='bottom'>Taxrate:</td>
										<td class='total'>8.10%</td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td class='last'>Total:</td>
										<td class='total'>$450.00</td>
									</tr>
								</tbody>
							</table>
							<div class="invoice-footer">
								<h4>COMPANY NAME</h4>
								<address>
									Street Address <br>
									City, ST ZIP Code <br>
									<abbr title="Phone">Phone:</abbr> (125) 358123-581 
									<abbr title="Fax">Fax:</abbr> (125) 251656-222 
								</address>
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
<script src="/static/theme/neat/js/jquery.peity.js"></script>
<script src="/static/theme/neat/js/jquery.fancybox.js"></script>
<script src="/static/theme/neat/js/jquery.flot.js"></script>
<script src="/static/theme/neat/js/jquery.color.js"></script>
<script src="/static/theme/neat/js/jquery.flot.resize.js"></script>
<script src="/static/theme/neat/js/jquery.cookie.js"></script>
<script src="/static/theme/neat/js/jquery.cookie.js"></script>
<script src="/static/theme/neat/js/custom.js"></script><script src="/static/theme/neat/js/demo.js"></script>
</body>
</html>
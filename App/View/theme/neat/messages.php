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
								<img src="/static/theme/neat/img/icons/essen/32/address.png" alt="">
								<span>My adressbook</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="/static/theme/neat/img/icons/essen/32/pen.png" alt="">
								<span>Write message</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="/static/theme/neat/img/icons/essen/32/sign-out.png" alt="">
								<span>Sent messages</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="/static/theme/neat/img/icons/essen/32/finished-work.png" alt="">
								<span>Mark all as read</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Unread messages</h3>
						</div>
						<div class="box-content">
							<ul class="messages">
								<li class="user1">
									<a href="#"><img src="/static/theme/neat/img/sample/40.gif" alt=""></a>
									<div class="info">
										<span class="arrow"></span>
										<div class="detail">
											<span class="sender">
												<strong>Username</strong> says:
											</span>
											<span class="time">15 minutes ago</span>
										</div>
										<div class="message">
											<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
										</div>
									</div>
								</li>
								<li class="user2">
									<a href="#"><img src="/static/theme/neat/img/sample/40.gif" alt=""></a>
									<div class="info">
										<span class="arrow"></span>
										<div class="detail">
											<span class="sender">
												<strong>Username</strong> says:
											</span>
											<span class="time">15 minutes ago</span>
										</div>
										<div class="message">
											<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum..</p>
											<p>
												At vero eos et accusam et justo duo dolores et ea rebum.
											</p>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head tabs">
							<h3>Messages</h3>
							<ul class="nav nav-tabs">
								<li class='active'>
									<a href="#inbox" data-toggle="tab">Inbox</a>
								</li>
								<li>
									<a href="#sent" data-toggle="tab">Sent messages</a>
								</li>
								<li>
									<a href="#trash" data-toggle="tab">Deleted messages</a>
								</li>
							</ul>
						</div>
						<div class="box-content box-nomargin">
							<div class="alert alert-info">
								<strong>Note!</strong> As you can see, the checkbox column can't be sorted! It's disabled via <code>data</code> attribute. By the way... even popovers work well in dataTables!
							</div>
							<div class="tab-content">
								<div class="tab-pane active table-with-action" id="inbox">
									<table class='table table-has-pover table-striped table-bordered dataTable dataTable-nosort' data-nosort="0">
										<thead>
											<tr>
												<th class=''>
													<input type="checkbox" class='sel_all'>
												</th>
												<th>Subject</th>
												<th>Sender</th>
												<th>Date</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr class='table-unread'>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>Lorem ipsum laboris laboris amet ex Duis dolore magna</td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Username</a>
												</td>
												<td>
													Jul 24, 2012
												</td>
												<td class='actions'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Reply" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-reply.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>labore sunt adipisicing qui sit sit</td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Adispis</a>
												</td>
												<td>
													Jul 21, 2012
												</td>
												<td class='actions'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Reply" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-reply.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>sit in et laboris consectetur aliquip aute minim. </td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Laboris</a>
												</td>
												<td>
													Jul 20, 2012
												</td>
												<td class='actions'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Reply" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-reply.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>Duis dolore magna</td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Dolore</a>
												</td>
												<td>
													Jul 19, 2012
												</td>
												<td class='actions'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Reply" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-reply.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr class='table-unread'>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>Non reprehenderit irure irure esse. </td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Irure</a>
												</td>
												<td>
													Jul 14, 2012
												</td>
												<td class='actions'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Reply" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-reply.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr class='table-unread'>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>Lorem ipsum laboris laboris amet ex Duis dolore magna</td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Username</a>
												</td>
												<td>
													Jul 24, 2012
												</td>
												<td class='actions'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Reply" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-reply.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>labore sunt adipisicing qui sit sit</td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Adispis</a>
												</td>
												<td>
													Jul 21, 2012
												</td>
												<td class='actions'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Reply" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-reply.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>sit in et laboris consectetur aliquip aute minim. </td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Laboris</a>
												</td>
												<td>
													Jul 20, 2012
												</td>
												<td class='actions'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Reply" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-reply.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>Duis dolore magna</td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Dolore</a>
												</td>
												<td>
													Jul 19, 2012
												</td>
												<td class='actions'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Reply" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-reply.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>Non reprehenderit irure irure esse. </td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Irure</a>
												</td>
												<td>
													Jul 14, 2012
												</td>
												<td class='actions'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Reply" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-reply.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>Lorem ipsum laboris laboris amet ex Duis dolore magna</td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Username</a>
												</td>
												<td>
													Jul 24, 2012
												</td>
												<td class='actions'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Reply" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-reply.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>labore sunt adipisicing qui sit sit</td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Adispis</a>
												</td>
												<td>
													Jul 21, 2012
												</td>
												<td class='actions'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Reply" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-reply.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>sit in et laboris consectetur aliquip aute minim. </td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Laboris</a>
												</td>
												<td>
													Jul 20, 2012
												</td>
												<td class='actions'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Reply" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-reply.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>Duis dolore magna</td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Dolore</a>
												</td>
												<td>
													Jul 19, 2012
												</td>
												<td class='actions'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Reply" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-reply.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>Non reprehenderit irure irure esse. </td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Irure</a>
												</td>
												<td>
													Jul 14, 2012
												</td>
												<td class='actions'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Reply" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-reply.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
									<div class="force-padding">
										<div class="btn-toolbar">
											<div class="btn-group">
											  <button class="btn">Mark as read</button>
											  <button class="btn dropdown-toggle" data-toggle="dropdown">
											    <span class="caret"></span>
											  </button>
											  <ul class="dropdown-menu">
											  	<li>
											    	<a href="#">Reply</a>
											    </li>
											    <li>
											    	<a href="#">Delete</a>
											    </li>
											  </ul>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane table-with-action" id="sent">
									<table class='table table-striped table-bordered dataTable dataTable-nosort' data-nosort="0">
										<thead>
											<tr>
												<th class=''>
													<input type="checkbox" class='sel_all'>
												</th>
												<th>Subject</th>
												<th>Sender</th>
												<th>Date</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>sit in et laboris consectetur aliquip aute minim. </td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Laboris</a>
												</td>
												<td>
													Jul 20, 2012
												</td>
												<td class='actions_two'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>Duis dolore magna</td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Dolore</a>
												</td>
												<td>
													Jul 19, 2012
												</td>
												<td class='actions_two'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>Non reprehenderit irure irure esse. </td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Irure</a>
												</td>
												<td>
													Jul 14, 2012
												</td>
												<td class='actions_two'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>Lorem ipsum laboris laboris amet ex Duis dolore magna</td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Username</a>
												</td>
												<td>
													Jul 24, 2012
												</td>
												<td class='actions_two'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>labore sunt adipisicing qui sit sit</td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Adispis</a>
												</td>
												<td>
													Jul 21, 2012
												</td>
												<td class='actions_two'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>sit in et laboris consectetur aliquip aute minim. </td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Laboris</a>
												</td>
												<td>
													Jul 20, 2012
												</td>
												<td class='actions_two'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>Duis dolore magna</td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Dolore</a>
												</td>
												<td>
													Jul 19, 2012
												</td>
												<td class='actions_two'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>Non reprehenderit irure irure esse. </td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Irure</a>
												</td>
												<td>
													Jul 14, 2012
												</td>
												<td class='actions_two'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>Lorem ipsum laboris laboris amet ex Duis dolore magna</td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Username</a>
												</td>
												<td>
													Jul 24, 2012
												</td>
												<td class='actions_two'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>labore sunt adipisicing qui sit sit</td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Adispis</a>
												</td>
												<td>
													Jul 21, 2012
												</td>
												<td class='actions_two'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>sit in et laboris consectetur aliquip aute minim. </td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Laboris</a>
												</td>
												<td>
													Jul 20, 2012
												</td>
												<td class='actions_two'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>Duis dolore magna</td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Dolore</a>
												</td>
												<td>
													Jul 19, 2012
												</td>
												<td class='actions_two'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>Non reprehenderit irure irure esse. </td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Irure</a>
												</td>
												<td>
													Jul 14, 2012
												</td>
												<td class='actions_two'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
									<div class="force-padding">
										<div class="btn-toolbar">
											<div class="btn-group">
											  <button class="btn">Mark as read</button>
											  <button class="btn dropdown-toggle" data-toggle="dropdown">
											    <span class="caret"></span>
											  </button>
											  <ul class="dropdown-menu">
											  	<li>
											    	<a href="#">Reply</a>
											    </li>
											    <li>
											    	<a href="#">Delete</a>
											    </li>
											  </ul>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane table-with-action" id="trash">
									<table class='table table-striped table-bordered dataTable dataTable-nosort' data-nosort="0">
										<thead>
											<tr>
												<th class=''>
													<input type="checkbox" class='sel_all'>
												</th>
												<th>Subject</th>
												<th>Sender</th>
												<th>Date</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>Lorem ipsum laboris laboris amet ex Duis dolore magna</td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Username</a>
												</td>
												<td>
													Jul 24, 2012
												</td>
												<td class='actions_two'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>labore sunt adipisicing qui sit sit</td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Adispis</a>
												</td>
												<td>
													Jul 21, 2012
												</td>
												<td class='actions_two'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>sit in et laboris consectetur aliquip aute minim. </td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Laboris</a>
												</td>
												<td>
													Jul 20, 2012
												</td>
												<td class='actions_two'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>Duis dolore magna</td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Dolore</a>
												</td>
												<td>
													Jul 19, 2012
												</td>
												<td class='actions_two'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<td class='table-checkbox'>
													<input type="checkbox" class='selectable-checkbox'>
												</td>
												<td>Non reprehenderit irure irure esse. </td>
												<td>
													<a href="#" class='pover' data-title="username" data-content="some user information">Irure</a>
												</td>
												<td>
													Jul 14, 2012
												</td>
												<td class='actions_two'>
													<div class="btn-group">
														<a href="#" title="Read message" class="btn btn-mini tip">
															<img src="/static/theme/neat/img/icons/fugue/mail-open.png" alt="">
														</a>
														<a href="#" title="Delete" class="btn btn-mini tip deleteRow">
															<img src="/static/theme/neat/img/icons/fugue/mail--minus.png" alt="">
														</a>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
									<div class="force-padding">
										<div class="btn-toolbar">
											<div class="btn-group">
											  <button class="btn">Mark as read</button>
											  <button class="btn dropdown-toggle" data-toggle="dropdown">
											    <span class="caret"></span>
											  </button>
											  <ul class="dropdown-menu">
											  	<li>
											    	<a href="#">Reply</a>
											    </li>
											    <li>
											    	<a href="#">Delete</a>
											    </li>
											  </ul>
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
<script src="/static/theme/neat/js/jquery.dataTables.bootstrap.js"></script>
<script src="/static/theme/neat/js/jquery.color.js"></script>
<script src="/static/theme/neat/js/jquery.flot.resize.js"></script>
<script src="/static/theme/neat/js/jquery.flot.orderBars.js"></script>
<script src="/static/theme/neat/js/jquery.cookie.js"></script>
<script src="/static/theme/neat/js/custom.js"></script><script src="/static/theme/neat/js/demo.js"></script>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Neat Admin Template</title>
<meta name="description" content="">

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">

<link rel="stylesheet" href="/static/theme/neat/css/bootstrap.css">
<link rel="stylesheet" href="/static/theme/neat/css/jquery.fancybox.css">
<link rel="stylesheet" href="/static/theme/neat/css/login.css">
</head>
<body class='login_body'>
	<div class="wrap">
		<h2>Neat Admin Template</h2>
		<h4>Welcome to the login page</h4>
		<form action="dashboard.html"  autocomplete="off" method="post" class="validate">
		<div class="alert alert-error">
			<strong>Error!</strong> Please enter an username and a password.
		</div>
		<div class="login">
			<div class="email">
				<label for="user">Email</label><div class="email-input"><div class="control-group"><div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span><input type="text" id="user" name="user" class="{required:true}"></div></div></div>
			</div>
			<div class="pw">
				<label for="pw">Password</label><div class="pw-input"><div class="control-group"><div class="input-prepend"><span class="add-on"><i class="icon-lock"></i></span><input type="password" id="pw" name="pw" class='{required:true}'></div></div></div>
			</div>
			<div class="remember">
				<label class="checkbox">
					<input type="checkbox" value="1" name="remember"> Remember me on this computer
				</label>
			</div>
		</div>
		<div class="submit">
			<a href="#">Lost password?</a>
			<button class="btn btn-red5">Login</button>
		</div>
		<div class="login social">
			<div class="btn-row">
				<a href="#" class="btn btn-social btn-twitter"><img src="/static/theme/neat/img/twitter.png" alt="">Sign in with Twitter</a>
				<a href="#" class="btn btn-social btn-fb"><img src="/static/theme/neat/img/facebook.png" alt="">Sign in with Facebook</a>
			</div>
			<div class="btn-row">
				<a href="#" class="btn btn-social btn-dr"><img src="/static/theme/neat/img/dribble.png" alt="">Sign in with Dribble</a>
				<a href="#" class="btn btn-social btn-fo"><img src="/static/theme/neat/img/forrst.png" alt="">Sign in with Forrst</a>
			</div>
		</div>
		</form>
		<div class="social-shadow-hider"></div>
		<div class="social-toggle">
			<a href="#" class='toggle-social'>Sign in with social network <b class="caret"></b></a>
		</div>
	</div>
<script src="/static/theme/neat/js/jquery.js"></script>
<script src="/static/theme/neat/js/jquery.validate.min.js"></script>
<script src="/static/theme/neat/js/jquery.metadata.js"></script>
<script src="/static/theme/neat/js/error.js"></script>
</body>
</html>
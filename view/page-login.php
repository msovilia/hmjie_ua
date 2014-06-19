
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie ie9" lang="en" class="no-js"> <![endif]-->
<!--[if !(IE)]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
	<title>Login | Kingboard - Admin Dashboard</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="King Dashboard">
	<meta name="author" content="The Develovers">

	<!-- CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/main.min.css" rel="stylesheet" type="text/css">

	<!-- Fav and touch icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/kingboard-favicon144x144.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/kingboard-favicon114x114.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/kingboard-favicon72x72.png">
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="assets/ico/kingboard-favicon57x57.png">
	<link rel="shortcut icon" href="assets/ico/favicon.png">

</head>

<body>
	<div class="full-page-wrapper page-login text-center">

		<div class="inner-page">

			<div class="logo">
				<a href="index.html">
					<img src="assets/img/hmjie-logo.png" alt="" />
				</a>
			</div>
            <div class="separator">
                <span>Himpunan Mahasiswa Jurusan Ilmu Ekonomi</span>
            </div>
			<div class="login-box center-block">
				<form method="POST" action="view/mainProcess.php?act=login">
					<div class="input-group">
						<input id="username" name="username" type="text" placeholder="Nomor BP / NIP" class="form-control">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
					</div>
					<div class="input-group">
						<input id="password" name="password" type="password" placeholder="Password" class="form-control">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
					</div>
					<button class="btn btn-custom-primary btn-lg btn-block btn-login"></i> Login</button>
				</form>
			</div>
		</div>

		<footer class="footer">&copy; 2014 The Develovers</footer>

	</div>

	<!-- Javascript -->
	<script type="text/javascript" src="assets/js/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/modernizr.js"></script>

</body>

</html>
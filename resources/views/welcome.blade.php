
<!DOCTYPE HTML>
<!--
	Dimension by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Hosptal Management System</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="public/welcome-page-bootstrap/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="public/welcome-page-bootstrap/assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="content">
							<div class="inner">
								<h1>Welcome</h1>
								<p>Please Login as Doctor, Admin, or Receptionist</p>
							</div>
						</div>
						<nav>
							<ul>
								<li><a href="{{url('adminlogin')}}">Admin</a></li>
								<li><a href="{{url('doclogin')}}">Doctor</a></li>
								<li><a href="{{url('recplogin')}}">Receptionist</a></li>
							</ul>
						</nav>
					</header>


				<!-- Footer -->
					<footer id="footer">
						<p class="copyright">&copy; All Rights Reserved <a href="#">Hospital Management System</a>.</p>
					</footer>


			</div>

		<!-- BG -->
			<div id="bg"></div>

		<!-- Scripts -->
			<script src="public/welcome-page-bootstrap/assets/js/jquery.min.js"></script>
			<script src="public/welcome-page-bootstrap/assets/js/browser.min.js"></script>
			<script src="public/welcome-page-bootstrap/assets/js/breakpoints.min.js"></script>
			<script src="public/welcome-page-bootstrap/assets/js/util.js"></script>
			<script src="public/welcome-page-bootstrap/assets/js/main.js"></script>
	</body>
</html>

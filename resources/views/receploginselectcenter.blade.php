
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
		<link rel="stylesheet" type="text/css" href="{{ asset('public/css/arrows-css.css') }}" />
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
								<h1>Hi {{$receptionist->username}}</h1>
								<p>Please select your desired center</p>
							</div>
						</div>
            <form action="{{url('storerecepcurcenter', $receptionist->id)}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            @csrf
                  <select name="center_selected">
                    <option value="{{$receptionist->center_id}}">{{$repadvcurrentcenter}}</option>
                    @foreach($advcenters as $advcenter)
											@if($advcenter->cname != $repadvcurrentcenter)
                      	<option value="{{$advcenter->id}}">{{$advcenter->cname}}</option>
											@endif
										@endforeach
                </select>
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="submit" class="" style="margin-top:50px">Confirm </button>
                </div>
            </form>
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

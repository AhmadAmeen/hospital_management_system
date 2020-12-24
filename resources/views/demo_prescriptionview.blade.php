
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Site Title -->
	<title>Doctor's - Perscription Page</title>
	<!-- Favicon Icon -->
	<link rel="icon" type="image/x-icon" href="images/favicon.png" />
	<!-- Font Awesoeme Stylesheet CSS -->
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
	<!-- Google web Font -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Material Design Lite Stylesheet CSS -->
	<link rel="stylesheet" href="css/material.min.css" />
	<!-- Custom Main Stylesheet CSS -->
	<link rel="stylesheet" href="css/invoice.css">

    <!-- Searchbox -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/searchbox-for-recep-css.css') }}" />
    <!-- Bootstrap -->
    <link href="{{ asset('public/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('public/gentelella-master/vendors/bootstrap/dist/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('public/gentelella-master/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('public/gentelella-master/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link  href="{{ asset('public/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('public/gentelella-master/build/css/custom.min.css') }}" rel="stylesheet">

</head>
<body>
	<div class="container">
		<table class="invoice-hdr">
			<tr>
				<td>
					<p style="font-family:calibri;font-size:16px;font-weight:bold;color:#32C1CE">Prof. Dr. Ghias-un-Nabi Tayyab</p>
					<p style="font-family:calibri;font-size:14px;font-weight:bold;color:#000">M.B.B.S (Pb), M.D (USA)</p>
					<p style="font-family:calibri;font-size:14px;font-weight:bold;color:#000">F.C.P.S (PAK), M.R.C.P (UK), R.R.C.P (EDIN)</p>
					<p style="font-family:calibri;font-size:14px;font-weight:bold;color:#000">Consultant Gastroenterologist, Hepatologist</p>
					<p style="font-family:calibri;font-size:14px;font-weight:bold;color:#000">and Internventional Endoscopist</p>
				</td>
				<td>
					<p>Doctors Hospital & Medical Center</p>
					<p>152-G/1, Canal Bank, Johar Town, 54590,</p>
					<p>54590, Lahore Pakistan</p>
					<p>Phone: 042-111-22-33-77 Ext: 285</p>
					<p>Email: doctor@domain.com</p>
				</td>
				<td class="invoice-logo">
					<img src="images/logo.png" alt="">
				</td>

			</tr>

		</table>

		<div class="invoice-bdy">

			<div class="row">
				<div class="col-6">
					<table class="invoice-info">
						<tr>
							<td class="dark">OPD #</td>
							<td><input type="text"></td>
						</tr>
						<tr>
							<td class="dark">Patient Name</td>
							<td><input type="text"></td>
						</tr>
						<tr>
							<td class="dark">F/H Name</td>
							<td><input type="text"></td>
						</tr>
					</table>
				</div>
				<div class="col-6">
					<table class="pull-right invoice-info">
						<tr>
							<td class="dark">Age/Sex</td>
							<td><input type="text"></td>
						</tr>
						<tr>
							<td class="dark">Address</td>
							<td><input type="text"></td>
						</tr>
						<tr>
							<td class="dark">Contact</td>
							<td><input type="text"></td>
						</tr>
					</table>
				</div>
			</div>
			<hr style="margin-top:10px;margin-bottom:5px; color:#32C1CE; border: 1px solid #32C1CE;">
			<p>
			<div class="row">
				<div class="col-2">
					<table class="invoice-info">
						<tr>
							<td class="dark"><span style="font-family:calibri;font-size:24px;font-weight:bold;color:#000">D</span><span style="font-family:calibri;font-size:14px;font-weight:bold;color:#000">x</span></td>
						</tr>
						<tr>
							<td class="">
							CHOLECYSTECTOMY
							</td>
						</tr>
					</table>
				</div>
				<div class="col-10">
					<table class="pull-right invoice-info">
						<tr>
							<td class="dark">TEMP</td>
							<td><input type="text"></td>
							<td class="dark">PULSE</td>
							<td><input type="text"></td>
						</tr>
						<tr>
							<td class="dark">B.P</td>
							<td><input type="text"></td>
							<td class="dark">Weight</td>
							<td><input type="text"></td>
						</tr>

					</table>
				</div>
			</div>
			<p>
			<div class="row">
				<div class="col-2">
					<table class="invoice-info">
						<tr>
							<td class="dark"><span style="font-family:calibri;font-size:24px;font-weight:bold;color:#000">R</span><span style="font-family:calibri;font-size:14px;font-weight:bold;color:#000">x</span></td>

						</tr>
					</table>
				</div>
			</div>
			<hr style="margin-top:10px;margin-bottom:5px; color:#32C1CE; border: 1px solid #32C1CE;">
			<p>
			<div class="items">
				<table>
					<tr>
						<th>S#</th>
						<th>Item Name</th>
						<th>Description / Instruction</th>

					</tr>
					<tr class="item-row">
						<td>1</td>
						<td>URSO 500mg</td>
						<td>1 TAB 12 Hourly</td>
					</tr>
					<tr class="item-row">
						<td>2</td>
						<td>PLASENZYM</td>
						<td>1 TAB 1/2 Hour before meals(morning,afternoon,night)</td>
					</tr>
					<tr class="item-row">
						<td>3</td>
						<td>IPRIDE 50mg</td>
						<td>1 TAB 1/2 Hour before meals at morning and night</td>
					</tr>


				</table>
			</div>
		</div>
		<div class="invoice-ftr">
			<p>Special Instruction</p>
			<textarea placeholder="Enter Comment or Note"></textarea>
		</div>
	</div>

	<!-- Jquery Library 2.1 JavaScript-->
	<script src="js/jquery-2.1.4.min.js"></script>
    <!-- Popper JavaScript-->
    <script src="js/popper.min.js"></script>
	<!-- Bootstrap Core JavaScript-->
	<script src="js/bootstrap.min.js"></script>
	<!-- Material Design Lite JavaScript-->
	<script src="js/material.min.js"></script>
	<!-- main invoice JavaScript-->
	<script src="js/invoice.js"></script>
</body>
</html>

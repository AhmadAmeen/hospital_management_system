<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Site Title -->
	<title>Doctor's - Perscription Page</title>
	<!-- Favicon Icon -->
	<link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}" />
	<!-- Font Awesoeme Stylesheet CSS -->
	<link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}" />
	<!-- Google web Font -->
	<link rel="stylesheet" type="{{ asset('text/css') }}" href="https://fonts.googleapis.com/css?family=Montserrat:400">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<!-- Material Design Lite Stylesheet CSS -->
	<link rel="stylesheet" href="{{ asset('css/material.min.css') }}" />
	<!-- Custom Main Stylesheet CSS -->
	<link rel="stylesheet" href="{{ asset('css/invoice.css') }}">
</head>
<body>
	<div class="container">
		<table class="invoice-hdr">
			<tr>
				<td>
					<p style="font-family:calibri;font-size:16px;font-weight:bold;color:#32C1CE">{{$doctor->dname}}</p>
					<p style="font-family:calibri;font-size:14px;font-weight:bold;color:#000; width: 250px;">{{$doctor->qualification}}</p>
				</td>
				<td>$visited_cname
          @foreach($centers as $center)
					@if ($center->cname == $visited_cname)
					<p><b>{{$center->cname}}: {{$center->address}}</b></p>
					@else
					<p><b>{{$center->cname}}:</b> {{$center->address}}</p>
					@endif
					@endforeach
				</td>
				<td class="invoice-logo">
          <!--
					<img src="{{ asset('images/logo.png') }}" alt="">
          -->
          <img src="data:image/png;base64,{{ chunk_split(base64_encode($doctor->dimg)) }}"> </img>
        </td>
			</tr>
		</table>
		<div class="invoice-bdy">
			<div class="row">
				<div class="col-6">
					<table class="invoice-info">
						<tr>
							<td class="dark">OPD #</td>
							<td><input type="text" value="{{$patient->id}}"></td>
						</tr>
						<tr>
							<td class="dark">Patient Name</td>
							<td><input type="text" value="{{$patient->fname}} {{$patient->lname}}"></td>
						</tr>
						<tr>
							<td class="dark">F/H Name</td>
							<td><input type="text" value="{{$patient->father_name}}"></td>
						</tr>
					</table>
				</div>
				<div class="col-6">
					<table class="pull-right invoice-info">
						<tr>
							<td class="dark">Age/Sex</td>
							<td><input type="text" value="{{$patient->age}} / {{$patient->gender}}"></td>
						</tr>
						<tr>
							<td class="dark">Address</td>
							<td><input type="text" value="N/A"></td>
						</tr>
						<tr>
							<td class="dark">Contact</td>
							<td><input type="text" value="{{$patient->guard_no}}"></td>
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
              @foreach ($diagnoses as $diagnosis)
              <tr>
                <td class="">
                  {{$diagnosis->dis_id}}
                </td>
              </tr>
              @endforeach
					</table>
				</div>
				<div class="col-10">
					<table class="pull-right invoice-info">
						<tr>
							<td class="dark">TEMP</td>
							<td><input type="text" value="{{$visit_history->temperature}}"></td>
							<td class="dark">HEAD SIZE</td>
							<td><input type="text" value="{{$visit_history->head_size}}"></td>
						</tr>
						<tr>
							<td class="dark">LENGTH</td>
							<td><input type="text" value="{{$visit_history->length}}"></td>
							<td class="dark">WEIGHT</td>
							<td><input type="text" value="{{$visit_history->weight}}"></td>
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
						<th>Urdu</th>
					</tr>
          <?php $i = 1; ?>
          @foreach($prescribed_med as $med)
					  <tr class="item-row">
            <td>{{$i++}}</td>
            <td>{{$med->med_id}}</td>
						<td>{{$med->dosage}}</td>
						<td><p style="float:right; ">{{$med->dosage_urdu}}</p></td>
					  </tr>
          @endforeach
				</table>
			</div>
		</div>
		<div class="invoice-ftr">
			<p>Special Instruction</p>
			<textarea placeholder="Enter Comment or Note">{{$visit_history->note}}</textarea>
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

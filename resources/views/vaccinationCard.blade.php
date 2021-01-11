<!DOCTYPE html>
<html>
<title>Immunization Card</title>
<head>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('public/ImmunizationCard/css/bootstrap.min.css') }}">
<style>

</style>

</head>
<div class="container-fluid">

<div class="table-responsive">
<table class="table table-hover">
<thead>
<tr>
<th style="background-color:#fff; color:#000; width:20%">Text</th>
<th style="background-color:#49c59d; color:#fff; font-weight:bold; font-size:20px; text-align:center; width:60%">IMMUNIZATION CARD</th>
<th style="background-color:#eee; color:#000; text-align:center; width:20%">Date: <span style="color:#717171">05-JAN-2021</span></th>
</tr>
</thead>
</table>
<div class="container-fluid">
<div class="row" style="padding-left:20px;padding-right:20px">
	<form class="form-horizontal" method="post" id="userForm" name="userForm" data-toggle="validator" role="form">
		<div class="form-group">
			<div class="col-md-2">
				<label class="control-label" style="color:#4b86d0">Patient ID</label>
				<span style="margin-left:10px; margin-right:10px">{{$patient->id}}</span>
			</div>
			<div class="col-md-2">
				<label class="control-label " style="color:#4b86d0">Name</label>
				<span style="margin-left:10px; margin-right:10px">{{$patient->fname}} {{$patient->lname}}</span>
			</div>
			<div class="col-sm-2">
				<label class="control-label " style="color:#4b86d0">Father Name</label>
				<span style="margin-left:10px; margin-right:10px">{{$patient->fname}}</span>
			</div>
			<div class="col-sm-2">
				<label class="control-label " style="color:#4b86d0">Contact</label>
				<span style="margin-left:10px; margin-right:10px">{{$patient->guard_no}}</span>
			</div>
			</div>
		</form>
</div>
</div>
<table class="table table-hover" style="width:100%">
<thead>
<tr>
<th style="background-color:#e03e9c; color:#fff"></th>
<th style="background-color:#6c7ae0; color:#fff">First Dose</th>
<th style="background-color:#6c7ae0; color:#fff">Second Dose</th>
<th style="background-color:#6c7ae0; color:#fff">Third Dose</th>
<th style="background-color:#6c7ae0; color:#fff">Fourth Dose</th>
<th style="background-color:#6c7ae0; color:#fff">Booster 1</th>
<th style="background-color:#6c7ae0; color:#fff">Booster 2</th>
</tr>
</thead>
<tbody>
	<?php use App\VaccinationHistory; $temp[] = "";?>
@foreach ($vaccinationhistories as $vaccinationhistory)
<?php
$i = 1;
$vhs = VaccinationHistory::where('vname', $vaccinationhistory->vname)->where('vt_type', 'Dosage')->where('pat_id', $patient->id)->get();
$vhs1 = VaccinationHistory::where('vname', $vaccinationhistory->vname)->where('vt_type', 'Booster')->where('pat_id', $patient->id)->get();
if (in_array($vaccinationhistory->vname, $temp)) {
	continue;
}
$temp[] = $vaccinationhistory->vname;
?>
<tr>
	<td style="background-color:#fcebf5">
		<img src="{{ asset('public/ImmunizationCard/images/v1.png') }}" style="width:20px; height:23px">
{{$vaccinationhistory->vname}}
</td>
@foreach ($vhs as $vh)
@if ($vh->vt_type == 'Dosage')
	@if ($vh->status == 'TRUE')
	<td style="color: green">{{$vh->vaccination_date}}</td>
	@else
	<td style="color: red">{{$vh->vaccination_date}}</td>
	@endif
@endif
@endforeach

@if(count($vhs) == 0)
<td>--</td>
<td>--</td>
<td>--</td>
<td>--</td>
@endif
@if(count($vhs) == 1)
<td>--</td>
<td>--</td>
<td>--</td>
@endif
@if(count($vhs) == 2)
<td>--</td>
<td>--</td>
@endif
@if(count($vhs) == 3)
<td>--</td>
@endif
<!--booster-->
@foreach ($vhs1 as $vh1)
@if ($vh1->vt_type == 'Booster')
	@if ($vh1->status == 'TRUE')
	<td style="color: green">{{$vh->vaccination_date}}</td>
	@else
	<td style="color: red">{{$vh->vaccination_date}}</td>
	@endif
@endif
@endforeach
@if(count($vhs1) == 0)
<td>--</td>
<td>--</td>
@endif
@if(count($vhs1) == 1)
<td>--</td>
@endif
</tr>
@endforeach
<tr>
</tbody>
</table>
</div>
</div>
<!-- jQuery library -->
<script src="{{ asset('public/ImmunizationCard/js/jquery.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('public/ImmunizationCard/js/bootstrap.min.js') }}"></script>
<script>
</script>
<!-- Initialize Bootstrap functionality -->
<script>
// Initialize tooltip component
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// Initialize popover component
$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>

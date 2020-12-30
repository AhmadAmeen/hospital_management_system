@extends('doctorlayout.defaultforvac')
@section('content')

<style>

.bg {
	background: url('csd/img/bg9.jpg');
	background-repeat: no-repeat;
	background-position: top;
    background-size: contain;
    height: 500px;
}

</style>
<?php
use App\AdvVaccineTiming;
use App\Doctor;
use App\AdvCenter;
use App\AdvVaccine;
use App\Patient;
use App\VaccinationHistory;
$i = 0;
?>

<link rel="stylesheet" type="text/css" href="{{ asset('public/css/checkbox-etc-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/table-css.css') }}" />
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#myDIV {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: lightblue;
  margin-top: 20px;
}
/* Popup container - can be anything you want */
.popup {
  position: relative;
  display: inline-block;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* The actual popup */
.popup .popuptext {
  visibility: hidden;
  width: 160px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 8px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -80px;
  margin-bottom: 20px;
}

/* Popup arrow */
.popup .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}
body {
    text-align: center;
}
form {
    display: inline-block;
}
/* Toggle this class - hide and show the popup */
.popup .show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;}
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}
</style>
</head>
<link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">

          <!-- my code -->
                            <div style="background: url('csd/img/bg9.jpg')">
                            <body>
                              <div class="x_title" style="color: white">
                                <h2>Welcome <small style="color: white">Edit Vaccine History Details</small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                  </li>
                                  <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                      <i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                      <li><a href="#">Settings 1</a>
                                      </li>
                                      <li><a href="#">Settings 2</a>
                                      </li>
                                    </ul>
                                  </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                  </ul>
                                  <div class="clearfix"></div>
                                </div>
                            <form action="{{url('advvaccineforpatientupdatedoc', $patient->id)}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate style="margin: auto">
                            @csrf
                            <div class="form-group">
                              <div width="80%" height="90">
                                <br>
                                <br>
                              <table id="vaccines_list" style="background-color: white">
                                <tr>
                                <th>Vaccine Names</th>
                                @foreach ($v_timings as $key)
                                  <th>{{ $key }}</th>
                                @endforeach
                                </tr>
                                <tr>
                                  @foreach ($advvaccines as $advvaccine)
                                    <tr>
                                      <td>{{ $advvaccine->vname }}</td>
                                      <?php
                                      //finding all vaccines_timings of current vaccine i.e $advvaccine
                                      $advvaccinetimings = AdvVaccineTiming::where('v_id', $advvaccine->id)->get();
                                        $temp[] = '';
                                        $boosters_vtid = '';
                                        $vid = '';
                                        $check_booster = '';
                                        $check = '';
                                        $b_rows = 2;
                                        foreach ($advvaccinetimings as $advvaccinetiming) {
                                            //getting vaccine_timing value
                                            $i++;
                                            $popup_id = $i;
                                            $vt = $advvaccinetiming->vtiming;
                                            $vid = $advvaccine->id;
                                            $vtid = $advvaccinetiming->id;
                                            $items[] = $vt;
                                            $vaccine = AdvVaccine::find($vid);
                                            $cur_doctor = Doctor::find($vaccine->doc_id);
                                          ?>
                                          @if ($advvaccinetiming->vt_type == 'Dosage')
                                            @foreach ($vaccinationhistories as $vaccinationhistory)
                                              @if ($advvaccinetiming->id == $vaccinationhistory->vt_id && $vaccinationhistory->status == 'TRUE')
                                                <?php $check = 'TRUE'; ?>
                                              @endif
                                            @endforeach
                                            <td>
                                              <div>
                                                <input type="checkbox" value="{{$vtid}}" name="vchecks[]" @if ($check == 'TRUE') ? checked : '' @endif  class="form-control col-md-7 col-xs-12">
                                                <div class="popup" onclick="myFunction({{$i}})" style="margin-top: 5px; padding-left: 5px; padding-right: 5px; background-color: gray; color: white"><i>?</i>
                                                <span class="popuptext" id="{{$i}}"><p><i>Vaccine Timing ID: {{$advvaccinetiming->id}}</i><br><i>Vaccine Name:</i><br> {{$vaccine->vname}}<br><i>Vaccine Timing:</i><br> {{$vt}} Months<br><i>Doctor Name:</i><br> {{$cur_doctor->dname}}<br><i>Patient Name:</i><br> {{$patient->fname}} {{$patient->lname}}</p></span>
                                              </div>
                                            </div>
                                            </td>
                                          <?php $check = ''; ?>
                                          @else
                                          <?php
                                          $check = '';
                                          $check_booster = '';
                                          $boosters_vtid = $vtid;
                                          ?>
                                          <td></td>
                                          @endif
                                        <?php
                                        }
                                        for ($k = 0; $k<(count($v_timings)-count($advvaccinetimings)-2); $k++) {
                                          //create empty rows for all the remaining columns
                                          echo "<td></td>";
                                        }
                                        unset($items);
                                        unset($timings);
                                        unset($temp);
                                        unset($vtid);
                                        unset($boosters_vtid);
                                        //foreach for boosters
                                        foreach ($advvaccinetimings as $advvaccinetiming) {
                                            //getting vaccine_timing value for boosters
                                            $i++;
                                            $popup_id = $i;
                                            $vt = $advvaccinetiming->vtiming;
                                            $vid = $advvaccine->id;
                                            $vtid = $advvaccinetiming->id;
                                            $items[] = $vt;
                                            $vaccine = AdvVaccine::find($vid);
                                            $cur_doctor = Doctor::find($vaccine->doc_id);
                                          ?>
                                          @if ($advvaccinetiming->vt_type == 'Booster')
                                            @foreach ($vaccinationhistories as $vaccinationhistory)
                                            <!--check if $vaccinationhistory has that id-->
                                              @if ($advvaccinetiming->id == $vaccinationhistory->vt_id && $vaccinationhistory->status == 'TRUE')
                                              <!--if it has change the status to TRUE-->
                                              <?php $check_booster = 'TRUE'; ?>
                                              @endif
                                            @endforeach
                                          <td>
                                            <div>
                                              <input type="checkbox" value="{{$vtid}}" name="vchecks[]" @if ($check_booster == 'TRUE') ? checked : '' @endif class="form-control col-md-7 col-xs-12">
                                              <div class="popup" onclick="myFunction({{$i}})" style="margin-top: 5px; padding-left: 5px; padding-right: 5px; background-color: gray; color: white"><i>?</i>
                                              <span class="popuptext" id="{{$i}}"><p><i>Vaccine Type:</i><br> {{$advvaccinetiming->vt_type}}<br><i>Vaccine Name:</i><br> {{$vaccine->vname}}<br><i>Vaccine Timing:</i><br> {{$vt}} Months<br><i>Doctor Name:</i><br> {{$cur_doctor->dname}}<br><i>Patient Name:</i><br> {{$patient->fname}} {{$patient->lname}}</p></span>
                                            </div>
                                          </div>
                                          </td>
                                          <?php
                                          //clear the status for next iteration
                                          $check_booster = '';
                                          $b_rows--;
                                          //booster row exists so --
                                          ?>
                                          @endif
                                        <?php
                                        }
                                        for ($t = 0; $t<$b_rows; $t++) {
                                          //create empty rows for all the remaining booster columns
                                          echo "<td></td>";
                                        }
                                        unset($items);
                                        unset($timings);
                                        unset($temp);
                                        unset($vtid);
                                        unset($boosters_vtid);
                                      ?>
                                    </tr>
                                  @endforeach
                              <table>
                            </div>
                          </div>
                        </div>
                      </div>
                              <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                  <button type="submit" name="submit" class="btn btn-primary" style="border-color: white; border-width: 3px; padding: 10px 25px 10px 25px">Update</button>
                                </div>
                              </div>
                            </form>
                          </body>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
<script>
// When the user clicks on div, open the popup
  function myFunction(c_id) {
    for ($j=0; $j<100; $j++){
      if(c_id == $j) {
        var popup = document.getElementById($j);
        popup.classList.toggle("show");
      }
    }
  }
  function close_window() {
      close();
  }
</script>

@endsection

@if(!Session::has('recep_name_session'))
<script>window.location = "welcome";</script>
@endif

@extends ('recep-main-layout.default')

@section('content')

<?php
use App\AdvVaccineTiming;
use App\Doctor;
use App\AdvCenter;
use App\AdvVaccine;
use App\Patient;
use App\VaccinationHistory;
$i = 0;
?>
<script>
  function current_date () {
    var result = new Date();
    return formatedate(result);
  }
  function formatedate(result) {
    var dd = result.getDate();
    var mm = result.getMonth() + 1;
    var y = result.getFullYear();
    return (mm + '-'+ dd + '-'+ y);
  }
</script>
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
img {
  border-radius: 50%;
  display: block;
  margin: 0 auto;
}
.vform input[type=number], select {
  width: 100%;
  padding: 8px 20px;
  margin: 0px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
.test {
  float: right;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/schedule-btn-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/searchbox-for-recep-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/card-for-recep-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/card-for-recep-pvh-details-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/split-screen-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/checkbox-etc-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/searchbox-for-recep-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/table-for-recep-vacc-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/recep-popup-vacc-history-css.css') }}" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

<div class="right_col" role="main" style="background-color: white;">
  <br><br><br>
  <div class="card" style="width: 100%; padding-left: 15px; text-align: left; display: inline-block">
       <b>Patient ID: </b> {{$patient->id}}&nbsp;&nbsp;&nbsp;&nbsp;
       <b>Name: </b> {{$patient->fname}} {{$patient->lname}}&nbsp;&nbsp;&nbsp;&nbsp;
       <b>Age: </b> {{$patient->age}}&nbsp;&nbsp;&nbsp;&nbsp;
       <b>DOB: </b> {{$patient->dob}}&nbsp;&nbsp;&nbsp;&nbsp;
       <b>Gender: </b> {{$patient->gender}}&nbsp;&nbsp;&nbsp;&nbsp;
       <b>Guard No: </b> {{$patient->guard_no}}&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="button" class='btn btn-succes' onclick="schedulingpatient()" value="Reschedule" style="float: right">
       <input type="button" class='btn' onclick="editingpatient()" style="background-color: gray; color: white; float: right" value="Edit">
       @foreach($schedules as $schedule)
         <b>{{$schedule->type}}: </b>{{$schedule->date}}&nbsp;&nbsp;&nbsp;
       @endforeach
  </div>
  <!-- The Modal -->
    <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <div id="pat_vacc_histories1">
        <form action="{{url('recep_advvaccineforpatientupdate', $patient->id)}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
          @csrf
          <table id="vaccines_list_recep"  style="width: 100%; height: 100%;">
            <tr>
            <th>Vaccines</th>
            @foreach ($v_timings as $key)
                <th>{{ $key }}</th>
            @endforeach
            </tr>
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
                  echo "<br>";
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
                  echo "<br>";
                  unset($items);
                  unset($timings);
                  unset($temp);
                  unset($vtid);
                  unset($boosters_vtid);
                ?>
              </tr>
            @endforeach
          </table>
          <br>
            <button type="submit" name="submit" class="btn btn-success">Update</button>
        </form>
      </div>
    </div>
</div>

   <div class="split left card-left" style="width: 69.3%;">
     <div class="clearfix"></div>
              <div class="row">
               <div class="row" style="font-size: 11px">
                 <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="x_panel">
                     <div class="x_title">
                        <b><small>PATIENT'S DETAILS</small></b>
                       <div class="clearfix"></div>
                    </div>
                       <h2 class='btn btn-success' onclick="ShowVisitHistories()">Visit Histories</h2>
                       <h2 class='btn btn-success' id="myBtn" onclick="ShowVaccinationHistories()">Vaccinations</h2>
                       <h2 class='btn btn-success' onclick="ShowMedicalHistories()">Medical History</h2>
                    </div>
                  </div>
                 </div>
                 <div id="pat_v_histories"></div>
                 <div id="pat_v_history_details" class="">
                   <div id="pat_v_history_detail_left">
                     <div id="pat_v_history_icons"></div>
                  </div>
                  <div id="pat_v_history_detail_right">
                    <div id="pat_v_history_icons_right"></div>
                 </div>
               </div>
              <div class="col-md-6 col-sm-6 col-xs-1" style="text-align:left; font-size: 13px;">
                <!--medical histories-->
                  <div class="row" id="med_histories" style="display: none; background-color: white; padding: 5px">
                       <!--OFF-DAYS FORM
                               <form action="{{ url ('recep_updatemedicalhistory', $patient->id) }}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                @csrf
                                -->
                                <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12" style="text-align:left; font-size: 13px; padding-left: 30px">
                                      @foreach ($med_histories as $med_history)
                                        <input type="hidden" id="mid" name="mid[]" value="{{$med_history->id}}">
                                        <input type="hidden" id="status" name="prev_status[]" value="{{$med_history->id}}">
                                        <input type="checkbox" style="padding-right: 20px" id="status" name="status[]" value="{{$med_history->id}}" @if ($med_history->status == 'TRUE') ? checked : '' @endif class="largerCheckbox">
                                        <input type="hidden" id="dname" name="dname" value="{{$med_history->dname}}" class=" "><b> {{$med_history->dname}} : </b>
                                        <input type="hidden" id="disease_desc" name="disease_desc"  value="{{$med_history->disease_desc}}" class=" "> {{$med_history->disease_desc}}
                                        <br>
                                      @endforeach
                                  </div>
                                </div>
                                <!--end offdays-->
                                <!--
                                <div class="form-group">
                                  <div class=" ">
                                    <button type="submit" name="submit" class="btn btn-success">Update</button>
                                  </div>
                                </div>
                              </form>
                              <button class="btn" onclick="addmorehistories()">Add More Medical Histories</button>
                              <!--
                                <button style="float: right" class="btn btn-success" onclick="editvaccinationhistory()">Edit Vaccination History</button>
                              -->
                          </div>
                          <!--med his end-->
                        </div>
                      </div>
                    </div>

   <div class="split right card-right" style="width: 30%;">
     <div class="clearfix"></div>
               <div class="row" style="font-size: 12px">
                 <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="x_panel">
                     <div class="x_title">
                       <b><small>Add Patient's Visit</small></b>
                          <div class="clearfix"></div>
                       </div>
                       <div class="x_content">
                      <!--
                      <form action="{{url('addingpatientvh/' . $patient->id)}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      -->
                      <div id="demo-form2" data-parsley-validate class="form-horizontal vform">
                        @csrf
                        <!--pat-visit-details-->
                        <div class="form-group">
                          <div class="">
                            <input type="number" id="head_size" name="head_size" required="required" placeholder="Head Size *" class=" ">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="">
                            <input type="number" id="length" name="length" required="required" placeholder="Length in m *" class=" ">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="">
                            <input type="number" id="weight" name="weight" required="required" placeholder="Weight in kg *" class=" ">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="">
                            <input type="number" id="temperature" name="temperature" placeholder="Temperature in C" class=" ">
                          </div>
                        </div>
                        <div class="form-group">
                          <div>
                              <select id="v_type" class=" ">
                                <option value="Checkup">Checkup</option>
                                <option value="Vaccination">Vaccination</option>
                                <option value="Checkup & Vaccination">Checkup & Vaccination</option>
                                <option value="Video Consultation">Video Consultation</option>
                              </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" name="submit" class="btn btn-success" onclick="SchedulePatVisitStore()">Submit</button>
                          </div>
                        </div>
                      <!--
                      </form>
                      -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
  <footer>
    <div class="pull-right" id="footer">
      Hospital Management System <a href="#">Visit Our Site</a>
    </div>
    <div class="clearfix"></div>
  </footer>
<script>
function addmorehistories() {
  window.location = "{{url('addmedicalhistory/' . $patient->id)}}";
}
function editvaccinationhistory() {
  window.location = "{{url('editvaccinationhistory/' . $patient->id)}}";
}
// When the user clicks on div, open the popup
function myFunction(c_id) {
    for ($j=0; $j<100; $j++){
      if(c_id == $j) {
        var popup = document.getElementById($j);
        popup.classList.toggle("show");
      }
    }
  }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function schedulingpatient() {
  window.location = "{{url('schedulingpatient/' . $patient->id)}}";
}

function editingpatient() {
  window.location = "{{url('editingpatient/' . $patient->id)}}";
}

function SchedulePatVisitStore() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var head_size = $('#head_size').val();
  var length = $('#length').val();
  var weight = $('#weight').val();
  var temperature = $('#temperature').val();
  var v_type = $('#v_type').val();
  //if(temperature==null){
//    temperature = "_";
//  }
  var date = current_date();

  //console.log(head_size + " " + length + " " + weight + " " + temperature + " " + date);
  $.ajax({
    type:'POST',
    url:"{{url('addingpatientvh/'.$patient->id)}}",
    data: {
      head_size: head_size,
      length: length,
      weight: weight,
      temperature: temperature,
      "other": v_type,
      date: date,
   },
      success:function(data) {
        alert("Patient visit added successfully!");
        location.reload();
      }
  });
}

function ShowVisitHistories() {
  $('#pat_v_histories').css("display","block");
  $('#pat_v_history_detail_left').css("display","block");
  $('#med_histories').css("display","none");
  $('#pat_vacc_histories').css("display","none");
  $('#footer').css("display","block");
   $.ajaxSetup({
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
       });
       $.ajax({
       url: "{{url('vh_patient/'.$patient->id)}}",
       type: 'get',
       dataType: 'json',
       success: function(response) {
       var len = 0;
       var json = '';
       if (response['data'] != null) {
         len = response['data'].length;
         json = response['data'];
         }
       if(len > 0) {
         let p_list_left = $("#pat_v_histories");
         p_list_left.empty();
         $.each(json, function (key, entry) {
           p_list_left = p_list_left.append($('<h5></h5>').attr('id', entry.id).attr('value', entry.date).text(entry.date))
          })
        }
       }
       });
    }

    $(document).on("click","#pat_v_histories", function (event) {
        console.log("vh_id " + event.target.id);
        let vh_id = event.target.id;
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
        url: "{{url('specific_vh_patient')}}"+'/'+vh_id,
        type: 'get',
        dataType: 'json',
        success: function(response) {
        var len = 0;
        var json = '';
        if (response['data'] != null) {
          len = response['data'].length;
          json = response['data'];
          console.log(json);
         }
        if (len > 0) {
          let p_list = $("#pat_v_history_details");
          //p_list.empty();
          //p_list = $("#pat_v_history_details").attr("class", "card-pvhd");
          //$("#pat_v_history_detail_left").attr('class',"material-icons print");
          let p_list_left = $("#pat_v_history_detail_left");
          p_list_left.empty();
          p_list_left = $("#pat_v_history_detail_left").attr("class", "split left");
          p_list_left = p_list_left.append($('<h5></h5>').text("Visit Date: " + json.date).css('text-align','left').css('margin-left', '25px'))
          p_list_left = p_list_left.append($('<h5></h5>').text("Head Size: " + json.head_size).css('text-align','left').css('margin-left', '25px'))
          p_list_left = p_list_left.append($('<h5></h5>').text("Length: " + json.length).css('text-align','left').css('margin-left', '25px'))
          p_list_left = p_list_left.append($('<h5></h5>').text("Weight: " + json.weight).css('text-align','left').css('margin-left', '25px'))
          p_list_left = p_list_left.append($('<h5></h5>').text("Temperature: " + json.temperature).css('text-align','left').css('margin-left', '25px'))
          p_list_left = p_list_left.append($('<i></i>').attr("class", "material-icons txtsms print email").css('float','left').css('padding','5px').text("txtsms "+"print "+"email "))

          let p_list_right = $("#pat_v_history_detail_right");
          p_list_right.empty();
          //$("#pat_v_history_detail_left").attr('class',"material-icons print");
          p_list_right = $("#pat_v_history_detail_right").attr("class", "split right")
          p_list_right = p_list_right.append($('<h5></h5>').text("Medicines Suggested:").css('font-style','bold'))

          }
        }
      });
    });

function ShowMedicalHistories() {
  $('#pat_v_histories').css("display","none");
  $('#pat_v_history_detail_left').css("display","none");
  $('#pat_v_history_detail_right').css("display","none");
  $('#med_histories').css("display","block");
  $('#pat_vacc_histories').css("display","none");
  $('#footer').css("display","block");
}

function ShowVaccinationHistories() {
  $('#pat_v_histories').css("display","none");
  $('#pat_v_history_detail_left').css("display","none");
  $('#pat_v_history_detail_right').css("display","none");
  $('#med_histories').css("display","none");
  $('#pat_vacc_histories').css("display","block");
  $('#footer').css("display","none");
}

// Get the modal
var modal = document.getElementById("\myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

@endsection

@if(!Session::has('doctor_name_session'))
<script>window.location = "welcome";</script>
@endif

@extends('doctorlayout.default')

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
  #buttons {
    width:1000%;
    bottom: 0px;
  }
  #note {
    width:100%;
    bottom: 10px;
}
#list-item {
  border: 1px solid gray;
  line-height: normal;
  border: none;
  margin: auto;
  margin-bottom: 7px;
  padding: 5px 5px;
  vertical-align: middle;
  width: 100%;
  text-decoration: none;
  display: inline-block;
  text-align: left;
  font-size: 13px;
  display: flex;
  align-items: center;
}
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/card-doc-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/textarea-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/schedule-btn-css.css') }}" />
<link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
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

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="" class="site_title"> <span style="font-family: Impact; font-size: 17px">Hospital Management System</span></a>
          </div>
          <div class="clearfix"></div>

<!-- menu profile quick info -->
<div class="profile clearfix">
  <div class="profile_pic">
    <img src="{{url('public/gentelella-master/production/images/img.jpg')}}" alt="..." class="img-circle profile_img">
  </div>
  <div class="profile_info" style="margin-bottom: 15px">
   <span>Welcome,</span>
    <h2>Dear {{session('doctor_name_session')}}</h2>
  </div>
</div>
    <!-- /menu profile quick info -->
  <br/>

  <!--side mav-->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu" style="color: white; padding: 5px; margin: 3px">
<div class="menu_section">

      </div>
    </div>
  </div>
</div>
<!--main page-->

<div class="right_col" role="main" style="background-color: white;">
    <br><br><br>
    <div class="card" style="width: 100%; padding-left: 15px; text-align: left; display: inline-block">
      @if (empty($currentpatient->id))
      <b>Patient-ID: </b> <a id="pid"></a>&nbsp;&nbsp;&nbsp;&nbsp;
      @else
      <b>Patient-ID: </b> <a id="pid">{{$currentpatient->id}}</a>&nbsp;&nbsp;&nbsp;&nbsp;
      @endif
       <b>Name: </b> <a id="pfn">@if (empty($currentpatient->fname))@else{{$currentpatient->fname}}@endif</a> <a id="pln">@if (empty($currentpatient->lname))@else{{$currentpatient->lname}}@endif</a>&nbsp;&nbsp;&nbsp;&nbsp;
       <b>Age: </b> <a id="p_age">@if (empty($currentpatient->age))@else{{$currentpatient->age}}@endif</a> &nbsp;&nbsp;&nbsp;&nbsp;
       <b>DOB: </b> <a id="pdob">@if (empty($currentpatient->dob))@else{{$currentpatient->dob}}@endif</a>&nbsp;&nbsp;&nbsp;&nbsp;
       <b>Guard No: </b> <a id="pguard_no">@if (empty($currentpatient->guard_no))@else{{$currentpatient->guard_no}}@endif</a>&nbsp;&nbsp;&nbsp;&nbsp;
       <br>
       <b>Head Size: </b> <a id="head_size">@if (empty($cur_pat_vh->head_size))@else{{$cur_pat_vh->head_size}}@endif</a>&nbsp;&nbsp;&nbsp;&nbsp;
       <b>Weight: </b> <a id="weight">@if (empty($cur_pat_vh->weight))@else{{$cur_pat_vh->weight}}@endif</a>&nbsp;&nbsp;&nbsp;&nbsp;
       <b>Length: </b> <a id="length">@if (empty($cur_pat_vh->length))@else{{$cur_pat_vh->length}}@endif</a>&nbsp;&nbsp;&nbsp;&nbsp;
       <b>Temperature: </b> <a id="temp">@if (empty($cur_pat_vh->temp))@else{{$cur_pat_vh->temp}}@endif</a>&nbsp;&nbsp;&nbsp;&nbsp;
       <b>Visit Type: </b> <a id="v_type">@if (empty($cur_pat_vh->other))@else{{$cur_pat_vh->other}}@endif</a>&nbsp;&nbsp;&nbsp;&nbsp;
       <b>Date: </b> <a id="date">@if (empty($cur_pat_vh->date))@else{{$cur_pat_vh->date}}@endif</a>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>

    <div class="split left card-left" style="width: 30%;">
      <div class="clearfix"></div>
               <div class="row">
                <div class="row" style="font-size: 11px">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <b><small>PATIENTS LIST</small></b>
                      <div class="clearfix"></div>
                     </div>
                     <b><small><i class="material-icons refresh"><a href="{{url('TodocMainPage/' . $patient->id)}}" >refresh</a></i></small></b>
                       <div>
                          @foreach ($patients as $patient)
                           <span id="list-item"><i class="material-icons video_call">video_call</i><a style="margin-left: 10px;" onclick="patientselected('{{$patient->id}}','{{$patient->fname}}','{{$patient->lname}}','{{$patient->age}}','{{$patient->dob}}','{{$patient->guard_no}}')">{{$patient->fname}} {{$patient->lname}}</a></span>
                         @endforeach
                       </div>
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
                                 <!--offdays-->
                                 <div class="form-group">
                                   <div class="col-md-6 col-sm-6 col-xs-12" style="text-align:left; font-size: 13px; padding-left: 30px">

                                   </div>
                                 </div>
                               </div>
                           <!--med his end-->
                         </div>
                       </div>
                     </div>

    <div class="split right card-right" style="width: 69.3%;">
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

<div style="margin: 20px">
      <!--<label>Search Medicine: </label>
      <input id="med_name" style="border-color: gray; border-radius: 25px; padding: 12px" type="text" size="30" onkeyup="showResult(this.value)">-->
      <select id="selectmed" name="selectmed" style="margin: 10px">
        @foreach($medicines as $med)
          <option value="{{$med->id}}">{{$med->name}}</option>
        @endforeach
      </select>
      <select id="system" style="display: none; margin: 10px"></select>
      <a onclick="searchmedicine()" name="" class='btn' style="background-color: gray; color: white; margin: 10px">Search</a>
      <div id="livesearch"></div>
    </form>
  </div>
    <div id="pat_v_histories" style="display: none"></div>
      <div id="pat_v_history_details" class="">
        <div id="pat_v_history_detail_left">
          <div id="pat_v_history_icons"></div>
       </div>
       <div id="pat_v_history_detail_right">
         <div id="pat_v_history_icons_right"></div>
      </div>
    </div>
  </div>

<footer>
  <div id="note">
  <!--<form action="/action_page.php">-->
    <label for="note">Note:</label>
      <textarea id="docnote" placeholder="(if any)..." cols="30" rows="5"></textarea>
    <br><br>
    <!--
    <input type="submit" value="Submit">
  </form>
  -->
</div>

  <div class="form-group" style="float: left">
    <a onclick="patientsdatajson()" id="1days" name="1days" class='ph-button ph-btn-blue'>Growth</a>
    <a onclick="editvaccinationhistory()" name="7days" class='ph-button ph-btn-blue'>Vaccination</a>
    <a onclick="displayBlockVisitHistories()" id="15days" name="15days" class='ph-button ph-btn-blue'>Visit History</a>
    <a onclick="addDays(30)" id="30days" name="30days" class='ph-button ph-btn-blue'>Medical Guideline</a>
    <a onclick="FinalVisitHistoryStore()" id="30days" name="30days" class='ph-button ph-btn-green'>Save</a>
  </div>

  <div class="clearfix"></div>
  <div class="pull-right">
    Hospital Management System <a href="#">Visit Our Site</a>
  </div>
  <div class="clearfix"></div>
</footer>
<script>

  function searchmedicine() {
    var med_id = $("#selectmed").val();
    var pat_id = $("#pid").val();

    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
        url: "{{url('searchmedicine')}}"+'/'+med_id,
        type: 'get',
        dataType: 'json',
        success: function(response) {
        var len = 0;
        var json = '';
        console.log(response);
        if (response['data'] != null) {
          len = response['data'].length;
          json = response['data'];
          }
        if(len > 0) {
            console.log(json);
            $('#system').css('display', 'block');
            $('#system').append(json.map(function(sObj){
                return '<option id="'+sObj.id+'">'+ sObj.dosage +'</option>'
            }));
          }
        }
      });
  }

  function patientselected(pid, pfn, pln, p_age, pdob, pguard_no) {
    $('#pat_v_histories').css("display","none");
    $('#pat_v_history_detail_left').css("display","none");
    let p_list_left = $("#pat_v_histories");
    let p_list_left_details = $("#pat_v_history_detail_left");
    let p_list_right = $("#pat_v_history_detail_right");
    p_list_right.empty();
    p_list_left.empty();
    p_list_left_details.empty();
    $("#pid").text(pid);
    $("#pfn").text(pfn);
    $("#pln").text(pln);
    $("#p_age").text(p_age);
    $("#pdob").text(pdob);
    $("#pguard_no").text(pguard_no);
     $.ajaxSetup({
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
         });
         $.ajax({
         url: "{{url('vh_and_patient')}}"+'/'+pid,
         type: 'get',
         dataType: 'json',
         success: function(response) {
         var len = 0;
         var json = '';
         console.log(response);
         if (response['data'] != null) {
           len = response['data'].length;
           json = response['data'];
           }
         if(len > 0) {
             //console.log(json.head_size);
             $("#head_size").text(json.head_size);
             $("#length").text(json.length);
             $("#weight").text(json.weight);
             $("#temp").text(json.temperature);
             $("#v_type").text(json.other);
             $("#date").text(json.date);
             ShowVisitHistories(pid);
           }
         }
       });
  }

  function displayBlockVisitHistories() {
    $('#pat_v_histories').css("display","block");
    $('#pat_v_history_detail_left').css("display","block");
  }

  function ShowVisitHistories(pid) {
    //$('#pat_v_histories').css("display","block");
    //$('#pat_v_history_detail_left').css("display","block");
    $('#med_histories').css("display","none");
    $('#pat_vacc_histories').css("display","none");
    $('#footer').css("display","block");

     $.ajaxSetup({
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
         });
         $.ajax({
         url: "{{url('vh_patient')}}"+'/'+pid,
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

    function patientsdatajson() {
       $.ajaxSetup({
             headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
           });
           $.ajax({
           url: "{{url('patientsdatajson')}}",
           type: 'get',
           dataType: 'json',
           success: function(response) {
           var len = 0;
           //console.log(len);
           var json = '';
           console.log(response);
           if (response['data'] != null) {
             len = response['data'].length;
             console.log(len);
               json = response['data'];
             }
           if(len > 0) {
               //console.log(json.head_size);
               console.log(len);
                 //json.forEach(function(post) {
                    // do something
                  //  console.log(post);
                 //});
             }
           }
         });
    }
//from recep
function addmorehistories() {
  window.location = "{{url('addmedicalhistory/' . $patient->id)}}";
}
function editvaccinationhistory() {
  if($("#pid").text()){
    window.location = "{{url('editvaccinationhistorydoc')}}"+'/'+$("#pid").text();
  }
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
var modal = document.getElementById("myModal");

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


function FinalVisitHistoryStore() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var pid = $('#pid').text();
  var head_size = $('#head_size').text();
  var length = $('#length').text();
  var weight = $('#weight').text();
  if($('#temperature').text()) {
    var temperature = $('#temperature').text();
  } else {
    var temperature = "_";
  }
  var v_type = $('#v_type').text();
  var medicine = $('#selectmed').val();
  var dosage = $('#system').val();
  if ($('#docnote').val()) {
    var note = $('#docnote').val();
  } else {
    var note = "_";
  }
  //if(temperature==null){
//    temperature = "_";
//  }
  var date = $('#date').text();
  console.log(dosage);

  //console.log(head_size + " " + length + " " + weight + " " + temperature + " " + date);
  $.ajax({
    type:'POST',
    url:"{{url('finalvisithistorystore')}}",
    data: {
      patient_id: pid,
      date: date,
      head_size: head_size,
      length: length,
      weight: weight,
      temperature: temperature,
      v_type: v_type,
      medicine: medicine,
      dosage: dosage,
      note: note,
   },
      success:function(data) {
        alert("Patient visit added successfully!");
        location.reload();
      }
  });
}

</script>

@endsection

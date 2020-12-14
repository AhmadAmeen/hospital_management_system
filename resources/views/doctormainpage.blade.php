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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="jquery.js" type="text/javascript"></script>
<script src="jquery.maskedinput.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="http://robinherbots.github.io/jquery.inputmask/javascripts/jquery.catcher.js" type="text/javascript"></script>
<script src="http://robinherbots.github.io/jquery.inputmask/javascripts/jquery.catcher.js"></script>
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<link href="/css/print.css" rel="stylesheet" media="print" type="text/css">

<script>
$(document).ready(function(){
  fetch_tvh_records();
  patient_fvh_record();
});

setInterval(function() {
    // do stuff
    fetch_tvh_records();
}, 1000);

setInterval(function() {
    // do stuff
    if ($('input[name="search_value"]').val().toLowerCase().length == 0) {
      $('.select-data').empty();
    }
}, 10);

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
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/doc-main-page-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/final-vh-table-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/card-doc-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/textarea-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/schedule-btn-css.css') }}" />
<link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/schedule-btn-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/med-input-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/searchbox-for-recep-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/card-for-recep-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/card-for-recep-pvh-details-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/split-screen-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/checkbox-etc-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/searchbox-for-recep-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/table-for-recep-vacc-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/doc-popup-growth-history-css.css') }}" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="right_col" role="main" style="background-color: white;">
    <br><br><br>
    <div class="card" style="width: 100%; padding-left: 15px; text-align: left; display: inline-block">
      @if (empty($currentpatient->id))
      <b>Patient-ID: </b> <a id="pid"></a>&nbsp;&nbsp;&nbsp;&nbsp;
      @else
      <b>Patient-ID: </b> <a id="pid">{{$currentpatient->id}}</a>&nbsp;&nbsp;&nbsp;&nbsp;
      @endif
       <b>Name: </b> <a id="pfn">@if (empty($currentpatient->fname))@else{{$currentpatient->fname}}@endif</a> <a id="pln">@if (empty($currentpatient->lname))@else{{$currentpatient->lname}}@endif</a>&nbsp;&nbsp;&nbsp;&nbsp;
       <a id="p_age" style="display:none"><b>Age: </b> @if (empty($currentpatient->age))@else{{$currentpatient->age}}@endif</a> &nbsp;&nbsp;&nbsp;&nbsp;
       <b>DOB: </b> <a id="pdob">@if (empty($currentpatient->dob))@else{{$currentpatient->dob}}@endif</a>&nbsp;&nbsp;&nbsp;&nbsp;
       <a style="display: none"><b>Gender: </b> <a id="pgender">@if (empty($currentpatient->gender))@else{{$currentpatient->gender}}@endif</a>&nbsp;&nbsp;&nbsp;&nbsp;</a>
       <a id="pguard_no" style="display:none"><b>Guard No: </b> @if (empty($currentpatient->guard_no))@else{{$currentpatient->guard_no}}@endif</a>&nbsp;&nbsp;&nbsp;&nbsp;
       <b>Head Size: </b> <a id="head_size">@if (empty($cur_pat_vh->head_size))@else{{$cur_pat_vh->head_size}}@endif</a>&nbsp;&nbsp;&nbsp;&nbsp;
       <b>Weight: </b> <a id="weight">@if (empty($cur_pat_vh->weight))@else{{$cur_pat_vh->weight}}@endif</a>&nbsp;&nbsp;&nbsp;&nbsp;
       <b>Length: </b> <a id="length">@if (empty($cur_pat_vh->length))@else{{$cur_pat_vh->length}}@endif</a>&nbsp;&nbsp;&nbsp;&nbsp;
       <a id="temp" style="display:none"><b>Temperature: </b> @if (empty($cur_pat_vh->temp))@else{{$cur_pat_vh->temp}}@endif</a>&nbsp;&nbsp;&nbsp;&nbsp;
       <a id="v_type" style="display:none"><b>Visit Type: </b> @if (empty($cur_pat_vh->other))@else{{$cur_pat_vh->other}}@endif</a>&nbsp;&nbsp;&nbsp;&nbsp;
       <a id="date" style="display:none"><b>Date: </b> @if (empty($cur_pat_vh->date))@else{{$cur_pat_vh->date}}@endif</a>&nbsp;&nbsp;&nbsp;&nbsp;
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
                         <!--
                         <b><small><i class="material-icons refresh"><a onclick="refreshpage()" >refresh</a></i></small></b>
                         -->
                        <div id="pat_list"></div>
                     </div>
                   </div>
                  </div>
                 </div>
                </div>
            <div class="split right card-right" style="width: 69.3%;">
              <div class="clearfix"></div>
                <div class="row" style="font-size: 12px;">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <b><small>PRESCRIPTION</small></b>
                           <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <!--
                          <input type="text" id="med" name="search_value" placeholder="Medicine..." class="med-input" style="width: 50%; padding: 7px; border-radius: 3px">
                            <input type="text" id="med" name="med" placeholder="Medicine" class="med-input" style="width: 40%; padding: 7px; border-radius: 3px">
                          -->
                              <div class="table-data">
                                <table>
                                  <tbody>
                                  </tbody>
                                </table>
                              </div>
                            <input id="autocomplete"  placeholder="Medicine..." class="med-input" style="width: 40%; padding: 9px; border-radius: 3px">
                            <input type="text" id="med" name="med" placeholder="--/--/--" class="med-input" style="width: 40%; padding: 9px; border-radius: 3px; margin-top: 10px;">
                            <a onclick="addmedicine()" class="btn btn-primary">Add</a>
                         </div>
                         <div></div>
                         <textarea  rows="8" id="med_added" style="margin:auto; width: 50%; margin-top: 10px"></textarea>
                       </div>
                     </div>
                     <div class="form-group" style="font-size: 12px">
                      <div id="added_med0"></div>
                     </div>
                     <textarea style="width: 30%; height: 10px; font-size: 12px" placeholder="Note..."></textarea>
                     <br><br>
                     <div class="form-group">
                       <a onclick="patient_fvh_record()" id="myBtn" name="1days" class='btn btn-primary'>Growth</a>
                       <a onclick="editvaccinationhistory()" name="7days" class='btn btn-primary'>Vaccination</a>
                       <a onclick="displayBlockVisitHistories()" id="15days" name="15days" class='btn btn-primary'>Visit History</a>
                       <a onclick="ShowMedicalHistories()" id="30days" name="30days" class='btn btn-primary'>Medical History</a>
                       <input type="button" class='btn btn-primary' onclick="docschedulingpatient()" value="Reschedule">
                       <a onclick="viewprint()" id="30days" name="30days" class='btn btn-primary'>Print</a>
                       <a onclick="FinalVisitHistoryStore()" id="30days" name="30days" class='btn btn-success'>Save</a>
                     </div>

                     <hr>
                     <!--visit histories-->
                     <div class="form-group" style="font-size: 12px;">
                       <div id="pat_v_histories"></div>
                       <div id="pat_v_history_details">
                         <div id="pat_v_history_detail_left">
                           <div id="pat_v_history_icons"></div>
                        </div>
                        <div id="pat_v_history_detail_right">
                          <div id="pat_v_history_icons_right"></div>
                       </div>
                     </div>
                   </div>
                   <!--med histories-->
                   <div class="form-group">
                     <!--medical histories-->
                       <div class="row" id="med_histories" style="display: none; background-color: white; padding: 5px; text-align: left; margin-left: 30px;">
                       </div>
                     <!--med his end-->
                   </div>
                   <div id="myModal" class="modal">
                     <!-- Modal content -->
                     <div class="modal-content">
                       <span class="close">&times;</span>
                        <!--growth histories-->
                          <!--growth histories-->
                          <div>
                            <table id="records_table" class="records_table", style="margin: auto;">
                            </table>
                          </div>
                        </div>
                      </div>
                     <!--growth his end-->
                   </div>
                  </div>
                 </div>
                </div>
             <!--ending right-->
             </div>
           </div>
         </div>

<script>

  function viewprint() {
    window.print();
  }

  $("#autocomplete" ).autocomplete({
    source: [ "Panadol 500", "Panadol 250", "Brofin", "Albuterol", "Cefdinir", "Cephalexin", "Fluticasone" ]
  });
</script>

<script>

//$("#ssn").mask("999-999-999");
  jQuery(function($){
     $("#med").mask("9/9/9/9/9/9/9/9/9",{placeholder:"-/-/-"});
});

  function patient_fvh_record() {
    $("#records_table").css("display", "block");
    $('#pat_v_histories').css("display","none");
    $('#pat_v_history_detail_left').css("display","none");
    $('#pat_v_history_detail_right').css("display","none");
    $('#med_histories').css("display","none");
    $('#pat_vacc_histories').css("display","none");
    var pid = $("#pid").text();
    console.log(pid);
    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
        url: "{{url('patient_fvh_record')}}"+'/'+pid,
        type: 'get',
        dataType: 'json',
        success: function(response) {
        var len = 0;
        var json = '';
        console.log(response);
        var trHTML = '';
        if (response['data'] != null) {
          len = response['data'].length;
          json = response['data'];
        }
        //$.each(response, function (i, item) {
            //trHTML += '<tr><td>' + item.date + '</td><td>' + item.length + '</td><td>' + item.weight + '</td><td>' + item.head_size + '</td></tr>';
        //});
        $('#records_table').empty();
        trHTML += '<table style="margin: auto">';
        trHTML += '<tr><th>' + "Month" + '</th><th>' + "Length" + '</th><th>' + "Weight" + '</th><th>' + "Head Size" + '</th></tr>';
        var dob = $("#pdob").text();
        var pat_dob = new Date(dob);
        console.log(dob);
        var i = 1;
        var months_arr = [];
        $.each(json, function (key, entry) {
          var visit_date = new Date(entry.date);
          var m = pat_dob.getMonth() - visit_date.getMonth();
          months_arr.push(m);
        })
        console.log(months_arr);
        var months_added = [];
        $.each(json, function (key, entry) {
          for (var i = 1; i <= 6; i++) {
            var visit_date = new Date(entry.date);
            var m = pat_dob.getMonth() - visit_date.getMonth();
            if (!months_arr.includes(i) && !months_added.includes(i)) {
              //trHTML += '<tr><td>' + "Month " + i + '</td><td>' + "_" + '</td><td>' + "_" + '</td><td>' + "_" + '</td></tr>';
              months_added.push(i);
            }
            if (m == i && length < 0.5) {
              trHTML += '<tr style="color: green"><td>' + "Month " + i + '</td><td>' + entry.length + '</td><td>' + entry.weight + '</td><td>' + entry.head_size + '</td></tr>';
            } else if (m == i && length < 0.9) {
              trHTML += '<tr style="color: green"><td>' + "Month " + i + '</td><td>' + entry.length + '</td><td>' + entry.weight + '</td><td>' + entry.head_size + '</td></tr>';
            } else if (m == i && length < 1.1) {
              trHTML += '<tr style="color: green"><td>' + "Month " + i + '</td><td>' + entry.length + '</td><td>' + entry.weight + '</td><td>' + entry.head_size + '</td></tr>';
            } else if (m == i && length < 1.2) {
              trHTML += '<tr style="color: green"><td>' + "Month " + i + '</td><td>' + entry.length + '</td><td>' + entry.weight + '</td><td>' + entry.head_size + '</td></tr>';
            } else if (m == i && length < 1.5) {
              trHTML += '<tr style="color: green"><td>' + "Month " + i + '</td><td>' + entry.length + '</td><td>' + entry.weight + '</td><td>' + entry.head_size + '</td></tr>';
            } else if (m == i && length < 1.9) {
              trHTML += '<tr style="color: green"><td>' + "Month " + i + '</td><td>' + entry.length + '</td><td>' + entry.weight + '</td><td>' + entry.head_size + '</td></tr>';
            } else {
              //trHTML += '<tr style="color: red"><td>' + "Month " + i + '</td><td>' + entry.length + '</td><td>' + entry.weight + '</td><td>' + entry.head_size + '</td></tr>';
            }
          }
        })
        trHTML += '</table>';
        $('#records_table').append(trHTML);
      }
    });
  }

  function fetch_tvh_records() {
    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
        url: "{{url('fetch_tvh_records')}}",
        type: 'get',
        dataType: 'json',
        success: function(response) {
        var len = 0;
        var json = '';
        //console.log(response);
        if (response['data'] != null) {
          len = response['data'].length;
          json = response['data'];
        }
        if(len > 0) {
          //console.log(json);
          let pat_list = $("#pat_list");
          pat_list.empty();
          var html;
          $.each(json, function (key, entry) {
            //console.log(json);
            //pat_list = pat_list.html("<span style='font-weight:bold;'>" + entry.fname + "</span>");
            if(entry.other == "Video Consultation") {
              pat_list = pat_list.append($('<i></i>').css("display", "inline-block").css("float", "right").attr("class", "material-icons videocam").text("videocam"))
            } else if(entry.other == "Checkup") {
              pat_list = pat_list.append($('<i></i>').css("display", "flex").css("float", "right").attr("class", "material-icons local_hospital").text("local_hospital"))
            }  else if(entry.other == "Vaccination") {
              pat_list = pat_list.append($('<i></i>').css("display", "flex").css("float", "right").attr("class", "material-icons coronavirus").text("coronavirus"))
            }  else if(entry.other == "Checkup & Vaccination") {
              pat_list = pat_list.append($('<i></i>').css("display", "flex").css("float", "right").attr("class", "material-icons local_hospital coronavirus").text("local_hospital coronavirus"))
            } else {

            }
            pat_list = pat_list.append($('<h5></h5>').css("display", "inline-block").css("float", "left").click(function(){ patientselected(entry.patient_id,entry.fname,entry.lname,entry.age,entry.gender,entry.dob,entry.guard_no); }).attr('id', entry.id).text(entry.fname + " " + entry.lname))
            //now getting type of this patient
            //pat_list = pat_list.append($('<hr>').css("height", 0))
            pat_list = pat_list.append($('<br>'))
            pat_list = pat_list.append($('<hr>'))
          }
          //$("#pat_list").html(html);
        )
         }
       }
      });
     }

  function getTypeOfVisit(pid) {
    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
        url: "{{url('getTypeOfVisit')}}"+'/'+pid,
        type: 'get',
        dataType: 'json',
        success: function(response) {
        var len = 0;
        var json = '';
        if (response['data'] != null) {
            json=response['data'];
            //console.log(json.other);
            return json.other;
          }
        }
      });
  }

  function patientselected(pid, pfn, pln, p_age, gender, pdob, pguard_no) {
    let added_med = $("#added_med");
    added_med.empty();
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
    $("#gender").text(gender);
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
         //console.log(response);
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
             getMedicalHistories(pid);
             patient_fvh_record();
          }
         }
       });
  }

  function addmedicine() {
    var med = $('#autocomplete').val();
    var dosage = $('#med').val();
    var meds = $("#med_added").text();
    let med_added = $("#med_added").text(meds + " "+ med+" "+dosage + "\n");
    //med_added = med_added.append($('<h5></h5>').attr('id', med_added).attr('value', med).text("Name: "+med+" Dosage: "+dosage))
    /*added_med.empty();
    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
        url: "{{url('getmedicinename')}}"+'/'+med_id,
        type: 'get',
        dataType: 'json',
        success: function(response) {
        var len = 0;
        var json = '';
        if (response['data'] != null) {
            len = response['data'].length;
            json = response['data'];
            let added_med = $("#added_med");
            added_med = added_med.append($('<h5></h5>').attr('id', added_med).attr('value', json.id).text("Name: "+json.name+" Dosage: "+dosage))
          }
        }
      });
      */
  }

  function searchmedicinepot() {
    var med_id = $("#selectmed").val();
    var pat_id = $("#pid").val();
    $('#addMed').css('display', 'block');
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
        //console.log(response);
        if (response['data'] != null) {
          len = response['data'].length;
          json = response['data'];
          }
        if(len > 0) {
            //console.log(json);
            $('#system').css('display', 'block');
            //$('#system').empty();
            $('#system').append(json.map(function(sObj){
              return '<option id="'+sObj.id+'">'+ sObj.dosage +'</option>'
            }));
          }
        }
      });
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
          //console.log("vh_id " + event.target.id);
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
            //console.log(json);
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

  function getMedicalHistories(pid) {
        $('#pat_v_histories').css("display","none");
        $('#pat_v_history_detail_left').css("display","none");
        $('#med_histories').css("display","none");
        $('#pat_vacc_histories').css("display","none");
        $('#footer').css("display","block");
         $.ajaxSetup({
               headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
             });
             $.ajax({
             url: "{{url('mh_patient')}}"+'/'+pid,
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
               //console.log(json);
               let med_histories = $("#med_histories");
               med_histories.empty();
               $.each(json, function (key, entry) {
                 med_histories = med_histories.append($('<h5></h5>').attr('id', entry.id).text(entry.dname + " " + entry.disease_desc))
                })
              }
             }
             });
          }

          $(document).on("click","#pat_v_histories", function (event) {
              //console.log("vh_id " + event.target.id);
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
                //console.log(json);
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
                //console.log(response);
                if (response['data'] != null) {
                  len = response['data'].length;
                  //console.log(len);
                  json = response['data'];
                }
                if(len > 0) {
                  //console.log(json.head_size);
                  //console.log(len);
                  //json.forEach(function(post) {
                  // do something
                  //  console.log(post);
                  //});
                }
              }
            });
          }
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
               //console.log(response);
               if (response['data'] != null) {
                 len = response['data'].length;
                 //console.log(len);
                   json = response['data'];
                 }
               if(len > 0) {
                   //console.log(json.head_size);
                   //console.log(len);
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
  window.location = "{{url('addmedicalhistory')}}"+'/'+$('#pid').text();
}

  function refreshpage() {
  window.location = "{{url('TodocMainPage')}}"+'/'+$('#pid').text();
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

function docschedulingpatient() {
  if ($('#pid').text()) {
    window.location = "{{url('docschedulingpatient')}}"+'/'+$('#pid').text();
  }
}

function editingpatient() {
  window.location = "{{url('editingpatient')}}"+'/'+$('#pid').text();
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

  var date = current_date();

  //console.log(head_size + " " + length + " " + weight + " " + temperature + " " + date);
  $.ajax({
    type:'POST',
    url:"{{url('addingpatientvh')}}"+'/'+$('#pid').text(),
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

function displayBlockVisitHistories() {
    ShowVisitHistories($('#pid').text());
    getMedicalHistories($('#pid').text());
    patient_fvh_record();
    $("#records_table").css("display", "none");
    $('#pat_v_histories').css("display","block");
    $('#pat_v_history_detail_left').css("display","block");
    $('#pat_v_history_detail_right').css("display","block");
    $('#med_histories').css("display","none");
    $('#pat_vacc_histories').css("display","none");
  }

function ShowMedicalHistories() {
  ShowVisitHistories($('#pid').text());
  getMedicalHistories($('#pid').text());
  patient_fvh_record();
  $("#records_table").css("display", "none");
  $('#pat_v_histories').css("display","none");
  $('#pat_v_history_detail_left').css("display","none");
  $('#pat_v_history_detail_right').css("display","none");
  $('#med_histories').css("display","block");
  $('#pat_vacc_histories').css("display","none");
  $('#footer').css("display","block");
}

function ShowVaccinationHistories() {
  $("#records_table").css("display", "none");
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
  var medicine = $('#added_med').text();
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

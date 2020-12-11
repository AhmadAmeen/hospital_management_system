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
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>


$(document).ready(function(){
  fetch_tvh_records();
});


setInterval(function() {
    // do stuff
    fetch_tvh_records();
}, 10000);

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
                       <div>
                         <!--
                          @foreach ($patients as $patient)
                           <span id="list-item"><i class="material-icons video_call">video_call</i><a style="margin-left: 10px;" onclick="patientselected('{{$patient->id}}','{{$patient->fname}}','{{$patient->lname}}','{{$patient->age}}','{{$patient->dob}}','{{$patient->guard_no}}')">{{$patient->fname}} {{$patient->lname}}</a></span>
                         @endforeach
                        -->
                      </div>
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
                        <b><small>Add Patient's Visit</small></b>
                           <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <select id="selectmed" name="selectmed" style="margin: 10px">
                            @foreach($medicines as $med)
                              <option value="{{$med->id}}">{{$med->name}}</option>
                            @endforeach
                          </select>
                          <select id="system" style="display: none; margin: 10px"></select>
                          <div id="livesearch"></div>
                          <div class="form-group">
                           <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                             <a onclick="searchmedicinepot()" name="" class='btn btn-main' style="background-color: gray; color: white">Search</a>
                             <a id="addMed" onclick="addmedicine()" name="" class='btn btn-success' style="display: none; margin-top: 10px;">Add Medicne</a>
                           </div>
                         </div>
                       </div>
                     </div>
                     <div class="form-group" style="font-size: 12px">
                      <div id="added_med"></div>
                     </div>
                     <textarea style="width: 30%; height: 10px; font-size: 12px" placeholder="Note..."></textarea>
                     <br><br>
                     <div class="form-group">
                       <a onclick="patientsdatajson()" id="1days" name="1days" class='btn btn-success'>Growth</a>
                       <a onclick="editvaccinationhistory()" name="7days" class='btn btn-success'>Vaccination</a>
                       <a onclick="displayBlockVisitHistories()" id="15days" name="15days" class='btn btn-success'>Visit History</a>
                       <a onclick="ShowMedicalHistories()" id="30days" name="30days" class='btn btn-success'>Medical History</a>
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
                   </div>
                  </div>
                 </div>
                </div>
               <footer style="padding-top: 35px;">
                   <!--<form action="/action_page.php">-->
                   <div class="clearfix"></div>
                   <div class="pull-right">
                     Hospital Management System <a href="#">Visit Our Site</a>
                   </div>
                   <div class="clearfix"></div>
               </footer>
             <!--ending right-->
           </div>
         </div>
       </div>
<script>
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
        console.log(response);
        if (response['data'] != null) {
          len = response['data'].length;
          json = response['data'];
        }
        if(len > 0) {
          console.log(json);
          let pat_list = $("#pat_list");
          pat_list.empty();
          var html;
          $.each(json, function (key, entry) {
            //pat_list = pat_list.html("<span style='font-weight:bold;'>" + entry.fname + "</span>");
            pat_list = pat_list.append($('<i></i>').css("display", "flex").css("float", "right").attr("class", "material-icons video_call").text("video_call"))
            pat_list = pat_list.append($('<br><br>'))
            pat_list = pat_list.append($('<h5></h5>').css("float", "left").click(function(){ patientselected(entry.id,entry.fname,entry.lname,entry.age,entry.dob,entry.guard_no); }).attr('id', entry.id).text(entry.fname + " " + entry.lname))
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
            console.log(json.other);
            return json.other;
          }
        }
      });
  }

  function patientselected(pid, pfn, pln, p_age, pdob, pguard_no) {
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
           }
         }
       });
  }

  function addmedicine() {
    var med_id = $('#selectmed').val();
    var dosage = $('#system').val();
    //added_med.empty();
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
               console.log(json);
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
                console.log(response);
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

function schedulingpatient() {
  window.location = "{{url('schedulingpatient')}}"+'/'+$('#pid').text();
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
    //console.log($('#pid').text());
    ShowVisitHistories($('#pid').text());
    getMedicalHistories($('#pid').text());
    $('#pat_v_histories').css("display","block");
    $('#pat_v_history_detail_left').css("display","block");
    $('#pat_v_history_detail_right').css("display","block");
    $('#med_histories').css("display","none");
    $('#pat_vacc_histories').css("display","none");
  }

function ShowMedicalHistories() {
  ShowVisitHistories($('#pid').text());
  getMedicalHistories($('#pid').text());
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

@if(!Session::has('doctor_name_session'))
<script>window.location = "welcome";</script>
@endif
@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

@extends('doctorlayout.default')

@section('content')
<link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.advcard {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.5s;
  width: 100%;
  margin: auto;
  margin-bottom: 50px;
  font-size: 10px;
}
</style>

<script>
  function current_date () {
    var result = new Date();
    document.getElementById("cur_date").text = formatedate(result);
    document.getElementById("cur_date").value = formatedate(result);
  }
  function formatedate(result) {
    var dd = result.getDate();
    var mm = result.getMonth() + 1;
    var y = result.getFullYear();
    return (mm + '/'+ dd + '/'+ y);
  }
</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/schedule-btn-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/detail-text-boxes-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/table-standard-css.css') }}" />
<meta name="csrf-token" content="{{ csrf_token() }}">

  <div class="right_col" role="main">
   <div class="clearfix"></div>
             <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="x_panel">
                   <div class="x_title">
                     <h2>Welcome <small>Patient Scheduling:</small></h2>
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
                       <span><i class="material-icons close"><a href="{{url('TodocMainPage/' . $patient->id)}}" >close</a></i><a style="margin-left: 10px; color: white; "></a></span>
                       </div>
                        <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      @csrf
                      <!--7 days-->
                        <div class="advcard">
                          <!--<img src="img_avatar.png" alt="Avatar" style="width:100%">-->
                          <div class="container" style="font-size: 12px">
                            <h5><b>Patient Name: </b> {{$patient->fname}} {{$patient->lname}}&nbsp;&nbsp;&nbsp;
                            <b>Patient Age: </b> {{$patient->age}}&nbsp;&nbsp;&nbsp;
                            <b>Patient DOB: </b> {{$patient->dob}}&nbsp;&nbsp;&nbsp;
                            <b>Current Date: </b><a id="cur_date"></a><script>current_date();</script>&nbsp;&nbsp;&nbsp;
                            <h5 style="display:inline-block"><b>Scheduled Date: <a id="pur_date"></a></b></h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <h5 style="display:inline-block"><b>Day: <a id="pur_dayname"></a></b></h5>
                            <h5 style="display: none"><b>Type: <a id="v_type"></a></b></h5>
                         </div>
                        </div>
                        <!--centers-->
                        <div class="form-group" id="toggle_box">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dcoordinator">Choose Center<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="center_select" name="center_select" class="form-control col-md-7 col-xs-12">
                                <option value="{{session('rc_cid_session')}}">{{session('rc_cname_session')}}</option>
                                  @foreach($centers as $center)
                                    @if($center->cname != session('rc_cname_session'))
                                      <option value="{{$center->id}}">{{$center->cname}}</option>
                                      @endif
                                  @endforeach
                            </select>
                          </div>
                        </div>
                        <!--center-timing-->
                        <div class="card" id='center_timing_div' style="display: none;">
                          <div id = 'msg' style="margin: auto" class="container"></div>
                            <div class="form-group">
                              <div class="card" id="ct_slots_div" style="display: none; margin: 10px; margin: auto; width: 50%; padding: 10px;">
                                <h5><b>Please Choose the Slot* </b></h5>
                                <select id="ct_slots" name="ct_slot_selected" class="form-control col-md-7 col-xs-12"></select>
                                <a class='btn btn-success' onclick="schedulepatientstore1()">Confirm</a>
                              </div>
                              <table border='1' id='userTable' style='width: 80%; border-collapse: collapse; margin: auto; margin-top: 10px; margin-bottom: 10px'>
                                <thead>
                                <tr>
                                <th>From</th>
                                <th>To</th>
                                <th>Type</th>
                                <th>Select</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                               </table>
                              </div>
                            </div>
                          </div>
                        <!--center slot-->
                        <div class="form-group" style="margin-top: 25px; margin-bottom: 30px;">
                          <a onclick="addDays(1)" id="1days" name="1days" class='ph-button ph-btn-blue'>Next Available</a>
                          <a onclick="addDays(7)" id="7days" name="7days" class='ph-button ph-btn-blue'>07 Days</a>
                          <a onclick="addDays(15)" id="15days" name="15days" class='ph-button ph-btn-blue'>15 Days</a>
                          <a onclick="addDays(30)" id="30days" name="30days" class='ph-button ph-btn-blue'>30 Days</a>
                      </div>
                      <!--result from ajax-->
                      <?php
                         echo Form::button('Schedule Center Timing', ['onClick'=>'schedule_center_timing()', 'class'=>'ph-button ph-btn-red']);
                      ?>
                      <!--footer-->
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <!--
                          <button type="submit" name="submit" class="btn btn-success">Schedule Patient</button>
                        -->
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script>

   function schedulepatientstore1() {
     $.ajaxSetup({
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
     });
     var ct_slot_id = $('#ct_slots :selected').val();
     var type = document.getElementById("v_type").text;
     console.log(type);
     var status = 0;
     var time = ct_slot_id;
     var center_id = document.getElementById("center_select").value;
     var date = document.getElementById("pur_date").value;
     var pat_id = {{$patient->id}};
     //console.log (type + " " + status  + " " + time + " " + center_id + " " + date + " " + pat_id);
     $.ajax({
       type:'POST',
       url:"{{url('schedulepatientstore')}}",
       data: {
         pat_id: pat_id,
         center_id: center_id,
         date: date,
         time: time,
         type: type,
         status: status,
      },
         success:function(data) {
           alert("Patient scheduled successfully!");
           location.reload();
         }
     });
   }

   function schedulepatientstore(from, to, type) {
     $.ajaxSetup({
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
     });
     var type = document.getElementById(type).value;
     var status = 0;
     var time = from;
     var center_id = document.getElementById("center_select").value;
     var date = document.getElementById("pur_date").value;
     var pat_id = {{$patient->id}};
     console.log(type + " " + status  + " " + time + " " + center_id + " " + date + " " + pat_id);
     $.ajax({
       type:'POST',
       url:"{{url('schedulepatientstore')}}",
       data: {
         pat_id: pat_id,
         center_id: center_id,
         date: date,
         time: time,
         type: type,
         status: status,
      },
         success:function(data) {
           alert("Patient scheduled successfully!");
         }
     });
   }

      function schedule_center_timing() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
       var c_id = document.getElementById("center_select").value;
       var cur_date = document.getElementById("cur_date").value;
       var pur_date = document.getElementById("pur_date").value;
       var pur_dayname = document.getElementById("pur_dayname").value;
       $.ajax({
          type:'POST',
          url:"{{url('checkcenteroffdays')}}",
          data: {
            c_id: c_id,
            cur_date: cur_date,
            pur_date: pur_date,
            pur_dayname: pur_dayname,
          },
            success:function(data) {
             $("#msg").html(data.result);
             console.log(data.pur_date + " ");
             console.log(data.pur_dayname);
             document.getElementById("pur_date").text = data.pur_date;
             document.getElementById("pur_dayname").text = data.pur_dayname;
             document.getElementById("pur_date").value = data.pur_date;
             document.getElementById("pur_dayname").value = data.pur_dayname;
             var center_timing_div = document.getElementById("center_timing_div");
             center_timing_div.style.display = "block";
             getCenterTimings(data.center_id);
           }
       });
     }

   function getCenterTimings(center_id) {
     $.ajaxSetup({
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
     });
     var c_id = document.getElementById("center_select").value;
     $.ajax({
     url: '../getCenterTimings/'+center_id,
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
       $("#userTable tbody").empty();
       for(var i = 0; i < len; i++) {
           var obj = json[i];
           var tr_str = tr_str +
            "<tr>"
            + "<td align='center'>" + "<h5>" + tConvert(obj.from) + "</h5>" + "</td>"
            + "<td align='center'>" + "<h5>" + tConvert(obj.to) + "</h5>" + "</td>"
            + "<div class='col-md-6 col-sm-6 col-xs-12'>"
            + "<td align='center'>"
            + "<select id='"+i+"' class='form-control col-md-7 col-xs-12'>"
            +  "<option value='Physical Checkup'>Physical Checkup</option>"
            +  "<option value='Vaccination'>Vaccination</option>"
            +  "<option value='Video Consultation'>Video Consultation</option>"
            + "</select> </td>"
            + "</div>"
            //+ "<td align='center'>"  + "<a class='btn btn-success' onclick=\"(schedulepatientstore('" + obj.from + "','" + obj.to +  "','" + i + "'))\">Select Slot</a> </td>"
            + "<td align='center'>"  + "<a class='btn btn-primary' onclick=\"(get_ct_slots('" + obj.id + "','" + i +  "'))\">Select Timing</a> </td>"
            + "</tr>";
          }
       $("#userTable tbody").html(tr_str);
      }
     }
     });
    }

   function get_ct_slots(centertiming_id, vtype_id) {
     var type = document.getElementById(vtype_id);
     var ct_slots_div = document.getElementById("ct_slots_div");

     document.getElementById("v_type").text = document.getElementById(vtype_id).value;
     var final_purposed_date = document.getElementById("pur_date").text;
     ct_slots_div.style.display = "block";

     $.ajaxSetup({
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
     });
     //var c_id = document.getElementById("center_select").value;
     $.ajax({
     url: '../get_ct_slots/'+centertiming_id,
     type: 'get',
     data: {
       final_purposed_date: final_purposed_date,
     },
     dataType: 'json',
     success: function(response) {
     var len = 0;
     var json = '';
     if (response['data'] != null) {
       len = response['data'].length;
       json = response['data'];
     }
     if(len > 0) {
        let dropdown = $('#ct_slots');
        dropdown.empty();
        dropdown.prop('selectedIndex', 0);
        $.each(json, function (key, entry) {
          dropdown.append($('<option></option>').attr('value', entry.id).text("From: " + entry.from + " To: " + entry.to));
          })
      }
     }
     });
    }

    function addDays(days) {
      var result = new Date();
      result.setDate(result.getDate() + days);
      document.getElementById("pur_date").text =formatedate(result);
      document.getElementById("pur_date").value = formatedate(result);
      var daydate = formatedate(result);
      document.getElementById("pur_dayname").text =getDayOfWeek(daydate);
      document.getElementById("pur_dayname").value = getDayOfWeek(daydate);
    }

    // Accepts a Date object or date string that is recognized by the Date.parse() method
    function getDayOfWeek(date) {
      const dayOfWeek = new Date(date).getDay();
      return isNaN(dayOfWeek) ? null :
        ['sun', 'mon', 'tues', 'wed', 'thu', 'fri', 'sat'][dayOfWeek];
    }

    function tConvert (time) {
      // Check correct time format and split into components
      time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];
      if (time.length > 1) { // If time format correct
        time = time.slice (1);  // Remove full string match value
        time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
        time[0] = +time[0] % 12 || 12; // Adjust hours
      }
      return time.join (''); // return adjusted time or original string
    }
  </script>

@endsection

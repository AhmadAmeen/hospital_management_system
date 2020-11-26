@if(!Session::has('recep_name_session'))
<script>window.location = "welcome";</script>
@endif
@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

@extends('layout.default')

@section('content')
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
                     </div>
                        <div class="x_content">
                    <br>
                    <form action="{{url('schedulepatientstore')}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      @csrf
                      <h1 style="text-align: center;">Add Patient Schedule</h1>
                      <!--7 days-->
                        <div class="card">
                          <!--<img src="img_avatar.png" alt="Avatar" style="width:100%">-->
                          <div class="container">
                            <h5><b>Patient Name: </b> {{$patient->fname}} {{$patient->lname}}</h5>
                            <h5><b>Patient Age: </b> {{$patient->age}}</h5>
                            <h5><b>Patient DOB: </b> {{$patient->dob}}</h5>
                            <h5><b>Current Date: </b><a id="cur_date"></a><script>current_date();</script></h5>
                            <h5><b>Scheduled Date: <a id="pur_date"></a></b></h5>
                            <h5><b>Day: <a id="pur_dayname"></a></b></h5>
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
                      <div class="card" id='center_timing' style="display: none">
                        <div id = 'msg' style="margin: auto" class="container"></div>
                          <div class="form-group">
                            <!--
                            <div class="col-md-6 col-sm-6 col-xs-12" id="ct_select" style="padding: 20px; width: 100%; margin: auto">
                              <div>
                                <select name="ct_select" class="form-control col-md-7 col-xs-12">
                                  <option value="{{session('rc_cid_session')}}">{{session('rc_cname_session')}}</option>
                                    @foreach($centers as $center)
                                      @if($center->cname != session('rc_cname_session'))
                                        <option value="{{$center->id}}">{{$center->cname}}</option>
                                        @endif
                                    @endforeach
                             </select>
                             </div>
                             -->
                            <table border='1' id='userTable' style='width: 80%; border-collapse: collapse; margin: auto; margin-top: 10px; margin-bottom: 10px'>
                              <thead>
                              <tr>
                              <th>From</th>
                              <th>To</th>
                              <th>Select</th>
                              </tr>
                              </thead>
                              <tbody></tbody>
                             </table>

                            </div>
                          </div>
                        </div>
                      <!--select day-->
                      <div class="form-group" style="margin-top: 25px; margin-bottom: 30px;">
                          <a onclick="addDays(7)" id="7days" name="7days" class='ph-button ph-btn-blue'>07 Days</a>
                          <a onclick="addDays(14)" id="14days" name="14days" class='ph-button ph-btn-blue'>14 Days</a>
                          <a onclick="addDays(21)" id="21days" name="21days" class='ph-button ph-btn-blue'>21 Days</a>
                          <a onclick="addDays(30)" id="30days" name="30days" class='ph-button ph-btn-blue'>30 Days</a>
                          <a onclick="addDays(60)" id="60days" name="60days" class='ph-button ph-btn-blue'>2 Months</a>
                      </div>
                      <!--result from ajax-->
                      <?php
                         echo Form::button('Schedule Center Timing', ['onClick'=>'getMessages()', 'class'=>'ph-button ph-btn-red']);
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

    function getMessages() {
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
           var center_timing = document.getElementById("center_timing");
           center_timing.style.display = "block";
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
     if(len > 0)  {

       $("#userTable tbody").empty();
       for(var i = 0; i < len; i++) {
           var obj = json[i];
           console.log (obj);
          var tr_str = "<tr>" +
          "<td align='center'>" + obj.from + "</td>" +
          "<td align='center'>" + obj.to + "</td>" +
          "<td align='center'>" + "<button class='btn btn-success'>Select</button>" + "</td>" +
          "</tr>";
          $("#userTable tbody").append(tr_str);
       }
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

  </script>

@endsection

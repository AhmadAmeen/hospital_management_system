@if(!Session::has('doctor_name_session'))
<script>window.location = "welcome";</script>
@endif

@extends('doctorlayout.default')

@section('content')
<style>
  #buttons {
    position: absolute;
    width:70%;
    bottom: 0px;
  }
  #note {
    position: absolute;
    width:70%;
    bottom: 100px;
}
#list-item {
  border: 1px solid white;
  line-height: normal;
  border: none;
  margin: auto;
  color: white;
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
  <div class="menu_section">
    <div style="margin-bottom: 30px"><h3>Patients</h3></div>
    @foreach ($patients as $patient)
      <span id="list-item"><i class="material-icons video_call">video_call</i><a style="margin-left: 10px; color: white; " onclick="patientselected('{{$patient->id}}','{{$patient->fname}}','{{$patient->lname}}','{{$patient->age}}','{{$patient->dob}}','{{$patient->guard_no}}')">{{$patient->fname}} {{$patient->lname}}</a></span>
     @endforeach
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
       <b>Patient-ID: </b> <a id="pid"></a>&nbsp;&nbsp;&nbsp;&nbsp;
       <b>Name: </b> <a id="pfn"></a> <a id="pln"></a>&nbsp;&nbsp;&nbsp;&nbsp;
       <b>Age: </b> <a id="p_age"></a> &nbsp;&nbsp;&nbsp;&nbsp;
       <b>DOB: </b> <a id="pdob"></a>&nbsp;&nbsp;&nbsp;&nbsp;
       <b>Guard No: </b> <a id="pguard_no"></a>&nbsp;&nbsp;&nbsp;&nbsp;
       <br>
       <b>Head Size: </b> <a id="head_size"></a>&nbsp;&nbsp;&nbsp;&nbsp;
       <b>Weight: </b> <a id="weight"></a>&nbsp;&nbsp;&nbsp;&nbsp;
       <b>Length: </b> <a id="length"></a>&nbsp;&nbsp;&nbsp;&nbsp;
       <b>Temperature: </b> <a id="temp"></a>&nbsp;&nbsp;&nbsp;&nbsp;
       <b>Visit Type: </b> <a id="v_type"></a>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>

    <form style="margin: 20px;">
      <label>Search Medicine: </label>
      <input style="border-color: gray; border-radius: 25px; padding: 6px" type="text" size="30" onkeyup="showResult(this.value)">
      <div id="livesearch"></div>
    </form>

    <div id="note">
    <!--<form action="/action_page.php">-->
      <label for="note">Note:</label>
        <textarea placeholder="(if any)..." cols="30" rows="5"></textarea>
      <br><br>
      <!--
      <input type="submit" value="Submit">
    </form>
    -->
  </div>

    <div id="buttons" class="form-group" style="margin-top: 25px; margin-bottom: 30px; float: bottom">
      <a onclick="addDays(1)" id="1days" name="1days" class='ph-button ph-btn-blue'>Growth</a>
      <a onclick="addDays(7)" id="7days" name="7days" class='ph-button ph-btn-blue'>Vaccination</a>
      <a onclick="addDays(15)" id="15days" name="15days" class='ph-button ph-btn-blue'>Visit History</a>
      <a onclick="addDays(30)" id="30days" name="30days" class='ph-button ph-btn-blue'>Medical Guideline</a>
      <a onclick="addDays(30)" id="30days" name="30days" class='ph-button ph-btn-green'>Save</a>
  </div>
</div>

<script>
  function patientselected(pid, pfn, pln, p_age, pdob, pguard_no) {
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
           }
         }
       });
  }
</script>
@endsection

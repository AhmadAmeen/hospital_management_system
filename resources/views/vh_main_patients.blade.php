@if(!Session::has('recep_name_session'))
<script>window.location = "welcome";</script>
@endif

@extends ('patientlayout.default')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/searchbox-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/profile-css.css') }}" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">

<div class="right_col" role="main">

<table class="table table-hover" style="background-color: white; color: black; padding-left: 10px">
  <h2>All Patients Record</h2>
  <form action="vh_getseachedpatients" method="get">
    <input type="text" id="pname" name="pname" required="required" placeholder="Search Patients...">
    <!--<button type="submit" name="submit" class="btn btn-success" style="margin-left: 10px">Search Patients</button>-->
<!--
  </form>
  <tr>
    <th>Patient First Name</th>
    <th>Patient Last Name</th>
    <th>Gender</th>
    <th>Age</th>
    <th>DoB</th>
    <th>Father's Name</th>
    <th>Guardian No</th>
    <!--
    <th>Patient History</th>
    -->
    <th>Visit Histories</th>
    <th>Add New Visit History Record</th>
  </tr>
  @foreach ($patients as $patient)
  <tr>
    <td>{{$patient->fname}}</td>
    <td>{{$patient->lname}}</td>
    <td>{{$patient->gender}}</td>
    <td>{{$patient->age}}</td>
    <td>{{$patient->dob}}</td>
    <td>{{$patient->father_name}}</td>
    <td>{{$patient->guard_no}}</td>
    <!--
    <td>{{$patient->pat_history}}</td>
  -->
    <td><a href="vh_patient/{{$patient->id}}">Patient Visit History</a></td>
    <td><a href="addnewpvhhistory/{{$patient->id}}">Add New Visit History Record</a></td>
  </tr>
  @endforeach
  {{$patients->links()}}
</table>
-->
 <div class="container">

  <div class="row d-flex justify-content-center">

   <div class="col-lg-6 col-md-9">

    <div class="main my-5">

     <div class="header p-3">

      <div class="container">
       <div class="row">
        <div class="col-12 mb-3">
         <img src="https://s16.picofile.com/file/8414366276/105_1055656_account_user_profile_avatar_avatar_user_profile_icon.png" alt="profile image" class="mx-auto d-block img-fluid rounded-circle profile-img" width="200" height="200">
        </div>
        <div class="col-12 text-center name">
         <div class="d-flex justify-content-between">
          <div>Your Name</div>
          <div>
           <a href="#" target="_blank"><span class="mdi mdi-instagram"></span></a>
           <a href="#" target="_blank"><span class="mdi mdi-telegram"></span></a>
           <a href="#" target="_blank"><span class="mdi mdi-twitter"></span></a>
           <a href="#" target="_blank"><span class="mdi mdi-gmail"></span></a>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>

     <div class="profile p-2">
      <div class="container">
       <div class="row">
        <div class="col-12 d-flex justify-content-between">
         <span>Your Name</span>
         <span class="mdi mdi-account" title="name" style="color: #ff5722;"></span>
        </div>
        <div class="col-12 d-flex justify-content-between">
         <span>Your Location</span>
         <span class="mdi mdi-map-marker" title="location" style="color: #ffc107;"></span>
        </div>
        <div class="col-12 d-flex justify-content-between">
         <span>Your Education</span>
         <span class="mdi mdi-badge-account" title="education" style="color:#8bc34a;"></span>
        </div>
        <div class="col-12 d-flex justify-content-between">
         <span class="skill">
          <span class="mdi mdi-language-html5"></span>
          <span class="mdi mdi-language-css3"></span>
          <span class="mdi mdi-language-javascript"></span>
          <span class="mdi mdi-jquery"></span>
          <span class="mdi mdi-language-python"></span>
          <span class="mdi mdi-language-cpp"></span>
         </span>
         <span class="mdi mdi-lightbulb-on" title="skills" style="color: #00bcd4;"></span>
        </div>
       </div>
      </div>
     </div>

    </div>

   </div>

  </div>

 </div>

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<hr>
</div>
@endsection

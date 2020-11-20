@if(!Session::has('recep_name_session'))
<script>window.location = "welcome";</script>
@endif

@extends ('patienthistorylayout.default')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/searchbox-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/profile-css.css') }}" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">


@foreach ($patients as $patient)

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
           <div>{{$patient->fname}} {{$patient->lname}}</div>
          </div>
         </div>
        </div>
       </div>
      </div>

      <div class="profile p-2">
       <div class="container">
        <div class="row">
         <div class="col-12 d-flex justify-content-between">
          <span>Gender: {{$patient->gender}}</span>
          <span class="mdi mdi-account" title="name" style="color: #ff5722;"></span>
         </div>
         <div class="col-12 d-flex justify-content-between">
          <span>Age: {{$patient->age}}</span>
          <span class="mdi mdi-map-marker" title="location" style="color: #ffc107;"></span>
         </div>
         <div class="col-12 d-flex justify-content-between">
          <span>DOB: {{$patient->dob}}</span>
          <span class="mdi mdi-badge-account" title="education" style="color:#8bc34a;"></span>
         </div>
         <div class="col-12 d-flex justify-content-between">
          <span>Father Name: {{$patient->father_name}}</span>
          <span class="mdi mdi-badge-account" title="education" style="color:#8bc34a;"></span>
         </div>
         <div class="col-12 d-flex justify-content-between">
          <span>Guardian No: {{$patient->guard_no}}</span>
          <span class="mdi mdi-badge-account" title="education" style="color:#8bc34a;"></span>
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

  @endforeach

<!--
{{$patients->links()}}
</table>
-->

<hr>
</div>
@endsection

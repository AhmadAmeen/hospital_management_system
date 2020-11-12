@if(!Session::has('recep_name_session'))
<script>window.location = "welcome";</script>
@endif

@extends ('patientlayout.default')

@section('content')
<style>
img {
  border-radius: 50%;
  display: block;
  margin: 0 auto;

}
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/searchbox-css.css') }}" />

<div class="right_col" role="main">
<table class="table table-hover" style="background-color: white; color: black; padding-left: 10px">
  <h2>All Patients Record</h2>
  <form action="getseachedpatients" method="get">
    <input type="text" id="pname" name="pname" required="required" placeholder="Search Patients...">
    <!--<button type="submit" name="submit" class="btn btn-success" style="margin-left: 10px">Search Patients</button>-->
  </form>
  <tr>
    <th>Patient First Name</th>
    <th>Patient Last Name</th>
    <th>Gender</th>
    <th>Age</th>
    <th>DoB</th>
    <th>Father's Name</th>
    <th>Guardian No</th>
    <th>Patient History</th>
    <th>Edit</th>
    <th>Delete</th>
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
    <td>{{$patient->pat_history}}</td>
    <td><a href="editingpatient/{{$patient->id}}">Edit</a></td>
    <td><a href="deletepatient/{{$patient->id}}">Delete</a></td>
  </tr>
  @endforeach
  {{$patients->links()}}
</table>
<hr>
</div>
@endsection

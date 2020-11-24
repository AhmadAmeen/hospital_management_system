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
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/patientstable-css.css') }}" />

<div class="right_col" role="main">
<table id="mytable" style="background-color: white; color: black; padding-left: 10px">
  <h2>All Patients Record</h2>
  <form action="{{url('getseachedpatients')}}" method="get">
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
    <th>Previous Visit Histories</th>
    <th>Add new Visit History</th>
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
    <!--
    <td><img src="data:image/png;base64,{{ chunk_split(base64_encode($patient->pat_history)) }}" width="80" height="80" > </img></td>
    <td>{{$patient->pat_history}}</td>
    -->
    <td><a href="{{url('vh_patient/' . $patient->id)}}">Patient Visit History</a></td>
    <td><a href="{{url('addnewpvhhistory/' . $patient->id)}}">Add New Visit History Record</a></td>
    <td><a href="{{url('editingpatient/' . $patient->id)}}">Edit</a></td>
    <td><a href="{{url('deletepatient/' . $patient->id)}}">Delete</a></td>
  </tr>
  @endforeach
  {{$patients->links()}}
</table>
<hr>
</div>
@endsection

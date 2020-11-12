@if(!Session::has('recep_name_session'))
<script>window.location = "welcome";</script>
@endif

@extends ('patientlayout.default')

@section('content')
<div class="right_col" role="main">
<table class="table table-hover" style="background-color: white; color: black; padding-left: 10px">
  <h2>All Patients Record</h2>
  <tr>
    <th>Patient First Name</th>
    <th>Patient Last Name</th>
    <th>Gender</th>
    <th>Age</th>
    <th>DoB</th>
    <th>Father's Name</th>
    <th>Guardian No</th>
    <th>Patient History</th>
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
    <td>{{$patient->pat_history}}</td>
    <td><a href="vh_patient/{{$patient->id}}">Patient Visit History</a></td>
    <td><a href="addnewpvhhistory/{{$patient->id}}">Add New Visit History Record</a></td>
  </tr>
  @endforeach
  {{$patients->links()}}
</table>
<hr>
</div>
@endsection

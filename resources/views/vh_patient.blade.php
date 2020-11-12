@if(!Session::has('recep_name_session'))
<script>window.location = "welcome";</script>
@endif

@extends ('patientlayout.default')

@section('content')
<div class="right_col" role="main">
  <button class="btn btn-primary" onclick="addnewpvhrecord()">Add a New History</button>
<table class="table table-hover" style="background-color: white; color: black; padding-left: 10px">
  <h2>Patient Visit History Record</h2>
  <tr>
    <th>Patient First Name</th>
    <th>Patient Last Name</th>
    <th>DoB</th>
    <th>Visit Date</th>
    <th>Head Size</th>
    <th>Length</th>
    <th>Weight</th>
    <th>Temperature</th>
    <th>Any Other Note</th>
  </tr>
  <!--pvh => 'patient visit history'-->
  @foreach ($pvhistories as $pvh)
  <tr>
    <td>{{$patient->fname}}</td>
    <td>{{$patient->lname}}</td>
    <td>{{$patient->dob}}</td>
    <td>{{$pvh->date}}</td>
    <td>{{$pvh->head_size}}</td>
    <td>{{$pvh->length}}</td>
    <td>{{$pvh->weight}}</td>
    <td>{{$pvh->temperature}}</td>
    <td>{{$pvh->other}}</td>
  </tr>
  @endforeach
  </table>
<hr>
</div>

<script>
function addnewpvhrecord() {
  window.location = "{{url('addnewpvhhistory')}}";
}
</script>
@endsection

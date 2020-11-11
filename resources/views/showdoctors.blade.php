@if(!Session::has('admin_name_session'))
<script>window.location = "welcome";</script>
@endif

@extends ('layout.default')

@section('content')
<style>
img {
  border-radius: 50%;
  display: block;
  margin: 0 auto;
}
</style>
<div class="right_col" role="main">
<table class="table table-hover" style="background-color: white; color: black; padding-left: 10px">
  <h2>All Doctors Record</h2>
  <tr>
    <th>Doctor Image</th>
    <th>Doctor namespace</th>
    <th>Qualification</th>
    <th>Phone No</th>
    <th>Email</th>
    <th>Username</th>
    <th>Password</th>
    <th>Has a receptionist</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  @foreach ($doctors as $doctor)
  <tr>
    <td><img src="data:image/png;base64,{{ chunk_split(base64_encode($doctor->dimg)) }}" width="80" height="80" > </img></td>
    <td>{{$doctor->dname}}</td>
    <td>{{$doctor->qualification}}</td>
    <td>{{$doctor->phno}}</td>
    <td>{{$doctor->email}}</td>
    <td>{{$doctor->username}}</td>
    <td>{{$doctor->password}}</td>
    <td>{{$doctor->has_receptionist}}</td>
    <td><a href="editingdoctor/{{$doctor->id}}">Edit</a></td>
    <td><a href="deletedoctor/{{$doctor->id}}">Delete</a></td>
  </tr>
  @endforeach
  {{$doctors->links()}}
</table>
<hr>
</div>
@endsection

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
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/searchbox-css.css') }}" />

<div class="right_col" role="main">
<table class="table table-hover" style="background-color: white; color: black; padding-left: 10px">
  <h2>All Centers Record</h2>
<!--
  <form action="getcurseachedcenters" method="get">
    <input type="text" id="cname" name="cname" required="required" placeholder="Search Center...">
    <button type="submit" name="submit" class="btn btn-success" style="margin-left: 10px; padding: 9px">Search Doctors</button>
  </form>
-->
  <tr>
    <th>Center Name</th>
    <th>Center Address</th>
    <!--<th>Has a receptionist or not</th>-->
    <th>Edit</th>
    <th>In-active</th>
  </tr>
  @foreach ($centers as $center)
  <tr>
    <td>{{$center->cname}}</td>
    <td>{{$center->address}}</td>
    <!--<td>{{$center->has_receptionist}}</td>-->
    <td><a href="{{url('editingcenter/' . $center->id)}}">Edit</a></td>
    <td><a href="{{url('deletecenter/' . $center->id)}}">In-active</a></td>
  </tr>
  @endforeach
</table>
<hr>
</div>
@endsection

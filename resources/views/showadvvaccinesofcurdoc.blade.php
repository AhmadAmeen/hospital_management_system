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
  <tr>
    <th>Vaccine Name</th>
    <th>Vaccine Description</th>
    <th>Edit</th>
    <th>In-active</th>
  </tr>
  @foreach ($advvaccines as $advvaccine)
  <tr>
    <td>{{$advvaccine->vname}}</td>
    <td>{{$advvaccine->vdescription}}</td>
    <td><a href="{{url('editingvaccine/' . $advvaccine->id. '/' . $doc_id)}}">Edit</a></td>
    <td><a href="{{url('deletevaccine/' . $advvaccine->id . '/' . $doc_id)}}">In-active</a></td>
  </tr>
  @endforeach
</table>
<hr>
</div>
@endsection

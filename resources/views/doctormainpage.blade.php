@if(!Session::has('doctor_name_session'))
<script>window.location = "welcome";</script>
@endif

@extends('doctorlayout.default')

@section('content')
<div class="right_col" role="main">

</div>
@endsection

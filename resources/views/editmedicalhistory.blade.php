@if(!Session::has('recep_name_session'))
<script>window.location = "adminlogin";</script>
@endif

@extends('patientlayout.default')

@section('content')

<style>
img {
 border-radius: 50%;
 display: block;
 margin: 0 auto;
 padding: 10px;
}
.label_margin {
   margin: 10px;
}
input.largerCheckbox {
    transform : scale(2);
    margin: 10px;
}
</style>

<link rel="stylesheet" type="text/css" href="{{ asset('public/css/checkbox-etc-css.css') }}" />
<div class="right_col" role="main"  style="background-color: white">
<div class="clearfix"></div>
  <div class="row">
       <!--OFF-DAYS FORM-->
          <div class="col-md-12 col-sm-12 col-xs-12">
           <div class="x_panel">
             <div class="x_title">
               <small>Edit Medical History</small></h2>
               <div class="clearfix"></div>
              </div>
            <div class="x_content">
              <br>
              <form action="{{ url ('updatemedicalhistory', $patient->id) }}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
                <h1 style="text-align: center; margin-down: 20px">Edit Medical History</h1>
                <!--offdays-->
                <div class="form-group" style="padding: 20px">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Medical History: <span class="required"></span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12" style="text-align:center">
                    @foreach ($med_histories as $med_history)
                    <input type="hidden" id="mid" name="mid[]" value="{{$med_history->id}}">
                    <input type="hidden" id="status" name="prev_status[]" value="{{$med_history->id}}">
                    <br>
                    <label class="label_margin;"><input type="checkbox" id="status" name="status[]" value="{{$med_history->id}}" @if ($med_history->status == 'TRUE') ? checked : '' @endif class="largerCheckbox"><br>
                    <input type="hidden" id="dname" name="dname" value="{{$med_history->dname}}" class="form-control col-md-7 col-xs-12">Name: {{$med_history->dname}} <br> </label> <br>
                    <label class="label_margin"><input type="hidden" id="disease_desc" name="disease_desc"  value="{{$med_history->disease_desc}}" class="form-control col-md-7 col-xs-12">Description: {{$med_history->disease_desc}} <br> </label>
                    @endforeach
                  </div>
                </div>
                <!--end offdays-->
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="submit" class="btn btn-success">Update</button>
                  </div>
                </div>
              </form>
              <button style="float: right" class="btn" onclick="addmorehistories()">Add More Medical Histories</button>
              <button style="float: right" class="btn btn-success" onclick="editvaccinationhistory()">Edit Vaccination History</button>
          </div>
        </div>
       </div>
     </div>
   </div>
<script>
function addmorehistories() {
  window.location = "{{url('addmedicalhistory/' . $patient->id)}}";
}
function editvaccinationhistory() {
  window.location = "{{url('editvaccinationhistory/' . $patient->id)}}";
}
</script>
@endsection

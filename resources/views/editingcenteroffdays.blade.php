@if(!Session::has('admin_name_session'))
<script>window.location = "adminlogin";</script>
@endif

@extends('layout.default')

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
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/checkbox-etc-css.css') }}" />
<div class="right_col" role="main"  style="background-color: white">
<div class="clearfix"></div>
  <div class="row">
       <!--OFF-DAYS FORM-->
          <div class="col-md-12 col-sm-12 col-xs-12">
           <div class="x_panel">
             <div class="x_title">
               <small>Edit Center Off-Days</small></h2>
               <div class="clearfix"></div>
              </div>
            <div class="x_content">
              <br>
              <form action="{{ url ('updatecenteroffdays', $center->id) }}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
                <h1 style="text-align: center; margin-down: 20px">Edit Center Off-Days</h1>
                <!--offdays-->
                <div class="form-group" style="padding: 20px">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Center Offdays: <span class="required"></span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12" style="text-align:center">
                    @foreach ($center_offdays as $center_offday)
                      <label class="label_margin"><input type="checkbox" id="mon" name="mon"  value="TRUE" @if ($center_offday->mon == 'TRUE') ? checked : '' @endif class="form-control col-md-7 col-xs-12">Monday</label>
                      <label class="label_margin"><input type="checkbox" id="tues" name="tues"  value="TRUE" @if ($center_offday->tues == 'TRUE') ? checked : '' @endif class="form-control col-md-7 col-xs-12">Tuesday</label>
                      <label class="label_margin"><input type="checkbox" id="wed" name="wed"  value="TRUE" @if ($center_offday->wed == 'TRUE') ? checked : '' @endif class="form-control col-md-7 col-xs-12">Wednesday</label>
                      <label class="label_margin"><input type="checkbox" id="thu" name="thu"  value="TRUE" @if ($center_offday->thu == 'TRUE') ? checked : '' @endif class="form-control col-md-7 col-xs-12">Thrusday</label>
                      <label class="label_margin"><input type="checkbox" id="fri" name="fri"  value="TRUE" @if ($center_offday->fri == 'TRUE') ? checked : '' @endif class="form-control col-md-7 col-xs-12">Friday</label>
                      <label class="label_margin"><input type="checkbox" id="sat" name="sat"  value="TRUE" @if ($center_offday->sat == 'TRUE') ? checked : '' @endif class="form-control col-md-7 col-xs-12">Saturday</label>
                      <label class="label_margin"><input type="checkbox" id="sun" name="sun"  value="TRUE" @if ($center_offday->sun == 'TRUE') ? checked : '' @endif class="form-control col-md-7 col-xs-12">Sunday</label>
                    @endforeach
                  </div>
                </div>
                <!--end offdays-->
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-primary" type="button" onclick="showalldoctors()">Cancel</button>
                    <!--
                    <button class="btn btn-primary" type="button" onclick="showvaccineofcurdoc()">Edit Vaccines</button>
                    <button class="btn btn-primary" type="button" onclick="editingcenteroffdays()">Edit Center Offdays</button>
                    -->
                    <button type="submit" name="submit" class="btn btn-success">Update</button>
                  </div>
                </div>
              </form>
          </div>
        </div>
       </div>
     </div>
   </div>
 <script>

 function showalldoctors() {
   window.location = "{{url('showdoctors')}}";
}
 function showvaccineofcurdoc() {
   window.location = "{{url('showvaccinesofcurdoc/' . $center->doc_id)}}";
 }
 function editcenteroffdays() {
   window.location = "{{url('editcenteroffdays/' . $center->id)}}";
 }
 </script>
@endsection

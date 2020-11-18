@if(!Session::has('recep_name_session'))
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
                      <label class="label_margin"><input type="checkbox" id="dname" name="dname"  value="TRUE" @if ($med_history->dname == 'Brachial Plexus Palsy') ? checked : '' @endif class="form-control col-md-7 col-xs-12">{{$med_history->dname}}</label>
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
          </div>
        </div>
       </div>
     </div>
   </div>
<script>

</script>
@endsection

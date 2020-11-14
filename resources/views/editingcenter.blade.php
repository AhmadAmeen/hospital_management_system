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
</style>
 <link rel="stylesheet" type="text/css" href="{{ asset('public/css/checkbox-etc-css.css') }}" />
 <div class="right_col" role="main">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Welcome <small>Edit Doctor</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  <i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
         <div class="x_content">
           <br>
           <form action="{{ url ('updatecenter', $center->id) }}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
             @csrf
             <h1 style="text-align: center; margin-down: 20px">Edit Center</h1>
             <!--cname-->
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cname">Center Name <span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" id="cname" name="cname" value="{{ $center->cname }}" class="form-control col-md-7 col-xs-12">
               </div>
             </div>
             <!--address-->
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Center Address <span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" id="address" name="address"  value="{{ $center->address }}" class="form-control col-md-7 col-xs-12">
               </div>
             </div>
             <!--offdays-->
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="offdays">Off Days <span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" id="offdays" name="offdays"  value="{{ $center->offdays }}" class="form-control col-md-7 col-xs-12">
               </div>
             </div>
             <!--timing-->
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="timing">Timing <span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" id="timing" name="timing"  value="{{ $center->timing }}" class="form-control col-md-7 col-xs-12">
               </div>
             </div>
             <!--center has_receptionist-->
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="has_receptionist">Has a Receptionist?<span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" id="has_receptionist" name="has_receptionist"  value="{{ $center->has_receptionist }}" class="form-control col-md-7 col-xs-12">
               </div>
             </div>

             <!--doctor has a receptionist? commenting now-->
             <!--
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12">Has receptionist? (TRUE/FALSE)<span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input id="has_receptionist" name="has_receptionist" class="date-picker form-control col-md-7 col-xs-12" value="{{ $center->has_receptionist }}">
               </div>
             </div>
           -->
             <div class="ln_solid"></div>
             <div class="form-group">
               <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                 <button class="btn btn-primary" type="button" onclick="showalldoctors()">Cancel</button>
                 <button class="btn btn-primary" type="button" onclick="showvaccineofcurdoc()">Edit Vaccines</button>
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

 </script>
@endsection

@if(!Session::has('admin_name_session'))
<script>window.location = "adminlogin";</script>
@endif

@extends('layout.default')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('public/css/checkbox-etc-css.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/beautiful-btn-css.css') }}" />

 <div class="right_col" role="main"  style="background-color: white">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Welcome <small>Edit Vaccine Details</small></h2>
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
           <form action="{{ url ('updatevaccine/' . $advvaccine->id . '/' . $doc_id) }}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
             @csrf
             <h1 style="text-align: center; margin-down: 20px">Edit Vaccine Details</h1>
             <!--vname-->
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vname">Vaccine Name <span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" id="vname" name="vname" value="{{ $advvaccine->vname }}" class="form-control col-md-7 col-xs-12">
               </div>
             </div>
             <!--vdescription-->
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vdescription">Vaccine Description <span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" id="vdescription" name="vdescription" value="{{ $advvaccine->vdescription }}" class="form-control col-md-7 col-xs-12">
               </div>
             </div>
             <div class="ln_solid"></div>
             <div class="form-group">
               <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                 <button class="btn btn-primary label_margin" type="button" onclick="showalldoctors()">All Doctors</button>
                 <button class="btn btn-primary label_margin" type="button" onclick="editvaccinetimings()">Edit Vaccine Timings</button>
                 <button type="submit" name="submit" class="btn btn-success label_margin">Update</button>
                 </div>
             </div>
           </form>
         </div>
       </div>
     </div>
    </div>
   </div>
 </div>
 <script>

 function showalldoctors() {
   window.location = "{{url('showdoctors')}}";
}
 function editvaccinetimings() {
   window.location = "{{url('editvaccinetimings/' . $advvaccine->id)}}";
 }
 </script>
@endsection

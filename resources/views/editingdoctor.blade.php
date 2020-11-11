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
           <form action="{{ url ('updatedoctor', $doctor->id) }}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
             @csrf
             <h1 style="text-align: center; margin-down: 20px">Edit Doctor</h1>
             <!--doctor image-->
             <img src="data:image/png;base64,{{ chunk_split(base64_encode($doctor->dimg)) }}" alt="doctor_img" style="width:150px; height:150px;"></img>
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dimg">Change doctor Image <span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="file" id="dimg" name="dimg" class="form-control col-md-7 col-xs-12">
               </div>
             </div>
             <!--doctor Name-->
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dname">Doctor Name <span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" id="dname" name="dname" value="{{ $doctor->dname }}" class="form-control col-md-7 col-xs-12">
               </div>
             </div>
             <!--doctor qualification-->
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qualification">Qualification <span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" id="qualification" name="qualification"  value="{{ $doctor->qualification }}" class="form-control col-md-7 col-xs-12">
               </div>
             </div>
             <!--doctor phno-->
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phno">Phone No <span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" id="phno" name="phno"  value="{{ $doctor->phno }}" class="form-control col-md-7 col-xs-12">
               </div>
             </div>
             <!--doctor email-->
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" id="email" name="email"  value="{{ $doctor->email }}" class="form-control col-md-7 col-xs-12">
               </div>
             </div>
             <!--doctor username-->
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username <span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" id="username" name="username"  value="{{ $doctor->username }}" class="form-control col-md-7 col-xs-12">
               </div>
             </div>
             <!--doctor password-->
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" id="password" name="password"  value="{{ $doctor->password }}" class="form-control col-md-7 col-xs-12">
               </div>
             </div>
             <!--doctor has a receptionist?-->
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12">Has receptionist? (TRUE/FALSE)<span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input id="has_receptionist" name="has_receptionist" class="date-picker form-control col-md-7 col-xs-12" value="{{ $doctor->has_receptionist }}">
               </div>
             </div>
             <div class="ln_solid"></div>
             <div class="form-group">
               <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                 <button class="btn btn-primary" type="button">Cancel</button>
                 <button type="submit" name="submit" class="btn btn-success">Update</button>
               </div>
             </div>
           </form>
         </div>
       </div>
     </div>
   </div>
 </div>
@endsection

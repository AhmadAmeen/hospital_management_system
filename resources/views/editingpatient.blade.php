@if(!Session::has('recep_name_session'))
<script>window.location = "welcome";</script>
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
           <form action="{{ url ('updatepatient', $patient->id) }}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
             @csrf
             <h1 style="text-align: center; margin-down: 20px">Edit Patient</h1>
             <!--First Name-->
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fname">Patient First Name <span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" id="fname" name="fname" value="{{ $patient->fname }}" class="form-control col-md-7 col-xs-12">
               </div>
             </div>
             <!--Last Name-->
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lname">Last Name <span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" id="lname" name="lname"  value="{{ $patient->lname }}" class="form-control col-md-7 col-xs-12">
               </div>
             </div>
             <!--gender-->
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">Gender <span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" id="gender" name="gender"  value="{{ $patient->gender }}" class="form-control col-md-7 col-xs-12">
               </div>
             </div>
             <!--age-->
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="age">Age <span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" id="age" name="age"  value="{{ $patient->age }}" class="form-control col-md-7 col-xs-12">
               </div>
             </div>
             <!--dob-->
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">DoB <span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" id="dob" name="dob"  value="{{ $patient->dob }}" class="form-control col-md-7 col-xs-12">
               </div>
             </div>
             <!--father_name-->
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="father_name">Father Name <span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" id="father_name" name="father_name"  value="{{ $patient->father_name }}" class="form-control col-md-7 col-xs-12">
               </div>
             </div>
             <!--guard_no-->
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12">Guardian No<span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input id="guard_no" name="guard_no" class="date-picker form-control col-md-7 col-xs-12" value="{{ $patient->guard_no }}">
               </div>
             </div>
             <!--pat_history-->
             <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12">Patient History<span class="required"></span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input id="pat_history" name="pat_history" class="date-picker form-control col-md-7 col-xs-12" value="{{ $patient->pat_history }}">
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

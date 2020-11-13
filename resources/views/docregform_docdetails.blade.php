@if(!Session::has('admin_name_session'))
<script>window.location = "welcome";</script>
@endif

@extends('layout.default')

@section('content')

  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/checkbox-etc-css.css') }}" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
  /*
  $(document).ready(function(){
  $("#toggle_box").hide();
    $("#toggle").click(function(){
      $("#toggle_box").toggle();
    });
  });
  */
  </script>

  <div class="right_col" role="main">
   <div class="clearfix"></div>
             <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="x_panel">
                   <div class="x_title">
                     <h2>Welcome <small>Doctor Registation</small></h2>
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

                    <form action="{{url('doctorstore')}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      @csrf
                      <h1 style="text-align: center; margin-down: 20px">Register Doctor</h1>
                      <!--doctor-image-->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dimg">Doctor Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="dimg" name="dimg" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <!--doc-name-->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sname">Doctor Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="dname" name="dname" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fname">Qualification <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="qualification" name="qualification" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="phno" name="phno" class="date-picker form-control col-md-7 col-xs-12" required="required" type="number">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">E-mail <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="email" name="email" class="date-picker form-control col-md-7 col-xs-12" required="required" type="email">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="username" name="username" class="date-picker form-control col-md-7 col-xs-12" required="required" type="email">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="password" name="password" class="date-picker form-control col-md-7 col-xs-12" required="required" type="email">
                        </div>
                      </div>
                      <!--
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Has Receptionist? <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="b-contain">
                            <input id="toggle" value="TRUE" name="has_receptionist" type="checkbox">
                            <div class="b-input"></div>
                          </label>
                        </div>
                      </div>
                      <p>
                        <div class="form-group" id="toggle_box">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dcoordinator">Receptionist Details<span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="recp_username" name="recp_username" placeholder="Receptionist Username" class="date-picker form-control col-md-7 col-xs-12" required="required">
                            <br><br>
                            <input type="text" id="recp_password" name="recp_password"  placeholder="Receptionist Password" class="date-picker form-control col-md-7 col-xs-12" required="required">
                          </div>
                        </div>
                      </p>
                      -->
                      <div class="ln_solid"></div>
                      @if($errors->any())
                      <hr>
                      @foreach($errors->all() as $error)
                            <li style="color: red; text-align:center">{{$error}}</li>
                        @endforeach
                        <hr>
                      @endif
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                    <hr>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

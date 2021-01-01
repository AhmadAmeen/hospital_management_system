@if(!Session::has('doctor_name_session'))
<script>window.location = "welcome";</script>
@endif

@extends('doctorlayout.default')
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
                     <h2>Welcome <small>Website Builder</small></h2>
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
                    <form action="{{url('updatewebsitedata')}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      @csrf
                      <h1 style="text-align: center; margin-down: 20px">Website Builder</h1>
                      <!--About Us-->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="about">About <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="about" name="about" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="t1">Testimonial 1 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="t1" name="t1" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="t2">Testimonial 2 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="t2" name="t2" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="t3">Testimonial 3 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="t3" name="t3" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <!--<input type="hidden" id="recp_id" name="recp_id" value="Session::has('recep_name_session')">-->
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

  <script type="text/javascript">
      $(document).ready(function(){
          $(".fancybox").fancybox({
              openEffect: "none",
              closeEffect: "none"
          });
      });
  </script>
@endsection

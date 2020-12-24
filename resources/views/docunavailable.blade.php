@if(!Session::has('doctor_name_session'))
<script>window.location = "welcome";</script>
@endif

@extends('doctorlayout.default')

@section('content')

  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/checkbox-etc-css.css') }}" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Remember to include jQuery :) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <!-- jQuery Modal -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
  <div class="right_col" role="main">
   <div class="clearfix"></div>
             <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="x_panel">
                   <div class="x_title">
                     <h2>Welcome <small>Doctor Leave</small></h2>
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
                    <form action="{{url('pat_rescheduled')}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      @csrf
                      <h1 style="text-align: center; margin-down: 20px">Choose Center & Reason</h1>
                      <!--pat-name-->
                      <div class="form-group" id="toggle_box">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dcoordinator">Choose Center:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="center_unavail" class="form-control col-md-7 col-xs-12">
                            <option value="All Centers">All Centers</option>
                            @foreach($centers as $center)
                              <option value="{{$center->id}}">{{$center->cname}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group" id="toggle_box">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dcoordinator">Reason:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="type" class="form-control col-md-7 col-xs-12">
                            <option value="Unavailble">Unavailble</option>
                            <option value="Out of Country">Out of Country</option>
                          </select>
                        </div>
                      </div>
                      <!--reason-->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reason">Details (If any):<span></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="details" name="reason" placeholder="Reason to leave..." class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <!--from-->
                      <div class="form-group" style="width: 50%; margin: auto">
                        <div class="col-md-6 col-sm-6 col-xs-12" style="display: inline-block;">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="from">FROM <span class="required"></span>
                          </label>
                          <input type="date" id="from" name="from" required="required" placeholder="From" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12" style="display: inline-block">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="to">TO <span class="required"></span>
                          </label>
                          <input type="date" id="to" name="to" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <!--
                          <button class="btn btn-primary" type="button">Cancel</button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <a tabindex="0" class="btn btn-lg btn-danger" role="button" data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</a>
                          <a onclick="sendmsg()" class="btn btn-success">Send message</a>
                          -->
                          <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
  <script>

    function sendmsg() {
      if ($("#from").val() && $("#to").val()) {
      //alert("Messages sent successfully!");
    } else {
      alert("Please fill empty fields!");
      }
    }

  </script>

@endsection

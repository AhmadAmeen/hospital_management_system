@if(!Session::has('admin_name_session'))
<script>window.location = "welcome";</script>
@endif

@extends('layout.default')

@section('content')

  <div class="right_col" role="main">
   <div class="clearfix"></div>
             <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="x_panel">
                   <div class="x_title">
                     <h2>Welcome <small>Doctor Centers Details</small></h2>
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
                    <form action="{{url('doctoradvcentersstore')}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      @csrf
                      <h1 style="text-align: center; margin-down: 20px">Add Center Details</h1>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cname">Center Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="cname" name="cname" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Center Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="address" name="address" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <!--off days-->
                      <!--
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fname">Off-Days <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="offdays" name="offdays" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      -->
                      <!--off days-->
                      <!--
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Timing <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="timing" name="timing" class="date-picker form-control col-md-7 col-xs-12" required="required" type="number">
                        </div>
                      </div>
                      -->
                      <input type="hidden" id="doc_id" name="doc_id" value="{{$current_doc_id}}">
                      <!--has_rececp-->
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
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="submit" class="btn btn-success">Add Center</button>
                        </div>
                      </div>
                    </form>
                    <!--
                    <button style="float: right" id="tovaccine" class="btn" onclick="addVaccines()">Move to Add Vaccines</button>
                    -->
                    <button style="float: right" id="tovaccine" class="btn" onclick="addadvvaccine()">Move to Add Advance Vaccines</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
  <script>
  function addVaccines() {
    window.location = "{{url('docregform_vaccinedetails/' . $current_doc_id)}}";
  }
  function addadvvaccine() {
    window.location = "{{url('addadvvaccine/' . $current_doc_id)}}";
  }
  </script>
@endsection

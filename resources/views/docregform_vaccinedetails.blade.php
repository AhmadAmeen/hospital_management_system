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
                     <h2>Welcome <small>Doctor Vaccine Details</small></h2>
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
                    <form action="{{url('doctorvaccinestore')}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      @csrf
                      <h1 style="text-align: center; margin-down: 20px">Add Vaccination Details</h1>
                      @for ($i = 0; $i < 10; $i++)
                      <!--Vaccine-->
                      <div class="form-group">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cname">Vaccination Name <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="vname" name="vname[]" value="{{$vname[$i]}}" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vtiming">Vaccination Timing <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="vtiming" name="vtiming[]" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <input type="hidden" id="doc_id" name="doc_id" value="{{$current_doc_id}}">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Vaccination Description <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="vdescription" name="vdescription[]" value="{{$vdescription[$i]}}" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                      </div>
                      <hr>
                      @endfor

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="submit" class="btn btn-success">Add Vaccine</button>
                        </div>
                      </div>
                    </form>
                    <button style="float: right" id="tovaccine" class="btn btn-success"><a href="docregform_docdetails" style="color: white;">Add New Doctor</a></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

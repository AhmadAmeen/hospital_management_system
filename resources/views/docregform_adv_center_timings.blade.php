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
                     <h2>Welcome <small>Doctor Centers Off-Days Details</small></h2>
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
                    <form action="{{url('doctoradvcentertimingsstore')}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      @csrf
                      <h1 style="text-align: center; margin-down: 20px">Add Center Timing</h1>
                      <h3 style="text-align: center; margin-down: 10px">{{$center->cname}}</h3>
                      <h3 style="text-align: center; margin-down: 10px">{{$center->address}}</h3>
                      <!--code-->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">From <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="time" id="from" name="from" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">To <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="time" id="to" name="to" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <input type="hidden" id="doc_id" name="doc_id" value="{{$current_doc_id}}">
                      <input type="hidden" id="center_id" name="center_id" value="{{$center->id}}">
                      <!--footer-->
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="submit" class="btn btn-success">Add Center Timing</button>
                        </div>
                      </div>
                    </form>
                    <!--
                    <button style="float: right" id="tovaccine" class="btn btn-success"><a href="docregform_vaccinedetails/{{$current_doc_id}}" style="color: white;">Move to Add Vaccine</a></button>
                    -->
                    <button style="float: right" id="tovaccine" class="btn btn-success"><a href="{{url('addnewcenter/' . $center->doc_id)}}" style="color: white;">Add New Center</a></button>
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

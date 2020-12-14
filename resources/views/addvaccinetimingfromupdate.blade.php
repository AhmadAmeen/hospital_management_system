@if(!Session::has('admin_name_session') && !Session::has('doctor_name_session'))
<script>window.location = "welcome";</script>
@else
@extends(Session::has('admin_name_session') ? 'layout.default' : 'doctorlayout.default')
@endif

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
                    <form action="{{url('addingvaccinetimingfromupdate', $advvacccine->id)}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      @csrf
                      <h1 style="text-align: center; margin-down: 20px">Add Vaccine Timing for</h1>
                      <h4 style="text-align: center; margin-down: 10px">Vaccine Name: {{$advvacccine->vname}}</h3>
                      <h4 style="text-align: center; margin-down: 10px">Vaccine Description: {{$advvacccine->vdescription}}</h3>
                      <!--code-->
                      <div class="form-group" id="toggle_box">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dcoordinator">Choose Vaccine Time<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="vtiming" class="form-control col-md-7 col-xs-12">
                              <option value="">Select Timing (in months)</option>
                              <option value="2">2</option>
                              <option value="4">4</option>
                              <option value="6">6</option>
                              <option value="8">8</option>
                              <option value="10">10</option>
                              <option value="12">12</option>
                              <option value="14">14</option>
                              <option value="16">16</option>
                          </select>
                        </div>
                      </div>
                      <!--footer-->
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="submit" class="btn btn-success">Add Vaccine Timing</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

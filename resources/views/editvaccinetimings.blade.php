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
                     <h2>Welcome <small>Editing Vaccine {{$advvacccine->vname}} Timings</small></h2>
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
                    <form action="{{url('updatevaccinetimings', $vaccine_timings[0]->v_id)}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <h1 style="text-align: center; margin-down: 20px">Edit Vaccine {{$advvacccine->vname}} Timing</h1>
                    <div class="form-group">
                      <table class="table table-hover">
                        <tr>
                          <th>Vaccine Timing (in months)</th>
                          <th>Delete</th>
                        </tr>
                        @foreach ($vaccine_timings as $vaccine_timing)
                        <tr>
                        <td>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="hidden" id="vt_id" name="vt_id[]" value="{{$vaccine_timing->id}}" required="required" class="form-control col-md-7 col-xs-12">
                              <select name="vtiming[]" class="form-control col-md-7 col-xs-12">
                                <option value="{{$vaccine_timing->vtiming}}">{{$vaccine_timing->vtiming}}</option>
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
                      </td>
                      <td>
                        <a href="{{ url('deletevaccinetiming/' . $vaccine_timing->id) }}">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                    </table>
                  </div>
                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="submit" class="btn btn-success">Update Vaccine Timings</button>
                          <button class="btn btn-primary label_margin" type="button" onclick="addvaccinetimingfromupdate()">Add New Vaccine Timing</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
<script>
  function addvaccinetimingfromupdate() {
    window.location = "{{url('addvaccinetimingfromupdate/' . $vaccine_timings[0]->v_id)}}";
}
</script>
@endsection

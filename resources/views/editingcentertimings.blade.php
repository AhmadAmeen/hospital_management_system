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
                     <h2>Welcome <small>Doctor Center Timings</small></h2>
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
                    <form action="{{url('updatecentertimings', $center_timings[0]->center_id)}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <h1 style="text-align: center; margin-down: 20px">Edit Center Timing Details</h1>
                    <div class="form-group">
                      <table class="table table-hove" style="background-color: white; color: black; padding-left: 10px">
                        <tr>
                          <th></th>
                          <th>FROM</th>
                          <th>TO</th>
                          <th>Delete</th>
                        </tr>
                        @foreach ($center_timings as $center_timing)
                         <tr style="padding: 5">
                           <td><input type="hidden" id="tid" name="tid[]" value="{{$center_timing->id}}" required="required" class="form-control col-md-7 col-xs-12"></td>
                           <td><input type="time" id="from" name="from[]" value="{{$center_timing->from}}" required="required" class="form-control col-md-7 col-xs-12"></td>
                           <td><input type="time" id="to" name="to[]" value="{{$center_timing->to}}" required="required" class="form-control col-md-7 col-xs-12"></td>
                           <td><a href="{{ url('deletecentertimings/' . $center_timing->id) }}">Delete</a></td>
                         </tr>
                        @endforeach
                    </table>
                  </div>
                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary label_margin" type="button" onclick="addcentertimingfromupdate()">Add Center Timings</button>
                            <button type="submit" name="submit" class="btn btn-success">Update Center Timings</button>
                        </div>
                      </div>
                    </form>
                    <button style="float: right" id="tovaccine" class="btn btn-success"><a href="docregform_docdetails" style="color: white;">Add New Doctor</a></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
<script>
  function addcentertimingfromupdate() {
    window.location = "{{url('addcentertimingfromupdate/' . $center_timing->center_id)}}";
}
</script>
@endsection

@if(!Session::has('recep_name_session'))
<script>window.location = "welcome";</script>
@endif

<link rel="stylesheet" type="text/css" href="{{ asset('public/css/table-css.css') }}" />

@extends('patientlayout.default')

@section('content')

  <div class="right_col" role="main"  >
   <div class="clearfix"></div>
             <div class="row" >
               <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="x_panel">
                   <div class="x_title">
                     <h2>Welcome <small>Vaccine History Details</small></h2>
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
                    <h1 style="text-align: center; margin-down: 20px">Vaccination History Details</h1>
                    <div class="form-group">
                      <div width="107" height="90">
                      <table id="vaccines_list" style="background-color: white">
                        <tr>
                          <th></th>
                        @foreach ($vaccines as $vaccine)
                            <th>{{ $vaccine->vtiming }}</th>
                        @endforeach
                        </tr>
                        <tr>
                      @foreach ($vaccines as $vaccine)
                        <tr>
                          <td>{{ $vaccine->vname }}</td>
                          @foreach ($vaccines as $vaccine)
                          <td><input type="checkbox" id="toggle" value="TRUE" name="check[]"></td>
                          @endforeach
                        </tr>
                      @endforeach
                      <table>
                    </div>
                  </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="submit" class="btn btn-success">Add Vaccine</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

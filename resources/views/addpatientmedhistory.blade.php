@if(!Session::has('recep_name_session'))
<script>window.location = "welcome";</script>
@endif

@extends('patientlayout.default')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('public/css/checkbox-etc-css.css') }}" />

  <div class="right_col" role="main">
   <div class="clearfix"></div>
             <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="x_panel">
                   <div class="x_title">
                     <h2>Welcome <small>Patient Medical History Details</small></h2>
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
                    <form action="{{url('patientmedhistorystore/' . $patient->id)}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      @csrf
                      <h1 style="text-align: center; margin-down: 20px">Medical History of:</h1>
                      <h3 style="text-align: center; margin-down: 10px">{{$patient->fname}} {{$patient->lname}}</h3>
                      <h3 style="text-align: center; margin-down: 10px">Guardian Phone No: {{$patient->guard_no}}</h3>
                      @for ($i = 0; $i < count($d_names); $i++)
                      <!--d_names-->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><h4>{{ $d_names[$i] }} : </h4><p>{{ $d_desc[$i] }}</p></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="b-contain">
                             <input type="checkbox" id="toggle" value="TRUE" name="check[]">
                             <input type="hidden" value="{{ $d_names[$i] }}" name="dname[]">
                             <input type="hidden" value="{{ $d_desc[$i] }}" name="disease_desc[]">
                            <div class="b-input">
                            </div>
                          </label>
                        </div>
                      </div>
                      @endfor
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="submit" class="btn btn-success">Confirm Medical History</button>
                        </div>
                      </div>
                    </form>
                    <button style="float: right" class="btn btn-success" onclick="vaccinehistoryview()">Add Vaccination History</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
  <script>
    function vaccinehistoryview() {
      window.location = "{{url('vaccinehistoryview/' . $patient->id)}}";
    }
  </script>
@endsection

<?php
//index.php
//hospital_management_system
//testing
$connect = mysqli_connect("localhost", "root", "", "hospital_management_system");
$chart_data = '';
    //foreach ($centers as $center) {
    // code...
    //echo $center->cname;
    $query = "SELECT * FROM test_center where center_name='C1'";
    $result = mysqli_query($connect, $query);
      while($row = mysqli_fetch_array($result))
      {
        $chart_data .= "{ date:'".$row["date"]."', scheduled_patients:".$row["scheduled_patients"]."}, ";
      }
    //}
    $chart_data = substr($chart_data, 0, -2);
?>

@if(!Session::has('admin_name_session') && !Session::has('doctor_name_session'))
<script>window.location = "welcome";</script>
@else
@extends(Session::has('admin_name_session') ? 'layout.default' : 'doctorlayout.default')
@endif
@section('content')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
 <link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
 <link rel="stylesheet" type="text/css" href="{{ asset('public/css/dashboard-css.css') }}" />
 <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Patients Visited</span>
              <div class="count">{{count($visit_histories)}}</div>
              <span class="count_bottom"><i class="green">{{round($patienschange)}}% </i> From last Month</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Average Visits</span>
              <div class="count">{{round(count($visit_histories)/7)}}</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{round($visit_historieschange)}}% </i> From last Month</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
              <div class="count green">{{count($males)}}</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{round($maleschange)}}% </i> From last Month</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
              <div class="count">{{count($females)}}</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-desc"></i>{{round($femaleschange)}}% </i> From last Month</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Active Patients</span>
              <div class="count">{{count($activepatients)}}</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{count($patients)}} </i> Total Patients</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Scheduled</span>
              <div class="count">{{count($schedules)}}</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{round($scheduleschange)}}% </i> From last Month</span>
            </div>
          </div>
          <!-- /top tiles -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">
                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Center Insights <small> <!--for month: {{date('m')}}--></small></h3>
                  </div>
                  <div class="col-md-6">
                  </div>
                <div style="float: right; padding: 5px">
                  <label for="from">From:</label>
                  <input style="padding: 5px" name="from" id="from" type="date" class="date"/>
                  <label for="to">To:</label>
                  <input style="padding: 5px" name="to" id="to" type="date" class="date"/>
                  <input type="button" onclick="updatedashboard()" id="to" name="to" required="required" placeholder="" class="btn btn-success" value="Submit">
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12" style="width: 70%">
                    <!--<div id="area-chart"></div>
                    <div id="demochart"></div>
                    -->
                    <div id="mychart"></div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 bg-white" style="float: right">
                  <div class="x_title">
                    <h2>Visit Types</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Physical Checkup: {{count($sch_checkup)}}</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{count($sch_checkup)*10}}"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>Vaccination: {{count($sch_vac)}}</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{count($sch_vac)*10}}"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Video Consultation: {{count($sch_vid)}}</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{count($sch_vid)*10}}"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                  <!--
                  <div class"row">
                  <div class="col-sm-6 text-center">
                     <label class="label label-success">Line Chart</label>
                    <div id="line-chart"></div>
                  </div>
                  <div  class="col-sm-6 text-center">
                     <label class="label label-success">Bar Chart</label>
                    <div id="bar-chart" ></div>
                  </div>
                  <div class="col-sm-6 text-center">
                     <label class="label label-success">Bar stacked</label>
                    <div id="stacked" ></div>
                  </div>
                  <div class="col-sm-6 col-sm-offset-3 text-center">
                     <label class="label label-success">Pie Chart</label>
                    <div id="pie-chart" ></div>
                  </div>
                </div>
              -->
              </div>
            </div>
          </div>
          <br/>
        </div>
       </div>
<script>

function updatedashboard() {
  if ($('#from').val() && $('#to').val()) {
    window.location = "{{url('updatedashboard')}}"+'/'+$('#from').val()+'/'+$('#to').val();
  }
}

Morris.Area({
 element : 'mychart',
 data:[<?php echo $chart_data; ?>],
 xkey:'date',
 ykeys:['scheduled_patients'],
 labels:['scheduled_patients'],
 hideHover:'auto',
 stacked:true,
 parseTime: false,
 resize: true,
 behaveLikeLine: false,
 pointFillColors:['#ffffff'],
 pointStrokeColors: ['black'],
 lineColors:['gray','red']
});

var data = [
      { y: '2014', a: 50, b: 190, c: 10, d: 110},
      { y: '2015', a: 5,  b: 45, c: 110, d: 50},
      { y: '2016', a: 16,  b: 115, c: 0, d: 57},
      { y: '2017', a: 35,  b: 25, c: 40, d: 20},
    ],
    config = {
      data: data,
      xkey: 'y',
      ykeys: ['a', 'b', 'c', 'd'],
      //labels: ['Total Income', 'Total Outcome'],
      fillOpacity: 0.5,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['gray','red']
  };
config.element = 'area-chart';
Morris.Area(config);
config.element = 'line-chart';
Morris.Line(config);
config.element = 'bar-chart';
Morris.Bar(config);
config.element = 'stacked';
config.stacked = true;
Morris.Bar(config);
Morris.Donut({
  element: 'pie-chart',
  data: [
    {label: "Friends", value: 30},
    {label: "Allies", value: 15},
    {label: "Enemies", value: 45},
    {label: "Neutral", value: 10}
  ]
});
</script>
@endsection

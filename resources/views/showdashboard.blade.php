
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
 <link rel="stylesheet" href="{{ asset('csd/css/owl.carousel.css') }}" type="text/css">
 <link href="{{ asset('csd/css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">
 <!-- Custom styles -->
 <link rel="stylesheet" href="{{ asset('csd/css/fullcalendar.css') }}">
 <link href="{{ asset('csd/css/widgets.css') }}" rel="stylesheet">
 <link href="{{ asset('csd/css/style.css') }}" rel="stylesheet">
 <link href="{{ asset('csd/css/style-responsive.css') }}" rel="stylesheet" />
 <link href="{{ asset('csd/css/jquery-ui-1.10.4.min.css') }}" rel="stylesheet">
  <script src="{{ asset('csd/js/highcharts.js') }}"></script>
  <script src="{{ asset('csd/js/exporting.js') }}"></script>
  <script src="{{ asset('csd/js/export-data.js') }}"></script>
  <script src="{{ asset('csd/js/data.js') }}"></script>
  <script src="{{ asset('csd/js/drilldown.js') }}"></script>
  <script src="{{ asset('csd/js/highcharts-3d.js') }}"></script>
  <script src="{{ asset('csd/js/rounded-corners.js') }}"></script>

<style style="text/css">

/* Define the default color for all the table rows */
.hoverTable tr{
 background: #fff;
}
/* Define the hover highlight color for the table row */
 .hoverTable tr:hover {
       background-color: #eee;
 }

.circle {
   width: 500px;
   height: 300px;
   background: red;
   border-radius: 50%
 }

.blue-bg {
background: #b90000;
/* fallback for old browsers */
background: -webkit-linear-gradient(to right, #b90000, #ff0602);
/* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #b90000, #ff0602);
/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

.bg {
background: url('img/bg.jpg');
background-repeat: no-repeat;
background-position: top;
 background-size: contain;
 height: 500px;
}

/*
body {
background-image: url("img/bg.jpg"), url("img/bg.jpg");
background-color: #cccccc;
}
*/

body {
background: url('img/bg9.jpg') no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
background-size: cover;
-o-background-size: cover;
}


</style>

        <!-- page content -->
        <div class="right_col" role="main" style="color: #229120">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Patients Visited</span>
              <div class="count">{{count($visit_histories)}}</div>
              <span class="count_bottom" ><i class="green">{{round($patienschange)}}% </i> From last Month</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Average Visits</span>
              <div class="count">{{round(count($visit_histories)/7)}}</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{round($visit_historieschange)}}% </i> From last Month</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
              <div class="count green"  style="color: green">{{count($males)}}</div>
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
                    <h3>Patients Scheduled: <small> For next 15 days </small></h3>
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
                  <div class="row">
                    <div class="col-md-12">
                      <div style="margin-top:0px; background-color:#fff; color:#000; font-size:14px; font-weight:bold; padding:5px;border-radius:0px 25px 0px 0px;"></div>
              					<div class="info-box white-bg" style="border-top: 2px solid #229120; height:250px;border-radius:0px 0px 25px 25px;">
              					<div id="chart2" name="chart2" style="min-width: 300px; height: 200px; margin: 0 auto"></div>
            					</div>
                    </div>
                  </div>
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
              </div>
            </div>
          </div>
          <br/>
        </div>
       </div>
        <!-- javascripts -->
        <script src="{{ asset('csd/js/jquery.js') }}"></script>
  	    <script src="{{ asset('csd/js/jquery-ui-1.10.4.min.js') }}"></script>
        <script src="{{ asset('csd/js/jquery-1.8.3.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('csd/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
        <!-- bootstrap -->
        <script src="{{ asset('csd/js/bootstrap.min.js') }}"></script>
        <!-- nice scroll -->
        <script src="{{ asset('csd/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('csd/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
        <!-- charts scripts -->
        <script src="assets/jquery-knob/{{ asset('csd/js/jquery.knob.js') }}"></script>
        <!-- <script src="{{ asset('csd/js/jquery.sparkline.js') }}" type="text/javascript"></script> -->
        <!-- <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script> -->
        <script src="{{ asset('csd/js/owl.carousel.js') }}" ></script>
        <script src="{{ asset('csd/js/scripts.js') }}"></script>
       	<script src="{{ asset('csd/js/jquery.autosize.min.js') }}"></script>
       	<script src="{{ asset('csd/js/jquery.placeholder.min.js') }}"></script>
       	<script src="{{ asset('csd/js/gdp-data.js') }}"></script>
       	<script src="{{ asset('csd/js/jquery.slimscroll.min.js') }}"></script>

  <script>
             //knob
             $(function() {
               $(".knob").knob({
                 'draw' : function () {
                   $(this.i).val(this.cv + '%')
                 }
               })
             });

             //carousel
             $(document).ready(function() {

       	  $(document).on("click", "#tableId tbody tr", function() {
             //alert("hi");
       	  inventory_details();
           });
                 $("#owl-slider").owlCarousel({
                     navigation : true,
                     slideSpeed : 300,
                     paginationSpeed : 400,
                     singleItem : true

                 });
             });

             //custom select box

             //$(function(){
                 //$('select.styled').customSelect();
             //});

       	  /* ---------- Map ---------- */
       	/*
       	$(function(){
       	  $('#map').vectorMap({
       	    map: 'world_mill_en',
       	    series: {
       	      regions: [{
       	        values: gdpData,
       	        scale: ['#000', '#000'],
       	        normalizeFunction: 'polynomial'
       	      }]
       	    },
       		backgroundColor: '#eef3f7',
       	    onLabelShow: function(e, el, code){
       	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
       	    }
       	  });
       	});
       	*/
         </script>
       	<script>

       /*
       Highcharts.chart('chart1', {
           chart: {
               type: 'column'
           },
           title: {
               text: ''
           },
       	credits: {
               enabled: false
           },
           xAxis: {
               categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']
           },
           yAxis: {
               min: 0,
               title: {
                   text: ''
               },
               stackLabels: {
                   enabled: true,
                   style: {
                       fontWeight: 'bold',
                       color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                   }
               }
           },
           legend: {
               title: {
                   text: 'Vaccines<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click to hide)</span>',
                   style: {
                       fontStyle: 'italic',
                       fontweight: 'bold'
                   }
               },
               layout: 'vertical',
               align: 'right',
               verticalAlign: 'top',
               x: -10,
               y: 100
           },
           tooltip: {
               headerFormat: '<b>{point.x}</b><br/>',
               pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
           },
           plotOptions: {
               column: {
                   stacking: 'normal',
                   dataLabels: {
                       enabled: true,
                       color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                   }
               }
           },
           series: [{
       		pointWidth: 12,
               name: 'Vaccine 1',
       		color: '#c51314',
               data: [1, 0, 0, 0, 0,0,0,0,0,0,0,0]
           }, {
       		pointWidth: 12,
               name: 'Vaccine 2',
       		color: '#8338bd',
               data: [1, 1, 0, 0, 1,1,1,1,1,1,1,1]
           }, {
       		pointWidth: 12,
               name: 'Vaccine 3',
       		color:'#ff5227',
               data: [0, 1, 0, 0, 1,1,1,1,1,1,1,1]
           }, {
       		pointWidth: 12,
               name: 'Vaccine 4',
       		color: '#ff9a00',
               data: [0, 0, 1, 0, 1,1,1,0,1,1,1,1]
           }, {
       		pointWidth: 12,
               name: 'Vaccine 5',
       		color:'#003858',
               data: [0, 0, 0, 1, 1,1,0,1,0,1,0,1]
           }, {
       		pointWidth: 12,
               name: 'Vaccine 6',
       		color:'#0fa953',
               data: [0, 0, 0, 1, 1,1,1,1,0,1,1,1]
           }, {
       		pointWidth: 12,
               name: 'Vaccine 7',
       		color:'#ff2759',
               data: [0, 0, 0, 1, 1,1,1,1,0,1,1,1]
           }, {
       		pointWidth: 12,
               name: 'Vaccine 8',
       		color:'#0bafca',
               data: [0, 0, 0, 1, 1,1,1,1,0,1,1,1]
           }]
       });
       */
       var x_axis = <?php echo json_encode($x_axis) ?>;
       var center_sch_pats = <?php echo json_encode($center_sch_pats) ?>;
       center_sch_pats = center_sch_pats.replace(/['"]+/g, '');

       // Chart2
       Highcharts.chart('chart2', {
       	chart: {
               type: 'line',
           //spacingTop: 0,
                   spacingRight: 5,
                   spacingBottom: 0,
                   spacingLeft: 50,
                   //plotBorderWidth: 0,
                   marginRight: 5,
              marginLeft: 50,//-60,  //whenever the page changes width
                   marginTop: 10,
                   //marginBottom: 0
           },
           title: {
               text: ''
           },

           legend: {
               // layout: 'horizontal', // default
               itemDistance: 50
           },
       	credits: {
               enabled: false
           },
           xAxis: {
               categories: JSON.parse(x_axis)
           },
       	yAxis: {
               labels: {
                   format: '{value}'
               }
           },
           series: [{
       		name:'Total Scheduled Patients',
       		color:'#49eb34',
               data: JSON.parse(center_sch_pats)
           }]
       });

       // Chart3
       Highcharts.chart('chart3', {
       	chart: {
               type: 'line',
           //spacingTop: 0,
                   spacingRight: 5,
                   spacingBottom: 0,
                   spacingLeft: 50,
                   //plotBorderWidth: 0,
                   marginRight: 5,
              marginLeft: 50,//-60,  //whenever the page changes width
                   marginTop: 10,
                   //marginBottom: 0
           },
           title: {
               text: ''
           },

           legend: {
               // layout: 'horizontal', // default
               itemDistance: 50
           },
       	credits: {
               enabled: false
           },
           xAxis: {
               categories: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12']
           },
       	yAxis: {
               labels: {
                   format: '{value} kg'
               }
           },
           series: [{
       		name:'Actual',
       		color:'#ff2759',
               data: [1, 2.2, 3.5, 4, 5, 5.2, 5.7, 6, 6.7, 6.7, 8, 9]
           }, {
       		name:'Expected',
       		color:'#034a73',
               data: [3, 3.5, 4, 4.5, 5, 5.7, 5.9, 6.5, 7, 8, 9, 10]
           }]
       });

       // Chart4
       Highcharts.chart('chart4', {
       	chart: {
               type: 'line',
           //spacingTop: 0,
                   spacingRight: 5,
                   spacingBottom: 0,
                   spacingLeft: 50,
                   //plotBorderWidth: 0,
                   marginRight: 5,
              marginLeft: 50,//-60,  //whenever the page changes width
                   marginTop: 10,
                   //marginBottom: 0
           },
           title: {
               text: ''
           },

           legend: {
               // layout: 'horizontal', // default
               itemDistance: 50
           },
       	credits: {
               enabled: false
           },
           xAxis: {
               categories: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12']
           },
       	yAxis: {
               labels: {
                   format: '{value} cm'
               }
           },
           series: [{
       		name:'Actual',
       		color:'#0fa953',
               data: [6, 6.3, 6.9, 7, 7.1, 7.1, 7.2, 7.3, 7.4, 7.4, 7.6, 7.8]
           }, {
       		name:'Expected',
       		color:'#034a73',
               data: [6, 6, 6.6, 7, 7, 7.1, 7.5, 7.5, 7.7, 7.8, 7.9, 8.0]
           }]
       });


       // Chart5
       Highcharts.chart('chart5', {
           chart: {
               type: 'column'
           },
           title: {
               text: ''
           },
       	credits: {
               enabled: false
           },
           xAxis: {
               type: 'category',
               labels: {
                   enabled: true
               }
           },


           legend: {
               enabled: false
           },

           plotOptions: {
               series: {
                   borderWidth: 0,
                   dataLabels: {
                       enabled: true
                   }
               }
           },

           series: [{
           		pointWidth:20,
               name: 'Diagnosis',
               colorByPoint: true,
               data: [{
                   name: '<a href="#" class="clickable" data-browser="ff" style="color:#007ec7">Cough</a>',
                   y: 6,
                   color: '#005b9e'
               },{
                   name: '<a href="#" class="clickable" data-browser="ff" style="color:#007ec7">Bronchitis</a>',
                   y: 2,
                   color: '#005b9e'
               },{
                   name: '<a href="#" class="clickable" data-browser="ff" style="color:#007ec7">Bronchiloitis</a>',
                   y: 4,
                   color: '#005b9e'
               },{
                   name: '<a href="#" class="clickable" data-browser="ff" style="color:#007ec7">Common Cold</a>',
                   y: 3,
                   color: '#005b9e'
               },{
                   name: '<a href="#" class="clickable" data-browser="ff" style="color:#007ec7">Respiratory Syntical Virus</a>',
                   y: 5,
                   color: '#005b9e'
               },{
                   name: '<a href="#" class="clickable" data-browser="ff" style="color:#007ec7">Gastroenteritis</a>',
                   y: 8,
                   color: '#005b9e'
               }]
           }]
       });

           function showDetails() {

           var x = document.getElementById("show_details");
           if (x.style.display === "none") {
           //x.style.display = "block";
           $("#show_details").show()
           } else {
           x.style.display = "none";
           }

           //$("#show_details").show()

           }

       	function load_pie() {

       		alert('hi');
       	}

       	</script>

       	<script>

        Highcharts.chart('chart6', {
           chart: {
               type: 'pie',
               options3d: {
                   enabled: false,
                   alpha: 25
               }
           },
           title: {
               text: ''
           },
           subtitle: {
               text: ''
           },
       	credits: {
       		enabled: false
       	},
           plotOptions: {
               pie: {
                   innerSize: 70,
                   depth: 15
               }
           },
           series: [{
               name: 'Remaining Items',
               data: [{
                    y: 8,
       			name: "Syp Metronidazole ",
       			color: "#0178bc"
       			},
       			{
                   y: 3,
       			name:'Syp Zinc',
       			color:"#00bcda"
       			},
                   {
       			y: 2,
       			name:'Cough Suppressants',
       			color: "#4fa7da"
       			},
                   {
       			y: 6,
       			name:'Syp Paracetamol',
       			color:"#efb636"
       			},
       			{
       			y:5,
       			name:'Simethicone drops',
       			color:"#37ca78"
       			}

               ]
           }]
       });
       	</script>

<script>

function updatedashboard() {
  if ($('#from').val() && $('#to').val()) {
    window.location = "{{url('updatedashboard')}}"+'/'+$('#from').val()+'/'+$('#to').val();
  }
}
</script>

@endsection


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="{{ asset('csd/img/favicon.ico') }}">

    <title>Child Specialist Doctor</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('csd/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{ asset('csd/css/bootstrap-theme.css') }}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{ asset('csd/css/elegant-icons-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('csd/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- full calendar css-->
    <!-- easy pie chart-->

    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('csd/css/owl.carousel.css') }}" type="text/css">
	<link href="{{ asset('csd/css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">
    <!-- Custom styles -->
	<link rel="stylesheet" href="{{ asset('csd/css/fullcalendar.css') }}">
	<link href="{{ asset('csd/css/widgets.css') }}" rel="stylesheet">
    <link href="{{ asset('csd/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('csd/css/style-responsive.css') }}" rel="stylesheet" />

	<link href="{{ asset('csd/css/jquery-ui-1.10.4.min.css') }}" rel="stylesheet">

    <!-- =======================================================
        Theme Name: Child Specialist Doctor
        Theme URL:
        Author: Syed Sammar Zaidi
        Author URL: http://sammarzaidi.com
    ======================================================= -->

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
	background: url('csd/img/bg9.jpg');
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
  background: url("{{ asset('csd/img/bg9.jpg')}}") no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  -o-background-size: cover;
}


</style>
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <header class="header grad-bg">
            <!--logo start-->
            <a href="index.html" class="logo" style="color:#ffeb00">Child<span class="" style="color:#fff"> Specialist</span></a>
            <!--logo end-->
            <div class="nav search-row" id="top_menu">
            </div>
            <div class="top-nav notification-row">
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="{{ asset('csd/img/avatar1_small.jpg') }}">
                            </span>
                            <span class="username">Admin</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="#" style="color:#003858"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="#" style="color:#003858"><i class="icon_mail_alt"></i> Change Password</a>
                            </li>
                            <li>
                                <a href="login.html" style="color:#003858"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                            <li>
                                <a href="#"><i></i> </a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>
      <!--header end-->

      <!--sidebar start-->

      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--overview start-->
			  <div class="row" >
				<div class="col-lg-12">
					<h3 class="page-header" style="color:#008bda; font-weight:bold"><i class="fa fa-laptop" style="color:#008bda"></i> Dashboard</h3>
					<ol class="breadcrumb" style="background-color:#fff">
						<li><i class="fa fa-home" style="color:#0195e8"></i><a href="index.html" style="color:#0195e8">Home</a></li>
						<li><i class="fa fa-laptop" style="color:#128043"></i><span style="color:#128043">Dashboard</span></li>
					</ol>
				</div>
			</div>
     <div class="row">
				<div class="col-lg-12 col-md-12" >
				<div style="margin-top:0px; background-color:#fff; color:#000; font-size:14px; font-weight:bold; padding:5px;border-radius:0px 25px 0px 0px;">Vaccination History (Monthly)</div>
					<div class="info-box white-bg" style="border-top: 2px solid #0094e8; height:250px">
						<div class="col-lg-3 col-md-3">
							<img src="{{ asset('csd/img/ages.png') }}" style="width:280px; height:120px">
						</div>
						<div class="col-lg-3 col-md-3">

              @foreach ($vacc_histories_t as $vh_t)
               <div class="checkbox">
                <label><input type="checkbox" value="" checked>Name: {{$vh_t->vname}} Type: {{$vh_t->vt_type}} </label>
              </div>
              @endforeach
				   </div>
						<div class="col-md-2">
						<div class="row blue-bg" style="height:60px">
            <div class="col-sm-3"><span class="fa fa-bell fa-2x pull-center" style="margin-top:15px" ></span></div>
            <div class="col-sm-9">
              <h4>
        			<b>ALERT!</b>
					      <p>You Have Missed</p>
        		 </h4>
            </div>
          </div>
    <!--
      <div class="checkbox">
        <label><input type="checkbox" value="">MMR** vaccine protects against rubella
        </label>
      </div>
    -->
    </div>
      <!--/.info-box-->
					<div class="col-md-4">
					<div class="info-box white-bg" style="border-top: 2px solid #00bcda;">

						<div class="col-md-8" style="color:#00bcda; font-weight:bold">Medical History
          @foreach($medical_histories as $medical_history)
            <div class="checkbox">
              <label style="color:#000;"><input type="checkbox" value="" checked>{{$medical_history->dname}}
            </label>
						</div>
          @endforeach
          </div>
            <div class="col-md-4">
						<img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive">
						</div>
					</div>
				</div>
			</div>
		    <!-- Today status end -->
			<div class="row">
				<div class="col-md-4">
					<div style="margin-top:0px; background-color:#fff; color:#000; font-size:14px; font-weight:bold; padding:5px;border-radius:0px 25px 0px 0px;">Height</div>
					<div class="info-box white-bg" style="border-top: 2px solid #0069a5; height:250px;border-radius:0px 0px 25px 25px;">
					<div id="chart2" name="chart2" style="min-width: 300px; height: 200px; margin: 0 auto"></div>
					</div>
				</div>
				<div class="col-md-4">
					<div style="margin-top:0px; background-color:#fff; color:#000; font-size:14px; font-weight:bold; padding:5px;border-radius:0px 25px 0px 0px;">Weight</div>
					<div class="info-box white-bg" style="border-top: 2px solid #0094e7; height:250px;border-radius:0px 0px 25px 25px;">
					<div id="chart3" name="chart3" style="min-width: 300px; height: 200px; margin: 0 auto"></div>
					</div>
				</div>
				<div class="col-md-4">
					<div style="margin-top:0px; background-color:#fff; color:#000; font-size:14px; font-weight:bold; padding:5px;border-radius:0px 25px 0px 0px;">Head Size</div>
					<div class="info-box white-bg" style="border-top: 2px solid #18a257; height:250px;border-radius:0px 0px 25px 25px;">
					<div id="chart4" name="chart4" style="min-width: 300px; height: 200px; margin: 0 auto"></div>
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-md-6">
					<div style="margin-top:0px; background-color:#fff; color:#000; font-size:14px; font-weight:bold; padding:5px;border-radius:0px 25px 0px 0px;">Diagnosis Details </div>
					<div class="info-box white-bg" style="border-top: 2px solid #003858; height:250px;border-radius:0px 0px 25px 25px;">
					<div id="chart5" name="chart5" style="min-width: 300px; height: 200px; margin: 0 auto"></div>
					</div>
				</div>
				<div class="col-md-6">
					<div style="margin-top:0px; background-color:#fff; color:#000; font-size:14px; font-weight:bold; padding:5px;border-radius:0px 25px 0px 0px;">Perscription Details</div>
					<div class="info-box white-bg" style="border-top: 2px solid #ff2759; height:250px;border-radius:0px 0px 25px 25px;">
					<div id="chart6" name="chart6" style="min-width: 300px; height: 200px; margin: 0 auto"></div>
				</div>
			</div>
		</div>
        <!-- statics end -->
        </section>
          <div class="text-right">
          <div class="credits" style="background-color:#fff; height:30px; padding:5px">
                <!--
                    All the links in the footer should remain intact.
                    You can delete the links only if you purchased the pro version.
                    Licensing information: http://sammarzaidi.com/dental_inventory/license/
                    Purchase the pro version form: http://sammarzaidi.com/buy/?theme=dental_inventory
                -->
                <span style="font-size:10px; color:#000; padding:5px">
				Designed By: <a href="#">Syed Sammar Zaidi</a>
				</span>
          </div>
        </div>
      </section>
      <!--main content end-->
  </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

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
    <!-- jQuery full calendar -->
    <!-- <<script src="{{ asset('csd/js/fullcalendar.min.js') }}"></script> -->
	<!-- <script src="assets/fullcalendar/fullcalendar/fullcalendar.js') }}"></script> -->
    <!--script for this page only-->
    <!-- <script src="{{ asset('csd/js/calendar-custom.js') }}"></script> -->
	<!-- <script src="{{ asset('csd/js/jquery.rateit.min.js') }}"></script> -->
    <!-- custom select -->
    <!-- <script src="{{ asset('csd/js/jquery.customSelect.min.js') }}" ></script> -->
	<!-- <script src="assets/chart-master/Chart.js') }}"></script> -->

    <!--custome script for all page-->
    <script src="{{ asset('csd/js/scripts.js') }}"></script>
    <!-- custom script for this page-->
    <!-- <script src="{{ asset('csd/js/sparkline-chart.js') }}"></script> -->
    <!-- <script src="{{ asset('csd/js/easy-pie-chart.js') }}"></script> -->
	<!-- <script src="{{ asset('csd/js/jquery-jvectormap-1.2.2.min.js') }}"></script> -->
	<!-- <script src="{{ asset('csd/js/jquery-jvectormap-world-mill-en.js') }}"></script> -->
	<!-- <script src="{{ asset('csd/js/xcharts.min.js') }}"></script> -->
	<script src="{{ asset('csd/js/jquery.autosize.min.js') }}"></script>
	<script src="{{ asset('csd/js/jquery.placeholder.min.js') }}"></script>
	<script src="{{ asset('csd/js/gdp-data.js') }}"></script>
	<!-- <script src="{{ asset('csd/js/morris.min.js') }}"></script> -->
	<!-- <script src="{{ asset('csd/js/sparklines.js') }}"></script>	 -->
	<!-- <script src="{{ asset('csd/js/charts.js') }}"></script> -->
	<script src="{{ asset('csd/js/jquery.slimscroll.min.js') }}"></script>
  <script>
  var arrmed = <?php echo json_encode($arrmed) ?>;
  var arrdiag = <?php echo json_encode($arrdiag) ?>;
  var hs = <?php echo json_encode($visit_history_hs) ?>;
  var ex_hs = <?php echo json_encode($ex_hs) ?>;
  var len = <?php echo json_encode($visit_history_len) ?>;
  var ex_len = <?php echo json_encode($ex_len) ?>;
  var w = <?php echo json_encode($visit_history_w) ?>;
  var ex_w = <?php echo json_encode($ex_w) ?>;
  var x_axis = <?php echo json_encode($x_axis) ?>;
  //x_axis = x_axis.replace(/['"]+/g, '');
  hs = hs.replace(/['"]+/g, '');
  ex_hs = ex_hs.replace(/['"]+/g, '');
  len = len.replace(/['"]+/g, '');
  ex_len = ex_len.replace(/['"]+/g, '');
  w = w.replace(/['"]+/g, '');
  ex_w = ex_w.replace(/['"]+/g, '');
  //alert(hs.replace(/['"]+/g, ''));
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
  </script>
	<script>

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
            format: '{value} inch'
        }
    },
    series: [{
		name:'Actual',
		color:'#8338bd',
        data: JSON.parse(hs)
    }, {
		name:'Expected',
		color:'#034a73',
      data: JSON.parse(ex_hs)
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
        categories: JSON.parse(x_axis)
    },
	yAxis: {
        labels: {
            format: '{value} kg'
        }
    },
    series: [{
		name:'Actual',
		color:'#ff2759',
      data: JSON.parse(len)
    }, {
		name:'Expected',
		color:'#034a73',
      data: JSON.parse(ex_len)
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
        categories: JSON.parse(x_axis)
    },
	yAxis: {
        labels: {
            format: '{value} cm'
        }
    },
    series: [{
		name:'Actual',
		color:'#0fa953',
      data: JSON.parse(w)
    }, {
		name:'Expected',
		color:'#034a73',
      data: JSON.parse(ex_w)
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
        data: JSON.parse(arrdiag)
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
  // ["apple","orange",1,false,null,true,8];
  // access 4th element in array
  //alert( ar )

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
        name: 'All time Count:',
        data: JSON.parse(arrmed)
    }]
});
  </script>
 </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

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
</style>
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <header class="header grad-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom" style="color:#fff"><i class="icon_menu"></i></div>
            </div>
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
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            <span class="username"> {{$doctor->dname}}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
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
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li class="active">
                      <a class="" href="index.html">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Forms</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="form_component.html">Form 1</a></li>
                          <li><a class="" href="form_validation.html">Form 2</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Reports</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="general.html">Report 1</a></li>
                          <li><a class="" href="buttons.html">Report 2</a></li>
                          <li><a class="" href="grids.html">Report 3</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Settings</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="general.html">Users</a></li>
                          <li><a class="" href="buttons.html">Roles</a></li>
                          <li><a class="" href="grids.html">Access</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Pages</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="profile.html">Profile</a></li>
                          <li><a class="" href="login.html"><span>Login Page</span></a></li>
                          <li><a class="" href="blank.html">Blank Page</a></li>
                          <li><a class="" href="404.html">404 Error</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--overview start-->
			  <div class="row" >
				<div class="col-lg-12" >
					<h3 class="page-header" style="color:#003858"><i class="fa fa-laptop"></i> Dashboard</h3>
					<ol class="breadcrumb" style="background-color:#fff">
						<li><i class="fa fa-home" style="color:#003858"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-laptop" style="color:#ff5327"></i><span style="color:#ff5327">Dashboard</span></li>
					</ol>
				</div>
			</div>
       <div class="row">
				<div class="col-lg-9 col-md-9">
				<div style="margin-top:0px; background-color:#fff; color:#000; font-size:14px; font-weight:bold; padding:5px">Vaccination History (Monthly)</div>
					<div class="info-box white-bg" style="border-top: 2px solid #ff5327;">
						<div id="chart1" name="chart1" style="min-width: 600px; height: 300px; margin: 0 auto"></div>
					</div><!--/.info-box-->
				</div>
          <div class="col-md-3">
					<div style="margin-top:0px; background-color:#fff; color:#000; font-size:14px; font-weight:bold; padding:5px">Medical History</div>
					<div class="info-box white-bg" style="border-top: 2px solid #003858;">
					<div class="form-check">
					<label>
						<input type="checkbox" name="check" checked> <span class="label-text">Medical Issue 1</span>
					</label>
				</div>
				<div class="form-check">
					<label>
						<input type="checkbox" name="check"> <span class="label-text">Medical Issue 2</span>
					</label>
				</div>
				<div class="form-check">
					<label>
						<input type="checkbox" name="check"> <span class="label-text">Medical Issue 3</span>
					</label>
				</div>
				<div class="form-check">
					<label>
						<input type="checkbox" name="check"> <span class="label-text">Medical Issue 4</span>
					</label>
				</div>
				<div class="form-check">
					<label>
						<input type="checkbox" name="check"> <span class="label-text">Medical Issue 5</span>
					</label>
				</div>
				<div class="form-check">
					<label>
						<input type="checkbox" name="check"> <span class="label-text">Medical Issue 6</span>
					</label>
				</div>
				<div class="form-check">
					<label>
						<input type="checkbox" name="check"> <span class="label-text">Medical Issue 7</span>
					</label>
				</div>
				<div class="form-check">
					<label>
						<input type="checkbox" name="check"> <span class="label-text">Medical Issue 8</span>
					</label>
				</div>
				<div class="form-check">
					<label>
						<input type="checkbox" name="check"> <span class="label-text">Medical Issue 9</span>
					</label>
				</div>
				<div class="form-check">
					<label>
						<input type="checkbox" name="check"> <span class="label-text">Medical Issue 10</span>
					</label>
				</div>
				<div class="form-check">
					<label>
						<input type="checkbox" name="check" disabled> <span class="label-text">Medical Issue 11</span>
					</label>
				</div>

					</div><!--/.info-box-->
				</div>
			</div>


		  <!-- Today status end -->
			<div class="row">
				<div class="col-md-4">
					<div style="margin-top:0px; background-color:#fff; color:#000; font-size:14px; font-weight:bold; padding:5px">Height</div>
					<div class="info-box white-bg" style="border-top: 2px solid #8338bd; height:250px">
					<div id="chart2" name="chart2" style="min-width: 300px; height: 200px; margin: 0 auto"></div>
					</div>
				</div>
				<div class="col-md-4">
					<div style="margin-top:0px; background-color:#fff; color:#000; font-size:14px; font-weight:bold; padding:5px">Weight</div>
					<div class="info-box white-bg" style="border-top: 2px solid #ff2759; height:250px">
					<div id="chart3" name="chart3" style="min-width: 300px; height: 200px; margin: 0 auto"></div>
					</div>
				</div>
				<div class="col-md-4">
					<div style="margin-top:0px; background-color:#fff; color:#000; font-size:14px; font-weight:bold; padding:5px">Head Size</div>
					<div class="info-box white-bg" style="border-top: 2px solid #0fa953; height:250px">
					<div id="chart4" name="chart4" style="min-width: 300px; height: 200px; margin: 0 auto"></div>
					</div>
				</div>

			</div>

			<div class="row">
				<div class="col-md-6">
					<div style="margin-top:0px; background-color:#fff; color:#000; font-size:14px; font-weight:bold; padding:5px">Diagnosis Details Monthly</div>
					<div class="info-box white-bg" style="border-top: 2px solid #003858; height:250px">
					<div id="chart5" name="chart5" style="min-width: 300px; height: 200px; margin: 0 auto"></div>
					</div>
				</div>
				<div class="col-md-6">
					<div style="margin-top:0px; background-color:#fff; color:#000; font-size:14px; font-weight:bold; padding:5px">Perscription Details</div>
					<div class="info-box white-bg" style="border-top: 2px solid #ff2759; height:250px">
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
  <!-- container section start -->

    <!-- javascripts -->
    <script src="js/jquery.js"></script>
	<script src="js/jquery-ui-1.10.4.min.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <!-- <script src="js/jquery.sparkline.js" type="text/javascript"></script> -->
    <!-- <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script> -->
    <script src="js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <!-- <<script src="js/fullcalendar.min.js"></script> -->
	<!-- <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script> -->
    <!--script for this page only-->
    <!-- <script src="js/calendar-custom.js"></script> -->
	<!-- <script src="js/jquery.rateit.min.js"></script> -->
    <!-- custom select -->
    <!-- <script src="js/jquery.customSelect.min.js" ></script> -->
	<!-- <script src="assets/chart-master/Chart.js"></script> -->

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <!-- <script src="js/sparkline-chart.js"></script> -->
    <!-- <script src="js/easy-pie-chart.js"></script> -->
	<!-- <script src="js/jquery-jvectormap-1.2.2.min.js"></script> -->
	<!-- <script src="js/jquery-jvectormap-world-mill-en.js"></script> -->
	<!-- <script src="js/xcharts.min.js"></script> -->
	<script src="js/jquery.autosize.min.js"></script>
	<script src="js/jquery.placeholder.min.js"></script>
	<script src="js/gdp-data.js"></script>
	<!-- <script src="js/morris.min.js"></script> -->
	<!-- <script src="js/sparklines.js"></script>	 -->
	<!-- <script src="js/charts.js"></script> -->
	<script src="js/jquery.slimscroll.min.js"></script>
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
        categories: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12']
    },
	yAxis: {
        labels: {
            format: '{value} inch'
        }
    },
    series: [{
		name:'Actual',
		color:'#8338bd',
        data: [6, 6.3, 6.9, 7, 7.1, 7.1, 7.2, 7.3, 7.4, 7.4, 7.6, 7.8]
    }, {
		name:'Expected',
		color:'#034a73',
        data: [6, 6, 6.6, 7, 7, 7.1, 7.5, 7.5, 7.7, 7.8, 7.9, 8.0]
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
    		pointWidth:5,
        name: 'Diagnosis',
        colorByPoint: true,
        data: [{
            name: '<a href="#" class="clickable" data-browser="ff" style="color:#007ec7" onClick="load_pie();">01</a>',
            y: 3,
            color: '#005b9e'
        },{
            name: '<a href="#" class="clickable" data-browser="ff" style="color:#007ec7">02</a>',
            y: 2,
            color: '#005b9e'
        },{
            name: '<a href="#" class="clickable" data-browser="ff" style="color:#007ec7">03</a>',
            y: 1,
            color: '#005b9e'
        },{
            name: '<a href="#" class="clickable" data-browser="ff" style="color:#007ec7">04</a>',
            y: 5,
            color: '#005b9e'
        },{
            name: '<a href="#" class="clickable" data-browser="ff" style="color:#007ec7">05</a>',
            y: 4,
            color: '#005b9e'
        },{
            name: '<a href="#" class="clickable" data-browser="ff" style="color:#007ec7">06</a>',
            y: 3,
            color: '#005b9e'
        },{
            name: '<a href="#" class="clickable" data-browser="ff" style="color:#007ec7">07</a>',
            y: 0,
            color: '#005b9e'
        },{
            name: '<a href="#" class="clickable" data-browser="ff" style="color:#007ec7">08</a>',
            y: 4,
            color: '#005b9e'
        },{
            name: '<a href="#" class="clickable" data-browser="ff" style="color:#007ec7">09</a>',
            y: 1,
            color: '#005b9e'
        },{
            name: '<a href="#" class="clickable" data-browser="ff" style="color:#007ec7">10</a>',
            y: 3,
            color: '#005b9e'
        },{
            name: '<a href="#" class="clickable" data-browser="ff" style="color:#007ec7">11</a>',
            y: 0,
            color: '#005b9e'
        },{
            name: '<a href="#" class="clickable" data-browser="ff" style="color:#007ec7">12</a>',
            y: 2,
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
			name: "Acetaminophen ",
			color: "#0178bc"
			},
			{
            y: 3,
			name:'Ibuprofen',
			color:"#00bcda"
			},
            {
			y: 2,
			name:'Cough Suppressants',
			color: "#4fa7da"
			},
            {
			y: 6,
			name:'Decongestants',
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



  </body>
</html>

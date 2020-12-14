<!DOCTYPE html>
<html lang="en">
<body>

    <!-- top navigation -->
    @include('doctorlayout/header')
   <!-- /top navigation -->

   <!-- sidebar menu -->
   @include('doctorlayout/sidebar')
   <!-- /sidebar menu -->

    <!-- page content -->
    @yield('content')
    <!-- /page content -->

    <!-- footer content -->
    <footer style="padding-top: 35px;">
       <!--<form action="/action_page.php">-->
       <div class="clearfix"></div>
       <div class="pull-right">
         Hospital Management System <a href="#">Visit Our Site</a>
       </div>
       <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->

      </div>
        </div>

      <!-- jQuery -->
      <script src="{{ asset ('public/gentelella-master/vendors/jquery/dist/jquery.min.js') }}"></script>
      <!-- Bootstrap -->
      <script src="{{ asset ('public/gentelella-master/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
      <!-- FastClick -->
      <script src="{{ asset ('public/gentelella-master/vendors/fastclick/lib/fastclick.js') }}"></script>
      <!-- NProgress -->
      <script src="{{ asset ('public/gentelella-master/vendors/nprogress/nprogress.js') }}"></script>
      <!-- Chart.js -->
      <script src="{{ asset ('public/gentelella-master/vendors/Chart.js/dist/Chart.min.js') }}"></script>
      <!-- jQuery Sparklines -->
      <script src="{{ asset ('public/gentelella-master/vendors/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
      <!-- morris.js -->
      <script src="{{ asset ('public/gentelella-master/vendors/raphael/raphael.min.js') }}"></script>
      <script src="{{ asset ('public/gentelella-master/vendors/morris.js/morris.min.js') }}"></script>
      <!-- gauge.js -->
      <script src="{{ asset ('public/gentelella-master/vendors/gauge.js/dist/gauge.min.js') }}"></script>
      <!-- bootstrap-progressbar -->
      <script src="{{ asset ('public/gentelella-master/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
      <!-- Skycons -->
      <script src="{{ asset ('public/gentelella-master/vendors/skycons/skycons.js') }}"></script>
      <!-- Flot -->
      <script src="{{ asset ('public/gentelella-master/vendors/Flot/jquery.flot.js') }}"></script>
      <script src="{{ asset ('public/gentelella-master/vendors/Flot/jquery.flot.pie.js') }}"></script>
      <script src="{{ asset ('public/gentelella-master/vendors/Flot/jquery.flot.time.js') }}"></script>
      <script src="{{ asset ('public/gentelella-master/vendors/Flot/jquery.flot.stack.js') }}"></script>
      <script src="{{ asset ('public/gentelella-master/vendors/Flot/jquery.flot.resize.js') }}"></script>
      <!-- Flot plugins -->
      <script src="{{ asset ('public/gentelella-master/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
      <script src="{{ asset ('public/gentelella-master/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
      <script src="{{ asset ('public/gentelella-master/vendors/flot.curvedlines/curvedLines.js') }}"></script>
      <!-- DateJS -->
      <script src="{{ asset ('public/gentelella-master/vendors/DateJS/build/date.js') }}"></script>
      <!-- bootstrap-daterangepicker -->
      <script src="{{ asset ('public/gentelella-master/vendors/moment/min/moment.min.js') }}"></script>
      <script src="{{ asset ('public/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

      <!-- Custom Theme Scripts -->
      <script src="{{ asset ('public/gentelella-master/build/js/custom.min.js') }}"></script>

  </body>
</html>

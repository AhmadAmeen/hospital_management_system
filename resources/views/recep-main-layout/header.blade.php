<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Hospital Management Pro! | </title>

  <!-- Bootstrap -->
  <link href="{{ asset('public/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{ asset('public/gentelella-master/vendors/bootstrap/dist/css/font-awesome.min.css') }}" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{ asset('public/gentelella-master/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
  <!-- bootstrap-progressbar -->
  <link href="{{ asset('public/gentelella-master/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link  href="{{ asset('public/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="{{ asset('public/gentelella-master/build/css/custom.min.css') }}" rel="stylesheet">

  <div class="top_nav">
    <div class="nav_menu">
      <nav>
        <ul class="nav pull-right">
                <form style="margin: 5px" class="nav r_searchbox" action="{{url('getseachedpatients')}}" method="get">
                  <input type="text" id="pname" name="pname" required="required" placeholder="Search Patients...">
                  <a style="padding: 5px" href="{{ url ('getlogout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out </a>
                </form>

        </ul>
    </div>
  </div>
  </head>

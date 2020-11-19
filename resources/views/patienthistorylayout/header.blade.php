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
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="{{url('public/gentelella-master/production/images/img.jpg')}}" alt="">{{session('recep_name_session')}}
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
          <li><a href="{{ url ('getlogout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
          </ul>
        </li>
      </ul>
  </div>
</div>
</head>

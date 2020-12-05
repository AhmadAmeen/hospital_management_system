<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="" class="site_title"> <span style="font-family: Impact; font-size: 17px">Hospital Management System</span></a>
          </div>
          <div class="clearfix"></div>

<!-- menu profile quick info -->
<div class="profile clearfix">
  <div class="profile_pic">
    <img src="{{url('public/gentelella-master/production/images/img.jpg')}}" alt="..." class="img-circle profile_img">
  </div>
  <div class="profile_info">
   <span>Welcome,</span>
    <h2>Dear {{session('recep_name_session')}}</h2>
  </div>
</div>
    <!-- /menu profile quick info -->
  <br />

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section" style="margin-top: 5px">
    <h3>General</h3>
    <ul class="nav side-menu">
      <li>
          <li><a style="border-style: outset; margin-right: 2px; border-color: #767676;"></i> Patient ↓ <span class="fa fa-chevron-down"></span></a>
             <ul class="nav child_menu">
               <li><a href="{{url('patientregform/' . session('recep_session'))}}">Add Patient</a></li>
               <li><a href="{{url('showpatients/' . session('recep_session'))}}">All Patients</a></li>
            </ul>
          </li>
      </li>
    </ul>
  </div>
</div>
</div>
</div>

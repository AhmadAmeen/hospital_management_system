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
    <h2>Dear {{session('doctor_name_session')}}</h2>
  </div>
</div>
    <!-- /menu profile quick info -->
  <br />

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section" style="margin-top: 5px">
    <h3 style="margin-top: 15px">Dashboard</h3>
    <h3 style="margin-top: 15px"><a href="{{url('TodocMainPage/' . session('doctor_session'))}}" style="color: white">Prescribe Medicine</a></h3>
    <ul class="nav side-menu">
      <li>
          <li><a style="border-style: outset; margin-top: 7px; margin-right: 2px; border-color: #767676;"></i> Patient ↓ <span class="fa fa-chevron-down"></span></a>
             <ul class="nav child_menu">
               <li><a href="{{url('docpatientregform/' . session('doctor_session'))}}">Register New Patient</a></li>
            </ul>
          </li>
      </li>
      <li>
          <li><a style="border-style: outset; margin-right: 2px; border-color: #767676;"></i> Leave ↓ <span class="fa fa-chevron-down"></span></a>
             <ul class="nav child_menu">
               <li><a href="{{url('docunavailable/' . session('doctor_session'))}}">Leave</a></li>
            </ul>
          </li>
      </li>
      <li>
          <li><a style="border-style: outset; margin-right: 2px; border-color: #767676;"></i> Center Setting ↓ <span class="fa fa-chevron-down"></span></a>
             <ul class="nav child_menu">
               <li><a href="{{url('doc_adv_center_add/' . session('doctor_session'))}}">Add new Center</a></li>
               <li><a href="{{url('doc_updatecenter/' . session('doctor_session'))}}">Update Center</a></li>
            </ul>
          </li>
      </li>
      <li>
          <li><a style="border-style: outset; margin-right: 2px; border-color: #767676;"></i> Broadcast SMS ↓ <span class="fa fa-chevron-down"></span></a>
             <ul class="nav child_menu">
               <li><a href="{{url('vaccinationmsg/' . session('doctor_session'))}}">Vaccination Message</a></li>
            </ul>
          </li>
      </li>
    </ul>
  </div>
</div>
</div>
</div>

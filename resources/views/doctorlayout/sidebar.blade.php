<body class="nav-md">
 <div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 1;">
          <a href="" class="site_title"> <span style="font-family: Impact; font-size: 22px; margin-left: 55px">KIDOCTOR</span></a>
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
    <ul class="nav side-menu">
      <li>
        <li><a style="border-style: outset; margin-right: 2px; border-color: #767676;"></i> Home <span style="float: right" class=" ">↓</span></a>
             <ul class="nav child_menu">
               <li><a href="{{url('showdashboard/' . session('doctor_session'))}}">Dashboard</a></li>
               <li><a href="{{url('TodocMainPage/' . session('doctor_session'))}}">Prescribe Medicine</a></li>
            </ul>
          </li>
      </li>
      <li>
        <li><a style="border-style: outset; margin-right: 2px; border-color: #767676;"></i> Patient <span style="float: right" class=" ">↓</span></a>
             <ul class="nav child_menu">
               <li><a href="{{url('docpatientregform/' . session('doctor_session'))}}">Register New Patient</a></li>
            </ul>
          </li>
      </li>
      <li>
          <li><a style="border-style: outset; margin-right: 2px; border-color: #767676;"></i> Leave <span style="float: right" class=" ">↓</span></a>
             <ul class="nav child_menu">
               <li><a href="{{url('docunavailable/' . session('doctor_session'))}}">Leave</a></li>
               <!--
               <li><a href="{{url('docunavail_reschedule')}}">Leave</a></li>
               -->
            </ul>
          </li>
      </li>
      <li>
         <li><a style="border-style: outset; margin-right: 2px; border-color: #767676;"></i> Center Settings <span style="float: right" class=" ">↓</span></a>
             <ul class="nav child_menu">
               <li><a href="{{url('doc_adv_center_add/' . session('doctor_session'))}}">Add new Center</a></li>
               <li><a href="{{url('doc_updatecenter/' . session('doctor_session'))}}">Update Center</a></li>
            </ul>
          </li>
      </li>
      <li>
         <li><a style="border-style: outset; margin-right: 2px; border-color: #767676;"></i> Broadcast Message <span style="float: right" class=" ">↓</span></a>
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

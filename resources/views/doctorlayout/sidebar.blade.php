<?php
require_once('config.php');
if(isset($_SESSION['access_token']) && isset($_SESSION['doctor_session'])){
	//header("Location: posts.php");
	//exit();
}
$redirectTo = "http://localhost/hospital_management_system/callback.php";
$data = ['email'];
$fullURL = $handler->getLoginUrl($redirectTo, $data);
?>
<body class="nav-md" style="background-color: #3fab5c">
 <div class="container body" style="background-color: #3fab5c">
  <div class="main_container" style="background-color: #3fab5c">
    <div class="col-md-3 left_col" style="background-color: #3fab5c">
      <div class="left_col scroll-view" style="background-color: #3fab5c">
        <div class="navbar nav_title" style="background-color: #3fab5c">
          <a href="" class="site_title"> <span style="font-family: Impact; font-size: 22px; margin-left: 55px">KIDOCTOR</span></a>
        </div>
        <div class="clearfix"></div>
<!-- menu profile quick info -->
<div class="profile clearfix" style="background-color: #3fab5c">
  <div class="profile_pic">
    <img src="{{url('public/gentelella-master/production/images/img.jpg')}}" alt="..." class="img-circle profile_img">
  </div>
  <div class="profile_info">
   <span>Welcome,</span>
    <h2>Dear {{session('doctor_name_session')}}</h2>
  </div>
</div>
    <!-- /menu profile quick info -->
  <br/>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu" style="background-color: #3fab5c">
  <div class="menu_section" style="margin-top: 5px">
    <ul class="nav side-menu">
      <li>
        <li><a style="border-style: outset; margin-right: 2px; border-color: #fff;"></i> Home <span style="float: right" class=" ">↓</span></a>
             <ul class="nav child_menu">
               <li><a href="{{url('showdashboard/' . session('doctor_session'))}}">Dashboard</a></li>
               <li><a href="{{url('TodocMainPage/' . session('doctor_session'))}}">Prescribe Medicine</a></li>
            </ul>
          </li>
      </li>
      <li>
        <li><a style="border-style: outset; margin-right: 2px; border-color: #fff;"></i> Patient <span style="float: right" class=" ">↓</span></a>
             <ul class="nav child_menu">
               <li><a href="{{url('docpatientregform/' . session('doctor_session'))}}">Register New Patient</a></li>
            </ul>
          </li>
      </li>
      <li>
          <li><a style="border-style: outset; margin-right: 2px; border-color: #fff;"></i> Leave <span style="float: right" class=" ">↓</span></a>
             <ul class="nav child_menu">
               <li><a href="{{url('docunavailable/' . session('doctor_session'))}}">Leave</a></li>
               <!--
               <li><a href="{{url('docunavail_reschedule')}}">Leave</a></li>
               -->
            </ul>
          </li>
      </li>
      <li>
         <li><a style="border-style: outset; margin-right: 2px; border-color: #fff;"></i> Center Settings <span style="float: right" class=" ">↓</span></a>
             <ul class="nav child_menu">
               <li><a href="{{url('doc_adv_center_add/' . session('doctor_session'))}}">Add new Center</a></li>
               <li><a href="{{url('doc_updatecenter/' . session('doctor_session'))}}">Update Center</a></li>
            </ul>
          </li>
      </li>
      <li>
         <li><a style="border-style: outset; margin-right: 2px; border-color: #fff;"></i> Broadcast Message <span style="float: right" class=" ">↓</span></a>
             <ul class="nav child_menu">
               <li><a href="{{url('vaccinationmsg/' . session('doctor_session'))}}">Vaccination Message</a></li>
            </ul>
          </li>
      </li>
      <li>
         <li><a style="border-style: outset; margin-right: 2px; border-color: #fff;"></i> Website <span style="float: right" class=" ">↓</span></a>
             <ul class="nav child_menu">
               <li><a href="{{url('docWebsiteBuilder/' . session('doctor_session'))}}">Website Data</a></li>
               <li><a href="{{url('image-gallery/' . session('doctor_session'))}}">Website Images</a></li>
               <li><a href="{{url('visitOwnWebsite/' . session('doctor_session'))}}">Visit Website</a></li>
            </ul>
          </li>
          <hr>
          <li><a style="border-style: outset; margin-right: 2px; border-color: #fff;"></i> Marketing <span style="float: right" class=" ">↓</span></a>
              <ul class="nav child_menu">
                <input type="button" onclick="window.location = '<?php echo $fullURL ?>'" value="Login with Facebook" class="btn btn-primary" style="margin: auto; width: 100%">
              </ul>
          </li>
      </li>
    </ul>
   </div>
  </div>
 </div>
</div>

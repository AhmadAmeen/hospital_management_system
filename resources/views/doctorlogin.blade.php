<?php
require_once('config.php');

if(isset($_SESSION['access_token'])){
	header("Location: index.php");
	exit();
}


$redirectTo = "http://localhost/loginfb/callback.php";
$data = ['email'];
$fullURL = $handler->getLoginUrl($redirectTo, $data);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Doctor Login</title>

    <!-- Bootstrap -->
    <link href="public/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="public/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="public/gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="public/gentelella-master/vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="public/gentelella-master/build/css/custom.min.css" rel="stylesheet">
    <!--animated login form-->
    <link href="public/css/adminloginform-css.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


  </head>
  <body class="login" >
  <div class="container" style="background-color: white">
  <div class="left">
    <div class="header">
      <h2 class="animation a1" style="color: black">Doctor Login</h2>
      <h4 class="animation a2">Log in to your account using email and password</h4>
    </div>
    <div class="form">
      <section class="login_content">
        <form action="{{url ('isdoctorlogin') }}" method="post">
          @csrf
          <h1>Login Form</h1>
          <div>
            <input type="text" class="form-field animation a3" placeholder="Username" name="username" required="" />
          </div>
          <div>
            <input type="password" class="form-field animation a4" placeholder="Password" name="password" required="" />
          </div>
          <div>
            <input type="submit" value="Log in!" class="btn btn-default submit" class="animation a6">
            <input type="submit" value="Log in with Facebook" class="btn btn-default submit" class="animation a6">
            <a class="reset_pass" href="#">Please enter username and password</a>
          </div>

          <div class="clearfix"></div>

          <div class="separator">

            <div class="clearfix"></div>
            <br />

            <div>
              <p>
                @if (Session::has('coc'))
                  <i  class="fa fa-paw" style="color:gray"><br>
                    {{ session('coc') }}
                  </i>
                @endif
              </p>
            </div>
          </div>
          <input type="button" onclick="window.location = '<?php echo $fullURL ?>'" value="Login with Facebook" class="btn btn-primary">
        </form>

    </div>
  </div>
  <div class="right"></div>
</div>
</body>
</html>

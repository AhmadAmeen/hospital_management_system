<?php
if(!session_id()) {
    session_start();
}

if(!isset($_SESSION['access_token'])){
	header("Location: login.php");
	exit();
}

// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v9.0/100248141883157?fields=posts%7Bfull_picture%2Ccreated_time%2Cpicture%2Cmessage%7D%2Cglobal_brand_page_name%2Cpicture&access_token=EAAPcHHGDdJwBAFARx7mxIaIVTHukbLddy2bxdAgKt6YyXYBbwqiWUoStRb8hDliISXavZBwva7HCRbZB6Sp7nPN56J4weqHBLPN7YO2CX0IZBnsO2ABXJ3x9tZBE7S0HnyNEGZADXiG6bInjWsXvbDDUMFuJdj1qrSucvej6qjsDuXArWZAYF8');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
$result = json_decode($result);
//echo '<pre>';
//print_r ($result);

// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch_insights = curl_init();

curl_setopt($ch_insights, CURLOPT_URL, 'https://graph.facebook.com/v9.0/100248141883157/posts?fields=insights.metric(post_impressions_unique%2Cpost_impressions)%7Bvalues%2Ctitle%7D&access_token=EAAPcHHGDdJwBAId26NMVmfVq4fD62Bd7U4ZAD0ObQb6hQ6JqlquCUBf3R7BJ5xDEpKCkCKPf84xmWSH0JZB6RPsXGR4x1LeUTLZBWWx7nW8aW8ZAuFYxIVgA8xiZC44h6ZAIoysGVlBCQTW3SWoBnoI8hdipi9IZBXSbtKAAlr5Qq8owx7slCGKUjp8cT68T4kZD');
curl_setopt($ch_insights, CURLOPT_RETURNTRANSFER, 1);

$result_insights = curl_exec($ch_insights);
if (curl_errno($ch_insights)) {
    echo 'Error:' . curl_error($ch_insights);
}
curl_close ($ch_insights);
$result_insights = json_decode($result_insights);
  foreach ($result_insights as $result_insight) {
    // code...
    //echo '<pre>';
    //print_r ($result_insight);
  }

  // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch_adset = curl_init();

curl_setopt($ch_adset, CURLOPT_URL, 'https://graph.facebook.com/v9.0/act_4052753901464334/adsets');
curl_setopt($ch_adset, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch_adset, CURLOPT_POST, 1);
$post = array(
    'name' => '\"My First AdSet\"',
    'lifetime_budget' => '20000',
    'start_time' => '\"2021-01-12T01:08:57-0800\"',
    'end_time' => '\"2021-01-19T01:08:57-0800\"',
    'campaign_id' => '\"<AD_CAMPAIGN_ID>\"',
    'bid_amount' => '500',
    'billing_event' => '\"IMPRESSIONS\"',
    'optimization_goal' => '\"POST_ENGAGEMENT\"',
    'targeting' => '{
       \"age_min\": 20,
       \"age_max\": 24,
       \"behaviors\": [
         {
           \"id\": 6002714895372,
           \"name\": \"All travelers\"
         }
       ],
       \"genders\": [
         1
       ],
       \"geo_locations\": {
         \"countries\": [
           \"US\"
         ],
         \"regions\": [
           {
             \"key\": \"4081\"
           }
         ],
         \"cities\": [
           {
             \"key\": \"777934\",
             \"radius\": 10,
             \"distance_unit\": \"mile\"
           }
         ]
       },
       \"interests\": [
         {
           \"id\": \"<INTEREST_ID>\",
           \"name\": \"<INTEREST_NAME>\"
         }
       ],
       \"life_events\": [
         {
           \"id\": 6002714398172,
           \"name\": \"Newlywed (1 year)\"
         }
       ],
       \"facebook_positions\": [
         \"feed\"
       ],
       \"publisher_platforms\": [
         \"facebook\",
         \"audience_network\"
       ]
     }',
    'status' => '\"PAUSED\"',
    'access_token' => '<ACCESS_TOKEN>'
);
curl_setopt($ch_adset, CURLOPT_POSTFIELDS, $post);

$result_adset = curl_exec($ch_adset);
if (curl_errno($ch_adset)) {
    echo 'Error:' . curl_error($ch_adset);
}
curl_close($ch_adset);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://fonts.googleapis.com/css?family=Rokkitt" rel="stylesheet">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<style type="text/css">
.hero {
  padding: 6.25rem 0px !important;
  margin: 0px !important;
}
.cardbox {
  border-radius: 3px;
  margin-bottom: 20px;
  padding: 0px !important;
}

/* ------------------------------- */
/* Cardbox Heading
---------------------------------- */
.cardbox .cardbox-heading {
  padding: 16px;
  margin: 0;
}
.cardbox .btn-flat.btn-flat-icon {
 border-radius: 50%;
 font-size: 24px;
 height: 32px;
 width: 32px;
 padding: 0;
 overflow: hidden;
 color: #fff !important;
 background: #b5b6b6;

display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
text-align: center;
}
.cardbox .float-right .dropdown-menu{
  position: relative;
  left: 13px !important;
}
.cardbox .float-right a:hover{
  background: #f4f4f4 !important;
}
.cardbox .float-right a.dropdown-item {
  display: block;
  width: 100%;
  padding: 4px 0px 4px 10px;
  clear: both;
  font-weight: 400;
  font-family: 'Abhaya Libre', serif;
  font-size: 14px !important;
  color: #848484;
  text-align: inherit;
  white-space: nowrap;
  background: 0 0;
  border: 0;
}

/* ------------------------------- */
/* Media Section
---------------------------------- */
.media {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: start;
  align-items: flex-start;
}
.d-flex {
  display: -ms-flexbox !important;
  display: flex !important;
}
.media .mr-3{
  margin-right: 1rem !important;
}
.media img{
  width: 48px !important;
  height: 48px !important;
  padding: 2px;
  border: 2px solid #f4f4f4;
}
.media-body {
  -ms-flex: 1;
  flex: 1;
  padding: .4rem !important;
}
.media-body p{
  font-family: 'Rokkitt', serif;
  font-weight: 500 !important;
  font-size: 14px;
  color: #88898a;
}
.media-body small span{
  font-family: 'Rokkitt', serif;
  font-size: 12px;
  color: #aaa;
  margin-right: 10px;
}

/* ------------------------------- */
/* Cardbox Item
---------------------------------- */
.cardbox .cardbox-item {
    position: relative;
    display: block;
}
.cardbox .cardbox-item img{
}
.img-responsive{
    display: block;
    max-width: 100%;
    height: auto;
}
.fw {
    width: 100% !important;
	height: auto;
}

/* ------------------------------- */
/* Cardbox Base
---------------------------------- */
.cardbox-base{
 border-bottom: 2px solid #f4f4f4;
}
.cardbox-base ul{
 margin: 10px 0px 10px 15px!important;
 padding: 10px !important;
 font-size: 0px;
  display: inline-block;
}
.cardbox-base li {
  list-style: none;
  margin: 0px 0px 0px -8px !important;
  padding: 0px 0px 0px 0px !important;
  display: inline-block;
}
.cardbox-base li a{
  margin: 0px !important;
  padding: 0px !important;
}
.cardbox-base li a i{
 position: relative;
 top: 4px;
 font-size: 16px;
 color: #8d8d8d;
 margin-right: 15px;
}
.cardbox-base li a span{
 font-family: 'Rokkitt', serif;
 font-size: 14px;
 color: #8d8d8d;
 margin-left: 20px;
 position: relative;
 top: 5px;
}
.cardbox-base li a em{
 font-family: 'Rokkitt', serif;
 font-size: 14px;
 color: #8d8d8d;
 position: relative;
 top: 3px;
}
.cardbox-base li a img{
  width: 25px;
  height: 25px;
  margin: 0px !important;
  border: 2px solid #fff;
}
/* ------------------------------- */
/* Cardbox Comments
---------------------------------- */
.cardbox-comments{
  padding: 10px 40px 20px 40px !important;
  font-size: 0px;
  text-align: center;
  display: inline-block;
}
.cardbox-comments .comment-avatar img{
  margin-top: 1px;
  margin-right: 10px;
  position: relative;
  display: inline-block;
  text-align: center;
  width: 40px;
  height: 40px;
}
.cardbox-comments .comment-body {
  overflow: auto;
}
.search {
 position: relative;
 right: -60px;
 top: -40px;
 margin-bottom: -40px;
 border: 2px solid #f4f4f4;
 width: 100%;
 overflow: hidden;
}
.search input[type="text"] {
 background-color: #fff;
 line-height: 10px;
 padding: 15px 60px 20px 10px;
 border: none;
 border-radius: 4px;
 width: 350px;
 font-family: 'Rokkitt', serif;
 font-size: 14px;
 color: #8d8d8d;
 height: inherit;
 font-weight: 700;
}
.search button {
 position: absolute;
 right: 0;
 top: 0px;
 border: none;
 background-color: transparent;
 color: #bbbbbb;
 padding: 15px 25px;
 cursor: pointer;

 display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
text-align: center;
}
.circle-img {
 border-radius: 50%;
 display: block;
 margin: 0 auto;
 padding: 10px;
}
.search button i {
 font-size: 20px;
 line-height: 30px;
 display: block;
}
/* ------------------------------- */
/* Author
---------------------------------- */
.author a{
 font-family: 'Rokkitt', serif;
 font-size: 16px;
 color: #00C4CF;
}
.author p{
 font-family: 'Rokkitt', serif;
 font-size: 16px;
 color: #8d8d8d;
}
</style>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />');
            else $('head > link').filter(':first').replaceWith(defaultCSS);
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height());
          window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
        });
  </script>
</head>
<body>
  <div class="container" style="margin-top: 100px">
  	<div class="row justify-content-center">
  		<div class="col-md-3">
  			<img class="circle-img" src="<?php echo $_SESSION['userData']['picture']['url'] ?>">
  		</div>
  		<div class="col-md-9">
  			<table class="table table-hover table-bordered">
  				<tbody>
  					<tr>
  						<td>ID</td>
  						<td><?php echo $_SESSION['userData']['id'] ?></td>
  					</tr>
  					<tr>
  						<td>First Name</td>
  						<td><?php echo $_SESSION['userData']['first_name'] ?></td>
  					</tr>
  					<tr>
  						<td>Last Name</td>
  						<td><?php echo $_SESSION['userData']['last_name'] ?></td>
  					</tr>
  					<tr>
  						<td>Email</td>
  						<td><?php echo $_SESSION['userData']['email'] ?></td>
  					</tr>
  				</tbody>
  			</table>
  		</div>
  	</div>
  </div>

    <form method="post" style="margin: auto">
        <input style="margin-left: 100px; padding: 10px; display: inline-block" type="text" id="message" name="message" required="required" class="form-control col-md-7 col-xs-12">
        <input style="margin: auto; padding: 10px; display: inline-block; background-color: #4267B2; color: white;" type="submit" name="test" id="test" value="Post on Facebook">
        <input style="margin: auto; padding: 10px; display: inline-block; background-color: #4267B2; color: white;" onclick="fbpage()" value="Visit Your Page"><br/>
    </form>
    <br>

    <!--
    <div class="container">
    <?php/*
    	require 'Facebook/autoload.php';
    	$fb = new Facebook\Facebook([
    	  'app_id' => '1086439651767452', // Replace {app-id} with your app id
    	  'app_secret' => '51d0d7b4028d643f39423dc923df8aa8', // Replace {app_secret} with your app secret
    	  'default_graph_version' => 'v2.11',
    	]);

    	if(isset($_POST['submit'])) {
    		//require 'config.php';
    		$data = [
    		  'message' => $_POST['msg'],
    		  'source' => $fb->fileToUpload($_FILES['file']["tmp_name"]),
    		];

    		try {
    		  // Returns a `Facebook\FacebookResponse` object
    		  $response = $fb->post('/me/photos', $data, $_SESSION['access_token']);
    		} catch(Facebook\Exceptions\FacebookResponseException $e) {
    		  echo 'Graph returned an error: ' . $e->getMessage();
    		  exit;
    		} catch(Facebook\Exceptions\FacebookSDKException $e) {
    		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
    		  exit;
    		}

    		$graphNode = $response->getGraphNode();

    		echo 'Photo ID: ' . $graphNode['id'];

    	}*/
    ?>
    	<h5>Upload photo on facebook using Graph API in PHP</h5>
        <hr>
        <div class="row">
    	    <div class="col-md-6 col-md-offset-2">
    			<form name="uploadFrm" method="post" enctype="multipart/form-data">
    		    	 <div class="form-group">
    		            <label for="message-text" class="control-label">URL:</label>
    		            <input type="text" class="form-control" id="url" name="url" value="http://tutorials.lcl/facebook/">
    		    	</div>
    		    	<div class="form-group">
    		            <label for="message-text" class="control-label">Message:</label>
    		            <textarea class="form-control" id="msg" name="msg">Upload photo on facebook using Graph API in PHP</textarea>
    		    	</div>
    		        <div class="form-group">
    				    <label for="file">Select File</label>
    				    <input type="file" id="file" name="file">
    				    <p class="help-block">Select your file which you want to upload.</p>
    				</div>
    			    <div class="footer">
    			        <button type="submit" name="submit" class="btn btn-primary">Post Status</button>
    			    </div>
    			</form>
    		</div>
    	</div>
    </div>
    </div>
    <!-- /container -->

    <?php

    function postdata()
    {
      // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
      $ch_post = curl_init();
      curl_setopt($ch_post, CURLOPT_POSTFIELDS, 'message='.$_POST['message']);
      curl_setopt($ch_post, CURLOPT_URL, 'https://graph.facebook.com/v9.0/100248141883157/feed?message&access_token=EAAPcHHGDdJwBAEWk1r3ZC7C9jF0WAZCc8mFPOlkxii7dD0foBmn0wyRdfDEyKDcGzQmQCpeWhmXnfZBS26AztQrxXC68JrcEZAqZAlOkUqPOGsPtklMeuW6iWuyBjXLVL6JlLxnnCkez3GTNwkemk0wsyJ6iwH5tchSgZAzpPL3xeZBiyflKQnv');
      curl_setopt($ch_post, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch_post, CURLOPT_POST, 1);
      $result = curl_exec($ch_post);
      if (curl_errno($ch_post)) {
          echo 'Error:' . curl_error($ch_post);
      }
      curl_close ($ch_post);
    }

    function refresh() {
      echo "<script>window.location.reload();</script>";
    }

    if(array_key_exists('test',$_POST)){
       postdata();
    }

    ?>
	    <!-- ==============================================
	    Hero
	    =============================================== -->
        <section class="hero">
          <?php
          foreach ($result->posts->data as $list) {
            ?>
         <div class="container">
          <div class="row">
		   <div class="col-lg-6 offset-lg-3">
			<div class="cardbox shadow-lg bg-white">
			 <div class="cardbox-heading">
			  <div class="media m-0">
			   <div class="d-flex mr-3">
				<a href=""><img class="img-fluid rounded-circle" src="<?php echo $result->picture->data->url; ?>" alt="User"></a>
			   </div>
			   <div class="media-body">
           <b><p class="m-0"><?php echo $result->global_brand_page_name; ?></p></b>
				<!--<small><span><i class="icon ion-md-pin"></i>Nairobi, Kenya</span></small>-->
				<small><span><i class="icon ion-md-time"></i><?php $time = explode('T', $list->created_time); echo date('d-m-y', strtotime($time[0])); ?></span></small>
			   </div>
			  </div><!--/ media -->
			 </div><!--/ cardbox-heading -->
			 <div class="cardbox-item">
        <?php if (isset($list->message) && isset($list->full_picture)) { ?>
          <h5 style="padding: 10px"><?php echo $list->message; ?></h5>
          <img class="img-fluid" src="<?php echo $list->full_picture; ?>" alt="Image">
        <?php } else if (isset($list->message)) { ?>
          <h5 style="padding: 10px"><?php echo $list->message; ?></h5>
        <?php } else if (isset($list->full_picture)) {?>
          <img class="img-fluid" src="<?php echo $list->full_picture; ?>" alt="Image">
        <?php } else {}?>
       </div><!--/ cardbox-item -->
       <div class="cardbox-base">
			  <ul class="float-right">
        <!--
			   <li><a><i class="fa fa-comments"></i></a></li>
			   <li><a><em class="mr-5">12</em></a></li>
			   <li><a><i class="fa fa-share-alt"></i></a></li>
			   <li><a><em class="mr-3">03</em></a></li>
        -->
			  </ul>
        <ul>
			   <!--
         <li><a><i class="fa fa-thumbs-up"></i></a></li>
			   <li><a><span>242</span></a></li>
          -->
        </ul>
			 </div><!--/ cardbox-base -->
       <!--
       <div class="cardbox-comments">
			  <span class="comment-avatar float-left">
			   <a href=""><img class="rounded-circle" src="http://www.themashabrand.com/templates/bootsnipp/post/assets/img/users/6.jpg" alt="..."></a>
			  </span>
			  <div class="search">
			   <input placeholder="Write a comment" type="text">
			   <button><i class="fa fa-camera"></i></button>
			  </div><!--/. Search -->
			 </div><!--/ cardbox-like -->

      </div><!--/ cardbox -->
      </div><!--/ col-lg-6 -->
          </div><!--/ row -->
         </div><!--/ container -->
         <?php
       }
       ?>
        </section>	<script type="text/javascript">

      function fbpage() {
        window.open("https://www.facebook.com/IC-Global-100248141883157");
     }

    </script>
</body>
</html>

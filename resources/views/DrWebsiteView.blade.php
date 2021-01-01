<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link
      href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900"
      rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css?family=Tangerine&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/slider-css.css') }}" />
    <!--
    Reflux Template
    https://templatemo.com/tm-531-reflux
    -->
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('docsite/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('docsite/assets/css/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('docsite/assets/css/templatemo-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('docsite/assets/css/owl.css') }}" />
    <link rel="stylesheet" href="{{ asset('docsite/assets/css/lightbox.css') }}" />
  </head>
  <script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
  <script language="JavaScript" type="text/javascript" src="/js/jquery-ui-personalized-1.5.2.packed.js"></script>
  <script language="JavaScript" type="text/javascript" src="/js/sprinkle.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
$("#slideshow > div:gt(0)").hide();

setInterval(function() {
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
},  3000);

</script>
      <style type="text/css">
      @import url('https://fonts.googleapis.com/css?family=Roboto');

* {
    font-family: 'Roboto', sans-serif;
    font-weight: 300;
}

h1 {
    font-weight: 400;
    font-size: 2.5em;
    text-align: center;
    margin-top: 5rem;
}

#slideshow {
    margin: 50px auto;
    position: relative;
    width: 500px;
    height: 500px;
    padding: 10px;
}

#slideshow > div {
    position: absolute;
    top: 10px;
    left: 10px;
    right: 10px;
    bottom: 10px;
}
      .gallery
      {
          display: inline-block;
          margin-top: 10px;
      }
      .close-icon{
      	border-radius: 50%;
          position: absolute;
          right: 5px;
          top: -10px;
          padding: 5px 8px;
      }
      .form-image-upload{
          background: #e8e8e8 none repeat scroll 0 0;
          padding: 15px;
      }

      #myCarousel {margin-left: 30px; margin-right: 30px;}

      .carousel-control {
      	top: 50%;
      }
      .carousel-inner {
      	width: 940px;
      	height: 120px;
      }
      .carousel-control.left, .carousel-control.right {
      	background: none;
      	color: @red;
      	border: none;
      }
      .carousel-control.left {margin-left: -45px; color: black;}
      .carousel-control.right {margin-right: -45px; color: black;}
  </style>
  <body>
    <div id="page-wraper">
      <!-- Sidebar Menu -->
      <div class="responsive-nav">
        <i class="fa fa-bars" id="menu-toggle"></i>
        <div id="menu" class="menu">
          <i class="fa fa-times" id="menu-close"></i>
          <div class="container">
            <div class="image">
              <a href="#"><img src="data:image/png;base64,{{ chunk_split(base64_encode($doctor->dimg)) }}" alt="" /></a>
            </div>
            <div class="author-content">
              <h4>{{$doctor->dname}}</h4>
              <span>{{$doctor->qualification}}</span>
            </div>
            <nav class="main-nav" role="navigation">
              <ul class="main-menu">
                <li><a href="#section1">About Doctor</a></li>
                <li><a href="#section3">Gallery</a></li>
                <li><a href="#section4">Testimonials</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <section class="section about-me" data-section="section1">
        <div>
          <div class="section-heading">
            <h2>About Me</h2>
            <div class="line-dec"></div>
                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                <br><br>
                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                <br><br>
                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                <br><br>
                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                <br><br>
              <h5><b>Our Centers:</b></h5>
              <div class="line-dec"></div>
                @foreach($centers as $center)
      					<p>{{$center->cname}}: {{$center->address}}</p>
      					@endforeach
             </div>
         </div>
      </section>

      <section class="section my-work" data-section="section3">
        <div class="container">
          <div class="section-heading">
            <h2>Gallery</h2>
            <div class="line-dec"></div>
            <!--<div id="main" class="main"></div>-->
              <div class='list-group gallery'>
                      @if($images->count())


                      <div id="slideshow">
                          @foreach($images as $image)
                          <div>
                            <img src="{{ URL::asset('public/images/'.$doc_id.'/'.$image->image) }}">
                          </div>
                          @endforeach
                      @endif
                </div> <!-- list-group / end -->
            </div> <!-- row / end -->
          </div> <!-- container / end -->
      </section>
      <section class="section Testimonials-me" data-section="section4">
        <div class="container">
          <div class="section-heading">
            <h2>Testimonials</h2>
            <div class="line-dec"></div>
            <div class="container my-5">
        <section>
        <div class="text-center mb-5">
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="bg-light position-relative px-3 mt-5 text-center py-5">
                    <div class="my-2">
                        <svg fill="#300600" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             width="30px" height="30px" viewBox="0 0 349.078 349.078" style="enable-background:new 0 0 349.078 349.078;"
                             xml:space="preserve">
                        <g>
                        	<path d="M198.779,322.441v-58.245c0-7.903,6.406-14.304,14.304-14.304c28.183,0,43.515-28.904,45.643-85.961h-45.643
                        		c-7.897,0-14.304-6.41-14.304-14.304V26.64c0-7.9,6.406-14.301,14.304-14.301h121.69c7.896,0,14.305,6.408,14.305,14.301v122.988
                        		c0,27.349-2.761,52.446-8.181,74.611c-5.568,22.722-14.115,42.587-25.398,59.049c-11.604,16.917-26.132,30.192-43.155,39.437
                        		c-17.152,9.304-37.09,14.026-59.267,14.026C205.186,336.745,198.779,330.338,198.779,322.441z M14.301,249.887
                        		C6.404,249.887,0,256.293,0,264.185v58.257c0,7.896,6.404,14.298,14.301,14.298c22.166,0,42.114-4.723,59.255-14.026
                        		c17.032-9.244,31.558-22.508,43.161-39.437c11.29-16.462,19.836-36.328,25.404-59.061c5.423-22.165,8.178-47.263,8.178-74.6V26.628
                        		c0-7.9-6.41-14.301-14.304-14.301H14.301C6.404,12.327,0,18.734,0,26.628v122.988c0,7.899,6.404,14.304,14.301,14.304h45.002
                        		C57.201,220.982,42.09,249.887,14.301,249.887z"/>
                        </g>
                    </svg>
                    </div>
                    <div class="px-3 text-center pb-3">
                        <p class="font-weight-light my-3 text-secondary">Lorem ipsum dolor sit consectetur adipisicing elit. Alias amet
                            deleniti et fugit iusto nesciunt.</p>
                    </div>
                </div>
                <div>
                    <div class="font-weight-bold circle text-white rounded-circle d-flex align-items-center justify-content-center mx-auto position-relative border border-white mt-4"
                         style="background-color: #300600; width: 60px; height: 60px;">
                        <img class="rounded-circle" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80" alt="" height="55px" width="55px">
                    </div>
                    <div class="text-center">
                        <h5 class="font-weight-bold mt-4 mb-0" style="color: #fff">Ramin JD</h5>
                        <small class="font-weight-bold" >Manager</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div style="background-color: #3b3b3b" class="position-relative px-3 mt-5 text-center py-5">
                    <div class="my-2">
                        <svg fill="#fff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             width="30px" height="30px" viewBox="0 0 349.078 349.078" style="enable-background:new 0 0 349.078 349.078;"
                             xml:space="preserve">
                    <g>
                    	<path d="M198.779,322.441v-58.245c0-7.903,6.406-14.304,14.304-14.304c28.183,0,43.515-28.904,45.643-85.961h-45.643
                    		c-7.897,0-14.304-6.41-14.304-14.304V26.64c0-7.9,6.406-14.301,14.304-14.301h121.69c7.896,0,14.305,6.408,14.305,14.301v122.988
                    		c0,27.349-2.761,52.446-8.181,74.611c-5.568,22.722-14.115,42.587-25.398,59.049c-11.604,16.917-26.132,30.192-43.155,39.437
                    		c-17.152,9.304-37.09,14.026-59.267,14.026C205.186,336.745,198.779,330.338,198.779,322.441z M14.301,249.887
                    		C6.404,249.887,0,256.293,0,264.185v58.257c0,7.896,6.404,14.298,14.301,14.298c22.166,0,42.114-4.723,59.255-14.026
                    		c17.032-9.244,31.558-22.508,43.161-39.437c11.29-16.462,19.836-36.328,25.404-59.061c5.423-22.165,8.178-47.263,8.178-74.6V26.628
                    		c0-7.9-6.41-14.301-14.304-14.301H14.301C6.404,12.327,0,18.734,0,26.628v122.988c0,7.899,6.404,14.304,14.301,14.304h45.002
                    		C57.201,220.982,42.09,249.887,14.301,249.887z"/>
                    </g>
                    </svg>
                    </div>
                    <div class="px-3 text-center pb-3">
                        <p class="font-weight-light my-3 text-white">Lorem ipsum dolor sit consectetur adipisicing elit. Alias amet
                            deleniti et fugit iusto nesciunt.</p>
                    </div>
                </div>
                <div>
                    <div  class="font-weight-bold circle text-white rounded-circle d-flex align-items-center justify-content-center mx-auto position-relative border border-white mt-4"
                         style="width: 60px;height: 60px;background-color: #911706">
                        <img class="rounded-circle" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80" alt="" height="55px" width="55px">
                    </div>
                    <div class="text-center">
                        <h5 class="font-weight-bold mt-4 mb-0 " style="color: #fff">Semin Jee</h5>
                        <small class="font-weight-bold"style="line-height: 1">CEO</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-light position-relative px-3 mt-5 text-center py-5">
                    <div class="my-2">
                        <svg fill="#300600" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             width="30px" height="30px" viewBox="0 0 349.078 349.078" style="enable-background:new 0 0 349.078 349.078;"
                             xml:space="preserve">
                    <g>
                    	<path d="M198.779,322.441v-58.245c0-7.903,6.406-14.304,14.304-14.304c28.183,0,43.515-28.904,45.643-85.961h-45.643
                    		c-7.897,0-14.304-6.41-14.304-14.304V26.64c0-7.9,6.406-14.301,14.304-14.301h121.69c7.896,0,14.305,6.408,14.305,14.301v122.988
                    		c0,27.349-2.761,52.446-8.181,74.611c-5.568,22.722-14.115,42.587-25.398,59.049c-11.604,16.917-26.132,30.192-43.155,39.437
                    		c-17.152,9.304-37.09,14.026-59.267,14.026C205.186,336.745,198.779,330.338,198.779,322.441z M14.301,249.887
                    		C6.404,249.887,0,256.293,0,264.185v58.257c0,7.896,6.404,14.298,14.301,14.298c22.166,0,42.114-4.723,59.255-14.026
                    		c17.032-9.244,31.558-22.508,43.161-39.437c11.29-16.462,19.836-36.328,25.404-59.061c5.423-22.165,8.178-47.263,8.178-74.6V26.628
                    		c0-7.9-6.41-14.301-14.304-14.301H14.301C6.404,12.327,0,18.734,0,26.628v122.988c0,7.899,6.404,14.304,14.301,14.304h45.002
                    		C57.201,220.982,42.09,249.887,14.301,249.887z"/>
                    </g>
                    </svg>
                    </div>
                    <div class="px-3 text-center pb-3">
                        <p class="font-weight-light my-3 text-secondary">Lorem ipsum dolor sit consectetur adipisicing elit. Alias amet
                            deleniti et fugit iusto nesciunt.</p>
                    </div>
                </div>
                <div>
                    <div class="font-weight-bold circle text-white rounded-circle d-flex align-items-center justify-content-center mx-auto position-relative border border-white mt-4"
                         style="width: 60px;height: 60px; background-color: #911706">
                        <img class="rounded-circle" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80" alt="" height="55px" width="55px">
                    </div>
                    <div class="text-center">
                        <h5 class="font-weight-bold mt-4 mb-0 " style="color: #fff">Hadi Najafi</h5>
                        <small class="font-weight-bold" style="line-height: 1">Developer</small>
                    </div>
                    </div>
                  </div>
              </div>
          </section>
          </div>
          </div>
        </div>
      </section>
    </div>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('docsite/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('docsite/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('docsite/assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('docsite/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('docsite/assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('docsite/assets/js/custom.js') }}"></script>
    <script>

    // This will be triggered automatically after the SDK is loaded successfully
    // write your FB fucntions inside this
    window.fbAsyncInit = function() {
       FB.init({
         appId: '220462849568740',
         status: true,
         cookie: true,
         xfbml: true
       });

       FB.getLoginStatus(function (response) {
         if (response.status === 'connected') {
            GetData();
         } else {
            Login();
         }
      });
    };

    // JS SDK - this will be loaded asynchronously
    (function(d, s, id){
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {return;}
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    function Login() {
    }

    function GetData() {
    }

    FB.api(
      '/104700501330799/feed',
      'POST',
      {"message":"Testing"},
      function(response) {
          // Insert your code here
      }
    );
      //according to loftblog tut
      $(".main-menu li:first").addClass("active");

      var showSection = function showSection(section, isAnimate) {
        var direction = section.replace(/#/, ""),
          reqSection = $(".section").filter(
            '[data-section="' + direction + '"]'
          ),
          reqSectionPos = reqSection.offset().top - 0;

        if (isAnimate) {
          $("body, html").animate(
            {
              scrollTop: reqSectionPos
            },
            800
          );
        } else {
          $("body, html").scrollTop(reqSectionPos);
        }
      };

      var checkSection = function checkSection() {
        $(".section").each(function() {
          var $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
          if (topEdge < wScroll && bottomEdge > wScroll) {
            var currentId = $this.data("section"),
              reqLink = $("a").filter("[href*=\\#" + currentId + "]");
            reqLink
              .closest("li")
              .addClass("active")
              .siblings()
              .removeClass("active");
          }
        });
      };

      $(".main-menu").on("click", "a", function(e) {
        e.preventDefault();
        showSection($(this).attr("href"), true);
      });

      $(window).scroll(function() {
        checkSection();
      });

      //$("#main").style.backgroundImage="https://images.wallpaperscraft.com/image/boat_mountains_lake_135258_1280x720.jpg";
      //$("#main").style.backgroundImage="https://pixabay.com/photos/medic-hospital-laboratory-medical-563423/";
    </script>

  </body>
</html>

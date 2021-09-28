<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Blog J</title>
        <meta content="WORLD BE RIGHTLY REFORMED FOR STABLE PEACE" name="description">
        <meta content="World Reform Foundation, Worldreformfoundation, webzera, Mannargudi, Charity, Covid" name="keywords">
        <meta name="author" content="John webzera">

        <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">
        <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-16x16.png') }}">


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind+Guntur:wght@600&display=swap" rel="stylesheet"> 

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Styles -->
        <!-- Vendor CSS Files -->
        <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

        @livewireStyles
        <style type="text/css">
        .read-more{
          text-align: right;
        }
        .read-more a{
          display: inline-block;
          background: #2a52be;
          color: #fff;
          padding: 6px 20px;
          transition: 0.3s;
          font-size: 14px;
          border-radius: 4px;
        }

        .icon-box-one{
          background-color: #73c2fb !important;
        }
        .icon-box-one h4 a{
          color: #002fa7 !important;
        }
        .icon-box-one p{
          color: #121212;
          font-size: 15px !important;
          text-align: justify;
          font-weight: bold;
        }
        .icon-box-two{
          background-color: #fad6a5 !important;
        }
        .icon-box-two h4 a{
          color: #FF6700 !important;
        }
        .icon-box-two p{
          color: #121212;
          font-size: 15px !important;
          text-align: justify;
          font-weight: bold;
        }
        .icon-box-three{
          background-color: #f4c2c2 !important;
        }
        .icon-box-three h4 a{
          color: #fe6f5e !important;
        }
        .icon-box-three p{
          color: #121212;
          font-size: 15px !important;
          text-align: justify;
          font-weight: bold;
        }

        .border-container{
          border: 25px solid #0892d0;
          /*width: 60%;
          height: 60%;*/
          padding: 5px;
          /*top: 55%;
          left: 50%;*/
          /*position: absolute;*/
          /*transform: translate(-50%, -50%);*/
          border-image: url('{{asset("assets/img/border1.png") }}') 33% round;
        }
        .content-justify p{
          text-align:  justify;
        }
        #hero .carousel-content p {
            text-align: justify;
        }
        section { 
          padding: 30px 0 !important;
        }
        #header{
          padding: 1px 0px !important;
          border-top: 1px solid deepskyblue;
          border-bottom: 1px solid darkgreen;
        }
        #header .logo img {
            max-height: 116px;
            width: 128px;
        }
        #header .logo{
          font-size: 1rem;
          width: 100%;
        }
        .logo a{
          font-family: "Hind Guntur";
          font-size: 27px !important;
        }
        .logoimg{
            float: left;
          }
          .logo-text{
            margin-top: 45px;
          }
        
        @media only screen and (max-width: 600px) {          
          .logo a{
            font-family: "Hind Guntur";
            font-size: 27px !important;
          }
          .logo-text{
            margin-top: 12px;
            line-height: 1.75rem;
          }
          #about-us h3{
            text-align: center;
          }
        }
        .logo .slogan{
          font-family: "Rockwell Nova";
          font-size: 10px !important;

        }
        .breadcrumbs{
          margin-top: 108px;
          padding: 5px 0px;
        }

        #footer .footer-top{
          background: #003366;
        }
        #footer{
          background: #003153;
        }
        #footer .footer-newsletter #formid{
          margin-top: -10px;
          background: #003366;
          padding: 0px 0px;
        }
        .contact .php-email-form input {
            height: 30px !important;
        }
        /*mobile css*/
        .navbar-mobile{
          background-color: #111;          
        }
        .navbar-mobile ul{
          width: 65%;
          border: 1px solid #cdcdcd;
          background-color: cornsilk;
        }
        .logo-text a{
          text-shadow: 2px 2px #cdcdcd;
        }
        .navbar-mobile .dropdown ul{
          display: block;
        }
        </style>

    </head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

     <!-- Uncomment below if you prefer to use an image logo -->
       <div class="logo logo-text me-auto">
        <a href="{{route('home')}}" class="logoimg me-lg-0"><img src="{{asset('assets/img/logonew.png') }}" alt="WRF" class="img-fluid"></a> <div class="logo-text"><a href="{{route('home')}}"><span>W</span>orld <span>R</span>eform <span>F</span>oundation</span></a></div>
      </div>
      

      <!--  <a href="{{route('home')}}"><span>W</span>orld <span>R</span>eform <span>F</span>oundation</span><div class="slogan">WORLD BE RIGHTLY REFORMED FOR STABLE PEACE</div></a> -->

      <!-- .navbar -->
      @include('layouts.nav')

      <!-- <div class="header-social-links d-flex">
        <a href="#" class="twitter"><i class="bu bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bu bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bu bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bu bi-linkedin"></i></i></a>
      </div> -->

    </div>
  </header><!-- End Header --> 

  {{ $slot }}
  
  <!-- ======= Footer ======= -->
  @include('layouts.footer')  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
@livewireScripts
</body>
</html>

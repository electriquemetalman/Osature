<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Osature</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="imge/favicon.png" rel="icon">
  <link href="imge/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <link href="{{asset('css/style1.css')}}" rel="stylesheet">
  {{-- <link href="css/bootstrap.min.css" rel="stylesheet"> --}}

  <link href="{{asset('vendor/toastr/toastr.css')}}" rel="stylesheet">
  <!-- =======================================================
  * Template Name: Techie - v2.1.0
  * Template URL: https://bootstrapmade.com/techie-free-skin-bootstrap-3/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  @livewireStyles
  <div class="modal fade" id="modalComment">
    <div class="modal-dialog">
      <div class="modal-content">

      </div>
    </div>
  </div>
</head>

<body>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top " style="background-color: rgba(3, 1, 75, 0.9)">
  <div class="container-fluid">

    <div class="row justify-content-center">
      <div class="col-xl-9 d-flex align-items-center">
        <h1 class="logo mr-auto"><a href="{{ route('welcome') }}">Osature</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!--<a href="index.html" class="logo mr-auto"><img src="imge/logo.jpg" alt="" class="img-fluid"></a>-->

        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="active"><a href="/">HOME</a></li>
            <li><a href="/#about">ABOUT US</a></li>
            <li><a href="/#services">INVESMENT</a></li>
            <li><a href="/#features">FAQ</a></li>
            <li><a href="/news">News</a></li>
            <li><a href="/#contact">CONTACT</a></li>

          </ul>
        </nav><!-- .nav-menu -->
        @if (auth()->check())
                <div style="padding-left: 50px;">
                    <img src="{{auth()->user()->image=='' ? 'profile.jpg':'image/profil/'.auth()->user()->image}}" class="image--cover">
                </div>
                @if(auth()->user()->type == "administrateur")
                    <a href="{{ route('index_admin_path') }}"><h4 style="color:#fff; text-align:right">{{auth()->user()->nomuser }}</h4></a>
                @else
                    <a href="{{ route('index_client_path') }}"><h4 style="color:#fff; text-align:right">{{auth()->user()->nomuser }}</h4></a>
                @endif
        @else
            <a href="{{ route('connexion') }}" class="get-started-btn scrollto">Connexion</a>
        @endif
      </div>
    </div>

  </div>
</header><!-- End Header -->


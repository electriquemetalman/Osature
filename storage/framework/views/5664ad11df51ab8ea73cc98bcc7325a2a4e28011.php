<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
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
  <link href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('vendor/icofont/icofont.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('vendor/boxicons/css/boxicons.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('vendor/owl.carousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('vendor/venobox/venobox.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('vendor/aos/aos.css')); ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/style1.css')); ?>" rel="stylesheet">
  
  
  <link href="<?php echo e(asset('vendor/toastr/toastr.css')); ?>" rel="stylesheet">
  <!-- =======================================================
  * Template Name: Techie - v2.1.0
  * Template URL: https://bootstrapmade.com/techie-free-skin-bootstrap-3/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <?php echo \Livewire\Livewire::styles(); ?>

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
        <h1 class="logo mr-auto"><a href="<?php echo e(route('welcome')); ?>">Osature</a></h1>
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

        <a href="<?php echo e(route('connexion')); ?>" class="get-started-btn scrollto">Connexion</a>
      </div>
    </div>

  </div>
</header><!-- End Header -->
<?php /**PATH C:\laragon\www\Osature\resources\views/sections/header.blade.php ENDPATH**/ ?>
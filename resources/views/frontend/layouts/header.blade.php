<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Reading App</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/landing/img/favicon.png" rel="icon">
  <link href="assets/landing/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/landing/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/landing/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/landing/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/landing/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/landing/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/landing/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Groovin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/groovin-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">Books</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
      
        @if (Auth::guard('customer')->check())
        <li>
          <a href="{{ route('stories') }}" class="">Stories</a>
          <li><a class="getstarted scrollto" href="{{route('customer-logout')}}">Logout</a></li>

          </li> 
           @else        
          <li><a class="getstarted scrollto" href="{{route('customer-login')}}">Login</a></li>
          <li><a class="getstarted scrollto" href="{{ route('register-customer') }}">Register</a></li>
          <li><a class="getstarted scrollto" href="#">Renew Subscription</a></li>

          @endif

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

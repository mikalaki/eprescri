
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Logout</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/custom.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Load fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">




  <!-- =======================================================
  * Template Name: MeFamily - v2.2.0
  * Template URL: https://bootstrapmade.com/family-multipurpose-html-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<?php

session_start();
session_destroy();


echo "
<section>
<div class=\"container\">
  <div class=\"row\">
  <div class=\"col-md-12 justify-content-center\" style=\"margin-top:10%;\">
    <div class=\"spinner-grow text-primary\" role=\"status\">
      <span class=\"sr-only\">Loading...</span>
    </div>
    <div class=\"spinner-grow text-primary\" role=\"status\">
      <span class=\"sr-only\">Loading...</span>
    </div>
    <div class=\"spinner-grow text-primary\" role=\"status\">
      <span class=\"sr-only\">Loading...</span>
    </div>
    <div class=\"spinner-grow text-primary\" role=\"status\">
      <span class=\"sr-only\">Loading...</span>
    </div>
    <div class=\"spinner-grow text-primary\" role=\"status\">
      <span class=\"sr-only\">Loading...</span>
    </div>
    <div class=\"spinner-grow text-primary\" role=\"status\">
      <span class=\"sr-only\">Loading...</span>
    </div>
    <div class=\"spinner-grow text-primary\" role=\"status\">
      <span class=\"sr-only\">Loading...</span>
    </div>
    <div class=\"spinner-grow text-primary\" role=\"status\">
      <span class=\"sr-only\">Loading...</span>
    </div>
    <div class=\"container\"><h3>Logging out.</h3></div>
    </div>
  </div>
</div>
</section>

      ";
header( "refresh:1;url=login.php" );

?>

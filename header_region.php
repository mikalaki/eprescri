<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>eprescri - elerctronic prescription application platform</title>
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


  <!-- =======================================================
  * Template Name: MeFamily - v2.2.0
  * Template URL: https://bootstrapmade.com/family-multipurpose-html-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <!-- <h1 class="logo mr-auto"><a href="index.php">Me &amp; Family</a></h1> -->
    <!-- Uncomment below if you prefer to use an image logo -->
    <a href="index.php" class="logo mr-auto"><img src="assets/img/eprescri-logo.png" alt="" class="img-fluid"></a>

    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li <?php if($_SERVER['PHP_SELF'] == '/eprescri/index.php'){ echo 'class="active"';}?> ><a href="/eprescri/index.php">Home</a></li>
        <li <?php if($_SERVER['PHP_SELF'] == '/eprescri/index.php#about'){ echo 'class="active"';}?>  ><a href="/eprescri/index.php#about">About eprescri</a></li>
        <!-- <li><a href="#">Medicines available</a></li>
        <li><a href="#">Medicines' Companies</a></li> -->
        <?php
        if (!isset($_SESSION['loggedin'])) {
          require("login_menu.php");
        }
        else{
          echo "<li ><a href=\"logout.php\">Log out</a>";
        }
        ?>

        <!-- <li><a href="contact.php">Contact</a></li> -->

      </ul>
    </nav><!-- .nav-menu -->

  </div>
</header>

<!DOCTYPE html>
<?php
  session_start();
?>
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

  <!-- Load fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">




  <!-- =======================================================
  * Template Name: MeFamily - v2.2.0
  * Template URL: https://bootstrapmade.com/family-multipurpose-html-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include('header_region.php'); ?>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg)">
            <!-- Slide's text area -->
            <div class="slide-text-container-fix carousel-container ">
              <div class="carousel-content slide-text">
                <h2 class="animate__animated animate__fadeInDown slide-h2">Welcome to <span>eprescri</span></h2>
                <p class="animate__animated animate__fadeInUp">Eprescri is a concept electronic prescription platform,
                   developed for the pursposes of databases' university's class.</p>
                <!-- <a href="#about" class="rounded-pill btn-get-started scrollto animate__animated animate__fadeInUp">Read More</a> -->
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
            <!-- Slide's text area -->
            <div class="slide-text-container-fix carousel-container ">
              <div class="carousel-content slide-text">
                <h2 class="animate__animated animate__fadeInDown slide-h2">Doctor's Application</h2>
                <p class="animate__animated animate__fadeInUp">You can log in to eprescri platform's doctor's application, where you can manage your patient's prescriptions and view their medical history.</p>
                <a href="login.php?type=doctor" class=" rounded-pill btn-get-started scrollto animate__animated animate__fadeInUp">Log in as Doctor</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
            <!-- Slide's text area -->
            <div class="slide-text-container-fix carousel-container">
              <div class="carousel-content slide-text">
                <h2 class="animate__animated animate__fadeInDown slide-h2">Pharmacy's Application</h2>
                <p class="animate__animated animate__fadeInUp">You can log in to eprescri as a pharmacy user to see your patients' prescription and reify them.</p>
                <a href="login.php?type=pharmacy" class="rounded-pill btn-get-started scrollto animate__animated animate__fadeInUp">Log in as Pharmacy</a>
              </div>
            </div>
          </div>

          <!-- Slide 4 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-4.jpg)">
            <!-- Slide's text area -->
            <div class="slide-text-container-fix carousel-container">
              <div class="carousel-content slide-text">
                <h2 class="animate__animated animate__fadeInDown slide-h2">Patient's Application</h2>
                <p class="animate__animated animate__fadeInUp">You can log in to eprescri as a patient and see your existing prescriptions.</p>
                <a href="login.php?type=patient" class="rounded-pill btn-get-started scrollto animate__animated animate__fadeInUp">Log in as Patient</a>
              </div>
            </div>
          </div>

          <!-- Slide 5 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-5.jpg)">
            <!-- Slide's text area -->
            <div class="slide-text-container-fix carousel-container">
              <div class="carousel-content slide-text">
                <h2 class="animate__animated animate__fadeInDown slide-h2">Medinice Company's Application</h2>
                <p class="animate__animated animate__fadeInUp">You can log in to eprescri as a medicine company and manage your company's profile or manage your company's medicines.</p>
                <a href="login.php?type=company" class="rounded-pill btn-get-started scrollto animate__animated animate__fadeInUp">Log in as Company</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= My & Family Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class=" section-title ">
          <h2 class="noncapitalize-h2-title">About eprescri</h2>
          <p>Eprescri is a concept electronic prescription platform,
             developed for the pursposes of databases' university's class. In eprescri
           application, doctors can electronically prescribe and manage prescriptions to their patients, and patients can view all their existing prescriptions just by accesing the web.
           Pharmacies can reify the prescriptions of their customers and medicine companies can manage their profiles and
           update their medicines' information displayed on the system. </p>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              eprescri team's goals are:
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> To provide usefull applications for doctors, patients, pharmacies and medicines' companies.</li>
              <li><i class="ri-check-double-line"></i> To configure the application's interface and functionality for the users mentioned above, the best way possible
               based on their needs.</li>
              <li><i class="ri-check-double-line"></i> To make the medical prescription process of a country
                 more direct and completely managed from an online platform.</li>
              <li><i class="ri-check-double-line"></i> To provide to doctors,pharmacies and citizens usefull information about medicines provided to the country and their companies and make it
                easily accesible. </li>
            </ul>
            <!-- <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <a href="our-story.php" class="btn-learn-more">Learn More</a> -->
          </div>
        </div>

      </div>
    </section><!-- End My & Family Section -->

    <!-- ======= Features Section ======= -->
    <!-- <section id="features" class="features">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box">
            <div class="icon"><i class="icofont-computer"></i></div>
            <h4 class="title"><a href="">Lorem Ipsum</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box">
            <div class="icon"><i class="icofont-chart-bar-graph"></i></div>
            <h4 class="title"><a href="">Dolor Sitema</a></h4>
            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box">
            <div class="icon"><i class="icofont-earth"></i></div>
            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box">
            <div class="icon"><i class="icofont-image"></i></div>
            <h4 class="title"><a href="">Magni Dolores</a></h4>
            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box">
            <div class="icon"><i class="icofont-settings"></i></div>
            <h4 class="title"><a href="">Nemo Enim</a></h4>
            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box">
            <div class="icon"><i class="icofont-tasks-alt"></i></div>
            <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
          </div>
        </div>

      </div>
    </section> -->
    <!-- End Features Section -->

    <!-- ======= Recent Photos Section ======= -->
    <section id="log-in" class="recent-photos page-section portfolio">

      <div class="container">

              <div class="section-title">
                <h2 class="noncapitalize-h2-title">Log in as:</h2>

              </div>
              <div class="container">

                <hr class="mt-2 mb-5">

                <div class="row text-center text-lg-left">

                  <div class="col-lg-3 col-md-4 col-6">
                    <a href="login.php?type=doctor" class="d-block mb-4 h-100">
                          <img  class="img-fluid img-thumbnail imageNoBorder" src="assets/img/stethoscope.png" alt="">
                        </a>
                  </div>
                  <div class="col-lg-3 col-md-4 col-6">
                    <a  href="login.php?type=patient" class="d-block mb-4 h-100">
                          <img   class="img-fluid img-thumbnail imageNoBorder" src="assets/img/old-people.png" alt="">
                        </a>
                  </div>
                  <div class="col-lg-3 col-md-4 col-6">
                    <a  href="login.php?type=pharmacy" class="d-block mb-4 h-100">
                          <img  class="img-fluid img-thumbnail imageNoBorder" src="assets/img/cross.png" alt="">
                        </a>
                  </div>
                  <div class="col-lg-3 col-md-4 col-6">
                    <a  href="login.php?type=company" class="d-block mb-4 h-100">
                          <img  class="img-fluid img-thumbnail imageNoBorder" src="assets/img/enterprise.png" alt="">
                        </a>
                  </div>


                </div>

              </div>
            </div>


    </section><!-- End Recent Photos Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>eprescri</h3>
      <p>Electronic prescription platform for a more direct and complete medical prescription process!</p>
      <!-- <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div> -->
      <div class="copyright">
        Website developed from Michael Karatzas, Apostolos Moustaklis and Kyriakos Marantidis. Front end based on the theme:
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>MeFamily</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/family-multipurpose-html-bootstrap-template-free/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

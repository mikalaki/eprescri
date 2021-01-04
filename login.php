<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Events - MeFamily Bootstrap Template</title>
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
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/custom.css" rel="stylesheet">
  <link href="assets/css/loginForm.css" rel="stylesheet">
  <!-- =======================================================
  * Template Name: MeFamily - v2.2.0
  * Template URL: https://bootstrapmade.com/family-multipurpose-html-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- <h1 class="logo mr-auto"><a href="index.php">Me &amp; Family</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo mr-auto"><img src="assets/img/eprescri-logo.png" alt="" class="img-fluid"></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="index.php#about">About eprescri</a></li>
          <li class="drop-down"><a href="">Log in</a>
            <ul>
              <!-- <script>
              var li = document.getElementsByTagName("li");

              for(var i = 0;i<li.length;i++){
                  li[i].addEventListener("click", myScript);
              }

              function myScript(e){
                  alert(e.target.attributes.id.value);
              }
              </script> -->

              <li><a  id="doctor" href="login.php?type=doctor">Log in as Doctor</a></li>
              <li><a  id="pharmacy"href="login.php?type=pharmacy">Log in as Pharmacy</a></li>
              <li><a  id="patient" href="login.php?type=patient">Log in as Patient</a></li>
              <li><a  id="company" href="login.php?type=company">Log in as Company</a></li>
            </ul>
          </li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main" class="loginForm">
    <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="assets/img/eprescri-logo.png" id="logInLogo" alt="User Icon" />
    </div>
<!--This should be dynamic -->
    <h5 class="fadeIn first">
    <?php
    if( $_GET["type"]=='doctor' ){
      echo "Doctor's";
    }
    elseif($_GET["type"]=='pharmacy'){
      echo "Pharmacy's";
    }
    elseif($_GET["type"]=='patient'){
      echo "Patient's";
    }
    elseif($_GET["type"]=='company'){
      echo "Company's";
    }
     ?>
      Application Login</h5>

    <!-- Login Form -->
    <form action="authenticate.php" method="post">
      <label for="username">
        <i class="fas fa-user"></i>
      </label>
      <input type="text" name="username" id="login" class="fadeIn second" name="login" placeholder="username">
      <label for="password">
					<i class="fas fa-lock"></i>
				</label>
      <input type="text" name = "password" id="password" class="fadeIn third" name="login" placeholder="password">
      <div >
      <input type="submit" id="logInButton" class=" fadeIn fourth " value="Log In" >

</div>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
  </main><!-- End #main -->



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
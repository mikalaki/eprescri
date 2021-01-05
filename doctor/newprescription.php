<!DOCTYPE html>
<?php
// We need to use sessions, so you should always start sessions using the below code.
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
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/custom.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">

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

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])|| $_SESSION['usertype']!='doctor') {
  require("please_login.php");
}
?>

<body>

  <!-- ======= Header ======= -->
  <?php include('header_region.php'); ?>
  <!-- End Header -->




  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Add New Prescription</h2>
        <ol>
          <li><a href="../index.php">Home</a></li>
          <li><a href="#">Doctor</a></li>
          <li>New Prescription</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->


  <!-- ======= Menu - Patients' List Section ======= -->
  <section id="doc-area" >
    <div class="container">

      <div class="row">

        <!-- Doctor's Submenu -->
        <div class="col-sm-3">
          <ul class="list-group">
            <li class="list-group-item list-group-item-dark "><strong><u>Doctor's menu</u></strong></li>
            <a href="index.php"><li class="list-group-item">My Patients</li></a>
            <a href="prescriptions.php"><li class="list-group-item">Manage Prescriptions</li></a>
            <a href="newprescription.php"><li class="list-group-item active">Add New Prescription</li></a>
            <a href="watchapatient.php"><li class="list-group-item">Watch a Patient's Record</li></a>
            <a href="available_meds.php"><li class="list-group-item">Medicines available</li></a>
          </ul>
        </div>

        <!-- Doctor's main Content -->
        <div class="col-sm-9 doc-area-main">
          <div class="alert alert-primary" role="alert">
            Complete the form bellow to add a new prescription.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>


          <form>
            <div class="form-group">
              <label for="patientSSN">Patient's SSN</label>
              <input type="text" class="form-control" id="patientSSN" aria-describedby="patientSSNformHelp" placeholder="e.g. 01019012345">
              <small id="patientSSNformHelp" class="form-text text-muted">Enter the SSN of the patient you want to write the prescription to.</small>
            </div>


            <div  class="form-group">
              <label for="medicines">Medicines</label>
              <input type="text" class="form-control" id="medicinesDoctor" placeholder=" e.g. 1) Xanax">
              <ul id="ulMedicinesDoctor">
              </ul>
            </div>

            <div class="form-group">
              <label for="prescriptionInstructions">Instructions</label>
              <textarea class="form-control" id="prescriptionInstructions" placeholder="write the instructions for the prescription (e.g. Two pills of 50mg every morning.)"></textarea>
            </div>

            <div class="form-group">
              <label for="from">From date:</label>
              <input class="form-control" type="date" id="from" name="prescription-from"  aria-describedby="prescriptionfromHelp"
                     value="2021-01-01"
                     min="2020-01-01" max="2025-01-01">
              <small id="patientSSNformHelp" class="form-text text-muted">The beginning date of the prescription.</small>
            </div>

            <div class="form-group">
              <label for="to">To date:</label>
              <input class="form-control" type="date" id="to" name="prescription-to" aria-describedby="prescriptiontoHelp"
                     value="2021-02-01"
                     min="2020-01-01" max="2025-01-01">
              <small id="prescriptiontoHelp" class="form-text text-muted">The end date of the prescription.</small>
            </div>

            <!-- <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->

          <div class="container">
  <div class="row">
    <div class="col-sm">
    <button id="addPrescription" type="submit" class="btn btn-primary">Add Prescription</button>
    </div>
  </div>
          </form>
        </div>


        </div>
      </div>

    </div>
  </section><!-- End Event List Section -->

</main><!-- End #main -->
  <!-- End Patients Section -->

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
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>

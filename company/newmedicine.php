<!DOCTYPE html>
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

      <!-- <h1 class="logo mr-auto"><a href="index.html">Me &amp; Family</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="../index.html" class="logo mr-auto"><img src="../assets/img/eprescri-logo.png" alt="" class="img-fluid"></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="../index.html">Home</a></li>
          <li><a href="../index.html#about">About eprescri</a></li>
          <!-- <li><a href="#">Medicines available</a></li>
          <li><a href="#">Medicines' Companies</a></li> -->
          <li class="drop-down"><a href="#log-in">Log in</a>
            <ul>
              <li><a href="../login.html">Log in as Doctor</a></li>
              <li><a href="../login.html">Log in as Pharmacy</a></li>
              <li><a href="../login.html">Log in as Patient</a></li>
              <li><a href="../login.html">Log in as Company</a></li>
            </ul>
          </li>
          <!-- <li><a href="contact.html">Contact</a></li> -->

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->




  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Add , Remove , Update Medicine </h2>
        <ol>
          <li><a href="../index.html">Home</a></li>
          <li><a href="#">Company</a></li>
          <li>Add , Remove , Update Medicine</li>
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
            <li class="list-group-item list-group-item-dark "><strong><u>Company menu</u></strong></li>
            <a href="available_meds.php"><li class="list-group-item">Medicines available</li></a>
            <a href="newmedicine.php"><li class="list-group-item">Add , Remove , Update Medicines </li></a>
          </ul>
        </div>

        <!-- Doctor's main Content -->
        <div class="col-sm-9 doc-area-main">
          <div class="alert alert-primary" role="alert">
            Complete the form bellow to add a new medicine.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form>
            <div class="form-group">
              <label for="patientSSN">Category</label>
              <input type="text" class="form-control" id="medicineCategory" aria-describedby="patientSSNformHelp" placeholder="e.g. Antibiotcs">
            </div>

            <div  class="form-group">
              <label for="medicines">Name</label>
              <input type="text" class="form-control" id="medicineName" placeholder=" e.g. Cipro">
              <ul id="ulMedicinesDoctor">
              </ul>
            </div>

            <div  class="form-group">
              <label for="medicines">Price</label>
              <input type="text" class="form-control" id="medicineName" placeholder="e.g. 15€ ">
              <ul id="medicinePrice">
              </ul>
            </div>


            <div class="form-group">
              <label for="prescriptionInstructions">Contradctions</label>
              <textarea class="form-control" id="medicineContradictions" placeholder="Write the contradictions of the medicine "></textarea>
            </div>

            <div  class="form-group">
              <label for="medicines">Milligrams</label>
              <input type="text" class="form-control" id="medicineName" placeholder=" e.g. 500mg">
              <ul id="ulMedicinesDoctor">
              </ul>
            </div>

            <div class="form-group">
              <label for="prescriptionInstructions">Description</label>
              <textarea class="form-control" id="medicineDescription" placeholder="Write the description for the medicine "></textarea>
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
    <div class="col-sm">
<button id="addMedicineDoctor" type="submit" class="btn btn-primary">Add Medicine</button>
    </div>
    <div class="col-sm">
      <button id="deleteMedicineDoctor" type="submit" class="btn btn-primary">Delete Medicine</button>
    </div>
  </div>
</div>
          </form>
        </div>


        <!-- <div class="col-md-6 d-flex align-items-stretch">
          <div class="card">
            <div class="card-img">
              <img src="assets/img/events-2.jpg" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title">James 6th Birthday</h5>
              <p class="font-italic text-center">Sunday, November 15th at 7:00 pm</p>
              <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>
            </div>
          </div> -->

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

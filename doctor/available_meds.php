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
        <h2>Add New Prescription</h2>
        <ol>
          <li><a href="../index.html">Home</a></li>
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
            <a href="index.html"><li class="list-group-item">My Patients</li></a>
            <a href="prescriptions.html"><li class="list-group-item">Manage Prescriptions</li></a>
            <a href="newprescription.html"><li class="list-group-item">Add New Prescription</li></a>
            <a href="watchapatient.php"><li class="list-group-item">Watch a Patient's Record</li></a>
            <a href="available_meds.php"><li class="list-group-item  active">Medicines available</li></a>
          </ul>
         </div>

        <!-- Doctor's main Content -->
        <div class="col-sm-9 doc-area-main">
          <div class="alert alert-primary" role="alert">
            Currently Available medicines.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <!-- php for load the available medicines -->
          <?php
          // Get a connection for the database
          require_once('../mysqli_connection.php');

          if ($conn) {
            // echo "connected <br>";
          } else {
            echo "Problem Connecting to database";
          }

          // Create a query for the database
          $query = "SELECT medicine.code AS 'medcode',company.companyID  AS 'compID', medicine.name AS 'medname',
          company.name AS 'compname',medicine.category,medicine.milligrams,GROUP_CONCAT(medicine_substances.substance)AS 'substances',
          medicine.price
          FROM medicine
          JOIN company ON medicine.companyID = company.companyID
          JOIN medicine_substances ON (medicine_substances.code=medicine.code AND medicine_substances.companyID = medicine.companyID)
          GROUP BY medcode,compID
          ORDER BY medcode,compID";

          // Get a response from the database by sending the connection
          // and the query
          $response = $conn->query($query);

          // If the query executed properly proceed
          if($response){

          echo '<table class="table table-striped">

          <tr>
          <th scope="col"><b>Company\'s name</b></th>
          <th scope="col"><b>Medicine\'s serial code</b></th>
          <!-- <th scope="col"><b>Company\'s ID</b></th> -->
          <th scope="col"><b>Medicine\'s name</b></th>

          <th scope="col"><b>Category</b></th>
          <th scope="col"><b>Milligrams</b></th>
          <th scope="col"><b>Substances</b></th>
          <th scope="col"><b>Price</b></th>
          </tr>';



          // mysqli_fetch_array will return a row of data from the query
          // until no further data is available
          $prev_medcode = 0;
          $prev_compID = 0;
          while($row = mysqli_fetch_array($response)){
          echo '<tr><td>' .
          $row['compname'] . '</td><td>' .
          $row['medcode'] . '</td><td>' .
          // $row['compID'] . '</td><td align="left">' .
          $row['medname'] . '</td><td>' .
          $row['category'] . '</td><td>' .
          $row['milligrams'] . '</td><td>' .
          //Printing multiple subastances of a medicine properly.
          str_replace (",","<br>",$row['substances']) . '</td><td>' .
          $row['price'] . '</td>';
          echo '</tr>';

          $prev_medcode = $row['medcode'];
          $prev_compID  = $row['compID'];


          }

          echo '</table>';

          } else {

          echo "Couldn't issue database query<br />";

          echo mysqli_error($conn);

          }

          // Close connection to the database
          mysqli_close($conn);

          ?>


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

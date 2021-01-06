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
if (!isset($_SESSION['loggedin']) || $_SESSION['usertype']!='pharmacy') {
  require("please_login.php");
}
?>
<body>
  <!-- ======= Header ======= -->
  <?php require_once('header_region.php'); ?>
  <!-- End Header -->
  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2></h2>
        <ol>
          <li><a href="../index.html">Home</a></li>
          <li><a href="#">Pharmacy</a></li>
          <li>Companies</li>
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
            <li class="list-group-item list-group-item-dark "><strong><u>Pharmacy menu</u></strong></li>
            <a href="index.php"><li class="list-group-item ">Search Prescription</li></a>
            <a href="medicine.php"><li class="list-group-item ">Medicines </li></a>
            <a href="companies.php"><li class="list-group-item active">Companies</li></a>

          </ul>
        </div>
        <!-- Pharmacy's main Content -->
        <div class="col-sm-9 doc-area-main">
          <div class="alert alert-primary" role="alert">
            Medicine Producers
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>


          <table class="table table-striped">
                       <tr>
                         <td> Name</td>
                           <td> Telephone Number</td>
                             <td> email</td>
                                 <td> Website</td>
                       </tr>

           <?php

               if (isset($_GET['pageno'])) {
                   $pageno = $_GET['pageno'];
               } else {
                   $pageno = 1;
               }
               $no_of_records_per_page = 8;
               $offset = ($pageno-1) * $no_of_records_per_page;

               $conn=mysqli_connect("localhost","eprescriadmin","f4rm4k0","eprescridb");
               // Check connection
               if (mysqli_connect_errno()){
                   echo "Failed to connect to MySQL: " . mysqli_connect_error();
                   die();
               }

               $total_pages_sql = "SELECT COUNT(*) FROM company";
               $result = mysqli_query($conn,$total_pages_sql);
               $total_rows = mysqli_fetch_array($result)[0];
               $total_pages = ceil($total_rows / $no_of_records_per_page);

               $sql = "SELECT name,email,telephone_number,website
              FROM company
                 LIMIT $offset, $no_of_records_per_page";
               $res_data = mysqli_query($conn,$sql);
               while($row = mysqli_fetch_array($res_data)){
                 echo "<tr><td>"
                     . $row["name"]."</td><td>"
                     . $row["telephone_number"].  "</td><td>"
                     . $row["email"].  "</td><td>"
                       .$row["website"]. "</td>". "</tr>";
               }
               echo "</table>";
               mysqli_close($conn);
           ?>

           </table>

           <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
           <strong>Page <?php echo $pageno." of ".$total_pages; ?></strong>
           </div>
            <ul class="pagination">
                <li class="page-item" id="firstButtonPharmacy"><a class="page-link" href="?pageno=1">First</a></li>
                <li class="page-item" id="nextButtonPharmacy" class=" class="page-link" <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                    <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                </li>
                <li class="page-item" id="prevButtonPharmacy" class=" class="page-link" <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                    <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                </li>
                <li class="page-item" id="lastButtonPharmacy"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
            </ul>
            <ul class="pagination">

          <!-- HERE WILL LOAD THE patient_prescription_table.php -->
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

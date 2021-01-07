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




  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>My Patients</h2>
        <ol>
          <li><a href="../index.php">Home</a></li>
          <li><a href="#">Doctor</a></li>
          <li>My Patients</li>
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
            <a href="index.php"><li class="list-group-item ">My Patients</li></a>
            <a href="prescriptions.php"><li class="list-group-item">Manage Prescriptions</li></a>
            <a href="newprescription.php"><li class="list-group-item">Add New Prescription</li></a>
            <a href="watchapatient.php"><li class="list-group-item">Watch a Patient's Record</li></a>
            <a href="available_meds.php"><li class="list-group-item">Medicines available</li></a>
          </ul>

        </div>
        <div class="col-sm-9 doc-area-main">
          <?php
          if (session_status() == PHP_SESSION_NONE) {
            session_start();
          }
          if (!isset($_SESSION['loggedin']) || $_SESSION['usertype']!='doctor') {
            require("please_login.php");
          }

          require_once('../mysqli_connection.php');
          if(isset($_POST['medicines1']) && $_POST['medicines1']!="" ){
            $nMeds = $_POST["numberOfMeds"];
          }
          else{
            echo "<div class=\"container alert alert-warning\" role=\"alert\">
                  <h4><i class=\"fas fa-exclamation-triangle\"></i>Please add medicines or fill them properly.</h4>
                </div>";
            echo "<a href=\"newprescription.php\"><button type=\"button\" class=\"btn btn-outline-dark\"><i class=\"fas fa-chevron-left\"></i> Go back to Prescription Form.</button></a>";
            exit;
          }



          ///Valuate form data (start)
          //Sql Query to See if USer exists
          $patient_query = 'SELECT SSN FROM patient WHERE SSN = ?';
          // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
          if ($stmt = $conn->prepare($patient_query)) {
            // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
            $stmt->bind_param('s', $_POST['SSN']);
            $stmt->execute();
            // Store the result so we can check if the account exists in the database.
            $stmt->store_result();

            //Patient Exists
            //Check if exists
            if ($stmt->num_rows > 0) {
              for($i=1 ; $i<=$nMeds ; $i++){
                $medName ="";
                $compName ="";
                $medCode ="";
                $str = "medicines" . (string)$i;
                $strQuantity = "quantity" . (string)$i;
                // echo "med".$i.":". $_POST[$str]."</br>";
                $x = explode('-', $_POST[$str]);
                if(isset($x[0])){$medName =$x[0];}
                if(isset($x[1])){$compName =$x[1];}
                if(isset($x[2])){$medCode =$x[2];}

                //TEST
                // echo "</br> medname=".$medName."</br>";
                // echo "</br> compname=".$compName."</br>";
                // echo "</br> medCode=".$medCode."</br>";

                //Check if Medicines exist
                $medicine_query = 'SELECT name,code,companyID FROM medicine WHERE name = ? AND code =?';
                $stmtMed = $conn->prepare($medicine_query);
                $stmtMed->bind_param('ss', $medName,$medCode);
                $stmtMed->execute();
                // Store the result so we can check if the medicine exists in the database.
                $stmtMed->store_result();

                //Check if company exists
                $company_query = 'SELECT name,companyID FROM company WHERE name = ? ';
                $stmtComp = $conn->prepare($company_query);
                $stmtComp->bind_param('s', $compName);
                $stmtComp->execute();
                // Store the result so we can check if the company exists in the database.
                $stmtComp->store_result();

                if ($stmtComp->num_rows == 0 ||$stmtMed->num_rows == 0 ){
                  echo "<div class=\"container alert alert-warning\" role=\"alert\">
                        <h4><i class=\"fas fa-exclamation-triangle\"></i> Medicine n.".$i." or its company doesn't exist, or input n.".$i." isn't filled properly. </h4>
                      </div>";
                  echo "<a href=\"newprescription.php\"><button type=\"button\" class=\"btn btn-outline-dark\"><i class=\"fas fa-chevron-left\"></i> Go back to Prescription Form.</button></a>";
                  exit;
                }
                //check if company and medicine exist, but medicine is not product of this company
                else{
                  $stmtMed->bind_result($MedicineName,$MedicineCode, $CompanyID);
                  $stmtMed->fetch();

                  $stmtComp->bind_result($tCompanyName, $tCompanyID);
                  $stmtComp->fetch();
                  if($CompanyID != $tCompanyID){
                    echo "<div class=\"container alert alert-warning\" role=\"alert\">
                          <h4><i class=\"fas fa-exclamation-triangle\"></i> Medicine n.".$i." doesn't belong to the company filled in the form, or it doesn't filled properly.</h4>
                        </div>";
                    echo "<a href=\"newprescription.php\"><button type=\"button\" class=\"btn btn-outline-dark\"><i class=\"fas fa-chevron-left\"></i> Go back to Prescription Form.</button></a>";
                    exit;
                  }

                  //Check If quantities set properlys
                  if(!isset($_POST[$strQuantity])||$_POST[$strQuantity]==""){
                    echo "<div class=\"container alert alert-warning\" role=\"alert\">
                          <h4><i class=\"fas fa-exclamation-triangle\"></i>Please Enter the quantity (in units) of the medicines you want to prescribe.</h4>
                        </div>";

                    echo "<a href=\"newprescription.php\"><button type=\"button\" class=\"btn btn-outline-dark\"><i class=\"fas fa-chevron-left\"></i> Go back to Prescription Form.</button></a>";
                    exit;
                  }


                }
                $stmtComp->close();
                $stmtMed->close();
              }
              if(!isset($_POST["instructions"])||$_POST["instructions"]==""){
                echo "<div class=\"container alert alert-warning\" role=\"alert\">
                      <h4><i class=\"fas fa-exclamation-triangle\"></i>Please Enter instructions to your prescriptions.</h4>
                    </div>";

                echo "<a href=\"newprescription.php\"><button type=\"button\" class=\"btn btn-outline-dark\"><i class=\"fas fa-chevron-left\"></i> Go back to Prescription Form.</button></a>";
                exit;
              }
              ///Valuate form data (END)


              //Inserting data to database
              $insert_prescription_query = "INSERT INTO prescription (doctorID,patientSSN, instructions, fromDate,toDate) VALUES (?,?, ?, ?, ?)";
              // Create Prepare Statement
              if($stmt_ins_prescri= $conn->prepare($insert_prescription_query)){

              //
              $stmt_ins_prescri->bind_param("sssss", $_SESSION['id'],$_POST['SSN'], $_POST['instructions'], $_POST['prescription_fromdate'], $_POST['prescription_todate']);
              $stmt_ins_prescri->execute();

              $stmt_ins_prescri->close();

              }
              else{
                echo "Problem In prepareee!";
              }
              //Get the Id of the last added prescription
              $prescriptionID=$conn -> insert_id;


              for($i=1 ; $i<=$nMeds ; $i++){
                $medName ="";
                $compName ="";
                $medCode ="";
                $str = "medicines" . (string)$i;
                $strQuantity = "quantity" . (string)$i;
                // echo "med".$i.":". $_POST[$str]."</br>";
                $x = explode('-', $_POST[$str]);
                if(isset($x[0])){$medName =$x[0];}
                if(isset($x[1])){$compName =$x[1];}
                if(isset($x[2])){$medCode =$x[2];}

                //Get companyId of the medicine
                $company_query = 'SELECT name,companyID FROM company WHERE name = ? ';
                $stmtComp = $conn->prepare($company_query);
                $stmtComp->bind_param('s', $compName);
                $stmtComp->execute();
                $stmtComp->store_result();
                $stmtComp->bind_result($tCompanyName, $tCompanyID);
                $stmtComp->fetch();



                $insert_medicine_query = "INSERT INTO prescription_consistsof_medicine (prescriptionID, medicineCode, companyID, quantity) VALUES (?,?, ?, ?)";
                if($stmt_ins_med= $conn->prepare($insert_medicine_query)){
                $stmt_ins_med->bind_param("ssss",$prescriptionID,$medCode, $tCompanyID, $_POST[$strQuantity]);
                if($stmt_ins_med->execute()&& $i==$nMeds){
                  echo "<div class=\"container alert alert-success\" role=\"alert\">
                        <h4><i class=\"far fa-check-square\"></i>  Prescription added succesfully.</h4>
                      </div>";
                }
                $stmt_ins_med->close();


                }

                // //TEST
                // echo "</br> medname=".$medName."</br>";
                // echo "compname=".$compName."</br>";
                // echo " medCode=".$medCode."</br>";
                // echo "QTY.=".$_POST[$strQuantity]."</br>";
                // echo "compID.=".$tCompanyID."</br>";
                // echo "New record has id: " .$prescriptionID ;
                // //TEST END



              }

              } else {
            // Incorrect username
              echo "<div class=\"container alert alert-danger\" role=\"alert\">
                    <h4><i class=\"fas fa-exclamation-triangle\"></i>Patient with this SSN Doesn't exist, please Enter a valid SSN.</h4>
                  </div>";

              echo "<a href=\"newprescription.php\"><button type=\"button\" class=\"btn btn-outline-dark\"><i class=\"fas fa-chevron-left\"></i> Go back to Prescription Form.</button></a>";
              exit;
            }
            $stmt->close();
          }



           ?>
           <div>
</body>
 </html>

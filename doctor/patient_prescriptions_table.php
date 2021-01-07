<!DOCTYPE html>
<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

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
if (!isset($_SESSION['loggedin']) || $_SESSION['usertype']!='doctor') {
  require("please_login.php");
}

?>
  <section>
  <div class="container">
    <div class=" section-title ">
      <h4><?php echo($_GET['fname']." ".$_GET['lname']."'s"); ?>  prescriptions</h4>
    </div>
    </div>
  <div class="container">

<?php
  require_once('../mysqli_connection.php');



  $patientSSN=$_GET['SSN'];


  $sql1="SELECT prescriptionID FROM prescription WHERE patientSSN= $patientSSN " ;
  $prescriptionIDs= $conn->query($sql1);

  $sql_secondary="SELECT SSN FROM patient WHERE SSN =$patientSSN " ;
  $patientID = $conn->query($sql_secondary);

  if (mysqli_num_rows($prescriptionIDs)==0 && mysqli_num_rows($patientID)!=0)
  {
    echo "There are no Prescriptions for this patient.";
    $conn->close();
  }
  elseif(mysqli_num_rows($prescriptionIDs)==0)
  {
    echo "Please enter a valid Patient SSN.";
    $conn->close();
  }
  else
    {
      echo '<table class="table table-striped">
              <tr>
              <th scope="col"> From </th>
              <th scope="col"> To </th>
              <th scope="col"> Instructions </th>
              <th scope="col"> Medicines </th>
              <th scope="col"> Company </th>
              <th scope="col"> Quantity </th>
              <th scope="col"> Reified</th>
              </tr>';
      $arr = array();
      while ($row = mysqli_fetch_array($prescriptionIDs)) {
          $arr[] = $row["prescriptionID"];
      }

      $sql = "SELECT p.fromDate, p.toDate, p.instructions , GROUP_CONCAT(m.name) AS medicineName, GROUP_CONCAT(c.name) AS companyName,reifyDate,GROUP_CONCAT(quantity) AS quantity,milligrams
      FROM prescription p
      JOIN prescription_consistsof_medicine pcm ON (p.prescriptionID=pcm.prescriptionID)
      JOIN medicine m ON (pcm.medicineCode=m.code AND m.companyID=pcm.companyID)
      JOIN  company c ON (m.companyID=c.companyID)
      WHERE p.patientSSN =$patientSSN
      GROUP BY p.prescriptionID
      ORDER BY reifyDate;";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
      // output data of each row
      while($row = mysqli_fetch_array($result)) {
       if(!is_null($row["reifyDate"])){
         $reify_status = "Reified";
       }
       else {
         $reify_status= "Not Reified";
       }
       echo "<tr><td>"
       . $row["fromDate"]."</td><td>"
       . $row["toDate"].  "</td><td>"
       . $row["instructions"].  "</td><td>"
        .str_replace (",","<br>",$row["medicineName"]).  "</td><td>"
        .str_replace (",","<br>",$row["companyName"]). "</td><td>"
        .str_replace (",","<br>",$row["quantity"]).  "</td><td>"
         . $reify_status.  "</td>"
         . "</tr>";
      }
      echo "</table>";
      } else {
      echo "0 results";
      }
      $conn->close();
  }
  ?>

</div>
</section>

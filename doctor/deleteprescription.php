<?php
// We need to use sessions, so you should always start sessions using the below code.
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}


// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])|| $_SESSION['usertype']!='doctor') {
  require("please_login.php");
}
//connect to database.
require_once('mysqli_connection_doctor.php');

//Check IF the doctor wants to delete the prescription is the doctor wrote the prescription.
$prescriptionID = $_GET['ID'];



$checkQuery = "SELECT doctorID FROM prescription WHERE prescriptionID = $prescriptionID";

$doctorID = $conn->query($checkQuery);

$row = mysqli_fetch_array($doctorID);

if($row['doctorID'] !=  $_SESSION['id']){
  echo "<div class=\"container alert alert-danger\" role=\"alert\">
          <h4><i class=\"fas fa-exclamation-triangle\"></i> PERMISSION DENIED! TRIED TO DELETE ANOTHER DOCTOR'S PRESCRIPTION!!!</h4>
        </div>";

  header( "refresh:3;url=prescriptions.php" );
  exit;
}
else{
  $delete_query1 = "DELETE FROM prescription_consistsof_medicine WHERE prescriptionID='$prescriptionID'";
  if ($conn->query($delete_query1) === TRUE) {
      $delete_query2 = "DELETE FROM prescription WHERE prescriptionID='$prescriptionID'";
      if ($conn->query($delete_query2) === TRUE) {
         header( "Location: successfulprescridelete.php" );
      } else {
          echo "Error deleting record: " . $conn->error;
      }
  } else {
      echo "Error deleting record: " . $conn->error;
  }

}




 ?>

<?php
// We need to use sessions, so you should always start sessions using the below code.
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}


// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])|| $_SESSION['usertype']!='company') {
  require("please_login.php");
}
//connect to database.
require_once('mysqli_connection_company.php');


$medicineCode = $_GET['ID'];

$thisCompanyID = $_SESSION['id'];

$checkQuery = "SELECT companyID FROM medicine WHERE code = $medicineCode";

$companyID = $conn->query($checkQuery);

$isMedexists = false;

while($row = mysqli_fetch_array($companyID)){
  if($row['companyID'] ==  $_SESSION['id']){
    $isMedexists = true;
  }
}
if($isMedexists != true){

  echo "<div class=\"container alert alert-danger\" role=\"alert\">
          <h4><i class=\"fas fa-exclamation-triangle\"></i> Medicine with code=" .$medicineCode. " doesn't exist in your company's medicines!!!</h4>
        </div>";

  header( "refresh:2;url=index.php" );
  exit;
}
else{

  $delete_query1 = "DELETE FROM prescription_consistsof_medicine WHERE medicineCode='$medicineCode' && companyID='$thisCompanyID'";
  $delete_query2 = "DELETE FROM medicine_substances WHERE code='$medicineCode' && companyID='$thisCompanyID'";
  $delete_query3 = "DELETE FROM medicine WHERE code='$medicineCode' && companyID='$thisCompanyID'";
  if ($conn->query($delete_query1) === TRUE     &       $conn->query($delete_query2) === TRUE  &   $conn->query($delete_query3) === TRUE         ) {
         header( "Location: successfulmeddelete.php" );
      } else {
          echo "Error deleting record: " . $conn->error;
      }


}




 ?>

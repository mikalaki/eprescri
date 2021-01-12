<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

  require_once('mysqli_connection_pharmacy.php');

  $pharmacyTIN = $_SESSION['id'];
  $prescriptionID=$_POST['prescriptionID'];
  $sql="UPDATE prescription SET reifyDate=\"" .date("Y-m-d h:m:s") . "\" , reifPharmacyTIN=\"". $pharmacyTIN . "
  \"  WHERE prescriptionID=\"". $prescriptionID . "\""  ;
  echo $sql;


  if($result = $conn->query($sql)){
    echo "<meta http-equiv='refresh' content='0'>";
  }
  else{
    echo "Problem Reifying Prescription.";
  };
  $conn->close();
 ?>

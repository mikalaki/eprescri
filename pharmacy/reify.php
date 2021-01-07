<?php

  require_once('../mysqli_connection.php');
  $prescriptionID=$_POST['prescriptionID'];
  echo $prescriptionID;
$sql="UPDATE prescription SET reifyDate=\"" .date("Y-m-d h:m:s") . "\"  WHERE prescriptionID=\"". $prescriptionID . "\""  ;
echo $sql;
  $result = $conn->query($sql);

  $conn->close();
 ?>

<?php
  require_once('../mysqli_connection.php');


  $query_1 = "SELECT user_patient.id
  FROM user_patient
  WHERE username = '{$_SESSION['name']}'";

  $response_1 = $conn->query($query_1);

  if($response_1){
  while($row = mysqli_fetch_array($response_1)){
  $id_key =   $row['id'];
    }
  }

  $query_2 = " SELECT  prescri.prescriptionID , d.first_name , d.last_name , md.name , pco.quantity , prescri.instructions , prescri.fromDate , prescri.toDate , prescri.reifyDate
  FROM  prescription prescri
  JOIN doctor d on d.doctorID =   prescri.doctorID
  JOIN prescription_consistsof_medicine pco on pco.prescriptionID = prescri.prescriptionID
  JOIN medicine md on md.code = pco.medicineCode
  WHERE  prescri.patientSSN =  '{$id_key}' ";



  $response_2 = $conn->query($query_2);
  if($response_2){
  if (mysqli_num_rows($response_2)==0 )
  {
    echo "You do not watch any prescriptions yet.";
    $conn->close();
  }
  else
    {
      // TO ADD THE HTML TABLE FORMAT
    while($row = mysqli_fetch_array($response_2)){

     echo $row[0] . " " . $row[1] . " " . $row[2] . " " . $row[3] . "  ".  $row[4] . "  ".  $row[5] .  "  ".  $row[6] . "  ".  $row[7] ."  ".  $row[8] ."<br>  <br>";
    }
   }
  }

  ?>

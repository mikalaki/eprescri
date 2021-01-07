<?php

require_once('../mysqli_connection.php');
// TO BE DONE

// Query to get the keys from the users table
$query_1 = "SELECT user_doctor.id
FROM user_doctor
WHERE username = '{$_SESSION['name']}'";

$response_1 = $conn->query($query_1);

if($response_1){
while($row = mysqli_fetch_array($response_1)){
$id_key =   $row['id'];
  }
}


$query_2 = "SELECT  d_watches.PatientSSN , p.first_name , p.last_name , d_watches.fromDate , d_watches.toDate
FROM doctor_watches_patient d_watches
JOIN patient p on p.SSN = d_watches.PatientSSN
WHERE  d_watches.doctorID = '{$id_key}' ";


$response_2 = $conn->query($query_2);

if($response_2){
if (mysqli_num_rows($response_2)==0 )
{
  echo "You do not watch any patient yet.";
  $conn->close();
}
else
  {
    // TO ADD THE HTML TABLE FORMAT
  while($row = mysqli_fetch_array($response_2)){
   echo $row[0] . " " . $row[1] . " " . $row[2] . " " . $row[3] . "  ".  $row[4] . "<br>  <br>";
  }
 }
}

?>

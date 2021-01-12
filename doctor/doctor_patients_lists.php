<?php

require_once('mysqli_connection_doctor.php');
// TO BE DONE
if ($conn) {
  // echo "connected <br>";
} else {
  echo "Problem Connecting to database";
}

// We need to use sessions, so you should always start sessions using the below code.
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}


// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin']) || $_SESSION['usertype']!='doctor') {
  require("please_login.php");
}


//initializing doctor id to the id of the doctor conected to session.
$doctorID = $_SESSION['id'];

if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
}
else {
    $page_no = 1;
}

// records per page
$total_records_per_page = 5;

$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";

// Get total records
$result_count = $conn->query("SELECT count(patient.SSN) as total_records
FROM  doctor_watches_patient
JOIN patient  on doctor_watches_patient.patientSSN=patient.SSN
WHERE doctorID=$doctorID");
$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];

//get total number of pages
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total pages minus 1


$query = "SELECT patient.SSN, patient.first_name, patient.last_name,fromDate,toDate,patient.telephone_number
FROM  doctor_watches_patient
JOIN patient  on doctor_watches_patient.patientSSN=patient.SSN
WHERE doctorID=$doctorID
LIMIT $offset, $total_records_per_page;";



$result = $conn->query($query);

if ($result->num_rows > 0) {
  while($row = mysqli_fetch_array($result)){
    echo "<tr>
   <td>".$row['SSN']."</td>
   <td>".$row['first_name']."</td>
   <td>".$row['last_name']."</td>
   <td>".$row['fromDate']."</td>
   <td>".$row['toDate']."</td>
   <td>".$row['telephone_number']."</td>
   <td><a href=\"patient_prescriptions.php?SSN=".$row['SSN']."&fname=".$row['first_name']."&lname=".$row['last_name']."\" ><button type=\"button\" class=\"btn btn-primary\">Watch</button> </a></td>
   </tr>";
          }
}





?>

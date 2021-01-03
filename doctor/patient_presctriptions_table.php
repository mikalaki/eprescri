<?php
// Get a connection for the database
require_once('../mysqli_connection.php');

if ($conn) {
  //echo "connected <br>";
} else {
  echo "Problem Connecting to database";
}

$patientSSN = 17078814869;

// Create a query for the database
$query = "SELECT medicine.name,quantity,fromDate,toDate
FROM prescription JOIN prescription_consistsof_medicine ON prescription.prescriptionID = prescription_consistsof_medicine.prescriptionID
JOIN medicine ON (prescription_consistsof_medicine.medicineCode = medicine.code AND prescription_consistsof_medicine.companyID = medicine.companyID )
WHERE prescription.patientSSN= $patientSSN ;
";

// Get a response from the database by sending the connection
// and the query
$response = $conn->query($query);

// If the query executed properly proceed
if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8">


<td align="left"><b>Medicine\'s name</b></td>
<td align="left"><b>Quantity</b></td>
<td align="left"><b>From Date</b></td>
<td align="left"><b>To Date</b></td>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' .
$row['name'] . '</td><td align="left">' .
$row['quantity'] . '</td><td align="left">' .
$row['fromDate'] . '</td><td align="left">' .
$row['toDate'] . '</td><td align="left">' ;

echo '</tr>';
}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($conn);

}

// Close connection to the database
mysqli_close($conn);

?>

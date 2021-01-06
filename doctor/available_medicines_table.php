<?php
// Get a connection for the database
require_once('../mysqli_connection.php');

if ($conn) {
  // echo "connected <br>";
} else {
  echo "Problem Connecting to database";
}

// Create a query for the database
$query = "SELECT medicine.code AS 'medcode',company.companyID  AS 'compID', medicine.name AS 'medname',
company.name AS 'compname',medicine.category,medicine.milligrams,GROUP_CONCAT(medicine_substances.substance)AS 'substances',
medicine.price
FROM medicine
JOIN company ON medicine.companyID = company.companyID
JOIN medicine_substances ON (medicine_substances.code=medicine.code AND medicine_substances.companyID = medicine.companyID)
GROUP BY medcode,compID
ORDER BY medcode,compID";

// Get a response from the database by sending the connection
// and the query
$response = $conn->query($query);

// If the query executed properly proceed
if($response){

  echo '<table class="table table-striped">

  <tr>
  <th scope="col"><b>Company\'s name</b></th>
  <th scope="col"><b>Medicine\'s serial code</b></th>
  <!-- <th scope="col"><b>Company\'s ID</b></th> -->
  <th scope="col"><b>Medicine\'s name</b></th>

  <th scope="col"><b>Category</b></th>
  <th scope="col"><b>Milligrams</b></th>
  <th scope="col"><b>Substances</b></th>
  <th scope="col"><b>Price</b></th>
  </tr>';



  // mysqli_fetch_array will return a row of data from the query
  // until no further data is available
  while($row = mysqli_fetch_array($response)){
    echo '<tr><td>' .
    $row['compname'] . '</td><td>' .
    $row['medcode'] . '</td><td>' .
    // $row['compID'] . '</td><td align="left">' .
    $row['medname'] . '</td><td>' .
    $row['category'] . '</td><td>' .
    $row['milligrams'] . '</td><td>' .
    //Printing multiple subastances of a medicine properly.
    str_replace (",","<br>",$row['substances']) . '</td><td>' .
    $row['price'] . '</td>';
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

<?php
// Get a connection for the database
require_once('../mysqli_connection.php');

if ($conn) {
  // echo "connected <br>";
} else {
  echo "Problem Connecting to database";
}

// Query to get the keys from the users table
$query_1 = "SELECT user_company.id
FROM user_company
WHERE username = '{$_SESSION['name']}'";

$response = $conn->query($query_1);

if($response){
while($row = mysqli_fetch_array($response)){
$id_key =   $row['id'];
  }
}



// Create a query for the database
$query_2 = "SELECT medicine.code AS 'medcode',company.companyID  AS 'compID', medicine.name AS 'medname',
company.name AS 'compname',medicine.category,medicine.milligrams,GROUP_CONCAT(medicine_substances.substance)AS 'substances',
medicine.price
FROM medicine
JOIN company ON medicine.companyID = company.companyID
JOIN medicine_substances ON (medicine_substances.code=medicine.code AND medicine_substances.companyID = medicine.companyID)
WHERE company.companyID = '$id_key'
GROUP BY medcode,compID
ORDER BY medcode,compID
";

// Get a response from the database by sending the connection
// and the query
$response = $conn->query($query_2);



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
$result_count = $conn->query("SELECT count(code) as total_records
FROM  medicine
WHERE companyID=$id_key");
$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];

//get total number of pages
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total pages minus 1

// If the query executed properly proceed
if($response){

echo '<table class="table table-striped">

<tr>

<th scope="col"><b>Serial code</b></th>
<!-- <th scope="col"><b>Company\'s ID</b></th> -->
<th scope="col"><b>Medicine\'s name</b></th>

<th scope="col"><b>Category</b></th>
<th scope="col"><b>Milligrams</b></th>
<th scope="col"><b>Substances</b></th>
<th scope="col"><b>Price</b></th>
<th scope=\"col\">Actions</th>
</tr>';



// mysqli_fetch_array will return a row of data from the query
// until no further data is available
$prev_medcode = 0;
$prev_compID = 0;
while($row = mysqli_fetch_array($response)){



  echo "<tr>
 <td>".$row['medcode']."</td>
 <td>".$row['medname']."</td>
 <td>".$row['category']."</td>
 <td>".$row['milligrams']."</td>
 <td>".$row['substances']."</td>
  <td>".$row['price']."</td>
 <td class=\"prescription_buttons_td\">
 <button type=\"button\" class=\"btn btn-secondary btn-sm\"><i class=\"far fa-edit\"></i></button>
 <a href=deletemedicinedialog.php?ID=".$row['medcode']." <button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fas fa-trash-alt\"></i></button>
 </td>
 </tr>";



echo '</tr>';

$prev_medcode = $row['medcode'];
$prev_compID  = $row['compID'];


}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($conn);

}

// Close connection to the database
mysqli_close($conn);

?>

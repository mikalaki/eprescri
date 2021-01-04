

<?php
$servername = "localhost";
$username = "eprescriadmin";
$password = "f4rm4k0";

#$username = "root"
#$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
  echo "<h1>Connected successfully \n </h1>";
}
$database = mysqli_select_db( $conn, 'eprescridb');



if ($database) {
  echo "connected <br>";
} else {
  echo "not connected";
}



//
##################  QUERY 13 MULTI QUERY IN PHP #####################
$sql = "SELECT m.code, m.companyId, s.substance, c.name AS 'Company\'s name' FROM medicine m JOIN company c on m.companyID=c.companyID JOIN medicine_substances s on s.companyID=m.companyID AND m.code=s.code WHERE m.name='Cipro' ";
// Execute multi query
if ($conn -> multi_query($sql)) {
  do {
    // Store first result set
    if ($result = $conn -> store_result()) {
      while ($row = $result -> fetch_row()) {
        $a = mysqli_num_fields ( $result );
        printf("The number of fields is :  %s  <br>" , $a);
        echo "Code : " . $row[0]. " - Company ID: " . $row[1]. " - Substance " . $row[2] . "- Company Name " . $row[3] ."<br>";
      }
     $result -> free_result();
    }
    // if there are more result-sets, the print a divider
    if ($conn -> more_results()) {
      printf("-------------\n");
    }
     //Prepare next result set
  } while ($conn -> next_result());
}

 ############ SIMPLE QUERY IN PHP ##################
//$sql = "SELECT  first_name, last_name FROM doctor";
// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "First Name : " . $row["first_name"]. " - Last  Name: " . $row["last_name"]. " " . "<br>";
//   }
// } else {
//   echo "0 results";
// }

$conn -> close();


?>

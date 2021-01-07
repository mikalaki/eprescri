<?php

require_once('../mysqli_connection.php');
session_start();
if ($conn) {
  // echo "connected <br>";
} else {
  echo "Problem Connecting to database";
}

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['medCat'], $_POST['medNam'], $_POST['medPr'],  $_POST['medContr'], $_POST['medMg'], $_POST['medDesc'],     )) {
	// Could not get the data that should have been sent.
	exit('Please add all the fields!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['medCat']) || empty($_POST['medNam']) || empty($_POST['medPr']) || empty($_POST['medContr']) || empty($_POST['medMg']) || empty($_POST['medDesc'])   ) {
	// One or more values are empty.
	exit('Please add all the fields');
}

// Query to get the keys from the users table
$query_1 = "SELECT user_company.id
FROM user_company
WHERE username = '{$_SESSION['name']}'";

$response_1 = $conn->query($query_1);

if($response_1){
while($row = mysqli_fetch_array($response_1)){
$id_key =   $row['id'];
  }
}

$query_2 = "SELECT medicine.code FROM medicine ORDER BY medicine.code DESC LIMIT 1";


$response_2 = $conn->query($query_2);

if($response_2){
while($row = mysqli_fetch_array($response_2)){
$code_idx=  $row['code'];
  }
}
$code_idx = $code_idx + 1;

echo $code_idx . $_POST['medCat'] .$_POST['medNam']  .  $_POST['medPr']  . $_POST['medContr'] . $_POST['medMg'].$_POST['medDesc'] . $code_idx ;
// Username doesnt exists, insert new account
if ($stmt = $conn->prepare('INSERT INTO medicine (code , category, name, price , containdications , milligrams , description , companyID) VALUES (?,?, ?, ?, ? ,? ,? ,? )')) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$stmt->bind_param('ssssssss', $code_idx ,  $_POST['medCat'], $_POST['medNam'] ,  $_POST['medPr']  , $_POST['medContr'] , $_POST['medMg'], $_POST['medDesc'] , $id_key );
	$stmt->execute();
  header("Location:newmedicine.php");
	//echo 'You have successfully added the medicine!';
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}

// header("newmedicine.php");
?>

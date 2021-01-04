<?php
session_start();
// Change this to your connection info.

$servername = "localhost";
$username = "eprescriadmin";
$password = "f4rm4k0";
$database = "eprescridb";
// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Failed to connect to the database  " . $conn->connect_error);
}
// We have to take the form we were redirected from and :
/*
if( timi pou erxete == 'doctor'){
query_1 = 'SELECT username, password FROM user_doctor WHERE username = ?'
}
else if( timi pou erxete == 'pharmacy'){
query_2 = 'SELECT username, password FROM user_pharmacy WHERE username = ?'
}
else if( timi pou erxete == 'patient'){
query_3 = 'SELECT username, password FROM user_patient WHERE username = ?'
}
else if( timi pou erxete == 'company'){
query_4 =  'SELECT username, password FROM user_company WHERE username = ?'
}

*/
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST["username"], $_POST["password"]) ) {
  // Could not get the data that should have been sent.
  exit('Please fill both the username and password fields!');
}

// Se auto to shmeio analoga me to ti exei erthei tha kanei kai to antistoixo redirect


// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $conn->prepare('SELECT username, password FROM user_doctor WHERE username = ?')) {
// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
$stmt->bind_param('s', $_POST['username']);
$stmt->execute();
// Store the result so we can check if the account exists in the database.
$stmt->store_result();


if ($stmt->num_rows > 0) {
$stmt->bind_result($id, $password);
$stmt->fetch();
// Account exists, now we verify the password.
// Note: remember to use password_hash in your registration file to store the hashed passwords.
//   if (password_verify($_POST['password'], $password)) {
// we use this incase we want to use a hash function for the password
//
if ($_POST['password'] === $password) {
  // Verification success! User has logged-in!
  // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
  session_regenerate_id();
  $_SESSION['loggedin'] = TRUE;
  $_SESSION['name'] = $_POST['username'];
  $_SESSION['id'] = $id;
  echo 'Welcome ' . $_SESSION['name'] . '!';
  header( "refresh:3;url=doctor" );
} else {
  // Incorrect password
  echo 'Incorrect username and/or password!';
  header( "refresh:3;url=login.php" );
}
} else {
// Incorrect username
echo 'Incorrect username and/or password!';
  header( "refresh:3;url=login.php" );
}
$stmt->close();
}
?>

<?php
session_start();

// Change this to your connection info.
require_once("mysqli_connection.php");
// We have to take the form we were redirected from and :

if( $_POST["usertype"]== 'doctor'){
  $query = 'SELECT id,username, password FROM user_doctor WHERE username = ?';
}
else if( $_POST["usertype"] == 'pharmacy'){
  $query = 'SELECT id,username, password FROM user_pharmacy WHERE username = ?';
}
else if( $_POST["usertype"] == 'patient'){
  $query = 'SELECT id,username, password FROM user_patient WHERE username = ?';
}
else if( $_POST["usertype"] == 'company'){
  $query =  'SELECT id,username, password FROM user_company WHERE username = ?';
}


// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST["username"], $_POST["password"]) ) {
  // Could not get the data that should have been sent.
  exit('Please fill both the username and password fields!');
}


// Se auto to shmeio analoga me to ti exei erthei tha kanei kai to antistoixo redirect


// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $conn->prepare($query)) {
  // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
  $stmt->bind_param('s', $_POST['username']);
  $stmt->execute();
  // Store the result so we can check if the account exists in the database.
  $stmt->store_result();


  if ($stmt->num_rows > 0) {
    $stmt->bind_result($id,$username, $password);
    $stmt->fetch();
    // echo "ID =".$id. "and PASSWORD=". $password; //TEST
    // exit;//TEST
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
    $_SESSION['name'] = $username;
    $_SESSION['id'] = $id;
    $_SESSION['usertype'] = $_POST["usertype"];
    echo "<section ><h3>Welcome ".$_SESSION['name']."!</h3></section >";
    // echo '<h1>'.$_POST["usertype"].'</h1>' ; //this was test
    header( "refresh:3;url=".$_SESSION['usertype'] );

  } else {
    // Incorrect password
    echo "<section ><h3>Incorrect username and/or password!</h3></section >";
    header( "refresh:3;url=login.php?type=".$_POST["usertype"]."" );
  }
  } else {
  // Incorrect username
    echo "<section ><h3>Incorrect username and/or password!</h3></section >";
    header( "refresh:3;url=login.php?type=".$_POST["usertype"]."" );
  }
  $stmt->close();
}
?>

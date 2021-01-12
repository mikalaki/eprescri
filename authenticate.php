
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>eprescri - elerctronic prescription application platform</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/custom.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Load fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">




  <!-- =======================================================
  * Template Name: MeFamily - v2.2.0
  * Template URL: https://bootstrapmade.com/family-multipurpose-html-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

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
    echo "
    <section>
    <div class=\"container\">
      <div class=\"row\">
      <div class=\"col-md-12 justify-content-center\">

        <div class=\"container spinner-grow text-primary\" role=\"status\">
          <span class=\"sr-only\">Loading...</span>
        </div>
        <div class=\"spinner-grow text-primary\" role=\"status\">
          <span class=\"sr-only\">Loading...</span>
        </div>
        <div class=\"spinner-grow text-primary\" role=\"status\">
          <span class=\"sr-only\">Loading...</span>
        </div>
        <div class=\"spinner-grow text-primary\" role=\"status\">
          <span class=\"sr-only\">Loading...</span>
        </div>
        <div class=\"spinner-grow text-primary\" role=\"status\">
          <span class=\"sr-only\">Loading...</span>
        </div>
        <div class=\"spinner-grow text-primary\" role=\"status\">
          <span class=\"sr-only\">Loading...</span>
        </div>
        <div class=\"spinner-grow text-primary\" role=\"status\">
          <span class=\"sr-only\">Loading...</span>
        </div>
        <div class=\"spinner-grow text-primary\" role=\"status\">
          <span class=\"sr-only\">Loading...</span>
        </div>
        <div><h3></h3></div>
        <div class=\"container\"><h3>Welcome ".$_SESSION['name']."!</h3></div>

        </div>
      </div>
    </div>
    </section>

          ";
    // echo '<h1>'.$_POST["usertype"].'</h1>' ; //this was test
    header( "refresh:1;url=".$_SESSION['usertype'] );

  } else {
    // Incorrect password
    echo "<section ><h3>Incorrect username and/or password!</h3></section >";
    header( "refresh:1;url=login.php?type=".$_POST["usertype"]."" );
  }
  } else {
  // Incorrect username
    echo "<section ><h3>Incorrect username and/or password!</h3></section >";
    header( "refresh:1;url=login.php?type=".$_POST["usertype"]."" );
  }
  $stmt->close();
}
?>

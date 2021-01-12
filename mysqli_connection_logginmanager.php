<?php
$servername = "localhost";
$username = "login_manager";
$password = "login_manapass";
$database = "eprescridb";
// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//echo "Connected successfully";

// test

?>

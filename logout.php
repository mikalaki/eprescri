<?php


session_start();
session_destroy();

echo "<section ><h3>You have been logged out </h3></section >";
header( "refresh:3;url=login.php" );


?>

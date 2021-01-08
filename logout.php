<?php

session_start();
session_destroy();

echo "<section ><h3>Logging out.</h3></section >";
header( "refresh:1;url=login.php" );

?>

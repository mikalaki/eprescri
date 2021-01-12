<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION['loggedin']) || $_SESSION['usertype']!='doctor') {
  require("please_login.php");
}

require_once('mysqli_connection_doctor.php');


function get_medicine($conn , $term){

 $query = "SELECT m.name AS medName,c.name AS compName ,m.code
 FROM medicine m
 JOIN company c ON m.companyID=c.companyID
 WHERE m.name LIKE '".$term."%' ORDER BY m.name ASC";
 $result = mysqli_query($conn, $query);
 $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
 return $data;
}

if (isset($_GET['term'])) {
 $getMedicine = get_medicine($conn, $_GET['term']);
 $medList = array();
 foreach($getMedicine as $medicine){
 $medList[] = $medicine['medName']."-".$medicine['compName']."-".$medicine['code'];
 }
 echo json_encode($medList);
}

 ?>

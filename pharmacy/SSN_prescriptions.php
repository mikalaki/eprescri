<?php
  require_once('mysqli_connection_pharmacy.php');

  if(!isset($_GET['searchInputPatient'])){

  }
  elseif ( is_null($_GET['searchInputPatient']) ||$_GET['searchInputPatient']=="")
  {
    echo "Enter a valid patientSSN";
  }
  else {
    if (!isset($_SESSION['loggedin']) || $_SESSION['usertype']!='pharmacy') {
      require("please_login.php");
    }

    $patientSSN=$_GET['searchInputPatient'];




  $sql1="SELECT prescriptionID FROM prescription WHERE patientSSN= $patientSSN " ;
  $prescriptionIDs= $conn->query($sql1);

  $sql_secondary="SELECT SSN FROM patient WHERE SSN =$patientSSN " ;
  $patientID = $conn->query($sql_secondary);

  if (mysqli_num_rows($prescriptionIDs)==0 && mysqli_num_rows($patientID)!=0)
  {
    echo "There are no Prescriptions for this patient.";
    $conn->close();
  }
  elseif(mysqli_num_rows($prescriptionIDs)==0)
  {
    echo "Please enter a valid Patient SSN.";
    $conn->close();
  }
  else
    {
      echo '</br><table class="table table-striped">
              <tr>
              <th scope="col"> From </th>
              <th scope="col"> To </th>
              <th scope="col"> Instructions </th>
              <th scope="col"> Medicines </th>
              <th scope="col"> Company </th>
              <th scope="col"> Reified Status </th>
              </tr>';



      $sql = "SELECT p.prescriptionID,p.fromDate, p.toDate, p.instructions , GROUP_CONCAT(m.name) AS medicineName, GROUP_CONCAT(c.name) AS companyName,reifyDate
      FROM prescription p
      JOIN prescription_consistsof_medicine pcm ON (p.prescriptionID=pcm.prescriptionID)
      JOIN medicine m ON (pcm.medicineCode=m.code AND m.companyID=pcm.companyID)
      JOIN  company c ON (m.companyID=c.companyID)
      WHERE p.patientSSN =$patientSSN
      GROUP BY p.prescriptionID
      ORDER BY reifyDate;";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
      // output data of each row
      while($row = mysqli_fetch_array($result)) {
       if(!is_null($row["reifyDate"])){
         $reify_status = "Reified on: " .$row["reifyDate"];
         echo "<tr><td>"
         . $row["fromDate"]."</td><td>"
         . $row["toDate"].  "</td><td>"
         . $row["instructions"].  "</td><td>"
          .str_replace (",","<br>",$row["medicineName"]).  "</td><td>"
          .str_replace (",","<br>",$row["companyName"]). "</td><td>"
           . $reify_status.  "</td>"
           . "</tr>";
       }
       else {

         $reify_status= "Reify";
         echo "<tr><td>"
         . $row["fromDate"]."</td><td>"
         . $row["toDate"].  "</td><td>"
         . $row["instructions"].  "</td><td>"
          .str_replace (",","<br>",$row["medicineName"]).  "</td><td>"
          .str_replace (",","<br>",$row["companyName"]). "</td ><td>
          <a href=\"index.php?searchInputPatient=".$patientSSN ."\"> <button id=\"" .$row["prescriptionID"] . "\"
          class=\"btn btn-primary reifybuttons\" type=\"button\" >"
           . $reify_status. "</button></a>" . "</td>"
           . "</tr>";
       }

      }
      echo "</table>";

      } else {
      echo "0 results";
      }

      $conn->close();
  }
  }
  ?>

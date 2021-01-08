<?php
  require_once('../mysqli_connection.php');
  // We need to use sessions, so you should always start sessions using the below code.
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $patientSSN =$_SESSION['id'];

  $query_2 = " SELECT  prescri.prescriptionID , d.first_name AS docfname , d.last_name AS doclname , GROUP_CONCAT(md.name) AS  medicineName, GROUP_CONCAT(pco.quantity) AS quantity,GROUP_CONCAT(c.name) AS companyName, prescri.instructions , prescri.fromDate , prescri.toDate , prescri.reifyDate
  FROM  prescription prescri
  JOIN doctor d on d.doctorID =   prescri.doctorID
  JOIN prescription_consistsof_medicine pco on pco.prescriptionID = prescri.prescriptionID
  JOIN medicine md on md.code = pco.medicineCode
  JOIN  company c ON (md.companyID=c.companyID)
  WHERE  prescri.patientSSN =$patientSSN
  GROUP BY prescriptionID
  ORDER BY fromDate DESC  ";



  $response_2 = $conn->query($query_2);
  if($response_2){
  if (mysqli_num_rows($response_2)==0 )
  {
    echo "You do not have any prescriptions yet.";
    $conn->close();
  }
  else
    {
      // TO ADD THE HTML TABLE FORMAT
      echo '<table class="table table-striped">
              <tr>
              <th scope="col">From Doctor</th>
              <th scope="col">From Date</th>
              <th scope="col">To Date</th>
              <th scope="col">Instructions</th>
              <th scope="col">Medicines</th>
              <th scope="col">Company</th>
              <th scope="col">Quantity</th>
              <th scope="col">Reified</th>
              </tr>';
    while($row = mysqli_fetch_array($response_2)){
      if(!is_null($row["reifyDate"])){
        $reify_status = "Reified";
      }
      else {
        $reify_status= "Not Reified";
      }

      echo "<tr><td>"
      . $row["docfname"]." ".$row["doclname"] ."</td><td>"
      . $row["fromDate"]."</td><td>"
      . $row["toDate"].  "</td><td>"
      . $row["instructions"].  "</td><td>"
       .str_replace (",","<br>",$row["medicineName"]).  "</td><td>"
       .str_replace (",","<br>",$row["companyName"]). "</td><td>"
       .str_replace (",","<br>",$row["quantity"]).  "</td><td>"
        . $reify_status.  "</td>"
        . "</tr>";
    }
    echo "</table>";
   }
  }

  ?>

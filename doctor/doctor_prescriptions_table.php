

            <?php
            if (session_status() == PHP_SESSION_NONE) {
              session_start();
            }
            if (!isset($_SESSION['loggedin']) || $_SESSION['usertype']!='doctor') {
              require("please_login.php");
            }

            require_once('../mysqli_connection.php');

            //initializing doctor id to the id of the doctor conected to session.
            $doctorID = $_SESSION['id'];

            if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                $page_no = $_GET['page_no'];
            }
            else {
                $page_no = 1;
            }

            // records per page
            $total_records_per_page = 6;

            $offset = ($page_no-1) * $total_records_per_page;
            $previous_page = $page_no - 1;
            $next_page = $page_no + 1;
            $adjacents = "2";

            // Get total records
            $result_count = $conn->query("SELECT count(prescriptionID) as total_records
            FROM  prescription
            WHERE doctorID=$doctorID");
            $total_records = mysqli_fetch_array($result_count);
            $total_records = $total_records['total_records'];

            //get total number of pages
            $total_no_of_pages = ceil($total_records / $total_records_per_page);
            $second_last = $total_no_of_pages - 1; // total pages minus 1

            $query= " SELECT  prescri.prescriptionID , prescri.patientSSN , p.first_name , p.last_name , prescri.fromDate ,instructions,
              prescri.toDate, GROUP_CONCAT(m.name) AS medicineName, GROUP_CONCAT(comp.name) AS companyName,GROUP_CONCAT(quantity) AS quantity
              FROM  prescription prescri
              JOIN patient p on p.SSN = prescri.PatientSSN
              JOIN prescription_consistsof_medicine con on prescri.prescriptionID = con.prescriptionID
              JOIN medicine m on m.code = con.medicineCode AND m.companyID =con.companyID
              JOIN company comp on m.companyID =comp.companyID
              WHERE  prescri.doctorID =  $doctorID
              GROUP BY prescriptionID
              ORDER BY fromDate DESC
              LIMIT $offset, $total_records_per_page;";

              $result = $conn->query($query);

              //printing the contents of table
              if ($result->num_rows > 0) {
                echo "<table class=\"table table-striped table-bordered \">
                  <thead>
                    <tr>
                      <th scope=\"col\">ID</th>
                      <th scope=\"col\">Patien's SSN</th>
                      <th scope=\"col\">Full Name</th>
                      <th scope=\"col\">Duration</th>
                      <!-- <th scope=\"col\">To</th> -->
                      <th scope=\"col\">Medicines</th>
                      <th scope=\"col\">Company</th>
                      <th scope=\"col\">Q.</th>
                      <th scope=\"col\">Instructions</th>
                      <th scope=\"col\">Actions</th>
                    </tr>
                  </thead>";
                while($row = mysqli_fetch_array($result)){
                  echo "<tr>
                 <td>".$row['prescriptionID']."</td>
                 <td>".$row['patientSSN']."</td>
                 <td>".$row['first_name']."</br>".$row['last_name']."</td>
                 <td><strong>From:</strong></br>".$row['fromDate']."</br>
                 <strong>To:</strong></br>".$row['toDate']."</td>
                 <td>".str_replace (",","<br>",$row["medicineName"])."</td>
                 <td>".str_replace (",","<br>",$row["companyName"]). "</td>
                 <td>".str_replace (",","<br>",$row["quantity"])."</td>
                 <td>".$row['instructions']."</td>
                 <td class=\"prescription_buttons_td\">
                 <button type=\"button\" class=\"btn btn-secondary btn-sm\"><i class=\"far fa-edit\"></i></button>
                 <a href=deleteprescriptiondialog.php?ID=".$row['prescriptionID']." <button type=\"button\" class=\"btn btn-danger btn-sm\"><i class=\"fas fa-trash-alt\"></i></button>
                 </td>
                 </tr>";

                        }
                        echo "</tbody>
                        <caption>Date's format is YYYY-MM-DD.</caption>
                        </table>";
              }
              else{
                echo "<h5><i class=\"fas fa-exclamation-triangle\"></i> No prescriptions found!</h5>";
              }

              /* TO BE DELETED BELLOW*/
              ?>

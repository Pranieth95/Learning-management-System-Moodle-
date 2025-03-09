<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost","root", "", "cirp");  
 if((isset($_POST["action"])) && ($_POST["action"] =="Show"))  
 {  
      $output = array();

	  $month = mysqli_real_escape_string($connect, $_POST["date"]);
	  
      $procedure1 = "  
      CREATE PROCEDURE income1(IN value int(11))  
      BEGIN  
      SELECT t.Total, f.Exall
      From (SELECT SUM(totamount) AS Total 
	  FROM 
	  ( Select dob, regno, name, totamount from studentbackup WHERE MONTH(dob) = value 
	  UNION 
	  Select dob, regno, name, totamount from examfeesbackup WHERE MONTH(dob) = value
	  UNION 
	  Select Date AS dob, CreditcardNumber AS regno, NIC AS name, Total AS totamount from paymentbackup WHERE MONTH(Date) = value) AS e) AS t, 
	  (SELECT SUM(amount) as Exall FROM (SELECT * FROM expensesbackup WHERE MONTH(date) = value) AS b) AS f;  
      END;  
      ";  
      if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS income1"))  
      {  
           if(mysqli_query($connect, $procedure1))  
           {  
                $query = "CALL income1('".$month."')";  
                $result = mysqli_query($connect, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                    $output['income'] = $row["Total"];  
					$output['expense'] = $row["Exall"];
					
					$output['profit'] = ($row["Total"] - $row["Exall"]);	
                }  
            }  
                echo json_encode($output);  
       }
  
    }  
   
 ?>  
<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost","root", "", "cirp");  
 if(isset($_POST["id"]))  
 {  
      $output = array();  
      $procedure = "  
      CREATE PROCEDURE whereexamfees(IN user_id int(11))  
      BEGIN   
      SELECT * FROM examfees WHERE id = user_id;  
      END;   
      ";  
      if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS whereexamfees"))  
      {  
           if(mysqli_query($connect, $procedure))  
           {  
                $query = "CALL whereexamfees(".$_POST["id"].")";  
                $result = mysqli_query($connect, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                    $output['date'] = $row["dob"];  
					$output['studentid'] = $row["regno"];
					$output['name'] = $row["name"];					
					$output['year'] = $row["year"];  
                    $output['semester'] = $row["semester"];
					$output['batch'] = $row["batch"];
					$output['exam'] = $row["exam"];
					$output['subject'] = $row["subject"];
					$output['amount'] = $row["totamount"];
                }  
            }  
                echo json_encode($output);  
       }  
    }  
   
 ?>  
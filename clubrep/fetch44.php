<?php  
 //fetch44.php  
 $connect = mysqli_connect("localhost","root", "", "cirp");  
 if(isset($_POST["id"]))  
 {  
      $output = array();  
      $procedure = "  
      CREATE PROCEDURE fetchevents(IN user_id int(11))  
      BEGIN   
      SELECT * FROM eventcalendar WHERE id = user_id;  
      END;   
      ";  
      if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS fetchevents"))  
      {  
           if(mysqli_query($connect, $procedure))  
           {  
                $query = "CALL fetchevents(".$_POST["id"].")";  
                $result = mysqli_query($connect, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                    $output['eventTitle'] = $row["Title"];  
					$output['eventDetails'] = $row["Details"];
					

                }  
            }  
                echo json_encode($output);  
       }  
    }  
   
 ?>  
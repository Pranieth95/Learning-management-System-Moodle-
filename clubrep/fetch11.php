<?php  
 //fetch11.php  
 $connect = mysqli_connect("localhost","root", "", "cirp");  
 if(isset($_POST["id"]))  
 {  
      $output = array();  
      $procedure = "  
      CREATE PROCEDURE whereeventincome(IN user_id int(11))  
      BEGIN   
      SELECT * FROM eventincome WHERE id = user_id;  
      END;   
      ";  
      if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS whereeventincome"))  
      {  
           if(mysqli_query($connect, $procedure))  
           {  
                $query = "CALL whereeventincome(".$_POST["id"].")";  
                $result = mysqli_query($connect, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                    $output['eventDate'] = $row["eventDate"];  
					$output['eventTitle'] = $row["eventTitle"];
					$output['Earnings'] = $row["Earnings"];					
					$output['Expenses'] = $row["Expenses"];  
                    

                }  
            }  
                echo json_encode($output);  
       }  
    }  
   
 ?>  
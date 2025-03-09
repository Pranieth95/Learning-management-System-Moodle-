<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost","root", "", "cirp");  
 if(isset($_POST["id"]))  
 {  
      $output = array();  
      $procedure = "  
      CREATE PROCEDURE whereexpenses(IN user_id int(11))  
      BEGIN   
      SELECT * FROM expenses WHERE id = user_id;  
      END;   
      ";  
      if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS whereexpenses"))  
      {  
           if(mysqli_query($connect, $procedure))  
           {  
                $query = "CALL whereexpenses(".$_POST["id"].")";  
                $result = mysqli_query($connect, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     $output['date'] = $row["date"];  
                     $output['category'] = $row["category"]; 
					 $output['employeeid'] = $row["employeeid"];
					 $output['description'] = $row["description"];  
                     $output['amount'] = $row["amount"];  
                }  
            }  
                echo json_encode($output);  
       }  
    }  
   
 ?>  
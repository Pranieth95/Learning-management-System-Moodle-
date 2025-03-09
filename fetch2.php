<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost","root", "", "cirp");  
 if(isset($_POST["id"]))  
 {  
      $output = array();  
      $procedure = "  
      CREATE PROCEDURE wherestatic(IN user_id int(11))  
      BEGIN   
      SELECT * FROM statics WHERE id = user_id;  
      END;   
      ";  
      if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS wherestatic"))  
      {  
           if(mysqli_query($connect, $procedure))  
           {  
                $query = "CALL wherestatic(".$_POST["id"].")";  
                $result = mysqli_query($connect, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     $output['date'] = $row["date"];  
                     $output['income'] = $row["income"];   
                     $output['expense'] = $row["expense"]; 
					 $output['profit'] = $row["profit"];  
                }  
            }  
                echo json_encode($output);  
       }  
    }  
   
 ?>  
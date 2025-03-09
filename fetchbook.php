<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost","root", "", "cirp");  
 if(isset($_POST["id"]))  
 {  
      $output = array();  
      $procedure = "  
      CREATE PROCEDURE wherestudent(IN user_id int(100))  
      BEGIN   
      SELECT * FROM student WHERE id = user_id;  
      END;   
      ";  
      if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS wherestudent"))  
      {  
           if(mysqli_query($connect, $procedure))  
           {  
                $query = "CALL wherestudent(".$_POST["id"].")";  
                $result = mysqli_query($connect, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     
					$output['studentid'] = $row["regno"];
					$output['name'] = $row["name"];					
					$output['date'] = $row["dob"];  
                    $output['ccategoryid'] = $row["ccategoryid"];
					$output['totamount'] = $row["totamount"];
                }   
            }  
                echo json_encode($output);  
       }  
    }  
   
 ?>  
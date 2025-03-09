<?php  
 //fetch22.php  
 $connect = mysqli_connect("localhost","root", "", "cirp");  
 if(isset($_POST["id"]))  
 {  
      $output = array();  
      $procedure = "  
      CREATE PROCEDURE whereclub(IN user_id int(11))  
      BEGIN   
      SELECT * FROM clubs WHERE id = user_id;  
      END;   
      ";  
      if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS whereclub"))  
      {  
           if(mysqli_query($connect, $procedure))  
           {  
                $query = "CALL whereclub(".$_POST["id"].")";  
                $result = mysqli_query($connect, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                    $output['clubName'] = $row["clubName"];  
					$output['clubType'] = $row["clubType"];                    

                }  
            }  
                echo json_encode($output);  
       }  
    }  
   
 ?>  
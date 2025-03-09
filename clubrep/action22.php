<?php  
 //action22.php  
 if(isset($_POST["action"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "cirp");  
      if($_POST["action"] =="Add")	  
      {  
			$clubName = mysqli_real_escape_string($connect, $_POST["clubName"]);          
			$clubType = mysqli_real_escape_string($connect, $_POST["clubType"]);
			
		   
           $procedure = "  
                CREATE PROCEDURE insertclubs(IN clubName varchar(50), clubType varchar(50))  
                BEGIN  
                INSERT INTO clubs(clubName, clubType) VALUES (clubName, clubType);   
                END;  
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS insertclubs"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
					if($clubType!=""){
                     $query = "CALL insertclubs('".$clubName."', '".$clubType."')";
                     mysqli_query($connect, $query);  
                     echo 'Data Inserted';
					}else{
						echo 'Select a Clubb Type';
					}
                }  
           }
      }  
      if($_POST["action"] == "Edit")  
      {  
          	$clubName = mysqli_real_escape_string($connect, $_POST["clubName"]);          
			$clubType = mysqli_real_escape_string($connect, $_POST["clubType"]); 
			
           $procedure = "  
                CREATE PROCEDURE updateclub(IN user_id int(11), clubName varchar(50), clubType varchar(50)) 
                BEGIN   
                UPDATE clubs SET clubName = clubName, clubType = clubType 
                WHERE id = user_id;  
                END;   
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS updateclub"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL updateclub('".$_POST["id"]."', '".$clubName."', '".$clubType."')";  
                     $result = mysqli_query($connect, $query); 
					 echo $result; 
                     //echo 'Data Updated';  
                }  
           }  
      }  
      if($_POST["action"] == "Delete")  
      {  
           $procedure = "  
           CREATE PROCEDURE deleteclub(IN user_id int(11))  
           BEGIN   
           DELETE FROM clubs WHERE id = user_id;  
           END;  
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS deleteclub"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL deleteclub('".$_POST["id"]."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Deleted';  
                }  
           }  
      }  
 }  
 ?>  
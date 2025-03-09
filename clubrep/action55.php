<?php  
 //action44.php  
 if(isset($_POST["action"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "cirp");  
       
      if($_POST["action"] == "Edit")  
      {  
       
			$eventTitle = mysqli_real_escape_string($connect, $_POST["eventTitle"]); 
			$eventDetails = mysqli_real_escape_string($connect, $_POST["eventDetails"]); 
			$budget = mysqli_real_escape_string($connect, $_POST["Budget"]); 
	

			
           $procedure = "  
                CREATE PROCEDURE updateclubevents(IN user_id int(11), eventTitle varchar(65), eventDetails varchar(225), budget double) 
                BEGIN   
                UPDATE club_event SET Title = eventTitle, Details = eventDetails, Expenses = budget 
                WHERE ID = user_id;  
                END;   
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS updateclubevents"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL updateclubevents('".$_POST["id"]."', '".$eventTitle."', '".$eventDetails."', '".$budget."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Updated';  
                }  
           }  
      }  
      if($_POST["action"] == "Delete")  
      {  
           $procedure = "  
           CREATE PROCEDURE deleteclubevent(IN user_id int(11))  
           BEGIN   
           DELETE FROM club_event WHERE id = user_id;  
           END;  
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS deleteclubevent"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL deleteclubevent('".$_POST["id"]."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Deleted';  
                }  
           }  
      }  
 }  
 ?>  
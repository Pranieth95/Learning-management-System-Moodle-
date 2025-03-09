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
	

			
           $procedure = "  
                CREATE PROCEDURE updateevents(IN user_id int(11), eventTitle varchar(65), eventDetails varchar(225)) 
                BEGIN   
                UPDATE eventcalendar SET Title = eventTitle, Details = eventDetails 
                WHERE ID = user_id;  
                END;   
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS updateevents"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL updateevents('".$_POST["id"]."', '".$eventTitle."', '".$eventDetails."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Updated';  
                }  
           }  
      }  
      if($_POST["action"] == "Delete")  
      {  
           $procedure = "  
           CREATE PROCEDURE deleteevent(IN user_id int(11))  
           BEGIN   
           DELETE FROM eventcalendar WHERE id = user_id;  
           END;  
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS deleteevent"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL deleteevent('".$_POST["id"]."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Deleted';  
                }  
           }  
      }  
 }  
 ?>  
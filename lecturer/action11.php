<?php  
 //action11.php  
 if(isset($_POST["action"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "cirp");  
      if($_POST["action"] =="Add")	  
      {  
			//$eventDate = mysqli_real_escape_string($connect, $_POST["eventDate"]);          
			$eventTitle = mysqli_real_escape_string($connect, $_POST["eventTitle"]); 
			$Earnings = mysqli_real_escape_string($connect, $_POST["Earnings"]); 
			$Expenses = mysqli_real_escape_string($connect, $_POST["Expenses"]); 
			//$Income = mysqli_real_escape_string($connect, $_POST["Income"]);
			$Income = ((double)$Earnings - (double)$Expenses);
			
			$query11 = "SELECT `Date` FROM `club_event` WHERE `Title`='".$eventTitle."'";
			$result = mysqli_query($connect,$query11);
			$row = mysqli_fetch_array($result);
			$eventDate = $row["Date"];

		   
           $procedure = "  
                CREATE PROCEDURE inserteventincome(IN eventDate date, eventTitle varchar(50), Earnings double, Expenses double, Income double)  
                BEGIN  
                INSERT INTO eventincome(eventDate, eventTitle, Earnings, Expenses, Income) VALUES (eventDate, eventTitle, Earnings, Expenses, Income);   
                END;  
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS inserteventincome"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL inserteventincome('".$eventDate."', '".$eventTitle."', '".$Earnings."', '".$Expenses."', '".$Income."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Inserted';  
                }  
           }  
      }  
      if($_POST["action"] == "Edit")  
      {  
          	//$eventDate = mysqli_real_escape_string($connect, $_POST["eventDate"]);          
			$eventTitle = mysqli_real_escape_string($connect, $_POST["eventTitle"]); 
			$Earnings = mysqli_real_escape_string($connect, $_POST["Earnings"]); 
			$Expenses = mysqli_real_escape_string($connect, $_POST["Expenses"]); 
			$Income = ((double)$Earnings - (double)$Expenses);

			
           $procedure = "  
                CREATE PROCEDURE updateeventincome(IN user_id int(11), eventTitle varchar(50), Earnings double, Expenses double, Income double) 
                BEGIN   
                UPDATE eventincome SET eventTitle = eventTitle, Earnings = Earnings, Expenses = Expenses, Income = Income 
                WHERE id = user_id;  
                END;   
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS updateeventincome"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL updateeventincome('".$_POST["id"]."', '".$eventTitle."', '".$Earnings."', '".$Expenses."', '".$Income."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Updated';  
                }  
           }  
      }  
      if($_POST["action"] == "Delete")  
      {  
           $procedure = "  
           CREATE PROCEDURE deleteeventincome(IN user_id int(11))  
           BEGIN   
           DELETE FROM eventincome WHERE id = user_id;  
           END;  
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS deleteeventincome"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL deleteeventincome('".$_POST["id"]."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Deleted';  
                }  
           }  
      }  
 }  
 ?>  
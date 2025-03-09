<?php  
 //action.php  
 if(isset($_POST["action"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "cirp");  
      if($_POST["action"] =="Add")  
      {  
			$date = mysqli_real_escape_string($connect, $_POST["date"]);          
			$studentid = mysqli_real_escape_string($connect, $_POST["studentid"]); 
			$name = mysqli_real_escape_string($connect, $_POST["name"]); 
			$year = mysqli_real_escape_string($connect, $_POST["year"]); 
			$semester = mysqli_real_escape_string($connect, $_POST["semester"]);
			$batch = mysqli_real_escape_string($connect, $_POST["batch"]); 
			$exam = mysqli_real_escape_string($connect, $_POST["exam"]); 
			$subject = mysqli_real_escape_string($connect, $_POST["subject"]); 
			$amount = mysqli_real_escape_string($connect, $_POST["amount"]); 
		   
           $procedure = "  
                CREATE PROCEDURE insertexamfees(IN dob date, regno varchar(50), name varchar(50), year varchar(50), semester varchar(50), batch varchar(50),exam varchar(50),subject varchar(50), totamount varchar(50))  
                BEGIN  
                INSERT INTO examfees(dob, regno, name, year, semester, batch, exam, subject, totamount) VALUES (dob, regno, name, year, semester, batch, exam, subject, totamount);   
                END;  
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS insertexamfees"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL insertexamfees('".$date."', '".$studentid."', '".$name."', '".$year."', '".$semester."', '".$batch."', '".$exam."', '".$subject."', '".$amount."'  )";  
                     mysqli_query($connect, $query);  
                     echo 'Data Inserted';  
                }  
           }  
      }  
      if($_POST["action"] == "Edit")  
      {  
          	$date = mysqli_real_escape_string($connect, $_POST["date"]);          
			$studentid = mysqli_real_escape_string($connect, $_POST["studentid"]); 
			$name = mysqli_real_escape_string($connect, $_POST["name"]); 
			$year = mysqli_real_escape_string($connect, $_POST["year"]); 
			$semester = mysqli_real_escape_string($connect, $_POST["semester"]);
			$batch = mysqli_real_escape_string($connect, $_POST["batch"]); 
			$exam = mysqli_real_escape_string($connect, $_POST["exam"]); 
			$subject = mysqli_real_escape_string($connect, $_POST["subject"]); 
			$amount = mysqli_real_escape_string($connect, $_POST["amount"]);  
			
           $procedure = "  
                CREATE PROCEDURE updateexamfees(IN user_id int(11), dob date, regno varchar(50), name varchar(50), year varchar(50), semester varchar(50), batch varchar(50), exam varchar(50), subject varchar(50), totamount varchar(50)) 
                BEGIN   
                UPDATE examfees SET dob = dob, regno = regno, name = name, year = year, semester = semester, batch = batch, exam = exam, subject = subject, totamount = totamount  
                WHERE id = user_id;  
                END;   
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS updateexamfees"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL updateexamfees('".$_POST["id"]."', '".$date."', '".$studentid."', '".$name."', '".$year."', '".$semester."', '".$batch."', '".$exam."', '".$subject."', '".$amount."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Updated';  
                }  
           }  
      }  
      if($_POST["action"] == "Delete")  
      {  
           $procedure = "  
           CREATE PROCEDURE deleteexamfees(IN user_id int(11))  
           BEGIN   
           DELETE FROM examfees WHERE id = user_id;  
           END;  
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS deleteexamfees"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL deleteexamfees('".$_POST["id"]."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Deleted';  
                }  
           }  
      }  
 }  
 ?>  
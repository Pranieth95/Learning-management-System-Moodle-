<?php  
 //action.php  
 if(isset($_POST["action"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "cirp");  
      if($_POST["action"] =="Add")  
      {  
			        
			$studentid = mysqli_real_escape_string($connect, $_POST["studentid"]); 
			$name = mysqli_real_escape_string($connect, $_POST["name"]); 
			$date = mysqli_real_escape_string($connect, $_POST["date"]); 
			$ccategoryid = mysqli_real_escape_string($connect, $_POST["ccategoryid"]);			
			$totamount = mysqli_real_escape_string($connect, $_POST["totamount"]);  
		   
           $procedure = "  
                CREATE PROCEDURE insertstudent(IN regno varchar(100), name varchar(100), dob date, ccategoryid int(100), totamount int(100))  
                BEGIN  
                INSERT INTO student(regno, name, dob, ccategoryid, totamount) VALUES (regno, name, dob, ccategoryid, totamount);   
                END;  
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS insertstudent"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL insertstudent('".$studentid."', '".$name."', '".$date."', '".$ccategoryid."', '".$totamount."')";  
                     mysqli_query($connect, $query);  
					 
                     echo 'Data Inserted';  
					 
                }  
           }  
      }  
      if($_POST["action"] == "Edit")  
      {  
          	$studentid = mysqli_real_escape_string($connect, $_POST["studentid"]); 
			$name = mysqli_real_escape_string($connect, $_POST["name"]); 
			$date = mysqli_real_escape_string($connect, $_POST["date"]); 
			$ccategoryid = mysqli_real_escape_string($connect, $_POST["ccategoryid"]);			
			$totamount = mysqli_real_escape_string($connect, $_POST["totamount"]);  
			
           $procedure = "  
                CREATE PROCEDURE updatestudent(IN user_id int(100), regno varchar(100), name varchar(100), dob date, ccategoryid int(100), totamount int(100)) 
                BEGIN   
                UPDATE student SET  regno = regno, name = name, dob = dob, ccategoryid = ccategoryid, totamount = totamount  
                WHERE id = user_id;  
                END;   
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS updatestudent"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL updatestudent('".$_POST["id"]."', '".$studentid."', '".$name."', '".$date."', '".$ccategoryid."', '".$totamount."')";  
                     $result = mysqli_query($connect, $query); 
					 echo $result;
                     echo 'Data Updated';  
                }  
           }  
      }  
      if($_POST["action"] == "Delete")  
      {  
           $procedure = "  
           CREATE PROCEDURE deletestudent(IN user_id int(11))  
           BEGIN   
           DELETE FROM student WHERE id = user_id;  
           END;  
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS deletestudent"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL deletestudent('".$_POST["id"]."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Deleted';  
                }  
           }  
      }  
 }  
 ?>  
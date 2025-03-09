<?php  
 //action.php  
 if(isset($_POST["action"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "cirp");  
      if($_POST["action"] =="Add")  
      {  
           $date = mysqli_real_escape_string($connect, $_POST["date"]);  
           $category = mysqli_real_escape_string($connect, $_POST["category"]); 
		   $employeeid = mysqli_real_escape_string($connect, $_POST["employeeid"]);
			$description = mysqli_real_escape_string($connect, $_POST["description"]);  
           $amount = mysqli_real_escape_string($connect, $_POST["amount"]);  
           $procedure = "  
                CREATE PROCEDURE insertexpenses(IN date date, category varchar(200), employeeid varchar(20), description varchar(200), amount int(11))  
                BEGIN  
                INSERT INTO expenses(date, category, employeeid, description, amount) VALUES (date, category, employeeid, description, amount);   
                END;  
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS insertexpenses"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL insertexpenses('".$date."', '".$category."', '".$employeeid."', '".$description."', '".$amount."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Inserted';  
                }  
           }  
      }  
      if($_POST["action"] == "Edit")  
      {  
           $date = mysqli_real_escape_string($connect, $_POST["date"]);  
           $category = mysqli_real_escape_string($connect, $_POST["category"]); 
		   $employeeid = mysqli_real_escape_string($connect, $_POST["employeeid"]); 
			$description = mysqli_real_escape_string($connect, $_POST["description"]);  
           $amount = mysqli_real_escape_string($connect, $_POST["amount"]); 
           $procedure = "  
                CREATE PROCEDURE updateexpenses(IN user_id int(11), date date, category varchar(200), employeeid varchar(20), description varchar(200), amount int(11))  
                BEGIN   
                UPDATE expenses SET date = date, category = category, employeeid = employeeid, description = description, amount = amount  
                WHERE id = user_id;  
                END;   
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS updateexpenses"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL updateexpenses('".$_POST["id"]."', '".$date."', '".$category."', '".$employeeid."', '".$description."', '".$amount."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Updated';  
                }  
           }  
      }  
      if($_POST["action"] == "Delete")  
      {  
           $procedure = "  
           CREATE PROCEDURE deleteexpenses(IN user_id int(11))  
           BEGIN   
           DELETE FROM expenses WHERE id = user_id;  
           END;  
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS deleteexpenses"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL deleteexpenses('".$_POST["id"]."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Deleted';  
                }  
           }  
      }  
 }  
 ?>  
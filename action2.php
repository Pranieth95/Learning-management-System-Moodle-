<?php  
 //action.php  
 if(isset($_POST["action"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "cirp");  
      if($_POST["action"] =="Calculate")  
      {  
 //calculate amount sum of semesterfees, examfees and expenses---------------------------------------------------------------------------------------------
  
			$semfee = "select sum(totamount) as total from student";
			$result = mysqli_query($connect,$semfee);
			$row = mysqli_fetch_assoc($result);
			$semresult = $row['total'];
			
			$semfee = "select sum(Total) as total from payment";
			$result = mysqli_query($connect,$semfee);
			$row = mysqli_fetch_assoc($result);
			$bookresult = $row['total'];
			
			$examfee = "select sum(totamount) as total from examfees";
			$result = mysqli_query($connect,$examfee);
			$row = mysqli_fetch_assoc($result);
			$examresult = $row['total'];
			
			$expensesall = "select sum(amount) as total from expenses";
			$result = mysqli_query($connect,$expensesall);
			$row = mysqli_fetch_assoc($result);
			$expense = $row['total'];

//calculate income from adding semfees and examfees	-------------------------------------------------------------------------------------------------------
		
			$income = ((int)$semresult + (int)$examresult) + (int)$bookresult;

//move all records to respective backups and empty tables	-----------------------------------------------------------------------------------------------

			$sembackup = "INSERT INTO studentbackup SELECT * FROM student";
			$result = mysqli_query($connect,$sembackup);
			$semdelete = "DELETE FROM student";
			$result = mysqli_query($connect,$semdelete);
			
			$exambackup = "INSERT INTO  examfeesbackup SELECT * FROM examfees";
			$result = mysqli_query($connect,$exambackup);
			$examdelete = "DELETE FROM examfees";
			$result = mysqli_query($connect,$examdelete);
			
			$exambackup = "INSERT INTO  paymentbackup SELECT * FROM payment";
			$result = mysqli_query($connect,$exambackup);
			$examdelete = "DELETE FROM payment";
			$result = mysqli_query($connect,$examdelete);
			
			$expensesbackup = "INSERT INTO  expensesbackup SELECT * FROM expenses";
			$result = mysqli_query($connect,$expensesbackup);
			$expensedelete = "DELETE FROM expenses";
			$result = mysqli_query($connect,$expensedelete);
			
			
			$date = mysqli_real_escape_string($connect, $_POST["date"]);  
           //$income = mysqli_real_escape_string($connect, $_POST["income"]);  
           //$expense = mysqli_real_escape_string($connect, $_POST["expense"]);
		   
//calculate profit	---------------------------------------------------------------------------------------------------------------------------------------
	   
		   $profit = ((int)$income - (int)$expense);	
		   
           $procedure = "  
                CREATE PROCEDURE insertstatic(IN date varchar(20), income int(11), expense int(20), profit int(11))  
                BEGIN  
                INSERT INTO statics(date, income, expense, profit) VALUES (date, income, expense, profit);   
                END;  
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS insertstatic"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL insertstatic('".$date."', '".$income."', '".$expense."', '".$profit."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Inserted';  
                }  
           }  
      }  
  
			if($_POST["action"] == "Delete")  
			{  
				$procedure = "  
				CREATE PROCEDURE deletestatic(IN user_id int(11))  
				BEGIN   
				DELETE FROM statics WHERE id = user_id;  
				END;  
				";  
				if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS deletestatic"))  
				{  
					if(mysqli_query($connect, $procedure))  
					{  
                     $query = "CALL deletestatic('".$_POST["id"]."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Deleted';  
					}  
				}  
			}  
 }  
 ?>  
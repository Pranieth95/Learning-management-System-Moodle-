<?php  
 //action33.php  
 if(isset($_POST["action"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "cirp"); 
      if($_POST["action"] =="Generate")	  
      {
		$timeslot = mysqli_real_escape_string($connect, $_POST["Timeslot"]);          
		$monthfee = mysqli_real_escape_string($connect, $_POST["MonthFee"]);
		
		$procedure = "  
		      CREATE PROCEDURE updatefee()  
		      BEGIN  
		      SELECT * FROM club_member;  
		      END;  
		      ";  
	      if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS updatefee"))  
	      {  
 	          if(mysqli_query($connect, $procedure))  
 	          {    
			   		$query = "CALL updatefee()";  
	                $result = mysqli_query($connect, $query); 

  
	                if(mysqli_num_rows($result) > 0)  
	                {  
    	                 while($row = mysqli_fetch_array($result))  
        	             {			
							$duration = floor($row["Months"]/$timeslot);
							$fee = $duration*$monthfee;
							//echo $fee;
							
							include 'compute.php';
							//$sql = "UPDATE club_member SET Fee = '".$fee."' WHERE CIRP_ID='".$row["CIRP_ID"]."'";
						    //$resultinsert = mysqli_query($connect,$sql);
							
							//if(mysqli_query($connect,$sql))
							//echo "True";
							//else
							//echo "False"; 

	  
    	                 }
						 echo "Confirm?";  
        	        }  
				  
        	   }  
  	       }	
		   
           
      }
	        
 
      if($_POST["action"] == "Delete")  
      {  
           $procedure = "  
           CREATE PROCEDURE deletemember(IN user_id varchar(50))  
           BEGIN   
           DELETE FROM club_member WHERE CIRP_ID = user_id;  
           END;  
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS deletemember"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL deletemember('".$_POST["id"]."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Deleted';  
                }  
           }  
      } 
	  
	  if($_POST["action"] == "Reset")  
      {  
           $procedure = "  
           CREATE PROCEDURE resetmember(IN user_id varchar(50))  
           BEGIN   
		   UPDATE club_member SET Months = 0, JoinedDate = now() WHERE CIRP_ID = user_id;  
           END;  
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS resetmember"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL resetmember('".$_POST["id"]."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Changed';  
                }  
           }  
      }
	  if($_POST["action"] == "ResetAll")  
      {  
           $procedure = "  
           CREATE PROCEDURE resetall()  
           BEGIN   
		   UPDATE club_member SET Months = 0, JoinedDate = now();  
           END;  
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS resetall"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL resetall()";  
                     mysqli_query($connect, $query);  
                     echo 'Data Changed';  
                }  
           }  
      } 
 }  
 ?>  
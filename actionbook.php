<?php  
 //action.php  
 if(isset($_POST["action"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "cirp");  
       
 
      if($_POST["action"] == "Delete")  
      {  
           $procedure = "  
           CREATE PROCEDURE deletepayment(IN user_id int(11))  
           BEGIN   
           DELETE FROM payment WHERE id = user_id;  
           END;  
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS deletepayment"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL deletepayment('".$_POST["id"]."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Deleted';  
                }  
           }  
      }  
 }  
 ?>  
 <?php  
 //select.php  
 $output = '';  
 $connect = mysqli_connect("localhost", "root", "", "cirp");  
 if((isset($_POST["action"])) && ($_POST["action"] =="Show"))  
 {  
      $month = mysqli_real_escape_string($connect, $_POST["date"]);
	  
	  $procedure1 = "  
      CREATE PROCEDURE backup1(IN value int(11))  
      BEGIN  
      Select dob, regno, name, totamount, 'Semester Fee' as Category from studentbackup WHERE MONTH(dob) = value
	  UNION
      Select dob, regno, name, totamount, 'Exam Fee' as Category from examfeesbackup WHERE MONTH(dob) = value 
	  UNION
      Select Date AS dob, CreditcardNumber AS regno, NIC AS name, Total AS totamount, 'Book payment' as Category from paymentbackup WHERE MONTH(Date) = value; 
      END;  
      ";  
      if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS backup1"))  
      {  
           if(mysqli_query($connect, $procedure1))  
           {  
                $query = "CALL backup1('".$month."')";  
                $result = mysqli_query($connect, $query);  
                $output .= '  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="20%">date</th>  
                               <th width="20%%">student id</th> 
							   <th width="20%">name</th> 								                               
							   <th width="20%">amount</th>
							   <th width="20%">Category</th>
                                
                              
                          </tr>  
                ';  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                          $output .= '  
                               <tr>  
                                    <td>'.$row["dob"].'</td>                                    
									<td>'.$row["regno"].'</td> 
									<td>'.$row["name"].'</td> 
									                                
									<td>'.$row["totamount"].'</td>
									<td>'.$row["Category"].'</td>
									
                            
                                    
                               </tr>  
                          ';  
                     }  
                }  
                else  
                {  
                     $output .= '  
                          <tr>  
                               <td colspan="4">Data not Found</td>  
                          </tr>  
                     ';  
                }  
                $output .= '</table>';  
                echo $output;  
           }  
      }
	  
	  
	  
  
	  
	  
 }  
 ?>  
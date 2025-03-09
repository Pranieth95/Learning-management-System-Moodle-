 <?php  
 //select.php  
 $output = '';  
 $connect = mysqli_connect("localhost", "root", "", "cirp");  
 if((isset($_POST["action"])) && ($_POST["action"] =="Show"))  
 {  
      $month = mysqli_real_escape_string($connect, $_POST["date"]);
	 
	  $procedure = "  
      CREATE PROCEDURE backup2(IN value int(11))  
      BEGIN  
      SELECT * FROM expensesbackup WHERE MONTH(date) = value;  
      END;  
      ";  
      if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS backup2"))  
      {  
           if(mysqli_query($connect, $procedure))  
           {  
                $query = "CALL backup2('".$month."')";  
                $result1 = mysqli_query($connect, $query);  
                $output .= '  
                     <table class="table table-bordered">  
                          <tr> 
								<th width="10%">id</th> 
                               <th width="30%">date</th>  
                               <th width="30%">category</th> 
                               <th width="30%">amount</th>
                             
                          </tr>  
                ';  
                if(mysqli_num_rows($result1) > 0)  
                {  
                     while($row = mysqli_fetch_array($result1))  
                     {  
                          $output .= '  
                               <tr>
									<td>'.$row["id"].'</td>  
									<td>'.$row["date"].'</td>  
                                    <td>'.$row["category"].'</td>
									
									 
                                    <td>'.$row["amount"].'</td>
                            
                                    
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
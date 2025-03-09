 <?php  
 //select11.php  
 $output = '';  
 $connect = mysqli_connect("localhost", "root", "", "cirp");  
 if(isset($_POST["action"]))  
 {  
      $procedure = "  
      CREATE PROCEDURE selecteventincome()  
      BEGIN  
      SELECT * FROM eventincome ORDER BY id DESC;  
      END;  
      ";  
      if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS selecteventincome"))  
      {  
           if(mysqli_query($connect, $procedure))  
           {  
                $query = "CALL selecteventincome()";  
                $result = mysqli_query($connect, $query);  
                $output .= '  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="10%">eventDate</th>  
                               <th width="40%">eventTitle</th> 
							   <th width="10%">Earnings</th> 
							   <th width="10%">Expenses</th>  
                               <th width="10%">Income</th>
							   <th width="10%">Update</th>  
                               <th width="10%">Delete</th> 
							   
                          </tr>  
                ';  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                          $output .= '  
                               <tr>  
                                    <td>'.$row["eventDate"].'</td>                                    
									<td>'.$row["eventTitle"].'</td> 
									<td>'.$row["Earnings"].'</td> 
									<td>'.$row["Expenses"].'</td>
									<td>'.$row["Income"].'</td>    
                                    

                                    <td><button type="button" name="update" id="'.$row["id"].'" class="update btn btn-success btn-xs">Update</button></td>  
                                    <td><button type="button" name="delete" id="'.$row["id"].'" class="delete btn btn-danger btn-xs">Delete</button></td>  
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
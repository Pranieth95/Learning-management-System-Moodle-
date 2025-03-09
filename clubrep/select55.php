 <?php  
 //select44.php  
 $output = '';  
 $connect = mysqli_connect("localhost", "root", "", "cirp");  
 if(isset($_POST["action"]))  
 {  
      $procedure = "  
      CREATE PROCEDURE selectclubevents()  
      BEGIN  
      SELECT * FROM club_event ORDER BY ID DESC;  
      END;  
      ";  
      if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS selectclubevents"))  
      {  
           if(mysqli_query($connect, $procedure))  
           {  
                $query = "CALL selectclubevents()";  
                $result = mysqli_query($connect, $query);  
                $output .= '  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="25%">Title</th>  
                               <th width="25%">Details</th> 
							   <th width="25%">Est. Budget</th>
							   <th width="25%">Event Date</th> 
							   
                          </tr>  
                ';  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                          $output .= '  
                               <tr>  
                                    <td>'.$row["Title"].'</td>                                    
									<td>'.$row["Details"].'</td>
									<td>'.$row["Expenses"].'</td> 
									<td>'.$row["Date"].'</td>    
                                    

                                    <td><button type="button" name="update" id="'.$row["ID"].'" class="update btn btn-success btn-xs">Update</button></td>  
                                    <td><button type="button" name="delete" id="'.$row["ID"].'" class="delete btn btn-danger btn-xs">Delete</button></td>  
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
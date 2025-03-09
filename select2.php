 <?php  
 //select.php  
 $output = '';  
 $connect = mysqli_connect("localhost", "root", "", "cirp");  
 if(isset($_POST["action"]))  
 {  
      $procedure = "  
      CREATE PROCEDURE selectstatic()  
      BEGIN  
      SELECT * FROM statics ORDER BY id DESC;  
      END;  
      ";  
      if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS selectstatic"))  
      {  
           if(mysqli_query($connect, $procedure))  
           {  
                $query = "CALL selectstatic()";  
                $result = mysqli_query($connect, $query);  
                $output .= '  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="10%">date</th>  
                               <th width="20%">income</th>  
                               <th width="20%">expense</th>
							   <th width="20%">profit</th>
                               
                               <th width="10%">Delete</th>  
                          </tr>  
                ';  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                          $output .= '  
                               <tr>  
                                    <td>'.$row["date"].'</td>  
                                    <td>'.$row["income"].'</td>  
                                    <td>'.$row["expense"].'</td>
									<td>'.$row["profit"].'</td>
                                    
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
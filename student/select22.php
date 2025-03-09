 <?php  
 //select22.php  
 $output = '';  
 $connect = mysqli_connect("localhost", "root", "", "cirp");  
 if(isset($_POST["action"]))  
 {  
      $procedure = "  
      CREATE PROCEDURE selectclubs()  
      BEGIN  
      SELECT * FROM clubs ORDER BY id DESC;  
      END;  
      ";  
      if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS selectclubs"))  
      {  
           if(mysqli_query($connect, $procedure))  
           {  
                $query = "CALL selectclubs()";  
                $result = mysqli_query($connect, $query);  
                $output .= '  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="30%">Name</th>  
                               <th width="30%">Type</th>							    							    
							   
                          </tr>  
                ';  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                          $output .= '  
                               <tr>  
                                    <td>'.$row["clubName"].'</td>                                    
									<td>'.$row["clubType"].'</td>                                    

                                    <td><button type="button" name="update" id="'.$row["id"].'" class="update btn btn-primary btn-xs">Update</button></td>  
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
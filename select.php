 <?php  
 //select.php  
 $output = '';  
 $connect = mysqli_connect("localhost", "root", "", "cirp");  
 if(isset($_POST["action"]))  
 {  
      $procedure = "  
      CREATE PROCEDURE selectstudent()  
      BEGIN  
      SELECT * FROM student ORDER BY id DESC;  
      END;  
      ";  
      if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS selectstudent"))  
      {  
           if(mysqli_query($connect, $procedure))  
           {  
                $query = "CALL selectstudent()";  
                $result = mysqli_query($connect, $query);  
                $output .= '  
                     <table class="table table-bordered">  
                          <tr>  
                                
                               <th width="20%">student id</th> 
							   <th width="30">name</th> 
							   <th width="20%">date</th> 
								<th width="10%">course category id</th>                               
							   <th width="20%">amount</th>
							   
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
                                                                      
									<td>'.$row["regno"].'</td> 
									<td>'.$row["name"].'</td> 
									<td>'.$row["dob"].'</td>  
									<td>'.$row["ccategoryid"].'</td>                                 
									<td>'.$row["totamount"].'</td> 
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
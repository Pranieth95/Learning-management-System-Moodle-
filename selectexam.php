 <?php  
 //select.php  
 $output = '';  
 $connect = mysqli_connect("localhost", "root", "", "cirp");  
 if(isset($_POST["action"]))  
 {  
      $procedure = "  
      CREATE PROCEDURE selectexamfees()  
      BEGIN  
      SELECT * FROM examfees ORDER BY id DESC;  
      END;  
      ";  
      if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS selectexamfees"))  
      {  
           if(mysqli_query($connect, $procedure))  
           {  
                $query = "CALL selectexamfees()";  
                $result = mysqli_query($connect, $query);  
                $output .= '  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="10%">date</th>  
                               <th width="10%">student id</th> 
							   <th width="20">name</th> 
								<th width="5%">year</th>  
                               <th width="5%">semester</th>
							   <th width="10%">batch</th>
							   <th width="10%">exam Type</th>
							   <th width="10%">subject</th>
							   <th width="10%">amount</th>
                               <th width="5%">Update</th>  
                               <th width="5%">Delete</th>  
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
									<td>'.$row["year"].'</td>  
                                    <td>'.$row["semester"].'</td>
									<td>'.$row["batch"].'</td>
									<td>'.$row["exam"].'</td> 
									<td>'.$row["subject"].'</td>
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
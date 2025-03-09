 <?php  
 //select33.php  
 $output = '';  
 $connect = mysqli_connect("localhost", "root", "", "cirp");  
 if(isset($_POST["action"]))  
 {  
      $procedure = "  
      CREATE PROCEDURE selectMembers()  
      BEGIN  
      SELECT * FROM club_member;  
      END;  
      ";  
      if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS selectMembers"))  
      {  
           if(mysqli_query($connect, $procedure))  
           {    
		   		$query = "CALL selectMembers()";  
                $result = mysqli_query($connect, $query); 
                $output .= '  
                     <table class="table table-bordered">  
                          <tr>  
						  	   <th></th>
                               <th width="20%">ID</th>  
                               <th width="40%">Club</th>
							   <th width="20%">Months Due</th>
							   <th width="30%">Total Fee</th>
							   <th><button type="button" name="resetall" id="resetall" class="resetall btn btn-warning btn-xs">Reset All</button></th>								    							    
							   
                          </tr>  
                ';  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
					 	  						  	
						  //$duration = floor($row["Months"]/3);
						  //$fee = $duration*500;

                          $output .= '  
                               <tr> 
							   		<td><button type="button" name="delete" id="'.$row["CIRP_ID"].'" class="delete1 btn btn-danger btn-xs">Remove</button></td> 
                                    <td>'.$row["CIRP_ID"].'</td>                                    
									<td>'.$row["club"].'</td>
									<td>'.$row["Months"].'</td>
									<td>Rs.'.$row["Fee"].'.00/-</td>
									<td><button type="button" name="reset1" id="'.$row["CIRP_ID"].'" class="reset1 btn btn-warning btn-xs">Reset</button></td>';
  
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
<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cirp"; 
	$error = "Cannot connect to database, Please try again later...";
	
	$conn = mysqli_connect($hostname,$username,$password) or die ($error);
	mysqli_select_db($conn,$dbname) or die ($error);
		
							$sqlinsert = "UPDATE club_member SET Fee = '".$fee."' WHERE CIRP_ID='".$row["CIRP_ID"]."'";
						    $resultinsert = mysqli_query($conn,$sqlinsert); 
							
							//if(mysqli_query($conn,$sqlinsert))
							//echo "True";
							//else
							//echo "False"; 							
?>
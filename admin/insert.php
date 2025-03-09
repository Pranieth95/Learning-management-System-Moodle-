<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cirp"; 
	$error = "Cannot connect to database, Please try again later...";
	
	$conn = mysqli_connect($hostname,$username,$password) or die ($error);
	mysqli_select_db($conn,$dbname) or die ($error);
		
    					  $sqlinsert = "UPDATE club_member SET Months = '".$months."', Fee=0 WHERE CIRP_ID='".$row["CIRP_ID"]."'";
						  $resultinsert = mysqli_query($conn,$sqlinsert);
						  
						  
?>						  
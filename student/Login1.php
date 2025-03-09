<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "cirp"); 

if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{
	echo "Database connection is ok"; 
}

$email = mysqli_real_escape_string($con,$_POST['email']);
$password = mysqli_real_escape_string($con,$_POST['password']);


//see if user is logged in
if(isset($_POST["login"])){
	if(isset($_POST["id"]) && isset($_POST["password"]))
	{
		$id = mysqli_real_escape_string($conn,$_POST["id"]);
		$password = mysqli_real_escape_string($conn,$_POST["password"]);
		
		$sqladmin= "SELECT * FROM admins WHERE id ='".$id."' AND password ='".$password."'";
		$resultadmin = mysqli_query($conn,$sqladmin);
		
		$sqlclubrep= "SELECT * FROM club_member WHERE CIRP_ID ='".$id."' AND type='Rep'";
		$resultclubrep = mysqli_query($conn,$sqlclubrep);
		
		$sqlclubnormal= "SELECT * FROM club_member WHERE CIRP_ID ='".$id."'";
		$resultclubnormal = mysqli_query($conn,$sqlclubnormal);
		
		$sqllec= "SELECT * FROM lecturer WHERE id ='".$id."' AND password ='".$password."'";
		$resultlec = mysqli_query($conn,$sqllec);
		
		$sqlstdnt= "SELECT * FROM student WHERE id ='".$id."' AND password ='".$password."'";
		$resultstdnt = mysqli_query($conn,$sqlstdnt);
		
		
		
		if(mysqli_num_rows($resultadmin) > 0)
		{	
			$_SESSION["Authenticated"] = "admin";
			session_write_close();
			header("Location: /ITP/admin/Calendar.php");
			
		}
		elseif(mysqli_num_rows($resultclubrep) > 0)
		{
			$_SESSION["Authenticated"] = "clubrep";
			session_write_close();
			header("Location: /ITP/clubrep/Calendar.php");
		}
		elseif(mysqli_num_rows($resultlec) > 0)
		{
			$_SESSION["Authenticated"] = "lecturer";
			session_write_close();
			header("Location: /ITP/lecturer/Calendar.php");
		}
		elseif(mysqli_num_rows($resultclubnormal) > 0)
		{
			$_SESSION["Authenticated"] = "clubnormal";
			session_write_close();
			header("Location: /ITP/student/Calendar.php");
		}
		elseif(mysqli_num_rows($resultstdnt) > 0)
		{
			$_SESSION["Authenticated"] = "student";
			session_write_close();
			header("Location: /ITP/student/Calendar.php");
		}
		else
		{
			$_SESSION["Authenticated"] = 0;
			header("Location: Login1.html");
		}
		
	}
	else
	{
		$_SESSION["Authenticated"] = 0;
		header("Location: Login1.html");
	}
	

}

//user is logging out
if(isset($_GET["logout"])){
	session_destroy();
	header("Location: Login1.html");
}
?>


 
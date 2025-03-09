<?php
session_start();
include_once('config.php');
if(isset($_POST['login']))
{
		$name = $_POST["name"];
		$password = $_POST["password"];
					
					$result = mysqli_query($conn , "SELECT * FROM user WHERE `user_name`='$name' and `user_password`='$password'");
					while($row = mysqli_fetch_assoc($result))
					{
						$name = $row['user_name'];
						$id= $row['user_id'];
						$password=$row['user_password'];
					
					echo"error";
					
					if(mysqli_num_rows($result)>0)
					{
						echo "success";
						$_SESSION['name'] = $name;
						$_SESSION['password'] = $password;
						$_SESSION['id'] = $id;
						
						
						header('location: home.php');
						
					}
					else 
					{
						echo "failed";
						header('location: initial.php?login_error=<span style="color:red">Username or password is wrong</span>');
					}

					}
			}		
	

 ?>
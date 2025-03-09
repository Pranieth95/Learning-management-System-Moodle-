<?php
	session_start();
	include_once('config.php');
	if(isset($_POST['submit']))
	{
			$username=$_POST["username"];
			$topic=$_POST["topic"];
			$category=$_POST["category"];
			$q_detail=$_POST["q_detail"];

			if((!empty($username)) &&(!empty($topic)) && (!empty($category)) && (!empty($q_detail)))
			{
				$username     = $_POST['username'];
				$topic    = $_POST['topic'];
				$category  = $_POST['category'];
				$q_detail = $_POST['q_detail'];


				$result = mysqli_query($conn, "INSERT INTO `cirp`.`question`
		            (`q_ID`,
		             `topic`,
		             `q_detail`,
		             `replies`,
		             `likes`,
		             `user_email`,
		             `category`)
				VALUES (NULL,
				        '$topic',
				        '$q_detail',
				        '0',
				        '0',
				        '$username',
				        '$category');");
				if ($result) 
				{
		    		header('location: home.php?registeration_successfull=<span style="color:green">You have successfully posted. Thank you.</span>');
				} 
				else 
				{
		    		echo "failed";
				}
			}
			else
			{
				header('location: home.php?registeration_fail=<span style="color:red">Please fill all the feilds.</span>');
			}
	}
?>
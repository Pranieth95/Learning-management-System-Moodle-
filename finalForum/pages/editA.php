<?php
	if (isset($_POST['editAns'])) 
	{
		$aid=$_POST["aid"];
		echo $aid;

		$answer=$_POST["answer"];

		include 'config.php';

		$result= mysqli_query($conn , "UPDATE answer SET `answer`='$answer' WHERE `id`='$aid' ");

		if($result)
		{
			header('location:account.php');
		}
		else
		{
			echo "fail";
		}

	}
?>
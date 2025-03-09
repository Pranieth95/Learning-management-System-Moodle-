<?php
	if (isset($_POST['edit'])) 
	{
		$qid=$_POST["qid"];
		echo $qid;

		$topic=$_POST["topic"];
		$q_detail=$_POST["q_detail"];
		$category=$_POST["category"];

		include 'config.php';

		$result= mysqli_query($conn , "UPDATE question SET `topic`='$topic', `q_detail`='$q_detail', `category`='$category' WHERE `q_ID`='$qid' ");

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
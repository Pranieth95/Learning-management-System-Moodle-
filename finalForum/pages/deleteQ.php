<?php
	if(isset($_POST['delete']))
	{
		$qid=$_POST["qid"];
		echo $qid;

		include 'config.php';

		$result= mysqli_query($conn , "DELETE FROM question WHERE `q_ID`='$qid'");



		if ($result) 
		{
    		header('location:account.php');
		} 
		else 
		{
    		echo "failed";
		}


	}

?>
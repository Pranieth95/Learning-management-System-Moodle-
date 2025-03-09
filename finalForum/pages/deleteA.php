<?php
	if(isset($_POST['delete']))
	{
		$aid=$_POST["aid"];
		echo $aid;
		$qid=$_POST["qid"];
		include 'config.php';

		$result= mysqli_query($conn , "DELETE FROM answer WHERE `id`='$aid'");



		if ($result) 
		{
    		header('location:account.php');
		} 
		else 
		{
    		echo "failed";
		}

		$result2= mysqli_query($conn , "SELECT * FROM question WHERE `q_ID`='$qid'");
        while ($row = mysqli_fetch_assoc($result2))
        {
        	$replies=$row['replies'];
        	$replies=$replies-1;

        	$result3= mysqli_query($conn , "UPDATE question SET `replies`='$replies' WHERE `q_id`='$qid' ");

        	if($result3)
        	{
        		echo"sucsess";
        	}
        	else
        	{
        		echo "fail";
        	}
        }

	}

?>
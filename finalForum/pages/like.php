<?php
session_start();
$id=$_SESSION['uname'] ;
include 'config.php';

if(isset($_POST['like']))
{
	$qid=$_POST["id"];


	$result1 = mysqli_query($conn, "INSERT INTO `cirp`.`user_like`
		            (`q_ID`,
		             `user_ID`)
				VALUES ($qid,
				        '$id');");


	if($result1)
	{



		$result= mysqli_query($conn , "SELECT * FROM question WHERE `q_ID`='$qid'");
		while ($row = mysqli_fetch_assoc($result))
		{
			$currentLike=$row['likes'];
			$like=$currentLike + 1;

			$result2= mysqli_query($conn , "UPDATE question SET `likes`='$like' WHERE `q_id`='$qid' ");

			if($result2)
			{
				header('location:home.php');
			}
			else
			{
				echo "like not increased";
			}
		}

	}
	else
	{
		echo "can't like more than once";
		$PHPtext = "can't like more than once";
	}

}

?>

<html>
<head>
	<script type="text/javascript">
		
		var JavaScriptAlert = <?php echo json_encode($PHPtext); ?>;
alert(JavaScriptAlert); // Your PHP alert!
window.location.replace("home.php");


	</script>
	</head>
</html>
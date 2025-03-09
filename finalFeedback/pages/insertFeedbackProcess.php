<?php
include 'config.php';
if(isset($_POST["insert"]))
{
	$feedback=$_POST['feedback'];
		$result = mysqli_query($conn, "INSERT INTO `feedback_question_cos`
		            (`id`,
		             `question`)
		    VALUES (NULL,
		            '$feedback');");

		if($result)
		{
			header('location: insertFeedback.php?insert_successfull=<span style="color:green">You have successfully posted. Thank you.</span>');
		}
		else
		{
			echo "error";
		}
}

if(isset($_POST["insertFeedbackCourse"]))
{
	$feedback=$_POST['feedbackCourse'];
		$result = mysqli_query($conn, "INSERT INTO `feedback_question_cos`
		            (`id`,
		             `question`)
		    VALUES (NULL,
		            '$feedback');");

		if($result)
		{
			header('location: insertFeedbackCourse.php?insert_successfull=<span style="color:green">You have successfully posted. Thank you.</span>');
		}
		else
		{
			echo "error";
		}
}
?>
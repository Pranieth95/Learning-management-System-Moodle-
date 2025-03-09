<?php
include 'config.php';

if(isset($_POST['submit']))
{
	$id=$_POST['id'];

	$result= mysqli_query($conn , "DELETE FROM feedback_question_cos WHERE `id`='$id'");



		if ($result) 
		{
    		header('location:insertFeedbackCourse.php');
		} 
}

?>
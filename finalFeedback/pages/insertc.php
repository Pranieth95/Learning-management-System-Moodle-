<?php
	session_start();
    include 'config.php';
	if(isset($_POST['submit']))
    {
		$radio_value=$_POST['radio'];
        $feedback_ID = $_POST['feedback_ID'];
		$course_ID=$_SESSION['sc'];
       

        $result = mysqli_query($conn, "INSERT INTO `course_feedback`
            (`id`,
             `course_ID`,
             `value`,
             `feedback_ID`)
    VALUES (NULL,
            '$course_ID',
            '$radio_value',
            '$feedback_ID');");



            if($result)
            {
                header('location: cos.php?insert_successfull=<span style="color:green">You have successfully given your feedback '.$feedback_ID.'.Thank you.</span>');
            } 
            else 
            {
                echo "failed insert course table";
            }
        }
        
?>
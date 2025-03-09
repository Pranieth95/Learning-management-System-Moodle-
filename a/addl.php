<?php
$con=mysqli_connect("localhost","root","","cirp");
// Check connection
if (mysqli_connect_errno()) {
 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$subject = $_POST['subject'];
$enkey  = $_POST['ekey'];
$pw  =  $_POST['pw'];
$ccategoryid =  $_POST['ccategoryid'];
$cfee =  $_POST['cfee'];


 if(isset($_POST['insert']))
{
$sql="INSERT INTO  marksenroll (subject,enkey,pw,ccategoryid,cfee)VALUES ('$subject','$enkey','$pw','$ccategoryid','$cfee')";
}



 if(isset($_POST['update']))
{
$sql="UPDATE marksenroll SET subject='$subject' , enkey='$enkey' , pw='$pw' , ccategoryid='$ccategoryid',cfee='$cfee' WHERE subject='$subject'";
}


 if(isset($_POST['delete']))
{
$sql="DELETE FROM marksenroll WHERE subject='$subject'";
}


if (!mysqli_query($con,$sql)) {
 	die('Error: ' . mysqli_error($con));
}

//echo "1 record added";
header("Location: courses.php");
mysqli_close($con);
?>

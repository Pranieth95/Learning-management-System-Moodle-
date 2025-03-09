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
$address =  $_POST['address'];

 if(isset($_POST['insert']))
{
$sql="INSERT INTO  lecturer (lecturer_ID,name,password,subject,email,address)VALUES ('$subject','$enkey','$pw','$ccategoryid','$cfee','$address')";
}



 if(isset($_POST['update']))
{
$sql="UPDATE lecturer SET lecturer_ID='$subject' , name='$enkey' , password='$pw' , subject='$ccategoryid',email='$cfee',address='$address' WHERE lecturer_ID='$subject'";
}


 if(isset($_POST['delete']))
{
$sql="DELETE FROM lecturer WHERE lecturer_ID='$subject'";
}


if (!mysqli_query($con,$sql)) {
 	die('Error: ' . mysqli_error($con));
}

//echo "1 record added";
header("Location: Lregister.php");
mysqli_close($con);
?>

<?php
$con=mysqli_connect("localhost","root","","cirp");
// Check connection
if (mysqli_connect_errno()) {
 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_POST['id'];
$notice = $_POST['notice'];

 if(isset($_POST['insert']))
{
$sql="INSERT INTO  notices (id,notice)VALUES ('$id','$notice')";
}



 if(isset($_POST['update']))
{
$sql="UPDATE notices SET notice='$notice'  WHERE id='$id'";
}


 if(isset($_POST['delete']))
{
$sql="DELETE FROM notices WHERE id='$id'";
}


if (!mysqli_query($con,$sql)) {
 	die('Error: ' . mysqli_error($con));
}

//echo "1 record added";
header("Location: notices.php");
mysqli_close($con);
?>

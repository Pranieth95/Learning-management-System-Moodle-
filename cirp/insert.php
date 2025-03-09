<?php
session_start();
$subject=$_SESSION['subject'];
?>



<?php
$con=mysqli_connect("localhost","root","","cirp");
// Check connection
if (mysqli_connect_errno()) {
 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sid = $_POST['sid'];
$ass1  = (($_POST['ass1'])/($_SESSION["ass1"]))*($_SESSION["p1"]);
$ass2   =  (($_POST['ass2'])/($_SESSION["ass2"]))*($_SESSION["p2"]);
$mid =  (($_POST['mid'])/($_SESSION["ass3"]))*($_SESSION["p3"]);
$final =  (($_POST['final'])/($_SESSION["ass4"]))*($_SESSION["p4"]);

$tot = $ass1 + $mid + $final;

if($tot < 45)
	{
	$grade="D";
	$point=1.0;
	}
if($tot >= 45)
	{
	$grade="C";
	$point=2.0;
	}
if($tot >= 55)
	{
	$grade="C+";
	$point=2.3;
	}
if($tot >= 60)
	{
	$grade="B-";
	$point=2.7;
	}
if($tot >= 65)
	{
	$grade="B";
	$point=3.0;
	}
if($tot >= 70)
	{
	$grade="B+";
	$point=3.3;
	}
if($tot >= 75)
	{
	$grade="A";
	$point=3.7;
	}
if($tot >= 85)
	{
	$grade="A+";
	$point=4.0;
	}

 if(isset($_POST['insert']))
{
$sql="INSERT INTO  marks (regno,ass1,ass2,mid,final,credit,tot,grade,point,subject)VALUES ('$sid','$ass1','$ass2','$mid','$final','$credit','$tot','$grade','$point','$subject')";
}



 if(isset($_POST['update']))
{
$sql="UPDATE marks SET ass1='$ass1', mid='$mid' , final='$final',tot='$tot',grade='$grade',point='$point'  where regno='$sid' AND subject='$subject'";
}


 if(isset($_POST['delete']))
{
$sql="DELETE FROM marks WHERE regno='$sid' AND subject='$subject'";
}


if (!mysqli_query($con,$sql)) {
 	die('Error: ' . mysqli_error($con));
}

//echo "1 record added";
header("Location: L insert marks.php");
mysqli_close($con);
?>

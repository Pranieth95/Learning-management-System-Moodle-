<?php
session_start();
$lid=$_SESSION['sc'];
include 'config.php';

$result= mysqli_query($conn , "SELECT SUM(`value`) AS `rate`,`course_ID` FROM course_feedback WHERE `course_ID`='$lid' GROUP BY `course_ID`");

while ($row = mysqli_fetch_assoc($result))
{
	echo "lecturer ID = ";
	echo $row['course_ID'];
	echo "rate = ";
	echo $row['rate'];
	$rate=$row['rate'];


$result3 = mysqli_query($conn, "INSERT INTO `lec_total_feedback`
            (`id`,
             `lid`,
             `t_rate`)
    VALUES (NULL,
            '$lid',
            '$rate');");

$result2= mysqli_query($conn , "SELECT * FROM lecturer WHERE `lecturer_ID`='$lid'");
while ($row=mysqli_fetch_assoc($result2))
{
    echo "    total rate = ";
        echo $row['total_rate'];
    $total_rate=$row['total_rate'];
    $total_rate=$rate;

    $result4= mysqli_query($conn , "UPDATE lecturer SET `total_rate`='$total_rate' WHERE `lecturer_ID`='$lid'");

   if($result4)
   {
        header('location: cos.php');
   }
       
   
}

 

}




?>
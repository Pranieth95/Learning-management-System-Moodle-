<?php
session_start();
include 'config.php';
if(isset($_POST["submit"]))
{
	$lid=$_POST['lid'];
	$name=$_POST['name'];
    $pw=$_POST['pw'];
    $sub=$_POST['sub'];
    $email=$_POST['email'];
    $address=$_POST['address'];

	$result = mysqli_query($conn, "INSERT INTO `lecturer`
            (`id`,
             `lecturer_ID`,
             `name`,
             `password`,
             `subject`,
             `email`,
             `address`,
             `total_rate`)
    VALUES (NULL,
            '$lid',
            '$name',
            '$pw',
            '$sub',
            '$email',
            '$address',
            '0');");


    if($result)
    {
        header('location:insertLecturer.php');
    }
    else
    {
        mysqli_error($result);
    }
}


?>
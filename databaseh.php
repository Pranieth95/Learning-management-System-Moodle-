<?php

//create connection credentials
$db_host = 'localhost';
$db_name = 'cirp';
$db_user = 'root';
$db_pass = '';

 //create mysql object
$mysqli = new mysqli($db_host, $db_user ,$db_pass, $db_name);

//error handler
if($mysqli->connect_error){
	printf("connect failed; %a\n", $mysqli->connect_error);
	exit();

}

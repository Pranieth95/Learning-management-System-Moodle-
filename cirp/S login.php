<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
<link rel="stylesheet" type="text/css" href="style/style2.css" title="style" />
</head>

<body>
  <div id="main">
     <div id="header">
      
   	   <div id="logo">
      	   </div>
      
     	   <div id="menubar">
           </div>
     </div>
   </div>









<meta charset="UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

    
<div class="container">
  <div class="info">
    
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/></div>

  


<form action="" method="POST">

  
    <input type="text" placeholder="Registration No" name="uname" required>

    
    <input type="password" placeholder="Enter Password" name="pass" required>
        
    <button type="submit" value="login" name="submit">Login</button>
 
  
</form>







</div>
<video id="video" autoplay="autoplay" loop="loop" poster="polina.jpg">
  <source src="http://andytran.me/A%20peaceful%20nature%20timelapse%20video.mp4" type="video/mp4"/>
</video>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>






<div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; PRANIETH | SLIIT | BATCH4 | GRADING SYSTEM
    </div>



 <?php
require ('sql_connect.php');
if (isset($_POST['submit'])){
$username=mysql_escape_string($_POST['uname']);
$password=mysql_escape_string($_POST['pass']);
$_SESSION["uname"]=$username;
if (!$_POST['uname'] | !$_POST['pass'])
 {
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('You did not complete all of the required fields')
        window.location.href='login.html'
        </SCRIPT>");
exit();
     }
$sql= mysql_query("SELECT * FROM student WHERE regno = '$username' AND pw = '$password'");
if(mysql_num_rows($sql) > 0)
{
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Login Succesfully!.')
        window.location.href='S Profile.php'
        </SCRIPT>");
exit();
}
else{
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Wrong username password combination.Please re-enter.')
        window.location.href='S login.php'
        </SCRIPT>");
exit();
}
}
else{
}

?>








</body>

</html>

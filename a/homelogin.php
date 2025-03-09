<?php
require ('sql_connect.php');

session_start();

?>
<!DOCTYPE HTML>
<html>

<head>

  <title></title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="styleb/style.css" title="style" />


</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html"><span class="logo_colour"></span></a></h1>
          <h2></h2>
        </div>
      </div>
      <div id="menubar">

      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
        

      </div>
      <div id="content">
        <!-- insert the page content here -->


        <form action="" method="post">
          <div class="form_settings">
 
    <input type="text" placeholder="Enrollment key" name="uname" >

    
    <input type="password" placeholder="Enter Password" name="pass" >
        
    
    <input class="submit" type="submit" name="submit" value="login" /></p>
   


          </div>
        </form>

        
          <div class="form_settings">
           
          </div>
        
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; ADMIN | SLIIT | BATCH4 | GRADING SYSTEM
    </div>
  </div>


<?php
require ('sql_connect.php');
if (isset($_POST['submit']))                                           {
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



if (substr($username, 0, 2) === 'DF')
	{
$sql= mysql_query("SELECT * FROM student WHERE regno = '$username' AND pw = '$password' ");
if(mysql_num_rows($sql) > 0)

{
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Login Succesfully!.')
	window.location.href='student.php'
        </SCRIPT>");
exit();
}
else {
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Wrong username password combination.Please re-enter.')
        window.location.href='homelogin.php'
        </SCRIPT>");
exit();
     }
	} 
if (substr($username, 0, 2) === 'DD')
	{
$sql= mysql_query("SELECT * FROM student WHERE regno = '$username' AND pw = '$password' ");
if(mysql_num_rows($sql) > 0)

{
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Login Succesfully!.')
	window.location.href='student.php'
        </SCRIPT>");
exit();
}
else {
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Wrong username password combination.Please re-enter.')
        window.location.href='homelogin.php'
        </SCRIPT>");
exit();
     }
	}	
	if (substr($username, 0, 2) === 'DC')
	{
$sql= mysql_query("SELECT * FROM student WHERE regno = '$username' AND pw = '$password' ");
if(mysql_num_rows($sql) > 0)

{
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Login Succesfully!.')
	window.location.href='student.php'
        </SCRIPT>");
exit();
}
else {
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Wrong username password combination.Please re-enter.')
        window.location.href='homelogin.php'
        </SCRIPT>");
exit();
     }
	}
		if (substr($username, 0, 2) === 'SS')
	{
$sql= mysql_query("SELECT * FROM lecturer WHERE lecturer_ID = '$username' AND password = '$password' ");
if(mysql_num_rows($sql) > 0)

{
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Login Succesfully!.')
	window.location.href='../navi/lfrontView1.php'
        </SCRIPT>");
exit();
}
else {
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Wrong username password combination.Please re-enter.')
        window.location.href='homelogin.php'
        </SCRIPT>");
exit();
     }
	}
if (substr($username, 0, 2) === 'AA')
	{
$sql= mysql_query("SELECT * FROM admins WHERE id = '$username' AND password = '$password' ");
if(mysql_num_rows($sql) > 0)

{
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Login Succesfully!.')
	window.location.href='admin.php'
        </SCRIPT>");
exit();
}
else {
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Wrong username password combination.Please re-enter.')
        window.location.href='homelogin.php'
        </SCRIPT>");
exit();
     }
	} 	

																	  }
else{
    }


	


?>






</body>
</html>







<?php
session_start();
echo "<div style ='color:#ff0000'>Welcome "."".$_SESSION["uname"];


$subject=$_SESSION['subject'];
?>

<a href="../a/homelogin.php"> Logout </a>



<!DOCTYPE html>
<html>


<head>
  
<title>colour_blue - another page</title>
  
<meta name="description" content="website description" />
  
<meta name="keywords" content="website keywords, website keywords" />
  
<meta http-equiv="content-type" content="text/html; charset=windows-1252" />

<link rel="stylesheet" type="text/css" href="style/styleh.css" title="style" />



<style>
  
  	table {
    border-collapse: collapse;
    width: 100%;
}


#td1{

    height: 50px;
    vertical-align: bottom;
	
font-size: 130%;
}
#th{
    background-color: #BC8F8F ;
    color: white;
	font-size: 140%;
}

#button {
  outline: 0;
  background:#025587 ;
  width: 50%;
  border: 0;
  padding: 15px;
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
  border-bottom-left-radius: 3px;
  border-bottom-right-radius: 3px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}


input[type=number] {
    
    border: 2px solid #025587;
    border-radius: 4px;
}


</style>


<?php

    //Create Connection with MySQL Database
    $con = mysqli_connect('localhost','root','');



    //Select Database
    if(!mysqli_select_db($con,'cirp'))
    {
        echo "Database Not Selected";
    }


$q5="UPDATE abc
   SET count = CASE id
                     WHEN 1 THEN (select sum(case when tot<= 44 then 1 else 0 end) from marks WHERE subject='$subject')
                     WHEN 2 THEN (select sum(case when tot > 44 and tot <= 59 then 1 else 0 end) from marks WHERE subject='$subject')
                     WHEN 3 THEN (select sum(case when tot > 59 and tot <= 74 then 1 else 0 end) from marks WHERE subject='$subject')
                     WHEN 4 THEN (select sum(case when tot > 74 and tot <= 84 then 1 else 0 end) from marks WHERE subject='$subject')
		     WHEN 5 THEN (select sum(case when tot > 84 and tot <= 100 then 1 else 0 end) from marks WHERE subject='$subject')
		     END
 WHERE id BETWEEN 1 AND 5";

    //Execute the SQL query
    $records = mysqli_query($con,$q5);

?>

</head>


<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          
<!-- class="logo_colour", allows you to change the colour of the text -->
         
<h1><!--a href="index.html">Online <span class="logo_colour">Quiz System</span></a--></h1>
        </div>
      </div>
      
<div id="menubar">
  

          <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="marksettings.php">Format of Marks</a></li>
	  <li><a href="allocationchart.php">Statistics</a></li>
        </ul>



    </div>
    </div>
    
    
    <div id="content_header"></div>
    
    <div id="site_content">
      <div class="sidebar">
      
  <!-- insert your sidebar items here -->
       
      </div>
      
<div id="content">
       





 <!-- insert the page content here -->
      
      
<form method="post" action="" >
<table>
		<th id="th"><?php echo $_SESSION['subject'] ?></th>
		
		<tr>
		<td id="td1">Total Marks for Assignment 1:</td>
		<td id="td1"><input type="number" name="ass1" id="ass1" required  /></td>
		<td id="td1">Percentage:</td>
		<td id="td1"><input  type="number" name="p1" id="p1" required /></td>
		</tr>



		<tr>
		<td id="td1">Total Marks for Mid Term Test:</td>
		<td id="td1"><input type="number" name="ass3" id="ass3"  required /></td>
		<td id="td1">Percentage:</td>
		<td id="td1"><input  type="number" name="p3" id="p3" required /></td>
		</tr>

		<tr>
		<td id="td1">Total Marks for Final:</td>
		<td id="td1"><input type="number" name="ass4" id="ass4"  required /></td>
		<td id="td1">Percentage:</td>
		<td id="td1"><input  type="number" name="p4" id="p4" required /></td>		
		</tr>
<tr></tr>
		<tr>		
	<td></td><td></td>
		<td>
		<input type="submit" name="submit" value="Add" id="button">
		
		</td></tr>

</table>
</form>

</div>
    </div>
   
 <div id="content_footer"></div>
   
 <div id="footer">
    
  Copyright &copy; PRANIETH | SLIIT | BATCH4 | GRADING SYSTEM    
</div>
  </div>
</body>
</html>


<?php
require ('sql_connect.php');
if (isset($_POST['submit'])){
$ass1=mysql_escape_string($_POST['ass1']);
$_SESSION["ass1"]=$ass1;

$p1=mysql_escape_string($_POST['p1']);
$_SESSION["p1"]=$p1;

$ass2=mysql_escape_string($_POST['ass2']);
$_SESSION["ass2"]=$ass2;

$p2=mysql_escape_string($_POST['p2']);
$_SESSION["p2"]=$p2;

$ass3=mysql_escape_string($_POST['ass3']);
$_SESSION["ass3"]=$ass3;

$p3=mysql_escape_string($_POST['p3']);
$_SESSION["p3"]=$p3;

$ass4=mysql_escape_string($_POST['ass4']);
$_SESSION["ass4"]=$ass4;

$p4=mysql_escape_string($_POST['p4']);
$_SESSION["p4"]=$p4;



header("Location:L insert marks.php");
           			}


?>

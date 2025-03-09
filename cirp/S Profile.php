<?php
session_start();
echo "<div style ='color:#ff0000'>Welcome "."".$_SESSION["uname"]; 
?>

<a href="../a/student.php"> Logout </a>




<!DOCTYPE HTML>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="style/style3.css" title="style" />
<style>
A {
    color:blue;
}
</style>
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
       
      </div>
      <div id="menubar">
       
      </div>
    </div>
    

	<div id="content_header"></div>
    	<div id="site_content">
      
      <div class="sidebar">
        
        
        
      </div>
   


<div id="content">
<table>
        <!-- insert the page content here -->




<?php

    //Create Connection with MySQL Database
    $con = mysqli_connect('localhost','root','');



    //Select Database
    if(!mysqli_select_db($con,'cirp'))
    {
        echo "Database Not Selected";
    }

	
    
$sql="SELECT regno,name FROM student WHERE regno ='{$_SESSION['uname']}'";

    //Execute the SQL query
    $records = mysqli_query($con,$sql);

    while($row = mysqli_fetch_array($records))
    {
        echo "<tr>";
        echo "<td>Registration No:</td>";
        echo "<td>".$row['regno']."</td>";
        echo "</tr>";	
	echo "<tr>";
        echo "<td>Student Name:</td>";
        echo "<td>".$row['name']."</td>";
        echo "</tr>";
    }


$q3="SELECT ROUND(AVG(point),2) AS cgpa FROM marks WHERE regno ='{$_SESSION['uname']}'";

    //Execute the SQL query
    $records = mysqli_query($con,$q3);

    while($row = mysqli_fetch_array($records))
    {
        echo "<tr>";
        echo "<td>Cumulative GPA:</td>";
        echo "<td>".$row['cgpa']."</td>";
        echo "</tr>";	
	

	
	
   }




?>




</table>      
<p class="span">Please note that the results shown in the student profile are subjected to change. Students are advised to refer to results released on respective notice boards in the college premises.</p>

          <table style="width:100%; border-spacing:0;">
	  
          <tr><th>Subject</th><th>Grade</th></tr>
          



<?php

    //Create Connection with MySQL Database
    $con = mysqli_connect('localhost','root','');



    //Select Database
    if(!mysqli_select_db($con,'cirp'))
    {
        echo "Database Not Selected";
    }
	
    $sql="SELECT regno,grade,subject FROM marks WHERE regno ='{$_SESSION['uname']}'";

    //Execute the SQL query
    $records = mysqli_query($con,$sql);

    while($row = mysqli_fetch_array($records))
    {
        echo "<tr>";
        
	echo "<td>".$row['subject']."</td>";
        echo "<td>".$row['grade']."</td>";
        echo "</tr>";	

   }
?>





        </table>


     <p>Note : As this is a computer generated Transcript, no signature is required.</p>
<A HREF="javascript:window.print()">Click to Pdf Transcript</A>
      </div>





    </div>
    <div id="content_footer">

</div>
    <div id="footer">
      Copyright &copy; PRANIETH | SLIIT | BATCH4 | GRADING SYSTEM
    </div>
  </div>
</body>
</html>

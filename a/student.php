<?php
session_start();
echo "<div style ='color:#ff0000'>Welcome </div>"."".$_SESSION["uname"];



?>
<a href="homelogin.php"> Logout </a>

<!DOCTYPE HTML>
<html>

<head>

  <title></title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="styleb/style.css" title="style" />

<style>
h2
{ font: normal 175% ;
  color:red;
font-family: "Arial Black", Gadget, sans-serif}


table tr th, table tr td
{ background: #006400;
  color: #006400;
  padding: 7px 4px;
  text-align: left;}
  
table tr td
{ background:#191970;
  color: #006400;
  border-top: 1px solid #FFF;}


</style>

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
        
        <h3>Useful Links</h3>
        <ul>
	  <li><a href="../sachi/finalChat/index.php">Chat</a></li>
          <li><a href="../sachi/finalForum/pages/home.php">Forum</a></li>
	  <li><a href="../sachi/finalFeedback/pages/viewLecturer.php">Lecturer Feedback</a></li>
          <li><a href="../navi/Slogin.php">Online Quiz</a></li>
          <li><a href="../cirp/S login.php">Examination Results</a></li>

        </ul>
<h3><B>Calander</B></h3>
<a href="../arju/student/Calendar.php">
	<img src="styleb/1d.jpg" alt="HTML5 Icon" style="width:128px;height:128px;"> 
</a> 
<h3><B>Academic Stock</B></h3>
<a href="../madu/MyPage1.php">
	<img src="styleb/1f.jpg" alt="HTML5 Icon" style="width:128px;height:128px;"> 
</a> 

      </div>
      <div id="content">
        <!-- insert the page content here -->
	<table >
	
  	
<?php
    //Create Connection with MySQL Database
    $con = mysqli_connect('localhost','root','');



    //Select Database
    if(!mysqli_select_db($con,'cirp'))
    {
        echo "Database Not Selected";
    }
    //Select Query
	
    $sql = "SELECT id,notice FROM notices";


    //Execute the SQL query
    $records = mysqli_query($con,$sql);

    while($row = mysqli_fetch_array($records))
    {
        echo "<tr>";
	echo "<td><h2>"   .$row['notice']."</h2></td>";

   }
?>
	


</table>

        <h1>CIRP School of Psychology</h1>
        <p>Study for qualifications from a Top 12 British University at CIRP School of Psychology.</p>
       
<p><a href="https://researchandpsychology.com/">Click to See Our WebSite</a></p>
        <h2>Important Documents for All CIRP Students are uploaded to the course</h2>
        
        <h4>Excellent Student Satisfaction</h4>
       
        
        
        <p><strong>Study for qualifications from a Top 12 British University at CIRP School of Psychology</strong></p>
        
        



<?php
    //Create Connection with MySQL Database
    $con = mysqli_connect('localhost','root','');



    //Select Database
    if(!mysqli_select_db($con,'cirp'))
    {
        echo "Database Not Selected";
    }
    //Select Query
	
    $sql = "SELECT subject FROM marks WHERE regno ='{$_SESSION['uname']}'";


    //Execute the SQL query
    $records = mysqli_query($con,$sql);

    while($row = mysqli_fetch_array($records))
    {
        echo "<tr>";
	echo "<td><h3>"   .$row['subject']."</h3></td>";

   }
?>
	
<?php
include "view.php";
?>


      

        <form action="#" method="post">
          <div class="form_settings">
           
          </div>
        </form>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; ADMIN | SLIIT | BATCH4 | GRADING SYSTEM
    </div>
  </div>
</body>
</html>

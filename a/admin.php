<?php
session_start();
echo "<div style ='color:#ff0000'>Welcome "."".$_SESSION["uname"];



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
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="admin.php">Home</a></li>
          <li class="selected"><a href="Sregister.php">Student Registration</a></li>
          <li><a href="Lregister.php">Lecture registration</a></li>
          <li><a href="courses.php">Courses</a></li>
          <li><a href="notices.php">Notices</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
       
<h3><B>Online Quiz</B></h3>
<a href="../navi/Llogin.php">
	<img src="styleb/1a.png" alt="HTML5 Icon" style="width:128px;height:128px;"> 
</a> 

<h3><B>Grading System</B></h3>
<a href="../cirp/lfrontView.php">
	<img src="styleb/1c.png" alt="HTML5 Icon" style="width:128px;height:128px;"> 
</a> 
<h3><B>Calander</B></h3>
<a href="../arju/admin/Calendar.php">
	<img src="styleb/1d.jpg" alt="HTML5 Icon" style="width:128px;height:128px;"> 
</a> 
<h3><B>Payment Handle</B></h3>
<a href="../mali/indexmain.php">
	<img src="styleb/1e.jpg" alt="HTML5 Icon" style="width:128px;height:128px;"> 
</a> 
<h3><B>Academic Stock</B></h3>
<a href="../madu/index.php">
	<img src="styleb/1f.jpg" alt="HTML5 Icon" style="width:128px;height:128px;"> 
</a> 
<h3><B>Insert feedback quections</B></h3>
<a href="../sachi/finalFeedback/pages/insertFeedbackCourse.php">
	<img src="styleb/1b.png" alt="HTML5 Icon" style="width:128px;height:128px;"> 
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

<?php
session_start();
echo "<div style ='color:#ff0000'>Welcome "."".$_SESSION["uname"];



?>
<a href="homelogin.php"> Logout </a>
<!DOCTYPE HTML>
<html>

<head>


<style>
            table tr:not(:first-child){
                cursor: pointer;transition: all .25s ease-in-out;
            }
            table tr:not(:first-child):hover{background-color: #ddd;}
</style>
  <title>colour_blue - contact us</title>
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
        <h1>Course Management</h1>
        
        <form action="add2.php" method="post">
          <div class="form_settings">
            <p><span>Lecturer ID</span>
<input class="contact" type="text" name="subject" id="subject" value="" required  pattern="(SS)+.{6}$" /></p>
            <p><span>Name</span>
<input class="contact" type="text" name="ekey" id="ekey" value="" /></p>
            <p><span>Password</span>
<input class="contact" type="text" name="pw" id="pw" value="" /></p>
            <p><span>Subject</span>
<input class="contact" type="text" name="ccategoryid" id="ccategoryid" value="" /></p>
            <p><span>Email</span>
<input class="contact" type="text" name="cfee" id="cfee" value="" required  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"/></p>
            <p><span>address</span>
<input class="contact" type="text" name="address" id="address" value="" /></p>


<input class="submit" type="submit" name="insert" value="Insert" /></p>
<input class="submit" type="submit" name="update" value="Update" /></p>
<input class="submit" type="submit" name="delete" value="Delete" /></p>
          </div>
        </form>
       

	<table id="table">
	
  		<tr>
    		<th id="th1">Lecturer ID</th>
    		<th id="th1">Name</th>
    		<th id="th1">Password</th>
		<th id="th1">Subject</th>
		<th id="th1">Email</th>
	        <th id="th1">address</th>
		</tr>
<?php
    //Create Connection with MySQL Database
    $con = mysqli_connect('localhost','root','');



    //Select Database
    if(!mysqli_select_db($con,'cirp'))
    {
        echo "Database Not Selected";
    }
    //Select Query
	
    $sql = "SELECT lecturer_ID,name,password,subject,email,address FROM lecturer";


    //Execute the SQL query
    $records = mysqli_query($con,$sql);

    while($row = mysqli_fetch_array($records))
    {
        echo "<tr>";
        echo "<td>".$row['lecturer_ID']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['password']."</td>";
	echo "<td>".$row['subject']."</td>";
	echo "<td>".$row['email']."</td>";
	echo "<td>".$row['address']."</td>";
   }
?>
	


</table>
        <script> 
            
            // get selected row
            // display selected row data in text input
            
            var table = document.getElementById("table"),rIndex;
            
            for(var i = 1; i < table.rows.length; i++)
            {
                table.rows[i].onclick = function()
                {
                    rIndex = this.rowIndex;
                    console.log(rIndex);
                    
                    document.getElementById("subject").value = this.cells[0].innerHTML;
                    document.getElementById("ekey").value = this.cells[1].innerHTML;
                    
		    document.getElementById("pw").value = this.cells[2].innerHTML;
                    
                    document.getElementById("ccategoryid").value = this.cells[3].innerHTML;                
		    
		    document.getElementById("cfee").value = this.cells[4].innerHTML;
                    document.getElementById("address").value = this.cells[5].innerHTML;
                    
		};
            }
            
            
          
            
        </script>


      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; ADMIN | SLIIT | BATCH4 | GRADING SYSTEM
    </div>
  </div>
</body>
</html>

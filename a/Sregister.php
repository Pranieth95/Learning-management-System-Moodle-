<?php
session_start();
echo "<div style ='color:#ff0000'>Welcome "."".$_SESSION["uname"];



?>
<a href="homelogin.php"> Logout </a>
<?php include 'databaseh.php'; ?>
<?php //add
if(isset($_POST['submit']))
{
	//get the post variables
		$ragno  = $_POST['ragno'];
		$name = $_POST['Name'];
		$dob = $_POST['dob'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$psw = $_POST['psw'];
		$ccatogoryid = $_POST['ccatogoryid'];
		
$query = "INSERT INTO `student`( regno, pw, name, email, address, dob, ccategoryid )
VALUES('$ragno','$psw', '$name','$email','$address', '$dob', '$ccatogoryid')";
		
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
		
		$query1 = "SELECT * FROM `marksenroll` where ccategoryid = '$ccatogoryid'";
$result1 = $mysqli->query($query1)
 or die($mysqli->error.__LINE__);
 
 $total = 0;
		
	while($row = mysqli_fetch_array($result1)){
	$subject = $row['subject'];
	$cost =  $row['cfee'];
		
		$query2 = "INSERT INTO `marks`( regno, subject )
VALUES('$ragno','$subject')";
		
		$result2 = $mysqli->query($query2) or die($mysqli->error.__LINE__);
		
		$total = $total + $cost;
			
}	
	$query3 = "UPDATE student SET totamount = '$total' where regno='$ragno'";;
		
		$result3 = $mysqli->query($query3) or die($mysqli->error.__LINE__);							   
}

if(isset($_POST['update']))
{

		$ragno  = $_POST['ragno'];
		$name = $_POST['Name'];
		$dob = $_POST['dob'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$psw = $_POST['psw'];
		$ccatogoryid = $_POST['ccatogoryid'];

	//Question query
$query = "UPDATE student SET regno = '$ragno',pw = '$psw', name = '$name', email = '$email', address = '$address', dob = '$dob' where regno = '$ragno'";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);		   
}



//delete

if(isset($_POST['delete']))
{
		//get the post variables
		$regno  = $_POST['ragno'];
		$ccatogoryid  = $_POST['ccatogoryid'];

	//Question query

	$query = "DELETE FROM student WHERE regno='$regno'";
		
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
								   
								   		
		$query1 = "SELECT * FROM `marksenroll` where ccategoryid = '$ccatogoryid'";
$result1 = $mysqli->query($query1)
 or die($mysqli->error.__LINE__);
 
 $total = 0;
		
	while($row = mysqli_fetch_array($result1)){
				
		$query2 = "DELETE FROM marks WHERE regno='$regno'";
		
		$result2 = $mysqli->query($query2) or die($mysqli->error.__LINE__);

}
}
//


$query1 = "SELECT * FROM `student`";
$result1 = $mysqli->query($query1)
 or die($mysqli->error.__LINE__);


	?>
<!DOCTYPE html>
<html>

<head>
  <title>colour_blue - another page</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="styleb/style.css" title="style" />
  <style>
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #1293EE;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {background-color: #29415D;}

/* Extra styles for the cancel button */
.signupbtn {
    padding: 14px 20px;
    background-color: #025587;
}

/* Float cancel and signup buttons and add an equal width */
.update,.signupbtn,.delete {float:left;width:33%}

.update {
    padding: 14px 20px;
    background-color: #4682B4;
}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}


/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}



</style>
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
          <li><a href="admin.php">Home</a></li>
          <li class="selected"><a href="Sregister.php">Student Registration</a></li>
          <li><a href="Lregister.php">Lecture registration</a></li>
          <li><a href="courses.php">Courses</a></li>
          <li><a href="">Notices</a></li>
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
        

        
         <form class="modal-content animate" action="Sregister.php" method="post">
    <div class="container">
    	
    	
    	
    	<label><b>Regno</b></label>
      <input type="text" placeholder="Enter Registration number" name="ragno" id="regno" required  pattern="(DF|DC|DD)+.{6}$" title="Insert format with DFxxxxxx or DCxxxxxx or DD123456">
      
      <label><b>Name</b></label>
      <input type="text" placeholder="Enter Name" name="Name" id="name" required>
      
      <label><b>Address</b></label>
      <input type="text" placeholder="Enter address" name="address" id="address" required>
      
       <label><b>Date of birth</b></label>
      <input type="date" placeholder="0000-00-00" name="dob" id="dob" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"> <br>
    	
      <label><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" id="email" required  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">

      <label><b>Password</b></label>
      <input type="text" placeholder="Enter Password" name="psw"  id="password" required >

      <label><b>Repeat Password</b></label>
      <input type="text" placeholder="Repeat Password" name="psw-repeat" id="confirm_password" required>
      
      <label><b>Course Catogory ID</b></label>
      <input type="number" placeholder="Enter Course catogory ID" id="ccatogoryid" name="ccatogoryid" required>
      
      
      
      <div class="clearfix">
       
        <button type="submit" name="submit" class="signupbtn">Add Student</button>
         <button type="submit" name="update" class="update">Update</button>
          <button type="submit" name="delete" class="delete">Delete</button>
      </div>
      
      <script>
      var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
      
      
 </script>
      
    </div>
  </form>
        
        
        <form>
        	
	<table id="table">
  <tr id="tr2">
    <th id="th2">Registration No</th>
    <th id="th2">Name</th>
    <th id="th2">Address</th>
    <th id="th2">Date of birth</th>
    <th id="th2">Email</th>
    <th id="th2">Pasword</th>
    <th id="th2">Course Catogory ID</th>
    <th id="th2">Total Amount</th>
  </tr >

<?php 
while($row = mysqli_fetch_array($result1)){
	echo"<tr><td>{$row['regno']}</td><td>{$row['name']}</td><td>{$row['address']}</td><td>{$row['dob']}</td><td>{$row['email']}</td><td>{$row['pw']}</td><td>{$row['ccategoryid']}</td><td>{$row['totamount']}</td></tr>";
	
}

?>

 
</table>
        </form>
      
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
                    document.getElementById("regno").value = this.cells[0].innerHTML;
                    
                    document.getElementById("name").value = this.cells[1].innerHTML;
          
                    document.getElementById("address").value = this.cells[2].innerHTML;   
                    
                    document.getElementById("dob").value = this.cells[3].innerHTML;             
		    
		            document.getElementById("email").value = this.cells[4].innerHTML;
		            
		            document.getElementById("password").value = this.cells[5].innerHTML;
                    
		            document.getElementById("confirm_password").value = this.cells[5].innerHTML;
                    
                    document.getElementById("ccatogoryid").value = this.cells[6].innerHTML;                
                    
                    
		};
            }
            
            
          
            
        </script>
      
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; Hasi| SLLIT | ITP |Group 4
    </div>
  </div>
</body>
</html>

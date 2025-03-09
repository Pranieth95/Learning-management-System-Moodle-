<?php include 'databaseh.php'; ?>

<?php
session_start();
?>
<?php
echo 'welcome '.$_SESSION['username'];

echo '<br><a href = "../a/homelogin.php?action=logout">Log out <a/>';


if(isset($_GET['link']))
{$_SESSION['link'] = $_GET['link'];}

echo $_SESSION['link'];

$subject = $_SESSION['link'];


	

//add
if(isset($_POST['submit']))
{
	//get the post variables
		$quizeid  = $_POST['quizeid'];
		$quizname = $_POST['qname'];
		
		$no_easy = $_POST['easy'];
		$points_easy = $_POST['epoints'];
		$no_medium = $_POST['medium'];
		$points_medium = $_POST['mpoints'];
		$no_hard = $_POST['hard'];
		$points_hard = $_POST['hpoints'];
		$enrolment_key = $_POST['ekey'];
		$time = $_POST['time'];
		$percentagefm = $_POST['percentage'];
		
		$tot_quizes =  $no_easy + $no_medium  + $no_hard;
		
		$totalmarks = ($no_easy*$points_easy)+ ($no_medium*$points_medium) + ($no_hard*$points_hard);

	//Question query
$query = "INSERT INTO `quize_info`( quizename, total_questions, no_easy, points_easy, no_medium, points_medium, no_hard, points_hard, totalmarks, enrolment_key, subject,time,percentagefm )
VALUES('$quizname','$tot_quizes','$no_easy','$points_easy','$no_medium','$points_medium','$no_hard','$points_hard','$totalmarks','$enrolment_key','$subject', $time, $percentagefm)";
		
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
		
									   
}	

//update
if(isset($_POST['update']))
{

		//get the post variables
		$quizeid  = $_POST['quizeid'];
		$quizname = $_POST['qname'];	
		$no_easy = $_POST['easy'];
		$points_easy = $_POST['epoints'];
		$no_medium = $_POST['medium'];
		$points_medium = $_POST['mpoints'];
		$no_hard = $_POST['hard'];
		$points_hard = $_POST['hpoints'];
		$time = $_POST['time'];
		$percentagefm = $_POST['percentage'];
		
		$enrolment_key = $_POST['ekey'];
		
		$tot_quizes = $no_easy + $no_medium  + $no_hard;
		
		$totalmarks = ($no_easy*$points_easy)+ ($no_medium*$points_medium) + ($no_hard*$points_hard);

	//Question query
$query = "UPDATE quize_info SET quizename = '$quizname',total_questions = '$tot_quizes', no_easy = '$no_easy',points_easy = '$points_easy',no_medium = '$no_medium',points_medium = '$points_medium', no_hard = '$no_hard', points_hard = '$points_hard',totalmarks = '$totalmarks',enrolment_key = '$enrolment_key', time = '$time', percentagefm = '$percentagefm'  where quizeid='$quizeid'";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
		
						   
}

//delete

if(isset($_POST['delete']))
{

		//get the post variables
		$quizeid  = $_POST['quizeid'];


	//Question query

	$query = "DELETE FROM quize_info WHERE quizeid='$quizeid'";

		
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
		
							   
}
//next

if(isset($_POST['next']))
{ 
		//get the post variables
		$quizeid  = $_POST['quizeid'];

$_SESSION['quizeid'] = $quizeid ;
	
	if ($_SESSION['quizeid'] == '')
  {
    echo 'Select the questionier you created';
  }	
    else
    {
	header('Location: quize.php'); 
   }					   

}





$query = "SELECT * FROM `quize_info` where subject = '$subject'";
$result = $mysqli->query($query)
 or die($mysqli->error.__LINE__);
$res  = $mysqli->query($query) or die($mysqli->error.__LINE__);
							
?>
<!DOCTYPE html>
<html>

<head>
  <title>colour_blue - another page</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="styleh.css" title="style" />
  
  <style>
  
  	table {
    border-collapse: collapse;
    width: 100%;
}


#td1{

    height: 50px;
    vertical-align: bottom;

}

.button{
	 background-color:#025587 ;
    border: none;
    color: white;
    padding: 8px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    margin: 4px 2px;
    cursor: pointer;
  
	
}

.button:hover {background-color: #29415D;}

#table1 {
    border-collapse: collapse;
    width: 100%;
}

#th2, #td3 {
    text-align: left;
    padding: 8px;
}

#tr2:nth-child(even){background-color: #f2f2f2}

#th2 {
    background-color: #025587;
    color: white;
}


            table tr:not(:first-child){
                cursor: pointer;transition: all .25s ease-in-out;
            }
            table tr:not(:first-child):hover{background-color: #ddd;}
</style>

  </style>
  
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
        <!-->  <h1><a href="index.html"><span class="logo_colour"></span></a></h1> <-->
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
        
        <form method="post" action="QuizeInfo.php">
	<table>
		<tr>
		<td id="td1">Quiz ID:</td>
		<td id="td1"><input  type="number" name="quizeid" id="quizeid" readonly/></td>
		</tr>

		<tr>
		<td id="td1">Quiz name:</td>
		<td id="td1"><input  type="text" name="qname" id="qname" required /></td>
		</tr>
		
		<tr>
		<td id="td1">No of easy qestions:</td>
		<td id="td1"><input type="number" name="easy" id="easy"/></td>
		<td id="td1">Points per quiz:</td>
		<td id="td1"><input  type="number" name="epoints" id="epoints" required/></td>
		</tr>
		
		<tr>
		<td id="td1">No of medium questions:</td>
		<td id="td1"><input type="number" name="medium" id="medium" required/></td>
		<td id="td1">Points per quize:</td>
		<td id="td1"><input  type="number" name="mpoints" id="mpoints" required/></td>
		</tr>
		
		<tr>
		<td id="td1">No of Hard questions:</td>
		<td id="td1"><input type="number" name="hard" id="hard" required/></td>
		<td id="td1">Points per quize:</td>
		<td id="td1"><input  type="number" name="hpoints" id="hpoints" required/></td>
		</tr>
		</tr>
		
		
		<tr>
		<td id="td1">Enrollment key:</td>
		<td id="td1"><input type="text" name="ekey" id="ekey" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 5 or more characters" required/></td>
		</tr>

		<tr>
		<td id="td1">Time:</td>
		<td id="td1"><input  type="number" name="time" id="time" /></td>
		</tr>
		
		<tr>
		<td id="td1">Percentage for final mark:</td>
		<td id="td1"><input  type="number" name="percentage" id="percentage" /></td>
		</tr>
		
		
		<tr>
		<td>
		
		</td>
		</tr>

		<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>
			
		<input type="submit"  name="submit" class="button" value="ADD">
		</td>
		<td >
		<input type="submit" name="update"  class="button" value="UPDATE">
		</td>
	<td >	
		<input type="submit"  name="delete" class="button" value="REMOVE">
		</td>
		<td >	
		<input type="submit"  name="next" class="button" value="NEXT">
		</td>
		</tr>

	</table>
	</form>
	
				
<script>
var myInput = document.getElementById("ekey");


// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 4) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
	
	
	<br>
	<br>
	<br>

	 <form >
	<table id="table">
  <tr id="tr2">
    <th id="th2">Quize ID</th>
    <th id="th2">Quize Name</th>
    <th id="th2">Easy questions</th>
     <th id="th2">Points per Easy</th>
    <th id="th2">Medium questions</th>
    <th id="th2">Points per medium</th>
     <th id="th2">Hard questions</th>
    <th id="th2">Points per hard </th>
      <th id="th2">Enrolment Key</th>
    <th id="th2">Time</th>
    <th id="th2">Percentage</th>
    
  </tr >
<tr>
<?php 
while($row = mysqli_fetch_array($result)){
	echo"<tr><td>{$row['quizeid']}</td><td>{$row['quizename']}</td><td>{$row['no_easy']}</td><td>{$row['points_easy']}</td><td>{$row['no_medium']}</td><td>{$row['points_medium']}</td><td>{$row['no_hard']}</td><td>{$row['points_hard']}</td><td>{$row['enrolment_key']}</td><td>{$row['time']}</td><td>{$row['percentagefm']}</td></tr>";
	
}

?>

  </tr>

  
</table>

	<table id="table">
  <tr id="tr2">
    <th id="th2">Quize ID</th>
    <th id="th2">Total questions</th>
    <th id="th2">Totalmarks</th>
    <th id="th2">Subject</th>
  </tr >
<tr>
<?php 
while($row = mysqli_fetch_array($res)){
	echo"<tr><td>{$row['quizeid']}</td><td>{$row['total_questions']}</td><td>{$row['totalmarks']}</td><td>{$row['subject']}</td></tr>";
	
}

?>

  </tr>
  

  
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
                    document.getElementById("quizeid").value = this.cells[0].innerHTML;
                    
                    document.getElementById("qname").value = this.cells[1].innerHTML;
          
                    document.getElementById("easy").value = this.cells[2].innerHTML;                
		    
		            document.getElementById("epoints").value = this.cells[3].innerHTML;
		            
		            document.getElementById("medium").value = this.cells[4].innerHTML;
                    
		            document.getElementById("mpoints").value = this.cells[5].innerHTML;
                    
                    document.getElementById("hard").value = this.cells[6].innerHTML;                
		    
		    		document.getElementById("hpoints").value = this.cells[7].innerHTML;
                    
                    document.getElementById("ekey").value = this.cells[8].innerHTML;                
		    
		            document.getElementById("time").value = this.cells[9].innerHTML;
		            
		            document.getElementById("percentage").value = this.cells[10].innerHTML;
		            
                    
                    
		};
            }
            
            
          
            
        </script>
	
	
	
	
	<br> <br>
	<br> <br>
	<br> <br>
     
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; Hasi| SLLIT | ITP |Group 4
    </div>
  </div>
</body>
</html>


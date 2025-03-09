<?php include 'databaseh.php'; ?>

<?php
session_start();

echo 'welcome '.$_SESSION['username'];

$username = $_SESSION['username'];

echo '<br><a href = "../a/student.php?action=logout">Log out<a/>';


if(isset($_GET['link']))
{$_SESSION['link'] = $_GET['link'];}

echo ' <br>'.$_SESSION['link'];

$subject = $_SESSION['link'];

//questions array
$questionsArray = $_SESSION['questions'];

//Build the questions array from query result
$questions = array();
foreach($questionsArray as $question) {
    $questions[$question['no']] = $question['Question'];
 }

//correct answer array
$temp = $_SESSION['correct_answer'];

//given response array
$response = $_POST['response'];



//questioneir details

echo '<br>'.$_SESSION['qid'].'<br>';

$qid = $_SESSION['qid'];

$query1 = "select * from quize_info where quizeid = $qid ";
$query2 = $mysqli->query($query1) or die($mysqli->error.__LINE__);

while($row = mysqli_fetch_array($query2)){
	$pointsEasy = $row['points_easy'];
	$pointsMedium = $row['points_medium'];
	$pointsHard = $row['points_hard']; 
	$totalMarks = $row['totalmarks']; 
	
}

//marking

$total=0;

  foreach($response as $key => $value){
	
	//selecting the type

$query3 = "select * from questions where no = $key ";
$query4 = $mysqli->query($query3) or die($mysqli->error.__LINE__);

	while($row = mysqli_fetch_array($query4)){
	$type = $row['type'];
}


	if($type == "Easy")
	{
	$points = $pointsEasy;
	}
	else if($type == "Medium")
	{
	$points = $pointsMedium;
	}
	else if($type == "Hard")
	{
	$points = $pointsHard;
	}


      if($temp[$key] == $value){
      	$total = $total + $points;
	 
		}
           
  }
  
  echo $total;
  
  //calculate percentage for final marks
  
  $query5 = "select * FROM quize_info WHERE quizeid='$qid'";
$query6 = $mysqli->query($query5) or die($mysqli->error.__LINE__);

while($row = mysqli_fetch_array($query6)){
	$percentagefm = $row['percentagefm'];
}
  
  $percentagefinalm = round(($total/$totalMarks)*$percentagefm,2);
  
  $querypfm = "UPDATE marks SET ass2 = '$percentagefinalm ' where regno = '$username' and subject = '$subject'";
  $resultpfm = $mysqli->query($querypfm) or die($mysqli->error.__LINE__);
  
  echo "$percentagefinalm";
  
  $persentage = round(($total/$totalMarks)*100,2);
  
  
  if( $persentage>75)
  {
  	$grade = "A";
  }
else if($persentage>65)
  {
  	$grade = "B";
  }
  else if($persentage>45)
  {
  	$grade = "C";
  }
  else {
      $grade = "D";
  }
  
  $query = "INSERT INTO `report`( Quize_id, subject, student_id, marks, persentage, grade)
VALUES('$qid','$subject','$username','$total','$persentage','$grade')";
		
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);



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
h3{
    font-family:Georgia;
    color:#618685
}

h4{
    font-family:Georgia;
    color:  #36486b;
}


table {
    border-collapse: collapse;
    width: 40%;
}

tr, td {
    text-align: left;
    padding: 8px;
}
td:nth-child(even){background-color: #80ced6}
td {
    background-color:  #618685 ;
    color: white;
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
      </div>
    </div>
    
    
    <div id="content_header"></div>
    
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
       
      </div>
      <div id="content">
       <table>
       	
       <tr><td>Your Marks </td> <td> <?php echo $total ?> </td><tr>
       <tr><td>Percentage </td> <td> <?php echo $persentage ?> </td><tr>
       <tr><td>Grade </td> <td> <?php echo $grade ?> </td><tr>
       	
    	</table>
     
     <br>
     <br>
     <br>
     
      <?php
      
    foreach($questions as $id => $question) {
    		  	
        echo "<div class=\"form-group\">";
        echo "<h3> $question</h3>";//display the question

       $queryx = "SELECT * FROM `questions` where no = $id";
 	$resultx = $mysqli->query($queryx) ;
	
while($row = mysqli_fetch_array($resultx)){
	$correct_answer =  $row['correct_answer'];
	$description = $row['description'];
	
	 echo "<h4> $correct_answer</h4>" . "<br>";
 echo "<h4> $description</h4>";
	
}

echo "<br>";
echo "<br>";
echo "<br>";
	}        ?>

  
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; Hasi| SLLIT | ITP |Group 4
    </div>
  </div>
</body>
</html>

<?php include 'databaseh.php';?>

<?php
session_start();

echo 'welcome '.$_SESSION['username'];

echo '<br><a href = "../a/student.php?action=logout">Log out<a/>';


if(isset($_GET['link']))
{$_SESSION['link'] = $_GET['link'];}

echo ' welcome '.$_SESSION['link'];

$subject = $_SESSION['link'];

//get total number of questions

$qid = $_SESSION['qid'];


	$query = "SELECT * FROM `quize_info` where quizeid = '$qid'";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	
	$query1 = "SELECT * FROM `quize_info` where quizeid = '$qid'";
    $result1 = $mysqli->query($query1) or die($mysqli->error.__LINE__);
	
	$query2 = "SELECT * FROM `quize_info` where quizeid = '$qid'";
    $result2 = $mysqli->query($query2) or die($mysqli->error.__LINE__);

 ?>



<!DOCTYPE html>
<html>

<head>
  <title>colour_blue - another page</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="styleh.css" title="style" />
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
     
			
						<h2><?php while($row = mysqli_fetch_array($result)){
	echo" {$row['quizename']}";	
}; ?></h2>
	<p>This is multiple choice quize</p>
	<ul>
		<li><strong>Number of questions: </strong><?php while($row = mysqli_fetch_array($result1)){
	echo" {$row['total_questions']}";
	$tot = $row['total_questions'];
	$_SESSION['totalq'] = $tot;
}?></li>
		<li><strong>Estimated Time: </strong><?php while($row = mysqli_fetch_array($result2)){
	echo" {$row['time']}";
	$time = $row['time'];
	$_SESSION['time'] = $time;
}?></li>
		</ul>
		<a href="display_questions.php" class="start">Start Quize</a>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; Hasi| SLLIT | ITP |Group 4
    </div>
  </div>
</body>
</html>

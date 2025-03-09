<?php include 'databaseh.php'; ?>

<?php
session_start();

echo 'welcome '.$_SESSION['username'];

echo '<br><a href = "Slogin.php?action=logout">Log out<a/>';


if(isset($_GET['link']))
{$_SESSION['link'] = $_GET['link'];}

echo ' welcome '.$_SESSION['link'];

$subject = $_SESSION['link'];

//get total number of questions

$qid = $_SESSION['qid'];

 $_SESSION['last_time'] = time();

$time =   $_SESSION['time'];

//Connect to Db and fetch questions
//require_once('includes database.php');

//Create a query to fetch all the questions
$query = "select * from questions where Quize_id = $qid";

//Run the query
$query_result = $mysqli->query($query) or die($mysqli->error.__LINE__);

//Count the number of returned items from the database
$num_questions_returned = $query_result->num_rows;

if ($num_questions_returned < 1){
    echo "There is no question in the database";
    exit();}

//Create an array to hold all the returned questions
$questionsArray = array();

//Add all the questions from the result to the questions array
while ($row = $query_result->fetch_assoc()){
    $questionsArray[] = $row;
}

//Create an array of Correct answers
$correctAnswerArray = array();
foreach($questionsArray as  $question){
    $correctAnswerArray[$question['Question_no']] = $question['correct_answer'];
}


//Build the questions array from query result
$questions = array();
foreach($questionsArray as $question) {
    $questions[$question['Question_no']] = $question['Question'];
 }


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


h4{
	color: #29415D;;
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
      <script type="text/javascript">
   
 function countDown(secs,elem)
    
{
        var element = document.getElementById(elem);
       
 element.innerHTML = "<h2>Time : <b>"+secs+"</b> </h2>";
        
if(secs < 1)
{
        clearTimeout(timer);

        console.log(document.getElementById('myquiz'))
        document.getElementById('myquiz').submit();
  
      }
        
secs--;
       
 var timer = setTimeout ('countDown('+secs+',"'+elem+'")',1000);
    }
    






<?php

    //Create Connection with MySQL Database
    $con = mysqli_connect('localhost','root','');



    //Select Database
    if(!mysqli_select_db($con,'itp'))
    {
        echo "Database Not Selected";
    }
	
    
$q1="SELECT time FROM quize_info WHERE quizeid='{$_SESSION['qid']}'";

    //Execute the SQL query
    $records = mysqli_query($con,$q1);
    while($row = mysqli_fetch_array($records))
    {
        
        $time=$row['time'];

}
?>

function validate() { return true; }
</script> 
<div id="status"></div>
<script type="text/javascript">countDown(<?php echo(json_encode($time)); ?>,"status");
</script>
      </div>
      <div id="content">
        <!-- insert the page content here -->
      
      <!-- //Display result-->
    <?php /*
       if ($rightAnswer > 0){ ?>
           <h2><span class="label label-success">You have <?php  echo $rightAnswer; ?> correct answers</span></h2>
           <?php }
        if ($wrongAnswer > 0) { ?>
           <h2><span class="label label-danger">You have <?php echo $wrongAnswer; ?> wrong answers</span></h2>
           <?php
        }
		
		
   */ ?>

<?php
$_SESSION['rAnswer']=4;
?>





<!--Display form-->
<form name="quiz" id="myquiz" onsubmit="return validate()" method="post" action="result.php"  >

   </script>

    <?php
    foreach($questions as $id => $question) {
        echo "<div class=\"form-group\">";
        echo "<h4> $question</h4>"."<ol>";//display the question

        //Display multiple choices
        $randomChoices = $choices[$id];
        //$randomChoices = shuffle_assoc($randomChoices);
        foreach ($randomChoices as $key => $values){
            echo '<li><input type="radio" name="response['.$id.'] id="'.$id.'" value="' .$values.'"/>';
        ?>
            <label for="question-<?php echo($id); ?>"><?php echo($values);?></label></li>
    <?php

        }
            echo("</ul>");
            echo("</div>");
        }
       ?>

    
</form>

      
      
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; Hasi| SLLIT | ITP |Group 4
    </div>
  </div>
</body>
</html>




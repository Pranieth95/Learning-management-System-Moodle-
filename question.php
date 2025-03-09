<?php include 'database.php'; ?>

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


//Build the choices array from query result
$choices = array();
foreach ($questionsArray as $row) {
    $choices[$row['Question_no']] = array($row['choice1'], $row['choice2'], $row['choice3'], $row['choice4']);
  }
















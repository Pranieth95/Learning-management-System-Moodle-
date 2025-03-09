<?php include 'databaseh.php'; ?>
<?php
session_start();
?>
<?php
	

echo 'welcome '.$_SESSION['username'];

echo '<br><a href = "../a/homelogin.php?action=logout">Log out <a/>';

	echo $_SESSION['quizeid'];
	
$quizeId = $_SESSION['quizeid'] ;

if(isset($_GET['link']))
{$_SESSION['link'] = $_GET['link'];}

echo $_SESSION['link'];

$subject = $_SESSION['link'];

//add
if(isset($_POST['add']))
{
	
	
	//get the post variables
		$no = $_POST['no'];
		$question_text = $_POST['question_text'];
	    $correct_choice = $_POST['correct_choice'];
		$type = $_POST['type'];
		$desc = $_POST['desc'];	
	$choice1 = $_POST['choice1'];
	$choice2 = $_POST['choice2'];
	$choice3 = $_POST['choice3'];
	$choice4 = $_POST['choice4'];
	$choice5 = $_POST['choice5'];
	
	if($correct_choice == 1)
	{
		$correct_ans = $choice1;
	}
	elseif ($correct_choice == 2) {
		$correct_ans = $choice2;
	}
	elseif ($correct_choice == 3) {
		$correct_ans = $choice3;
	}
	elseif ($correct_choice  == 4) {
		$correct_ans = $choice4;
	}
	elseif ($correct_choice == 5) {
		$correct_ans = $choice5;
	}
	

	//Question query
		$query = "INSERT INTO `questions`(no,Quize_id, Question, type, choice1, choice2, choice3, choice4, choice5, correct_answer, description, subject)
					VALUES('$no', '$quizeId','$question_text','$type','$choice1', '$choice2', '$choice3', '$choice4', '$choice5', '$correct_ans','$desc', '$subject' )";
				   
				   //Run query
				$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

}

//update
if(isset($_POST['update']))
{
    //get the post variables
		$no = $_POST['no'];
		$question_text = $_POST['question_text'];
	    $correct_choice = $_POST['correct_choice'];
		$type = $_POST['type'];
		$desc = $_POST['desc'];	
	$choice1 = $_POST['choice1'];
	$choice2 = $_POST['choice2'];
	$choice3 = $_POST['choice3'];
	$choice4 = $_POST['choice4'];
	$choice5 = $_POST['choice5'];
	
	if($correct_choice == 1)
	{
		$correct_ans = $choice1;
	}
	elseif ($correct_choice == 2) {
		$correct_ans = $choice2;
	}
	elseif ($correct_choice == 3) {
		$correct_ans = $choice3;
	}
	elseif ($correct_choice  == 4) {
		$correct_ans = $choice4;
	}
	elseif ($correct_choice == 5) {
		$correct_ans = $choice5;
	}
	
		
	//Question query
$query = "UPDATE questions SET  Question = '$question_text', type = '$type', choice1 = '$choice1', choice2 = '$choice2',choice3 = '$choice3', choice4 = '$choice4', choice5 = '$choice5', correct_answer = '$correct_ans', description = '$desc'  where no='$no'";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
		
						   
}

//delete

if(isset($_POST['delete']))
{

		//get the post variables
		$no = $_POST['no'];


	//Question query

	$query = "DELETE FROM questions WHERE no ='$no'";		
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
		
							   
}



if(isset($_GET['logout'])){
	session_unregister('username');
	
}





		$query = "SELECT * FROM `questions` where subject = '$subject'";
        $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
		$res = $mysqli->query($query) or die($mysqli->error.__LINE__);
		
		$total = $result->num_rows;
		$next = $total+1;
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
  
  #content1
{ text-align: left;
  width: 550px;
  padding: 0;}

  	
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

datalist { 
    display: none;
}

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
            
            
a#link1:link, a#link1:visited {
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


a#link1:hover, a#link1:active {
   background-color: #29415D;
}


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
      <div id="content1">
        <!-- insert the page content here -->
      
      <form  method="post" action="quize.php">
	<table >
		
			<tr>
				<td id="td1"> <label>No</label> </td>
		       <td id="td1"> <input type="number" id="no"  name="no" readonly/></td>
							
							</tr>
							
		<tr  >
		<td td id="td1">Qyestion:</td>
		<td td id="td1"><input id="question_text" type="text" name="question_text" required/></td>
		</tr>
		
		<tr  >
		<td td id="td1">Answer 1:</td>
		<td td id="td1"><input id="choice1" type="text" name="choice1" required/></td>
		</tr>
		
		<tr  >
		<td td id="td1">Answer 2:</td>
		<td td id="td1"><input id="choice2" type="text" name="choice2" required/></td>
		</tr>
		
		<tr  >
		<td td id="td1">Answer 3:</td>
		<td td id="td1"><input id="choice3" type="text" name="choice3" /></td>
		</tr>
		
		<tr  >
		<td td id="td1">Answer 4:</td>
		<td td id="td1"><input id="choice4" type="text" name="choice4" /></td>
		</tr>
		
		<tr  >
		<td td id="td1">Answer 5:</td>
		<td td id="td1"><input id="choice5" type="text" name="choice5" /></td>
		</tr>

		
		<tr>	
		<td id="td1"> <label>correct choice number</label> </td>
	    <td id="td1"> <input type="number" id="correct_choice" name="correct_choice"  pattern=".{1,}" title="1,2,3,4,5" required/> </td>
							</tr>	
		
	
	
	<!-- Depends on the database structure-->
		<tr>
		<td id="td1">Type:</td>
		<td id="td1"><input list="type" id="type" name= "type" required pattern="(Easy|Medium|Hard)$"/>
		<datalist id ="type">
		<option value="Easy">
		<option value="Medium">
		<option value="Hard">
		
		</datalist>	
		</td>
		</td>
		</tr>
		
	
	<tr>
	<td id="td1">Description:</td>
	<td td id="td1"><input id="desc" type="text" name="desc" required/></td>
	</tr>

     <tr>
     	<td id="td1"></td>
     	<td id="td1">
     	<input type="submit" class="button" name="add" value="ADD">
		<input type="submit" class="button" name="update" value="UPDATE">
		<input type="submit" class="button" name="delete" value="REMOVE">
     	<a href="Lmenu.php"  id="link1" data-hover="Desultory" >Done</a></td>
     </tr>

	

</table>
	</form>	
	
	<script>
var myInput = document.getElementById("correct_choice");


// When the user starts to type something inside the password field
myInput.onkeyup = function() {


  // Validate numbers
  var numbers = /[1-5]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.add("valid");
  } else {
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 1) {
    length.classList.add("valid");
  } else {
    length.classList.add("invalid");
  }
}
</script>
	
	<br>
	<br>
	<br>

	 <form>
	<table id="table">
  <tr id="tr2">
    <th id="th2">No</th>

     <th id="th2">Quize ID</th>
    <th id="th2">Question</th>   
    <th id="th2">choice1</th>
     <th id="th2">choice2</th>
     <th id="th2">choice3</th>
     <th id="th2">choice4</th>
     <th id="th2">choice5</th>
    <th id="th2">Correct answer</th>
       <th id="th2">type</th>
    <th id="th2">description</th>

    
  <?php 
while($row = mysqli_fetch_array($result)){
	echo"<tr><td>{$row['no']}</td><td>{$row['Quize_id']}</td><td>{$row['Question']}</td><td>{$row['choice1']}</td><td>{$row['choice2']}</td><td>{$row['choice3']}</td><td>{$row['choice4']}</td><td>{$row['choice5']}</td><td>{$row['correct_answer']}</td><td>{$row['type']}</td><td>{$row['description']}</td></tr>";
	
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
                    document.getElementById("no").value = this.cells[0].innerHTML;
          
                    document.getElementById("question_text").value = this.cells[2].innerHTML;                
		    
		            document.getElementById("choice1").value = this.cells[3].innerHTML;
		            
		            document.getElementById("choice2").value = this.cells[4].innerHTML;
                    
		            document.getElementById("choice3").value = this.cells[5].innerHTML;
                    
                    document.getElementById("choice4").value = this.cells[6].innerHTML;                
		    
		    		document.getElementById("choice5").value = this.cells[7].innerHTML;
		    		
		    		document.getElementById("correct_choice").value = this.cells[8].innerHTML;
                    
                    document.getElementById("type").value = this.cells[9].innerHTML;                
		    
		            document.getElementById("desc").value = this.cells[10].innerHTML;
		            
                    
                    
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

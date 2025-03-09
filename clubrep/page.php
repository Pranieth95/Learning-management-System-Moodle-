<!DOCTYPE HTML>
<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cirp"; 
	$error = "Cannot connect to database, Please try again later...";
	
	$conn = mysqli_connect($hostname,$username,$password) or die ($error);
	mysqli_select_db($conn,$dbname) or die ($error);
?>
<html>

<head>
  <title>colour_blue - a page</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
  
  <style>
			.today{
				background: #8cff8c;
				border: 0;
				
			}
			.event{
				background-color : #0000ff;
			}
			.calendar {
	position: absolute;
	margin: 50px;
	left: -2px;
	top: 31px;
			}
			
			body {
				line-height: 1;
				margin: 50px;
			}
			#Main {
	background: rgba(0, 0, 0, .1);
	border-radius: 5px;
	box-sizing: border-box;
	padding: 15px;
	width: 937px;
	height: 560px;
	position: absolute;
	left: 312px;
	top: 330px;
			}

			header {
				overflow: clear;
				position: relative;
			}
			h2 {
				font-family: 'PT Sans Narrow', sans-serif;
				font-size: 18px;
				font-weight: 700;
				margin: 0 0 10px;
				text-align: center;
			}
			.Next{
	position: absolute;
	top: 35px;
	left: 882px;
			}
			.Previous{
	position: absolute;
	top: 36px;
	right: 900px;
			}
			
			table {
	background: #fff;
	border-collapse: collapse;
	color: #222;
	font-family: 'PT Sans', sans-serif;
	font-size: 13px;
			}
			
			td {
				border: 1px solid #ccc;
				color: #444;
				line-height: 22px;
				text-align: right;
				vertical-align: bottom;
				padding: 10px;
				width: 120px;
				height: 65px;
			}
			tr:first-child td {
				color: #222;
				font-weight: 700;
				width: 120px;
				height: 50px;
				text-align: center;
			}
			.selected {
				background: #cccccc;
				border: 0;
				box-shadow: 0 2px 6px rgba(0, 0, 0, .5) inset;
			}
			td.plain:hover {
				background-color: #e5e5e5;
			}
			.clicked {
				background: #cccccc;
				border: 0;
				box-shadow: 0 2px 6px rgba(0, 0, 0, .5) inset;
			}	
			.Name{
	display: inline-block;
	margin: auto;
	width: 50%;
	position: absolute;
	left: 239px;
	top: 30px;
			}
			
			.AddEvent{
	position: absolute;
	width: 351px;
	height: 589px;
	left: 1020px;
	top: 174px;
			}
			
			.ClubMemReg{
	position: absolute;
	left: 1018px;
	top: 170px;
	width: 419px;
	height: 199px;
	display:none;
			}
			
			.Choose{
	position: absolute;
	left: 1018px;
	top: 213px;
	width: 419px;
	height: 199px;
	text-align: center;
	display:none;
			}
			
			h3{
font-family: Calibri; 
font-size: 22pt; 
font-style: normal; 
font-weight: bold; 
color:Grey;
text-align: center;  
}

input[type=text], textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}
input[type=date], input[type=email], input[type=tel], select, input[type=number] {
    width: 50%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit], input[type=reset] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

input[type=reset]:hover {
    background-color: #45a049;
}

.Cbutton:hover {
    background-color: #45a049;
}

input[type=button]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
 p.expenses{
	opacity:0.5;
}
.Cbutton, input[type=button]{
	background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	margin: 10px;
}    

.navi{
	position: absolute;
	left: 0px;
	top: 0px;
	width: 100%;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
    border-right:1px solid #bbb;
}

li:last-child {
    border-right: none;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}

.topic {
	position: absolute;
	width: 75%;
	text-align: center;
	top: 71px;
	left: 179px;
}

h1.head { 
	color: #151515; 
	font-family: 'Lato', sans-serif; 
	font-size: 54px; 
	font-weight: 300; 
	line-height: 58px; 
	margin: 0 0 58px; 
	}

		</style>
</head>

<body>

    <?php
			if(isset($_GET['day'])){
				$day = $_GET['day'];
			}else{
				$day = date("j");
			}
			
			if(isset($_GET['month'])){
				$month = $_GET['month'];
			}else{
				$month = date("n");
			}
			
			if(isset($_GET['year'])){
				$year = $_GET['year'];
			}else{			
				$year = date("Y");
			}
			
			//calendar variable
			$currentTimeStamp = strtotime("$year-$month-$day");
			//get current month name
			$monthName = date("F",$currentTimeStamp);
			//get number of days in current month
			$numDays = date("t",$currentTimeStamp);
			//count cellin loop
			$counter = 0;			
		?>
        
        
		<?php
		//Adding Events to the Database
			if(isset($_GET['black'])){
				$title = $_POST['txttitle'];
				$detail = $_POST['txtdetail'];
				
				$eventdate = $month."/".$day."/".$year;
				
				$sqlinsert = "insert into eventcalendar (Title,Details,eventDate,dateAdded) values ('".$title."','".$detail."','".$eventdate."',now())";
			
				$resultinsert = mysqli_query($conn,$sqlinsert);
				if($resultinsert){
					echo "Event was successfully Added...";
				}else{
					echo "Event Failed to be Added...";
				}
				
			}
			
			if(isset($_GET['block'])){
				$title2 = $_POST['ClubEvents'];
				$detail2 = $_POST['ClubDetails'];
				$expenses2 = $_POST['Expenses'];
				
				$eventdate = $month."/".$day."/".$year;
				
				$sqlinsert = "insert into club_event (Title,Details,Expenses,Date) values ('".$title2."','".$detail2."','".$expenses2."','".$eventdate."')";
			
				$resultinsert = mysqli_query($conn,$sqlinsert);
				if($resultinsert){
					echo "Event was successfully Added...";
				}else{
					echo "Event Failed to be Added...";
				}
				
			}
		?>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html">colour<span class="logo_colour">blue</span></a></h1>
          <h2>Simple. Contemporary. Website Template.</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="index.html">Home</a></li>
          <li><a href="examples.html">Examples</a></li>
          <li class="selected"><a href="page.html">A Page</a></li>
          <li><a href="another_page.html">Another Page</a></li>
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      
      <div id="content">
        <!-- insert the page content here -->
        <h1>A Page</h1>
        		<div id="Main">
		  <div class="Name">
    			<h2><?php echo $monthName.", ".$year; ?></h2>
       	  </div>
            <button type="button" class="Previous" name='previousbutton' onclick="goLastMonth(<?php echo $month.",".$year?>)"><</button>
          <button type="button" class="Next" name='nextbutton' onclick="goNextMonth(<?php echo $month.",".$year?>)">></button>
          <table class="calendar">
            <tr>
              <td width='50px'>Sun</td>
              <td width='50px'>Mon</td>
              <td width='50px'>Tue</td>
              <td width='50px'>Wed</td>
              <td width='50px'>Thu</td>
              <td width='50px'>Fri</td>
              <td width='50px'>Sat</td>
            </tr>
            <?php
				echo "<tr>";
				
				for($i = 1; $i < $numDays+1; $i++, $counter++){
					$timeStamp = strtotime("$year-$month-$i");
					if($i == 1){
						$firstDay = date("w", $timeStamp);
						for($j = 0; $j < $firstDay; $j++, $counter++){
							//blank space
							echo "<td>&nbsp;</td>";
							
						}	
					}
					if($counter%7 == 0){
						echo "</tr><tr>";
					}
					$monthstring = $month;
					$monthlength = strlen($monthstring);
					$daystring = $i;
					$daylength = strlen($daystring);
					if($monthlength <= 1){
						$monthstring = "0".$monthstring;
					}
					if($daylength <= 1){
						$daystring = "0".$daystring;
					}
					$todaysDate = date("m/d/Y");
					$dateToCompare = $monthstring.'/'.$daystring.'/'.$year;
					echo "<td align='center'";
					if($todaysDate == $dateToCompare){
						echo "class='today'";
					}else{
						$sqlCount = "select * from eventcalendar where eventDate='".$dateToCompare."'";
						$noOfEvent = mysqli_num_rows(mysqli_query($conn,$sqlCount));
						if($noOfEvent >= 1){
							echo "class='event'";
						}else{
							echo "class='plain'";
						}
					}
					echo "><a href='".$_SERVER['PHP_SELF']."?month=".$monthstring."&day=".$daystring."&year=".$year."&v=true'>".$i."</a></td>";
				}	
				
				echo "</tr>";
				
				//$query = "INSERT INTO monthly-income(Year, Month, totalincome) VALUES ('".$year."', '".$monthName."', SELECT SUM(Income) FROM eventincome WHERE date BETWEEN '".$year."-".$month."-01' AND '".$year."-".$month."-".$numDays."')";
				
				//$query1 = "INSERT INTO `monthly_income`(`Year`, `Month`) VALUES (".$year.", '".$monthName."')";
				//$query2 = "INSERT INTO `monthly_income`(`totalincome`) SELECT SUM(Income) FROM `eventincome` WHERE eventDate BETWEEN '".$year."-".$month."-01' AND '".$year."-".$month."-".$numDays."'";
				
				$query2 = "INSERT INTO `monthly_income`(`totalincome`,`Year`, `Month`) SELECT SUM(Income),".$year." as Year, '".$monthName."' as Month FROM `eventincome` WHERE eventDate BETWEEN '".$year."-".$month."-01' AND '".$year."-".$month."-".$numDays."'";


				
 				mysqli_query($conn, $query2);
				
			?>
          </table>          
  </div>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; colour_blue | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">design from HTML5webtemplates.co.uk</a>
    </div>
  </div>
</body>
</html>

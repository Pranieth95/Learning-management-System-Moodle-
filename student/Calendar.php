<!DOCTYPE html>
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
  <title>Event Calendar</title>
  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-------Template layout ------->
    <meta name="description" content="website description" />
 	<meta name="keywords" content="website keywords, website keywords" />
	<meta http-equiv="content-type" content="text/html; charset=windows-1252" />


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="calendar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    <script type="text/javascript"> 
  		var $j = jQuery.noConflict(); 
	</script> 
  <script>
			function goLastMonth(month, year){
				if(month == 1){
					--year;
					month = 13;
				}
				--month;
				var monthstring = ""+month+"";
				var monthlength = monthstring.length;
				if(monthlength <= 1){
					monthstring = "0"+monthstring;
				}
				document.location.href = "<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
			}
			
			function goNextMonth(month, year){				
				if(month == 12){
					++year;
					month = 0;
				}
				++month;
				var monthstring = ""+month+"";
				var monthlength = monthstring.length;
				if(monthlength <= 1){
					monthstring = "0"+monthstring;
				}
				document.location.href = "<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
			}
			
						
			$(function() {
				
				$('td.plain').click(function() {
					  					
					$(this).addClass('cell');
  					$(this).toggleClass('clicked cell');
  					$('td.plain').not(this).removeClass('clicked cell');
					
					if ($('td.plain').hasClass('clicked')) {
						$j('.ClubMemReg').fadeOut(200);
    					$j('.Choose').fadeIn(200);
  					}else{
						$j('.Choose').fadeOut(200);
						$j('.ClubMemReg').fadeOut(200);
					}	

				});
			});
		
		</script>

  </head>
<body>
<a href='Login1.php?logout'>LogOut</a>
    
<div id="main">
  <div id="header"></div> 
</div>
 <div id="logo"></div>

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
			
			if(isset($_GET['white'])){
				$title2 = $_POST['ClubEvents'];
				$detail2 = $_POST['ClubDetails'];
				$expenses2 = $_POST['Expenses'];
				
				$eventdate = $year."-".$month."-".$day;
				
				$sqlinsert = "insert into club_event (Title,Details,Expenses,Date) values ('".$title2."','".$detail2."','".$expenses2."','".$eventdate."')";
			
				$resultinsert = mysqli_query($conn,$sqlinsert);
				if($resultinsert){
					echo "Event was successfully Added...";
				}else{
					echo "Event Failed to be Added...";
				}
				
			}
		?>
		      
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
					$dateToCompare2 = $year.'-'.$monthstring.'-'.$daystring;
					echo "<td align='center'";
					if($todaysDate == $dateToCompare){
						echo "class='today'";
					}else{
						$sqlCount = "select * from eventcalendar where eventDate='".$dateToCompare."'";
						$noOfEvent = mysqli_num_rows(mysqli_query($conn,$sqlCount));
						
						$sqlclubCount = "SELECT * FROM club_event where Date='".$dateToCompare2."'";
						$noOfclub = mysqli_num_rows(mysqli_query($conn,$sqlclubCount));
						if($noOfEvent >= 1){
							echo "class='event'";
						}elseif($noOfclub >= 1){
							echo "class='eventclub'";
						}else{
							echo "class='plain'";
						}
					}
					echo "><a href='".$_SERVER['PHP_SELF']."?month=".$monthstring."&day=".$daystring."&year=".$year."&v=true'>".$i."</a></td>";
				}	
				
				echo "</tr>";

				
			?>
          </table>          
  </div>
  
  <div class="AddEvent">
		<?php
			if(isset($_GET['v'])){
				//echo "<a href='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$day."&year=".$year."&v=true&f=true'><input type='button' value='Add Event'/></a>";				
				//echo "<a href='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$day."&year=".$year."&v=true&p=true'><input type='button' value='Add Club Event'/></a><br>";		
				
				//if(isset($_GET['f'])){
				//	include("eventform.php");
				//}
				
				//if(isset($_GET['p'])){
				//	include("clubeventform.php");
				//}
				
			
			
				echo "<br><p align='center'><b> Events Scheduled on ".$year."-".$month."-".$day." </b></p> ";
				
				$sqlEvent = "select * from eventcalendar where eventDate='".$month."/".$day."/".$year."'";
				$resultEvents = mysqli_query($conn,$sqlEvent);
				if(mysqli_num_rows($resultEvents) > 0){
				echo "<hr>";
				while($events=mysqli_fetch_array($resultEvents)){
					echo "<b>Title     : ".$events['Title']."<br><br>";
					echo "Details   : </b>".$events['Details']."<br><br>";
					echo "<hr>";
				  }
				}
					
				$sqlclub = "select * from club_event where Date='".$year."-".$month."-".$day."'";
				$resultclub = mysqli_query($conn,$sqlclub);
				if(mysqli_num_rows($resultclub) > 0){
					echo "<hr>";
					while($clubs=mysqli_fetch_array($resultclub)){
						echo "<b>Club Event    : ".$clubs['Title']."<br><br>";
						echo "Details       : </b>".$clubs['Details']."<br><br>";
						echo "<hr>";
					}
					
				}
				
				if((mysqli_num_rows($resultEvents)==0) && (mysqli_num_rows($resultclub)==0))
				{
					echo "<hr>";
					echo "No Events have been scheduled on this day";
				}
			} 
		?>
  </div>
  
 


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


</body>
</html>
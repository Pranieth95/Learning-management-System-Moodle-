<?php
session_start();
echo "<div style ='color:#ff0000'>Welcome "."".$_SESSION["uname"];
$subject=$_SESSION['subject'];
?>

<a href="../a/homelogin.php"> Logout </a>

<?php
$dbhandle = new mysqli('localhost','root','','cirp');
echo $dbhandle->connect_error;

	
$query= "Select * from abc";
$res = $dbhandle->query($query);


?>


<!DOCTYPE HTML>
<html>

<head>
  
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style1.css" title="style" />

<style>
table {
    border-collapse: collapse;
    width: 40%;
}

tr, td {
    text-align: left;
    padding: 8px;
}
td:nth-child(even){background-color: #708090}
td {
    background-color: #BC8F8F ;
    color: white;
}
</style>
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="marksettings.php">Format of Marks</a></li>
	<li><a href="L insert marks.php">Insert marks</a></li>
          <li><a href="chart.php">Statistics</a></li>

        </ul>
      </div>
    </div>
    

	<div id="content_header"></div>
    	<div id="site_content">
      








<table>

<?php

    //Create Connection with MySQL Database
    $con = mysqli_connect('localhost','root','');



    //Select Database
    if(!mysqli_select_db($con,'cirp'))
    {
        echo "Database Not Selected";
    }


	
    
$q1="SELECT COUNT(regno) AS no FROM marks where subject='$subject'";

    //Execute the SQL query
    $records = mysqli_query($con,$q1);

    while($row = mysqli_fetch_array($records))
    {
        echo "<tr>";
        echo "<td>No. of Students: </td>";
        echo "<td>".$row['no']."</td>";
        echo "</tr>";	
   }



$q2="SELECT round(AVG(tot),1) AS coun FROM marks where subject='$subject'";

    //Execute the SQL query
    $records = mysqli_query($con,$q2);

    while($row = mysqli_fetch_array($records))
    {
        echo "<tr>";
        echo "<td>Avergae of Subject:</td>";
        echo "<td>".$row['coun']."</td>";
        echo "</tr>";	
    }

$q3="SELECT ( round(((SELECT count(regno)   FROM marks WHERE tot>=45  AND  subject='$subject') / (SELECT COUNT(regno)  FROM marks where subject='$subject')),1 )* 100 ) as percentage";

    //Execute the SQL query
    $records = mysqli_query($con,$q3);

    while($row = mysqli_fetch_array($records))
    {
        echo "<tr>";
        echo "<td>Succeding:</td>";
        echo "<td>".$row['percentage']."%</td>";
        echo "</tr>";
		
    }
	

$q4="select MAX(tot) AS highest from marks WHERE  subject='$subject'";

    //Execute the SQL query
    $records = mysqli_query($con,$q4);

    while($row = mysqli_fetch_array($records))
    {
        echo "<tr>";
        echo "<td>Highest Mark:</td>";
        echo "<td>".$row['highest']."</td>";
        echo "</tr>";
		
    }

$q5="UPDATE abc
   SET count = CASE id
                     WHEN 1 THEN (select sum(case when tot<= 44 then 1 else 0 end) from marks WHERE subject='$subject')
                     WHEN 2 THEN (select sum(case when tot > 44 and tot <= 59 then 1 else 0 end) from marks WHERE subject='$subject')
                     WHEN 3 THEN (select sum(case when tot > 59 and tot <= 74 then 1 else 0 end) from marks WHERE subject='$subject')
                     WHEN 4 THEN (select sum(case when tot > 74 and tot <= 84 then 1 else 0 end) from marks WHERE subject='$subject')
		     WHEN 5 THEN (select sum(case when tot > 84 and tot <= 100 then 1 else 0 end) from marks WHERE subject='$subject')
		     END
 WHERE id BETWEEN 1 AND 5";

    //Execute the SQL query
    $records = mysqli_query($con,$q5);
 
?>


</table>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
	['gap','count'],
<?php

    while($row=$res->fetch_assoc())
    {
        
        echo "['".$row['gap']."',".$row['count']."],";
        	

		
   }	

?>
        ]);

        var options = {
          title: 'Students According to marks range'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>



<div id="piechart" style="width: 900px; height: 500px;"></div>






	<div class="sidebar">
        
        
       </div>
   
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; PRANIETH | SLIIT | BATCH4 | GRADING SYSTEM
    </div>
  </div>
</body>
</html>

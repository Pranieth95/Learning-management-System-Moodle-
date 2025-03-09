<?php include 'databaseh.php'; ?>

<?php
session_start();

echo 'welcome '.$_SESSION['username'];

echo '<br><a href = "../a/homelogin.php?action=logout">Log out<a/>';
if(isset($_GET['link']))
{$_SESSION['link'] = $_GET['link'];}

echo $_SESSION['link'];

$subject = $_SESSION['link'];

$query = "SELECT * FROM `report` where subject = '$subject'";
$result = $mysqli->query($query)
 or die($mysqli->error.__LINE__);
 
 
 
 
 
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
  
  	.table1 {
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

#search-box {
position: relative;
width: 100%;
margin: 0;
}

#search-form 
{
height: 40px;
border: 1px solid #999;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
background-color: #fff;
overflow: hidden;
}

#search-text 
{
font-size: 14px;
color: #ddd;
border-width: 0;
background: transparent;
}

#search-box input[type="text"]
{
width: 90%;
padding: 11px 0 12px 1em;
color: #333;
outline: none;
}

#search-button {
background-color:#025587;
position: absolute;
top: 0;
right: 0;
height: 42px;
width: 80px;
font-size: 14px;
color: white;
text-align: center;
line-height: 42px;
border-width: 0;
background-color:#ColourCode;
-webkit-border-radius: 0px 5px 5px 0px;
-moz-border-radius: 0px 5px 5px 0px;
border-radius: 0px 5px 5px 0px;
cursor: pointer;
}


.tb {
    border-collapse: collapse;
    width: 40%;
}

.trx  {
    text-align: left;
    padding: 8px;
}

.tdx {
    text-align: left;
    padding: 8px;
}

.tdx:nth-child(even){background-color: #708090}
.tdx {
    background-color: #BC8F8F ;
    color: white;
}

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
        <!-- insert the page content here -->

<div id='search-box'>
<form action='QuizeReport.php' id='search-form' method='post' target='_top'>
<input id='search-text' name='id' placeholder='Search by quize id' type='text'/>
<button id='search-button' type='submit' name="search" ;">                     
<span>Search</span>
</button>
</form>
</div>


<br>
<br>



        <form >
        	
	<table id="table1">
  <tr id="tr2">
    <th id="th2">Quize ID</th>
    <th id="th2">Subject</th>
    <th id="th2">Studet ID</th>
     <th id="th2">Marks</th>
    <th id="th2">Persentage</th>
    <th id="th2">Grade</th>
  </tr >
<tr>
	


<?php 

if(isset($_POST['search']))
{ 
		
		$id  = $_POST['id'];
		
$querys = "SELECT * FROM `report` where Quize_id = '$id'";
$results = $mysqli->query($querys)
 or die($mysqli->error.__LINE__);

 while($row = mysqli_fetch_array($results)){
	echo"<tr><td = td1>{$row['Quize_id']}</td><td = td1>{$row['subject']}</td><td = td1>{$row['student_id']}</td><td td = td1>{$row['marks']}</td><td td = td1>{$row['persentage']}</td><td td = td1>{$row['grade']}</td>";
	
}
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";



$count = "SELECT COUNT(*) AS cnt
FROM report 
WHERE Quize_id = '$id' ";

$resultCount = $mysqli->query($count)
 or die($mysqli->error.__LINE__);

while($row = mysqli_fetch_array($resultCount))
    {
        echo "<tr >";
        echo "<td >No. of Students: </td>";
        echo "<td >".$row['cnt']."</td>";
        echo "</tr>";	
   }

  
 $avg = "SELECT AVG(marks) as avg
FROM report
WHERE Quize_id = '$id'";

$resultAvg = $mysqli->query($avg)
 or die($mysqli->error.__LINE__);
 
 while($row = mysqli_fetch_array($resultAvg))
    {
        echo "<tr >";
        echo "<td >Average mark: </td>";
        echo "<td >".$row['avg']."</td>";
        echo "</tr>";	
   }
 
 $max = "SELECT MAX(marks) as mx
FROM report
WHERE Quize_id = '$id'";

$resultMax = $mysqli->query($max)
 or die($mysqli->error.__LINE__);
 
 while($row = mysqli_fetch_array($resultMax))
    {
        echo "<tr>";
        echo "<td>Highest mark: </td>";
        echo "<td>".$row['mx']."</td>";
        echo "</tr>";	
   }
 
  $min = "SELECT MIN(marks) as mn
FROM report
WHERE Quize_id = '$id'";

$resultMin = $mysqli->query($min)
 or die($mysqli->error.__LINE__);
 
 
while($row = mysqli_fetch_array($resultMin))
    {
        echo "<tr>";
        echo "<td>Lowest mark: </td>";
        echo "<td>".$row['mn']."</td>";
        echo "</tr>";	
   }

}

else {
	while($row = mysqli_fetch_array($result)){
	echo"<tr><td = td1>{$row['Quize_id']}</td><td = td1>{$row['subject']}</td><td = td1>{$row['student_id']}</td><td = td1>{$row['marks']}</td><td = td1>{$row['persentage']}</td><td = td1>{$row['grade']}</td>";
	
}
}

?>
  </tr>
  <tr><td><td/><td><td/><td><a href="Lmenu.php"  id="link1" data-hover="Desultory" >Done</a></td></tr>

</table
</form>

</div>
          
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; Hasi| SLLIT | ITP |Group 4
    </div>
  </div>
</body>
</html>

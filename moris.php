<?php
session_start();
echo "<div style ='color:#ff0000'>Welcome </div>"."".$_SESSION["uname"];



?>
<a href="../a/homelogin.php"> Logout </a>
<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "cirp");
$query = "SELECT * FROM statics";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ income:'".$row["income"]."', expense:".$row["expense"].", date:".$row["date"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>


<!DOCTYPE html>
<html>
 <head>
  <title>statics</title>
  
  <link rel="stylesheet" type="text/css" href="mystyle.css">
  <link rel="stylesheet" type="text/css" href="style/style1.css" >

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  
	<style>
			
				.bb {
				overflow: hidden;
				background-color: #333;
				font-family: Arial;
				}
				
				.bb a {
				float: left;
				font-size: 16px;
				color: white;
				text-align: center;
				padding: 14px 16px;
				text-decoration: none;
				}

				.dropdown1 {
				float: left;
				overflow: hidden;
				}

				.dropdown1 .dropbtn {
				font-size: 16px;    
				border: none;
				outline: none;
				color: white;
				padding: 14px 16px;
				background-color: #2f302f;
				}

				.bb a:hover, .dropdown1:hover .dropbtn {
				background-color:#01b0c4;
				}

				.dropdown-content {
				display: none;
				position: absolute;
				background-color: #333;
				min-width: 160px;
				box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
				z-index: 1;
				}

				.dropdown-content a {
				float: none;
				color: white;
				padding: 12px 16px;
				text-decoration: none;
				display: block;
				text-align: left;
				}

				.dropdown-content a:hover {
				background-color: #01B2E8;
				}

				.dropdown1:hover .dropdown-content {
				display: block;
				}	
				
				.active {
					background-color: #00d8d1;
					}


				li a.active {
				background-color:  #00d8d1;
				}
				
					h1 { 
				
				text-align: center; 
				text-transform: uppercase;
				}
				
				h2 { color: #111;
				font-family: 'Open Sans Condensed', sans-serif; 
				font-size: 25px;
				font-weight: 700; 
				line-height: 48px;
				margin: 0 0 24px;
				padding: 0 30px; 
				text-align: center;
				text-transform: uppercase; 
				}
					

			</style>
  
 </head>
 <body>
 
			<!-- <div id="main">
				<div id="header">
				<div id="logo">
				<div id="logo_text">
				
				<h1><a href="index.html">Colombo Institute of <span class="logo_colour">Research and Psychology</span></a></h1>
				<h2>Finance Management</h2>
				</div>
				</div>
				</div>
			</div> -->
			
 
			<div class="bb">
				<a href="indexmain.php">Home</a>
				<div class="dropdown1">
					<button class="dropbtn">Income sheets</button>
					<div class="dropdown-content">
						<a  href="index.php">semester payments</a>
						<a href="indexexam.php">exam payments</a>
						<a href="#">book store</a>
					</div>
				</div> 
				<a href="index1.php">Expenses</a>
				<a  href="index2.php">monthly statement</a>
				<a  class="active" href="moris.php">statics</a>
			</div>
		
 
	<br /><br />
	<div class="container box" >
	<h2 align="center">Analysis of Income and Expenses </h2>   
	<br /><br />
   
	<div id="chart"></div>
	</div>
  
</body>
</html>

<script>
	Morris.Bar({
		element : 'chart',
		data:[<?php echo $chart_data; ?>],
		xkey:'date',
		ykeys:['income','expense'],
		labels:['income','expense'],
		hideHover:'auto',
		stacked:true
});
</script>

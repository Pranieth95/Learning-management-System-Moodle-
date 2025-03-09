
<?php include 'databaseh.php'; ?>

<?php
session_start();

echo 'welcome '.$_SESSION['username'];

echo '<br><a href = "../a/homelogin.php?action=logout">Log out<a/>';


if(isset($_GET['link']))
{$_SESSION['link'] = $_GET['link'];}

echo ' welcome '.$_SESSION['link'];

$subject = $_SESSION['link'];


if(isset($_POST['submit'])){
	$ekey = $_POST['ekey'];

	
	$query = "select * from `marksenroll` where enkey ='$ekey' and subject = '$subject' " ;
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    
	if(mysqli_num_rows($result)==1){
		
		header('Location: Lmenu.php ');
	}
	
	else {
		echo "Invalid attempt";
	}

	
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
  </style>
  
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
         
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
      
       <form method="post" action="lquizEnrollmentKey.php">
	<table align="center">
		
			
		<tr  >
		<td td id="td1">Enrollmrnt Key:</td>
		<td td id="td1"><input id="Text1" type="password" name="ekey"/></td>
		</tr>
		
		<tr>
		<td id="td1"></td>
		<td id="td1">
     	<input type="submit" class="button" name="submit" value="Submit" align="right">
     	</td>
		</tr>
      </table>
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

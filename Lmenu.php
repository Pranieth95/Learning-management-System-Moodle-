<?php include 'databaseh.php'; ?>

<?php
session_start();


echo 'welcome '.$_SESSION['username'];

echo '<br><a href = "../a/homelogin.php?action=logout">Log out<a/>';


if(isset($_GET['link']))
{$_SESSION['link'] = $_GET['link'];}

echo ' welcome '.$_SESSION['link'];

$subject = $_SESSION['link'];

//next
if(isset($_POST['quize']))
{
			header('Location: QuizeInfo.php ');   
}	

if(isset($_POST['charts']))
{
			header('Location: QuizeReport.php ');   
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

.button:hover {background-color: #29415D;}

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
</style>
  
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html"> <span class="logo_colour"></span></a></h1>
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
        
        <form method="post" action="Lmenu.php">
        <table >
        	<tr>
        		<td>
		<input type="submit"  name="charts" class="button" value="Quize Report">
		</td>
		<td >
		<input type="submit" name="quize"  class="button" value="Create Quize">
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

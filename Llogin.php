<?php include 'databaseh.php'; ?>

<?php 
session_start();

if(isset($_POST['bttLogin'])){

	$username = $_POST['uname'];
	$password = $_POST['pwd'];
	
	$query = "select * from `lecturer` where lecturer_ID='$username' and password='$password'" ;
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    
	if(mysqli_num_rows($result)==1){
		$_SESSION['username'] = $username;
		header('Location: lquizfrontView.php ');
	}
	
	else {
		echo "Invalid account";
	}

if(isset($_GET['logout'])){
	session_unregister('uname');
	session_destroy();
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
form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #29425E;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #29425E;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 20;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
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
   
   <form method="post" action="Llogin.php"> 
   	
   	<div class="imgcontainer">
    <img src="Man.png" alt="Avatar" class="avatar">
  </div>

   	
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
       
      </div>
      <div id="content">
        <!-- insert the page content here -->
          <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" required>
        
    <button type="submit" name="bttLogin">Login</button>
    
    <input type="checkbox" checked="checked"> Remember me
      
      </div>
       <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
  
  </div>
  </form>
  
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; Hasi| SLLIT | ITP |Group 4
    </div>
  </div>
</body>
</html>

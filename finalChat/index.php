<!DOCTYPE html>
<!--[if IE 7 ]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 oldie"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Chat</title>

    <link rel="stylesheet" type="text/css" media="screen" href="css/coolblue.css" />

    <!--[if lt IE 9]>
	    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.6.1.min.js"><\/script>')</script>

    <script src="js/scrollToTop.js"></script>

    <script>
function getcity(id) {
			xhr = new XMLHttpRequest();
			xhr.open('GET' , 'test.php?idd='+id, true);
			xhr.send();
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && xhr.status==200){
					document.getElementById("city_display").innerHTML = xhr.responseText;
					}
			
				}


}

function getEmail(emailid){

			email  = new XMLHttpRequest();
			email.open('GET' , 'test2.php?email='+emailid, true);
			email.send();
			email.onreadystatechange = function(){
				if (email.readyState == 4 && email.status == 200)
				{
					
					document.getElementById('emailDiv').innerHTML = email.responseText;
					}
				
				}
	
	
	}
	
	
	function password (pass){
	var a =	document.getElementById('pass1').value;
	//	document.write(a);
		var b = document.getElementById('pass2').value;
		if (a == b ){
			document.getElementById('cnfrmpass').innerHTML = "<font color='#00CC00'>Matched</font>";
			}
			else {
				
				document.getElementById('cnfrmpass').innerHTML = "<font color='red'>Miss matched</font>";
				}
		}

</script>


<style type="text/css">
    .display-head
    {
    	padding-left:50px;
    	padding-top: 80px;
    }
</style>

</head>

<body id="top">

	<?php
include_once('config.php');
$result = mysqli_query($conn , 'select * from country');
if(!$result){
	echo 'query failed';}
?>

<!--header -->
<div id="header-wrap"><header>

 	<div class="display-head">
        <h1><a href="index.php">Online Chat</a></h1>
        <h3>feel free to express your ideas</h3>
     
    </div>

    <nav>
		<ul>
			<li id="current"><a href="index.php">Home</a><span></span></li>
			<li><a href="chatRoomBeforeLogin.php">Chat Room</a><span></span></li>
		</ul>
	</nav>

    <div class="subscribe">
        <span>Subscribe:</span> <a href="www.email.com">Email</a> | <a href="www.facebook.com">FB</a>
    </div> 

<!--   <form id="quick-search" method="get" action="index.php">
      <fieldset class="search">
         <label for="qsearch">Search:</label>
         <input class="tbox" id="qsearch" type="text" name="qsearch" value="Search..." title="Start typing and hit ENTER" />
         <button class="btn" title="Submit Search">Search</button>
      </fieldset>
   </form>  --!>

<!--/header-->
</header></div>
	
<!-- content-wrap -->
<div id="content-wrap">

    <!-- content -->
    <div id="content" class="clearfix">

   	    <!-- main -->
        <div id="main">

      	    <article class="post">

      		    <div class="primary">

               	    <div class="image-section">
              		    <img src="images/image.png" alt="image post" height="206" width="498"/>



         	        </div>


         	        <?php if( isset($_GET['logout_successfully'])){ ?><?php echo $_GET['logout_successfully']; ?>
<?php } ?>
<table><tr>
<td colspan="2"><center><h1>Registeration</h1></td></tr><tr>
<form method="post" action="insert.php">
<td>Name : </td><td><input type="text" name="name" /></td></tr><tr>
<td>Email : </td><td><input type="email" name="email" onBlur="getEmail(this.value)" /></td><td><div id="emailDiv"></div></td>
</tr><tr>



<td>Year : </td><td><select name="country">
<?php while($row = mysqli_fetch_assoc($result)){?>
<option value="<?php echo $row['country_id']; ?>"> <?php echo $row['country_name']; ?>
</option>

<?php } ?>
</select></td><td><div id="city_display"></div>
</td></tr><tr>

<td>Password : </td><td><input type="password" name="pass1" id="pass1"/></td></tr><tr><br />
<td>Confirm Password : </td><td><input type="password" name="pass2" id="pass2" onBlur="password(this.value)" /></td><td>
<div id="cnfrmpass"></div></td></tr><tr>
<td colspan="2"><center><input type="submit" name="sbt" /></td></table></form> <br /><br />
<?php if( isset($_GET['registeration_successfull'])){ ?><?php echo $_GET['registeration_successfull']; ?>
<?php } ?>



<form method="post" action="process.php">
<table><tr>
<td colspan="2"><center> <h1>Login</h1></td>
</tr>

<tr>
<td>
Email : </td><td><input type="text" name="email"  /></td></tr><tr>
<td> Password : </td><td><input type="password" name="password" /></td></tr>
<tr><td colspan="2"><center> <input type="submit" name="loginbtn" /></td></tr></table>
<?php if( isset($_GET['login_error'])){ ?><?php echo $_GET['login_error']; ?>
<?php } ?>
</form> 




                </div> 

		    </article>


            

        <!-- /main -->
        </div>

        <!-- sidebar -->
		<div id="sidebar">

      	    <div class="about-me">

         	    <h3>About Chat Room</h3>

                <p>
		        <a href="index.php"><img src="images/download.jpg" width="42" height="42" alt="firefox" class="align-left" /></a>
                Description about chat room <a href="www.google.com">Learn more...</a>
			    </p>

            </div>

			<div class="sidemenu">

				<h3>Are you interested on...</h3>
                <ul>
					<li><a href="#">YouTube</a></li>
					<li><a href="#">Instergram</a></li>
					<li><a href="#">Snap Chat</a></li>
					<li><a href="#">Chat On</a></li>
				</ul>

			</div>
        <!-- /sidebar -->
		</div>

    <!-- content -->
	</div>

<!-- /content-out -->
</div>
		
<!-- extra -->

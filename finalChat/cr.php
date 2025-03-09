<?php
session_start();
 ?>



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

    <title>Chat Room</title>

    <link rel="stylesheet" type="text/css" media="screen" href="css/coolblue.css" />

    <!--[if lt IE 9]>
	    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.6.1.min.js"><\/script>')</script>

    <script src="js/scrollToTop.js"></script>
<style type="text/css">
    .display-head
    {
    	padding-left:50px;
    	padding-top: 80px;
    }
</style>


<script>
	
function getText() {
		
	var $a =	document.getElementById('text').value;
	
		xhr = new XMLHttpRequest();
		xhr.open('POST' , 'chatdb.php',true);
		xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
		xhr.send('chat='+$a);
		xhr.onreadystatechange=function(){
			if (xhr.responseText){
			//	document.getElementById('chatarea').innerHTML=xhr.responseText;
									}
				}
					}
		

function setText(){
	
	xhr = new XMLHttpRequest();
	xhr.open('POST' , 'chatFetch.php' , true);
	xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xhr.send();
	xhr.onreadystatechange = function(){
	//	alert(xhr.responseText);
			document.getElementById('chatarea').innerHTML = xhr.responseText;
			}
		
	}
	setInterval("setText()",2000);
	
	
setInterval("users()",3000);

	
	function users(){
	xhr1 = new XMLHttpRequest();
	xhr1.open('POST' , 'userFetch.php' , true);
	xhr1.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xhr1.send();
	xhr1.onreadystatechange = function(){
	//	alert(xhr.responseText);
			document.getElementById('loginperson').innerHTML = xhr1.responseText;
			}
		
		
		}
		
		
</script>

</head>

<body id="top">

<!--header -->
<div id="header-wrap"><header>

 	<div class="display-head">
        <h1><a href="index.php">Online Chat</a></h1>
        <h3>feel free to express your ideas</h3>
     
    </div>

    <nav>
		<ul>
			<li><a href="index.php">Home</a><span></span></li>
			<li id="current"><a href="cr.php">Chat Room</a><span></span></li>
		</ul>
	</nav>

    <div class="subscribe">
        <span>Subscribe:</span> <a href="www.email.com">Email</a> | <a href="www.facebook.com">FB</a>
    </div> 

</header></div>
	
<!-- content-wrap -->
<div id="content-wrap">

    <!-- content -->
    <div id="content" class="clearfix">

   	    <!-- main -->
        <div id="main">

      	    <div id="sach">

      		    <div class="primary">


<a href="index.html"><img src="images/gravatar.jpg" width="42" height="42" alt="firefox" class="align-left" /></a>
<?php

include_once('config.php');
				//	echo		$_SESSION['email'];
				//	echo	$_SESSION['password'];

			echo	$_SESSION['name'];
					
					
					
						
if (isset($_GET['logout']))
{
	$result = mysqli_query($conn, "UPDATE user
	SET user_status = '0'
	WHERE user_email = '$_SESSION[email]';");
	session_destroy();
	header('location: index.php?logout_successfully=<span style="color:green">You have successfully Logged Out.</span>');
	
}

?>
<form action="">
<input type="submit" name="logout" value="logout">
</form>
<div id="chatbox">

	<div id ="chatarea"></div>

	<div id="loginperson"></div>

	
<div id="textbox">

<textarea rows="4" cols="48" id="text"></textarea>
<input type="button" value="send"  onclick="getText()" />
<input type="reset" name="reset" value="reset">

</div></center>

</div>
<style>
#chatbox
{		
			border:double;
			height:400px;
			width:600px;
			align;
			}
			#chatarea {
				width:385px;
				height:300px;
				border:double;
				float:left;
				overflow:auto;

				}
				#loginperson {
					width:200px;
					height:300px;
					border:double;
					float:right;}
					#textbox {
						width:400px;
						height:89px;
						border:double;
						float:left;
						}
						#chatting {
							float:left;}
</style>
<?php
	if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
		//session_destroy();
		header('location: practice.php');
		}

 ?>
             

                </div>

                <aside>

            	   

               	    <div class="post-meta">
                     	<ul>
                           <li class="user"><a href="#"><?php echo $_SESSION['name'] ; ?></a></li>
                        </ul>
					</div>

                </aside>

            </div>
		    </article>
</div>
		
<footer>

	<p class="footer-left">
	</p>

	<p class="footer-right">
	   	<a href="index.php">Log Out</a> |
        <a href="#top" class="back-to-top">Back to Top</a>
    </p>


</footer>

</body>
</html>

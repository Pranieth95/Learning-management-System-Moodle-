<?php include 'databaseh.php'; ?>

<?php


session_start();

echo 'welcome '.$_SESSION['username'];

echo '<br><a href = "../a/homelogin.php?action=logout">Log out<a/>';

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

 td {
    padding: 20px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
</style>

</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          
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
        <form method="post" action="lfrontView.php">
        	<table >
		<tr>
			<ul>
		<td id="td1">Foundation	
		<li id="td1"><a href="lquizEnrollmentKey.php?link=F0FF16" name="F0FF16">F0FF16</a></li>
		<li id="td1"><a href="lquizEnrollmentKey.php?link=F0FF17" name="F0FF17">F0FF17</a></li>

		</td>
		</ul>
		</tr>
		
		<tr>
			<ul>
		<td id="td1">Certificate	
		<li id="td1"><a href="lquizEnrollmentKey.php?link=Child and Adolance psychology" name="Child and Adolance psychology">Child and Adolance psychology</a></li>
		<li id="td1"><a href="lquizEnrollmentKey.php?link=Bussiness and organization psychology" name="Bussiness and organization psychology">Bussiness and organization psychology</a></li>
		<li id="td1"><a href="lquizEnrollmentKey.php?link=Forensics and criminal psychology" name="Forensics and criminal psychology">Forensics and criminal psychology</a></li>
		</td>
		</ul>
		</tr>
		
		<tr>
			<ul>
		<td id="td1">Diploma
		<li id="td1"><a href="lquizEnrollmentKey.php?link=Diploma in Bussiness and organization psychology" name="Diploma in Bussiness and organization psychology">Diploma in Bussiness and organization psychology</a></li>
		<li id="td1"><a href="lquizEnrollmentKey.php?link=Diploma in Child psychology" name="Diploma in Child psychology">Diploma in Child psychology</a></li>
		<li id="td1"><a href="lquizEnrollmentKey.php?link=Diploma in Forensics and criminal psychology" name="Diploma in Forensics and criminal psychology">Diploma in Forensics and criminal psychology</a></li>
		</td>
		</ul>
		</tr>
	
	</table>
 </form>

  </div>
</div>
      
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; PRANIETH | SLIIT | BATCH4 | GRADING SYSTEM
    </div>
  </div>
</body>
</html>

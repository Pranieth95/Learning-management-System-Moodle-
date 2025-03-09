<?php include 'databaseh.php'; ?>

<?php

session_start();

echo 'welcome '.$_SESSION['uname'];

echo '<br><a href = "../a/homelogin.php?action=logout">Log out<a/>';

if(isset($_GET['link']))
{$_SESSION['link'] = $_GET['link'];}

echo ' welcome '.$_SESSION['link'];

$subject = $_SESSION['link'];

//insert

if(isset($_POST['insert']))
{
	//get the post variables
		$id  = $_POST['id'];
		$notice = $_POST['notice'];
		
		
$query = "INSERT INTO `lnotice`( id, notice, subject)
VALUES('$id','$notice', '$subject')";
		
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
				   
}


//update
if(isset($_POST['update']))
{
	$id  = $_POST['id'];
	$notice = $_POST['notice'];
	
	//Question query
$query = "UPDATE lnotice SET notice = '$notice' where id = '$id'";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);		   
}

//delete

if(isset($_POST['delete']))
{
		//get the post variables
		$id  = $_POST['id'];
	$notice = $_POST['notice'];

	//Question query

	$query = "DELETE FROM lnotice where id = '$id'";
		
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

}


?>

<!DOCTYPE html>
<html>

<head>
  <title>colour_blue - another page</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style.css" title="style" />
  
  <style>
  #td1 {
    text-align: left;
    padding: 20px;
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
      	<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="LsubjectView.php">Upload View</a></li>
          <li><a href="Llogin.php">Online Quiz</a></li>
          <li><a href="../cirp/lfrontView.php">Insert Marks</a></li>
        </ul>
      </div>
    </div>
    
    
    <div id="content_header"></div>
    
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
       <h3><B>Calander</B></h3>
<a href="../arju/lecturer/Calendar.php">
	<img src="../arju/lecturer/1d.jpg" alt="HTML5 Icon" style="width:128px;height:128px;"> 
</a>
      </div>
      <div id="content">
        <!-- insert the page content here -->
      
         <form action="LsubjectView.php" method="post">
          <div class="form_settings">
            <p><span>id</span>
<input class="contact" type="number" name="id" id="id" value="" /></p>
            <p><span>Notice</span>
<input class="contact" type="text" name="notice" id="notice" value="" /></p>


<input class="submit" type="submit" name="insert" value="Insert" /></p>
<input class="submit" type="submit" name="update" value="Update" /></p>
<input class="submit" type="submit" name="delete" value="Delete" /></p>
          </div>
        </form>
        


	
 <table = id="table1"> 	
<?php
    
    //Select Query
	
    $sql = "SELECT id,notice FROM lnotice where subject = '".$subject."'";
	$result = $mysqli->query($sql) or die($mysqli->error.__LINE__);

    while($row = mysqli_fetch_array($result)){
	echo"<tr><td>{$row['id']}</td><td>{$row['notice']}</td></tr>";
}

?>

 
	
<script> 
            
            // get selected row
            // display selected row data in text input
            
            var table = document.getElementById("table1"),rIndex;
            
            for(var i = 0; i < table.rows.length; i++)
            {
                table.rows[i].onclick = function()
                {
                    rIndex = this.rowIndex;
                    console.log(rIndex);
                   
                    document.getElementById("id").value = this.cells[0].innerHTML;
                    document.getElementById("notice").value = this.cells[1].innerHTML;
         
		};
            }
     
        </script>
		<form action="upload.php" method="post" enctype="multipart/form-data">
<div class="form_settings">
<table>
<tr>
	<input type="file" name="file" />
	<button type="submit" name="btn-upload">upload</button>
</table>    
</div>    
</form>
       
		
		
		
		<?php
	if(isset($_GET['success']))
	{
		
        include "view.php";
        
	}
	else if(isset($_GET['fail']))
	{
		?>
        <label>Problem While File Uploading !</label>
        <?php
	}
	else
	{
		?>
        <label>Try to upload any files(PDF, DOC, EXE, VIDEO, MP3, ZIP,etc...)</label>
        <?php
	}
?>
	
		
		
		

      </table>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; Hasi| SLLIT | ITP |Group 4
    </div>
  </div>
</body>
</html>

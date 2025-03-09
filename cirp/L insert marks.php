<?php
session_start();
echo "<div style ='color:#ff0000'>Welcome "."".$_SESSION["uname"];

$subject=$_SESSION['subject'];

?>

<a href="../a/homelogin.php"> Logout </a>



<!DOCTYPE HTML>
<html>

<head>


<style>
            table tr:not(:first-child){
                cursor: pointer;transition: all .25s ease-in-out;
            }
            table tr:not(:first-child):hover{background-color: #ddd;}

input[type=number] {
    
    border: 2px solid #025587;
    border-radius: 4px;
}
input[type=text] {
    
    border: 2px solid #025587;
    border-radius: 4px;
}

</style>


  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style1.css" title="style" />
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
    	<div id="site_content" >
	
<form action="insert.php" method="post">


	<table>
		<tr>
		<td id="td1">Student Reg No:</td>
		<td id="td1"><input  type="text" name="sid" id="sid"   required  pattern="(DF|DC|DD)+.{6}$" title="Insert format with DFxxxxxx or DCxxxxxx or DD123456"/></td>
		</tr>
		<tr>
		<td id="td1">Assignment 1:</td>
		<td id="td1"><input type="number" name="ass1" id="ass1"  /></td>

		</tr>
		<tr>
		<td id="td1">Online Quiz:</td>
		<td id="td1"><input type="number" name="ass2" id="ass2"/></td>

		</tr>
		<tr>
		<td id="td1">Mid Terms:</td>
		<td id="td1"><input type="number" name="mid" id="mid"/></td>

		</tr>
		<tr>
		<td id="td1">Finals:</td>
		<td id="td1"><input type="number" name="final" id="final"/></td>

		</tr>

		
		<tr>
		<td>
		
		</td>
		</tr>

		<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>
		<input type="submit" name="insert" value="Add" id="button2">
		
		</td>
		<tr><td>
		 <input type="submit" name="update" value="Update" id="button">
		<td>
		<input type="submit" name="delete" value="Delete" id="button">
	
	</td>
		</tr>

	</table>
	</form>	
	
	<br>
	<br>
	<br>

	<table id="table">
	
  		<tr>
    		<th id="th1">StudentID</th>
    		<th id="th1">Assignment 1</th>
    		<th id="th1">Online Quiz</th>
		<th id="th1">Midterm</th>
		<th id="th1">Finals</th>
		<th id="th1">Full Marks</th>
		<th id="th1">Grade</th>
  		</tr>

<?php
    //Create Connection with MySQL Database
    $con = mysqli_connect('localhost','root','');



    //Select Database
    if(!mysqli_select_db($con,'cirp'))
    {
        echo "Database Not Selected";
    }
    //Select Query
	
    $sql = "SELECT regno,ass1,ass2,mid,final,tot,grade FROM marks where subject='$subject'";


    //Execute the SQL query
    $records = mysqli_query($con,$sql);

    while($row = mysqli_fetch_array($records))
    {
        echo "<tr>";
        echo "<td>".$row['regno']."</td>";
        echo "<td>".$row['ass1']."</td>";
        echo "<td>".$row['ass2']."</td>";
	echo "<td>".$row['mid']."</td>";
	echo "<td>".$row['final']."</td>";
	echo "<td>".$row['tot']."</td>";
	echo "<td>".$row['grade']."</td>";	

		
   }
?>
		
	</table>

      








        <script> 
            
            // get selected row
            // display selected row data in text input
            
            var table = document.getElementById("table"),rIndex;
            
            for(var i = 1; i < table.rows.length; i++)
            {
                table.rows[i].onclick = function()
                {
                    rIndex = this.rowIndex;
                    console.log(rIndex);
                    
                    document.getElementById("sid").value = this.cells[0].innerHTML;
                    document.getElementById("ass1").value = this.cells[1].innerHTML;
                    
		    document.getElementById("ass2").value = this.cells[2].innerHTML;
                    
                    document.getElementById("mid").value = this.cells[3].innerHTML;                
		    
		    document.getElementById("final").value = this.cells[4].innerHTML;
                    
                    
		};
            }
            
            
          
            
        </script>


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

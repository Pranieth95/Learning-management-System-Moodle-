<a href='Login1.php?logout'>LogOut</a>
<!doctype html>
<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cirp"; 
	$error = "Cannot connect to database, Please try again later...";
	
	$conn = mysqli_connect($hostname,$username,$password) or die ($error);
	mysqli_select_db($conn,$dbname) or die ($error);
?>
<html>
<head>
<meta charset="utf-8">
<title>Member Registration</title>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <style type="text/css">
h2{
font-family: 'Open Sans Condensed', sans-serif; 
font-size: 34px; 
font-weight: 700; 
line-height: 48px; 
margin: 0 0 0;   
text-align: center; 
text-transform: uppercase;
color:#3333ff;

}

input[type=text], textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}
input[type=date], input[type=email], input[type=tel], select {
    width: 50%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit], input[type=reset], input[type=button] {
    background-color: #226EC1;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.Cbutton{

    background-color: #226EC1;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;

}

.Cbutton:hover {
    background-color: #55A2F5;
}

input[type=submit]:hover {
    background-color: #55A2F5;
}

input[type=reset]:hover {
    background-color: #55A2F5;
}

input[type=button]:hover {
    background-color: #55A2F5;
}


.container {
	border-radius: 5px;
	background-color: #f2f2f2;
	padding: 20px;
	top: 70px;
	left: -2px;
	
	
}

.navi{
	background-color: #333;
	left: 0px;
	top: 0px;
	width: 100%;
	height:45px;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
    border-right:1px solid #bbb;
}

li:last-child {
    border-right: none;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #226EC1;
}

    </style>
</head>


<body>
<?php
if(isset($_POST['submit'])){
				
				$firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
				$lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
				$club = mysqli_real_escape_string($conn, $_POST["club"]);
				$bday = mysqli_real_escape_string($conn, $_POST["bday"]);
				$CIRP_ID = mysqli_real_escape_string($conn, $_POST["CIRP_ID"]);
				$Address = mysqli_real_escape_string($conn, $_POST["Address"]);
				$email = mysqli_real_escape_string($conn, $_POST["email"]);
				$tel = mysqli_real_escape_string($conn, $_POST["tel"]);
				$type = mysqli_real_escape_string($conn, $_POST["type"]);

				
				//$eventdate = $month."/".$day."/".$year;
				
				$sqlinsert = "INSERT INTO `club_member` (`CIRP_ID`, `firstname`, `lastname`, `club`, `bday`, `Address`, `email`, `tel`, `JoinedDate`, `Months`, `Fee`, `type`) VALUES ('".$CIRP_ID."','".$firstname."','".$lastname."','".$club."','".$bday."','".$Address."','".$email."','".$tel."', now(), '0', '0', '".$type."')";
			
				$resultinsert = mysqli_query($conn,$sqlinsert);
				if($resultinsert){
					echo "Member was successfully Registered...";
				}else{
					echo "Member Failed to be Registered...";
				}
				
			}
?>
<div class="navi">

</div>
<!------------------------MEMBERSHIP REGISTRATION--------------------------------------------------->

<div class="container">
<h2>CLUB MEMBER REGISTRATION</h2>
  <form name= 'memberform' method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="fname">First Name:</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name.." pattern="[a-zA-Z]+" title="Only enter letters" required="required">

    <label for="lname">Last Name:</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name.." pattern="[a-zA-Z]+" title="Only enter letters" required="required">
    
    <label for="clubname">Club:</label><br>
    <?php
       	$query = "SELECT `clubName` FROM `clubs`";
		$result = mysqli_query($conn,$query);
	?>  
    <select name="club" id="club" required>
       <option selected="selected" value="" disabled>Select one</option>
       <?php
			while($row = mysqli_fetch_array($result))
			{
	  			echo '<option value="'.$row['clubName'].'">'.$row['clubName'].'</option>';
			}
		?>  					
	</select>
<br>    

    <label for="clubtype">Member Type:</label><br>
    <select id ="type" name="type" required>
    	<option selected="selected" value="" disabled>Select one</option>
        <option value="Rep">Representative</option>
        <option value="Normal">Normal</option>
    </select>   
    <br>
    
    <label for="Birthday">Birthday:</label><br>
    <input type="date" min="1867-01-01" max="2012-01-01" name="bday" id="bday" required="required">
<br>
    <label for="ID">CIRP ID:</label>
    <input type="text" id="ID" name="CIRP_ID" placeholder="Your CIRP ID.." required="required">
    
    <label for="Address">Address:</label>
    <input type="text" id="address" name="Address" placeholder="Your Address.." required="required">
    
    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email" placeholder="Your Email.." required="required">
<br>    
    <label for="tel">Contact No:</label><br>
    <input type="tel" name="tel" id="tel" placeholder="Your Mobile Number.." pattern="[0-9]{10}" title="Enter a valid phone number" required="required">
<br>    
    <input type="reset" name="reset" id="reset" value="Clear">
    <input type="submit" name="submit" id="register" value="REGISTER">
    <button name="demo" id="demo" class="Cbutton demo" onclick="reply_click(this.id)">DEMO</button>
    

    <input type="button" onclick="location.href='index22.php';" value="Back" />

    
  </form>
</div>




<script type="text/javascript">
    
    function reply_click(clicked_id)
    {
        if(clicked_id == "demo")
        {
            document.getElementById('fname').value = 'Sunil';
			document.getElementById('lname').value = 'Fernando';
			document.getElementById('club').value = 'BrainWork';
			document.getElementById('type').value = 'Representative';
			document.getElementById('bday').value = '1995-10-04';
			document.getElementById('ID').value = 'DF666666';
			document.getElementById('address').value = 'asde123';
			document.getElementById('email').value = 'abcd@gmail.com';
			document.getElementById('tel').value = '0710724585';
			
        }
    }    
    
</script>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>


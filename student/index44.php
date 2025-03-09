<!DOCTYPE html>
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
			<link rel="stylesheet" type="text/css" href="mystyle.css">
           <title>Manage Events</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
		   
		   <style>
		   
		   td {
			   padding: 5px;
		   }
		   
		   table {
  			border-spacing: 10px 0;
			border-collapse: separate;
			}
		   
		   h1 { color: #666666; 
		   font-family: 'Open Sans Condensed', sans-serif; 
		   font-size: 44px; 
		   font-weight: 700; 
		   line-height: 64px; 
		   margin: 0 0 0; 		   
		   text-align: center; 
		   text-transform: uppercase; 
		   } 
		   
		   h2 { color: #A9A9A9; 
		   font-family: 'Open Sans Condensed', sans-serif; 
		   font-size: 34px; 
		   font-weight: 700; 
		   line-height: 48px; 
		   margin: 0 0 0;   
		   text-align: left; 
		   text-transform: uppercase; 
		   }
		   
		   p { color: #111; font-family: 'Open Sans', sans-serif; font-size: 16px; line-height: 28px; margin: 0 0 48px; } 
		   	   
			
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
				background-color: inherit;
				}

				.bb a:hover, .dropdown1:hover .dropbtn {
				background-color: red;
				}

				.dropdown-content {
				display: none;
				position: absolute;
				background-color: #f9f9f9;
				min-width: 160px;
				box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
				z-index: 1;
				}

				.dropdown-content a {
				float: none;
				color: black;
				padding: 12px 16px;
				text-decoration: none;
				display: block;
				text-align: left;
				}

				.dropdown-content a:hover {
				background-color: #ddd;
				}

				.dropdown1:hover .dropdown-content {
				display: block;
				}
				
#main
{
	margin-left: auto;
	margin-right: auto;
	position: relative;
	top: 177px;
	left: 258px;
	height: 182px;
	width: 100%;
}

#header
{
	background: #015090;
	height: 198px;
	width: 100%;
	position: absolute;
	top: -177px;
	left: -260px;
}

#logo
{
	width: 825px;
	position: absolute;
	height: 188px;
	background: #025587 url(CIRPBanner1.png) no-repeat;
	left: 365px;
	top: 7px;
}	

.Cbutton, input[type=button]{
	background-color: #226EC1;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	margin: 10px;
} 

input[type=submit]:hover {
    background-color: #55A2F5;
}

input[type=reset]:hover {
    background-color: #55A2F5;
}

.Cbutton:hover {
    background-color: #55A2F5;
}

input[type=button]:hover {
    background-color: #55A2F5;
}

.Income{
	display:none;}
	
select{
   -webkit-appearance: button;
   -webkit-border-radius: 2px;
   -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
   -webkit-padding-end: 20px;
   -webkit-padding-start: 2px;
   -webkit-user-select: none;
   background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#FAFAFA, #F4F4F4 40%, #E5E5E5);
   background-position: 97% center;
   background-repeat: no-repeat;
   border: 1px solid #AAA;
   color: #555;
   font-size: inherit; 
   overflow: hidden;
   padding: 5px 10px;
   text-overflow: ellipsis;
   white-space: nowrap;
   width: 150px;
}

			</style>
		   
            
      </head>  
      <body>  
      
      <div id="main">
    	<div id="header"></div> 
	  </div>
 		<div id="logo"></div>
	  
			<!---- <div class="bb">
				<a href="#home">Home</a>
				<div class="dropdown1">
					<button class="dropbtn">Income sheets</button>
					<div class="dropdown-content">
						<a class="active" href="index.php">semester payments</a>
						<a href="indexexam.php">exam payments</a>
						<a href="#">book store</a>
					</div>
				</div> 
				<a href="index1.php">Expenses</a>
				<a  href="index2.php">monthly statement</a>
				<a href="moris.php">statics</a>
			</div> --->
	  
		
		
           <div class="container box">  
           <p align="right"><a href='Login1.php?logout'>LogOut</a></p>    
				<h2 align="left">Manage Events</h2>
                <p align="left">Edit or Remove planned events using this tool</p>		
                                 
                <form> 
				<table>
				
				
				<tr>                
                <td><h4>Event Title: </h4></td>  
                <td><input type="text" name="eventTitle" id="eventTitle" value="" class="form-control" required>                
                </td> 
				</tr>				
				
				<tr>
                <td><h4>Event Description:</h4></td>  
                <td><textarea id="eventDetails" name="eventDetails" placeholder="Event Details..." style="width:200px" class="form-control"></textarea>
                </td>				               
				</tr>
			
				</table>
				
				<br /><br />
				
                <div align="left">  
                     <input type="hidden" name="id" id="user_id" />  
                     <button type="button" name="action" id="action" class="Cbutton"></button>  
					 <button type="reset" value="Reset" class="Cbutton" >Clear</button>
                </div>  
                <br />  
                <br />  
                <div id="result" class="table-responsive">  
                </div>  
				
				</form>		
           </div>  
      </body>  
 </html>  
 <script>  
 
 

 

 $(document).ready(function(){  
      fetchUser();  
      function fetchUser()  
      {  
           var action = "select";  
           $.ajax({  
                url : "select44.php",  
                method:"POST",  
                data:{action:action},  
                success:function(data){  
                     $('#eventDate').val('');  
                     $('#eventTitle').val(''); 
					 $('#eventDetails').val(''); 
                     $('#action').text("Update");  
                     $('#result').html(data);  
                }  
           });  
      }  
      $('#action').click(function(){  
           var eventTitle = $('#eventTitle').val();
		   var eventDetails = $('#eventDetails').val();
           var id = $('#user_id').val();  
           var action = $('#action').text();  
		   
           if(eventTitle != '' && eventDetails != '' )
           {  
                $.ajax({  
                     url : "action44.php",  
                     method:"POST",  
                     data:{eventTitle:eventTitle, eventDetails:eventDetails, id:id, action:action},  
                     success:function(data){  
                          alert(data);  
                          fetchUser();  
                     }  
                });  
           }  
           else  
           {  
                alert("all Fields required");  
           }  
      });  
      $(document).on('click', '.update', function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"fetch44.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){  
                     $('#action').text("Edit");  
                     $('#user_id').val(id);            
					 $('#eventTitle').val(data.eventTitle); 
					 $('#eventDetails').val(data.eventDetails);					 
                }  
           })  
      });  
      $(document).on('click', '.delete', function(){  
           var id = $(this).attr("id");  
           if(confirm("Are you sure you want to remove this data?"))  
           {  
                var action = "Delete";  
                $.ajax({  
                     url:"action44.php",  
                     method:"POST",  
                     data:{id:id, action:action},  
                     success:function(data)  
                     {  
                          fetchUser();  
                          alert(data);  
                     }  
                })  
           }  
           else  
           {  
                return false;  
           }  
      });  
 });  
 </script>  

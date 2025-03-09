<?php
session_start();
echo "<div style ='color:#ff0000'>Welcome </div>"."".$_SESSION["uname"];



?>
<a href="../a/homelogin.php"> Logout </a>
<html>  
      <head>  
			
			<link rel="stylesheet" type="text/css" href="mystyle.css">
			<link rel="stylesheet" type="text/css" href="style/style1.css" >
			
           <title>monthly income and expenses</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
		   
		   
		    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
			<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
			<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
			<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
		   
		   <style>
				
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
				background-color: #2f302f;
				}

				.bb a:hover, .dropdown1:hover .dropbtn {
				background-color:#01b0c4;
				}

				.dropdown-content {
				display: none;
				position: absolute;
				background-color: #333;
				min-width: 160px;
				box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
				z-index: 1;
				}

				.dropdown-content a {
				float: none;
				color: white;
				padding: 12px 16px;
				text-decoration: none;
				display: block;
				text-align: left;
				}

				.dropdown-content a:hover {
				background-color: #01B2E8;
				}

				.dropdown1:hover .dropdown-content {
				display: block;
				}	
				
				.active {
					background-color: #00d8d1;
					}


				li a.active {
				background-color:  #00d8d1;
				}
					
				h1 { 
				
				text-align: center; 
				text-transform: uppercase;
				}
				
				h2 { color: #111;
				font-family: 'Open Sans Condensed', sans-serif; 
				font-size: 25px;
				font-weight: 700; 
				line-height: 48px;
				margin: 0 0 24px;
				padding: 0 30px; 
				text-align: center;
				text-transform: uppercase; 
				}
					
					
			</style>
		   
            
      </head>  
      <body>  
	  
			<!-- <div id="main">
				<div id="header">
				<div id="logo">
				<div id="logo_text">
				
				<h1><a href="">Colombo Institute of <span class="logo_colour">Research and Psychology</span></a></h1>
				<h2>Finance Management</h2>
				</div>
				</div>
				</div>
			</div>  -->
	  
			<div class="bb">
				<a href="indexmain.php">Home</a>
				<div class="dropdown1">
					<button class="dropbtn">Income sheets</button>
					<div class="dropdown-content">
						<a href="index.php">semester payments</a>
						<a href="indexexam.php">exam payments</a>
						<a href="indexbook.php">book store</a>
					</div>
				</div> 
				<a href="index1.php">Expenses</a>
				<a  class="active "href="index2.php">monthly statics</a>
				<a  href="indexmonthlystatement.php">monthly statement</a>
				<a href="moris.php">statics</a>	
			</div>
		
		
           <div class="container box">  
                 
                <br />
				<h2 align="left">Monthly Income and Expenses</h2>				
                <br /> 
				
				<form>
				<table>
				<tr>
                <td><h4>Date</h4></td>  
                <td><input type="date" name="date" id="date" class="form-control" required> </td>  
				</tr>
			
							
				</table>
				
				<br /><br />
				
                <div align="left">  
                     <input type="hidden" name="id" id="user_id" />  
                     <button type="button" name="action" id="action" class="btn btn-warning">Calculate</button>  
					 
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
                url : "select2.php",  
                method:"POST",  
                data:{action:action},  
                success:function(data){  
                     $('#date').val('');  
                     $('#income').val('');   
                     $('#expense').val('');
					 
                     $('#action').text("Calculate");  
                     $('#result').html(data);  
                }  
           });  
      }  
      $('#action').click(function(){  
           var date = $('#date').val();  
           var income = $('#income').val(); 
           var expense = $('#expense').val();
			
           var id = $('#user_id').val();  
           var action = $('#action').text();  
           if(date != '' && income != ''  && expense != ''  )
           {  
                $.ajax({  
                     url : "action2.php",  
                     method:"POST",  
                     data:{date:date, income:income, expense:expense, id:id, action:action},  
                     success:function(data){  
                          alert(data);  
                          fetchUser();  
                     }  
                });  
           }  
           else  
           {  
                alert("all Fields are Required");  
           }  
      });  
 
      $(document).on('click', '.delete', function(){  
           var id = $(this).attr("id");  
           if(confirm("Are you sure you want to remove this data?"))  
           {  
                var action = "Delete";  
                $.ajax({  
                     url:"action2.php",  
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

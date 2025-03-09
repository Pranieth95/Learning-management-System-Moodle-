<?php
session_start();
echo "<div style ='color:#ff0000'>Welcome </div>"."".$_SESSION["uname"];



?>
<a href="../a/homelogin.php"> Logout </a>
<html>  
      <head>  
			<link rel="stylesheet" type="text/css" href="mystyle.css">
			<link rel="stylesheet" type="text/css" href="style/style1.css" >
			
			
			
           <title>Semester payments </title>  
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
			</div>
				-->
	  
		
	  
			<div class="bb">
				<a href="indexmain.php">Home</a>
				<div class="dropdown1">
					<button class="dropbtn">Income sheets</button>
					<div class="dropdown-content">
						<a class="active" href="index.php">semester payments</a>
						<a href="indexexam.php">exam payments</a>
						<a href="indexbook.php">book store</a>
					</div>
				</div> 
				<a href="index1.php">Expenses</a>
				<a  href="index2.php">monthly statics</a>
				<a  href="indexmonthlystatement.php">monthly statement</a>
				<a href="moris.php">statics</a>				
				
						
			</div>  
	  
		
		
           <div class="container box">  
               
                <br />
				<h2 align="left">Semester Payments</h2>				
                <br /> 
				
				<form>
				<table>
				
				
			
			
				<tr>
                <td><h4>student id</h4></td>  
                <td><input type="text" maxlength="10" name="studentid" id="studentid" class="form-control" required> </td>  
				</tr>				
				
				<tr>
                <td><h4>Name</h4></td>  
                <td><input type="text" name="name" id="name" class="form-control" required> </td>  
				</tr>
				
				<tr>
                <td><h4>Date</h4></td>  
                <td><input type="date" name="date" id="date" class="form-control" required> </td>  
				</tr>
							
				<tr>
                <td><h4>Course category id</h4></td>  
                <td><input type="number" name="ccategoryid" id="ccategoryid" class="form-control" required > </td>  
				</tr>	
							
				<tr>
                <td><h4>Amount</h4></td>  
                <td><input type="number" name="totamount" id="totamount" class="form-control" required > </td>  
				</tr>	
				
				</table>
				
				<br /><br />
				
                <div align="left">  
                     <input type="hidden" name="id" id="user_id" />  
                     <button type="button" name="action" id="action" class="btn btn-warning">Add</button>  
					 <button type="reset" value="Reset" class="btn btn-warning" >Clear</button>
                </div>  
                <br />  
                <br /> 
				
                <div id="result" class="table-responsive">  
                </div>  
				
			</div>  
			
			<div class="container box">  
				
				
				<div class="table-responsive">
				<br />
				<div class="row">
				<div class="input-daterange">
				<div class="col-md-4">
				<input type="text" name="start_date" id="start_date" class="form-control" />
				</div>
				<div class="col-md-4">
				<input type="text" name="end_date" id="end_date" class="form-control" />
				</div>      
				</div>
				<div class="col-md-4">
				<input type="button" name="search" id="search" value="Search" class="btn btn-info" />
				</div>
				</div>
				<br />
				<table id="order_data" class="table table-bordered">
					<thead>
					<tr>
					
					
					<th>studentid</th>
					<th>name</th>
					<th>date</th>
					<th>Course category id</th>
					<th>amount</th>
					
					</tr>
					</thead>
				</table>
    
				</div>
				
			</div>	
		
				
				</form>
				
           
      </body>  
 </html>  
 <script>  
 
 

 

 $(document).ready(function(){  
 
	
	
      fetchUser();  
      function fetchUser()  
      {  
           var action = "select";  
           $.ajax({  
                url : "select.php",  
                method:"POST",  
                data:{action:action},  
                success:function(data){  
					  
                     $('#studentid').val(''); 
					 $('#name').val(''); 
					 $('#date').val(''); 
					 $('#ccategoryid').val('');
					 $('#totamount').val(''); 
					 
                     $('#action').text("Add");  
                     $('#result').html(data);  
                }  
           });  
      }  
      $('#action').click(function(){  
           
			var studentid = $('#studentid').val();
			var name = $('#name').val();
			var date = $('#date').val(); 
			var ccategoryid = $('#ccategoryid').val();           
			var totamount = $('#totamount').val();
			var id = $('#user_id').val();  
		   
           var action = $('#action').text();  
		   
           if(studentid != '' && name != '' && date != '' && ccategoryid != '' && totamount != ''  )
           {  
                $.ajax({  
                     url : "action.php",  
                     method:"POST",  
                     data:{ studentid:studentid, name:name, date:date, ccategoryid:ccategoryid, totamount:totamount, id:id, action:action},  
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
                url:"fetch.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){  
				
                     $('#action').text("Edit");					 
                     $('#user_id').val(id);  
					 
					            
					 $('#studentid').val(data.studentid); 
					 $('#name').val(data.name);  
					 $('#date').val(data.date);  
                     $('#ccategoryid').val(data.ccategoryid);					 
					 $('#totamount').val(data.totamount);
				 
                }  
           })  
      });  
      $(document).on('click', '.delete', function(){  
           var id = $(this).attr("id");  
           if(confirm("Are you sure you want to remove this data?"))  
           {  
                var action = "Delete";  
                $.ajax({  
                     url:"action.php",  
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

		 $('.input-daterange').datepicker({
		todayBtn:'linked',
		format: "yyyy-mm-dd",
		autoclose: true
		});

		fetch_data('no');

		function fetch_data(is_date_search, start_date='', end_date='')
		{
		var dataTable = $('#order_data').DataTable({
		"processing" : true,
		"serverSide" : true,
		"order" : [],
		"ajax" : {
			url:"fetchsearch.php",
			type:"POST",
			data:{
			is_date_search:is_date_search, start_date:start_date, end_date:end_date 
					}
				}
			});
		}

		$('#search').click(function(){
		var start_date = $('#start_date').val();
		var end_date = $('#end_date').val();
		if(start_date != '' && end_date !='')
		{
		$('#order_data').DataTable().destroy();
		fetch_data('yes', start_date, end_date);
		}
		else
		{
		alert("Both Date is Required");
		}
		}); 
	
	  
	});  
 </script>  

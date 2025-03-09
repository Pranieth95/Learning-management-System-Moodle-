<?php
session_start();
echo "<div style ='color:#ff0000'>Welcome </div>"."".$_SESSION["uname"];



?>
<a href="../a/homelogin.php"> Logout </a>
<html>  
      <head>  
			<link rel="stylesheet" type="text/css" href="mystyle.css">
			<link rel="stylesheet" type="text/css" href="style/style1.css" >
			
			
			
           <title>monthly statement </title>  
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
			</div> -->
				
	  
		
	  
			<div class="bb">
				<a href="indexmain.php">Home</a>
				<div class="dropdown1">
					<button class="dropbtn">Income sheets</button>
					<div class="dropdown-content">
						<a  href="index.php">semester payments</a>
						<a href="indexexam.php">exam payments</a>
						<a href="indexbook.php">book store</a>
					</div>
				</div> 
				<a href="index1.php">Expenses</a>
				<a  href="index2.php">monthly statics</a>
				<a class="active" href="indexmonthlystatement.php">monthly statement</a>
				<a href="moris.php">statics</a>	
			</div>
	  
		
		
           <div class="container box">  
               
             
				<h2 align="left">INCOME</h2>				
                <br />
				<form>
				<table>
				
				
				<tr><td>Month: </td>
				<td>
				<select id='date'>
					<option value='' selected='selected' disabled >--Select Month--</option>
					<option value='1'>Janaury</option>
					<option value='2'>February</option>
					<option value='3'>March</option>
					<option value='4'>April</option>
					<option value='5'>May</option>
					<option value='6'>June</option>
					<option value='7'>July</option>
					<option value='8'>August</option>
					<option value='9'>September</option>
					<option value='10'>October</option>
					<option value='11'>November</option>
					<option value='12'>December</option>
				</select>
				</tr> 
				</table>
				
				<br />
				<br />
				
				<div align="left">
				<input type="hidden" name="id" id="user_id" /> 
					<table><tr>                      
                     <td><button type="button" name="action" id="action" class="show btn btn-warning">Show</button></td>  
					 <td><button type="reset" value="Reset" class="btn btn-warning" >Clear</button></td></tr>
					 </table>
                </div>
				
				</form>
				<br />
				<br />
                <div id="result" class="table-responsive">  
                </div> 
		
						
				
			</div>	

			<div class="container box"> 
				 <h2 align="left">EXPENSES</h2>				
                <br />
				
				 <div id="result1" class="table-responsive">  
                </div>
				
				<form>
				<table>		
				
				<tr>
                <td><h4>Total Income   </h4></td>  
                <td><input type="text" name="income" id="income" class="form-control" disabled> </td>  
				</tr>
				
				
				<tr>
                <td><h4>Total Expense   </h4></td>  
                <td><input type="text" name="expense" id="expense" class="form-control" disabled> </td>  				 
				</tr>
				
				<tr>
                <td><h4>Profit  </h4></td>  
                <td><input type="text" name="profit" id="profit" class="form-control" disabled> </td>  				 
				</tr>
				
				<tr>
				<A HREF="javascript:window.print()">CLICK TO PRINT THIS PAGE</A>
				</tr>
				
				</table>
				</form>
			
      	   </div>	

		   
		   
      </body>  
 </html>  
 <script> 


	$(document).ready(function(){  
 
	
      //fetchUser1();  
      function fetchUser1()  
      {  
           var action = "select";  
           $.ajax({  
                url : "selectincomebackup.php",  
                method:"POST",  
                data:{action:action},  
                success:function(data){  
                     $('#date').val('');  
                     $('#studentid').val(''); 
					 $('#name').val('');                     
					 $('#amount').val(''); 
                  
                     $('#result').html(data);  
                }  
           });  
      }  
	  
	  
	  //fetchUser2();  
      function fetchUser2()  
      {  
           var action = "select";  
           $.ajax({  
                url : "selectexpenses.php",  
                method:"POST",  
                data:{action:action},  
                success:function(data){ 
						
					$('#id').val('');				
                    $('#date').val('');  
                    $('#category').val('');					
					  
                    $('#amount').val(''); 
                     
                    $('#result1').html(data);   
                }  
           });  
      }
	  
	    $('#action').click(function(){  
			var date = $('#date').val(); 
			var action = $('#action').text();  
		   
           if(date != '')
           {  
                $.ajax({  
                     url : "selectincomebackup.php", 
                     method:"POST",  
                     data:{date:date, action:action},  
                     success:function(data){  
					 
                        $('#date').val('');  
						$('#studentid').val(''); 
						$('#name').val('');                    
						$('#amount').val(''); 
                  
						$('#result').html(data);  
                          //fetchUser1();  
                     }  
                });  
           }  
           else  
           {  
                alert("all Fields required");  
           }  
        });
		
		$('#action').click(function(){  
			var date = $('#date').val(); 
			var action = $('#action').text();  
		   
           if(date != '')
           {  
                $.ajax({  
                     url : "selectexpenses.php", 
                     method:"POST",  
                     data:{date:date, action:action},  
                     success:function(data){  
                        $('#date').val('');  
						$('#studentid').val(''); 
						$('#name').val('');                    
						$('#amount').val(''); 
                  
						$('#result1').html(data);  
                          //fetchUser2();  
                     }  
                });
				
           }  
           else  
           {  
                alert("all Fields required");  
           }  
        });
		
		$(document).on('click', '.show', function(){  
           //var id = $(this).attr("id"); 
			var date = $('#date').val();
			var action = $('#action').text();
           $.ajax({  
                url:"fetchtotal.php",  
                method:"POST", 
				data:{date:date, action:action}, 
                //data:{id:id},  
                dataType:"json",  
                success:function(data){  
                    //$('#action').text("Edit");  
                    $('#income').val(data.income);   
                    $('#expense').val(data.expense);
					
					$('#profit').val(data.profit);
				 
                }  
           })  
      });



 });  
 </script>  


 
 
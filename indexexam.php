<?php
session_start();
echo "<div style ='color:#ff0000'>Welcome </div>"."".$_SESSION["uname"];



?>
<a href="../a/homelogin.php"> Logout </a>
<html>  
      <head>  
			<link rel="stylesheet" type="text/css" href="mystyle.css">
			<link rel="stylesheet" type="text/css" href="style/style1.css" >
			
           <title>exam payments </title>  
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
			</div>   -->
	  
	  
			<div class="bb">
				<a href="indexmain.php">Home</a>
				<div class="dropdown1">
					<button class="dropbtn">Income sheets</button>
					<div class="dropdown-content">
						<a href="index.php">semester payments</a>
						<a class="active" href="indexexam.php">exam payments</a>
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
				<h2 align="left">Exam Payments</h2>				
                <br /> 
				
				<form>
				<table>
				
				
				<tr>
                <td><h4>Date</h4></td>  
                <td><input type="date" name="date" id="date" class="form-control" required> </td>  
				</tr>
			
				<tr>
                <td><h4>student id</h4></td>  
                <td><input type="text" maxlength="10" name="studentid" id="studentid" class="form-control" required > </td>  
				</tr>				
				
				<tr>
                <td><h4>Name</h4></td>  
                <td><input type="text" name="name" id="name" class="form-control" required> </td>  
				</tr>
				
				
				<tr>
                <td><h4>Year</h4></td>  
                <td><select type="text" name="year" id="year" class="form-control" required> 
				<option value=""></option>
				<option value="year1">1</option>
				<option value="year2">2</option>
				<option value="year3">3</option>
				<option value="year4">4</option>
				</select>
				</td>
				</tr>
				
				<tr>
                <td><h4>Semester</h4></td>  
                <td><select type="text" name="semester" id="semester" class="form-control" required> 
				<option value=""></option>
				<option value="semester1">1</option>
				<option value="semester2">2</option>
				</select>
				</td>
				</tr>
				
				<tr>
                <td><h4>batch</h4></td>  
                <td><select type="text" name="batch" id="batch" class="form-control" required> 
				<option value=""></option>
				<option value="regular">regular</option>
				<option value="prorata">pro rata</option>
				</select>
				</td>
				</tr>
				
				<tr>
                <td><h4>exam type</h4></td>  
                <td><select type="text" name="exam" id="exam" class="form-control" required> 
				<option value=""></option>
				<option value="mid">mid exam</option>
				<option value="final">final exam</option>
				</select>
				</td>
				</tr>
				
				<tr></tr>
				<tr>
                <td><h4>subject</h4></td>  
                <td><input type="text" name="subject" id="subject" class="form-control" > </td>  
				</tr>
								
				<tr></tr>
				<tr>
                <td><h4>Amount</h4></td>  
                <td><input type="number" name="amount" id="amount" class="form-control" required > </td>  
				</tr>	
				
				</table>
				
				<br /><br />
				
                <div align="left">  
                     <input type="hidden" name="id" id="user_id" />  
                     <button type="button" name="action" id="action" class="btn btn-warning">Add</button>  
					 <button type="reset" value="Reset" class="btn btn-warning" >Clear</button>
					 
					 <button name="demo" id="demo" class="Cbutton demo" onclick="reply_click(this.id)">DEMO</button>
                </div>  
                <br />  
                <br />  
                <div id="result" class="table-responsive">  
                </div>  
				
		
				
				</form>
				
           </div>  
      </body>  
 </html>  
 
 <script type="text/javascript">
    
    function reply_click(clicked_id)
    {
        if(clicked_id == "demo")
        {
            document.getElementById('date').value = '2017-11-04';
			document.getElementById('studentid').value = 'IT16040854';
			document.getElementById('name').value = 'Savinda jayasinghe';
			document.getElementById('year').value = '1';
			document.getElementById('semester').value = '2';
			document.getElementById('batch').value = 'regular';
			document.getElementById('exam').value = 'final';
			document.getElementById('subject').value = 'psychology';
			document.getElementById('amount').value = '1500';
			
        }
    }    
    
</script>
 
 <script>  
 
 $(document).ready(function(){  
		
	
		
      fetchUser();  
      function fetchUser()  
      {  
           var action = "select";  
           $.ajax({  
                url : "selectexam.php",  
                method:"POST",  
                data:{action:action},  
                success:function(data){  
                     $('#date').val('');  
                     $('#studentid').val(''); 
					 $('#name').val(''); 
					 $('#year').val('');
                     $('#semester').val(''); 
					 $('#batch').val('');
					 $('#exam').val(''); 
					 $('#subject').val('');
					 $('#amount').val(''); 
                     $('#action').text("Add");  
                     $('#result').html(data);  
                }  
           });  
      }  
      $('#action').click(function(){  
			var date = $('#date').val();  
			var studentid = $('#studentid').val();
			var name = $('#name').val();  
			var year = $('#year').val();  
			var semester = $('#semester').val(); 
			var batch = $('#batch').val(); 
			var exam = $('#exam').val(); 
			var subject = $('#subject').val(); 
			var amount = $('#amount').val();
			var id = $('#user_id').val();  
			var action = $('#action').text();  
		   
           if(date != '' && studentid != '' && name != '' && year != '' && semester != '' && batch != '' && exam != '' && subject != '' && amount != '')
           {  
                $.ajax({  
                     url : "actionexam.php",  
                     method:"POST",  
                     data:{date:date, studentid:studentid, name:name, year:year, semester:semester, batch:batch, exam:exam, subject:subject, amount:amount, id:id, action:action},  
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
                url:"fetchexam.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){  
                    $('#action').text("Edit");  
                    $('#user_id').val(id);  
                    $('#date').val(data.date);              
					$('#studentid').val(data.studentid); 
					$('#name').val(data.name);  
                    $('#year').val(data.year);
					$('#semester').val(data.semester); 
                    $('#batch').val(data.batch);
					$('#exam').val(data.exam);
					$('#subject').val(data.subject);
					$('#amount').val(data.amount);
				 
                }  
           })  
      });  
      $(document).on('click', '.delete', function(){  
           var id = $(this).attr("id");  
           if(confirm("Are you sure you want to remove this data?"))  
           {  
                var action = "Delete";  
                $.ajax({  
                     url:"actionexam.php",  
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

<?php
//require "access.php";
?>
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
           <title>Club Management </title>  
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
   
}

.AddClub{
	
	width: 531px;
	}
	
.Member{
	width: 531px;
	position: absolute;
	left: 740px;
	top: 491px;
	}
 p.months{
	opacity:0.5;
}

.clubtitle{
	position: absolute;
	left: 733px;
	top: 368px;
	width: 529px;
	text-align: right;
}
.block {
	width: 400px;
	height: 556px;
	position: absolute;
	left: 718px;
	top: 361px;
	border-left: 1px solid;
	border-color: #DCDCDC;
 }
 
 .para{
	position: absolute;
	left: 164px;
	top: 654px;
	width: 155px;
	height: 36px;
}
.goBack{
	position: absolute;
	left: 162px;
	top: 213px;
	width: 118px;
}

a {
}

.Back{
		text-decoration: none;
    display: inline-block;
    padding: 8px 16px;
	font-size: 100%;
	    background-color: #226EC1;
	    color: white;
	    border-radius: 100%;
		}
.Back:hover {
    background-color: #55A2F5;
    color: white;
}

			</style>
		   
            
      </head>
<?php  
      $procedure = "  
      CREATE PROCEDURE selectMemberss()  
      BEGIN  
      SELECT * FROM club_member;  
      END;  
      ";  
      if(mysqli_query($conn, "DROP PROCEDURE IF EXISTS selectMemberss"))  
      {  
           if(mysqli_query($conn, $procedure))  
           {    
		   		$query = "CALL selectMemberss()";  
                $result = mysqli_query($conn, $query); 
				while($row = mysqli_fetch_array($result))  
                     {  
		
						  $now = date('Y-m-d');
						  //echo $now;
					 	  //$timequery = "SELECT bday AS date FROM club_member WHERE CIRP_ID='".$row["CIRP_ID"]."'";
						  //$result = mysqli_query($conn, $timequery);
						   
						  //$rows = mysqli_fetch_assoc($result);

	
						  //$then = $row["JoinedDate"];
						  //echo $then;
						  //$difference = ($now - $then);
						  //echo $difference;
						  //$months = floor($difference / (60*60*24*30) );
						  //echo $months;
						  
						    $date1 = new DateTime($now);
							$date2 = new DateTime($row["JoinedDate"]);

							$diff = $date1->diff($date2);

							$months = (($diff->format('%y') * 12) + $diff->format('%m'));
							//echo $row["CIRP_ID"];
						  
						  //$sqlinsert = "UPDATE club_member SET Months = '".$months."' WHERE CIRP_ID='".$row["CIRP_ID"]."'";
						  //$resultinsert = mysqli_query($conn,$sqlinsert);
						    include 'insert.php';
		

                     } 
		   }
	  }
?>   
      <body>  
      <div class="para"><p align="right"><a href="clubs.php"><b>Add New Member</b></a></p></div>
      <div class="goBack"><a href="Calendar.php" class="Back">&#8249;</a></div>
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
                <h1 align="center">Club Management</h1>  
                
                <p align="center">The Club-Handler Tool Gives You The Opportunity To Tweak With Club Data, And Member Records</p>
			 <h2 align="left">Club Details</h2>
             <p align="left">Insert the details of the new club you want to add</p>
             
                
           <div class="clubtitle">  
				<h2 align="right">Membership Fee</h2>
                <p align="right">Insert the Time-Slot and Fee amount to generate the Membership Fee per student</p>

           </div>                     
            <div class="block"></div>
                		
                
            <div class="AddClub">                 
              <form> 
				<table>								
				
                <tr>
                <td><h4>Club Name:</h4></td>  
                <td>
                	<span class="clubName">
    				<input type="text" placeholder="Enter Name" name="clubName" id="clubName" class="form-control" required="required" />
            		</span> 
                </td>         
				</tr>				
				
				<tr>
                <td><h4>Club Type:</h4></td>
                <?php
                	$query = "SELECT `clubType` FROM `clubType`";
					$result = mysqli_query($conn,$query);
				?>  
                <td><select id="clubType" name="clubType" style="min-width:100%;">
                <option selected="selected" value="" disabled>Select one</option>
                <?php
					while($row = mysqli_fetch_array($result))
					{
			  			echo '<option value="'.$row['clubType'].'">'.$row['clubType'].'</option>';
					}
				?>  					
					</select>           
                </td>
				</tr>
                </table>
				
			
                <div align="left">  
                     <input type="hidden" name="id" id="user_id" />  
                     <button type="button" name="action" id="action" class="Cbutton">Add</button>  
					 <button type="reset" value="Reset" class="Cbutton" >Clear</button>
                </div>  
                <br />  
                <br />  
                <div id="result" class="table-responsive">  
                </div>  
				
			  </form>	
             </div> 
                
                <div class="Member">
                <form>
				<table style="width:100%">

				<tr>
                <td width="40%"><h4>Time-Slot:</h4></td>  
                <td width="60%">
                	<span class="Timeslot">
    				<input type="number" placeholder="Enter the number of months in between" min="0" max="1000000" step="1" value="" name="Timeslot" id="Timeslot" class="form-control" required="required" />

        			</span> 
                </td>
                </tr>
                 
				<tr>
                <td><h4>Fee Per Time-Slot:</h4></td>  
                <td>
                	<span class="MonthFee">
    				<input type="number" placeholder="Fee per each Time-Slot" min="0" max="1000000" step="1" value="" name="MonthFee" id="MonthFee" class="form-control" required="required" />
            		
        			</span> 
                </td>  
				</tr>
		
				</table>
                <div align="right">                        
                     <input type="hidden" name="id" id="user_id" />                      
                     <button type="button" name="generate" id="generate" class="Cbutton">Generate</button>
					<button type="reset" value="Reset" class="Cbutton" >Clear</button>  

                </div>  
                <br />  
                <br />                                
                <div id="result1" class="table-responsive">  
                </div>                   
                </form>
                </div>
                	
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
                url : "select22.php",  
                method:"POST",  
                data:{action:action},  
                success:function(data){  
                     $('#clubName').val('');  
                     $('#clubType').val('');
                     $('#action').text("Add");  
                     $('#result').html(data);  
                }  
           });  
      }  
      $('#action').click(function(){  
           var clubName = $('#clubName').val();  
           var clubType = $('#clubType').val();
           var id = $('#user_id').val();  
           var action = $('#action').text();  
		   
           if(clubName != '' && clubType != '' )
           {  
                $.ajax({  
                     url : "action22.php",  
                     method:"POST",  
                     data:{clubName:clubName, clubType:clubType, id:id, action:action},  
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
                url:"fetch22.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){  
                     $('#action').text("Edit");  
                     $('#user_id').val(id);  
                     $('#clubName').val(data.clubName);              
					 $('#clubType').val(data.clubType);				 	 
                }  
           })  
      });  
      $(document).on('click', '.delete', function(){  
           var id = $(this).attr("id");  
           if(confirm("Are you sure you want to remove this data?"))  
           {  
                var action = "Delete";  
                $.ajax({  
                     url:"action22.php",  
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
	  
	  fetchUsers();  
      function fetchUsers()  
      {  
           var action = "select";  
           $.ajax({  
                url : "select33.php",  
                method:"POST",  
                data:{action:action},  
                success:function(data){  
                     $('#clubName').val('');  
                     $('#clubType').val('');
                     $('#action').text("Add");  
                     $('#result1').html(data);  
                }  
           });  
      }  
      $('#generate').click(function(){  
           var Timeslot = $('#Timeslot').val();  
           var MonthFee = $('#MonthFee').val();
           var id = $('#user_id').val();  
           var action = $('#generate').text();  
		   
           if(Timeslot != '' && MonthFee != '' )
           {  
                $.ajax({  
                     url : "action33.php",  
                     method:"POST",  
                     data:{Timeslot:Timeslot, MonthFee:MonthFee, id:id, action:action},  
                     success:function(data){  
                          alert(data);  
                          fetchUsers();  
                     }  
                });  
           }  
           else  
           {  
                alert("all Fields required");  
           }  
      }); 
	  
      $(document).on('click', '.delete1', function(){  
           var id = $(this).attr("id");  
           if(confirm("Are you sure you want to remove this data?"))  
           {  
                var action = "Delete";  
                $.ajax({  
                     url:"action33.php",  
                     method:"POST",  
                     data:{id:id, action:action},  
                     success:function(data)  
                     {  
                          fetchUsers();  
                          alert(data);  
                     }  
                })  
           }  
           else  
           {  
                return false;  
           }  
      });
	  
	  $(document).on('click', '.reset1', function(){  
           var id = $(this).attr("id");  
           if(confirm("Are you sure you want to reset this data?"))  
           {  
                var action = "Reset";  
                $.ajax({  
                     url:"action33.php",  
                     method:"POST",  
                     data:{id:id, action:action},  
                     success:function(data)  
                     {  
                          fetchUsers();  
                          alert(data);  
                     }  
                })  
           }  
           else  
           {  
                return false;  
           }  
      }); 
	  
	  $(document).on('click', '.resetall', function(){  
           var id = $(this).attr("id");  
           if(confirm("Are you sure you want to reset all the data?"))  
           {  
                var action = "ResetAll";  
                $.ajax({  
                     url:"action33.php",  
                     method:"POST",  
                     data:{id:id, action:action},  
                     success:function(data)  
                     {  
                          fetchUsers();  
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

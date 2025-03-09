<?php
	session_start();
	$email=$_SESSION['name'];
	
    $id=$_SESSION['uname'] ;

	include 'config.php';
	$result= mysqli_query($conn , "SELECT * FROM question WHERE `user_email`='$email'");
	while ($row = mysqli_fetch_assoc($result)){

	}

	if (isset($_POST['edit'])) 
	{
		$qid=$_POST["qid"];
		echo $qid;

		$result= mysqli_query($conn , "SELECT * FROM question WHERE `q_ID`='$qid'");
		while ($row = mysqli_fetch_assoc($result))
		{
			echo $row['topic'];
			echo $row['category'];
			echo $row['q_detail'];
		}
	}
	if (isset($_POST['editAns'])) 
	{
		$aid=$_POST["aid"];
		echo $aid;

		$result= mysqli_query($conn , "SELECT * FROM answer WHERE `id`='$aid'");
		while ($row = mysqli_fetch_assoc($result))
		{
			echo $row['id'];
			echo $row['answer'];
			echo $row['q_ID'];
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<style type="text/css">
    .bgimg 
    {
        background-image: url('logo.png');
        height: 100px; 
        width: auto;
        background-repeat: no-repeat;
        background-position: center;

    }
</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <div class="bgimg"></div>
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- /.navbar-header -->

            
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="home.php"><i class="fa fa-home fa-fw"></i>Home</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ASK ME</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-stack-overflow fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">TOP 10</div>
                                    <div>Top Rating Questions</div>
                                </div>
                            </div>
                        </div>
                        <a href="top.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Questions</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-stack-overflow fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">LAST 10</div>
                                    <div>Low Rating Questions</div>
                                </div>
                            </div>
                        </div>
                        <a href="last.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Questions</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa glyphicon-pencil fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    
                                    <div><?php echo "$email" ?></div>
                                </div>
                            </div>
                        </div>
                        <a href="account.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-home fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Click on to go to home page of the system</div>
                                </div>
                            </div>
                        </div>
                        <a href="../../../a/student.php">
                            <div class="panel-footer">
                                <span class="pull-left">Click On to Go to Home Page</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            





            <div class="row">
                
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Questions
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Question ID</th>
                                            <th>Topic</th>
                                            <th>Question Details</th>
                                            <th>Category</th>
                                            <th><i class="fa fa-trash-o"></i></th>
                                            <th><i class="fa fa-pencil"></i></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $result= mysqli_query($conn , "SELECT * FROM question WHERE `user_email`='$email'");
									while ($row = mysqli_fetch_assoc($result)){
										
										
                                        echo'<tr class="warning">';
                                            echo'<td>'.$row['q_ID'].'</td>';
                                            echo'<td>'.$row['topic'].'</td>';
                                            echo'<td>'.$row['q_detail'].'</td>';
                                            echo'<td>'.$row['category'].'</td>';
                                            echo'<td>';
                                            		echo'<form action="deleteQ.php" method="post">';
                                            			echo'<input type="hidden" name="qid" value="'.$row['q_ID'].'">';
                                            			echo'<input type="submit" class="btn btn-outline btn-primary" value="Delete" name="delete">';
                                            		echo'</form>';
                                			echo'</td>';
                                            echo'<td>';
                                            		echo'<form method="post" action="">';
                                            		echo'<input type="hidden" name="qid" value="'.$row['q_ID'].'">';
                                            		echo'<input type="submit" class="btn btn-outline btn-primary" value="Edit" name="edit">';
                                				echo'</td>';
                                				echo'</form>';
                                        echo'</tr>';
                                        }
										
										?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>



                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-book fa-fw"></i> Edit your question here
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
								<?php	
									if (isset($_POST['edit'])) 
									{
										$qid=$_POST["qid"];
										
										$result= mysqli_query($conn , "SELECT * FROM question WHERE `q_ID`='$qid'");
										while ($row = mysqli_fetch_assoc($result))
										{
											
											echo'<form role="form" action="edit.php" method="post">';
                                			echo'<div class="form-group">';
                                        		echo'<label>question Topic</label>';
                                        		echo'<input type="text" name="topic" class="form-control" placeholder="Enter text" value="'.$row['topic'].'">';
                                			echo'</div>';
                                			echo'<div class="form-group">';
                                            	echo'<label>Selects</label>';
                                            	echo'<select class="form-control" name="category">';
                                                	echo'<option>category 1</option>';
                                                	echo'<option>category 2</option>';
                                                	echo'<option>category 3</option>';
                                                	echo'<option>category 4</option>';
                                                	echo'<option>category 5</option>';
                                            	echo'</select>';
                                        	echo'</div>';
                                			echo'<div class="form-group">';
                                            	echo'<label>Text area</label>';
                                            		echo'<input type="text" name="q_detail" value="'.$row['q_detail'].'" class="form-control">';
                                			echo'</div>';
                                			echo'<div class="form-group">';
                                				echo'<input type="hidden" name="qid" value="'.$row['q_ID'].'">';
                                				echo'<input type="submit" name="edit" class="btn btn-success" value="Edit">';
                                			echo'</div>';
                                		echo'</form>';
                                		}
                                	}
                                ?>

                                </div>
                        </div>
                            
                    </div>
                </div>


                    

                   


                    
                    </div>



                <!-- /.col-lg-6 -->
            
            <!-- /.row -->
            <div class="row">
                
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Answers
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Answer ID</th>
                                            <th>Answer</th>
                                            <th>Question Details</th>
                                            <th><i class="fa fa-trash-o"></i></th>
                                            <th><i class="fa fa-pencil"></i></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php



                                    $result= mysqli_query($conn , "SELECT * FROM answer WHERE `user_email`='$email'");
									while ($row = mysqli_fetch_assoc($result))
									{
										$q_ID=$row['q_ID'];
										
										$result2=mysqli_query($conn , "SELECT * FROM question WHERE `q_ID`='$q_ID'");
										while ($rows = mysqli_fetch_assoc($result2))
										{
											$q_detail=$rows['q_detail'];
										
	                                        echo'<tr class="danger">';
	                                            echo'<td>'.$row['id'].'</td>';
	                                            echo'<td>'.$row['answer'].'</td>';
	                                            echo'<td>'.$q_detail.'</td>';
	                                            echo'<td>';
	                                            		echo'<form action="deleteA.php" method="post">';
	                                            			echo'<input type="hidden" name="aid" value="'.$row['id'].'">';
                                                            echo'<input type="hidden" name="qid" value="'.$q_ID.'">';
	                                            			echo'<input type="submit" class="btn btn-outline btn-primary" value="Delete" name="delete">';
	                                            		echo'</form>';
	                                			echo'</td>';
	                                            echo'<td>';
	                                            		echo'<form method="post" action="">';
	                                            		echo'<input type="hidden" name="aid" value="'.$row['id'].'">';
	                                            		echo'<input type="submit" class="btn btn-outline btn-primary" value="Edit" name="editAns">';
	                                				echo'</td>';
	                                				echo'</form>';
	                                        echo'</tr>';
                                        }
                                    }
										
									?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>






                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-book fa-fw"></i> Edit your answer here
                        </div>
                        <!-- /.panel-heading -->

                        <?php 
                        	if (isset($_POST['editAns'])) 
							{
								$aid=$_POST["aid"];
								echo $aid;

								$result= mysqli_query($conn , "SELECT * FROM answer WHERE `id`='$aid'");
								while ($row = mysqli_fetch_assoc($result))
								{
									echo $row['id'];
									echo $row['answer'];
									echo $row['q_ID'];
								
							
                        

                        		echo'<div class="panel-body">';
                            		echo'<div class="list-group">';
                            			echo'<form role="form" action="editA.php" method="post">';
                                			echo'<div class="form-group">';
                                            	echo'<label>Answer</label>';
                                            	echo'<textarea name="answer" class="form-control" rows="3"></textarea>';
                                			echo'</div>';
                                				echo'<input type="hidden" name="aid" value="'.$row['id'].'">';
                                				echo'<input type="submit" name="editAns" class="btn btn-success" value="edit">';
                               
                						echo'</form>';
                            		echo'</div>';
                            
                        		echo'</div>';
                        		}
                        	}
                        ?>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

                <!-- /.col-lg-6 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>

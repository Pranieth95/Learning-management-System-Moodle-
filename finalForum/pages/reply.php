<?php
	session_start();
$id=$_SESSION['id'] ;
    echo $id;
    $name=$_SESSION['name'];
    echo $name;
	if(isset($_POST['submit']))
	{
		$id=$_POST['id'];
		$_SESSION['qid']=$id;
include 'config.php';
	$result= mysqli_query($conn , "SELECT * FROM answer WHERE `q_ID`='$id'");
while ($row = mysqli_fetch_assoc($result)){
	
	
	}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ASK ME - online forum</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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

</head>

<body>

    <div class="bgimg"></div>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"></a>
            </div>
                

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
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-question-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $_SESSION['qid'] ?></div>
                                    <div>Questions ID</div>
                                </div>
                            </div>
                        </div>
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
                                    
                                    <div>Edit your Questions and Answers Here</div>
                                </div>
                            </div>
                        </div>
                        <a href="initaccount.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                	<!--starting of question panal-->


                		

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i> Answers
                        </div>
                        <!-- starting of question 1-->
                        <?php

                        if(isset($_POST['submit']))
							{
								$id=$_POST['id'];
								
	
								$result= mysqli_query($conn , "SELECT * FROM answer WHERE `q_ID`='$id'");
								while ($row = mysqli_fetch_assoc($result))
								{
						
                        		echo'<div class="panel-body">';
                				echo'<div class="col-lg-4">';
                    			echo'<div class="panel panel-success">';
                        			echo'<div class="panel-heading">By 
                           	 			'.$row['user_email'].'   (QID'.$id.')
                        			</div>
                        			<div class="panel-body">
                            		<p>'.$row['answer'].'</p>
                        			</div>
                        				<div class="panel-footer">
                        				</div>
                    				</div>
                    				
                            
                            
                            
                				</div>
                				</div>';
                			}
                		}
                		?>



                        <!-- /end of question1 -->
                    </div>
               
                    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
               












 


                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-book fa-fw"></i> Post your answer here
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                            	<form role="form" action="insertA.php" method="post">
                                
                                <div class="form-group input-group">
                                        <span class="input-group-addon">@</span>
                                        <input type="email" name="username" class="form-control" placeholder="Username">
                                 </div>
                                <div class="form-group">
                                            <label>Question ID</label>
                                            <input type="text" name="qid" class="form-control" placeholder="Enter text">
                                </div>
                                <div class="form-group">
                                            <label>Answer</label>
                                            <textarea name="answer" class="form-control" rows="3"></textarea>
                                </div>
                                
                                <input type="submit" name="submit" class="btn btn-success" value="Post">
                                <div class="form-group">
                                            <?php if( isset($_GET['registeration_successfull'])){ ?><?php echo $_GET['registeration_successfull']; ?>
                                <?php } ?>
                                <?php if( isset($_GET['registeration_fail'])){ ?><?php echo $_GET['registeration_fail']; ?>
                                <?php } ?>
                                </div>
                                

                                
                				</form>
                            </div>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    

                   


                    
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
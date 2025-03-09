<?php
    session_start();
    include 'config.php';
    if(isset($_POST["submit"]))
    {
        $lecturer_ID = $_POST["lecID"];
        $_SESSION['sc']=$lecturer_ID;
        echo $lecturer_ID;
    }


    $result2= mysqli_query($conn , "SELECT * FROM feedback_question_cos");
    while ($row = mysqli_fetch_assoc($result2))
    {
            
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

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

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

    <div id="wrapper">

        <div class="bgimg"></div>
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="../../../a/student.php">HOME
                        <i class="fa fa-home fa-fw"></i>
                    </a>
                    
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                            <!-- /.nav-second-level -->
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        echo'<h1 class="page-header">Feedback on Lecturer</h1>';
            

                         
                    if( isset($_GET['insert_successfull'])){ echo $_GET['insert_successfull']; }
                            echo'<fieldset>';
                                echo'<div class="form-group">';
                                    
                                echo'</div>';
                                 
                            echo'</fieldset>';
                    echo'</div>';
                echo'</div>';
            echo'<div class="row">';
                
                
                    $result2= mysqli_query($conn , "SELECT * FROM feedback_question_cos");
                    while ($row = mysqli_fetch_assoc($result2))
                    {
                        $id=$row['id'];
                            echo'<form role="form" action="insertc.php" method="post">';
                            echo'<div class="col-lg-4">';    
                                echo'<div class="panel panel-info">';
                                    echo'<div class="panel-heading">';
                                        echo $row['question'];
                                    echo'</div>';
                                    echo'<div class="panel-body">';
                                                    echo'<div class="form-group">';
                                                        echo'<label class="radio-inline">
                                                            <input type="radio" name="radio" id="optionsRadiosInline1" value="10" checked>Weak
                                                        </label>';
                                                        echo'<label class="radio-inline">
                                                            <input type="radio" name="radio" id="optionsRadiosInline2" value="20">Good
                                                        </label>';
                                                        echo'<label class="radio-inline">
                                                            <input type="radio" name="radio" id="optionsRadiosInline3" value="30">Excellent
                                                        </label>';
                                                        echo'<label class="radio-inline">
                                                            <input type="hidden" name="feedback_ID" value="'.$id.'">
                                                        </label>';
                                                    echo'</div>';
                                    echo'</div>';
                                    echo'<div class="panel-footer">';
                                        echo'<button type="submit" name="submit" class="btn btn-success">Submit
                                                        </button>';
                                                        
                                    echo'</div>';
                                echo'</div>';
                            echo'</div>';
                            echo'</form>';
                    }
                    
                ?>
                
                
                    </div>
            
            
            
        
            <!-- /.row -->
            
            <!-- /.row -->
            
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="jumbotron">
                        <h1>Calculate Rate</h1>
                        <a href="updateRate.php" class="btn btn-primary btn-lg" role="button">Calculate</a>
                        </p>
                        <h1>Generate Report</h1>
                        <a href="generate_chart_course.php" class="btn btn-primary btn-lg" role="button">Generate</a>
                        </p>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

            </div>
            <!-- /.container-fluid -->
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>

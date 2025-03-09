<?php
session_start();
include 'config.php';

$result2= mysqli_query($conn , "SELECT * FROM lecturer ");

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $lecturer_ID = $_POST["lecID"];
    $_SESSION['sc']=$lecturer_ID;
        
        header('location:./cos.php');
        
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
                   
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="**************"><i class="fa fa-home fa-fw"></i>HOME</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                            
                            <h1 class="page-header">Lecturers</h1>

                            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Provide Feedback for following Lecturers
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                
                                <?php
                                while ($row = mysqli_fetch_assoc($result2))
                                {
                                echo'<form method="post" action="cos.php">';
                                echo'<div class="panel panel-default">';
                                    echo'<div class="panel-heading">';
                                        echo'<h4 class="panel-title">';
                                            echo'<input type="submit" name="submit" class="btn btn-primary" value="Provide Feedback">';
                                            echo'<input type="hidden" name="lecID" value="'.$row['lecturer_ID'].'">';
                                    echo'</div>';
                                    echo'<div id="collapseOne" class="panel-collapse collapse in">';
                                       echo'<div class="panel-body"> Name : 
                                         '.$row['name'].' Subject :  '.$row['subject'].'
                                        </div>';
                                    echo'</div>';
                                echo'</div>';
                                echo'</form>';
                                }
                                ?>
                                
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
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

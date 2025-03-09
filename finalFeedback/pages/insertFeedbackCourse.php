<?php
    session_start();
include'config.php';
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
    <script>
function getcity(id) {
            xhr = new XMLHttpRequest();
            xhr.open('GET' , 'test.php?idd='+id, true);
            xhr.send();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status==200){
                    document.getElementById("city_display").innerHTML = xhr.responseText;
                    }
            
                }


}

function getEmail(emailid){

            email  = new XMLHttpRequest();
            email.open('GET' , 'test2.php?email='+emailid, true);
            email.send();
            email.onreadystatechange = function(){
                if (email.readyState == 4 && email.status == 200)
                {
                    
                    document.getElementById('emailDiv').innerHTML = email.responseText;
                    }
                
                }
    
    
    }
    
    function password (pass){
    var a = document.getElementById('pass1').value;
    //  document.write(a);
        var b = document.getElementById('pass2').value;
        if (a == b ){
            document.getElementById('cnfrmpass').innerHTML = "<font color='#00CC00'>Matched</font>";
            }
            else {
                
                document.getElementById('cnfrmpass').innerHTML = "<font color='red'>Miss matched</font>";
                }
        }
</script>

</head>

<body>

    <div id="wrapper">

        <div class="bgimg"></div>
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            
            <!-- /.navbar-header -->

            <!-- /.navbar-top-links -->

            
    <!-- /#wrapper -->

    <!-- jQuery -->
    <div class="container">
        <div class="row">
            
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Enter question which you need a feedback</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="insertFeedbackProcess.php">
                            <fieldset>
                                <div class="form-group">
                                     <label>question</label>
                                            <textarea name="feedbackCourse" rows="10" col="10" class="form-control" rows="3"></textarea>
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="insertFeedbackCourse" value="Insert" class="btn btn-lg btn-success btn-block">
                                <?php if( isset($_GET['insert_successfull'])){ ?><?php echo $_GET['insert_successfull']; ?>
                                <?php } ?>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Feedback Question
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th>feedback ID</th>
                                            <th>feedback</th>
                                            <th>delete</th>
                                        </tr>
                                    </thead>
               <?php 
               $result7= mysqli_query($conn,"SELECT * FROM feedback_question_cos");
               while($row=mysqli_fetch_assoc($result7))
                {

                                    echo'<form action="deletef.php" method="post">';
                                    echo'<tbody>';
                                        echo'<tr class="info">';
                                            echo'<td>'.$row['id'].'</td>';
                                            echo'<td>'.$row['question'].'</td>';
                                            echo'<td>
                                                    <input type="hidden" name="id" value="'.$row['id'].'">
                                                    <input type="submit" name="submit" value="Delete">
                                                </td>';

                                        echo'</tr>';
                                    echo'</tbody>';
                                    echo'</forum>';
                                
                            
                            echo'<!-- /.table-responsive -->';
                        
                    }
                    ?>
                </table>
                </div>
                </div>
                        
                </div>
                    
                </div>
        </div>
    </div>
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
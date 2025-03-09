<?php

include 'config.php';

$result6= mysqli_query($conn,"SELECT * FROM lecturer");
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

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
	['lecturer_ID','total_rate'],
<?php

    while($row=mysqli_fetch_assoc($result6))
    {
    	$lid=$row['lecturer_ID'];
		$tRate=$row['total_rate'];
        
        echo "['".$row['lecturer_ID']."',".$row['total_rate']."],";
        	

		
   }	

?>
        ]);

        var options = {
          title: 'Perfomance chart of lecturers'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    
</head>

<body>

    <div id="wrapper">

        <div class="bgimg"></div>
      
<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class= "nav" id="side-menu">
                        
                        <li>
                            <a href= "../../../a/student.php"< i class="fa fa-home fa-fw"> </i>HOME</a>
                        </li>
                    </ul>
                <div>
               
            </div>
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            
            <!-- /.navbar-header -->

            <!-- /.navbar-top-links -->

            
    <!-- /#wrapper -->

    <!-- jQuery -->
    <div class="container">
        <div class="row">
            
               <div id="piechart" style="width: 900px; height: 500px;"></div>
                

               <div class="col-lg-6">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                            Lecturer
                        </div>
                        <div class="panel-body">
                        	<div class="table-responsive">
                        	<table class="table">
                                    <thead>
                                        <tr>
                                            <th>Lecturer ID</th>
                                            <th>Name</th>
                                            <th>Subject</th>
                                            <th>email</th>
                                        </tr>
                                    </thead>
               <?php 
               $result7= mysqli_query($conn,"SELECT * FROM lecturer");
               while($row=mysqli_fetch_assoc($result7))
    			{
               
                        
                            
                                
                                    echo'<tbody>';
                                        echo'<tr class="info">';
                                            echo'<td>'.$row['lecturer_ID'].'</td>';
                                            echo'<td>'.$row['name'].'</td>';
                                            echo'<td>'.$row['subject'].'</td>';
                                            echo'<td>'.$row['email'].'</td>';
                                        echo'</tr>';
                                    echo'</tbody>';
                                
                            
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



























<!DOCTYPE html>
<html>

<head>
  <title>colour_blue - another page</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style.css" title="style" />
  <meta charset="utf-8">
    

    

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><!--a href="index.html">Online <span class="logo_colour">Quiz System</span></a--></h1>
        </div>
      </div>
      <div id="menubar">
      </div>
    </div>
    
    
    <div id="content_header"></div>
    
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
       
      </div>
      <div id="content">
        <!-- insert the page content here -->
                        <div class="panel-body">
                        <form role="form" method="post" action="insertLecturersProcess.php">
                            <fieldset>
                                <div class="form-group">
                                <input class="form-control" placeholder="Lecturer ID" name="lid" required pattern="['SS']+.{6}$" title="Insert format with SSxxxxxx" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                <input class="form-control" placeholder="Name" name="name" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                <input class="form-control" placeholder="Password" name="pw" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                <input class="form-control" placeholder="Subject" name="sub" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                <input class="form-control" placeholder="Email" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                <input class="form-control" placeholder="Address" name="address" type="text" autofocus>
                                </div>
                            <input type="submit" name="submit" value="Insert" class="btn btn-primary btn-lg btn-block">
                            </fieldset>
                        </form>
                    </div>
      
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; Hasi| SLLIT | ITP |Group 4
    </div>
  </div>
</body>
</html>

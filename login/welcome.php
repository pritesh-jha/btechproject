<!-- 
HTML
Creator Name: @pritesh jha
date: 7/12/2020
 -->
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Rkmgec Project</title>
  

    <!-- Bootstrap core CSS -->
    <link href="../template/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../template/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../template/assets/js/ie-emulation-modes-warning.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        body{font: 14px sans-serif; text-align: center; }
        .pritesh .container{padding-top: 40px;}
        .pj { height: 200px; 
    overflow: auto;  }
    </style>
    
  </head>
  <body>
    <!-- ===================navbar start=============================== -->
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="welcome.php">Electrical Project</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
            <li class="active"><a href="welcome.php">Home</a></li>
            <li><a href="../pages/about.html">About</a></li>
            <li><a href="../pages/contact.html">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="welcome.php">Profile</a></li>
                <li><a href="reset-password.php">Password reset</a></li>
                <li><a href="logout.php">Sign out</a></li>
                
              </ul>
            </li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
    <!-- ===================navbar end=============================== -->
    <div class="pritesh">
        <div class="container">
            <div class="page-header">
                <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Your Profile.</h1>
            </div>
                       <div class="pj"><div class="table-responsive">
                                <table id="table" class="table table-bordered" >
                                <thead>
                                     <tr style="background: linear-gradient(to bottom, #33ccff 0%, #ffccff 100%);">
                                        <th scope="col">Time(H:M:S)</th>
                                        <th scope="col">voltage(V)</th>
                                        <th scope="col">Current(Amp)</th>
                                        <th scope="col">Power(KW)</th>
                                     </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                                </table>
                        </div></div>
                        <p>
                            <a id="fresh" class="btn btn-danger" onclick="onRefreshPress()">Refresh</a>
                        </p>
                  <!--Main table close -->
                  <div class="container">
                    <!--Realtime graph -->
                  <div id="chart"></div>
                  </div>
        </div>
    </div>
<script src="../template/randomvip.js"></script>
<script src="../template/plotly.js"></script>
<script>
              
    </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="template/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../template/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../template/assets/js/ie10-viewport-bug-workaround.js"></script>
    
  </body>
</html>

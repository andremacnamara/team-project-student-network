<!--/*-->
<!-- * Register.php-->
<!-- *-->
<!-- * Date e.g. 8th May 2017-->
<!-- *-->
<!-- * @reference http://www.codingcage.com/2015/01/user-registration-and-login-script-using-php-mysql.html-->
<!-- * @author Andre MacNamara X14380181-->
<!-- *-->
<!-- */ -->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Network</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <style>
   
  </style>
</head>
<body>
  <nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../index.php">The Student Network</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
         <li><a href="../JobsPortal/JobIndex.php">Jobs</a></li>
         <li><a href="../Message/inbox.php">Messenger</a></li>
         <li><a href="../ModuleReview/index.php">Module Review</a></li>
         <li><a href="../Storage/storage.php">Storage</a></li>
         <li><a href="../Profile/Profile.php">Social</a></li>
         <li><a href="../Profile/Search.php">Find Friends</a></li>
         <li><a href="../Events/Events.php">Events</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
           if($_SESSION['signed_in'])
           {
             echo '<li class="welcomeMessage" style="color: white; padding-top: 15px;">Welcome ' . $_SESSION['userName'] . '</li>';
             echo '<li><a href="../Accounts/Logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li></ul>';
           }
           else 
           {
             echo '<li><a href="../Accounts/Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
             echo '<li><a href="../Accounts/Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
           }       
        ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

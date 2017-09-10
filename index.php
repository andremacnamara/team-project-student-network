<?php
    ob_start();
    session_start();
    
    include 'Database/Dbconnect.php';
    include 'Accounts/Header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>The Student Network</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="content">
                    <h1>The Student Network</h1>
                    <h3>What's in your student network</h3>
                    <hr>
                    <button class="btn btn-default btn-lg"><i class="fa fa-hand-o-right" aria-hidden="true"></i><a href="../Accounts/Login.php">Get Started</a></button>
                </div><!-- /.content -->
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
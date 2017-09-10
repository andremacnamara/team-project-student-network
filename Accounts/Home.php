<?php
	ob_start();
	session_start();
	require_once '../Database/Dbconnect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: ../index.php"); //Should be index.php
		exit;
	}
	
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['Name']);
	$userRow=mysql_fetch_array($res);
?>

<!DOCTYPE html>
    <html>  
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title>
                    Welcome - <?php echo $userRow['userEmail']; ?>
                </title>
                
                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
                <link rel="stylesheet" href="../style.css" type="text/css" />
        </head>
        
        <body>
            Hi' <?php echo $userRow['Name']; ?>&nbsp;</a>
            <a href="Logout.php?logout">Sign Out</a>
    
            <!-- jQuery first, then Tether, then Bootstrap JS. -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>

        </body>
    </html>
<?php ob_end_flush(); ?>
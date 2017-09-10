
<?php
 ob_start();
 session_start();
    include '../Accounts/Header.php';
    include '../Database/Dbconnect.php';
    include 'comments.link.php';
    include 'dbConnect.php';
    
    
    date_default_timezone_set('Europe/Ireland');
    
   
?>

<!DOCTYPE html>
<html>
<head>
    <title>Review </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <h1><center> Modules Review</center></h1>
    

</head>

<body>
<div align="center">
     <div class="row">
            <div class="col-md-4" style="float: none;
            margin: 0 auto">
                
            </div>
        </div>

<?php
echo "<form method='POST' action='".setComments($conn)."'>
<div align='enter'>
     <div class='row'>
            <div class='col-md-4' style='float: none';
                 margin: 0 auto'>
                    <div class='form-group'>
                        <label> Modules List</label>
                        <select class='form-control' name='mPic'>
                            <option value='Team Project'>Team Project</option>
                            <option value='Wireless Networking'>Wireless Networking</option>
                            <option value='Advanced Internet Technologies'>Advanced Internet Technologies</option>
                            <option value='Advanced Database'>Advanced Database</option>
                            <option value='Advanced Programming'>Advanced Programming</option>
                        </select>
                    </div>
            </div>
        </div>
    <input type='hidden' name='uid' value='Anonymous'>
    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea name='message'></textarea><br>
    <button type='submit' name='commentSubmit'> Submit Review </button>
</form>";
getComments($conn);

$mPic = $_POST['mPic'];
?>
</div>
<footer style="margin-top:5%">
     <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                         &copy; The Student Network
                    </div>
                </div>
            </div>
        </div>
</footer>


</body>
</html>






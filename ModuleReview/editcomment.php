<?php
 ob_start();
 session_start();
    include '../Accounts/Header.php';
    include '../Database/Dbconnect.php';
    include 'dbConnect.php';
    include 'comments.link.php';
    
    date_default_timezone_set('Europe/Ireland');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Review </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    
<?php
$cid = $_POST['cid'];
$uid = $_POST['uid'];
$date = $_POST['date'];
$messsage = $_POST['message'];

echo "<div align='center'>
    <form method='POST' action='".editComments($conn)."'>
    <input type='hidden' name='cid' value='".$cid."'>
    <input type='hidden' name='uid' value='".$uid."'>
    <input type='hidden' name='date' value='".$date."'>
    <textarea name='message'>".$messsage."</textarea><br>
    <button type='submit' name='commentSubmit'> Edit </button>
</form>
</div>";


?>

</body>
</html>
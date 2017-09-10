<?php
define('DBHOST', localhost);
    define('DBUSER', 'andremac96');
    define('DBPASS', '');
    define('DBNAME', 'StudentNetwork');
    
    $dbcon = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
    
    if (!dbcon){
        die('error connecting to database');
        
    }

$id = $_GET['id']; // $id is now defined
$delete = "DELETE FROM Status WHERE id='".$id."'";

// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

mysqli_query($dbcon,$delete);
if($delete = true){
    header('Location: ../Profile/Profile.php');
}
mysqli_close($dbcon);
?>
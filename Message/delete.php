<?php
// Your database info
   define('DBHOST', localhost);
    define('DBUSER', 'andremac96');
    define('DBPASS', '');
    define('DBNAME', 'StudentNetwork');
    
    $dbcon = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
    
    if (!dbcon){
        die('error connecting to database');
        
    }

$id = $_GET['id']; // $id is now defined
$delete = "DELETE  FROM messages WHERE id='".$id."'";

// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

mysqli_query($dbcon,$delete);
if($delete = true){
    header('Location: ../Message/inbox.php');
}
mysqli_close($dbcon);
?>
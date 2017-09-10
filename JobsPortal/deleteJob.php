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

$JobId = $_GET['JobId']; // $id is now defined
$delete = "DELETE FROM Jobs WHERE JobId='".$JobId."'";

// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

mysqli_query($dbcon,$delete);
if($delete = true){
    header('Location: JobsCategory.php?id=1');
}
else {
    echo '<h1>An error has occured</h1>';
}
mysqli_close($dbcon);
?>
<?php


    define('DBHOST', localhost);
    define('DBUSER', 'andremac96');
    define('DBPASS', '');
    define('DBNAME', 'StudentNetwork');
    
    $dbcon = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
    
    if (!dbcon){
        die('error connecting to database');
        
    }
   


?>
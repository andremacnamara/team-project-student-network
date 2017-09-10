<?php
    //Avoid mysql_connect depreciation error
    error_reporting( ~E_DEPRECATED & ~E_NOTICE );
    
    define('DBHOST', localhost);
    define('DBUSER', 'andremac96');
    define('DBPASS', '');
    define('DBNAME', 'StudentNetwork');
    
    $conn = mysql_connect(DBHOST, DBUSER, DBPASS);
    $dbconn = mysql_select_db(DBNAME);
    
    if (!$conn) {
        die("The connection has failed : " . mysql_error());
    }
    
    if ( !$dbconn ) {
        die ("The Database Connection has failed : " . mysql_error());
    }
    
    //Webmaster Email
$mail_webmaster = 'example@example.com';

//Top site root URL
$url_root = 'http://www.example.com/';

/******************************************************
-----------------Optional Configuration----------------
******************************************************/

//Home page file name
$url_home = 'index.php';

//Design Name
$design = 'default';
?>
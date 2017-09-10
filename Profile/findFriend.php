<?php
ob_start();
    session_start();
     include '../Message/connect-mysql.php';
     
$userQuery = "
    SELECT 
        users.userName,
        users.userEmail,
        profile1.Status,
        profile1.bio
    FROM users
    LEFT JOIN profile1
    ON users.userId  = profile1.userId
";

$users = $dbcon->query($userQuery);

?>
<html>
    <head>
        
    </head>
    
    <body>
        
        <form action="findfriends.php" method="get">
            <select name="user">
                <option value="">Find User </option>
                <?php 
                $rows = array();
                
                
                while ($row = $users->fetch_assoc()) {?>
                <?php $rows[] = $row; }?>
            <?php echo json_encode($rows)?>
            
            </select>
        </form>
    </body>
    
</html>
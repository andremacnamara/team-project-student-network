 <?php
ob_start();
    session_start();
     include '../Message/connect-mysql.php';
     
 
  $uuu = $_SESSION['userId'];
  
 
  //"INSERT INTO Profile (bio, userId) VALUES ('".$_GET['bio1']."'', '$uuu' )";
 if (!empty($_GET)) {
            $SQL = "UPDATE profile1 SET bio = '{$_GET['bio1']}', location = '{$_GET['location1']}', 
            gender = '{$_GET['gender1']}', birthday = '{$_GET['bday1']}'
            WHERE userId = '{$uuu}' ";
            
                               $result = mysqli_query($dbcon, $SQL);
                                           echo "$uuu";
                                   } else {
                                     echo -1;
                           };
 
 
 
 
 ?>
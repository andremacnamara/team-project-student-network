<?php
ob_start();
    session_start();
     include '../Message/connect-mysql.php';
     include '../Accounts/Header.php';

$resSearch = $dbcon->query("select * from users");

    if(isset($_SESSION['signed_in']) == false){
     echo 'You must be logged in <a href="../Accounts/Login.php">Login</a>';
    } else {  
        echo htmlentities($_SESSION['user_name']);
        include '../Message/connect-mysql.php';
        
         $iii = $_SESSION['userId'] ;
        $sql = "SELECT * FROM users WHERE userId = '{$_SESSION['userId']}'";
        $Rbio = "SELECT bio FROM profile1 WHERE userId = '$iii' ";
        $Rloc = "SELECT location FROM profile1 WHERE userId = '$iii'";
       $Rbday = "SELECT birthday FROM profile1 WHERE  userId = '$iii'";
        $Rgen = "SELECT gender FROM profile1 WHERE userId = '$iii'";
        
        $bioGet = mysqli_query($dbcon, $Rbio) or die('error getting data');
        $locGet = mysqli_query($dbcon, $Rloc) or die('error getting data');
        $bdayGet = mysqli_query($dbcon, $Rbday) or die('error getting data');
        
        $genGet = mysqli_query($dbcon, $Rgen) or die('error getting data');
        $result = $dbcon->query($sql);
        
        $_SESSION['userId'] ;
         $uuu = $_SESSION['userId'];
?>

<html>
    <head>
    <title>The Student Network</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
    <body>
        
        <?php
            echo '<div class="mainbody container-fluid">
                    <div class="row">
                		<div style="padding-top:0px;"></div>
                			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                				<div class="panel panel-default">
                					<div class="panel-body">
                						<div class="media">
                							<div align="center">';
               					
                            $_SESSION['userId'];
                            $sqlpic = "SELECT userPic FROM profile1 WHERE userId = '{$_SESSION['userId']}'";
                            $resultpic = $dbcon->query($sqlpic);

                            if ($result->num_rows > 0) {
                                 // output data of each row
                                 while($row = $resultpic->fetch_assoc()) {
                                 echo "<img width='200' height='200' src='../Profile/pictures/".$row['userPic']."' alt='Profile Pic'> <br/>";
                                 }
                                 
                            }
                            	include '../Message/connect-mysql.php';
                			 if(isset($_POST['submit'])){
                              move_uploaded_file($_FILES['file']['tmp_name'],"../Profile/pictures/".$_FILES['file']['name']);
                
                              $q = mysqli_query($dbcon,"UPDATE profile1 SET userPic = '".$_FILES['file']['name']."' WHERE userId = '".$_SESSION['userId']."'");
                                                    }	
                			 	
                							echo '<br/><div align="center"><form action="" method="post" enctype="multipart/form-data">
                        
                        
                </form></div> </div>
                							
                							<div class="media-body">
                								<hr>
                								<h3><strong>Bio</strong></h3>
                								';
                								
                								while($row = $bioGet->fetch_assoc()) {
                								    echo "<textarea id='bio1' type='text' name='bio1' value='' required>" .$row['bio']. "</textarea>";
                								};
                								
                								echo '
                								<hr>
                								
                								<h3><strong>Location</strong></h3>
                							';
                								while($row = $locGet->fetch_assoc()) {
                								    echo "<textarea id='location1' type='text' name='location1' value='' required>" .$row['location']. "</textarea>";
                								}
        
                								echo '
                						
                								<hr>
                								<h3><strong>Gender</strong></h3> 	';
                								
                								while($row = $genGet->fetch_assoc()) {
                								    echo "<textarea id='gender1' type='text' name='gender1' value='' required>" .$row['gender']. "</textarea>";
                								}
        
                								echo '
                							
                								<hr>
                								<h3><strong>Birthday</strong></h3>
                								';
                								
                								while($row = $bdayGet->fetch_assoc()) {
                								    echo "<textarea id='bday1' type='text' name='bday1' value='' required>" .$row['birthday']. "</textarea>";
                								}
        
                								echo '
                								<br/>';
                							 
                								echo '
                						</div> <!--/.Media Birthday -->
                					</div> <!--/.Media -->
                				</div> <!--/.Panel Body -->
                			</div> <!--/.Panel -->
                		</div> <!--/.column --> '
                		?>
        
        
        
        
            <div class=" text-center" style="padding-bottom:20px" >
                <div class="col-lg-9 col-md-9 hidden-sm hidden-xs">
                <div class="panel panel-default">
                					<div class="panel-body">
          <div><h3><b> Search for a User here: </b></h3></div>
        <form method="get" action="">
            <div "dropdown" class="dropdown-toggle">
         <select name='uName' onChange='document.getElementById("uName_get").value = this.value'>
             
<?php while ($row1 = mysqli_fetch_array($resSearch)):; ?>
        <option value=" <?php echo $row1['userId']; ?>  "> 
        <?php echo $row1[1]; ?> </option>
        <?php endwhile; ?>
    
        </select>
         <input type="submit" name="submit" class="btn btn-primary"/></div>
        </form>
        
        </div>
        <hr>
       
         <input type="hidden" id="uName_get" name="ff" value=""  />
        
        <?php 
        $uId = $_GET['uName'];
        $SomeQ = "SELECT users.userName,
                users.userEmail,
                Status.allStatus,
                Status.dateAdd
                FROM users 
                LEFT JOIN Status 
                ON users.userId = Status.userId 
                WHERE users.userId = '$uId'";
        $SomeQ1 = mysqli_query($dbcon, $SomeQ) or die('error getting data');
        
        
         // Check if the form is submitted 
         if ( isset( $_GET['submit']  )){
         // retrieve the form data by using the element's name attributes value as key
          $uId = $_GET['uName']; $lastname = $_GET['lastname'];
         // display the results 
         echo '<div class="text-center ><h3>Get User Info</h3></div>';
         
         while ($row3 = mysqli_fetch_array($SomeQ1, MYSQLI_ASSOC)) {
         echo '<div class="  text-center"> ';
         echo '<h4>Username</h4><h3>'.$row3 ['userName']. '</h3>';
        
         
         echo '<br>'.$row3['dateAdd'].'<h4> Status: </h4><h3>' .$row3 ['allStatus']. '</h3>';
         echo '<hr><br>';
         
         }
         }
         
        ?>
     </div></div>
    </body>
</html>
<?php } ?>
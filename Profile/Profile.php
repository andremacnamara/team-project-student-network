<html>
    <head>
        	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    </head>
    <body>

<?php
    ob_start();
    session_start();
    include '../Database/Dbconnect.php';
    include '../Accounts/Header.php';

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
                        <input class="" type="file" name="file">
                        <input type="submit" class="btn btn-primary btn-md" name="submit" value="Submit" >
                        
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
                								<br/>
                								<input type="button" value="EDIT" id="submit" />';
                							 
                						
                								?>
                								
                							
                								<script>
                								    $(document).ready(function(){
                								        $('#submit').click(function(){
                                                            $.ajax({
                                                                url: '../Profile/1.php',
                                                                data: {bio1: $('#bio1').val(), location1: $('#location1').val(),
                                                                    gender1: $('#gender1').val(), bday1: $('#bday1').val()
                                                                },
                                                                success: function (result) {
                                                                    alert(result);
                                                                }
                                                            });
                                                        });
                								    });
                								   
                								</script>
                								
                								
                								<?php
                                                   
                								
                								echo '
                						</div> <!--/.Media Birthday -->
                					</div> <!--/.Media -->
                				</div> <!--/.Panel Body -->
                			</div> <!--/.Panel -->
                		</div> <!--/.column -->
                		
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label for="exampleTextarea">Post A Status</label>
                <form method="post" action"">
                <textarea class="form-control" id="exampleTextarea" name="status" rows="3" placeholder="Share whats on your mind..."></textarea>
            </div>
            
        <input type="submit" class="btn btn-primary" name="statusbtn" value="Post Status" >
                    </form>
            </div>
        </div>
    </div> <!--/.Row -->

                
            ';
      
        
    
    
     $uuu1 = $_SESSION['userId'];
     include '../Message/connect-mysql.php';
     
     if(isset($_POST['statusbtn'])){
         $statusUpdate = trim($_POST['status']);
         $statusUpdate = strip_tags($statusUpdate);
         $statusUpdate = htmlspecialchars($statusUpdate);
         
         $sqlStatus = "INSERT INTO Status(allStatus, userId, dateAdd) VALUES ('$statusUpdate','{$_SESSION['userId']}', NOW())";
         
             $result = mysqli_query($dbcon, $sqlStatus);
     }
         unset($statusUpdate);
         
        echo '   <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12"> 
                    <div class="panel panel-default">
                        <div class="panel-body">';
                        
            $statme = "SELECT dateAdd, allStatus FROM Status WHERE userId = '$iii' ORDER BY dateAdd DESC";
            $printStat = mysqli_query($dbcon, $statme) or die('error getting data');
            
                    echo "<h3> Your Status's </h3>";
                    
                   
                while($row = $printStat->fetch_assoc()) {
                    echo "<table>";
                     echo "<tr><th>Date Posted </th></tr>";
                    echo "<tr><td>";
                    echo $row['dateAdd'];
                    echo "</td><br/><hr><td style='padding-left:20px'>";
                	echo $row['allStatus'];
                	echo "</td><td>";
                    echo "<button style='position:absolute; right:20px;'><a href=\"deleteStatus.php?id=".$row['id']."\">Delete</a></button>";
                	echo "</td><br/></tr>";
                	echo "<br/></table>";
                };
                		echo'
                        </div>
                    </div>
                </div>
            </div> <!--/.Mainbody Container-Fluid -->';
    }
        ?>
        </body>
        </html>

<?php
 ob_start();
 session_start();
    include '../Accounts/Header.php';
    include '../Database/Dbconnect.php';
    
    
    
    if(isset($_SESSION['signed_in']) == false){
          echo '<div class="text-center" style="margin-top:5%">';
     echo '<h4>To see your messages you must be logged in. Log in here <a href="../Accounts/Login.php">LOGIN</a></h4>';
     echo '</div>';
    } else {  ?>

    
 <html>
  <head>
  
   <link href="../css/freelancer.min.css" rel="stylesheet">
   
   
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  
  <!-- include main css -->
    <style>
    <?php
    include '../Message/main.css';
    ?>
    </style>
   
  </head>
  
  <body>
           Hello <?php if(isset($_SESSION['userName'])){echo ' '.htmlentities($_SESSION['userName'],
        ENT_QUOTES, 'UTF-8');} ?>, <br />


 <div class="row text-center head">
<h1 style="padding-left:0px;"><b>Inbox</b></h1>
</div>


    <div style="padding-bottom:8%; padding-left:15%;">
        
  <div class=" col-md-3 text-center" style="border:1px solid black; margin-right:5px;">
   <a href="../Message/inbox.php" > <h3>INBOX</h3> </a>
  
  </div>
  
   <div class=" col-md-3 text-center" style="border:1px solid black; margin-right:5px;">
    <a href="../Message/sentMessage.php"> <h3>SENT</h3> </a>
  
  </div>
  
   <div class=" col-md-3 text-center" style="border:1px solid black; margin-right:5px;">
    <a href="../Message/sendMessage.php"> <h3>NEW MESSAGE</h3> </a>
    </div>
    </div>


<?php

 include '../Message/connect-mysql.php';
 
 $name = $_SESSION['userName'];

$sqlget = "SELECT * FROM messages WHERE
                    sentTo = '$name' ORDER BY dateMessage DESC ";

                    
 $sqldata = mysqli_query($dbcon, $sqlget) or die('error getting data');

?>
<div class="row">
 <div class=" container ">
  <div class="centerTable">
<?php
echo "<table class='text-center centerTable'>";
echo "<tr><th style='width:15%'>Date</th><th style='width:15%'>Sent To:</th><th style='width:15%'>
Sent From:</th><th>Message</th><th style='width:5%'>Reply</th><th style='width:5%'>Delete</th></tr>";

while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
 echo "<tr><td>";
 echo $row['dateMessage'];
 echo "</td><td>";
 echo $row['sentTo'];
 echo "</td><td>";
 echo $row['sentFrom'];
 echo "</td><td>";
 echo $row ['message'];
 echo "</td><td>";
 echo "<a href=\"sendMessage.php?abc=".$row['sentFrom']."\"><button type='button' class='btn btn-primary'></button></a>";
 echo "</td><td>";
 echo "<a href=\"delete.php?id=".$row['id']."\">Delete</a>";
 echo "</td><tr>";
}
echo "</table>";
 

?>



</div>
</div>

</div>

<footer style="margin-top:23%">
     <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                         &copy; The Student Network
                    </div>
                </div>
            </div>
        </div>
</footer>


</body>


 <?php } ?>
 </html>
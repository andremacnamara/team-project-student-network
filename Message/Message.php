<?php
 ob_start();
 session_start();
    include '../Accounts/Header.php';
    include '../Database/Dbconnect.php';
    
    
    
    if(isset($_SESSION['signed_in']) == false){
     echo 'You must be logged in <a href="../Accounts/Login.php">Login</a>';
    } else {  ?>

    
 <html>
  <head>
  
   
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
<h1 style="text-center">Inbox</h1>
</div>


 <div style="padding-bottom:8%; padding-left:15%;">
        
  <div class=" col-md-3 text-center" style="border:1px solid black; margin-right:5px;">
   <a href="../Message/Message.php" > <h3>INBOX</h3> </a>
  
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
 
 $name=$_SESSION['userName'];

$sqlget = "SELECT * FROM messages WHERE
                    sentTo = '$name' ";
                    
 $sqldata = mysqli_query($dbcon, $sqlget) or die('error getting data');

?>
<div class="row">
 <div class=" container ">
  <div class="centerTable">
<?php
echo "<table class='text-center centerTable'>";
echo "<tr><th style='width:20%'>Sent To:</th><th style='width:20%'>Sent From:</th><th>Message</th></tr>";

while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
 echo "<tr><td>";
 echo $row['sentTo'];
 echo "</td><td>";
 echo $row['sentFrom'];
 echo "</td><td>";
 echo $row ['message'];
 echo "</td><tr>";
}
echo "</table>";


?>
</div>
</div>

</div>




</body>


 <?php }?>
 </html>
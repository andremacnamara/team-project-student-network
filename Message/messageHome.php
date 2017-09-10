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
  
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="../Assests/style.css">
   
   <!-- include main css -->
 <style>
    <?php
    include '../Message/main.css';
    ?>
    </style>
   
  </head>
  
  <body>
   
<section id="messageHome">
 
 Hello <?php if(isset($_SESSION['userName'])){echo ' '.htmlentities($_SESSION['userName'], ENT_QUOTES, 'UTF-8');} ?>, <br />
 
 <section >
 <div class="row text-center head">
<h1 style="">Message Area</h1>
</div>
</section>
 
 <div class="row">
  
  <div class="box col-md-3 text-center" >
   <a href="../Message/Message.php"> <h3>INBOX</h3> </a>
  
  </div>
  
   <div class="box col-md-3 text-center" >
    <a href="../Message/sentMessage.php"> <h3>SENT</h3> </a>
  
  </div>
  
   <div class="box col-md-3 text-center">
    <a href="../Message/sendMessage.php"> <h3>NEW MESSAGE</h3> </a>
  
  </div>
 </div>
 
 
 
</section>

</body>


 <?php }?>
 </html>
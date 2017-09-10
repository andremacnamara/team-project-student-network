<?php

 ob_start();
 session_start();
    include '../Accounts/Header.php';
    include '../Database/Dbconnect.php';

function phpAlert($msg){
    echo '<script type="text/javascript"> alert("' . $msg . '")</script> ';
    
}

if (isset($_POST['submitted'])){
    include '../Message/connect-mysql.php';
    
    $sendto = $_POST['sendto'];
    $sendfrom = $_POST['sendfrom'];
    $message = $_POST['message'];
    $mysqlinsert = "INSERT INTO messages (sentTo, sentFrom, message, dateMessage) VALUES ('$sendto', '$sendfrom', '$message', NOW())";
    
    if(!mysqli_query($dbcon, $mysqlinsert )){
        die('error inserting record');
        
    }// end nested if
    
    
    $newrecord = phpAlert("Your Message has been sent!");

    
} // if statement

$lll = $_GET['abc'];

   if(isset($_SESSION['signed_in']) == false){
     echo 'You must be logged in <a href="../Accounts/Login.php">Login</a>';
    } else {  

?>

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
     <h1><b>Send Message</b></h1>
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
     
     
     <div class="row">
         <div class="container" style="margin-left:30%">
             
             
         <form method ="post" action="sendMessage.php">
         <input type="hidden" name="submitted" value="true" />
         
         <div class="col-xs-4">
         <h5>Send to:</h5>  
         <input id="email" class="form-control" type="text" name="sendto" placeholder="Send to UserName" value="<?php echo htmlspecialchars($lll);?>" />
         <small>Make sure UserName is correct!</small><br/>
         </div>
         <div class="col-xs-4">
         <h5>Send from:</h5> 
         
         <?php
          $name = $_SESSION['userName'];
          
          $lll = $_GET['abc'];
         ?>
         
         <input id="email" class="form-control" type="text" name="sendfrom" placeholder="Enter your UserName" value="<?php echo htmlspecialchars($name);?>" /><br/>
         </div>
          <div class="col-xs-8 "> 
               <h5>Message:</h5>
         <textarea id="email" class="form-control" type="text" name="message" placeholder="Your message.." ></textarea>
       </div>
       </div>
     
         <br/>
         <div class="centerButton">
         <button type="submit" value="Send" class="btn btn-primary">Send</button>
        </div>
     </form>
     </div>
     </div>
     
     
     <?php
     echo "<div class=''>";
     
     echo "</div>"
     ?>
        
        
        
        <footer style="margin-top:10%">
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
    
    <?php
    }
    ?>
</html>
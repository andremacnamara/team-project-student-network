<?php 
    include '../Accounts/Header.php';
    include '../Database/Dbconnect.php';
    
    
    $uJobId = (int)$_POST["JobId"];
    
    $uJobSubject  = mysql_real_escape_string($_POST["uJobSubject"]);
    $uJobCompany  = mysql_real_escape_string($_POST["uJobCompany"]);
    $uJobSalary   = mysql_real_escape_string($_POST["uJobSalary"]);
    $uJobLocation = mysql_real_escape_string($_POST["uJobLocation"]);
                    
    $query = "UPDATE Jobs
                SET JobSubject = '$uJobSubject',
                    JobCompany = '$uJobCompany',
                    JobSalary = '$uJobSalary',
                    JobLocation = '$uJobLocation'
                WHERE JobId='$uJobId'";
    



mysql_query($query)or die(mysql_error());
if(mysql_affected_rows()>=1){
    echo '<div class="form-group">
            <div class="col-md-12">
                <span class="alert alert-success">Record Updated</span>
            </div>
         </div>';
}else{
    echo '<div class="col-md-12">
            <div class="form-group">
                <span class="alert alert-danger">Not Updated</span>
            </div>
          </div>';
}   
    
?>
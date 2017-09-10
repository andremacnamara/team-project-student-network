<?php

if(isset($_GET['modules']) && !empty($_GET['modules'])){
    include('dbConnect.php');
    
$id = $_GET['modules'];

$query ="SELECT * FROM year WHERE con_id='$id'";
$do = mysqli_query($conn, $query);
$count = mysqli_num_rows($do);

if($count >0 ){
    while($row= mysqli_fetch_array($do)){
        
        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
}else{
    echo '<option> NO years Available </option>';
}
    
    
}else{
    echo '<h1>Error</h1>';
}

?>
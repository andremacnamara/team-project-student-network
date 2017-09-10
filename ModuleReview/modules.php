
<script>
    
$(document).ready(function(){

$('#modules').on('change', function(){
    var modulesID = $(this).val();
    if(modulesID){
        $.get(
            "ajax.php",
            {modules: modulesID},
            function(data){
                $('#year').html(data);
            }
            
            );
    }else{
        $('#year').html('<option> Select year first</option>')
        
    }
    
    
});
    
    
});    
</script>
<body>
   <div class="container">
        <div class="row">
            <div class="col-md-4" style="float: none;
            margin: 0 auto">
                <form class="text-centre">
                    <div class="form-group">
                        <label> Select Year</label>
                        <select class="form-control" id="year">
                        <option> Select a year first</option>
                        </select>
                        <br>
                        <label> Select a module</label>
                        <select class="form-control" id="modules">
                            <option> Select a module</option>
                            <?php
                            include ('dbConnect.php');
                            $query = "SELECT * FROM modules";
                            $do = mysql_query($conn, $query);
                            while($row = mysql_fetch_array($do)){
                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
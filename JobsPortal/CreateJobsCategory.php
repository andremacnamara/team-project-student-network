<!--/*-->
<!-- * JobIndex-->
<!-- *-->
<!-- * Version information e.g. Rev 1-->
<!-- *-->
<!-- * Date e.g. 1/06/2017-->
<!-- *-->
<!-- * @reference https://code.tutsplus.com/tutorials/how-to-create-a-phpmysql-powered-forum-from-scratch--net-10188-->
<!-- * @author Andre MacNamara X14380181-->
<!-- *-->
<!-- */ -->
 <?php
//signin.php
    ob_start();
    session_start();

    include '../Accounts/Header.php';
    include '../Database/Dbconnect.php';
    
    if($_SESSION['signed_in'] == false || $_SESSION['userLevel'] != 1)
{
	//the user is not an admin
	echo '<p class="error">You have no rights to be on this page!</p>';
} else {
    	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		//the form hasn't been posted yet, display it
		echo '<div class="container">
		        <div id="login-form">
    		        <form method="post" action="">
    		        	<div class="col-md-12">
    		        		<div class="form-group">
    		        			<label for="CatName"><h5>Category Name</h5></label>
    	                    	<input type="text" class="form-control" name="JobCatName" id="CategoryName" placeholder="eg Finance"/><br />
    	                    </div>
    	    			    <div class="form-group">
    		        			<label for="CatDescription"><h5>Category Description</h5></label>
    	                    	<input type="text" class="form-control" name="JobCatDescription" id="CatDescription" placeholder="This is for students with a finance backg"/><br />
    	                    </div>
    	                    <div class="form-group">
    	    			        <input type="submit" class="btn btn-block btn-primary" value="Add category"/>
        			        </div>
        			    </div>
    		        </form>
                </div>
             </div>';
	}
	
	else {
	    //the form has been posted, so save it
		$sql = "INSERT INTO JobCategories(JobCatName, JobCatDescription)
		   VALUES('" . mysql_real_escape_string($_POST['JobCatName']) . "',
				 '" . mysql_real_escape_string($_POST['JobCatDescription']) . "')";
		$result = mysql_query($sql);
		if(!$result)
		{
			//something went wrong, display the error
			echo 'Error' . mysql_error();
		}
		else
		{
			echo '<p class="success">New Job category succesfully added.</p>';
		}
	}
}

?>
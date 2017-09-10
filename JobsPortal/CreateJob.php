<?php
    ob_start();
    session_start();

    include '../Accounts/Header.php';
    include '../Database/Dbconnect.php';


    if ($_SESSION['signed_in'] == false) 
    {
        //the user is not signed in
        echo '<p class="error">Sorry, you have to be <a href="../Accounts/Login.php">signed in</a> to create a topic.</p>';
    } else
    {
             //the user is signed in
            if ($_SERVER['REQUEST_METHOD'] != 'POST')
            {
                //the form hasn't been posted yet, display it
                //retrieve the categories from the database for use in the dropdown
                    $sql = "SELECT
                                JobCatId,
                                JobCatName,
                                JobCatDescription
                            FROM
                                JobCategories";
            
                    $result = mysql_query($sql);
            
                    if (!$result)
                    {
                        //the query failed, uh-oh :-(
                        echo '<p class="error">Error while selecting from database. Please try again later.</p>';
                    } 
                    else 
                    {
                        if (mysql_num_rows($result) == 0) 
                        {
                            //there are no categories, so a topic can't be posted
                            if ($_SESSION['UserLevel'] == 1)
                            {
                                echo '<p class="error">You have not created categories yet.</p>';
                            } 
                            else 
                            {
                                echo '<p class="error">Sorry! No categories created. You must wait for an admin to create some.</p>';
                            }
                        } else 
                        {
                            echo '
                                <div class="container">
                                    <div id="login-form">
                                        <form class="registration" method="post" action="">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h2>Post a job.</h2>
                                                </div> <!--/.form-group-->
                                                <div class="form-group"> 
                                                    <hr>
                                                </div>
                                                <div class="form-group">
                                                    <h4>Enter the job description</h4>
                                                </div>
                                                <div class="form-group">
                                                    <hr>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></span>
                                                        <input type="text" name="JobSubject" placeholder="Job Title" class="form-control" /><br />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></span>
                                                        <input type="text" name="JobCompany" placeholder="Company" class="form-control" /><br />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
                                                        <input type="text" name="JobSalary" placeholder="Salary" class="form-control" /><br />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
                                                        <input type="text" name="JobLocation" placeholder="Location" class="form-control" /><br />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sel1">Select a category for the job.</label>';
                                                    echo '<select class="form-control" id="sel1" name="JobCat">';
                                                          while($row = mysql_fetch_assoc($result))
                                                          {
                                                              echo '<option value="' . $row['JobCatId'] . '">' . $row['JobCatName'] . '</option>';
                                                          }
          
                                                    echo '</select><br>
                                                </div> <!--/.Select form group-->' ;    
          
                                                    echo '<div class="form-group">
                                                            <label for="comment">Comment:</label>
                                                                <textarea class="form-control" name="JobPostContent" rows="5" id="comment"></textarea><br>
                                                                <input type="submit" class="col-xs-12 btn btn-primary" value="Create Job" />
                                                </div><!--/.first col-md-12-->
                                            </div><!--/.login-form-->
                                        </form><!--/.form-->
                                    </div><!--/.container-->';
                        }
                    }
            }
        else 
        {
            //start the transaction
            $query  = "BEGIN WORK;";
            $result = mysql_query($query);
            
            if (!$result) 
            {
                //Damn! the query failed, quit
                echo '<p class="error">An error occured. Please try again later.</p>';
            }
            else 
            {
                
                //the form has been posted, so save it
                //insert the topic into the topics table first, then we'll save the post into the posts table
                $sql = "
                        INSERT INTO Jobs (
                            JobSubject,
                            JobCompany,
                            JobSalary,
                            JobLocation,
                            JobDate,
                            JobCat,
                            JobPostBy
                         )
                            VALUES(
                                '" . mysql_real_escape_string($_POST['JobSubject']) . "',
                                '" . mysql_real_escape_string($_POST['JobCompany']) . "',
                                '" . mysql_real_escape_string($_POST['JobSalary']) . "',
                                '" . mysql_real_escape_string($_POST['JobLocation']) . "',
                                NOW(),
                                '" . mysql_real_escape_string($_POST['JobCat']) . "',
                                '" . $_SESSION['userId'] . "'
                            )
                    ";
                
                $result = mysql_query($sql);
                    if (!$result) 
                    {
                        //something went wrong, display the error
                        echo '<p class="error"> 1 An error occured while attempting to post data. Please try again later.<br /><br /></p>' . mysql_error();
                        $sql    = "ROLLBACK;";
                        $result = mysql_query($sql);
                    } 
                    else 
                    {
                        //the first query worked, now start the second, posts query
                        //retrieve the id of the freshly created topic for usage in the posts query
                         $jobid = mysql_insert_id();
                         
                        $sql = "INSERT INTO
                                    IndividualJobPost(
                                          JobPostContent,
                                          JobPostDate,
                                          JobPostTopic,
                                          JobPostBy)
                                VALUES
                                    ('" . mysql_real_escape_string($_POST['JobPostContent']) . "',
                                          NOW(),
                                          " . $jobid . ",
                                          " . $_SESSION['userId'] . "
                                    )";
                        $result = mysql_query($sql);
                        if (!$result)
                        {
                            //something went wrong, display the error
                            echo '<p class="error"> 2 An error occured while attempting to post data. Please try again later.<br /><br /></p>' . mysql_error();
                            $sql    = "ROLLBACK;";
                            $result = mysql_query($sql);
                        } else
                        {
                            $sql    = "COMMIT;";
                            $result = mysql_query($sql);
                            
                            //after a lot of work, the query succeeded!
                            echo '<p class="success">You have succesfully created <a href="Jobs.php?id=' . $jobid . '">your new topic</a>.</p>';
                        }
                    }
            }
        }
    }
    
    
?>
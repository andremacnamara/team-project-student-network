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

    ob_start();
    session_start();

    include '../Accounts/Header.php';
    include '../Database/Dbconnect.php';

$sql = "SELECT JobCategories.JobCatId,JobCategories.JobCatName,
                JobCategories.JobCatDescription, COUNT(Jobs.JobId) AS Jobs
        FROM JobCategories
            LEFT JOIN Jobs ON Jobs.JobId = JobCategories.JobCatId
        GROUP BY JobCategories.JobCatName, JobCategories.JobCatDescription, 
                JobCategories.JobCatId";


$result = mysql_query($sql);

if (!$result) {
    echo '<p>The categories could not be displayed, please try again later.</p>';
} else {
    if (mysql_num_rows($result) == 0) {
        echo '<p>No categories defined yet.</p>';
    } else {
        //prepare the table
        echo '
            
            <h2 class="category-title">Choose a category</h2>

            <div class="container">';
             if ($_SESSION['userLevel'] == 1)
                {
                    echo'<div class="category-button-area">
                            <a class="btn col-xl-4 category-button" href="CreateJobsCategory.php">Create a Category</a>
                        </div>';
                }
                echo '
                <table class="table">
                    <thead>
                        <tr class="bg-category">
                            <th><h3>Job Section</h3></th>
                            <th><h3>Number of active jobs</h3></th>
                        </tr>
                    </thead>
                    <tbody>';
        
        while ($row = mysql_fetch_assoc($result)) {
            
            echo '<tr>';
            echo '<td><h4><a href="JobsCategory.php?id=' . $row['JobCatId'] . '">' . $row['JobCatName'] . '</a></h4>' . $row['JobCatDescription'] . '</td>';
            
            echo '<td class="topicTd">';
            
            //fetch last topic for each cat
            $topicsql = "SELECT JobId, JobSubject, JobDate, JobCat
                        FROM Jobs
                        WHERE JobCat = " . $row['JobCatId'] . "
                        ORDER BY JobDate DESC
                        LIMIT 1";
            
            $topicsresult = mysql_query($topicsql);
            
            if (!$topicsresult) {
                echo '<p>Last topic could not be displayed.</p>';
            } else {
                if (mysql_num_rows($topicsresult) == 0){
                    echo '0 Active Jobs';
                } else {
                    while ($topicrow = mysql_fetch_assoc($topicsresult))
                       //get result
                        $query = mysql_query("SELECT JobId, count(*) as total FROM Jobs group by JobCat");
                        $info = mysql_fetch_assoc($query);
                
                        //output result
                        echo $info['total'];
                        
                }
            }
            echo '</td>';
            echo '</tr>';
        }
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>'; //container
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>The Student Network</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
   
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
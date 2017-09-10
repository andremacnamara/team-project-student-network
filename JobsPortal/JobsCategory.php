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
    
    $query = "SELECT
                    JobCatId,
                    JobCatName,
                    JobCatDescription
                    
              FROM
                    JobCategories
              WHERE
                    JobCatId = " . mysql_real_escape_string($_GET['id']);
                    
    $result = mysql_query($query);
    if(!$result) 
    {
        echo 'Error displaying job category. Please try again later.' . mysql_error();
    } else
        {
            if(mysql_num_rows($result) == 0)
            {
                echo 'Job category does not exist';
            } else 
                {
                    while($row = mysql_fetch_assoc($result))
                    {
                        echo '<h5 class="text-center">These are the current openings for ' . $row['JobCatName'] .'</h2><br />';
                    }
                    
                    //Query for jobs
                    $query = "SELECT 
                                JobId,
                                JobSubject,
                                JobDate,
                                JobSalary,
                                JobCat,
                                JobCompany,
                                JobLocation
                            FROM
                                Jobs
                            WHERE 
                                JobCat = " . mysql_real_escape_string($_GET['id']);
                                
                    $result = mysql_query($query);
                    
                    if(!$result)
                    {
                        echo 'Topics can not be disaplyed';
                    } else 
                        {
                            if(mysql_num_rows($result) == 0)
                            {
                                echo 'There are no topics in this category.';
                                 if ($_SESSION['userLevel'] == 1){
                                echo '<a href="CreateJob.php">Create One?</a>';
                                }
                            }
                            
                             else
            {
                //prepare the table
    echo '  
            <div class="contain">
                <table class="table">
                    <thead>
                        <a class="btn btn-topic" href="CreateJob.php">New Topic</a>
                        <tr class="bg-info">
                            <th></th>
                            <th><h3>Job Title</h3></th>
                            <th><h3>Company</h3></th>
                            <th><h3>Date Posted</h3></th>
                            <th><h3>Salary</h3></th>
                            <th><h3>Location</h3></th>
                            <th></th>
                            <th></th>
                         </tr>
                    </thead>
            <tbody>';
                     
                while($row = mysql_fetch_assoc($result))
                {               
                    echo '<tr>';
                        echo '<td>';
                            echo '<td class="subject"><a href="Jobs.php?id='
                            . $row['JobId'] . '">' . $row['JobSubject'] . '</a>';
                        echo '</td>';
                        echo '<td>';
                            echo $row['JobCompany'];
                        echo '</td>';
                        echo '<td>';
                            echo date('d-m-Y', strtotime($row['JobDate']));
                        echo '</td>';
                        echo '<td>';
                            echo '€' . $row['JobSalary'];
                        echo '</td>';
                        echo '<td>';
                            echo $row['JobLocation'];
                        echo '</td>';
                        if ($_SESSION['userLevel'] == 1)
                        {
                        echo "<td><a class='btn btn-delete' href=\"deleteJob.php?JobId=".$row['JobId']."\">Delete</a>
                        <a class='btn btn-edit' href=\"EditJob.php?JobId=".$row['JobId']."\">Edit</a></td>";
                        
                        }
                        echo'</tr></tbody></div>';
                        
                        
                }
            }
        }
                                
    }
            
}
    
?>

<body>
    <style>
        .contain{
            margin: 0 3% 0 3%;
        }
        .head {
            padding: 30px 10px 30px 10px;
        }
        
        .subject {
            color:green;
        }
        
        .btn-topic {
            margin-bottom: 10px;
            background-color: #407F5D;
            border: 1px solid #407F5D;
            color:#fff;
        }
        
        .bg-info {
            background-color:#3F8A8C;
            
        }
        
        table thead {
            color: #fff;
        }
        
        table tr {
           padding-bottom: 15px;
           line-height: 1.42857143;
           border-bottom: 1px solid #ddd;
        }
        
        .table > thead > tr > th,
        .table > tbody > tr > th,
        .table > tfoot > tr > th,
        .table > thead > tr > td,
        .table > tbody > tr > td,
        .table > tfoot > tr > td {
          padding: 15px;
         }
         
         .btn-delete {
             background-color: #941E14;
         }
         
         .btn-edit {
             background-color: #2C3794;
         }
         
         .btn-delete,
         .btn-edit {
             color: white;
         }

    </style>
</body>
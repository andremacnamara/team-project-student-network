    <?php
    
     ob_start();
    session_start();
    
    
    

    include '../Accounts/Header.php';
    
$allowedExts = array(
  "pdf", 
  "doc", 
  "docx"
); 
$allowedMimeTypes = array( 
    'application/msword',
'text/pdf',
'image/gif',
'image/jpeg',
'image/png'
);
{


if ($_FILES["file"]["error"] > 0)
{
echo "Upload was unsucessful" . $_FILES["file"]["error"] . "<br>";
}
else
{
 "Upload: " . $_FILES["file"]["name"] . "<br>"; 
"Type: " . $_FILES["file"]["type"] . "<br>";
"Size: " . ($_FILES["file"]["size"] / 90000000000) . " kB<br>"; "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

if (file_exists("upload/" . $_FILES["file"]["name"]))
  {
  $_FILES["file"]["name"] . " already exists. ";
  }
else
  {
  move_uploaded_file($_FILES["file"]["tmp_name"],
  "/home/ubuntu/workspace/Storage/upload/" . $_FILES["file"]["name"]);
  echo "Upload Successful";
  }
 }
 }

$uploaded_files = "";
 




?>
<html>
<head>

   <link rel="stylesheet" type="text/css" href="style_storage.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="Accounts/Assets/style.css" type="text/css" />
   
   
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<title>Online file storage</title>
</head>
<body>
<div id="container">
    <h1>Online File Storage</h1>
     
    <fieldset>
        <legend>Add a new file to the storage</legend>
        <form method="post" action="storage.php" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
        <p><label for="name">Select file</label><br />
        <input type="file" name="file" /></p>
        <p><input type="submit" name="submit" value="Start upload" /></p>
        </form>   
    </fieldset>
    <fieldset>
    <legend>Previousely uploaded files</legend>
    <ul id="menu">
        <li><a href="/Storage/upload">All files</a></li>
    </ul>
     
    <ul id="files">
       <?php echo $uploaded_files; ?>
    </ul>
</fieldset>
</div>
<?php include 'settings.php';?>
</body>
</html>
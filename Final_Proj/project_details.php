<?php
// echo $_GET["id"];
session_start();
require_once "config.php";

if(isset($_GET["id"])){
    $id = $_GET["id"];
}
else{
    echo "<script>alert('No login credential found. Please Login.'); window.location='index.php'</script>";
}

$sql = "select * from permrecords where projectID = ".$id.";";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$conn->close();
$fp=$row["filePath"];
?>

<DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>Project Details</title>
        <link rel="icon" href="/favicon/favicon.ico">
        <link rel="stylesheet" href="css/project_details.css">
    </head>

    <body>
        <div class="container">
            <h1><?=$row["projectTitle"]?></h1>
            <hr>

            <div class="projectDesc">
                <h2>Project Description</h2>
                <p><?=$row["projectDescription"]?></p>
            </div>
            <hr>

            <div class="Authors">
                <h2>Authors</h2>
                <p><?=$row["projectAuthors"]?></p>
            </div>
            <hr>

            <div class="Keywords">
                <h2>Keywords</h2>
                <p><?=$row["projectKeywords"]?></p>
            </div>
            <hr class="last">

            <div class="dld-bx">
                <a href="download.php?file=<?=$fp?>" class="dld-btn"><i class="fa fa-download"></i> Download PDF</a>
            </div>
        </div>
        
    </body>
</html>
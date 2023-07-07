<?php
require_once "config.php";
session_start();

if(isset($_SESSION["search"])){
    $search = $_SESSION["search"];
}
else{
    $search='A';
}


$keyArray = explode(',', $search);

$sql = "SELECT projectID, projectTitle from permrecords WHERE projectKeywords LIKE 'X' ";
foreach($keyArray as $key){
    $sql .= "OR projectKeywords LIKE '%".$key."%' ";
}
$sql.= ";";

$result = $conn->query($sql);
$conn->close();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $search = trim($_POST["search"]);
    $_SESSION["search"] = $search;
    echo "<script>window.location='searchresults.php'</script>";
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="icon" href="/favicon/favicon.ico">
    <link rel="stylesheet" href="css/searchresults.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Labrada&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="box">
        <div>
            <div class="top-title">Search Results</div>
        </div>

        <div class="searchbox">
            <form action="" method="post"> 
                <input type="text" placeholder=" Search Keywords (separated by comma)." name="search" value="<?=$search?>"> 
                <button type="submit">Search</button> 
            </form>
        </div>

        <table class="google-table">
            <thead>
                <tr>
                    <th class="table-head">Project Title</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td><a href='project_details.php?id=" . $row["projectID"] . "'>" . $row["projectTitle"] . "</a></td>";
                        echo "</tr>";
                    }
                }
                else{
                    echo "<tr><td>No Records Found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php
require_once "config.php";
session_start();

if (isset($_SESSION["id"])) {
    $studentID = $_SESSION["id"];
}

$sql = "select tokenID, projectTitle, status from tempRecords where studentID =".$studentID." order by tokenID desc;";

$result = $conn->query($sql);
$conn->close();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/tokens.css">
    <title>Token History</title>
    <link rel="icon" href="/favicon/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Labrada&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <div>
            <div class="top-title">Token History</div>
            <div class="top-subtitle">List of all Submitted Tokens</div>
        </div>

        <table class="google-table">
            <thead>
                <tr>
                    <th class="table-head">Token ID</th>
                    <th class="table-head">Project Title</th>
                    <th class="table-head">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row["tokenID"]."</td>";
                        echo "<td><a href='student_project_details.php?id=" . $row["tokenID"] . "'>" . $row["projectTitle"] . "</a></td>";
                        echo "<td>". $row["status"] . "</td>";
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
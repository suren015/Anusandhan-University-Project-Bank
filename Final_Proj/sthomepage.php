<?php
session_start();
require_once "config.php";

if(isset($_SESSION["name"])){
    $name = $_SESSION["name"];
}
else{
    echo "<script>alert('Please Login'); window.location='index.php'</script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["ML"]))      $search="Machine Learning";
    else if(isset($_POST["AI"])) $search="Artificial Intelligence";
    else if(isset($_POST["QC"])) $search="Quantum Computing";
    else if(isset($_POST["DS"])) $search="Data Science";
    else if(isset($_POST["IP"])) $search="Image Processing";
    else                         $search = trim($_POST["search"]);
    
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
        <title>Welcome <?=$name?></title>
        <link rel="icon" href="/favicon/favicon.ico">
        <link rel="stylesheet" href="css/page.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rajdhani:&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Labrada&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="box1">
            <div>
                <div class="heading">Welcome to Anusandhaan</div>
                <div class="subtitle">Where Research meets Recognition....</div>
                <div class="std_name">Hi <?=$name?></div>
            </div>

            <div class="searchbox">
                <form action="" method="post"> 
                    <input type="text" placeholder=" Search Keywords (separated by comma)." name="search"> 
                    <button type="submit">Search</button> 
                </form>
            <div>
            
            <div class="buttons">
                <form action="#" method="post"> 
                    
                    <button type="Token" name="ML">ML</button> 

                    <button type="Token" name="QC">Quantum Physics</button> 

                    <button type="Token" name="AI">AI</button> 

                    <button type="Token" name="IP">Image Processing</button> 

                    <button type="Token" name="DS">Data Science</button> 
                </form>
                
            </div>
            
            <div class="Request">
                <form action="reqForm.php"> 
                    <p class="reqhead">Request to upload your Project</p>
                    <button type="Request" >Request</button> 
                </form>

                <form action="sttokens.php"> 
                    <p class="tokenhead">Check your Project token</p>
                    <button type="Token">Token Check</button> 
                </form>

                <form action="feedback_page.php"> 
                    <p class="tokenhead">Give us Your Feedback</p>
                    <button type="Token">Feedback</button> 
                </form>
            <div>
            
            <div class="logout-bx">
                <button type="submit" class="logoutButton" title="Logout" onclick="window.location.href='logout.php'"><span><img src="img/logout.png" alt="#"></span></button>
            </div> 

        </div>
    </body>
</html>
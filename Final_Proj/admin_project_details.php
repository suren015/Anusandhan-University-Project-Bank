<?php
// echo $_GET["id"];
session_start();
require_once "config.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_GET["id"])){
    $id = $_GET["id"];
}
else{
    echo "<script>alert('Redirecting to your HomePage'); window.location='adminhomepage.php'</script>";
}

$sql = "select * from temprecords where tokenID = ".$id.";";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$fp=$row["filePath"];
$projectTitle=$row["projectTitle"];
$sql1 = "SELECT name, email from users where id=".$row["studentID"].";";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$email = $row1["email"];
$name = $row1["name"];

if (isset($_POST['accept'])){  
    $sqlAccept = "INSERT INTO permrecords(
        studentID, projectTitle, projectAuthors, projectKeywords, projectDescription, filePath
        ) SELECT studentID, projectTitle, projectAuthors, projectKeywords, projectDescription, filePath
        FROM temprecords WHERE tokenID = ".$id.";";    
        
    if ($conn->query($sqlAccept)) {
        $sqlSet = "UPDATE temprecords SET status = 'Accepted' where tokenID = ". $id. ";";
        mysqli_query($conn,$sqlSet);
        try{
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'anusandhaan.tdc@gmail.com';
            $mail->Password = 'achoxfzdgnbyuosb';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->setFrom('anusandhaan.tdc@gmail.com');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = "Your Project Request has been Sent!!";
            $mail->Body = "Hi $name.<br><br>
            Greetings from Team Anusandhaan!!<br><br>
            We are glad to inform you that your project titled $projectTitle has been accepted by Anusandhaan.<br>
            You can now search your project in the Search bar using your keywords.<br><br>
                        
            Best regards,<br>
            Team Anusandhaan";

            $mail->send();
            echo "<script>alert('Project Accepted! Emain Confirmation sent.'); window.location='admintokens.php'</script>"; 
        }
        catch (Exception $e) {
            echo "<script>alert('Project Accepted! Email Confirmation could not be sent.'); window.location='admintokens.php'</script>"; 
        }
    }
    else echo "Error occurred : " . mysqli_error($conn);   
}

if (isset($_POST['reject'])){
        $sqlReject = "UPDATE temprecords SET status = 'Rejected' where tokenID = ". $id. ";";
        if ($conn->query($sqlReject)) {
            try{
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'anusandhaan.tdc@gmail.com';
                $mail->Password = 'achoxfzdgnbyuosb';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
    
                $mail->setFrom('anusandhaan.tdc@gmail.com');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = "Your Project Request has been Sent!!";
                $mail->Body = "Hi $name.<br><br>
                Greetings from Team Anusandhaan!!<br><br>
                We regret to inform you that your project titled $projectTitle has been rejected by Anusandhaan.<br>
                Your project status has been updated on the tokens page on your dashboard.<br><br>
                            
                Best regards,<br>
                Team Anusandhaan";
    
                $mail->send();
                echo "<script>alert('Project Rejected! Emain Confirmation sent.'); window.location='admintokens.php'</script>"; 
            }
            catch (Exception $e) {
                echo "<script>alert('Project Rejected! Email Confirmation could not be sent.'); window.location='admintokens.php'</script>"; 
            }
        }
        else echo "Error occurred : " . mysqli_error($conn);        
}


$conn->close();
?>

<DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>Project Details</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <a href="download1.php?file=<?=$fp?>" class="dld-btn"><i class="fa fa-download"></i> Download PDF</a>
            </div>
            <hr class="last1">

            <div class="buttons">
                <form method="POST" action="#">
                    <input type="submit" onclick="return confirmAccept()" name="accept" value="Accept Project">
                    <input type="submit" onclick="return confirmReject()" name="reject" value="Reject Project">
                </form>
            </div>
        </div>
        
        <script src="js/confirm.js"></script>
    </body>
</html>
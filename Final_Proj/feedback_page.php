<?php 
include 'config.php'; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

session_start();

if(isset($_SESSION["name"])){
    $name = $_SESSION["name"];
}
else{
    $name = "User";
}

if(isset($_SESSION["email"])){
    $email = $_SESSION["email"];
}
else{
    $email = "NULL";
}

if (isset($_POST['submit'])){
    $f1 = $_POST['fb1'];
    $f2 = $_POST['fb2'];
    $f3 = $_POST['fb3'];

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
        $mail->addAddress('anusandhaan.tdc@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = "Feedback from $name";
        $mail->Body = "NAME: $name.<br>
        EMAIL: $email<br><br>
        Describe Your Overall Satisfaction with Anusandhaan: <br>
        $f1<br><br>
        How can we improve Anusandhaan?: <br>
        $f2<br><br>
        Please Share any additional Comments: <br>
        $f3<br><br>";

        $mail->send();
        echo "<script>alert('Feedback sent Successfully.'); window.location='sthomepage.php'</script>";
    }
    catch (Exception $e) {
        echo "<script>alert('Feedback sent Successfully.'); window.location='sthomepage.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/favicon/favicon.ico">
    <title>Project Request Form</title>
    <link rel="stylesheet" href="../css/feedback.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Labrada&display=swap" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <div>
            <div class="heading">Anusandhaan</div>
            <div class="subtitle">Where Research meets Recognition....</div>
        </div>

        <form method="post" enctype="multipart/form-data" action="feedback_page.php">
            <h1 class="main_heading">Feedback Form</h1>
        <hr>

        <p>Required Fields are followed by *</p>

        <p>Name: * <textarea name="name" id="" cols="100" rows="1" readonly required><?=$name?></textarea></p>     
        
        <p>Email: * <textarea name="email" id="" cols="100" rows="1" readonly required><?=$email?></textarea></p>     
        
        <p>Describe Your Overall Satisfaction with Anusandhaan:* <textarea name="fb1" id="description" cols="100" rows="10" placeholder="Give Your Feedback" required></textarea></p>
        <p>How can we improve Anusandhaan?:* <textarea name="fb2" id="description" cols="100" rows="10" placeholder="Give Your Feedback" required></textarea></p>
        <p>Please Share any additional Comments: <textarea name="fb3" id="description" cols="100" rows="10" placeholder="Give Your Feedback"></textarea></p>

        <input type="submit" value="Submit" name="submit">

    </form>
    </div>

</body>

<!-- <script src="js/register.js"></script> -->
<script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js"> </script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js.1.14.7/umd/popper.min.js"> </script>
<script src = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"> </script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
</html>
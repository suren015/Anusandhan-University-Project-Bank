<?php
require_once "config.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$name = $password = $confirm_password = $email = $contact = "";
$name_err = $password_err = $confirm_password_err = $email_err = $contact_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $name = trim($_POST['name']);

    if(empty(trim($_POST["email"]))){
        $email_err = "Email cannot be blank.";
    }
    else{
        $sql = "SELECT id FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if($stmt){
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = trim($_POST['email']);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "Email Already Exists. Please Login.";
                    echo "<script>alert('Email Already Exists. Please Login.'); window.location='userlogin.php'</script>";
                }
                else{
                    $email = trim($_POST['email']);
                }
            }
            else{
                echo "<script>alert('Something went wrong!! Please try again later.');";
            }
        }
    }
    mysqli_stmt_close($stmt);

    $password = trim($_POST['password']);
    $contact = trim($_POST["Number"]);


    if(empty($email_err) && empty($password_err) 
    && empty($confirm_password_err) && empty($name_err) && empty($contact_err))
    {
        $sql = "INSERT INTO users (name, email, password, contact_number) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt)
        {
            mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_email, $param_password, $param_contact);
            $param_name = $name;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_email = $email;
            $param_contact = $contact;

            if (mysqli_stmt_execute($stmt)){
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
                    $mail->Subject = "Welcome to Anusandhaan!!";
                    $mail->Body = "Hi $name.<br><br>
                    We are thrilled to welcome you to our website!
                    We are excited to have you as a member of our community and look forward to providing you with the best possible online experience.<br><br>              
                    Our website offers a variety of features and resources that we believe you will find useful and engaging.
                    As a member of our website, you will have access to exclusive content and much more. We encourage you to explore all that our website has to offer.<br><br>
                    If you have any questions or concerns, please don't hesitate to reach out to our support team. We are always here to help and are committed to making your experience on our website a positive one.<br><br>
                    
                    Once again, welcome to our website! We are excited to have you join us and look forward to getting to know you better.<br>
                    Happy Researching!!<br><br><br>
                    
                    Best regards,<br>
                    Team Anusandhaan";

                    $mail->send();
                    echo "<script>alert('Successfully Registered. Email Confirmation has been sent.'); window.location='userlogin.php'</script>";
                }
                catch (Exception $e) {
                    echo "<script>alert('Successfully Registered. Email Confirmation could not be sent.'); window.location='userlogin.php'</script>";
                }
            }
            else{
                echo "<script>alert('Something went wrong!! Please try again later.');";
            }
        }
        mysqli_stmt_close($stmt);        
    }
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html>
    <head lang="vi">
        <meta http-equi="Content-Type" content="text/html" charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register Page</title>
        <link rel="stylesheet" href="css/style2.css" type="text/css">
        <link rel="icon" href="/favicon/favicon.ico">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    </head>

    <body>
    <div class="section">
        
        <header>
            <a class="logo" href="index.php">Anusandhaan</a>
        </header>

        <div class="Register-box">
            <form action="" method="post">
                
                <h2>Register</h2>

                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="text" name="name" id="name" required>
                    <label>Your Name</label>
                </div>

                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>

                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="key"></ion-icon>
                    </span>
                    <input type="password" name="password" pattern=".{8,12}" id="password" required>
                    <label>Password</label>
                </div>

                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="key"></ion-icon>
                    </span>
                    <input type="password" name="confirm_password" pattern=".{8,12}" id="confirm_password" required>
                    <label>Confirm Password</label>
                </div>

                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="keypad"></ion-icon>
                    </span>
                    <input type="text" name="Number" maxlength="10" pattern="\d{10}" required>
                    <label>Contact No.</label>
                </div>

                <div class="remember-forget">
                    <label><input type="checkbox" required>I am agree with terms & conditions.</label>
                </div>

                <button type="Submit" class="btn">Register</button>

                <div class="login-register">
                    <p>Already have an account? <a href="userlogin.php" class="login-link">Login</a></p>
                </div>
            </form>
        </div>

    </div>

    <script src="js/register.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
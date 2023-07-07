<?php 
include 'config.php'; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

session_start();
if (isset($_SESSION["id"])) {
    $studentID = $_SESSION["id"];
    $sql1 = "SELECT name, email from users where id=".$studentID.";";
    $result = $conn->query($sql1);
    $row = $result->fetch_assoc();
    $email = $row["email"];
    $name = $row["name"];
}

if (isset($_POST['submit'])) {
    $projectTitle = $_POST['projectTitle'];
    $projectAuthors = $_POST['authors'];
    $projectDescription = $_POST['description'];
    $projectKeywords = $_POST['keywords'];
    
    if (isset($_FILES['pdfFile']['name'])) {                        
            
        $file_name = $_FILES['pdfFile']['name'];
        $file_tmp = $_FILES['pdfFile']['tmp_name'];   

        move_uploaded_file($file_tmp,"uploads/".$file_name);

        if ($conn) {
            $insertquery = "INSERT INTO tempRecords(studentID, projectTitle, projectAuthors, projectKeywords, projectDescription, filePath) VALUES ('$studentID', '$projectTitle', '$projectAuthors', '$projectKeywords', '$projectDescription', '$file_name')";
            $iquery = mysqli_query($conn, $insertquery);
            if ($iquery) {							
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
                    This mail is to inform you that your project request for $projectTitle has been sent.<br>
                    You can now check the status of your token on the Tokens page on your dashboard.<br>
                    We will confirm your status in next few days.<br><br>
                    Kudos and Happy Researching!!<br><br><br>
                    
                    Best regards,<br>
                    Team Anusandhaan";

                    $mail->send();
                    echo "<script>alert('Request Sent Successfully. Email Confirmation has been sent.'); window.location='sthomepage.php'</script>";
                }
                catch (Exception $e) {
                    echo "<script>alert('Request Sent Successfully. Email Confirmation could not be sent.'); window.location='sthomepage.php'</script>";
                }
            } else {
                echo "<div class='alert alert-danger alert-dismissible fade show text-center'>
                    <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Failed!</strong> Try Again!
                </div>";
                echo mysqli_error($conn); // check for SQL errors
            }
        } else {
            echo "Failed to connect to database";
        }
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show text-center'>
            <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Failed!</strong> File must be uploaded in PDF format!
        </div>";
    }// end if  
}// end if
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/favicon/favicon.ico">
    <title>Project Request Form</title>
    <link rel="stylesheet" href="../css/reqForm.css">
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

        <form method="post" enctype="multipart/form-data" action="reqForm.php">
            <h1 class="main_heading">Project Request Form</h1>
        <hr>

        <p>Requires Fields are followed by *</p>

        <p>Project Title: * <input type="text" name="projectTitle" placeholder="Enter Project Title" maxlenght="255" required></p>   
        
        <p>Project Owner: * <input type="text" name="authors" placeholder="Enter Project Owner Name" maxlenght="255" required></p>     
        
        <p>Project Owner's Email: * <input type="email" name="email" id="email" placeholder="xyz@gmail.com" maxlenght="255" required></p>     
        
        <p>Project Description: <textarea name="description" id="description" cols="100" rows="20" placeholder="Write description about Project" maxlenght="10000"></textarea></p>    

        <p>Keywords: * <input type="text" name="keywords" placeholder="Enter keywords separated by commas" maxlenght="255" required></p>

        <p>Upload PDF: *<p><input type = "file"  name = "pdfFile" accept = ".pdf" id = "pdfFile" required></p></p>

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
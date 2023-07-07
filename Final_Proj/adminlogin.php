<?php
require_once "config.php";
$email = $password = "";
$err="";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if(empty($err))
    {
        $sql = "SELECT id, email, password, name FROM admins WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_email);
        $param_email = $email;
        
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 0){
                echo "<script>alert('Email not Registered. Please Register.'); window.location='adminlogin.php'</script>";
            }
            if(mysqli_stmt_num_rows($stmt) == 1)
            {
                mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password, $name);
                if(mysqli_stmt_fetch($stmt))
                {
                    if(password_verify($password, $hashed_password))
                    {
                        session_start();
                        $_SESSION["email"] = $email;
                        $_SESSION["id"] = $id;
                        $_SESSION["name"] = $name;
                        $_SESSION["loggedin"] = true;

                        echo "<script>alert('Successful login.'); window.location='adminhomepage.php'</script>";
                    }
                    else{
                        echo "<script>alert('Incorrect password. Please try again.'); window.location='adminlogin.php'</script>";
                    }
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head lang="vi">
        <meta http-equi="Content-Type" content="text/html" charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" href="../css/style1.css" type="text/css">
        <link rel="icon" href="/favicon/favicon.ico">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    </head>

    <body>
        <header>
            <a class="logo" href="index.php">Anusandhaan</a>
        </header>
        
        <section class="section">
            <div class="login-box">
                <form action="" method="post">
                    <h2>Admin Login</h2>

                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="person"></ion-icon>
                        </span>
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>

                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="lock-closed"></ion-icon>
                        </span>
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>

                    <button type="Submit" class="btn">Login</button>
                    <div class="login-register">
                        <p>Don't have an account? <a href="adminregister.php" class="register-link">Register</a></p>
                    </div>
                </form>
            </div>
        </section>

        <script src="js/script1.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>

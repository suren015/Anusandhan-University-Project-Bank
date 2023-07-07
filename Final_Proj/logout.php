<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
echo "<script>alert('Logging out...'); window.location='index.php'</script>";
header("Location:index.php");
?>
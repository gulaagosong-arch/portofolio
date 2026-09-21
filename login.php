<?php

session_start();

$password = $_POST["password"] ?? "";

// Password admin
$password_admin = "sidiaa";

if ($password === $password_admin) {

    $_SESSION["admin_login"] = true;

    header("Location: admin.php");
    exit;

} else {

    echo "<script>
            alert('Password salah!');
            window.history.back();
          </script>";
    exit;
}

?>
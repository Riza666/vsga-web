<?php

session_start();
include "koneksi.php";

if ($_POST) {

    // Get input
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $captcha_code = $_POST['captcha_code'];

    // Cek username dan password
    $sql = "SELECT * FROM akun WHERE username='$username' AND password='$password'";
    $login = mysqli_query($conn, $sql);
    $ketemu = mysqli_num_rows($login);
    $r = mysqli_fetch_array($login);
    if ($_POST["captcha_code"] == $_SESSION["captcha_code"]) {
        if ($ketemu > 0) {

            $_SESSION['username'] = $r['username'];
            $_SESSION['level'] = $r['level'];

            // Cek level user
            if ($_SESSION['level'] == 'anggota') {
                $_SESSION['id_akun'] = $r['id_akun'];
                header("Location: anggota/member_dashb.php");
                exit();
            } elseif ($_SESSION['level'] == 'petugas') {
                $_SESSION['id_akun'] = $r['id_akun'];
                header("Location: petugas/staff_dashboard.php");
                exit();
            } else {
                echo "Invalid level";
            }
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Login gagal! Username / Password salah.</div>';
        }
    } else {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Login gagal! Captcha tidak sesuai.</div>';
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <form method="post" action="login.php">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">

            <label for="password">Password</label>
            <input type="password" id="password" name="password">

            <label for="captcha_code">Captcha</label>
<div class="input-group">
    <input type="text" class="form-control" id="captcha_code" name="captcha_code">
    <div class="input-group-append">
        <img src="captcha.php" alt="CAPTCHA" class="captcha-img">
    </div>
</div>

            <button type="submit">Login</button>
        </form>
        <a href="register.php">Register</a>
        <p>&copy; 2024 All Rights Reserved.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH+14Z3z7v0mM4G874iXCqE4T0h/"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pzjw8f+ua7Kw1TIq0v8FqFjcJ6pajs/rfdfs3SO+kD4Ck5BdPtF+to8xMp9MvcJ4f1l1bW21dLxRy+0"
        crossorigin="anonymous"></script>
</body>

</html>

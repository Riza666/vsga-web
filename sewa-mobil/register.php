<?php
include_once("koneksi.php");

if (isset($_POST['insert'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama_anggota = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $notelp = $_POST['notelp'];

    // Validation
    if (strlen($password) < 5) {
        echo "<script>alert('Password must be at least 5 characters long.');</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.');</script>";
    } elseif (strlen($notelp) !== 12) {
        echo "<script>alert('Phone number must be exactly 12 characters.');</script>";
    } else {
        $result = mysqli_query($conn, "INSERT INTO akun (username, password, level, nama, alamat, email, notelp) VALUES ('$username', '$password', 'anggota', '$nama_anggota', '$alamat', '$email', '$notelp')");

        if ($result) {
            header("Location: index.php");
            exit;
        } else {
            echo "<script>alert('Error inserting record: " . mysqli_error($conn) . "');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <h1>Selamat datang di Register</h1>
        <form name="insert_anggota" method="post" action="register.php">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="notelp" class="form-label">No. Telepon</label>
                <input type="text" class="form-control" name="notelp" required>
            </div>
            <button type="submit" name="insert" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary" style="margin-top: 10px;">Cancel</a>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH+14Z3z7v0mM4G874iXCqE4T0h/"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pzjw8f+ua7Kw1TIq0v8FqFjcJ6pajs/rfdfs3SO+kD4Ck5BdPtF+to8xMp9MvcJ4f1l1bW21dLxRy+0"
        crossorigin="anonymous"></script>
</body>

</html>

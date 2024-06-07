<?php
include '../koneksi.php';
session_start();
$id_akun = $_SESSION['id_akun'];
if (!isset($id_akun)) {
    header('Location: ../login.php');
    exit();
}
$id_anggota = $_GET['id_anggota'] ?? '';

$sql = "SELECT * FROM akun WHERE id_akun = '$id_akun'";
$login = mysqli_query($conn, $sql);
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

$nama = $r['nama'];

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama_anggota = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $notelp = $_POST['notelp'];

    $result = mysqli_query($conn, "UPDATE akun SET username='$username', password='$password', nama='$nama_anggota', alamat='$alamat', email='$email', notelp='$notelp' WHERE id_akun='$id_anggota'");

    if ($result) {
        header("Location: kelola_anggota.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

$result = mysqli_query($conn, "SELECT * FROM akun WHERE id_akun='$id_anggota'");
while ($user_data = mysqli_fetch_array($result)) {
    $username = $user_data['username'];
    $password = $user_data['password'];
    $nama_anggota = $user_data['nama'];
    $alamat = $user_data['alamat'];
    $email = $user_data['email'];
    $notelp = $user_data['notelp'];
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Edit Anggota</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="" alt="" width="40" class="d-inline-block align-text-top">
                Selamat datang di Menu Edit Anggota, <?php echo $nama ?>
            </a>
            <ul class="navbar-nav ms-2">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="kelola_anggota.php">Kembali</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <figure class="text-center mt-4">
            <blockquote class="blockquote">
                <p>Edit Anggota</p>
            </blockquote>
        </figure>
        <form name="update_anggota" action="edit_anggota.php?id_anggota=<?php echo $id_anggota ?>" method="post">
            <div class="mb-3 row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="<?php echo $nama_anggota; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="notelp" class="col-sm-2 col-form-label">No. Telepon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="notelp" value="<?php echo $notelp; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <button type='submit' class='btn btn-primary' name='update' value='update'>Simpan Perubahan</button>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
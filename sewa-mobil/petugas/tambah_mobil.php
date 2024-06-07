<?php
include '../koneksi.php';
session_start();
$id_akun =$_SESSION['id_akun'] ;
if (!isset($id_akun)) {
    header('Location: ../login.php');
    exit();
}

$sql = "SELECT * FROM akun WHERE id_akun = '$id_akun'";
$login = mysqli_query($conn, $sql);
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

$nama = $r['nama'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Menu</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<?php

if (isset($_POST['insert'])) {
    $tipe_mobil = $_POST['tipe_mobil'];
    $merk = $_POST['merk'];
    $warna = $_POST['warna'];
    $tahun = $_POST['tahun'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];

    $result = mysqli_query($conn, "INSERT INTO mobil (tipe_mobil, merk, warna, tahun, kategori, harga) VALUES ('$tipe_mobil', '$merk', '$warna', '$tahun', '$kategori', '$harga')");

    if ($result) {
        header("Location: kelola_mobil.php");
        exit;
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }
}
?>

<html>

<body>
    <div class="container">
       <h2>Tambah Data Mobil</h2>
    <br> <br>
    <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-danger" onclick="window.location.href='kelola_mobil.php'">Kembali</button>
            </div>
            <div class="col-md-6">
      </div>
    </div>
    <br /><br />
    <form name="insert_buku" method="post" action="tambah_mobil.php">
        <table border="0">
            <tr>
                <td>Tipe Mobil</td>
                <td><input type="text" name="tipe_mobil"></td>
            </tr>
            <tr>
                <td>Mobil</td>
                <td><input type="text" name="merk"></td>
            </tr>
            <tr>
                <td>Warna</td>
                <td><input type="text" name="warna"></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td><input type="text" name="tahun"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td><input type="text" name="kategori"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id_mobil" value="<?php echo $id_buku ?>"></td>
                <td><input type="submit" class="btn btn-success" name="insert" value="Tambah Mobil"></td>
            </tr>
        </table>
    </form>
</body>

</html>

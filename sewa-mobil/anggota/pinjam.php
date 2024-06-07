<?php
include '../koneksi.php';

session_start();
$id_anggota = $_SESSION['id_akun'];
if (!isset($id_anggota)) {
    header('Location: ../index.php');
    exit();
}
$id_mobil = $_GET['id_mobil'] ?? '';

// Lakukan validasi atau ambil data pengguna dari database sesuai kebutuhan
$sql = "SELECT * FROM akun, mobil WHERE akun.id_akun = '$id_anggota' AND mobil.id_mobil = '$id_mobil'";
$login = mysqli_query($conn, $sql);
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);
$nama_mobil = $r['tipe_mobil'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pinjam Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="cek_pinjam.php" method="GET" class="mt-5">
            <h1>Buku Yang Akan Dipinjam Berjudul <?php echo $nama_mobil ?></h1>
            <div class="mb-3">
                <label for="tanggal_pinjam" class="form-label">Masukkan Tanggal Pinjam</label>
                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_kembali" class="form-label">Masukkan Tanggal Kembali</label>
                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
            </div>
            <input type="hidden" name="id_akun" value="<?php echo $id_anggota; ?>">
            <input type="hidden" name="id_mobil" value="<?php echo $id_mobil; ?>">
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="member_dashboard.php" class="btn btn-secondary ms-2">Cancel</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0v8FqFjcJ6pajs/rfdfs3SO+kD4Ck5BdPtF+to8xMp9MvcJ4f1l1bW21dLxRy+0" crossorigin="anonymous"></script>
</body>

</html>

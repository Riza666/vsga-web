<?php
include '../koneksi.php';
session_start();
$id_akun =$_SESSION['id_akun'] ;
if (!isset($id_akun)) {
    header('Location: ../login.php');
    exit();
}

// Lakukan validasi atau ambil data pengguna dari database sesuai kebutuhan
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

<body>
    <div class="container">
       <h2>Selamat Datang Di Halaman Admin, <?php echo $nama?></h2>
    <br> <br>
    <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-success" onclick="window.location.href='kelola_mobil.php'">Kelola Mobil</button>
              <button type="button" class="btn btn-success" onclick="window.location.href='kelola_anggota.php'">Kelola Anggota</button>
              <button type="button" class="btn btn-success" onclick="window.location.href='kelola_petugas.php'">Kelola Petugas</button>
              <button type="button" class="btn btn-danger" onclick="window.location.href='../cek_logout.php'">Logout</button>
            </div>
            <div class="col-md-6">
        <form action="" method="GET">
          <div class="input-group">
            <input type="text" class="form-control" name="cari_nama"
              placeholder="Cari Riwayat Penyewaan Mobil">
            <button class="btn btn-primary" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div>



<h2 class="mt-5 mb-2"></h2>
    <?php
    // Check if a search term is provided
    if (isset($_GET['cari_nama'])) :
        $cari_nama = $_GET['cari_nama'];
        $result = mysqli_query($conn, "SELECT * FROM historisewamobil 
        WHERE ((nama LIKE '%$cari_nama%') OR  (nama_mobil LIKE '%$cari_nama%') OR (tanggal_pinjam LIKE '%$cari_nama%') OR (tanggal_kembali LIKE '%$cari_nama%'))  
        ORDER BY nama_mobil ASC");
    else :
        // Retrieve all data if no search term is provided
        $result = mysqli_query($conn, "SELECT * FROM historisewamobil
        ORDER BY id_akun ASC");
    endif;
    ?>

    <?php if ($result->num_rows > 0): ?>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Nama Penyewa</th>
            <th scope="col">Tipe Mobil</th>
            <th scope="col">Tanggal Pinjam</th>
            <th scope="col">Tanggal Kembali</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_array($result)): ?>
          <tr>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['nama_mobil']; ?></td>
            <td><?php echo $row['tanggal_pinjam']; ?></td>
            <td><?php echo $row['tanggal_kembali']; ?></td>
          </tr>
          <?php endwhile ?>
        </tbody>
      </table>
    <?php else: ?>

      <div class="alert alert-danger text-center">
        Data tidak ditemukan!
      </div>

    <?php endif; ?>
    
  </div>
</body>
</html>

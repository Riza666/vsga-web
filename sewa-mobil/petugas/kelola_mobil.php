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
       <h2>Kelola Mobil</h2>
    <br><br>

    <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-danger" onclick="window.location.href='staff_dashboard.php'">Kembali</button>
              <button type="button" class="btn btn-success" onclick="window.location.href='tambah_mobil.php'">Tambah Mobil</button>
            </div>
            <div class="col-md-6">
        <form action="" method="GET">
          <div class="input-group">
          <input type="text" class="form-control" name="cari_nama" placeholder="Cari data mobil">
            <input type="number" class="form-control" name="filter_harga" placeholder="Filter harga">
            <input type="hidden" name="id_akun" value="<?php echo $id_akun; ?>">
            <button class="btn btn-primary" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div>


    
<h2 class="mt-5 mb-2"></h2>
<?php
    if (isset($_GET['cari_nama']) || isset($_GET['filter_harga'])) :
        $cari_nama = $_GET['cari_nama'];
        $filter_harga = isset($_GET['filter_harga']) ? $_GET['filter_harga'] : '';
        
        $result = mysqli_query($conn, "SELECT * FROM mobil WHERE (mobil.tipe_mobil LIKE '%$cari_nama%' OR mobil.merk LIKE '%$cari_nama%' OR mobil.warna LIKE '%$cari_nama%' OR mobil.tahun LIKE '%$cari_nama%' OR mobil.kategori LIKE '%$cari_nama%' OR mobil.harga LIKE '%$cari_nama%') AND mobil.harga >= '$filter_harga' ORDER BY id_mobil ASC ");
    else :
        $result = mysqli_query($conn, "SELECT * FROM mobil, akun WHERE akun.id_akun = '$id_akun'");
    endif;
?>

    <?php if ($result->num_rows > 0) : ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Tipe Mobil</th>
                <th>Merk</th>
                <th>Warna</th>
                <th>Tahun</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($user_data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $user_data['tipe_mobil'] . "</td>";
                echo "<td>" . $user_data['merk'] . "</td>";
                echo "<td>" . $user_data['warna'] . "</td>";
                echo "<td>" . $user_data['tahun'] . "</td>";
                echo "<td>" . $user_data['kategori'] . "</td>";
                echo "<td>Rp. " . $user_data['harga'] . "</td>";
                echo "<td> <a href='edit_mobil.php?id_mobil=$user_data[id_mobil]'class='btn btn-success'>Edit</a>  <a href='hapus_mobil.php?id_mobil=$user_data[id_mobil]'class='btn btn-danger'>Hapus</a> </td>";
            }
            ?>
             </tbody>
        </table>
    <?php else : ?>
        <table class="table table-bordered">
            <tr>
                <th>tipe_mobil</th>
                <th>merk</th>
                <th>warna</th>
                <th>Tahun</th>
                <th>Kategori</th>
                <th>harga</th>
                <th>Status</th>
            </tr>
            <tr>
                <div class="alert alert-danger text-center">
                    Data tidak ditemukan!
                </div>
            </tr>
        </table>
    <?php endif; ?>
</body>

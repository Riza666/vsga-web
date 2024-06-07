<?php
include '../koneksi.php';
session_start();
$id_akun =$_SESSION['id_akun'] ;
if (!isset($id_akun)) {
    header('Location: ../login.php');
    exit();
}
$id_mobil = $_GET['id_mobil'] ?? '';

$sql = "SELECT * FROM akun WHERE id_akun = '$id_akun'";
$login = mysqli_query($conn, $sql);
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);
$conn = mysqli_connect("localhost", "root", "", "sewamobil");
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
if (isset($_POST['update'])) {
    $tipe_mobil = $_POST['tipe_mobil'];
    $merk = $_POST['merk'];
    $warna = $_POST['warna'];
    $tahun = $_POST['tahun'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];

    $result = mysqli_query($conn, "UPDATE mobil SET tipe_mobil='$tipe_mobil', merk='$merk', warna='$warna', tahun='$tahun', kategori='$kategori', harga='$harga' WHERE id_mobil='$id_mobil'");

    if ($result) {
        header("Location: kelola_mobil.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

$id_mobil = $_GET['id_mobil'];

$result = mysqli_query($conn, "SELECT * FROM mobil WHERE id_mobil='$id_mobil'");
while ($user_data = mysqli_fetch_array($result)) {
    $tipe_mobil = $user_data['tipe_mobil'];
    $merk = $user_data['merk'];
    $warna = $user_data['warna'];
    $tahun = $user_data['tahun'];
    $kategori = $user_data['kategori'];
    $harga = $user_data['harga'];
}
?>

<html>

<body>
    <div class="container">
       <h2>Edit Data Mobil</h2>
    <br> <br>
    <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-danger" onclick="window.location.href='kelola_mobil.php'">Kembali</button>
            </div>
            <div class="col-md-6">
      </div>
    </div>
    <br /><br />
   
    <form name="update_buku" method="post" action="edit_mobil.php?id_mobil=<?php echo $id_mobil ?>">
        <table border="0">
            <tr>
                <td>Tipe Mobil</td>
                <td><input type="text" name="tipe_mobil" value="<?php echo $tipe_mobil; ?>"></td>
            </tr>
            <tr>
                <td>Merk</td>
                <td><input type="text" name="merk" value="<?php echo $merk; ?>"></td>
            </tr>
            <tr>
                <td>Warna</td>
                <td><input type="text" name="warna" value="<?php echo $warna; ?>"></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td><input type="text" name="tahun" value="<?php echo $tahun; ?>"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td><input type="text" name="kategori" value="<?php echo $kategori; ?>"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga" value="<?php echo $harga; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id_mobil" value="<?php echo $id_mobil ?>"></td>
                <th><input type="submit" class="btn btn-success" name="update" value="Update"></th>
            </tr>
        </table>
    </form>
</body>

</html>

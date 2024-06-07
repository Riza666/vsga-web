<?php
include '../koneksi.php';

session_start();
$id_anggota =$_SESSION['id_akun'] ;
if (!isset($id_anggota)) {
    header('Location: ../login.php');
    exit();
}
$id_mobil = $_GET['id_mobil'] ?? '';
$tanggal_pinjam = $_GET['tanggal_pinjam'];
$tanggal_kembali = $_GET['tanggal_kembali'];

// Lakukan validasi atau ambil data pengguna dari database sesuai kebutuhan
$sql = "INSERT INTO peminjaman (id_anggota, id_mobil, tanggal_pinjam, tanggal_kembali, denda) 
        VALUES ('$id_anggota', '$id_mobil', '$tanggal_pinjam', '$tanggal_kembali', '0')";
$sql_upd = "UPDATE mobil SET harga = harga - 1 WHERE id_mobil = '$id_mobil'";
$result = mysqli_query($conn, $sql_upd);

$login = mysqli_query($conn, $sql);


if ($login) {
    // Redirect ke halaman dashboard setelah berhasil melakukan peminjaman
    header("Location: history_sewa.php");
} else {
    // Tampilkan pesan error jika query gagal dieksekusi
    echo "Error: " . mysqli_error($conn);
}
?>

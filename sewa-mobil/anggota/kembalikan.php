<?php
include '../koneksi.php';

session_start();
$id_anggota = $_SESSION['id_akun'];
if (!isset($id_anggota)) {
    header('Location: ../login.php');
    exit();
}

$id_peminjaman = $_GET['id_peminjaman'] ?? '';
$id_mobil = $_GET['id_mobil'] ?? '';

$sql = "SELECT * FROM akun WHERE id_akun = '$id_anggota'";
$login = mysqli_query($conn, $sql);
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);
$nama = $r['nama'];

$sqll = "SELECT * FROM peminjaman, mobil, akun WHERE peminjaman.id_anggota = akun.id_akun AND peminjaman.id_mobil = mobil.id_mobil AND peminjaman.id_anggota = $id_anggota";
$loginn = mysqli_query($conn, $sqll);
$ketemuu = mysqli_num_rows($loginn);
$rr = mysqli_fetch_array($loginn);
$tgl_pinjam = $rr['tanggal_pinjam'];
$tgl_kembali = $rr['tanggal_kembali'];
$nama_mobil = $rr['tipe_mobil'];

$result = mysqli_query($conn, "DELETE FROM peminjaman WHERE id_peminjaman='$id_peminjaman' AND id_anggota='$id_anggota' AND id_mobil='$id_mobil'");
$sql_upd = "UPDATE mobil SET harga = harga + 1 WHERE id_mobil = '$id_mobil'";
$ubah = mysqli_query($conn, $sql_upd);

$sql_histori = "INSERT INTO historisewamobil (nama, nama_mobil, tanggal_pinjam, tanggal_kembali, id_akun) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql_histori);
mysqli_stmt_bind_param($stmt, "ssssi", $nama, $nama_mobil, $tgl_pinjam, $tgl_kembali, $id_anggota);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("Location: history_sewa.php?id_akun=$id_anggota");
?>

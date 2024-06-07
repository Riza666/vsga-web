<?php
include '../koneksi.php';
session_start();
$id_akun =$_SESSION['id_akun'] ;
if (!isset($id_akun)) {
    header('Location: ../login.php');
    exit();
}
$id_anggota = $_GET['id_anggota'] ?? '';

$result = mysqli_query($conn, "DELETE FROM akun WHERE id_akun='$id_anggota'");
// After delete redirect to Home, so that the latest user list will be displayed.
header("Location: kelola_anggota.php");
?>

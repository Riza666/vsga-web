<?php
include '../koneksi.php';
session_start();
$id_akun =$_SESSION['id_akun'] ;
if (!isset($id_akun)) {
    header('Location: ../login.php');
    exit();
}
$id_mobil = $_GET['id_mobil'] ?? '';

$result = mysqli_query($conn, "DELETE FROM mobil WHERE id_mobil='$id_mobil'");
// After delete redirect to Home, so that the latest user list will be displayed.
header("Location: kelola_mobil.php");
?>

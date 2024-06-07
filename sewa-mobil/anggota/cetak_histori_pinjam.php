<?php
// memanggil library FPDF
require('../fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l', 'mm', 'A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string
$pdf->Cell(190, 7, 'DriveEase Rent', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 7, 'DAFTAR HISTORY PENYEWAAN MOBIL', 0, 1, 'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);

// Center-align the table
$pdf->SetX(21);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 6, 'NAMA', 1, 0, 'C');
$pdf->Cell(50, 6, 'Tipe Mobil', 1, 0, 'C');
$pdf->Cell(50, 6, 'TANGGAL SEWA', 1, 0, 'C');
$pdf->Cell(50, 6, 'TANGGAL KEMBALI', 1, 0, 'C');
$pdf->SetFont('Arial', '', 10);
include '../koneksi.php';

session_start();
$id_anggota =$_SESSION['id_akun'] ;
if (!isset($id_anggota)) {
    header('Location: ../login.php');
    exit();
}
$cetakhistori = mysqli_query($conn, "SELECT * FROM historisewamobil where id_akun=$id_anggota");
while ($row = mysqli_fetch_array($cetakhistori)) {
    $pdf->Cell(10, 7, '', 0, 1);

    // Center-align the data
    $pdf->SetX(21);
    $pdf->Cell(20, 6, $row['nama'], 1, 0, 'C');
    $pdf->Cell(50, 6, $row['nama_mobil'], 1, 0, 'C');
    $pdf->Cell(50, 6, $row['tanggal_pinjam'], 1, 0, 'C');
    $pdf->Cell(50, 6, $row['tanggal_kembali'], 1, 0, 'C');
}
$pdf->Output();
?>

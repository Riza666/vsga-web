<?php
include '../koneksi.php';

session_start();
$id_anggota = $_SESSION['id_akun'];
if (!isset($id_anggota)) {
    header('Location: ../login.php');
    exit();
}
$sql = "SELECT * FROM akun WHERE id_akun = '$id_anggota'";
$login = mysqli_query($conn, $sql);
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

$nama = $r['nama'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profil | DriveEase</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-warning">
      <div class="container">
        <a class="navbar-brand" href="member_dashb.php">DriveEase</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="member_dashb.php"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Beranda
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="member_dashb.php#gallery"
                    >Gallery</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="member_dashb.php#klien"
                    >Klien Kami</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="../cek_logout.php">Logout</a>
                </li>
              </ul>
            </li>
            <a class="nav-link active" href="profile.php">Profile</a>
            <a class="nav-link" href="visimisi.php">Visi & Misi</a>
            <a class="nav-link" href="sewamobil.php">Sewa Mobil</a>
            <a class="nav-link" href="kontak.php">Kontak Kami</a>
            <a class="nav-link" href="aboutus.php">About Us</a>
          </div>
          <div class="navbar-nav ms-auto">
            <!-- Tambahkan class ms-auto untuk menggeser elemen ke kanan -->
            <p class="nav-item">
              Selamat datang di DriveEase,
              <?php echo $nama; ?>
            </p>
            <!-- Tambahkan paragraf di sini -->
          </div>
        </div>
      </div>
    </nav>

    <!-- navbar -->
    <!-- Foto Background dan nama -->
    <img src="../img/cover.jpg" alt="" style="width: 100%" />

    <section class="jumbotron text-center">
      <img
        src="../img/logo_drive.png"
        alt="Riza Fauzil"
        width="250"
        class="rounded-circle img-thumbnail"
        style="margin-top: -150px"
      />
      <h1 class="display-4 fw-medium">Profil DriveEase</h1>
    </section>
    <!-- akhir Foto Background dan nama -->
    <!-- Paragraf Konten -->
    <div class="container mt-5 mb-5">
      <p>
        DriveEase telah melayani ribuan pelanggan sejak didirikan pada tahun
        2016. Dengan pengalaman bertahun-tahun di industri rental mobil, kami
        memahami kebutuhan dan ekspektasi pelanggan kami. Pengalaman kami
        mencakup kerjasama dengan berbagai mitra bisnis, baik lokal maupun
        internasional, serta penanganan berbagai situasi dan permintaan khusus
        dari pelanggan. Komitmen kami terhadap kepuasan pelanggan telah membuat
        DriveEase menjadi pilihan utama bagi banyak individu dan perusahaan yang
        mencari solusi transportasi yang andal dan efisien. Selama
        bertahun-tahun, kami telah membangun reputasi sebagai perusahaan yang
        dapat dipercaya, dengan tim profesional yang berdedikasi untuk
        memberikan layanan terbaik.
      </p>
      <br />
      <h2 class="fw-semibold">Pengalaman Kerja DriveEase</h2>
      <ol type="A">
        <li>
          Fleksibilitas Armada: DriveEase menawarkan berbagai pilihan kendaraan
          yang dapat disesuaikan dengan kebutuhan pelanggan, mulai dari mobil
          ekonomi hingga kendaraan mewah.
        </li>
        <li>
          Kemudahan Pemesanan: Aplikasi kami dirancang untuk memudahkan proses
          pemesanan, memungkinkan pelanggan untuk menyewa mobil dengan cepat dan
          tanpa kerumitan.
        </li>
        <li>
          Layanan Pelanggan 24/7: Kami menyediakan dukungan pelanggan sepanjang
          waktu, siap membantu dan menjawab pertanyaan kapan saja, di mana saja.
        </li>
        <li>
          Keamanan dan Kenyamanan: Semua kendaraan kami dirawat dengan baik dan
          dilengkapi dengan fitur keamanan terkini, memastikan perjalanan
          pelanggan aman dan nyaman.
        </li>
        <li>
          Harga Kompetitif: DriveEase menawarkan harga yang bersaing dengan
          berbagai paket dan penawaran khusus, memastikan pelanggan mendapatkan
          nilai terbaik untuk uang mereka.
        </li>
        <li>
          Inovasi Berkelanjutan: Kami selalu berupaya untuk meningkatkan layanan
          kami dengan mengadopsi teknologi terbaru dan memperkenalkan
          fitur-fitur baru yang dapat meningkatkan pengalaman pengguna.
        </li>
        <li>
          Pilihan Pembayaran Beragam: DriveEase mendukung berbagai metode
          pembayaran, termasuk kartu kredit, transfer bank, dan pembayaran
          digital, memberikan kemudahan bagi pelanggan dalam bertransaksi.
        </li>
      </ol>
    </div>
    <!-- akhir paragraf konten -->
    <!-- Footer -->
    <footer
      id="footer"
      class="text-center text-lg-start bg-warning"
      style="margin-top: 20%"
    >
      <!-- Grid container -->
      <div class="container p-4">
        <!--Grid row-->
        <div class="row mt-4">
          <!--Grid column-->
          <div class="col-lg-5 col-md-12 mb-4 mb-md-0">
            <h5>DriveEase</h5>
            <p>
              123 Jalan Kembang, Kelurahan Ciayu, Kecamatan Karang Banteng, Kota
              Sigma, 12345
            </p>
            <p>drive.ease@email.com</p>
            <p>0871728362</p>

            <div class="">
              <!-- Facebook -->
              <a type="button" class="btn btn-lg"
                ><i class="bi bi-facebook"></i
              ></a>
              <!-- LinkedIn -->
              <a type="button" class="btn btn-lg"
                ><i class="bi bi-linkedin"></i
              ></a>
              <!-- Youtube -->
              <a type="button" class="btn btn-lg"
                ><i class="bi bi-youtube"></i
              ></a>
              <!-- Instagram + -->
              <a type="button" class="btn btn-lg"
                ><i class="bi bi-instagram"></i
              ></a>
            </div>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Grid container -->
    </footer>
    <!-- akhir footer -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

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
    <title>Contact Us | DriveEase</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
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
                class="nav-link active dropdown-toggle"
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
            <a class="nav-link" href="profile.php">Profile</a>
            <a class="nav-link" href="visimisi.php">Visi & Misi</a>
            <a class="nav-link" href="sewamobil.php">Sewa Mobil</a>
            <a class="nav-link active" href="kontak.php">Kontak Kami</a>
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
    <div class="container mt-5">
      <h1>Contact Us</h1>
      <div class="d-grid gap-2 d-md-block">
        <a class="btn btn-primary" href="https://www.whatsapp.com/download?lang=id_ID" role="button"
          >Whatsapp</a
        >
        <a class="btn btn-primary" href="https://mail.google.com/mail/u/1" role="button">Email</a>
      </div>
    </div>
    <!-- akhir testimonial -->
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

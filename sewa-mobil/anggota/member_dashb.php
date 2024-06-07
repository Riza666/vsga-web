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
    <title>DriveEase</title>
    <link rel="stylesheet" href="../index.css" />
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
    <link
      rel="stylesheet"
      href="https://unpkg.com/bs-brain@2.0.3/components/testimonials/testimonial-3/assets/css/testimonial-3.css"
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
                  <a class="dropdown-item" href="member_dashb.php#gallery">Gallery</a>
                </li>
                <li><a class="dropdown-item" href="member_dashb.php#klien">Klien Kami</a></li>
                <li><a class="dropdown-item" href="../cek_logout.php">Logout</a></li>
              </ul>
            </li>
            <a class="nav-link" href="profile.php">Profile</a>
            <a class="nav-link" href="visimisi.php">Visi & Misi</a>
            <a class="nav-link" href="sewamobil.php">Sewa Mobil</a>
            <a class="nav-link" href="kontak.php">Kontak Kami</a>
            <a class="nav-link" href="aboutus.php">About Us</a>
          </div>
          <div class="navbar-nav ms-auto">
            <!-- Tambahkan class ms-auto untuk menggeser elemen ke kanan -->
            <p class="nav-item">Selamat datang di DriveEase, <?php echo $nama; ?></p>
            <!-- Tambahkan paragraf di sini -->
          </div>
        </div>
      </div>
    </nav>

    <!-- navbar -->
    <!-- jumbotron -->
    <section class="jumbotron jumbotron-fluid text-left p-5 mb-5">
      <div class="container" data-aos="fade-in">
        <h1 class="display-4 fw-semibold text-white my-text">DriveEase</h1>
        <p class="lead text-white mt-2">
          Buka Jalan Menuju Kemudahan: DriveEase - Mitra Perjalanan Utama Anda
        </p>
        <a class="btn btn-primary" href="sewamobil.php" role="button"
          >Mulai Rental</a
        >
      </div>
    </section>
    <!-- akhir jumbotron -->
    <!-- Services -->
    <div class="container services" data-aos="fade-up">
      <div class="row text-center mt-3 mb-3">
        <div class="col">
          <h2>Kenapa Memilih DriveEase?</h2>
        </div>
      </div>
      <!-- Three columns of text below the carousel -->
      <div class="row justify-content-center text-center">
        <div class="col-lg-4" data-aos="fade-up">
          <img src="../img/deal (1).png" alt="" />
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#777" />
          <h2 class="mt-3 fs-4">Bisa Lepas Kunci</h2>
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <img src="../img/customer-service (1).png" alt="" />
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#777" />

          <h2 class="mt-3 fs-4">Kemudahan Layanan</h2>
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
          <img src="../img/car (1).png" alt="" />
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#777" />

          <h2 class="mt-3 fs-4">Jenis Mobil Lengkap</h2>
        </div>
        <!-- /.col-lg-4 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- akhir services-->
    <!-- gallery -->
    <section id="gallery">
      <div class="container mt-5">
        <div class="row mb-3">
          <div class="col">
            <h2>Gallery</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-3">
            <a href="#">
              <img
                src="../img/gallery-1.jpg"
                alt="gallery-1"
                class="img-fluid gallery-img"
              />
            </a>
          </div>
          <div class="col-md-3">
            <a href="#">
              <img
                src="../img/gallery-2.jpg"
                alt="gallery-2"
                class="img-fluid gallery-img"
              />
            </a>
          </div>
          <div class="col-md-3">
            <a href="#">
              <img
                src="../img/gallery-3.jpg"
                alt="gallery-3"
                class="img-fluid gallery-img"
              />
            </a>
          </div>
          <div class="col-md-3">
            <a href="#">
              <img
                src="../img/gallery-4.jpg"
                alt="gallery-4"
                class="img-fluid gallery-img"
              />
            </a>
          </div>
          <div class="col-md-3">
            <a href="#">
              <img
                src="../img/gallery-5.jpg"
                alt="gallery-5"
                class="img-fluid gallery-img"
              />
            </a>
          </div>
          <div class="col-md-3">
            <a href="#">
              <img
                src="../img/gallery-6.jpg"
                alt="gallery-6"
                class="img-fluid gallery-img"
              />
            </a>
          </div>
          <div class="col-md-3">
            <a href="#">
              <img
                src="../img/gallery-7.jpg"
                alt="gallery-7"
                class="img-fluid gallery-img"
              />
            </a>
          </div>
          <div class="col-md-3">
            <a href="#">
              <img
                src="../img/gallery-8.jpg"
                alt="gallery-8"
                class="img-fluid gallery-img"
              />
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- akhir gallery -->
    <!-- Testimonial -->
    <section id="klien" class="py-5 py-xl-8">
      <div class="container">
        <div class="row mt-xl-5 mb-5">
          <div class="col">
            <h2>Klien Kami</h2>
          </div>
        </div>
        <div class="row justify-content-md-center"></div>
      </div>
      <div class="container overflow-hidden" data-aos="fade-right">
        <div class="row gy-4 gy-md-0 gx-xxl-5">
          <div class="col-12 col-md-4">
            <div class="card border-0 shadow mb-3">
              <div class="card-body p-4 p-xxl-5">
                <blockquote class="mb-3 fs-5 fw-semibold">
                  "Pelayanan cepat, ramah, dan terjangkau."
                </blockquote>
                <div class="d-flex align-items-center pt-4">
                  <div>
                    <h5 class="card-title fw-bold">Stephen Chou</h5>
                    <span class="text-secondary"
                      >Ex-Manager, Tesla Company</span
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="card border-0 shadow mb-3">
              <div class="card-body p-4 p-xxl-5">
                <blockquote class="mb-3 fs-5 fw-semibold">
                  "Saya sangat puas dengan layanan rental mobil ini"
                </blockquote>
                <div class="d-flex align-items-center pt-4">
                  <div>
                    <h5 class="card-title fw-bold">Michael Doe</h5>
                    <span class="text-secondary"
                      >Cleaning Service, PT. Torabika</span
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="card border-0 border-bottom shadow">
              <div class="card-body p-4 p-xxl-5">
                <blockquote class="mb-3 fs-5 fw-semibold">
                  "Armada mobil prima, tarif terjangkau."
                </blockquote>
                <div class="d-flex align-items-center pt-4">
                  <div>
                    <h5 class="card-title fw-bold">Jane Doe</h5>
                    <span class="text-secondary">CEO, Example Company</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- akhir testimonial -->
    <!-- Footer -->
    <footer id="footer" class="text-center text-lg-start bg-warning">
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

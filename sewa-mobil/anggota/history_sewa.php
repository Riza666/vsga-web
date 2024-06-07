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

$result = mysqli_query($conn, "SELECT * FROM peminjaman, mobil, akun where peminjaman.id_anggota = akun.id_akun and peminjaman.id_mobil= mobil.id_mobil and peminjaman.id_anggota = $id_anggota");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>About | DriveEase</title>
    <link rel="stylesheet" href="css/style.css" />
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
            <a class="nav-link" href="profile.php">Profile</a>
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
    <div class="container mt-5">
      <h1>Daftar mobil yang disewa <?php echo $nama ?> </h1>
      <br> <br>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
        <a href="member_dashb.php" class="btn btn-primary">Kembali</a>
      <a href="data_history_sewa.php" class="btn btn-secondary">Histori</a>
      </div>

      <?php if ($result->num_rows > 0) : ?>
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th class="th">Tipe Mobil</th>
                      <th class="th">Merk Mobil</th>
                      <th class="th">Tanggal Pinjam</th>
                      <th class="th">Tanggal Kembali</th>
                      <th class="th">Status</th>
                  </tr>
              </thead>
              <tbody>
                  <?php while ($user_data = mysqli_fetch_array($result)) : ?>
                      <tr>
                          <td><?php echo $user_data['tipe_mobil']; ?></td>
                          <td><?php echo $user_data['merk']; ?></td>
                          <td><?php echo $user_data['tanggal_pinjam']; ?></td>
                          <td><?php echo $user_data['tanggal_kembali']; ?></td>
                          <td>
                              <a href='kembalikan.php?id_peminjaman=<?php echo $user_data['id_peminjaman']; ?>&id_mobil=<?php echo $user_data['id_mobil']; ?>' class='btn btn-danger'>Kembalikan</a>
                          </td>
                      </tr>
                  <?php endwhile; ?>
              </tbody>
          </table>
      <?php else : ?>
          <div class="alert alert-warning" role="alert">
              Data tidak ditemukan!
          </div>
      <?php endif; ?>
  </div>
    <!-- Footer -->
    <footer id="footer" class="text-center text-lg-start bg-warning" style="margin-top: 20%;">
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

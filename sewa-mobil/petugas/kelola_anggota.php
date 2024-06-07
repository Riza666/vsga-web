<?php
include '../koneksi.php';
session_start();
$id_akun = $_SESSION['id_akun'];
if (!isset($id_akun)) {
    header('Location: ../login.php');
    exit();
}

// Lakukan validasi atau ambil data pengguna dari database sesuai kebutuhan
$sql = "SELECT * FROM akun WHERE id_akun = '$id_akun'";
$login = mysqli_query($conn, $sql);
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

$nama = $r['nama'];
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Kelola Petugas</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="" alt="" width="40" class="d-inline-block align-text-top">
                Selamat datang di Kelola Anggota, <?php echo $nama ?>
            </a>
            <ul class="navbar-nav ms-2">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="staff_dashboard.php">Kembali</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <figure class="text-center mt-4">
            <blockquote class="blockquote">
                <p class="fw-bold">Data Customer DriveEase</p>
            </blockquote>
        </figure>
        <form action="" method="GET" class="mt-3 me-3">
            <div class="input-group d-flex justify-content-end mb-3">
                <input class="form-control border p-2 rounded rounded-end-0 bg-tertiary" type="search" name="cari_nama" id="keyword" placeholder="Cari Data Berdasarkan Nama Anggota" style="max-width: 300px;">
                <input type="hidden" name="id_akun" value="<?php echo $id_akun; ?>">
                <button class=" border border-start-0 bg-light rounded rounded-start-0" type="submit"><i class="fa-solid fa-magnifying-glass">Cari</i></button>
            </div>
        </form>
        <?php
        // Check if a search term is provided
        if (isset($_GET['cari_nama'])) :
            $cari_nama = $_GET['cari_nama'];
            $result = mysqli_query($conn, "SELECT * FROM akun WHERE nama LIKE '%$cari_nama%' AND level='anggota'");
        else :
            // Retrieve all data if no search term is provided
            $result = mysqli_query($conn, "SELECT * FROM akun WHERE level='anggota'");
        endif;
        ?>


        <a href="tambah_anggota.php" type="button" class="btn btn-primary mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
            </svg>Tambah</a>
        <?php if ($result->num_rows > 0) : ?>
            <table class="table table-hover table-bordered align-middle  ">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($user_data = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <th scope="row"><?php echo $user_data['username']; ?></th>
                            <td><?php echo $user_data['password']; ?></td>
                            <td><?php echo $user_data['nama']; ?></td>
                            <td><?php echo $user_data['alamat']; ?></td>
                            <td><?php echo $user_data['email']; ?></td>
                            <td><?php echo $user_data['notelp']; ?></td>
                            <td>
                                <!-- Tambah tombol Edit dan Hapus di sini -->
                                <a href="edit_anggota.php?id_anggota=<?php echo $user_data['id_akun']; ?> " style="text-decoration: none;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg>
                                </a>
                                <a href="hapus_anggota.php?id_anggota=<?php echo $user_data['id_akun']; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else : ?>
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" align="center">Data tidak ditemukan!</td>
                    </tr>
                </tbody>
            </table>
        <?php endif; ?>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
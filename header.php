<!-- Koneksi ke koneksi.php  -->
<?php
include 'koneksi.php';
// date_default_timezone_set("Asia/Jakarta");

// Mengambil data dari tabel pengaturan
$identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
$d = mysqli_fetch_object($identitas);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="./uploads/identitas/<?= $d->favicon_tk ?>">

    <title><?= $d->nama_tk ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light py-4 bg-nav fixed-top shadow-sm">
        <div class="container">
            <!-- Brand -->
            <img class="navbar-brand" src="uploads/identitas/<?= $d->logo_tk ?>" width="40">
            <a class="navbar-brand fw-bold" href="index.php"><?= $d->nama_tk ?></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse py-3 py-lg-1" id="navbarSupportedContent">
                <!-- Menu -->
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="tentang.php">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="daftarpohon.php">Daftar Pohon</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="galeri.php">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="informasi.php">Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="kontak.php">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
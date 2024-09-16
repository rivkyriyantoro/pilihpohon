<?php
session_start();
include '../koneksi.php';
if (!isset($_SESSION['status_login'])) {
    echo "<script>window.location = '../login.php?msg=Harap Login Terlebih Dahulu!'</script>";
}
date_default_timezone_set("Asia/Jakarta");

$identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
$d = mysqli_fetch_object($identitas);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <link rel="icon" href="../uploads/identitas/<?= $d->favicon_tk ?>">

    <title>Panel Admin - <?= $d->nama_tk ?></title>

    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- Typing -->
    <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
    <!-- <script src="https://cdn.tiny.cloud/1/fxjjpvjbifmgo7vbuq0py3xunukvxos5pgcjua5wb473a09n/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <!-- <script>
        tinymce.init({
            selector: '#keterangan'
        });
    </script> -->

    <!-- <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });
    </script> -->

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-light py-4 bg-nav fixed-top shadow-sm">
        <div class="container">

            <img class="navbar-brand" src="../uploads/identitas/<?= $d->logo_tk ?>" width="40">
            <a class="navbar-brand" href="index.php"><?= $d->nama_tk ?></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse py-3 py-lg-1" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                    <?php if ($_SESSION['ulevel'] == 'Super Admin') { ?>

                        <li class="nav-item mx-3">
                            <a class="nav-link" aria-current="page" href="./admin.php">Admin</a>
                        </li>

                        <!-- <li><a href="pengguna.php">Pengguna</a></li> -->

                    <?php } elseif ($_SESSION['ulevel'] == 'Admin') { ?>

                        <li class="nav-item mx-3">
                            <a class="nav-link" href="./daftarpohon.php">Daftar Pohon</a>
                        </li>

                        <li class="nav-item mx-3">
                            <a class="nav-link" href="./galeri.php">Galeri</a>
                        </li>

                        <li class="nav-item mx-3">
                            <a class="nav-link" href="./informasi.php">Informasi</a>
                        </li>

                        <li class="nav-item mx-3 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pengaturan
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./identitas-tk.php">Identitas</a></li>
                                <li><a class="dropdown-item" href="./tentang-tk.php">Tentang</a></li>
                            </ul>
                        </li>

                    <?php } ?>

                    <li class="nav-item mx-3 dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['uname'] ?> (<?= $_SESSION['ulevel'] ?>)
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./ubah-1password.php">Ubah Password</a></li>
                            <li><a class="dropdown-item" href="./logout.php">Keluar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
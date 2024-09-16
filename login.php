<!-- Koneksi ke koneksi.php  -->
<?php
session_start();
include 'koneksi.php';

// Mengambil data dari tabel pengaturan
$identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
$d = mysqli_fetch_object($identitas);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="./uploads/identitas/<?= $d->favicon_tk ?>">

    <title>Halaman Login</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
</head>

<body>

    <div class="container col-sm-3 p-5 m-4 shadow">
        <div class="row">
            <div class="col-sm-12">
                <form action="" method="POST">
                    <fieldset>
                        <h2 class="text-center">LOGIN ADMIN</h2>

                        <div class="mb-3 mt-3">
                            <label for="username" class="form-label">Username</label>
                            <input class="form-control" type="text" placeholder="Username Anda..." name="user" autocomplete="off required>
                        </div>

                        <div class=" mb-3 mt-3">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" type="password" placeholder="Password Anda..." name="pass" autocomplete="off" required>
                        </div>

                        <div class="button d-grid gap-2 mb-3 mt-4">
                            <button name="submit" class="btn btn-primary">Login</button>
                        </div>

                    </fieldset>
                </form>

                <?php
                // Memeriksa apakah tombol submit di klik atau tidak, jika dieksekusi maka blok kode didalamnya akan dieksekusi
                if (isset($_POST['submit'])) {

                    // Mendapatkan nilai yang dikirim dari "form login" dengan metode POST
                    // Digunakan untuk menghindari serangan SQL injection dengan mengamankan nilai yang masuk ke dalam query
                    $user = mysqli_real_escape_string($conn, $_POST['user']);
                    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

                    // Digunakan untuk mengambil data dari tabel "admin" yang memiliki username yang cocok dengan nilai yang dimasukkan. Query ini akan memeriksa keberadaan username dalam tabel.
                    $cek  = mysqli_query($conn, "SELECT * FROM admin WHERE username = '" . $user . "' ");
                    if (mysqli_num_rows($cek) > 0) {

                        $d = mysqli_fetch_object($cek);
                        if (md5($pass) == $d->password) {

                            $_SESSION['status_login']   = true;
                            $_SESSION['uid']            = $d->id;
                            $_SESSION['uname']          = $d->nama;
                            $_SESSION['ulevel']         = $d->level;

                            echo "<script>window.location = 'admin/index.php'</script>";
                        } else {
                            echo '<div class="alert alert-error">Password salah</div>';
                        }
                    } else {
                        echo '<div class="alert alert-error">Username tidak ditemukan</div>';
                    }
                }

                ?>

            </div>
            <div class="text-center">
                <p>
                    <a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="index.php">Halaman Utama</a>
                </p>
            </div>

        </div>
    </div>

    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous">
    </script>

</body>

</html>
<!-- Koneksi dengan header.php -->
<?php include 'header.php' ?>

<section>
    <div class="container mb-5 mt-5">
        <div class="card border-0 shadow">
            <div class="card-header">
                <h3 class="text-center">Ubah Password</h3>
            </div>

            <form class="container mt-4 mb-5 p-4" action="" method="POST" enctype="multipart/form-data">

                <?php
                if (isset($_POST['submit'])) {

                    $pass0 = addslashes($_POST['pass0']);
                    $pass1 = addslashes($_POST['pass1']);
                    $pass2 = addslashes($_POST['pass2']);

                    // Pastikan password saat ini sesuai sebelum mengubahnya
                    $currentPassword = mysqli_query($conn, "SELECT password FROM admin WHERE id = '" . $_SESSION['uid'] .
                        "'");

                    $currentPassword = mysqli_fetch_assoc($currentPassword)['password'];

                    if (md5($pass0) != $currentPassword) {
                        echo '<div class="alert alert-danger">Password Yang Lama Tidak Sesuai</div>';
                    } elseif ($pass2 != $pass1) {
                        echo '<div class="alert alert-danger">Password Baru Dan Konfirmasi Password Baru Tidak Sesuai</div>';
                    } else {

                        $update = mysqli_query($conn, "UPDATE admin SET
                        password = '" . md5($pass1) . "'
                        WHERE id = '" . $_SESSION['uid'] . "'
                        ");

                        if ($update) {
                            echo '<div class="alert alert-success">Ubah Password Berhasil</div>';
                        } else {
                            echo 'gagal edit ' . mysqli_error($conn);
                        }
                    }
                }
                ?>

                <div class="mb-3">
                    <label class="form-label">Password Lama</label>
                    <input type="password" name="pass0" placeholder="Password Lama..." class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password Baru</label>
                    <input type="password" name="pass1" placeholder="Password Baru..." class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" name="pass2" placeholder="Ulangi Password Baru..." class="form-control"
                        required>
                </div>

                <button type="button" class="btn btn-secondary"
                    onclick="window.location = './index.php'">Kembali</button>
                <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
            </form>


        </div>
    </div>
</section>

<?php include 'footer.php' ?>
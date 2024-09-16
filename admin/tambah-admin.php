<!-- Koneksi dengan header.php -->
<?php include 'header.php' ?>

<section>
    <div class="container mb-5 mt-5">
        <div class="card border-0 shadow">
            <div class="card-header">
                <h3 class="text-center">Tambah Admin</h3>
            </div>

            <form class="container mt-5 mb-5 p-4" action="" method="POST" enctype="multipart/form-data">

                <?php
                if (isset($_POST['submit'])) {

                    $nama     = addslashes(ucwords($_POST['nama']));
                    $user     = addslashes($_POST['user']);
                    $level    = $_POST['level'];
                    $pass     = '123456';

                    $cek      = mysqli_query($conn, "SELECT username FROM admin WHERE username = '" . $user . "' ");
                    if (mysqli_num_rows($cek) > 0) {
                        echo '<div class="alert alert-error">Username sudah digunakan</div>';
                    } else {

                        $simpan = mysqli_query($conn, "INSERT INTO admin VALUES (
                            null,
                            '" . $nama . "',
                            '" . $user . "',
                            '" . md5($pass) . "',
                            '" . $level . "'
                            )");

                        if ($simpan) {
                            echo '<div class="alert alert-success">Simpan Berhasil</div>';
                        } else {
                            echo 'gagal simpan ' . mysqli_error($conn);
                        }
                    }
                }

                ?>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap..." class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="user" placeholder="Username..." class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Level</label>
                    <select name="level" class="form-select" required>
                        <option value="">Pilih</option>
                        <option value="Super Admin">Super Admin</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>

                <button type="button" class="btn btn-secondary"
                    onclick="window.location = './admin.php'">Kembali</button>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </form>

        </div>
    </div>
</section>

<?php include 'footer.php' ?>
<!-- Koneksi dengan header.php -->
<?php include 'header.php' ?>

<?php
$admin = mysqli_query($conn, "SELECT * FROM admin WHERE id = '" . $_GET['id'] . "' ");

if (mysqli_num_rows($admin) == 0) {
    echo "<script>window.location='admin.php'</script>";
}

$p = mysqli_fetch_object($admin);
?>

<section>
    <div class="container mb-5 mt-5">
        <div class="card border-0 shadow">
            <div class="card-header">
                <h3 class="text-center">Edit Admin</h3>
            </div>

            <form class="container mt-5 mb-5 p-4" action="" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap..." class="form-control"
                        value="<?= $p->nama ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="user" placeholder="Username..." class="form-control"
                        value="<?= $p->username ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Level</label>
                    <select name="level" class="form-select" required>
                        <option value="">Pilih</option>
                        <option value="Super Admin" <?= ($p->level == 'Super Admin') ? 'selected' : ''; ?>>Super Admin
                        </option>
                        <option value="Admin" <?= ($p->level == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                    </select>
                </div>


                <button type="button" class="btn btn-secondary"
                    onclick="window.location = './admin.php'">Kembali</button>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </form>

            <?php
            if (isset($_POST['submit'])) {

                $nama     = addslashes(ucwords($_POST['nama']));
                $user     = addslashes($_POST['user']);
                $level     = $_POST['level'];

                $update = mysqli_query($conn, "UPDATE admin SET
							nama = '" . $nama . "',
							username = '" . $user . "',
							level = '" . $level . "'
							WHERE id = '" . $_GET['id'] . "'
						");

                if ($update) {
                    echo "<script>window.location='admin.php?success=Edit Data Berhasil'</script>";
                } else {
                    echo 'gagal edit ' . mysqli_error($conn);
                }
            }

            ?>

        </div>
    </div>
</section>

<?php include 'footer.php' ?>
<!-- Koneksi dengan header.php -->
<?php include 'header.php' ?>

<?php
$informasi = mysqli_query($conn, "SELECT * FROM informasi WHERE id = '" . $_GET['id'] . "' ");

if (mysqli_num_rows($informasi) == 0) {
	echo "<script>window.location='informasi.php'</script>";
}

$p = mysqli_fetch_object($informasi);
?>

<section>
    <div class="container mb-5 mt-5">
        <div class="card border-0 shadow">
            <div class="card-header">
                <h3 class="text-center">Edit Data Informasi</h3>
            </div>

            <form class="container mt-5 mb-5 p-4" action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="judul" placeholder="Judul Informasi..." class="form-control"
                        value="<?= $p->judul ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea class="form-control" name="keterangan" placeholder="Keterangan..." id="editor"
                        rows="3"><?= $p->keterangan ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar</label>
                    <img src="../uploads/informasi/<?= $p->gambar ?>" width="200px" class="image card mb-3">
                    <input type="hidden" name="gambar2" class="form-control" value="<?= $p->gambar ?>">
                    <input type="file" name="gambar" class="form-control">
                </div>

                <button type="button" class="btn btn-secondary"
                    onclick="window.location = 'informasi.php'">Kembali</button>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </form>

            <?php

			if (isset($_POST['submit'])) {

				$judul 	= addslashes(ucwords($_POST['judul']));
				$ket 	= addslashes($_POST['keterangan']);

				if ($_FILES['gambar']['name'] != '') {

					// echo 'user ganti gambar';

					$filename 	= $_FILES['gambar']['name'];
					$tmpname 	= $_FILES['gambar']['tmp_name'];
					$filesize 	= $_FILES['gambar']['size'];

					$formatfile = pathinfo($filename, PATHINFO_EXTENSION);
					$rename 	= 'informasi' . time() . '.' . $formatfile;

					$allowedtype = array('png', 'jpg', 'jpeg', 'gif');

					if (!in_array($formatfile, $allowedtype)) {

						echo '<div class="alert alert-error">Format file tidak diizinkan.</div>';

						return false;
					} elseif ($filesize > 1000000) {

						echo '<div class="alert alert-error">Ukuran file tidak boleh lebih dari 1 MB.</div>';

						return false;
					} else {

						if (file_exists("../uploads/informasi/" . $_POST['gambar2'])) {

							unlink("../uploads/informasi/" . $_POST['gambar2']);
						}

						move_uploaded_file($tmpname, "../uploads/informasi/" . $rename);
					}
				} else {

					// echo 'user tidak ganti gambar';

					$rename = $_POST['gambar2'];
				}

				$update = mysqli_query($conn, "UPDATE informasi SET
							judul = '" . $judul . "',
							keterangan = '" . $ket . "',
							gambar = '" . $rename . "'
							WHERE id = '" . $_GET['id'] . "'
						");

				if ($update) {
					echo "<script>window.location='informasi.php?success=Edit Data Berhasil'</script>";
				} else {
					echo 'gagal edit ' . mysqli_error($conn);
				}
			}

			?>

        </div>
    </div>
</section>

<script>
        var editor = new Simditor({
        textarea: $('#editor')
    //optional options
    });
    </script>

<?php include 'footer.php' ?>
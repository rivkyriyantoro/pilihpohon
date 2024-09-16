<!-- Koneksi dengan header.php -->
<?php include 'header.php' ?>

<section>
	<div class="container mb-5 mt-5">
		<div class="card border-0 shadow">
			<div class="card-header">
				<h3 class="text-center">Tambah Galeri</h3>
			</div>

			<form class="container mt-5 mb-5 p-4" action="" method="POST" enctype="multipart/form-data">

				<?php
				if (isset($_POST['submit'])) {

					// print_r($_FILES['gambar']);

					$ket 	= addslashes(ucwords($_POST['keterangan']));

					$filename 	= $_FILES['gambar']['name'];
					$tmpname 	= $_FILES['gambar']['tmp_name'];
					$filesize 	= $_FILES['gambar']['size'];

					$formatfile = pathinfo($filename, PATHINFO_EXTENSION);
					$rename 	= 'galeri' . time() . '.' . $formatfile;

					$allowedtype = array('png', 'jpg', 'jpeg', 'gif');

					if (!in_array($formatfile, $allowedtype)) {

						echo '<div class="alert alert-error">Format file tidak diizinkan.</div>';
					} elseif ($filesize > 1000000) {

						echo '<div class="alert alert-error">Ukuran file tidak boleh lebih dari 1 MB.</div>';
					} else {

						move_uploaded_file($tmpname, "../uploads/galeri/" . $rename);

						$simpan = mysqli_query($conn, "INSERT INTO galeri VALUES (
									null,
									'" . $rename . "',
									'" . $ket . "'
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
					<label class="form-label">Keterangan</label>
					<textarea class="form-control" name="keterangan" id="editor" placeholder="Keterangan..." rows="3"></textarea>
				</div>

				<div class="mb-3">
					<label class="form-label">Gambar</label>
					<input type="file" name="gambar" class="form-control" required>
				</div>

				<button type="button" class="btn btn-secondary" onclick="window.location = 'galeri.php'">Kembali</button>
				<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
			</form>
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
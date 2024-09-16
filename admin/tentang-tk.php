<!-- Koneksi dengan header.php -->
<?php include 'header.php' ?>

<section>
    <div class="container mb-5 mt-5">
        <div class="card border-0 shadow">
            <div class="card-header">
                <h3 class="text-center">Tentang Kami </h3>
            </div>
            <form class="container mt-5 mb-5 p-4" action="" method="POST" enctype="multipart/form-data">

                <?php
				if (isset($_GET['success'])) {
					echo "<div class='alert alert-success'>" . $_GET['success'] . "</div>";
				}
				?>

                <div class="mb-3">
                    <label class="form-label">Tentang TK</label>
                    <textarea class="form-control" name="tentang" placeholder="Tentang TK" id="keterangan"
                        rows="20"><?= $d->tentang_tk ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto TK</label>
                    <br>
                    <img src="../uploads/identitas/<?= $d->foto_tk ?>" width="200px" class="image card mb-1">
                    <input type="hidden" name="foto_lama" class="form-control" value="<?= $d->foto_tk ?>">
                    <input type="file" name="foto_baru" class="form-control">
                </div>

                <button type="submit" name="submit" value="Simpan Perubahan" class="btn btn-primary">Simpan
                    Perubahan</button>
            </form>
            <?php

			if (isset($_POST['submit'])) {

				$tentang  = addslashes($_POST['tentang']);

				// menampung dan validasi data foto TK
				if ($_FILES['foto_baru']['name'] != '') {

					$filename 	= $_FILES['foto_baru']['name'];
					$tmpname 	= $_FILES['foto_baru']['tmp_name'];
					$filesize 	= $_FILES['foto_baru']['size'];

					$formatfile = pathinfo($filename, PATHINFO_EXTENSION);
					$rename 	 = 'TK' . time() . '.' . $formatfile;

					$allowedtype = array('png', 'jpg', 'jpeg', 'gif');

					if (!in_array($formatfile, $allowedtype)) {

						echo '<div class="alert alert-error">Format file foto TK tidak diizinkan.</div>';

						return false;
					} elseif ($filesize > 1000000) {

						echo '<div class="alert alert-error">Ukuran file foto TK tidak boleh lebih dari 1 MB.</div>';

						return false;
					} else {

						if (file_exists("../uploads/identitas/" . $_POST['foto_lama'])) {

							unlink("../uploads/identitas/" . $_POST['foto_lama']);
						}

						move_uploaded_file($tmpname, "../uploads/identitas/" . $rename);
					}
				} else {

					$rename 	= $_POST['foto_lama'];
				}

				$update = mysqli_query($conn, "UPDATE pengaturan SET
							tentang_tk = '" . $tentang . "',
							foto_tk = '" . $rename . "'
							WHERE id = '" . $d->id . "'
						");

				if ($update) {
					echo "<script>window.location='tentang-tk.php?success=Edit Data Berhasil'</script>";
				} else {
					echo 'gagal edit ' . mysqli_error($conn);
				}
			}

			?>

        </div>
    </div>
</section>

<?php include 'footer.php' ?>
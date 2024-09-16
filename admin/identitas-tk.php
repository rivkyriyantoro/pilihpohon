<!-- Koneksi dengan header.php -->
<?php include 'header.php' ?>

<section>
    <div class="container mb-5 mt-5">
        <div class="card border-0 shadow">
            <div class="card-header">
                <h3 class="text-center">Identitas Kami</h3>
            </div>

            <form class="container mt-5 mb-5 p-4" action="" method="POST" enctype="multipart/form-data">

                <?php
				if (isset($_GET['success'])) {
					echo "<div class='alert alert-success'>" . $_GET['success'] . "</div>";
				}
				?>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama_tk" placeholder="Nama TK" value="<?= $d->nama_tk ?>"
                        class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email_tk" placeholder="Email TK" value="<?= $d->email_tk ?>"
                        class=" form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text" name="telepon_tk" placeholder="Telepon TK" value="<?= $d->telepon_tk ?>"
                        class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat_tk" placeholder="Alamat"
                        rows="3"><?= $d->alamat_tk ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Google Maps</label>
                    <textarea class="form-control" name="gmaps" placeholder="Google Maps"
                        rows="3"><?= $d->google_maps ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Logo</label>
                    <br>
                    <img src="../uploads/identitas/<?= $d->logo_tk ?>" width="200px" class="image card mb-3">
                    <input type="hidden" name="logo_lama" class="form-control" value="<?= $d->logo_tk ?>">
                    <input type="file" name="logo_baru" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Icon</label>
                    <br>
                    <img src="../uploads/identitas/<?= $d->favicon_tk ?>" width="32" class="image card mb-3">
                    <input type="hidden" name="favicon_lama" class="form-control" value="<?= $d->favicon_tk ?>">
                    <input type="file" name="favicon_baru" class="form-control">
                </div>

                <button type="submit" name="submit" value="Simpan Perubahan" class="btn btn-primary">Simpan
                    Perubahan</button>
            </form>
            <?php

			if (isset($_POST['submit'])) {

				$nama_tk 	= addslashes(ucwords($_POST['nama_tk']));
				$email_tk 	= addslashes($_POST['email_tk']);
				$telepon_tk = addslashes($_POST['telepon_tk']);
				$alamat_tk	= addslashes($_POST['alamat_tk']);
				$gmaps 	= addslashes($_POST['gmaps']);

				// menampung dan validasi data logo
				if ($_FILES['logo_baru']['name'] != '') {

					$filename_logo 	= $_FILES['logo_baru']['name'];
					$tmpname_logo 	= $_FILES['logo_baru']['tmp_name'];
					$filesize_logo 	= $_FILES['logo_baru']['size'];

					$formatfile_logo = pathinfo($filename_logo, PATHINFO_EXTENSION);
					$rename_logo 	 = 'logo_tk' . time() . '.' . $formatfile_logo;

					$allowedtype_logo = array('png', 'jpg', 'jpeg', 'gif');

					if (!in_array($formatfile_logo, $allowedtype_logo)) {

						echo '<div class="alert alert-error">Format file logo TK tidak diizinkan.</div>';

						return false;
					} elseif ($filesize_logo > 3000000) {

						echo '<div class="alert alert-error">Ukuran file logo TK tidak boleh lebih dari 1 MB.</div>';

						return false;
					} else {

						if (file_exists("../uploads/identitas/" . $_POST['logo_lama'])) {

							unlink("../uploads/identitas/" . $_POST['logo_lama']);
						}

						move_uploaded_file($tmpname_logo, "../uploads/identitas/" . $rename_logo);
					}
				} else {

					$rename_logo 	= $_POST['logo_lama'];
				}

				// menampung dan validasi data favicon
				if ($_FILES['favicon_baru']['name'] != '') {

					$filename_favicon 	= $_FILES['favicon_baru']['name'];
					$tmpname_favicon 	= $_FILES['favicon_baru']['tmp_name'];
					$filesize_favicon 	= $_FILES['favicon_baru']['size'];

					$formatfile_favicon = pathinfo($filename_favicon, PATHINFO_EXTENSION);
					$rename_favicon 	= 'favicon_tk' . time() . '.' . $formatfile_favicon;

					$allowedtype_favicon = array('png', 'jpg', 'jpeg', 'gif');

					if (!in_array($formatfile_favicon, $allowedtype_favicon)) {

						echo '<div class="alert alert-error">Format file favicon TK tidak diizinkan.</div>';

						return false;
					} elseif ($filesize_favicon > 3000000) {

						echo '<div class="alert alert-error">Ukuran file favicon TK tidak boleh lebih dari 1 MB.</div>';

						return false;
					} else {

						if (file_exists("../uploads/identitas/" . $_POST['favicon_lama'])) {

							unlink("../uploads/identitas/" . $_POST['favicon_lama']);
						}

						move_uploaded_file($tmpname_favicon, "../uploads/identitas/" . $rename_favicon);
					}
				} else {

					$rename_favicon 	= $_POST['favicon_lama'];
				}

				$update = mysqli_query($conn, "UPDATE pengaturan SET
										nama_tk = '" . $nama_tk . "',
										email_tk = '" . $email_tk . "',
										telepon_tk = '" . $telepon_tk . "',
										alamat_tk = '" . $alamat_tk . "',
										google_maps = '" . $gmaps . "',
										logo_tk = '" . $rename_logo . "',
										favicon_tk = '" . $rename_favicon . "'
										WHERE id = '" . $d->id . "'
									");

				if ($update) {
					echo "<script>window.location='identitas-tk.php?success=Edit Data Berhasil'</script>";
				} else {
					echo 'gagal edit ' . mysqli_error($conn);
				}
			}
			?>
        </div>
    </div>
</section>

<?php include 'footer.php' ?>
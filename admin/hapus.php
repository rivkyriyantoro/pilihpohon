<?php

include '../koneksi.php';

if (isset($_GET['idadmin'])) {

	$delete = mysqli_query($conn, "DELETE FROM admin WHERE id = '" . $_GET['idadmin'] . "' ");
	echo "<script>window.location = 'admin.php'</script>";
}

if (isset($_GET['iddaftarpohon'])) {
	$daftarpohon = mysqli_query($conn, "SELECT gambar FROM daftarpohon WHERE id = '" . $_GET['iddaftarpohon'] . "' ");
	if (mysqli_num_rows($daftarpohon) > 0) {
		$p = mysqli_fetch_object($daftarpohon);
		if (file_exists("../uploads/daftarpohon/" . $p->gambar)) {
			unlink("../uploads/daftarpohon/" . $p->gambar);
		}
	}
	$delete = mysqli_query($conn, "DELETE FROM daftarpohon WHERE id = '" . $_GET['iddaftarpohon'] . "' ");
	echo "<script>window.location = 'daftarpohon.php'</script>";
}

if (isset($_GET['idgaleri'])) {

	$galeri = mysqli_query($conn, "SELECT foto FROM galeri WHERE id = '" . $_GET['idgaleri'] . "' ");

	if (mysqli_num_rows($galeri) > 0) {

		$p = mysqli_fetch_object($galeri);

		if (file_exists("../uploads/galeri/" . $p->foto)) {

			unlink("../uploads/galeri/" . $p->foto);
		}
	}

	$delete = mysqli_query($conn, "DELETE FROM galeri WHERE id = '" . $_GET['idgaleri'] . "' ");
	echo "<script>window.location = 'galeri.php'</script>";
}

if (isset($_GET['idinformasi'])) {

	$informasi = mysqli_query($conn, "SELECT gambar FROM informasi WHERE id = '" . $_GET['idinformasi'] . "' ");

	if (mysqli_num_rows($informasi) > 0) {

		$p = mysqli_fetch_object($informasi);

		if (file_exists("../uploads/informasi/" . $p->gambar)) {

			unlink("../uploads/informasi/" . $p->gambar);
		}
	}

	$delete = mysqli_query($conn, "DELETE FROM informasi WHERE id = '" . $_GET['idinformasi'] . "' ");
	echo "<script>window.location = 'informasi.php'</script>";
}

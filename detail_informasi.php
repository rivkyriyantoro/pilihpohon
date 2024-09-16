<!-- Koneksi ke header.php  -->
<?php include 'header.php'; ?>

<section>
    <div class="container pt-4 pb-5">
        <?php
        // Mengambil data dari database berdasarkan id melalui parameter GET['id']
        $informasi = mysqli_query($conn, "SELECT * FROM informasi WHERE id = '" . $_GET['id'] . "' ");

        if (mysqli_num_rows($informasi) == 0) {
            echo "<script>window.location='index.php'</script>";
        }

        $p = mysqli_fetch_object($informasi);
        ?>

        <h3 class="fw-bold lh-2 mb-5 text-center"><?= $p->judul ?></h3>
        <div class="gambar">
            <img src="uploads/informasi/<?= $p->gambar ?>" width="80%" class="image img-fluid rounded-4 shadow mb-5"
                style="margin-top:5px">
        </div>
        <?= $p->keterangan ?>
    </div>
</section>

<?php include 'footer.php'; ?>
<!-- Koneksi ke header.php  -->
<?php include 'header.php'; ?>

<section>
    <div class="container pt-4 pb-5">
        <?php
        // Mengambil data dari database berdasarkan id melalui parameter GET['id']
        $daftarpohon = mysqli_query($conn, "SELECT * FROM daftarpohon WHERE id = '" . $_GET['id'] . "' ");

        if (mysqli_num_rows($daftarpohon) == 0) {
            echo "<script>window.location='index.php'</script>";
        }

        $p = mysqli_fetch_object($daftarpohon);
        ?>

        <h2 class="fw-bold lh-2 mb-5 text-center"><?= $p->nama ?></h2>
        <div class="gambar text-center">
            <img src="uploads/daftarpohon/<?= $p->gambar ?>" width="80%"
                class="image img-fluid rounded-4 shadow mb-5" style="margin-top:5px">
        </div>

        <h3 class="fw-bold lh-2 mb-5">Status Keefektifan: <?= $p->status ?></h3>

        <?= $p->keterangan ?>
    </div>
</section>

<!-- Koneksi dengan footer.php -->
<?php include 'footer.php'; ?>
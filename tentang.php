<!-- Koneksi ke header.php  -->
<?php include 'header.php'; ?>

<section>
    <div class="container pt-4 pb-5 mt-1">
        <h3 class="fw-bold lh-2 mb-3 text-center">Tentang Kami</h3>
        <div class="gambar text-center p-4 mt-4">
            <img src="uploads/identitas/<?= $d->foto_tk ?>" width="100%" class="img-fluid rounded-4  " alt="...">
        </div>
        <div class="isi pt-5 mt-3 pb-5">
            <?= $d->tentang_tk ?>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
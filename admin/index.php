<!-- Koneksi dengan header.php -->
<?php include 'header.php' ?>

<!-- content -->
<section>
    <div class="container pt-5 mt-5 mb5 pb-5">
        <div class="row mb-3">
            <div class="col-sm-6">
                <img src="../uploads/identitas/<?= $d->foto_tk ?>" class="figure-img img-fluid rounded" alt="Digital Creative" loading="lazy">
            </div>
            <div class="col-sm-6">
                <h2 class="fw-bold lh-2 mb-4">Selamat Datang di Halaman Admin <?= $d->nama_tk ?></h2>
                <p class="lead mb-5">KB/TK Tumbuh merupakan institusi pendidikan anak usia dini yang memfasilitasi
                    peserta didik usia 2-6 tahun dengan mengusung konsep pendidikan inklusi berbudaya. Konsep pendidikan
                    tersebut diselenggarakan dengan tujuan TK dapat memfasilitasi keberagaman potensi peserta didik
                    berdasarkan nilai-nilai luhur budaya Indonesia.</p>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php' ?>
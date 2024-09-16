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
                <p class="lead mb-5">PILIH POHON platform yang didedikasikan untuk membantu Anda memilih pohon yang paling efektif dalam menyerap karbon dioksida (CO₂) dari lingkungan. Di sini, kami menyediakan informasi yang Anda butuhkan untuk membuat keputusan yang bijaksana dalam memilih jenis pohon yang sesuai dengan kebutuhan lingkungan Anda.</p>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php' ?>
<!-- Koneksi ke header.php  -->
<?php include 'header.php'; ?>

<!-- Kontak -->
<section id="kontak">
    <div class="container text-center pt-4 pb-5 mt-1">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h3 class="fw-bold lh-2 mb-3">KONTAK KAMI</h3>
                <p class="lead">Pada bagian di bawah ini merupakan link Google Maps dan alamat Kami, serta
                    nomor WhatsApp / WA Kami. </p>
            </div>
        </div>

        <div class="row align-items-start text-start g-4 pt-4 pb-5">
            <div class="col-lg-7">
                <iframe src="<?= $d->google_maps ?>" class="rounded-4 shadow" width="100%" height="335"
                    style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
            <div class="col-lg-5">
                <div class="card h-100 border-0 rounded-4 shadow">
                    <div class="card-body p-4 pb-0">
                        <div class="d-flex py-2">
                            <div class="flex-shrink-0">
                                <i class="bi bi-geo-alt text-primary fs-3"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-1">Alamat</h5>
                                <p><?= $d->alamat_tk ?></p>
                            </div>
                        </div>
                        <hr class="hr-dotted mt-0">
                        <div class="d-flex py-2">
                            <div class="flex-shrink-0">
                                <i class="bi bi-whatsapp text-primary fs-4"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-1">Nomor WhatsApp</h5>
                                <p><?= $d->telepon_tk ?></p>
                            </div>
                        </div>
                        <hr class="hr-dotted mt-0">
                        <div class="d-flex py-2">
                            <div class="flex-shrink-0">
                                <i class="bi bi-envelope text-primary fs-4"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-1">Email</h5>
                                <p><?= $d->email_tk ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Kontak -->

<?php include 'footer.php'; ?>
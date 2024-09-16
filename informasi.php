<!-- Koneksi ke header.php  -->
<?php include 'header.php'; ?>

<div class="bagian">
    <div class="wadah pt-4 pb-5">
        <h3 class="fw-bold lh-2 mb-3 text-center">INFORMASI</h3>
        <?php
        // Mengambil semua data dari tabel informasi, data diurutkan berdasarkan id (Desc)
        $informasi = mysqli_query($conn, "SELECT * FROM informasi ORDER BY id DESC");
        if (mysqli_num_rows($informasi) > 0) {
            while ($p = mysqli_fetch_array($informasi)) {
        ?>

        <div class="col-4 text-center">
            <a href="detail_informasi.php?id=<?= $p['id'] ?>" target="_blank" class="thumbnail-link nav-link">

                <div class="card h-100 border-0 rounded-4 shadow">
                    <div class="card-body p-4 pb-0">
                        <div class="mb-3">
                            <div class="thumbail-img card-img-top img-fluid rounded-4"
                                style="background-image: url('uploads/informasi/<?= $p['gambar'] ?>');">
                            </div>
                        </div>
                        <p><?= substr($p['judul'], 0, 50) ?></p>
                    </div>
                </div>
            </a>
        </div>

        <?php }
        } else { ?>

        Tidak ada data

        <?php } ?>

    </div>
</div>

<?php include 'footer.php'; ?>
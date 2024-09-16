<!-- Koneksi ke header.php  -->
<?php include 'header.php'; ?>

<section>
    <div class="container pt-5 mt-5">
        <div class="row">
            <div class="col-sm-6">
                <img src="uploads/identitas/<?= $d->foto_tk ?>" class="figure-img img-fluid rounded mb-4" alt="Digital Creative" loading="lazy">
            </div>
            <div class="col-sm-6">
                <h2 class="fw-bold lh-2 mb-4">Selamat Datang di <?= $d->nama_tk ?></h2>
                <p class="lead mb-5">
                    PILIH POHON platform yang didedikasikan untuk membantu Anda memilih pohon yang paling efektif dalam menyerap karbon dioksida (CO₂) dari lingkungan. Di sini, kami menyediakan informasi yang Anda butuhkan untuk membuat keputusan yang bijaksana dalam memilih jenis pohon yang sesuai dengan kebutuhan lingkungan Anda.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Tentang Kami -->
<section id="tentang">
    <div class="container pt-4 pb-5">
        <div class="row text-center">
            <div class="col-lg-8 mx-auto">
                <h3 class="fw-bold lh-2 mb-3">TENTANG KAMI</h3>
                <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                    euismod tincidunt ut laoreet dolore magna.</p> -->
                <p class="lead">Tentang Kami adalah untuk memberikan gambaran yang jelas tentang identitas dan
                    karakteristik dari website kami
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <img src="assets/img/about.svg" class="d-block mx-lg-auto img-fluid" alt="Digital Creative" loading="lazy">
            </div>
            <div class="col-sm-6">
                <h4 class="fw-bold lh-2 mb-3">Info Singkat Tentang PILIH POHON</h4>
                <p>
                    PILIH POHON merupakan platform yang didedikasikan untuk membantu Anda memilih pohon yang paling efektif dalam menyerap karbon dioksida (CO₂) dari lingkungan. Dalam upaya melawan perubahan iklim, pohon adalah salah satu solusi alami yang paling kuat.. Klik "Lihat Selengkapnya" untuk melihat :
                </p>
                <ul>
                    <li>Profil kami</li>
                    <li>Visi dan misi dari PILIH POHON</li>
                    <li>Dan lain-lain</li>
                </ul>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="tentang.php" class="btn btn-success rounded-pill px-4 py-2">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Tentang Kami -->

<section>
    <div class="bagian">
        <div class="wadah">
            <h3 class="fw-bold lh-2 mb-3 text-center">DAFTAR POHON</h3>
            <?php
            // Mengambil semua data dari tabel daftarpohon, data diurutkan berdasarkan id (Desc)
            $daftarpohon = mysqli_query($conn, "SELECT * FROM daftarpohon ORDER BY id DESC");
            if (mysqli_num_rows($daftarpohon) > 0) {
                $counter = 0; // Inisialisasi counter
                while ($p = mysqli_fetch_array($daftarpohon)) {
                    if ($counter == 6) break; // Hentikan loop setelah 6 data
                    $counter++; // Tambah counter setiap kali loop berjalan
            ?>

                    <div class="col-4 text-center">
                        <a href="detail_daftarpohon.php?id=<?= $p['id'] ?>" target="_blank" class="thumbnail-link nav-link">

                            <div class="card h-100 border-0 rounded-4 shadow">
                                <div class="card-body p-4 pb-0">
                                    <div class="mb-3">
                                        <div class="thumbail-img card-img-top img-fluid rounded-4" style="background-image: url('uploads/daftarpohon/<?= $p['gambar'] ?>');">
                                        </div>
                                    </div>
                                    <p><?= $p['nama'] ?></p>
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
    
</section>

<!-- Kontak -->
<section id="kontak">
    <div class="container text-center pt-4 pb-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h3 class="fw-bold lh-2 mb-3">KONTAK KAMI</h3>
                <p class="lead">Pada bagian di bawah ini merupakan link Google Maps dan alamat kami, serta
                    nomor WhatsApp / WA dari kami. </p>
            </div>
        </div>

        <div class="row align-items-start text-start g-4 pt-4 pb-5">
            <div class="col-lg-7">
                <iframe src="<?= $d->google_maps ?>" class="rounded-4 shadow" width="100%" height="335" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="col-lg-5">
                <div class="card h-100 border-0 rounded-4 shadow">
                    <div class="card-body p-4 pb-0">
                        <div class="d-flex py-2">
                            <div class="flex-shrink-0">
                                <i class="bi bi-geo-alt text-success fs-3"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-1">Alamat</h5>
                                <p><?= $d->alamat_tk ?></p>
                            </div>
                        </div>
                        <hr class="hr-dotted mt-0">
                        <div class="d-flex py-2">
                            <div class="flex-shrink-0">
                                <i class="bi bi-whatsapp text-success fs-4"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-1">Nomor WhatsApp</h5>
                                <p><?= $d->telepon_tk ?></p>
                            </div>
                        </div>
                        <hr class="hr-dotted mt-0">
                        <div class="d-flex py-2">
                            <div class="flex-shrink-0">
                                <i class="bi bi-envelope text-success fs-4"></i>
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
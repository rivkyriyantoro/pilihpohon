<!-- Koneksi dengan header.php -->
<?php include 'header.php' ?>

<section>
    <div class="container tambahh mt-5">
        <?php
        if (isset($_GET['success'])) {
            echo "<div class='alert alert-success'>" . $_GET['success'] . "</div>";
        }
        ?>
        <a class="btn btn-primary mb-3" href="tambah-galeri.php">Tambah</a>
    </div>
    <div class="container table-responsive-md mb-5">
        <table id="example" class="table table-hover table-bordered" style="width:100%">
            <thead class="table-secondary">
                <tr>
                    <th class="col">No</th>
                    <th class="col">Foto</th>
                    <th class="col">Keterangan</th>
                    <th class="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;

                $where = " WHERE 1=1 ";
                if (isset($_GET['key'])) {
                    $where .= " AND keterangan LIKE '%" . addslashes($_GET['key']) . "%' ";
                }

                $galeri = mysqli_query($conn, "SELECT * FROM galeri $where ORDER BY id DESC");
                if (mysqli_num_rows($galeri) > 0) {
                    while ($p = mysqli_fetch_array($galeri)) {
                ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><img src="../uploads/galeri/<?= $p['foto'] ?>" width="100px"></td>
                            <td><?= $p['keterangan'] ?></td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="edit-galeri.php?id=<?= $p['id'] ?>" title="Edit Data" class="btn btn-success btn-sm text-white mb-3">Edit</a>
                                    </div>

                                    <div class="col-sm-6">
                                        <a href="hapus.php?idgaleri=<?= $p['id'] ?>" onclick="return confirm('Yakin ingin hapus ?')" title="Hapus Data" class="btn btn-danger btn-sm text-white">Hapus</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="4">Data tidak ada</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>

<?php include 'footer.php' ?>
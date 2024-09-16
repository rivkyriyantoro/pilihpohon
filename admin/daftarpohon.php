<!-- Koneksi dengan header.php -->
<?php include 'header.php' ?>

<section>
    <div class="container tambahh mt-5">
        <?php
        if (isset($_GET['success'])) {
            echo "<div class='alert alert-success'>" . $_GET['success'] . "</div>";
        }
        ?>
        <a class="btn btn-primary mb-3" href="tambah-daftarpohon.php">Tambah</a>
    </div>
    <div class="container table-responsive-md mb-5">
        <table id="example" class="table table-hover table-bordered" style="width:100%">
            <thead class="table-secondary">
                <tr>
                    <th class="col">No</th>
                    <th class="col">Nama</th>
                    <th class="col">Status</th>
                    <th class="col">Gambar</th>
                    <th class="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;

                $where = " WHERE 1=1 ";
                if (isset($_GET['key'])) {
                    $where .= " AND nama LIKE '%" . addslashes($_GET['key']) . "%' ";
                }

                $daftarpohon = mysqli_query($conn, "SELECT * FROM daftarpohon $where ORDER BY id DESC");
                if (mysqli_num_rows($daftarpohon) > 0) {
                    while ($p = mysqli_fetch_array($daftarpohon)) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $p['nama'] ?></td>
                    <td><?= $p['status'] ?></td>
                    <td><img src="../uploads/daftarpohon/<?= $p['gambar'] ?>" width="100px"></td>
                    <td>
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="edit-daftarpohon.php?id=<?= $p['id'] ?>" title="Edit Data"
                                    class="btn btn-success btn-sm text-white mb-3">Edit</a>
                            </div>
                            <div class="col-sm-6">
                                <a href="hapus.php?iddaftarpohon=<?= $p['id'] ?>"
                                    onclick="return confirm('Yakin ingin hapus ?')" title="Hapus Data"
                                    class="btn btn-danger btn-sm text-white">Hapus</a>
                            </div>
                        </div>

                    </td>
                </tr>
                <?php }
                } else { ?>
                <tr>
                    <td colspan="5">Data tidak ada</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>

<?php include 'footer.php' ?>
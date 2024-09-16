<!-- Koneksi ke header.php  -->
<?php include 'header.php'; ?>

<div class="bagian">
    <div class="wadah pt-4 ">
        <h3 class="fw-bold lh-2 mb-3 text-center">CARI POHON</h3>
        <div class="container table-responsive-md mb-5">
        <table id="example" class="table table-hover table-bordered" style="width:100%">
            <thead class="table-secondary">
                <tr>
                    <th class="col">No</th>
                    <th class="col">Nama</th>
                    <th class="col">Status Keefektifan</th>
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

                $daftarpohon = mysqli_query($conn, "SELECT * FROM daftarpohon $where ORDER BY nama ASC");
                if (mysqli_num_rows($daftarpohon) > 0) {
                    while ($p = mysqli_fetch_array($daftarpohon)) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $p['nama'] ?></td>
                    <td><?= $p['status'] ?></td>
                    <td>
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="detail_daftarpohon.php?id=<?= $p['id'] ?>" title="Edit Data"
                                    class="btn btn-success btn-sm text-white mb-3">Lihat Detail</a>
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

    </div>
</div>

<?php include 'footer.php'; ?>
<!-- Koneksi dengan header.php -->
<?php include 'header.php' ?>

<section>
    <div class="container tambahh mt-5">
        <?php
        if (isset($_GET['success'])) {
            echo "<div class='alert alert-success'>" . $_GET['success'] . "</div>";
        }
        ?>
        <a class="btn btn-primary mb-3" href="tambah-admin.php">Tambah</a>
    </div>

    <div class="container table-responsive-md mb-5">
        <table id="example" class="table table-bordered table-hover" style="width:100%">
            <thead class="table-secondary">
                <tr>
                    <th class="col">No</th>
                    <th class="col">Nama</th>
                    <th class="col">Username</th>
                    <th class="col">Level</th>
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

                $admin = mysqli_query($conn, "SELECT * FROM admin $where ORDER BY id DESC");
                if (mysqli_num_rows($admin) > 0) {
                    while ($p = mysqli_fetch_array($admin)) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $p['nama'] ?></td>
                    <td><?= $p['username'] ?></td>
                    <td><?= $p['level'] ?></td>
                    <td>
                        <a href="edit-admin.php?id=<?= $p['id'] ?>" title="Edit Data"
                            class="btn btn-success btn-sm text-white">Edit</a>
                        <a href="hapus.php?idadmin=<?= $p['id'] ?>" onclick="return confirm('Yakin ingin hapus ?')"
                            title="Hapus Data" class="btn btn-danger btn-sm text-white">Hapus</a>
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
<?php 

include 'layout/header.php';
include 'layout/sidebar.php';
include 'layout/footer.php';
include '../config/koneksi.php';

?>
<div class="container">
    <div class="card-title">
        <h4>Data Toko</h4>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Tombol Tambah -->
        <a class="btn btn-primary" href="tambah-outlet.php"><i class="bi bi-plus"></i> Tambah</a>
        
        <!-- Formulir Pencarian -->
        <form method="GET" action="" class="d-flex">
            <input type="text" name="keyword" class="form-control me-2" placeholder="Cari nama toko atau alamat...">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
    </div>
    <table class="table table-bordered table-hover">
        <thead align="center">
            <th>No</th>
            <th>Nama Toko</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Aksi</th>
        </thead>
        <?php $i = 1; ?>
        <?php 
        $keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($koneksi, $_GET['keyword']) : '';
        $query = "SELECT * FROM tb_outlet";
        if ($keyword) {
            $query .= " WHERE nama_outlet LIKE '%$keyword%' OR alamat LIKE '%$keyword%'";
        }
        $outlet = mysqli_query($koneksi, $query);
        while ($data = mysqli_fetch_array($outlet)) {
        ?>
        <tbody align="center">
            <td><?= $i++; ?></td>
            <td><?= $data['nama_outlet'] ?></td>
            <td><?= $data['alamat'] ?></td>
            <td><?= $data['tlp'] ?></td>
            <td>
                <a class="btn btn-primary btn-sm" href="ubah-outlet.php?id=<?= $data['id_outlet'] ?>"><i class="bi bi-pencil-square"></i> Ubah</a>
                <a class="btn btn-danger btn-sm" href="hapus-outlet.php?id=<?= $data['id_outlet'] ?>"><i class="bi bi-trash"></i> Hapus</a>
            </td>
        </tbody>
        <?php } ?>
    </table>
</div>
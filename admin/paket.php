<?php 

include 'layout/header.php';
include 'layout/sidebar.php';
include 'layout/footer.php';
include '../config/koneksi.php';

?>

<div class="container">
    <div class="card-title">
        <h4>Data Paket Cucian</h4>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Tombol Tambah -->
        <a class="btn btn-primary" href="tambah-paket.php"><i class="bi bi-plus"></i> Tambah</a>
        
        <!-- Formulir Pencarian -->
        <form method="GET" action="" class="d-flex">
            <input type="text" name="keyword" class="form-control me-2" placeholder="Cari nama paket atau jenis paket...">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
    </div>
    <table class="table table-bordered table-hover">
        <thead align="center">
            <th>No</th>
            <th>Nama Toko</th>
            <th>Jenis Paket</th>
            <th>Nama Paket</th>
            <th>Harga</th>
            <th>Aksi</th>
        </thead>
        <?php 
        $i = 1; 
        $keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($koneksi, $_GET['keyword']) : '';
        $query = "SELECT * FROM tb_paket INNER JOIN tb_outlet ON tb_paket.id_outlet=tb_outlet.id_outlet";

        // Jika ada keyword, tambahkan filter pencarian
        if ($keyword) {
            $query .= " WHERE tb_paket.nama_paket LIKE '%$keyword%' OR tb_paket.jenis LIKE '%$keyword%'";
        }

        $paket = mysqli_query($koneksi, $query);
        while ($data = mysqli_fetch_array($paket)) {
        ?>
        <tbody align="center">
            <td><?= $i++; ?></td>
            <td><?= $data['nama_outlet'] ?></td>
            <td><?= $data['jenis'] ?></td>
            <td><?= $data['nama_paket'] ?></td>
            <td>Rp. <?= number_format($data['harga']) ?></td>
            <td>
                <a class="btn btn-primary btn-sm" href="ubah-paket.php?id=<?= $data['id_paket'] ?>"><i class="bi bi-pencil-square"></i> Ubah</a>
                <a class="btn btn-danger btn-sm" href="hapus-paket.php?id=<?= $data['id_paket'] ?>"><i class="bi bi-trash"></i> Hapus</a>
            </td>
        </tbody>
        <?php } ?>
    </table>
</div>
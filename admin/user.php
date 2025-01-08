<?php 

include 'layout/header.php';
include 'layout/sidebar.php';
include 'layout/footer.php';
include '../config/koneksi.php';

?>

<div class="container">
    <div class="card-title">
        <h4>Data Pengguna</h4>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Tombol Tambah -->
        <a class="btn btn-primary" href="tambah-user.php"><i class="bi bi-plus"></i> Tambah</a>
        
        <!-- Formulir Pencarian -->
        <form method="GET" action="" class="d-flex">
            <input type="text" name="keyword" class="form-control me-2" placeholder="Cari nama pengguna, username, atau toko...">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
    </div>
    <table class="table table-bordered table-hover">
        <thead align="center">
            <th>No</th>
            <th>Nama Pengguna</th>
            <th>Username</th>
            <th>Nama Toko</th>
            <th>Role</th>
            <th>Aksi</th>
        </thead>
        <?php 
        $i = 1; 
        $keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($koneksi, $_GET['keyword']) : '';
        $query = "SELECT * FROM tb_user INNER JOIN tb_outlet ON tb_user.id_outlet=tb_outlet.id_outlet";

        // Jika ada keyword, tambahkan filter pencarian
        if ($keyword) {
            $query .= " WHERE tb_user.nama_pengguna LIKE '%$keyword%' OR tb_user.username LIKE '%$keyword%' OR tb_outlet.nama_outlet LIKE '%$keyword%'";
        }

        $user = mysqli_query($koneksi, $query);
        while ($data = mysqli_fetch_array($user)) {
        ?>
        <tbody align="center">
            <td><?= $i++; ?></td>
            <td><?= $data['nama_pengguna'] ?></td>
            <td><?= $data['username'] ?></td>
            <td><?= $data['nama_outlet'] ?></td>
            <td><?= $data['role'] ?></td>
            <td>
                <a class="btn btn-primary btn-sm" href="ubah-user.php?id=<?= $data['id_user'] ?>"><i class="bi bi-pencil-square"></i> Ubah</a>
                <a class="btn btn-danger btn-sm" href="hapus-user.php?id=<?= $data['id_user'] ?>"><i class="bi bi-trash"></i> Hapus</a>
            </td>
        </tbody>
        <?php } ?>
    </table>
</div>

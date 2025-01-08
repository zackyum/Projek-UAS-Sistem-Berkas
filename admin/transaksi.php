<?php 

include 'layout/header.php';
include 'layout/sidebar.php';
include 'layout/footer.php';
include '../config/koneksi.php';

?>

<div class="container">
    <div class="card-title">
        <h4>Entri Transaksi</h4>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Tombol Tambah -->
        <a class="btn btn-primary" href="tambah-transaksi.php"><i class="bi bi-plus"></i> Tambah</a>
        
        <!-- Formulir Pencarian -->
        <form method="GET" action="" class="d-flex">
            <input type="date" name="tanggal" class="form-control me-2">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
    </div>
    <table class="table table-bordered table-hover">
        <thead align="center">
            <th>No</th>
            <th width="10%">Nama Toko</th>
            <th>Nama Paket</th>
            <th>Kode Invoice</th>
            <th>Nama Pelanggan Tetap</th>
            <th>Tanggal</th>
            <th width="10%">Total Bayar</th>
            <th>Status</th>
            <th>Status Bayar</th>
            <th>Aksi</th>
        </thead>
        <?php 
        $i = 1; 
        $tanggal = isset($_GET['tanggal']) ? mysqli_real_escape_string($koneksi, $_GET['tanggal']) : '';
        $query = "SELECT * FROM tb_transaksi 
                  INNER JOIN tb_outlet ON tb_transaksi.id_outlet=tb_outlet.id_outlet 
                  INNER JOIN tb_paket ON tb_transaksi.id_paket=tb_paket.id_paket 
                  INNER JOIN tb_member ON tb_transaksi.id_member=tb_member.id_member 
                  INNER JOIN tb_user ON tb_transaksi.id_user=tb_user.id_user";

        // Jika ada tanggal, tambahkan filter pencarian
        if ($tanggal) {
            $query .= " WHERE tb_transaksi.tgl = '$tanggal'";
        }

        $transaksi = mysqli_query($koneksi, $query);
        while ($data = mysqli_fetch_array($transaksi)) {
        ?>
        <tbody align="center">
            <td><?= $i++; ?></td>
            <td><?= $data['nama_outlet'] ?></td>
            <td><?= $data['nama_paket'] ?></td>
            <td><?= $data['kode_invoice'] ?></td>
            <td><?= $data['nama_member'] ?></td>
            <td><?= $data['tgl'] ?></td>
            <td>Rp. 
                <?php 
                $a = $data['qty'];
                $b = $data['harga'];
                $c = $data['biaya_tambahan'];
                $d = $data['diskon'];
                $total = $a * $b + $c - $d;
                echo number_format($total);
                ?>
            </td>
            <td><?= $data['status'] ?></td>
            <td><?= $data['dibayar'] ?></td>
            <td>
                <a class="btn btn-warning btn-sm" href="detail-transaksi.php?id=<?= $data['id_transaksi'] ?>"><i class="bi bi-eye"></i> Detail</a>
                <a class="btn btn-primary btn-sm" href="ubah-transaksi.php?id=<?= $data['id_transaksi'] ?>"><i class="bi bi-pencil-square"></i> Ubah</a>
                <a class="btn btn-danger btn-sm" href="hapus-transaksi.php?id=<?= $data['id_transaksi'] ?>"><i class="bi bi-trash"></i> Hapus</a>
            </td>
        </tbody>
        <?php } ?>
    </table>
</div>
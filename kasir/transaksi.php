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
	<a class="btn btn-primary btn-tambah" href="tambah-transaksi.php"><i class="bi bi-plus"></i>Tambah</a>
	<br>
	<br>
	<table class="table table-bordered">
		<thead align="center">
			<th>No</th>
			<th>Nama Toko</th>
			<th>Nama Paket</th>
			<th>Kode Invoice</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal</th>
			<th width="10%">Total Bayar</th>
			<th>Status</th>
			<th>Status Bayar</th>
			<th>Aksi</th>
		</thead>
		<?php $i=1; ?>
			<?php 
			$transaksi = mysqli_query($koneksi, "SELECT * FROM tb_transaksi INNER JOIN tb_outlet ON tb_transaksi.id_outlet=tb_outlet.id_outlet INNER JOIN tb_paket ON tb_transaksi.id_paket=tb_paket.id_paket inner join tb_member on tb_transaksi.id_member=tb_member.id_member inner join tb_user on tb_transaksi.id_user=tb_user.id_user");
			while ($data = mysqli_fetch_array($transaksi)) {
		 ?>
		<tbody align="center">
			<td><?= $i++; ?></td>
			<td><?= $data['nama_outlet'] ?></td>
			<td><?= $data['nama_paket'] ?></td>
			<td>invc<?= $data['tgl'] ?><?= $data['id_transaksi'] ?></td>
			<td><?= $data['nama_member'] ?></td>
			<td><?= $data['tgl'] ?></td>
			<td>Rp. 
				<?php 

				$a = $data['qty'];
				$b = $data['harga'];
				$c = $data['biaya_tambahan'];
				$d = $data['diskon'];

				$total = $a * $b + $c - $d;

				echo number_format("$total");

				 ?>
			</td>
			<td><?= $data['status'] ?></td>
			<td><?= $data['dibayar'] ?></td>
			<td>
				<a style="margin-bottom: 3px;" class="btn btn-warning btn-sm" href="detail-transaksi.php?id=<?= $data['id_transaksi'] ?>"><i class="bi bi-eye"></i> Detail</a>
				<a style="margin-bottom: 3px;" class="btn btn-primary btn-sm" href="ubah-transaksi.php?id=<?= $data['id_transaksi'] ?>"><i class="bi bi-pencil-square"></i> Ubah</a>
				<a style="margin-bottom: 3px;" class="btn btn-danger btn-sm" href="hapus-transaksi.php?id=<?= $data['id_transaksi'] ?>"><i class="bi bi-trash"></i> Hapus</a>
			</td>
		</tbody>
			<?php } ?>
			<?php $i++; ?>
	</table>
</div>
<?php  

include 'layout/header.php';
include 'layout/sidebar.php';
include 'layout/footer.php';
include '../config/koneksi.php';
$id = $_GET['id'];



?>

<div class="container">
		<div class="card-title">
			<h4>Detail Transaksi</h4>
		</div>
	<table class="table table-bordered">
		<?php $i=1; ?>
			<?php 
			$transaksi = mysqli_query($koneksi, "SELECT * FROM tb_transaksi INNER JOIN tb_member ON tb_transaksi.id_member=tb_member.id_member INNER JOIN tb_outlet ON tb_transaksi.id_outlet=tb_outlet.id_outlet inner join tb_user on tb_transaksi.id_user=tb_user.id_user inner join tb_paket on tb_transaksi.id_paket=tb_paket.id_paket where id_transaksi ='$id'");
			while ($data = mysqli_fetch_array($transaksi)) {
		 ?>
		<tbody>
			<tr>
				<td>No</td>
				<td><?= $i++; ?></td>
			</tr>
			<tr>
				<td>Nama Toko</td>
				<td><?= $data['nama_outlet'] ?></td>
			</tr>
			<tr>
				<td>Nama Paket</td>
				<td><?= $data['nama_paket'] ?></td>
			</tr>
			<tr>
				<td>Kode Invoice</td>
				<td>invc<?= $data['tgl'] ?><?= $data['id_transaksi'] ?></td>
			</tr>
			<tr>
				<td>Nama Pelanggan</td>
				<td><?= $data['nama_member'] ?></td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td><?= $data['tgl'] ?></td>
			</tr>
			<tr>
				<td>Batas</td>
				<td><?= $data['batas_waktu'] ?></td>
			</tr>
			<tr>
				<td>Tanggal Bayar</td>
				<td><?= $data['tgl_bayar'] ?></td>
			</tr>

			<tr>
				<td>Harga Satuan</td>
				<td>Rp. <?= number_format($data['harga']) ?></td>
			</tr>

			<tr>
				<td>Berat Cucian</td>
				<td><?= $data['qty'] ?> Kg</td>
			</tr>

			<tr>
				<td>Biaya Tambahan</td>
				<td>Rp. <?= number_format($data['biaya_tambahan']) ?></td>
			</tr>
			<tr>
				<td>Potongan Harga</td>
				<td>Rp. <?= number_format($data['diskon']) ?></td>
			</tr>
			<tr>
				<td>Pajak</td>
				<td><?= $data['pajak'] ?></td>
			</tr>
			<tr>
				<td>Total Bayar</td>
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
			</tr>
			<tr>
				<td>Status</td>
				<td><?= $data['status'] ?></td>
			</tr>
			<tr>
				<td>Status Bayar</td>
				<td><?= $data['dibayar'] ?></td>
		</tbody>
		<?php } ?>
			<?php $i++; ?>	
	</table>
	<a class="btn btn-primary btn-kembali" href="transaksi.php"><i class="bi bi-box-arrow-left"></i>Kembali</a>
</div>
<?php 
include 'layout/footer.php';
include '../config/koneksi.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laporan</title>
	<link rel="stylesheet" type="text/css" href="../asset/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../asset/css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../index.php?pesan=belum_login");
	}
	?>
	<nav class="navbar bg-secondary fixed-top">
		<div class="container-md">
			<a class="nav-link text-white" style="font-size: 20px;">BA LAUNDRY</a>
            <li class="nav-item" style="list-style: none;">
				<a class="nav-link text-white" href="index.php"><i class="bi bi-box-arrow-right"> Kembali</i></a>
			</li>
		</div>
	</nav>
<style>
    .container-lg {
	margin-top: 10%;
}
</style>
<div class="container-xs">
		<div class="card-title" align="center">
			<h4>Laporan</h4>
		</div>
	<table border="1" cellpadding="5">
		<thead align="center">
			<th>No</th>
            <th>Tanggal</th>
			<th width="10%">Nama Toko</th>
			<th>Nama Paket</th>
			<th>Kode Invoice</th>
			<th>Nama Pelanggan Tetap</th>
			<th>Batas Waktu</th>
            <th>Tanggal Bayar</th>
            <th>Harga</th>
            <th>Berat Cucian</th>
            <th>Biaya Tambahan</th>
            <th>Diskon</th>
            <th>Pajak</th>
			<th width="10%">Total Bayar</th>
			<th>Status</th>
			<th>Status Bayar</th>
		</thead>
		<?php $i=1; ?>
			<?php 
			$transaksi = mysqli_query($koneksi, "SELECT * FROM tb_transaksi INNER JOIN tb_outlet ON tb_transaksi.id_outlet=tb_outlet.id_outlet INNER JOIN tb_paket ON tb_transaksi.id_paket=tb_paket.id_paket inner join tb_member on tb_transaksi.id_member=tb_member.id_member inner join tb_user on tb_transaksi.id_user=tb_user.id_user");
			while ($data = mysqli_fetch_array($transaksi)) {
		 ?>
		<tbody align="center">
			<td><?= $i++; ?></td>
            <td><?= $data['tgl'] ?></td>
			<td><?= $data['nama_outlet'] ?></td>
			<td><?= $data['nama_paket'] ?></td>
			<td><?= $data['kode_invoice'] ?></td>
			<td><?= $data['nama_member'] ?></td>
			<td><?= $data['batas_waktu'] ?></td>
            <td><?= $data['tgl_bayar'] ?></td>
            <td>Rp. <?= number_format($data['harga']) ?></td>
            <td><?= $data['qty'] ?> Kg</td>
            <td>Rp. <?= number_format($data['biaya_tambahan']) ?></td>
            <td>Rp. <?= number_format($data['diskon']) ?></td>
            <td>Rp. <?= number_format($data['pajak']) ?></td>
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
		</tbody>
			<?php } ?>
			<?php $i++; ?>
	</table>
	<br>
	<a href="cetak.php" class="btn btn-primary" target="_blank">Cetak</a>
</div>
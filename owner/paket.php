<?php 

include 'layout/header.php';
include 'layout/sidebar.php';
include 'layout/footer.php';
include '../config/koneksi.php';

?>

<div class="container">
		<div class="card-title">
			<h4>Data Paket</h4>
		</div>
	<br>
	<br>
	<table class="table table-bordered">
		<thead align="center">
			<th>No</th>
			<th>Nama Toko</th>
			<th>Jenis Paket</th>
			<th>Nama Paket</th>
			<th>Harga</th>
		</thead>
		<?php $i=1; ?>
			<?php 
			$paket = mysqli_query($koneksi, "select * from tb_paket inner join tb_outlet on tb_paket.id_outlet=tb_outlet.id_outlet");
			while ($data = mysqli_fetch_array($paket)) {
			?>
		<tbody align="center">
			<td><?= $i++; ?></td>
			<td><?= $data['nama_outlet'] ?></td>
			<td><?= $data['jenis'] ?></td>
			<td><?= $data['nama_paket'] ?></td>
			<td>Rp. <?= number_format($data['harga']) ?></td>
		</tbody>
			<?php } ?>
			<?php $i++; ?>
	</table>
</div>
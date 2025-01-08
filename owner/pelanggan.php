<?php 

include 'layout/header.php';
include 'layout/sidebar.php';
include 'layout/footer.php';
include '../config/koneksi.php';

?>

<div class="container">
		<div class="card-title">
			<h4>Data Pelanggan Tetap</h4>
		</div>
	<br>
	<br>
	<table class="table table-bordered">
		<thead align="center">
			<th>No</th>
			<th>Nama Pelanggan Tetap</th>
			<th>Alamat</th>
			<th>Jenis Kelamin</th>
			<th>No Telepon</th>
		</thead>
		<?php $i=1; ?>
			<?php 
			$member = mysqli_query($koneksi, "select * from tb_member");
			while ($data = mysqli_fetch_array($member)) {
			?>
		<tbody align="center">
			<td><?= $i++; ?></td>
			<td><?= $data['nama_member'] ?></td>
			<td><?= $data['alamat'] ?></td>
			<td><?= $data['jenis_kelamin'] ?></td>
			<td><?= $data['tlp'] ?></td>
		</tbody>
			<?php } ?>
			<?php $i++; ?>
	</table>
</div>
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
	<br>
	<br>
	<table class="table table-bordered">
		<thead align="center">
			<th>No</th>
			<th>Nama Toko</th>
			<th>Alamat</th>
			<th>No Telepon</th>
		</thead>
		<?php $i=1; ?>
			<?php 
			$outlet = mysqli_query($koneksi, "select * from tb_outlet");
			while ($data = mysqli_fetch_array($outlet)) {
			?>
		<tbody align="center">
			<td><?= $i++; ?></td>
			<td><?= $data['nama_outlet'] ?></td>
			<td><?= $data['alamat'] ?></td>
			<td><?= $data['tlp'] ?></td>
		</tbody>
			<?php } ?>
			<?php $i++; ?>
	</table>
</div>
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
	<br>
	<br>
	<table class="table table-bordered">
		<thead align="center">
			<th>No</th>
			<th>Nama Pengguna</th>
			<th>Username</th>
			<th>Nama Toko</th>
			<th>Role</th>
		</thead>
		<?php $i=1; ?>
			<?php 
			$user = mysqli_query($koneksi, "select * from tb_user inner join tb_outlet on tb_user.id_outlet=tb_outlet.id_outlet");
			while ($data = mysqli_fetch_array($user)) {
			?>
		<tbody align="center">
			<td><?= $i++; ?></td>
			<td><?= $data['nama_pengguna'] ?></td>
			<td><?= $data['username'] ?></td>
			<td><?= $data['nama_outlet'] ?></td>
			<td><?= $data['role'] ?></td>
		</tbody>
			<?php } ?>
			<?php $i++; ?>
	</table>
</div>
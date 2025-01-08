<?php 

include 'layout/header.php';
include 'layout/sidebar.php';
include 'layout/footer.php';
include '../config/koneksi.php';

$id = $_GET['id'];
$member = mysqli_query($koneksi, "SELECT * FROm tb_member where id_member='$id'");
$data_member = mysqli_fetch_array($member);

if (isset($_POST['submit'])) {

$nama_member = $_POST['nama_member'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tlp = $_POST['tlp'];

	
	$ubah = mysqli_query($koneksi, "UPDATE tb_member SET nama_member = '$nama_member',
						alamat = '$alamat',
						jenis_kelamin = '$jenis_kelamin',
						tlp = '$tlp'
						where id_member= '$id'
		");

	if ($ubah) {
		echo "<script>
				alert('Data berhasil di ubah');
				document.location.href= 'pelanggan.php';
		</script>";
	}else {
		echo "<script>
				alert('Data gagal di ubah');
				document.location.href= 'ubah-pelanggan.php';
		</script>";
	}
}


?>

<div class="container">
	<div class="card-title">
		<h5>Ubah Data</h5>
	</div>
	<form method="post">
		<div class="form-group">
			<label>Nama Pelanggan Tetap</label>
			<input type="hidden" name="id_member" value="<?= $data_member['id_member'] ?>">
			<input type="text" class="form-control" name="nama_member" placeholder="Nama Pelanggan..." value="<?= $data_member['nama_member'] ?>">
		</div>
		<div class="form-group">
			<label>Alamat</label>
			<textarea class="form-control" name="alamat" placeholder="Alamat..." value=""><?= $data_member['alamat'] ?></textarea>
		</div>
		<div class="form-group">
			<select class="custom-select" name="jenis_kelamin">
				<option><?= $data_member['jenis_kelamin'] ?></option>
				<option value="L">L</option>
				<option value="P">P</option>
			</select>
		</div>
		<div class="form-group">
			<label>No Telepon</label>
			<input type="number" class="form-control" name="tlp" placeholder="No Telepon..." value="<?= $data_member['tlp'] ?>">
		</div>
		<button class="btn btn-primary" name="submit">Ubah</button>
	</form>
</div>
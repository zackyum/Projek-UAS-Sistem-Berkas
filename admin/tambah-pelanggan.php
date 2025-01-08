<?php 

include 'layout/header.php';
include 'layout/sidebar.php';
include 'layout/footer.php';
include '../config/koneksi.php';


if (isset($_POST['submit'])) {

$nama_member = $_POST['nama_member'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tlp = $_POST['tlp'];

	
	$tambah = mysqli_query($koneksi, "INSERT INTO tb_member VALUES ('','$nama_member','$alamat','$jenis_kelamin','$tlp')");

	if ($tambah) {
		echo "<script>
				alert('Data berhasil di tambah');
				document.location.href= 'pelanggan.php';
		</script>";
	}else {
		echo "<script>
				alert('Data gagal di tambah');
				document.location.href= 'tambah-pelanggan.php';
		</script>";
	}
}


?>

<div class="container">
	<div class="card-title">
		<h5>Tambah Data Pelanggan Tetap</h5>
	</div>
	<form method="post">
		<div class="form-group">
			<label>Nama Pelanggan Tetap</label>
			<input type="text" class="form-control" name="nama_member" placeholder="Nama Pelanggan...">
		</div>
		<div class="form-group">
			<label>Alamat</label>
			<textarea class="form-control" name="alamat" placeholder="Alamat..."></textarea>
		</div>
		<div class="form-group">
			<select class="custom-select" name="jenis_kelamin">
				<option selected>---Pilih Jenis Kelamin---</option>
				<option value="L">L</option>
				<option value="P">P</option>
			</select>
		</div>
		<div class="form-group">
			<label>No Telepon</label>
			<input type="number" class="form-control" name="tlp" placeholder="No Telepon...">
		</div>
		<button class="btn btn-primary" name="submit">Tambah</button>
	</form>
</div>
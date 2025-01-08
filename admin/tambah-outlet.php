<?php 

include 'layout/header.php';
include 'layout/sidebar.php';
include 'layout/footer.php';
include '../config/koneksi.php';


if (isset($_POST['submit'])) {

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];

	
	$tambah = mysqli_query($koneksi, "INSERT INTO tb_outlet VALUES ('','$nama','$alamat','$tlp')");

	if ($tambah) {
		echo "<script>
				alert('Data berhasil di tambah');
				document.location.href= 'outlet.php';
		</script>";
	}else {
		echo "<script>
				alert('Data gagal di tambah');
				document.location.href= 'tambah-outlet.php';
		</script>";
	}
}


?>

<div class="container">
	<div class="card-title">
		<h5>Tambah Data Toko</h5>
	</div>
	<form method="post">
		<div class="form-group">
			<label>Nama Toko</label>
			<input type="text" class="form-control" name="nama" placeholder="Nama Toko...">
		</div>
		<div class="form-group">
			<label>Alamat</label>
			<textarea class="form-control" name="alamat" placeholder="Alamat..."></textarea>
		</div>
		<div class="form-group">
			<label>No Telepon</label>
			<input type="number" class="form-control" name="tlp" placeholder="No Telepon...">
		</div>
		<button class="btn btn-primary" name="submit">Tambah</button>
	</form>
</div>
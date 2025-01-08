<?php 

include 'layout/header.php';
include 'layout/sidebar.php';
include 'layout/footer.php';
include '../config/koneksi.php';

$id = $_GET['id'];
$outlet = mysqli_query($koneksi, "SELECT * From tb_outlet where id_outlet='$id'");
$data_outlet = mysqli_fetch_array($outlet);

if (isset($_POST['submit'])) {

$nama_outlet = $_POST['nama_outlet'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];

	
	$ubah = mysqli_query($koneksi, "UPDATE tb_outlet SET nama_outlet = '$nama_outlet',
						alamat = '$alamat',
						tlp = '$tlp'
						where id_outlet = '$id'
		");

	if ($ubah) {
		echo "<script>
				alert('Data berhasil di ubah');
				document.location.href= 'outlet.php';
		</script>";
		echo "<script>
				alert('Data gagal di ubah');
				document.location.href= 'ubah-outlet.php';
		</script>";
	}
}


?>

<div class="container">
	<div class="card-title">
		<h5></h5>
	</div>
	<form method="post">
		<div class="form-group">
			<label>Nama Toko</label>
			<input type="hidden" name="id_outlet" value="<?= $data_outlet['id_outlet'] ?>">
			<input type="text" class="form-control" name="nama_outlet" placeholder="Nama Toko..." value="<?= $data_outlet['nama_outlet'] ?>">
		</div>

		<div class="form-group">
			<label>Alamat</label>
			<textarea class="form-control" name="alamat" id="" cols="30" rows="5" value="<?= $data_outlet['alamat'] ?>"><?= $data_outlet['alamat'] ?></textarea>
		</div>

		<div class="form-group">
			<label>No Telepon</label>
			<input type="number" class="form-control" name="tlp" placeholder="No Telepon..." value="<?= $data_outlet['tlp'] ?>">
		</div>
		
		<button class="btn btn-primary" name="submit">Ubah</button>
	</form>
</div>
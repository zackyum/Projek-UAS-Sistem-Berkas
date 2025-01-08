<?php 

include 'layout/header.php';
include 'layout/sidebar.php';
include 'layout/footer.php';
include '../config/koneksi.php';


if (isset($_POST['submit'])) {

$id_outlet = $_POST['id_outlet'];
$jenis = $_POST['jenis'];
$nama_paket = $_POST['nama_paket'];
$harga = $_POST['harga'];

	
	$tambah = mysqli_query($koneksi, "INSERT INTO tb_paket VALUES ('','$id_outlet','$jenis','$nama_paket', '$harga')");

	if ($tambah) {
		echo "<script>
				alert('Data berhasil di tambah');
				document.location.href= 'paket.php';
		</script>";
	}else {
		echo "<script>
				alert('Data gagal di tambah');
				document.location.href= 'tambah-paket.php';
		</script>";
	}
}


?>

<div class="container">
	<div class="card-title">
		<h5>Tambah Data Paket Cucian</h5>
	</div>
	<form method="post">
		<div class="form-group">
			<label>Nama Toko</label>
			<select class="custom-select" name="id_outlet">
				<option selected>---Pilih Nama Toko---</option>
				<?php 
					$outlet = mysqli_query($koneksi, "SELECT * FROM tb_outlet");
					while ($data_outlet = mysqli_fetch_array($outlet)) {
				 ?>
				 <option value="<?= $data_outlet['id_outlet'] ?>"><?= $data_outlet['nama_outlet'] ?></option>
				 <?php } ?>
			</select>
		</div>
		<div class="form-group">
			<label>Jenis Paket</label>
			<div class="form-group">
				<select class="custom-select" name="jenis">
					<option selected>---Pilih Jenis Paket---</option>
					<option value="kiloan">Kiloan</option>
					<option value="selimut">Selimut</option>
					<option value="bed_cover">Bed Cover</option>
					<option value="kaos">Kaos</option>
					<option value="lainnya">Lainnya</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label>Nama Paket</label>
			<input type="text" class="form-control" name="nama_paket" placeholder="Nama Paket...">
		</div>
		<div class="form-group">
			<label>Harga</label>
			<input type="number" class="form-control" name="harga" placeholder="Harga...">
		</div>
		<button class="btn btn-primary" name="submit">Tambah</button>
	</form>
</div>
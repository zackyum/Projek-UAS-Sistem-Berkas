<?php 

include 'layout/header.php';
include 'layout/sidebar.php';
include 'layout/footer.php';
include '../config/koneksi.php';

$id = $_GET['id'];
$paket = mysqli_query($koneksi, "SELECT * FROm tb_paket where id_paket='$id'");
$data_paket = mysqli_fetch_array($paket);

if (isset($_POST['submit'])) {

$id_outlet = $_POST['id_outlet'];
$jenis = $_POST['jenis'];
$nama_paket = $_POST['nama_paket'];
$harga = $_POST['harga'];

	
	$ubah = mysqli_query($koneksi, "UPDATE tb_paket SET id_outlet = '$id_outlet',
						jenis = '$jenis',
						nama_paket = '$nama_paket',
						harga = '$harga'
						where id_paket= '$id'
		");

	if ($ubah) {
		echo "<script>
				alert('Data berhasil di ubah');
				document.location.href= 'paket.php';
		</script>";
	}else {
		echo "<script>
				alert('Data gagal di ubah');
				document.location.href= 'ubah-paket.php';
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
			<label>Nama Toko</label>
			<select class="custom-select" name="id_outlet">
				<?php 
					$outlet = mysqli_query($koneksi, "select * from tb_outlet");
					while ($data_outlet = mysqli_fetch_array($outlet)) {
				 ?>
				 <option value="<?= $data_outlet['id_outlet'] ?>" <?php if ($data_outlet['id_outlet'] = $data_paket['id_outlet']) {
				 	echo "selected";
				 } ?>><?= $data_outlet['nama_outlet'] ?></option>
				 <?php } ?>
			</select>
		</div>
		<div class="form-group">
			<label>Jenis Paket</label>
			<div class="form-group">
				<select class="custom-select" name="jenis">
					<option selected><?= $data_paket['jenis'] ?></option>
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
			<input type="text" class="form-control" name="nama_paket" placeholder="Nama Paket..." value="<?= $data_paket['nama_paket'] ?>">
		</div>

		<div class="form-group">
			<label>Harga</label>
			<input type="number" class="form-control" name="harga" placeholder="No Telepon..." value="<?= $data_paket['harga'] ?>">
		</div>
		<button class="btn btn-primary" name="submit">Ubah</button>
	</form>
</div>
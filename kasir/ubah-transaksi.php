<?php 

include 'layout/header.php';
include 'layout/sidebar.php';
include 'layout/footer.php';
include '../config/koneksi.php';

$id = $_GET['id'];
$transaksi = mysqli_query($koneksi, "SELECT * FROm tb_transaksi where id_transaksi='$id'");
$data_transaksi = mysqli_fetch_array($transaksi);

if (isset($_POST['submit'])) {

$id_outlet = $_POST['id_outlet'];
$id_paket = $_POST['id_paket'];
$kode_invoice = $_POST['kode_invoice'];
$id_member = $_POST['id_member'];
$tgl = $_POST['tgl'];
$batas_waktu = $_POST['batas_waktu'];
$tgl_bayar = $_POST['tgl_bayar'];
$biaya_tambahan = $_POST['biaya_tambahan'];
$diskon = $_POST['diskon'];
$pajak = $_POST['pajak'];
$status = $_POST['status'];
$dibayar = $_POST['dibayar'];
$qty = $_POST['qty'];
$id_user = $_POST['id_user'];

	
	$ubah = mysqli_query($koneksi, "UPDATE tb_transaksi SET id_outlet = '$id_outlet',
						id_paket = '$id_paket',
						kode_invoice = '$kode_invoice',
						id_member = '$id_member',
						tgl = '$tgl',
						batas_waktu = '$batas_waktu',
						tgl_bayar = '$tgl_bayar',
						biaya_tambahan = '$biaya_tambahan',
						diskon = '$diskon',
						pajak = '$pajak',
						status = '$status',
						dibayar = '$dibayar',
						qty = '$qty',
						id_user = '$id_user'
						where id_transaksi= '$id'
		");

	if ($ubah) {
		echo "<script>
				alert('Data berhasil di ubah');
				document.location.href= 'transaksi.php';
		</script>";
	}else {
		echo "<script>
				alert('Data gagal di ubah');
				document.location.href= 'ubah-transaksi.php';
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
				 <option value="<?= $data_outlet['id_outlet'] ?>" <?php if ($data_outlet['id_outlet'] = $data_transaksi['id_outlet']) {
				 	echo "selected";
				 } ?>><?= $data_outlet['nama_outlet'] ?></option>
				 <?php } ?>
			</select>
		</div>

		<div class="form-group">
			<label>Nama Paket</label>
			<select class="custom-select" name="id_paket">
				<?php 
					$paket = mysqli_query($koneksi, "select * from tb_paket");
					while ($data_paket = mysqli_fetch_array($paket)) {
				 ?>
				 <option value="<?= $data_paket['id_paket'] ?>" <?php if ($data_paket['id_paket'] = $data_paket['id_paket']) {
				 	echo "selected";
				 } ?>><?= $data_paket['nama_paket'] ?></option>
				 <?php } ?>
			</select>
		</div>
		
		<div class="form-group">
			<label>Kode Invoice</label>
			<input type="text" class="form-control" name="kode_invoice" placeholder="Kode Invoice..." value="<?= $data_transaksi['kode_invoice'] ?>">
		</div>

		<div class="form-group">
			<label>Nama Pelanggan</label>
			<select class="custom-select" name="id_member">
				<?php 
					$member = mysqli_query($koneksi, "select * from tb_member");
					while ($data_member = mysqli_fetch_array($member)) {
				 ?>
				 <option value="<?= $data_member['id_member'] ?>" <?php if ($data_member['id_member'] = $data_member['id_member']) {
				 	echo "selected";
				 } ?>><?= $data_member['nama_member'] ?></option>
				 <?php } ?>
			</select>
		</div>

		<div class="form-group">
			<label>Tanggal</label>
			<input type="datetime-local" class="form-control" name="tgl" value="<?= $data_transaksi['tgl'] ?>">
		</div>

		<div class="form-group">
			<label>Batas Waktu</label>
			<input type="datetime-local" class="form-control" name="batas_waktu" value="<?= $data_transaksi['batas_waktu'] ?>">
		</div>

		<div class="form-group">
			<label>Tanggal Bayar</label>
			<input type="datetime-local" class="form-control" name="tgl_bayar" value="<?= $data_transaksi['tgl_bayar'] ?>">
		</div>

		<div class="form-group">
			<label>Biaya Tambahan</label>
			<input type="number" class="form-control" name="biaya_tambahan" value="<?= $data_transaksi['biaya_tambahan'] ?>">
		</div>

		<div class="form-group">
			<label>Potongan Harga</label>
			<input type="number" class="form-control" name="diskon" value="<?= $data_transaksi['Potongan Harga'] ?>">
		</div>

		<div class="form-group">
			<label>Pajak</label>
			<input type="number" class="form-control" name="pajak" value="<?= $data_transaksi['pajak'] ?>">
		</div>

		<div class="form-group">
			<label>Status</label>
			<div class="form-group">
				<select class="custom-select" name="status">
					<option selected><?= $data_transaksi['status'] ?></option>
					<option value="baru">baru</option>
					<option value="proses">proses</option>
					<option value="selesai">selesai</option>
					<option value="diambil">diambil</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label>Status Bayar</label>
			<div class="form-group">
				<select class="custom-select" name="dibayar">
					<option selected><?= $data_transaksi['dibayar'] ?></option>
					<option value="dibayar">Dibayar</option>
					<option value="belum_dibayar">Belum Dibayar</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label>Berat Cucian</label>
			<input type="text" class="form-control" name="qty" placeholder="Berat Cucian..." value="<?= $data_transaksi['qty'] ?>">
		</div>

		<div class="form-group">
			<label>Nama Pengguna</label>
			<select class="custom-select" name="id_user">
				<?php 
					$user = mysqli_query($koneksi, "select * from tb_user");
					while ($data_user = mysqli_fetch_array($user)) {
				 ?>
				 <option value="<?= $data_user['id_user'] ?>" <?php if ($data_user['id_user'] = $data_user['id_user']) {
				 	echo "selected";
				 } ?>><?= $data_user['nama_pengguna'] ?></option>
				 <?php } ?>
			</select>
		</div>


		<button class="btn btn-primary" name="submit">Ubah</button>
	</form>
</div>
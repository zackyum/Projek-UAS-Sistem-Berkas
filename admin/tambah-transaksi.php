<?php 

include 'layout/header.php';
include 'layout/sidebar.php';
include 'layout/footer.php';
include '../config/koneksi.php';


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
	
	$tambah = mysqli_query($koneksi, "INSERT INTO tb_transaksi VALUES ('','$id_outlet','$id_paket','$kode_invoice', '$id_member', '$tgl','$batas_waktu','$tgl_bayar','$biaya_tambahan','$diskon','$pajak','$status','$dibayar','$qty','$id_user')");

	
	if ($tambah) {
		echo "<script>
				alert('Data berhasil di tambah');
				document.location.href= 'transaksi.php';
		</script>";
	}else {
		echo "<script>
				alert('Data gagal di tambah');
				document.location.href= 'tambah-transaksi.php';
		</script>";
	}
	
}


?>

<div class="container">
	<div class="card-title">
		<h5>Entri Transaksi</h5>
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

		<?php 
			$invoice_prefix="INV";
			$invoice_number=rand(1000, 9999);
			$invoice_id=$invoice_prefix.$invoice_number;
		?>

		<div class="form-group">
			<label for="">Kode Invoice</label>
			<input type="text" class="form-control" name="kode_invoice" value="<?php echo $invoice_id?>" readonly >
		</div>

		<div class="form-group">
			<label>Nama Paket</label>
			<select class="custom-select" name="id_paket">
			<option selected>---Pilih Nama Paket---</option>
				<?php 
					$paket = mysqli_query($koneksi, "SELECT * FROM tb_paket");
					while ($data_paket = mysqli_fetch_array($paket)) {
				 ?>
				 <option value="<?= $data_paket['id_paket'] ?>"><?= $data_paket['nama_paket'] ?></option>
				 <?php } ?>
			</select>
		</div>
		<div class="form-group">
			<label>Nama Pelanggan Tetap</label>
			<select class="custom-select" name="id_member" required>
				<option selceted>---Pilih nama pelanggan tetap---</option>
				<?php 
					$member = mysqli_query($koneksi, "SELECT * FROM tb_member");
					while ($data_member = mysqli_fetch_array($member)) {
				 ?>
				 <option value="<?= $data_member['id_member'] ?>"><?= $data_member['nama_member'] ?></option>
				 <?php } ?>
			</select>
		</div>

		<div class="form-group">
			<label>Tanggal</label>
			<input type="datetime-local" class="form-control" name="tgl">
		</div>

		<div class="form-group">
			<label>Batas Waktu</label>
			<input type="datetime-local" class="form-control" name="batas_waktu">
		</div>

		<div class="form-group">
			<label>Tanggal Bayar</label>
			<input type="datetime-local" class="form-control" name="tgl_bayar">
		</div>

		<div class="form-group">
			<label>Biaya Tambahan</label>
			<input type="number" class="form-control" name="biaya_tambahan" placeholder="Biaya Tambahan...">
		</div>

		<div class="form-group">
			<label>Potongan Harga</label>
			<input type="number" class="form-control" name="diskon" placeholder="Potongan Harga...">
		</div>

		<div class="form-group">
			<label>Pajak</label>
			<input type="number" class="form-control" name="pajak" placeholder="Pajak...">
		</div>


		<div class="form-group">
			<label>Status</label>
			<div class="form-group">
				<select class="custom-select" name="status">
					<option selected>---Pilih Status---</option>
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
					<option selected>---Pilih Status Bayar---</option>
					<option value="dibayar">Dibayar</option>
					<option value="belum_dibayar">Belum Dibayar</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label>Berat Cucian</label>
			<input type="text" class="form-control" name="qty" placeholder="Berat Cucian...">
		</div>
		
		<div class="form-group">
			<label>Nama Pengguna</label>
			<select class="custom-select" name="id_user">
			<option selected>---Pilih Nama Pengguna---</option>
				<?php 
					$user = mysqli_query($koneksi, "SELECT * FROM tb_user");
					while ($data_user = mysqli_fetch_array($user)) {
				 ?>
				 <option value="<?= $data_user['id_user'] ?>"><?= $data_user['nama_pengguna'] ?></option>
				 <?php } ?>
			</select>
		</div>

		<button class="btn btn-primary" name="submit">Tambah</button>
	</form>
</div>


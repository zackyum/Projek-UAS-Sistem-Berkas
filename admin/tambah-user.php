<?php 

include 'layout/header.php';
include 'layout/sidebar.php';
include 'layout/footer.php';
include '../config/koneksi.php';


if (isset($_POST['submit'])) {

$nama_pengguna = $_POST['nama_pengguna'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$id_outlet = $_POST['id_outlet'];
$role = $_POST['role'];

	
	$tambah = mysqli_query($koneksi, "INSERT INTO tb_user VALUES ('','$nama_pengguna','$username','$password', '$id_outlet', '$role')");

	if ($tambah) {
		echo "<script>
				alert('Data berhasil di tambah');
				document.location.href= 'user.php';
		</script>";
	}else {
		echo "<script>
				alert('Data gagal di tambah');
				document.location.href= 'tambah-user.php';
		</script>";
	}
}


?>

<div class="container">
	<div class="card-title">
		<h5>Tambah Pengguna</h5>
	</div>
	<form method="post">
		<div class="form-group">
			<label>Nama Pengguna</label>
			<input type="text" class="form-control" name="nama_pengguna" placeholder="Nama Pengguna...">
		</div>
		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="username" placeholder="Username...">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="Password" class="form-control" name="password" placeholder="Password...">
		</div>
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
			<label>Role</label>
			<div class="form-group">
				<select class="custom-select" name="role">
					<option selected>---Pilih Role---</option>
					<option value="admin">Admin</option>
					<option value="kasir">Kasir</option>
					<option value="owner">Owner</option>
				</select>
			</div>
		</div>

		<button class="btn btn-primary" name="submit">Tambah</button>
	</form>
</div>
<?php 

include 'layout/header.php';
include 'layout/sidebar.php';
include 'layout/footer.php';
include '../config/koneksi.php';

$id = $_GET['id'];
$user = mysqli_query($koneksi, "SELECT * From tb_user where id_user='$id'");
$data_user = mysqli_fetch_array($user);

if (isset($_POST['submit'])) {

$nama_pengguna = $_POST['nama_pengguna'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$id_outlet = $_POST['id_outlet'];
$role = $_POST['role'];
	
	$ubah = mysqli_query($koneksi, "UPDATE tb_user SET nama_pengguna = '$nama_pengguna',
						username = '$username',
						password = '$password',
						id_outlet = '$id_outlet',
						role = '$role'
						where id_user= '$id'
		");

	if ($ubah) {
		echo "<script>
				alert('Data berhasil di ubah');
				document.location.href= 'user.php';
		</script>";
	}else {
		echo "<script>
				alert('Data gagal di ubah');
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
			<label for="">Nama Pengguna</label>
			<input type="text" class="form-control" name="nama_pengguna" value="<?= $data_user['role'] ?>" placeholder="Nama Pengguna...">
		</div>

		<div class="form-group">
			<label for="">Username</label>
			<input type="text" class="form-control" name="username" value="<?= $data_user['username'] ?>" placeholder="Username...">
		</div>

		<div class="form-group">
			<label for="">Kata Sandi</label>
			<input type="password" class="form-control" name="password" value="<?= $data_user['password'] ?>" placeholder="Kata Sandi...">
		</div>

		<div class="form-group">
		<label>Nama Toko</label>
		<select class="custom-select" name="id_outlet">
				<?php 
					$outlet = mysqli_query($koneksi, "select * from tb_outlet");
					while ($data_outlet = mysqli_fetch_array($outlet)) {
				 ?>
				 <option value="<?= $data_outlet['id_outlet'] ?>" <?php if ($data_outlet['id_outlet'] = $data_user['id_outlet']) {
				 	echo "selected";
				 } ?>><?= $data_outlet['nama_outlet'] ?></option>
				 <?php } ?>
			</select>
		</div>
		<div class="form-group">
		<label>Role</label>
			<div class="form-group">
				<select class="custom-select" name="role">
					<option selected><?= $data_user['role'] ?></option>
					<option value="admin">Admin</option>
					<option value="kasir">Kasir</option>
					<option value="owner">Owner</option>
				</select>
			</div>
		</div>
		

		<button class="btn btn-primary" name="submit">Ubah</button>
	</form>
</div>
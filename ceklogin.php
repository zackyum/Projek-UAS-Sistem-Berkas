<?php 

include 'config/koneksi.php';

session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi, "select * from tb_user where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
	$data = mysqli_fetch_assoc($login);
	if ($data['role'] === "admin") {
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['status'] = "login";
		$_SESSION['role'] = "admin";
		echo "<script>
				alert('Anda Berhasil Login Sebagai Admin!');
				document.location.href= 'admin/index.php';
		</script>";
	}elseif ($data['role'] === "kasir") {
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['status'] = "login";
		$_SESSION['role'] = "kasir";
		echo "<script>
				alert('Anda Berhasil Login Sebagai Kasir!');
				document.location.href= 'kasir/index.php';
		</script>";
	}elseif ($data['role'] === "owner") {
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['status'] = "login";
		$_SESSION['role'] = "owner";
		echo "<script>
				alert('Anda Berhasil Login Sebagai Owner!');
				document.location.href= 'owner/index.php';
		</script>";
	}else {
		echo "<script>
				alert('login gagal!');
				document.location.href= 'login.php';
		</script>";
}

}else {
	echo "<script>
				alert('login gagal!');
				document.location.href= 'login.php';
		</script>";
}
 ?>
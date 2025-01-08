<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aplikasi Pengeloaan Laundry Berbasis Web</title>
	<link rel="stylesheet" type="text/css" href="asset/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="asset/css/login.css">
	<link rel="shortcut icon" href="images/favicon.png">
</head>
<body>
	<h2 class="judul">APLIKASI PENGELOLAAN LAUNDRY BERBASIS WEB <br><br>Kelompok 5</h2>
	<div class="container">
		<h4 class="sub-judul">MASUK</h4>
		<form method="post" action="ceklogin.php">
			<div class="form-group">
				<label>Nama Pengguna</label>
				<input class="form-control" type="text" name="username" autocomplete="off"></input>
			</div>
			<div class="form-group">
				<label>Kata Sandi</label>
				<input class="form-control" type="password" name="password"></input>
			</div>
			<button class="btn btn-primary" type="submit">Masuk</button>
			<a class="btn btn-danger" href="index.html">Kembali</a>
			<a class="btn btn-secondary" href="#">Registerasi</a>
		</form>
	</div>
</body>
<script type="text/javascript" src="asset/bootstrap/js/bootstrap.min.js"></script>
</html>
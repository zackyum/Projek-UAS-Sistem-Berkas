<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aplikasi Pengelolaan Laundry Berbasis Web</title>
	<link rel="stylesheet" type="text/css" href="../asset/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../asset/css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<link rel="shortcut icon" href="../images/favicon.png">
</head>
<body>
<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../index.php?pesan=belum_login");
	}
	?>
	<nav class="navbar bg-secondary fixed-top">
		<div class="container-md">
			<a class="nav-link text-white" style="font-size: 20px;">VOSHCA LAUNDRY</a>
			<li class="nav-item" style="list-style: none;">
				<a class="nav-link text-white" href="../login.php"><i class="bi bi-box-arrow-right"  onclick="return confirm('Apakah anda yakin ingin keluar?');"> Keluar</i></a>
			</li>
		</div>
	</nav>
<?php
include '../config/koneksi.php';

	$id = $_GET['id'];

	$hapus = mysqli_query($koneksi, "DELETE FROM tb_outlet where id_outlet= $id");

	if ($hapus) {
		echo "<script>
				alert('Data berhasil di hapus');
				document.location.href= 'outlet.php';
		</script>";
	}else {
		echo "<script>
				alert('Data gagal di hapus');
				document.location.href= 'outlet.php';
		</script>";
	}

 ?>
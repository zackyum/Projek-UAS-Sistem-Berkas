<?php 

include 'layout/header.php';
include 'layout/sidebar.php';
include 'layout/footer.php';
include '../config/koneksi.php';

?>
<div class="container">
	<div class="card-title bg-secondary text-white">
			Selamat datang owner
	</div>
	<div class="container-lg">
		<div class="card-body bg-primary text-white">
			<h6><i class="bi bi-shop"></i> Total Data Toko</h6>
				<div class="total">
				<?php 
				$outlet= mysqli_query($koneksi, "select * from tb_outlet");
				echo mysqli_num_rows($outlet)
				?>
			</div>
		</div>
		<div class="card-body bg-danger text-white">
		<h6><i class="bi bi-box"></i> Total Data Paket Cucian</h6>
			<div class="total">
				<?php 
				$paket= mysqli_query($koneksi, "select * from tb_paket");
				echo mysqli_num_rows($paket)
				?>
			</div>
		</div>
		<div class="card-body bg-info text-white">
		<h6><i class="bi bi-person"></i> Total Data Pengguna</h6>
			<div class="total">
				<?php 
				$user= mysqli_query($koneksi, "select * from tb_user");
				echo mysqli_num_rows($user)
				?>
			</div>
		</div>
		</div>
		<div class="container-lg">
			<div class="card-body bg-success text-white">
				<h6><i class="bi bi-people"></i> Total Data Pelanggan Tetap</h6>
					<div class="total">
						<?php 
						$member= mysqli_query($koneksi, "select * from tb_member");
						echo mysqli_num_rows($member)
						?>
					</div>
			</div>
			<div class="card-body bg-warning text-white">
				<h6><i class="bi bi-wallet"></i> Total Data Transaksi</h6>
					<div class="total">
						<?php 
						$transaksi= mysqli_query($koneksi, "select * from tb_transaksi");
						echo mysqli_num_rows($transaksi)
						?>
					</div>
			</div>
			<div class="card-body" style="box-shadow:0px 0px 0px;">
			</div>
		</div>
	</div>
</div>



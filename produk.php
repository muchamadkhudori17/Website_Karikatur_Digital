<?php 
	include 'header.php';
 ?>

<!-- PRODUK TERBARU -->
<div class="container">
	<h2 style="width: 100%; border-bottom: 4px solid #000000"><b>Produk Kami</b></h2>

	<div class="row">
		<?php 
		$result = mysqli_query($conn, "SELECT * FROM produk");
		while ($row = mysqli_fetch_assoc($result)) {
			$waMessage = "Halo, saya tertarik dengan produk " . $row['nama'] . " dengan harga Rp." . number_format($row['harga']);
			$waLink = "https://api.whatsapp.com/send?phone=6285156850563&text=" . urlencode($waMessage);
			?>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="image/produk/<?= $row['image']; ?>" >
					<div class="caption">
						<h3><?= $row['nama']; ?></h3>
						<h4>Rp.<?= number_format($row['harga']); ?></h4>
						<div class="row">
							<div class="col-md-6">
								<a href="detail_produk.php?produk=<?= $row['kode_produk']; ?>" class="btn btn-warning btn-block">Detail</a> 
							</div>
							<div class="col-md-6">
								<a href="<?= $waLink; ?>" class="btn btn-success btn-block" role="button">
									<i class="fab fa-whatsapp"></i> Pesan Sekarang
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php 
		}
		?>
	</div>
</div>

 <?php 
	include 'footer.php';
 ?>

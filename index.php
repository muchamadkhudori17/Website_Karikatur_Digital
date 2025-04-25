<?php 
include 'header.php';
?>
<!-- IMAGE -->
<div class="container-fluid" style="margin: 0;padding: 0;">
	<div class="image" style="margin-top: -21px">
		<img src="image/home/bg.jpg" style="width: 100%;  height: 400px;">
	</div>
</div>
<br>
<br>

<!-- PRODUK TERBARU -->
<div class="container">
	<h4 class="text-center" style="font-family: arial; padding-top: 10px; padding-bottom: 10px; font-style: italic; line-height: 29px; border-top: 2px solid #000000; border-bottom: 2px solid #000000;">
		Pena Design adalah jasa design karikatur digital yang didirikan pada tahun 2019. Produk karikatur kami mempunyai ciri khas design yang mewah dan elegan, sehingga setiap mata yang melihatnya akan terkesan dengan produk ini.
	</h4>

	<h2 style=" width: 100%; border-bottom: 4px solid #000000; margin-top: 80px;"><b>Produk Kami</b></h2>

	<div class="row">
		<?php 
		$result = mysqli_query($conn, "SELECT * FROM produk");
		while ($row = mysqli_fetch_assoc($result)) {
			$waMessage = "Halo, saya tertarik dengan produk " . $row['nama'] . " dengan harga Rp." . number_format($row['harga']) . ". Apakah masih tersedia?";
			$waLink = "https://api.whatsapp.com/send?phone=6285156850563&text=" . urlencode($waMessage);
			?>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="image/produk/<?= $row['image']; ?>" >
					<div class="caption">
						<h3><?= $row['nama'];  ?></h3>
						<h4>Rp.<?= number_format($row['harga']); ?></h4>
						<div class="row">
							<div class="col-md-6">
								<a href="detail_produk.php?produk=<?= $row['kode_produk']; ?>" class="btn btn-warning btn-block">Detail</a> 
							</div>
							<div class="col-md-6">
								<a href="<?= $waLink; ?>" class="btn btn-success btn-block" role="button">
									<i class="fab fa-whatsapp"></i> Pesan
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
<br>
<br>
<br>
<br>
<?php 
include 'footer.php';
?>

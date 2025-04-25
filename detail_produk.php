<?php 
include 'header.php';
$kode = mysqli_real_escape_string($conn,$_GET['produk']);
$result = mysqli_query($conn, "SELECT * FROM produk WHERE kode_produk = '$kode'");
$row = mysqli_fetch_assoc($result);

$waMessage = "Halo, saya tertarik dengan produk " . $row['nama'] . " dengan harga Rp." . number_format($row['harga']);
$waLink = "https://api.whatsapp.com/send?phone=6285156850563&text=" . urlencode($waMessage);
?>
<div class="container">
	<h2 style="width: 100%; border-bottom: 4px solid #000000"><b>Detail produk</b></h2>

	<div class="row">
		<div class="col-md-4">
			<div class="thumbnail">
				<img src="image/produk/<?= $row['image']; ?>" width="400">
			</div>
		</div>

		<div class="col-md-8">
			<table class="table table-striped">
				<tbody>
					<tr>
						<td><b>Nama</b></td>
						<td><?= $row['nama']; ?></td>
					</tr>
					<tr>
						<td><b>Harga</b></td>
						<td>Rp.<?= number_format($row['harga']); ?></td>
					</tr>
					<tr>
						<td><b>Deskripsi</b></td>
						<td><?= $row['deskripsi']; ?></td>
					</tr>
					<tr>
						<td><b>Jumlah</b></td>
						<td><input class="form-control" type="number" min="1" name="jml" value="1" style="width: 155px;"></td>
					</tr>
				</tbody>
			</table>
			<a href="<?= $waLink; ?>" class="btn btn-success"><i class="fab fa-whatsapp"></i> Pesan Sekarang</a>
			<a href="index.php" class="btn btn-warning"> Kembali Belanja</a>
		</div>
	</div>
</div>
<br>
<br>

<?php 
include 'footer.php';
?>

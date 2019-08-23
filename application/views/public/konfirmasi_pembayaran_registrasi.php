<?php
include "header.php";
?>
<?php
include "header2.php";
?>
<style type="text/css">
	.home-active{
		font-weight: bold;
	}
</style>	
</div>

<section id="banner">
	<div class="banner ">
		<img src="<?= base_url() ?>assets/home_assets/img/baner.jpg">
		<div class="bg-gradient-soft"></div>
	</div>	
</section>
<section id="" class="">
	<div class="container mt-5">
		<div class="bg-white box-shadow px-3 py-3 mb-5">
			<h2 class="blue mb-3" align="center">
				<b>Konfirmasi Pembayaran Registrasi</b>
			</h2>



			<!-- isi notifikasi-->
			<form action="<?= base_url() ?>/home/pembayaran_registrasi_post?permalink=<?= $permalink?>" method="post">
				<table>
					<h4 class="blue notif-text">Sudah Melakukan Pembayaran Melalui</h4><br>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
							Nama Bank
						</label>
						<div class="col-sm-6">
							<select name="kode" id="kode">
								<?php foreach ($bank as $bnk) : ?>
									<option value="<?= $bnk['kode'] ?>"><?= $bnk['nama'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
							Nomor Rekening
						</label>
						<div class="col-sm-6">
							<input type="number" min="0" class="form-control" name="nomor_rekening" id="nomor_rekening" value="" placeholder="No Rekening">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
							Atas Nama Rekening
						</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="nama_rekening" id="nama_rekening" value="" placeholder="Nama">
						</div>
					</div>
				</table>
					<input type="hidden" name="daftarfilelogo2" id="daftarfilelogo2">
					<div class="btn-submit">
						<button type="submit" class="btn">Submit</button>
					</div>
				</form>


		</div>
	</div>
</section>

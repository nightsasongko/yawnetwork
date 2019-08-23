<?php
include "header.php";
?>
<style type="text/css">
	#footer{
		display: none;
	}
	.sidebar-nav .histori-transaksi-active:after{
		content: url(<?=base_url('assets/home_assets/img/polygon.png')?>); 
		color: #fff;
		max-height: 30px;
		right: 0;
		float: right;
		top: -39px;
		font-weight: bold;
		position: relative;
	}
	.sidebar-nav .histori-transaksi-active a{
		font-weight: bold;
	}
</style>

<div id="wrapper">

	<!-- Sidebar -->
	<?php
	include "sidebar.php";
	?>
	<!-- /#sidebar-wrapper -->

	<!-- Page Content -->
	<div id="page-content-wrapper">

		<!-- Header Dashboard-->

		<?php
		include "header-dashboard.php";
		?>

		<!-- Konten Dashboard-->

		<div class="container-fluid padding-content">
		
			
			<div class="bg-white box-shadow mb-2 py-3 px-3">
				<div class="title-border mb-3">
					<div class="row">
						<div class="col-6 col-sm-6 col-md-6 col-lg-6">
							<h6 class="blue notif-text">
							<i class="fas fa-newspaper"></i><span> Histori Transaksi</span>
							</h6>						
						</div>

					</div>
				</div>
				<!-- isi notifikasi-->
				<?php foreach ($list_histori as $tu) : ?>
				<div class="list-notification pb-3" style="margin-bottom: 60px;">
					<table>
						<tr>
							<td>No Invoice</td>
							<td>:</td>
							<td><?= $tu['nomor_transaksi'] ?></td>
						</tr>
						<tr>
							<td>Tanggal Belanja</td>
							<td>:</td>
							<td><?= $tu['tanggal_belanja']?></td>
						</tr>
						<tr>
							<td>Status Bayar</td>
							<td>:</td>
							<td>
							<?= $tu['text_status_bayar']?>
							</td>
						</tr>
						<tr>
							<td>Status Kirim</td>
							<td>:</td>
							<td>
							<?= $tu['text_status_kirim']?>
							</td>
						</tr>
						<tr>
							<td>Total Belanja</td>
							<td>:</td>
							<td>Rp <?= $tu['total_tagihan']?></td>
						</tr>
					</table>

					<table class="table">
						<tr>
							<th>No.</th>
							<th>Nama</th>
							<th>harga</th>
							<th>Qty</th>
							<th>Subtotal</th>
						</tr>

						<?php 
						$i= 1;
						foreach ($tu['arraydetail'] as $detail) {
						?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?= $detail['nama_produk']?></td>
							<td><?= $detail['harga_satuan']  ?></td>
							<td><?= $detail['qty']?></td>
							<td><?= $detail['subtotal']?></td>
						</tr>

							<?php
							$i++;
							# code...
						}?>
						
						
						
					</table>
					<?php if ($tu['status_bayar']==0) { ?>
						<a href="<?php echo base_url(); ?>dbrd_distributor/upload_gambar_bukti_transfer/<?= $tu['nomor_transaksi']?>"><span class="btn btn-success"><i class="fa fa-check"></i> Konfirmasi Pembayaran</span></a> 
					<?php } if ($tu['status_kirim']==1) { ?>
						<a href="<?php echo base_url(); ?>dbrd_distributor/konfirmasi_terima_barang?nomor_transaksi=<?= $tu['nomor_transaksi']?>"><span class="btn btn-primary"><i class="fa fa-check"></i> Konfirmasi Terima Barang</span></a> 
					<?php } if ($tu['status_bayar']==4) { ?>
						<i class="fa fa-check"></i> Dilakukan Pengecekan Oleh Admin</span>
					<?php } ?>

					<!-- <button>Barang di terima</button> -->
				</div>

				<?php endforeach; ?>
			</div>
			

			
		</div>

	</div>
	<!-- /#page-content-wrapper -->

</div>





<?php
include "footer.php";
?>
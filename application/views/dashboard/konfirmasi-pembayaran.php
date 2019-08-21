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
							<i class="fas fa-newspaper"></i><span> Konfirmasi Pembayaran</span>
							</h6>						
						</div>
					</div>
				</div>

				<!-- isi notifikasi-->
				<form action="<?= base_url() ?>/dbrd_distributor/konfirmasi_pembayaran_post" method="post">
				<table>
					<h4 class="blue notif-text">Pembayaran Melalui</h4>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
							Nama Bank
						</label>
						<div class="col-sm-6">
							<select name="kode" id="kode">
								<option value="<?= $d_bank['id_bank'] ?>"><?= $d_bank['nama'] ?></option>
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
							<input type="number" min="0" class="form-control" name="nomor_rekening" id="nomor_rekening" value="<?= $profile['nomor_rekening'] ?>" placeholder="No Rekening">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
							Atas Nama Rekening
						</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="nama_rekening" id="nama_rekening" value="<?= $profile['nama_rekening'] ?>" placeholder="Nama">
						</div>
					</div>

					<h4 class="blue notif-text">Alamat Pengiriman</h4>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
						Nama Penerima
						</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="nama_penerima" id="nama_penerima" value="<?= $profile['nama']?>" placeholder="Nama Penerima">
						</div>
					</div>
					<div class="form-group row ">
						<label for="" class="col-sm-2 col-form-label">Alamat</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="alamat_penerima" id="alamat_penerima" rows="3"><?php echo htmlspecialchars($profile['alamat']); ?></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
							Kota
						</label>
						<div class="col-sm-6">
							<select name="id_kota_penerima" id="id_kota_penerima">
								<option value="<?= $profile['id_kota'] ?>"><?= $kota['namakab'] ?></option>
								<?php foreach ($wilayah as $w_kota) : ?>
									<option value="<?= $w_kota['id'] ?>"><?= $w_kota['namakab'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
						Kode Pos
						</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="kodepos_penerima" id="kodepos_penerima" value="" placeholder="Kode Pos">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
						Telepon
						</label>
						<div class="col-sm-6">
							<input type="number" class="form-control" name="telepon_penerima" id="telepon_penerima" value="<?= $profile['telepon'] ?>" placeholder="Telepon">
						</div>
					</div>
					
					<div class="form-group row">
						<!-- <label for="avatar" class="col-sm-2 col-form-label">
							Upload Bukti Bayar
						</label>
						<div class="col-sm-6 upload-btn">
						<button type="button" class="btn btn-primary" onClick="mulai_upload2();" name="btnuploader2" id="btnuploader2"><i class='fa fa-image'></i> Browse</button>
							<div id="preview_gambar2" style="margin-bottom:20px; margin-top:10px;">
									
							</div>
						</div> -->
						<!-- <label for="avatar" class="col-sm-2 col-form-label">
							Bukti Bayar
						</label>
						<div class="col-sm-6 upload-btn">
							<form method="post" action="<?= base_url('upload/img_trs_umum_upload/')?><?= $nomor_transaksi ?>" enctype="multipart/form-data">
								<input type="file" id="file_bukti_bayar" name="file_bukti_bayar" size="33" />
								<input type="submit" value="Upload Image" />
							</form>
						</div> -->
					</div>

					<input type="hidden" name="nomor_transaksi" value="<?= $nomor_transaksi?>">
				</table>
					<input type="hidden" name="daftarfilelogo2" id="daftarfilelogo2">
					<button type="submit">Submit</button>
				</form>
				<form name="uploadform2" id="uploadform2" method="post" style="display:none" class="hide" action="<?php echo base_url();?>dbrd_distributor/gambar_bukti_transfer" enctype="multipart/form-data">
					<input type="file" name="gambar2" id="gambar2" >
				</form>
			</div>
		</div>

	</div>
	<!-- /#page-content-wrapper -->

</div>

<footer id="footer" class="pt-2">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-6 col-md-6 col-lg-6">
				<ul class="footer-menu">
					<li>
						<a href="">FAQ</a>
					</li>
					<li>
						<a href="">
							Syarat & Ketentuan
						</a>
					</li>
				</ul>
			</div>
			<div class="col-12 col-sm-6 col-md-6 col-lg-6">
				<div class="footer-right">
					<a href="">
						<img src="<?= base_url()?>assets/home_assets/img/yawnetwork.png" class="logo-footer">
					</a>
				</div>				
			</div>
		</div>
	</div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="http://localhost/yaw/yawnetwork/assets/components/jquery/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<!-- Owl Carousel -->
<script src="<?= base_url()?>assets/OwlCarousel/src/js/owl.carousel.js" data-cover></script>
<script src="<?= base_url()?>assets/OwlCarousel/src/js/owl.support.js" data-cover></script>
<script src="<?= base_url()?>assets/OwlCarousel/src/js/owl.autoplay.js" data-cover></script>

<!-- JS -->
<script type="text/javascript" src="<?= base_url()?>assets/js/script.js"></script>



<script type="text/javascript">
//begin uploader foto 
function mulai_upload2()
        {
            $('#gambar2').click();
        }

        $('#gambar2').on('change',function(){
            $('#uploadform2').submit();
            })

    $("#uploadform2").submit(function(event){
        event.preventDefault();
        //$("#totalfoto").val($(".boximage").length);
        var formData = new FormData(this);
        //$("#photoCropperData").html("");
        //counterPhoto++;
        //$('#uploadbar').html('uploading... ');

        $.ajax({
            xhr: function()
              {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt){
                  if (evt.lengthComputable) {
                    var percentComplete = Math.round(100*evt.loaded / evt.total);

                    if(percentComplete==100){
                        uploading = "completed";
                        $("#btnuploader2").html("<i class='fa fa-image'></i> Ganti Gambar");
                        $('#uploadbar2').html('Upload completed');
                    }else{
                        uploading = "";
                        //$('#uploadbar').show();
                        $('#uploadbar2').html('uploading... ' + percentComplete + '%');
                        //$('#btnuploader').html("<i class='fa fa-circle-o-notch fa-spin'></i><br> Uploading.."+(percentComplete)+"%");
                    }
                  }
                }, false);

                return xhr;
            },
            url:"<?=base_url()?>dbrd_distributor/gambar_bukti_transfer",
            type:"POST",
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
        })
        .done(function(result){
            var htmlData = result;
            arrmsg = result.split('|');
            benergak = arrmsg[0];
            pesan = arrmsg[1];
            nama_aja = arrmsg[2];

            if(benergak == '0')
            {
                alert('Gagal Upload');
            }
            else
            {
                $('#daftarfilelogo2').val(nama_aja);
                $('#preview_gambar2').html(pesan);
            }
        });
    });

    
//end uploader foto   
</script>
</body>
</html>
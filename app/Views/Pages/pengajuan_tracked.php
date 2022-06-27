<div class="container">
		<div class="text-center">
			<h2 class="section-heading text-uppercase">Tracking Pengajuan</h2>
			<h3 class="section-subheading text-muted">Pengajuan <b>Ditemukan</b>, Detail Dibawah:</h3>
		</div>
		<div class="text-justify pl-5 pr-5">
			<div class="row justify-content-center">
				<div class="col-12 col-md-10 col-lg-10">
					<div class="row">
						<div class="col-lg-7">
							<h3>Keterangan:</h3>
							<table class="table">
								<tr>
									<td>ID Pengajuan</td>
									<td>:</td>
									<td><?= base_url();//  $row['id'] ?></td>
								</tr>
								<tr>
									<td>Nama Pengaju</td>
									<td>:</td>
									<td><?= base_url();//  $row['nama'] ?></td>
								</tr>
								<tr>
									<td>NIK</td>
									<td>:</td>
									<td><?= base_url();//  $row['NIK'] ?></td>
								</tr>
								<tr>
									<td>No Hp</td>
									<td>:</td>
									<td><?= base_url();//  $row['no_hp'] ?></td>
								</tr>
								<tr>
									<td>Jenis Pengajuan</td>
									<td>:</td>
									<td><?= base_url();//  $options[$row['jenis_surat']] ?></td>
								</tr>
								<tr>
									<td>File Lampiran</td>
									<td>:</td>
									<td>
										<button class="btn btn-outline-info" data-toggle="modal" data-target="#lihatFile<?= base_url();//  $row['id']; ?>"><i class="fa fa-eye"></i></button>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div>
						<!-- <div class="checkout-wrap">
							<ul class="checkout-bar">
								<?= base_url() //if ($row['status'] == '1') : ?>
									<li class="active first">Pengajuan Surat<br>Pending</li>
									<li class="">Dokumen<br>Diterima</li>
									<li class="">Verifikasi Berkas / Persyaratan<br>Dilanjutkan</li>
									<li class="">Sudah Diketik dan<br>Diparaf</li>
									<li class="">Sudah Ditandatangani<br>Kepala Desa</li>
									<li class="">Selesai / Dapat Diambil<br>&nbsp;</li>
								<?= base_url() //elseif ($row['status'] == '2') : ?>

									<li class="active first">Pengajuan Surat<br>Pending</li>
									<li class="">Dokumen<br>Ditolak</li>
									<h1>MAAF PENGAJUAN ANDA DITOLAK KARENA SYARAT TIDAK TERPENUHI</h1>


								<?= base_url() //elseif ($row['status'] == 3) : ?>
									<li class="active first">Pengajuan Surat<br>Pending</li>
									<li class="active">Dokumen<br>Diterima</li>
									<li class="active">Verifikasi Berkas / Persyaratan<br>Dilanjutkan</li>
									<li class="">Sudah Diketik dan<br>Diparaf</li>
									<li class="">Sudah Ditandatangani<br>Lurah</li>
									<li class="">Selesai / Dapat Diambil<br>&nbsp;</li>
								<?= base_url() //elseif ($row['status'] == '4') : ?>
									<li class="active first">Pengajuan Surat<br>Pending</li>
									<li class="active">Dokumen<br>Diterima</li>
									<li class="active">Verifikasi Berkas / Persyaratan<br>Dilanjutkan</li>
									<li class="active">Sudah Diketik dan<br>Diparaf</li>
									<li class="">Sudah Ditandatangani<br>Kepala Desa</li>
									<li class="">Selesai / Dapat Diambil<br>&nbsp;</li>
								<?= base_url() //elseif ($row['status'] == '5') : ?>
									<li class="active first">Pengajuan Surat<br>Pending</li>
									<li class="active">Dokumen<br>Diterima</li>
									<li class="active">Verifikasi Berkas / Persyaratan<br>Dilanjutkan</li>
									<li class="active">Sudah Diketik dan<br>Diparaf</li>
									<li class="active">Sudah Ditandatangani<br>Kepala Desa</li>
									<li class="active">Selesai / Dapat Diambil<br>&nbsp;</li>
								<?= base_url() //endif; ?>
							</ul>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
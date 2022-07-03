<div class="container">
	<div class="text-center">
		<h2 class="section-heading text-uppercase">Tracking Pengajuan</h2>
		<h3 class="section-subheading text-muted">Pengajuan <b>Ditemukan</b>, Detail Dibawah:</h3>
	</div>
	<div class="text-justify pl-5 pr-5">
		<div class="row justify-content-center">
			<div class="col-12 col-md-10 col-lg-10">
				<div class="row">
					<div class="col-lg-12">
						<h3>Keterangan:</h3>
						<table class="table">
							<tr>
								<td>ID Pengajuan</td>
								<td>:</td>
								<td><?= $pengajuan['id_pengajuan'] ?></td>
							</tr>
							<tr>
								<td>Nama Pengaju</td>
								<td>:</td>
								<td><?= $pengajuan['nama'] ?></td>
							</tr>
							<tr>
								<td>NIK</td>
								<td>:</td>
								<td><?= $pengajuan['NIK'] ?></td>
							</tr>
							<tr>
								<td>No Hp</td>
								<td>:</td>
								<td><?= $pengajuan['no_hp'] ?></td>
							</tr>
							<tr>
								<td>Jenis Pengajuan</td>
								<td>:</td>
								<td><?php
									if ($pengajuan['kategori'] == 'KKB') {
										echo 'Pengajuan Kartu Keluarga Baru';
									} else if ($pengajuan['kategori'] == 'KKU') {
										echo 'Pengajuan Perbarui Kartu Keluarga';
									} else if ($pengajuan['kategori'] == 'AKU') {
										echo 'Pengajuan Perbarui Akta Kelahiran';
									} else if ($pengajuan['kategori'] == 'AKB') {
										echo 'Pengajuan Akta Kelahiran Baru';
									} else if ($pengajuan['kategori'] == 'AKB') {
										echo 'Pengajuan Akta Kelahiran Baru';
									} else if ($pengajuan['kategori'] == 'KTPB') {
										echo 'Pengajuan Kartu Tanda Penduduk Baru';
									} else if ($pengajuan['kategori'] == 'KTPU') {
										echo 'Pengajuan Perbarui Kartu Tanda Penduduk';
									}
									?></td>
							</tr>
							<tr>
								<td>File Lampiran</td>
								<td>:</td>
								<td>
									<a href="<?= base_url(); ?>/assets/uploads/berkas/<?= $pengajuan['file']; ?>" class="btn btn-outline-info"><i class="fa fa-eye"></i></a>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="checkout-wrap card shadow">
	<ul class="checkout-bar">
		<?php if ($pengajuan['status'] == '1') : ?>
			<li class="active first">Pengajuan Surat<br>Pending</li>
			<li class="">Dokumen<br>Diterima</li>
			<li class="">Verifikasi Berkas<br>Dilanjutkan</li>
			<li class="">Sudah Diketik dan<br>Diparaf</li>
			<li class="">Sudah Ditandatangani<br>Camat</li>
			<li class="">Selesai / Dapat Diambil<br>&nbsp;</li>
		<?php elseif ($pengajuan['status'] == '2') : ?>

			<li class="active first">Pengajuan Surat<br>Pending</li>
			<li class="">Dokumen<br>Ditolak</li>
			<h1>MAAF PENGAJUAN ANDA DITOLAK KARENA SYARAT TIDAK TERPENUHI</h1>


		<?php elseif ($pengajuan['status'] == 3) : ?>
			<li class="active first">Pengajuan Surat<br>Pending</li>
			<li class="active">Dokumen<br>Diterima</li>
			<li class="active">Verifikasi Berkas<br>Dilanjutkan</li>
			<li class="">Sudah Diketik dan<br>Diparaf</li>
			<li class="">Sudah Ditandatangani<br>Lurah</li>
			<li class="">Selesai / Dapat Diambil<br>&nbsp;</li>
		<?php elseif ($pengajuan['status'] == '4') : ?>
			<li class="active first">Pengajuan Surat<br>Pending</li>
			<li class="active">Dokumen<br>Diterima</li>
			<li class="active">Verifikasi Berkas<br>Dilanjutkan</li>
			<li class="active">Sudah Diketik dan<br>Diparaf</li>
			<li class="">Sudah Ditandatangani<br>Camat</li>
			<li class="">Selesai / Dapat Diambil<br>&nbsp;</li>
		<?php elseif ($pengajuan['status'] == '5') : ?>
			<li class="active first">Pengajuan Surat<br>Pending</li>
			<li class="active">Dokumen<br>Diterima</li>
			<li class="active">Verifikasi Berkas<br>Dilanjutkan</li>
			<li class="active">Sudah Diketik dan<br>Diparaf</li>
			<li class="active">Sudah Ditandatangani<br>Camat</li>
			<li class="active">Selesai / Dapat Diambil<br>&nbsp;</li>
		<?php endif; ?>
	</ul>
</div>
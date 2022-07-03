 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Pengajuan</h1>

     <!-- Formulir Pengajuan -->
     <div class="card mb-4">
         <div class="card-header">
             Formulir Pengajuan
         </div>
         <div class="card-body">
             <?php if (session()->getFlashdata('success-form') == TRUE) : ?>
                 <?= session()->getFlashdata('success-form'); ?>
             <?php endif; ?>
             <form action="<?= base_url(); ?>/form-pengajuan" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                 <div class="row">
                     <div class="col-lg-6">
                         <div class="form-group">
                             <label class="label-control" for="nik">NIK *</label>
                             <input class="form-control" name="nik" id="nik" required type="text" minlength="16" maxlength="16" placeholder='Silahkan masukkan NIK anda' value="<?= old('nik'); ?>" />
                             <?php if ($validation->getError('nik')) : ?>
                                 <div class='text text-danger mt-2'>
                                     <?= $error = $validation->getError('nik'); ?>
                                 </div>
                             <?php endif ?>
                         </div>
                     </div>
                     <div class="col-lg-6">
                         <div class="form-group">
                             <label class="label-control" for="nama">Nama *</label>
                             <input class="form-control" name="nama" id="nama" required type="text" placeholder='Silahkan masukkan nama anda' value="<?= old('nama'); ?>" />
                             <?php if ($validation->getError('nama')) : ?>
                                 <div class='text text-danger mt-2'>
                                     <?= $error = $validation->getError('nama'); ?>
                                 </div>
                             <?php endif ?>
                         </div>
                     </div>
                     <div class="col-lg-6">
                         <div class="form-group">
                             <label class="label-control" for="alamat">Alamat *</label>
                             <input class="form-control" name="alamat" id="alamat" required type="text" placeholder='Silahkan masukkan alamat anda' value="<?= old('alamat'); ?>" />
                             <?php if ($validation->getError('alamat')) : ?>
                                 <div class='text text-danger mt-2'>
                                     <?= $error = $validation->getError('alamat'); ?>
                                 </div>
                             <?php endif ?>
                         </div>
                     </div>
                     <div class="col-lg-6">
                         <div class="form-group">
                             <label class="label-control" for="jenis_kelamin">Jenis Kelamin *</label>
                             <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required type="text" placeholder='Silahkan masukkan jenis_kelamin anda' value="<?= old('jenis_kelamin'); ?>">
                                 <option value="" selected disabled>Pilih</option>
                                 <option value="laki-laki">Laki-Laki</option>
                                 <option value="perempuan">Perempuan</option>
                             </select>
                             <?php if ($validation->getError('jenis_kelamin')) : ?>
                                 <div class='text text-danger mt-2'>
                                     <?= $error = $validation->getError('jenis_kelamin'); ?>
                                 </div>
                             <?php endif ?>
                         </div>
                     </div>
                     <div class="col-lg-6 mt-2">
                         <div class="form-group">
                             <label class="label-control" for="no_hp">No Hp *</label>
                             <input class="form-control" name="no_hp" id="no_hp" required type="text" minlength="10" maxlength="16" placeholder='Silahkan masukkan No Hp anda' value="<?= old('no_hp'); ?>" />
                             <?php if ($validation->getError('no_hp')) : ?>
                                 <div class='text text-danger mt-2'>
                                     <?= $error = $validation->getError('no_hp'); ?>
                                 </div>
                             <?php endif ?>
                         </div>
                     </div>
                     <div class="col-lg-6 mt-2">
                         <label for="jenis">Pilih Jenis Pengajuan *</label>
                         <?= form_dropdown('jenis_pengajuan', $options, '', ['id' => 'jenis', 'class' => 'form-control', "required" => "required", 'values' => old('jenis_pengajuan')]); ?>
                         <?php if ($validation->getError('jenis_pengajuan')) : ?>
                             <div class='text text-danger mt-2'>
                                 <?= $error = $validation->getError('jenis_pengajuan'); ?>
                             </div>
                         <?php endif ?>
                     </div>
                     <div class="col-lg-12 mt-2">
                         <label for="file">File Berkas/Lampiran <sup class="text-danger">*PDF Recommended! | Max 5MB</sup></label>
                         <?= form_upload(['name' => 'file', 'id' => 'file', 'class' => 'form-control', "required" => "required"]) ?>
                         <?php if ($validation->getError('file')) : ?>
                             <div class='text text-danger mt-2'>
                                 <?= $error = $validation->getError('file'); ?>
                             </div>
                         <?php endif ?>
                     </div>
                 </div>
                 <hr>
                 <small>
                     <p class="text-danger">PENTING!! Syarat Harus Terpenuhi, Jika Tidak Pengajuan Tidak Diproses!</p>
                     <div id="syarat" class="text-danger">
                     </div>
                 </small>
                 <hr>
                 <div class="row mt-2">
                     <div class="col-lg-4">
                         <button type="submit" class="btn btn-block btn-primary">KIRIM PERMOHONAN</button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
     <!-- End Of Formulir Pengajuan -->



 </div>
 <!-- /.container-fluid -->



 <!-- Persyaratan -->
 <script>
     $('#jenis').change(function() {
         var e = document.getElementById("jenis");
         var jenisSurat = e.value;
         console.log(jenisSurat)

         // Syarat Pengajuan

         // Kartu Keluarga

         const KKB = ['KTP', 'Surat Pindah dari daerah asal', 'FC Buku Nikah', 'Surat Pengantar/Keterangan RT & RW']
         const KKU = ['Kartu Keluarga Lama', 'Surat Pengantar/Keterangan RT & RW', 'FC Akta Cerai (Bagi Janda/Duda)']
         //Kartu Tanda Penduduk
         const KTPB = ['KK (Asli & FC)', 'Surat Pengantar/Keterangan RT & RW']
         const KTPU = ['KK (Asli & FC)', 'KTP', 'Surat Pengantar/Keterangan RT & RW']
         //Akta Kelahiran
         const AKB = ['KK (Asli & FC)','Surat Keterangan Lahir dari Dokter/Bidan/Penolong Kelahiran (asli)', 'Fotokopi KTP orang tua (Pelapor adalah ayah atau ibu kandung)', 'Fotokopi KTP dua orang saksi.','Surat Kuasa dari orang tua kandung apabila pelapor dikuasakan, disertai fokopi KTP penerima kuasa.']
         const AKU = ['KK (Asli & FC)','Akta Kelahiran Lama(Asli & FC)', 'Fotocopy salinan Penetapan Pengadilan Negeri tentang Ganti Nama yang dilegalisasi.','Fotocopy KTP + KSK.','Fotocopy akta perkawinan / nikah (bagi yang sudah menikah)']

         const showList = (surat) => {
             surat.forEach(item => {
                 $('#syarat').append(
                     `
                                <ul>
                                    <li>${item}</li>
                                </ul>
                                `
                 )
             });
         }

         if (jenisSurat == 'KKB') {
             $('#syarat').html('')
             showList(KKB)
         } else if (jenisSurat == 'KKU') {
             $('#syarat').html('')
             showList(KKU)
         } else if (jenisSurat == 'KTPB') {
             $('#syarat').html('')
             showList(KTPB)
         } else if (jenisSurat == 'KTPU') {
             $('#syarat').html('')
             showList(KTPU)
         } else if (jenisSurat == 'AKB') {
             $('#syarat').html('')
             showList(AKB)
         } else if (jenisSurat == 'AKU') {
             $('#syarat').html('')
             showList(AKU)
         } else {
             console.log('Nothing')
         }
     })
 </script>
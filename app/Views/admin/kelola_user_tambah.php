 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">User Baru</h1>

     <!-- Formulir User Baru -->
     <div class="card mb-4">
         <div class="card-header">
             Formulir User Baru
         </div>
         <div class="card-body">
             <?php if (session()->getFlashdata('success-form') == TRUE) : ?>
                 <?= session()->getFlashdata('success-form'); ?>
             <?php endif; ?>
             <form action="/kelola-user/tambah" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                 <div class="row">
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
                             <label class="label-control" for="username">username *</label>
                             <input class="form-control" name="username" id="username" required type="text" placeholder='Silahkan masukkan username anda' value="<?= old('username'); ?>" />
                             <?php if ($validation->getError('username')) : ?>
                                 <div class='text text-danger mt-2'>
                                     <?= $error = $validation->getError('username'); ?>
                                 </div>
                             <?php endif ?>
                         </div>
                     </div>


                     <div class="col-lg-6">
                         <div class="form-group">
                             <label class="label-control" for="email">email *</label>
                             <input class="form-control" name="email" id="email" required type="email" placeholder='Silahkan masukkan email anda' value="<?= old('email'); ?>" />
                             <?php if ($validation->getError('email')) : ?>
                                 <div class='text text-danger mt-2'>
                                     <?= $error = $validation->getError('email'); ?>
                                 </div>
                             <?php endif ?>
                         </div>
                     </div>

                     <div class="col-lg-6">
                         <div class="form-group">
                             <label class="label-control" for="password">password *</label>
                             <input class="form-control" name="password" id="password" required type="password" placeholder='Silahkan masukkan password anda'>
                             <?php if ($validation->getError('password')) : ?>
                                 <div class='text text-danger mt-2'>
                                     <?= $error = $validation->getError('password'); ?>
                                 </div>
                             <?php endif ?>
                         </div>
                     </div>

                     <div class="col-lg-6">
                         <div class="form-group">
                             <label class="label-control" for="password2">Konfirmasi Password *</label>
                             <input class="form-control" name="password2" id="password2" required type="password" placeholder='Silahkan masukkan ulang password anda'>
                             <?php if ($validation->getError('password2')) : ?>
                                 <div class='text text-danger mt-2'>
                                     <?= $error = $validation->getError('password2'); ?>
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
                             <label class="label-control" for="tempat">Tempat Tanggal Lahir *</label>
                             <div class="row">
                                 <div class="col-lg-6">
                                     <input class="form-control" name="tempat" id="tempat" required type="text" placeholder='Tempat' value="<?= old('tempat'); ?>" />
                                     <?php if ($validation->getError('tempat')) : ?>
                                         <div class='text text-danger mt-2'>
                                             <?= $error = $validation->getError('tempat'); ?>
                                         </div>
                                     <?php endif ?>
                                 </div>

                                 <div class="col-lg-6">
                                     <input class="form-control" name="tanggal_lahir" id="tanggal_lahir" required type="date" placeholder='Silahkan masukkan Tanggal Lahir anda' value="<?= old('tanggal_lahir'); ?>" />
                                     <?php if ($validation->getError('tanggal_lahir')) : ?>
                                         <div class='text text-danger mt-2'>
                                             <?= $error = $validation->getError('tanggal_lahir'); ?>
                                         </div>
                                     <?php endif ?>
                                 </div>

                             </div>
                         </div>
                     </div>

                     <div class="col-lg-12 mt-2">
                         <label for="foto">Foto<sup class="text-danger">Max 3MB</sup></label>
                         <?= form_upload(['name' => 'foto', 'id' => 'foto', 'class' => 'form-control']) ?>
                         <?php if ($validation->getError('foto')) : ?>
                             <div class='text text-danger mt-2'>
                                 <?= $error = $validation->getError('foto'); ?>
                             </div>
                         <?php endif ?>
                     </div>
                 </div>
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
         const KKB = ['KK Lama (Asli & FC)', 'KTP', 'Surat Pindah dari daerah asal', 'FC Buku Nikah', 'Surat Pengantar/Keterangan RT & RW']
         const KKU = ['FC KK Calon Suami & Istri', 'FC KTP Calon Suami & Istri', 'Pas Foto 3x4 Calon Suami & Istri', 'Surat Pengantar/Keterangan RT & RW', 'FC Akta Cerai (Bagi Janda/Duda)']
         //Kartu Tanda Penduduk
         const KTPB = ['KK (Asli & FC)', 'KTP', 'Surat Keterangan Kelahiran dari Bidan/RS (Jika ada/ Optional)', 'Surat Pengantar/Keterangan RT & RW']
         const KTPU = ['KK (Asli & FC)', 'KTP', 'Surat Keterangan Kematian (Jika ada/Optional)', 'Surat Pengantar/Keterangan RT & RW']
         //Akta Kelahiran
         const AKB = ['KK (Asli & FC)', 'Surat Pengantar/Keterangan RT & RW', 'Data alamat daerah tujuan']
         const AKU = ['KK (Asli & FC)', 'Surat Pengantar/Keterangan RT & RW', 'Data alamat daerah asal']

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
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


             <form action="/surat_online/ajukan" id="ajukanSurat" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                 <div class="row">
                     <div class="col-lg-6">
                         <div class="form-group">
                             <label class="label-control" for="nik">NIK *</label>
                             <input class="form-control" name="nik" id="nik" required type="text" minlength="16" maxlength="16" placeholder='Silahkan masukkan NIK anda' value="<?= old('nik'); ?>" />
                         </div>
                     </div>
                     <div class="col-lg-6">
                         <div class="form-group">
                             <label class="label-control" for="nama">Nama *</label>
                             <input class="form-control" name="nama" id="nama" required type="text" placeholder='Silahkan masukkan nama anda' value="<?= old('nama'); ?>" />
                         </div>
                     </div>
                     <div class="col-lg-6">
                         <div class="form-group">
                             <label class="label-control" for="alamat">Alamat *</label>
                             <input class="form-control" name="alamat" id="alamat" required type="text" placeholder='Silahkan masukkan alamat anda' value="<?= old('alamat'); ?>" />
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
                         </div>
                     </div>
                     <div class="col-lg-6 mt-2">
                         <div class="form-group">
                             <label class="label-control" for="no_hp">No Hp *</label>
                             <input class="form-control" name="no_hp" id="no_hp" required type="text" minlength="10" maxlength="16" placeholder='Silahkan masukkan No Hp anda' value="<?= old('no_hp'); ?>" />
                         </div>
                     </div>
                     <div class="col-lg-6 mt-2">
                         <label for="jenis">Pilih Jenis Pengajuan *</label>
                         <?= form_dropdown('jenis_surat', $options, '', ['id' => 'jenis', 'class' => 'form-control', "required" => "required", 'values' => old('jenis_surat')]); ?>
                     </div>
                     <div class="col-lg-12 mt-2">
                         <label for="file">File Berkas/Lampiran <sup class="text-danger">*PDF Recommended! | Max 5MB</sup></label>
                         <?= form_upload(['name' => 'file', 'id' => 'file', 'class' => 'form-control', "required" => "required"]) ?>
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

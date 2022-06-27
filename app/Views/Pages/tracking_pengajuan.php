 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Tracking Pengajuan</h1>

     <!-- Formulir Pengajuan -->
     <div class="card mb-4">
         <div class="card-header">
             Formulir Tracking Pengajuan
         </div>
         <div class="card-body">

                 <?php if (session()->getFlashdata('message') == TRUE) : ?>
                     <?= session()->getFlashdata('message'); ?>
                 <?php endif; ?>
                 <div class="text-center">
                     <h5 class="section-subheading text-muted">Masukkan ID Pengajuan untuk <b>Track</b>:</h5>
                 </div>
                 <div class="text-justify pl-5 pr-5">
                     <div class="row justify-content-center">
                         <div class="col-12 col-md-10 col-lg-8">
                             <?= form_open('/tracking-pengajuan', 'id="tracking", class=""') ?>
                             <div class="row align-items-center">
                                 <!--end of col-->
                                 <div class="col">
                                     <input class="form-control form-control-lg form-control-borderless" type="search" name="trackid" placeholder="Masukkan ID Pengajuan Anda" required>
                                 </div>
                                 <!--end of col-->
                                 <div class="col-auto">
                                     <button class="btn btn-lg btn-success" type="submit">Cari</button>
                                 </div>
                                 <!--end of col-->
                             </div>
                             <?= form_close() ?>
                         </div>
                         <!--end of col-->
                     </div>
                 </div>
             
         </div>
         <!-- /.container-fluid -->
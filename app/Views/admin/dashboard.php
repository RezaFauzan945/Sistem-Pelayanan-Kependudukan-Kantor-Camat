 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
     </div>

     <!-- Content Row -->
     <div class="row ">

         <div class="col-lg-6">

             <!-- Pengajuan Pending Card  -->
             <div class="row">
                 <div class="col-lg-12 col-md-6 mb-4">
                     <div class="card border-left-primary shadow h-100 py-2">
                         <div class="card-body">
                             <div class="row no-gutters align-items-center">
                                 <div class="col mr-2">
                                     <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                         Pengajuan Belum Diproses</div>
                                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pie_charts['pending']; ?></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <!-- Pengajuan Procceced Card  -->
                 <div class="col-lg-12 col-md-6 mb-4">
                     <div class="card border-left-danger shadow h-100 py-2">
                         <div class="card-body">
                             <div class="row no-gutters align-items-center">
                                 <div class="col mr-2">
                                     <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                         Pengajuan Ditolak</div>
                                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pie_charts['ditolak']; ?></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="row">
                 <!-- Pengajuan Procceced Card  -->
                 <div class="col-lg-12 col-md-6 mb-4">
                     <div class="card border-left-warning shadow h-100 py-2">
                         <div class="card-body">
                             <div class="row no-gutters align-items-center">
                                 <div class="col mr-2">
                                     <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                         Pengajuan Dalam Proses</div>
                                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pie_charts['dalam_proses'] + $pie_charts['diterima']; ?></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <!-- Pengajuan Pending Card  -->
                 <div class="col-lg-12 col-md-6 mb-4">
                     <div class="card border-left-success shadow h-100 py-2">
                         <div class="card-body">
                             <div class="row no-gutters align-items-center">
                                 <div class="col mr-2">
                                     <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                         Pengajuan Selesai</div>
                                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pie_charts['selesai']; ?></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

         </div>

         <div class="col-xl-6 col-lg-6">
             <div class="card shadow ">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">Pengajuan</h6>
                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                     <div>
                         <canvas id="pengajuan"></canvas>
                     </div>
                     <hr>
                 </div>
             </div>
         </div>

     </div>

     <div class="row mt-2 justify-content-around">

         <div class="card col-lg-6 col-md-12 shadow">
             <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary">Perkembangan Jumlah Masyarakat Tercatat</h6>
             </div>
             <div class="card-body">
                 <canvas id="masyarakatGrowth"></canvas>
                 <hr>
             </div>
         </div>

         <div class="card col-lg-6 col-md-12 shadow">
             <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary">Perkembangan Jumlah Pengajuan Tercatat</h6>
             </div>
             <div class="card-body">
                 <canvas id="pengajuanGrowth"></canvas>
                 <hr>
             </div>
         </div>

     </div>
 </div>


 <!--chart pengajuan -->
 <script>
     const ctx = document.getElementById("pengajuan");
     const pengajuan = new Chart(ctx, {
         type: "pie",
         data: {
             labels: ['Pending', 'Ditolak', 'Diterima', 'Dalam Proses', 'Selesai', ],
             datasets: [{
                 label: "Pengajuan",
                 data: [<?php foreach ($pie_charts as $pie) {
                            echo $pie . ',';
                        } ?>],
                 backgroundColor: [
                     "rgba(0, 255, 255, 1)",
                     "rgba(255, 0, 0, 1)",
                     "rgba(0, 0, 255, 1)",
                     "rgba(255, 255, 0, 1)",
                     "rgba(0, 255, 0, 1)",
                 ],
             }, ],
         },
     });

     const ctx1 = document.getElementById("masyarakatGrowth");
     const masyarakatGrowth = new Chart(ctx1, {
         type: 'line',
         data: {
             labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
             datasets: [{
                 label: 'Perkembangan Masyarakat Tercatat Tahun <?= date('Y'); ?>',
                 data: [<?php foreach ($masyarakat_baru as $mb) {
                            echo $mb . ',';
                        } ?>],
                 backgroundColor: [
                     "rgba(0, 180, 255, 1)",
                 ],
             }, ],
         },
     });

     const ctx2 = document.getElementById("pengajuanGrowth");
     const pengajuanGrowth = new Chart(ctx2, {
         type: 'line',
         data: {
             labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
             datasets: [{
                 label: 'Perkembangan Pengajuan Tercatat Tahun <?= date('Y'); ?>',
                 data: [<?php foreach ($pengajuan as $p) {
                            echo $p . ',';
                        } ?>],
                 backgroundColor: [
                     "rgba(0, 180, 255, 1)",
                 ],
             }, ],
         },
     });
 </script>
</div>
<!-- End of Main Content -->
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Sistem Informasi Pelayanan Masyarakat Kantor Camat 2022</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>/assets/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>/assets/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>/assets/js/sb-admin-2.min.js"></script>

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

</body>

</html>
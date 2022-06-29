<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelola Pengajuan</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Pengajuan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Pengajuan</th>
                            <th>Nama(NIK)</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Jenis Kelamin</th>
                            <th>Kategori Pengajuan</th>
                            <th>KTP</th>
                            <th>Pas Foto</th>
                            <th>Surat Keterangan Dari Desa</th>
                            <th>Kartu Keluarga</th>
                            <th>Akta Kelahiran</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach ($pengajuan as $data) : ?>
                                <td><?= $data['id_pengajuan']; ?></td>
                                <td><?= $data['id_masyarakat']; ?></td>
                                <td><?= $data['kategori']; ?></td>
                                <td><?= $data['ktp']; ?></td>
                                <td><?= $data['pas_foto']; ?></td>
                                <td><?= $data['surat_keterangan_dari_desa']; ?></td>
                                <td><?= $data['kk']; ?></td>
                                <td><?= $data['akta_kelahiran']; ?></td>
                                <td><?= $data['tanggal_pengajuan']; ?></td>
                            <?php endforeach ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
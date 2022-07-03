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
                <table class="table datatable table-bordered" id="table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Detail</th>
                            <th>ID Pengajuan</th>
                            <th>Nama(NIK)</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Jenis Kelamin</th>
                            <th>Kategori Pengajuan</th>
                            <th>Lampiran</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pengajuan as $data) : ?>
                            <tr>
                                <td><i class="fa-solid fa-info"></i></td>
                                <td><?= $data['id_pengajuan']; ?></td>
                                <td><?= $data['nama'] . '(' . $data['NIK'] . ')'; ?></td>
                                <td><?= $data['alamat']; ?></td>
                                <td><?= $data['no_hp']; ?></td>
                                <td><?= $data['jenis_kelamin']; ?></td>
                                <td>
                                    <?php
                                    if ($data['kategori'] == 'KKB') {
                                        echo 'Pengajuan Kartu Keluarga Baru';
                                    } else if ($data['kategori'] == 'KKU') {
                                        echo 'Pengajuan Perbarui Kartu Keluarga';
                                    } else if ($data['kategori'] == 'AKU') {
                                        echo 'Pengajuan Perbarui Akta Kelahiran';
                                    } else if ($data['kategori'] == 'AKB') {
                                        echo 'Pengajuan Akta Kelahiran Baru';
                                    } else if ($data['kategori'] == 'AKB') {
                                        echo 'Pengajuan Akta Kelahiran Baru';
                                    } else if ($data['kategori'] == 'KTPB') {
                                        echo 'Pengajuan Kartu Tanda Penduduk Baru';
                                    } else if ($data['kategori'] == 'KTPU') {
                                        echo 'Pengajuan Perbarui Kartu Tanda Penduduk';
                                    }
                                    ?>
                                </td>
                                <td><a href="<?= base_url(); ?>/assets/uploads/berkas/<?= $data['file']; ?>"><i class="fa-solid fa-file-export"></i></a></td>
                                <td><?= $data['tanggal_pengajuan']; ?></td>
                                <td>
                                    <?php
                                    if ($data['status'] == 1) {
                                        echo ' Pending ';
                                    } else if ($data['status'] == 2) {
                                        echo ' Diterima ';
                                    } else if ($data['status'] == 3) {
                                        echo ' Ditolak ';
                                    } else if ($data['status'] == 4) {
                                        echo ' Dalam Proses ';
                                    } else if ($data['status'] == 5) {
                                        echo ' Selesai ';
                                    }
                                    ?>
                                    <button class="btn btn-simple btn-success btn-icon" data-toggle="modal" data-target="#statusPengajuan<?= $data['id_pengajuan']; ?>">Update Status</button>
                                    <button class="btn btn-simple btn-danger btn-icon" data-toggle="modal" data-target="#hapusPengajuan<?= $data['id_pengajuan']; ?>">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- large modal update  -->
<?php foreach ($pengajuan as $key) : ?>
    <div class="modal fade" id="statusPengajuan<?= $key['id_pengajuan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa-solid fa-xmark"></i></button>
                </div>

                <form method="post" action=/pengajuan/update_status/<?= $key['id_pengajuan']; ?>>
                    <div class="modal-body text-center">
                        <h5>Update Status Pengajuan ID: <?= $key['id_pengajuan'] ?>? </h5>
                        <label for="status">Pilih Status</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" value="1" <?= $key['status'] == '1' ? 'checked="true"' : '' ?>><span class="circle"></span><span class="check"></span> <?= $status['1'] ?>
                            </label>
                            <label>
                                <input type="radio" name="status" value="3" <?= $key['status'] == '2' ? 'checked="true"' : '' ?>><span class="circle"></span><span class="check"></span> <?= $status['2'] ?>
                            </label>
                            <label>
                                <input type="radio" name="status" value="2" <?= $key['status'] == '3' ? 'checked="true"' : '' ?>><span class="circle"></span><span class="check"></span> <?= $status['3'] ?>
                            </label>
                            <label>
                                <input type="radio" name="status" value="4" <?= $key['status'] == '4' ? 'checked="true"' : '' ?>><span class="circle"></span><span class="check"></span> <?= $status['4'] ?>
                            </label>

                            <label>
                                <input type="radio" name="status" value="5" <?= $key['status'] == '5' ? 'checked="true"' : '' ?>><span class="circle"></span><span class="check"></span> <?= $status['5'] ?>
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-simple" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-info btn-simple">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!--    end large modal update  -->

<!-- small modal hapus  -->
<?php foreach ($pengajuan as $key) : ?>
    <div class="modal fade" id="hapusPengajuan<?= $key['id_pengajuan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-small ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa-solid fa-xmark"></i></button>
                </div>

                <form method="post" action="/pengajuan/hapusPengajuan/<?= $key['id_pengajuan']; ?>">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <div class="modal-body text-center">
                        <h5>Apakah anda yakin untuk menghapus pengajuan ini? </h5>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-simple" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-success btn-simple">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!--    end small modal hapus  -->
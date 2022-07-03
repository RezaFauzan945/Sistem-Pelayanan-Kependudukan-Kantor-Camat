<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelola Masyarakat</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Masyarakat</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table datatable table-bordered" id="table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Detail</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Jenis Kelamin</th>
                            <th>Tercatat Pada</th>
                            <th>Terakhir diubah Pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($masyarakat as $data) : ?>
                            <tr>
                                <td><i class="fa-solid fa-info"></i></td>
                                <td><?= $data['NIK']; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['alamat']; ?></td>
                                <td><?= $data['no_hp']; ?></td>
                                <td><?= $data['jenis_kelamin']; ?></td>
                                <td><?= $data['created_at']; ?></td>
                                <td><?= $data['updated_at']; ?></td>
                                <td>
                                    <button class="btn btn-simple btn-danger btn-icon" data-toggle="modal" data-target="#hapusMasyarakat<?= $data['id_masyarakat']; ?>">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- small modal hapus  -->
<?php foreach ($masyarakat as $key) : ?>
    <div class="modal fade" id="hapusMasyarakat<?= $key['id_masyarakat']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-small ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa-solid fa-xmark"></i></button>
                </div>

                <form method="post" action="/masyarakat/hapusMasyarakat/<?= $key['id_masyarakat']; ?>">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <div class="modal-body text-center">
                        <h5>Apakah anda yakin untuk menghapus Masyarakat ini? </h5>
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
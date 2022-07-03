<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelola User</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List User</h6>
        </div>
        <div class="card-body">
            <a href="/kelola-user/tambah" class="btn btn-primary mb-4">Tambah User</a>
            <div class="table-responsive">
                <table class="table datatable table-bordered" id="table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Detail</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Tanggal Lahir</th>
                            <th>Foto</th>
                            <th>Role</th>
                            <th>Tercatat Pada</th>
                            <th>Terakhir diubah Pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $data) : ?>
                            <tr>
                                <td><i class="fa-solid fa-info"></i></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['username']; ?></td>
                                <td><?= $data['email']; ?></td>
                                <td><?= $data['alamat']; ?></td>
                                <td><?= $data['jenis_kelamin']; ?></td>
                                <td><?= $data['tempat_tanggal_lahir']; ?></td>
                                <td><a href="<?= base_url(); ?>/assets/uploads/img/profile/<?= $data['foto']; ?>">Lihat Foto</a></td>
                                <td><?= $data['role']; ?></td>
                                <td><?= $data['created_at']; ?></td>
                                <td><?= $data['updated_at']; ?></td>
                                <td>
                                    <!-- <?php if (session()->get('role') == 'admin') : ?>
                                    <a href="/kelola-user/edit/<?= $data['id']; ?>" class="btn btn-success">Update</a>
                                    <?php endif ?> -->
                                    <button class="btn btn-simple btn-danger btn-icon" data-toggle="modal" data-target="#hapusUser<?= $data['id']; ?>">Delete</button>
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
<?php foreach ($users as $key) : ?>
    <div class="modal fade" id="hapusUser<?= $key['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-small ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa-solid fa-xmark"></i></button>
                </div>

                <form method="post" action="/user/hapusUser/<?= $key['id']; ?>">
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
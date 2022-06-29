<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Profile</h1>
    <?php if (session()->getFlashdata('success') == TRUE) : ?>
        <div class="alert alert-success">
            <span><?= session()->getFlashdata('success'); ?></span>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error') == TRUE) : ?>
        <div class="alert alert-danger">
            <span><?= session()->getFlashdata('error'); ?></span>
        </div>
    <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <img class="mx-auto rounded-circle bg-dark" src="<?= base_url(); ?>/assets/uploads/img/profile/<?= $user['foto']; ?>" alt="<?= $user['foto']; ?>" height="200px" width="200px">
            </div>
            <form action="<?= base_url(); ?>/profile/<?= $user['id']; ?>" method="POST" enctype="multipart/form-data">
                <div class="row mx-auto">
                    <div class="col-lg-6 col-sm-12">
                        <label for="username" class="form-label">Username</label>
                        <input class='form-control' id="username" type="text" value="<?= $user['username']; ?>" disabled required>
                    </div>

                    <div class="col-lg-6 col-sm-12">
                        <label for="email" class="form-label">Email</label>
                        <input class='form-control' id="email" type="text" value="<?= $user['email']; ?>" disabled required>
                    </div>

                    <div class="col-lg-6 col-sm-12 mt-2">
                        <label for="password" class="form-label">Password Baru</label>
                        <input class='form-control' id="password" name="password" type="password" minlength="8">
                        <?php if ($validation->getError('password')) : ?>
                            <div class='text text-danger mt-2'>
                                <?= $error = $validation->getError('password'); ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <div class="col-lg-6 col-sm-12 mt-2">
                        <label for="password_lama" class="form-label">Password Lama</label>
                        <input class='form-control' id="password_lama" name="password_lama" type="password">
                        <?php if ($validation->getError('password_lama')) : ?>
                            <div class='text text-danger mt-2'>
                                <?= $error = $validation->getError('password_lama'); ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <div class="col-lg-6 col-sm-12 mt-2">
                        <label for="nama" class="form-label">Nama</label>
                        <input class='form-control' id="nama" name="nama" type="text" value="<?= $user['nama']; ?>" required>
                        <?php if ($validation->getError('nama')) : ?>
                            <div class='text text-danger mt-2'>
                                <?= $error = $validation->getError('nama'); ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="col-lg-6 col-sm-12 mt-2">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class='form-control' id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="" disabled>Pilih</option>
                            <option value='laki-laki' <?= $user['jenis_kelamin'] == 'laki-laki' ? 'selected' : '' ?>>Laki-Laki</option>
                            <option value='perempuan' <?= $user['jenis_kelamin'] == 'perempuan' ? 'selected' : '' ?>>Perempuan</option>          
                        </select>
                        <?php if ($validation->getError('jenis_kelamin')) : ?>
                            <div class='text text-danger mt-2'>
                                <?= $error = $validation->getError('jenis_kelamin'); ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <div class="col-lg-6 col-sm-12 mt-2">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class='form-control' id="alamat" name="alamat" type="text" required><?= $user['alamat']; ?></textarea>
                        <?php if ($validation->getError('alamat')) : ?>
                            <div class='text text-danger mt-2'>
                                <?= $error = $validation->getError('alamat'); ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <div class="col-lg-6 col-sm-12 mt-2">
                        <label for="tempat_tanggal_lahir" class="form-label">Tempat Tanggal Lahir</label>
                        <input class='form-control' id="tempat_tanggal_lahir" name="tempat_tanggal_lahir" type="text" value="<?= $user['tempat_tanggal_lahir']; ?>" required>
                        <?php if ($validation->getError('tempat_tanggal_lahir')) : ?>
                            <div class='text text-danger mt-2'>
                                <?= $error = $validation->getError('tempat_tanggal_lahir'); ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <div class="col-lg-6 col-sm-12 mt-4">
                        <label class="custom-file-label mt-3 ml-2" id="foto-label" for="foto">Ganti Foto</label>
                        <input type="file" class="custom-file-input mt-4" id="foto" name='foto' aria-describedby="foto">
                        <?php if ($validation->getError('foto')) : ?>
                            <div class='text text-danger mt-2'>
                                <?= $error = $validation->getError('foto'); ?>
                            </div>
                        <?php endif ?>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
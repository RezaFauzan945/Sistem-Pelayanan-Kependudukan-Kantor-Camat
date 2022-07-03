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
            <div class="row justify-content-center mb-4">
                <!-- Button trigger modal -->
                <a data-toggle="modal" href="#fotoProfileModal">
                    <img class="mx-auto rounded-circle bg-dark" id="img-profile" src="<?= base_url(); ?>/assets/uploads/img/profile/<?= $user['foto']; ?>" alt="<?= $user['foto']; ?>" height="200px" width="200px">
                </a>

            </div>
            <form action="<?= base_url(); ?>/ganti-password/<?= $user['id']; ?>" method="POST" enctype="multipart/form-data">
                <div class="row mx-auto">
                    <div class="col-lg-6 col-sm-12 mt-2">
                        <label for="password" class="form-label">Password Baru</label>
                        <input required minlength="8" class='form-control' id="password" name="password" type="password" minlength="8">
                        <?php if ($validation->getError('password')) : ?>
                            <div class='text text-danger mt-2'>
                                <?= $error = $validation->getError('password'); ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <div class="col-lg-6 col-sm-12 mt-2">
                        <label for="password_lama" class="form-label">Password Lama</label>
                        <input required class='form-control' id="password_lama" name="password_lama" type="password">
                        <?php if ($validation->getError('password_lama')) : ?>
                            <div class='text text-danger mt-2'>
                                <?= $error = $validation->getError('password_lama'); ?>
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


<!-- Foto Profile Modal -->
<div class="modal fade" id="fotoProfileModal" tabindex="-1" role="dialog" aria-labelledby="fotoProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fotoProfileModalLabel">Foto Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="mx-auto" id="img-profile" src="<?= base_url(); ?>/assets/uploads/img/profile/<?= $user['foto']; ?>" alt="<?= $user['foto']; ?>" height="100%" width="100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
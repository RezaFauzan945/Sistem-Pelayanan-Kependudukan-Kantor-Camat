<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h2 class="h4 text-gray-900 mb-4">Selamat Datang di Sistem Informasi Pelayanan Masyarakat Kependudukan</h2>
                                    <p>Silahakan Masuk Terlebih Dahulu</p>
                                </div>
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
                                <form action="<?= base_url(); ?>/login" method="POST" class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="Username" placeholder="Masukan Username Anda" name="username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Masuk
                                    </button>
                                </form>
                                <hr>
                                <!-- <div class="text-center">
                                    <a class="small" href="<?= base_url(); ?>/pendaftaran">Buat Akun!</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
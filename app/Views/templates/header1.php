<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/progress_bar.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/js/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/assets/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/assets/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url(); ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->

    <script src="<?= base_url(); ?>/assets/js/chart/chart.js/Chart.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>/assets/js/datatables/jquery.dataTables.js"></script>
    <script src="<?= base_url(); ?>/assets/js/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>/assets/js/datatables/datatables.js"></script>
    <script src="https://kit.fontawesome.com/7a310f1e76.js" crossorigin="anonymous"></script>

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center mt-4 mb-4" href="<?= base_url(); ?>/">
                <div class="sidebar-brand-icon">
                    <i class="far fa-id-card text-light"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Sistem Pelayanan Kependudukan</div>
            </a>
            <?php if (session()->get('id') != null) : ?>
                <!-- Heading -->
                <div class="sidebar-heading">
                    Dashboard
                </div>


                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>/dashboard">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>

                    <!-- Divider -->
                    <hr class="sidebar-divider">
                </li>


                <!-- Heading -->
                <div class="sidebar-heading">
                    Profile
                </div>

                <!-- Nav Item - Profile -->
                <?php if (session()->get('id') != null) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseProfile" aria-expanded="true" aria-controls="collapseProfile">
                            <i class="fas fa-fw fa-user"></i>
                            <span>Profile</span>
                        </a>
                        <div id="collapseProfile" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Pengajuan :</h6>
                                <?php if (session()->get('id') != null) : ?>
                                    <a class="collapse-item" href="<?= base_url(); ?>/profile/<?= session()->get('id'); ?>">Edit Profile</a>
                                    <a class="collapse-item" href="<?= base_url(); ?>/ganti-password/<?= session()->get('id'); ?>">Ganti Password</a>
                                <?php endif ?>
                            </div>
                        </div>
                    </li>
                <?php endif ?>

                <?php if (session()->get('role') == 'admin') : ?>
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    User
                </div>

                <!-- Nav Item - Data User -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
                            <i class="fas fa-fw fa-user"></i>
                            <span>Data User</span>
                        </a>
                        <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Pengajuan :</h6>
                                <?php if (session()->get('id') != null) : ?>
                                    <a class="collapse-item" href="<?= base_url(); ?>/kelola-user/">Data User</a>
                                <?php endif ?>
                            </div>
                        </div>
                    </li>
                <?php endif ?>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Kependudukan
                </div>

                <!-- Nav Item - Data Penduduk -->
                <?php if (session()->get('id') != null) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePenduduk" aria-expanded="true" aria-controls="collapsePenduduk">
                        <i class="fa-solid fa-users-rectangle"></i>
                            <span>Data Penduduk</span>
                        </a>
                        <div id="collapsePenduduk" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Pengajuan :</h6>
                                <?php if (session()->get('id') != null) : ?>
                                    <a class="collapse-item" href="<?= base_url(); ?>/kelola-penduduk/">Data Penduduk</a>
                                <?php endif ?>
                            </div>
                        </div>
                    </li>
                <?php endif ?>

                <!-- Divider -->
                <hr class="sidebar-divider">
            <?php endif ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                <small class="text-bold">Pengajuan</small>
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pengajuan Baru</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pengajuan :</h6>
                        <?php if (session()->get('id') != null) : ?>
                            <a class="collapse-item" href="<?= base_url(); ?>/kelola-pengajuan">Kelola Pengajuan</a>
                        <?php endif ?>
                        <a class="collapse-item" href="<?= base_url(); ?>/form-pengajuan">Formulir Pengajuan Baru</a>
                        <a class="collapse-item" href="<?= base_url(); ?>/tracking-pengajuan">Tracking Pengajuan</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto w-100">
                        <li class="mt-2 mr-auto">
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
                        </li>
                        <?php if (session()->get('id') != null) : ?>
                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama']; ?></span>
                                    <img class="img-profile rounded-circle" src="<?= base_url(); ?>/assets/uploads/img/profile/<?= $user['foto']; ?>">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="<?= base_url(); ?>/profile/<?= $user['id']; ?>">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        <?php endif ?>

                    </ul>

                </nav>
                <!-- End of Topbar -->
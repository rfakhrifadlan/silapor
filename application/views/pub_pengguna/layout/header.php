<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= $title; ?></title>

    <link href=<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?> rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href=<?= base_url('assets/css/sb-admin-2.min.css') ?> rel="stylesheet">
    <link href=<?= base_url('assets/css/styles.css') ?> rel="stylesheet">
    <link href=<?= base_url('assets/css/sweetalert2.min.css') ?> rel="stylesheet">
    <link href=<?= base_url('assets/css/fileinput.min.css') ?> rel="stylesheet">
    <link href=<?= base_url('assets/datepicker/css/bootstrap-datepicker.min.css') ?> rel="stylesheet">
    <link rel="shortcut icon" type="image/jpg" href="<?= base_url('assets/img/lambang.png') ?>" />
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/') ?>">
                <div class="sidebar-brand-icon">
                    <img src="<?= base_url('assets/img/lambang.png') ?>" height="50" alt="">
                </div>
                <div class="sidebar-brand-text ml-3">Silapor</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item  <?php echo ($this->uri->segment(2) == 'index') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('/') ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <li class="nav-item <?php echo ($this->uri->segment(2) == 'profile') ? 'active' : '' ?>">
                <a class="nav-link collapsed" href="<?= base_url('pengguna/profile') ?>">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Profile</span>
                </a>

            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-info-circle"></i>
                    <span>Tentang</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                    <i class="fas fa-sign-out-alt "></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
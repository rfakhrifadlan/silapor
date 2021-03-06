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

            <?= $btn ?>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?= ucfirst($ses_akun['nama']) ?> </span>
                        <img class="img-profile rounded-circle" src="<?= ($ses_akun['profile'] == null) ? base_url('assets/img/profile/default.png') : base_url('assets/img/profile/' . $ses_akun['profile'])  ?>">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= base_url('pengguna/profile') ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>

        <!-- Begin Page Content -->

        <div class="container-fluid">
            <?php if (!empty($d_surat)) { ?>
                <div class="row">
                    <div class="col-xl mb-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="utilitas-rekap d-flex align-items-center">
                                    <p class="m-0 mr-3 text-rekap">Silahkan hubungi petugas apabila proses belum ada perubahan / tanggapan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php foreach ($d_surat as $ds) : ?>
                    <div class="row">
                        <div class="col-xl mb-4">
                            <div class="card <?php echo ($ds['proses'] == 'terkirim') || ($ds['proses'] == 'diterima') || ($ds['proses'] == 'proses') || ($ds['proses'] == 'dievaluasi') ? 'border-left-primary' : (($ds['proses'] == 'ditolak') ? 'border-left-danger' : (($ds['proses'] == 'selesai') ? 'border-left-success' : 'border-left-primary')); ?> shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center pl-3 pr-3">
                                        <div class="col">
                                            <div class="info-pinjam">
                                                <div class="nolap">
                                                    <div class="mb-0 font-weight-bold text-gray-800">
                                                        No Lap. <?php echo $ds['no_lp'] ?>
                                                    </div>
                                                </div>
                                                <p class="mb-2"><?php echo ($ds['nberkas'] == null) ? 'Seleksi berkas' : 'Surat ' . $ds['nberkas'] ?> - Dikirim pada tanggal <?php echo $ds['tglkirim'] ?></p>
                                                <div class="mr-3 info_proses <?php echo ($ds['proses'] == 'terkirim') || ($ds['proses'] == 'diterima') || ($ds['proses'] == 'proses') || ($ds['proses'] == 'dievaluasi') ? 'bg-primary' : (($ds['proses'] == 'ditolak') ? 'bg-danger' : (($ds['proses'] == 'selesai') ? 'bg-success' : 'border-left-primary')); ?>"><i class="fas fa-circle mr-2" id="picon"></i><?php echo $ds['proses'] ?></div>
                                            </div>
                                        </div>
                                        <div class="col-auto d-flex align-items-center">
                                            <div class="mr-4">Respon <?php echo ($ds['tgl_proses'] != null) ? $ds['tgl_proses'] : '-' ?></div>
                                            <button class="btn btn-primary btn-buka mr-3" id="<?php echo $ds['idsttlp'] ?>"><i class="fas fa-envelope-open-text"></i> Buka</button>
                                            <button class="btn btn-danger btn-hapus-surat" <?php echo ($ds['proses'] == 'selesai' || $ds['proses'] == 'ditolak') ? 'id="' . $ds['idsttlp'] . '"' : 'disabled' ?>><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
            } else { ?>
                <div class="row ">
                    <div class="col-xl mb-4">
                        <div class="empty-box">
                            <p>Data kosong</p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- /.container-fluid -->
        <div class="row justify-content-center">
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; SPKT - Pakualaman 2021</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>
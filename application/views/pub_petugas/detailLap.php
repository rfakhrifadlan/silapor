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

            <?= $heading ?>
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
            <div class="row">
                <div class="col-xl mb-4">
                    <div class="card shadow h-100 py-2">
                        <div class="card-body">
                            <ul class="bs4-order-tracking">
                                <li class="step <?= ($dl['idps'] >= 1) ? 'active' : '' ?>">
                                    <div><i class="fas fa-paper-plane"></i></div> Terkirim
                                </li>
                                <li class="step <?= ($dl['idps'] >= 2) ? 'active' : (($dl['idps'] == 0) ? 'ditolak' : '') ?>">
                                    <?= ($dl['idps'] >= 2) ? '<div><i class="fas fa-download"></i></div> Diterima' : (($dl['idps'] == 0) ? '<div><i class="far fa-times-circle"></i></div> Ditolak' : '<div><i class="fas fa-download"></i></div> Diterima') ?>
                                </li>
                                <li class="step <?= ($dl['idps'] >= 3) ? 'active' : '' ?>">
                                    <div><i class="fas fa-search"></i></div> Dievaluasi
                                </li>
                                <li class="step <?= ($dl['idps'] >= 4) ? 'active' : '' ?>">
                                    <div><i class="fas fa-file-signature"></i></div> Proses
                                </li>
                                <li class="step <?= ($dl['idps'] >= 5) ? 'active' : '' ?>">
                                    <div><i class=" far fa-check-circle"></i>
                                    </div> Selesai
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl mb-4">
                    <div class="card shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center pl-3 pr-3 border-bottom">
                                <div class="col">
                                    <div class="info-pinjam">
                                        <div class="nolap">
                                            <div class="mb-0 font-weight-bold text-gray-800">
                                                No Lap. <?php echo $dl['idsurat'] ?>
                                            </div>
                                        </div>
                                        <p class="mb-2">Surat <?php echo $dl['nberkas'] ?> - Dikirim pada tanggal <?php echo $dl['tglkirim'] ?></p>
                                    </div>
                                </div>
                                <div class="col-auto d-flex align-items-center">
                                    <div class="mr-4">Oleh <?php echo $dl['nama'] ?></div>
                                </div>
                            </div>
                            <div class="row pl-3 pr-3">
                                <div class="col">
                                    <div class="keterangan">
                                        <div class="mb-0 font-weight-bold text-gray-800">
                                            Keterangan:
                                        </div>
                                        <p><?php echo $dl['keterangan'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row pl-3 pr-3" style="<?php echo ($dl['namapetugas'] && $dl['ket'] != null) ? 'display:content;' : 'display:none;' ?>">
                                <div class="col">
                                    <div class="balasan">
                                        <span class="font-weight-bold text-gray-800"><i class="fas fa-reply fa-xs"></i> <small>Dibalas: <?php echo ($dl['id_petugas'] == null) ? '-' : 'Petugas ' . $dl['namapetugas'] . ' (' . $dl['tgl_proses'] . ')' ?></small></span>
                                        <p class="mt-1"><?php echo $dl['ket'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                <span>Copyright &copy; SiLapor - Kalimantan Utara 2021</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>
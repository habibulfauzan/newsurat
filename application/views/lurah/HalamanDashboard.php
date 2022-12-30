<!-- Sidebar -->
<ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('sistem/halamanDashboard'); ?>">
        <div class="sidebar-brand-icon">
            <i class="far fa-user"></i>
        </div>
        <div class="sidebar-brand-text mx-1">Lurah Tampan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Dashboard
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('sistem/halamanDashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Pengajuan Surat
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('sistem/halamanPengajuanSurat') ?>">
            <i class="far fa-fw fa-envelope-open"></i>
            <span>Pengajuan Surat</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('sistem/logout') ?>" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Keluar</span></a>
    </li>
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
            <ul class="navbar-nav ml-auto">

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama'] ?></span>
                        <!-- <img class="img-profile rounded-circle" src="assets/img/undraw_profile.svg"> -->
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= base_url('sistem/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Keluar
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->

            <h1 class="h3 mb-4 text-gray-800">Kantor Lurah Tampan</h1>
            <div class="container text-center">
                <img class="text-center" width="463" height="222" src="<?= base_url() ?>assets/img/logo.png">
            </div>
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Profile
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body text-center">
                            <p class="text-justify">Kelurahan Tampan merupakan salah satu kelurahan yang ada dalam wilayah administrasi Kecamatan Payung Sekaki, Kota Pekanbaru, Provinsi Riau. Alamat Kantor Lurah Tampan di Jalan Kayu Manis No. 133, Pekanbaru, Riau. Luas wilayah Kelurahan Tampan sekitar 2,69 kilometer persegi atau 6 persen dari total luas Kecamatan Payung Sekaki. Kelurahan Tampan berada di ketinggian 9 meter di atas permukaan laut (Mdpl).</p>
                            <p class="text-justify">Kelurahan Tampan memiliki 17 RT dan 4 RW. Tercatat sebanyak 1.749 Kepala Keluarga (KK) yang berdiam di kelurahan ini. Sementara, jumlah penduduk Kelurahan Tampan sebanyak 8.648 jiwa. Jumlah itu terdiri dari 3.838 orang laki-laki dan 4.810 orang perempuan.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Visi Dan Misi
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <p class="text-center">VISI</p>
                            <p class="text-center"> <i>Terwujudnya Kelurahan terdepan dalam pelayanan masyarakat untuk mewujudkan Kota Pekanbaru sebagai smart city yang madani.</i></p>
                            <p class="text-center">MISI</p>
                            <p class="text-center">Menggali dan memotivasi potensi sumber daya dalam rangka percepatan pertumbuhan di bidang pemerintahan, keamanan dan ketertiban, kesejahteraan sosial, pembangunan, dan pemberdayaan masyarakat.</p>
                            <p class="text-center">Mewujudkan tata kelola pemerintahan yang berdaya guna dan berhasil guna dengan mengedepankan kualitas pelayanan publik sesuai ketentuan yang berlaku.</p>
                            <p class="text-center">Menciptakan keseimbangan dan keserasian pembangunan masyarakat modern dan madani yang berwawasan lingkungan.</p>
                        </div>
                    </div>
                </div>
                <!-- <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Collapsible Group Item #3
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
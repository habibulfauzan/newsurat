<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">PENGAJUAN SURAT - <?= $title ?></h1>
    </div>

    <!-- Requests Card Example -->
    <div class="row">
        <div class="col-md-12">
            <?= $this->session->flashdata('message'); ?>
            <?php
            // var_dump($cek);
            ?>
            <!-- <form method="post" enctype="multipart/form-data" action="<?= base_url(); ?>HalamanSuratKeteranganTidakMampu/simpan"> -->
            <?= form_open_multipart('sistem/halamanSuratKeteranganTidakMampu') ?>
            <div class="card">
                <div class="card-header">FORM TAMBAH REQUEST SKTM </div>
                <div class="card-body">
                    <div class="row">
                        <!-- kiri -->
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" id="nik" name="nik" class="form-control" value="<?= $user['nik']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tempat, Tanggal Lahir</label>
                                <input type="text" id="ttl" name="ttl" class="form-control" value="<?= $user['tempatLahir'] . ", " . $user['tanggalLahir']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Agama</label>
                                <input type="text" id="agama" name="agama" class="form-control" value="<?= $user['agama']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Surat Pengurusan KIP</label>
                                <input type="file" name="kip" id="suratkip" class="form-control-file border border-grey rounded">
                            </div>
                            <div class="form-group">
                                <label>Tanda Lunas PBB Tahun Berjalan</label>
                                <input type="file" name="lptb" id="suratlptb" class="form-control-file border border-grey rounded">
                            </div>
                        </div>

                        <!-- kanan -->
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" id="nama" name="nama" class="form-control" value="<?= $user['nama']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" id="alamat" name="alamat" class="form-control" value="<?= $user['alamat']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Surat Pernyataan</label>
                                <input type="file" id="suratpernyataan" name="suratpernyataan" class="form-control-file border border-grey rounded" required>
                            </div>
                            <div class="form-group">
                                <label>Scan KTP</label>
                                <input type="file" id="ktp" name="ktp" class="form-control-file border border-grey rounded" required>
                            </div>
                            <div class="form-group">
                                <label>Scan KK</label>
                                <input type="file" id="kk" name="kk" class="form-control-file border border-grey rounded" required>
                            </div>
                        </div>

                        <div class="card-action col-md-2">
                            <button type="submit" name="submit" class="btn btn-secondary">Kirim</button>
                            <a href="#" class="btn btn-default">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
            <?= form_close() ?>
        </div>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
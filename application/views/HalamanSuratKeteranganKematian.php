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
            <!-- <form method="post" enctype="multipart/form-data" action="<?= base_url(); ?>HalamanSuratKeteranganKematian/simpan"> -->
            <?= form_open_multipart('HalamanSuratKeteranganKematian/simpanSurat') ?>
            <div class="card">
                <div class="card-header">PEMOHON SURAT KETERANGAN KEMATIAN </div>
                <div class="card-body">
                    <div class="row">
                        <!-- kiri -->
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" id="nik" name="nik" class="form-control" value="<?= $user['nik']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>KTP Pemohon</label>
                                <input type="file" id="ktp_pemohon" name="ktp_pemohon" class="form-control-file border border-grey rounded" required>

                            </div>
                        </div>

                        <!-- kanan -->
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" id="nama_pemohon" name="nama_pemohon" class="form-control" value="<?= $user['nama']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">DATA JENAZAH </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- kiri -->
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" id="nama_jenazah" name="nama_jenazah" class="form-control" placeholder="Nama Jenazah" value="<?= set_value('nama_jenazah'); ?>">
                                    <?= form_error('nama_jenazah', '<small class=text-danger pl-3>', '</small>'); ?>
                                </div>
                                <div class=" form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" id="tl_jenazah" name="tl_jenazah" class="form-control" placeholder="Tanggal Lahir">
                                    <?= form_error('tl_jenazah', '<small class=text-danger pl-3>', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Agama</label>
                                    <input type="text" id="agama_jenazah" name="agama_jenazah" class="form-control" placeholder="Agama" value="<?= set_value('agama_jenazah'); ?>">
                                    <?= form_error('agama_jenazah', '<small class=text-danger pl-3>', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Tanda Lunas PBB Tahun Berjalan</label>
                                    <input type="file" name="lptb_jenazah" id="lptb_jenazah" class="form-control-file border border-grey rounded" required>
                                </div>
                            </div>

                            <!-- kanan -->
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" id="t_jenazah" name="t_jenazah" class="form-control" placeholder="Tempat Lahir">
                                    <?= form_error('t_jenazah', '<small class=text-danger pl-3>', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Meninggal</label>
                                    <input type="date" id="tm_jenazah" name="tm_jenazah" class="form-control">
                                    <?= form_error('tm_jenazah', '<small class=text-danger pl-3>', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>KTP</label>
                                    <input type="file" id="ktp_jenazah" name="ktp_jenazah" class="form-control-file border border-grey rounded" required>
                                </div>
                                <div class="form-group">
                                    <label>Kartu Keluarga</label>
                                    <input type="file" id="kk_jenazah" name="kk_jenazah" class="form-control-file border border-grey rounded" required>
                                </div>
                            </div>

                            <div class="card-action col-md-2">
                                <button type="submit" name="submit" class="btn btn-success">Kirim</button>
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
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php if ($this->session->flashdata('success') == TRUE) : ?>
            <div class="alert alert-success">
                <span><?= $this->session->flashdata('success'); ?></span>
            </div>
        <?php endif; ?>
        <!-- Page Heading -->
        <!-- <h1 class="h3 mb-2 text-gray-800">RIWAYAT PENGAJUAN SURAT</h1> -->
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-gray-800">PENGAJUAN SURAT - SKTM</h3>
                <!-- <?php var_dump($data); ?> -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTablez" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Surat</th>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>Berkas</th>
                                <th>Status</th>
                                <th>Tanggal Pengajuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- status 0 = pending, 1 = acc
                            jenissurat 1 = 'SKTM', 2 = 'SKD', 3 = 'SKK' -->
                            <?php $no = 1;
                            error_reporting(0);
                            if (!empty($dataSktm)) : ?>
                                <?php foreach ($dataSktm as $row) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <?php if ($row->jenissurat == '1') : ?>
                                            <td>SKTM</td>
                                        <?php elseif ($row->jenissurat == '2') : ?>
                                            <td>SKD</td>
                                        <?php else : ?>
                                            <td>SKK</td>
                                        <?php endif ?>
                                        <td><?= $row->nik ?></td>
                                        <td><?= $row->nama ?></td>
                                        <td><button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#lihatFile<?= $row->id; ?>"><i class="fa fa-fw fa-eye"></i></button></td>
                                        <?php if ($row->status == '0') : ?>
                                            <td><span type="submit" name="status" class="btn btn-sm btn-warning">Waiting</span></td>
                                        <?php elseif ($row->status == '1') : ?>
                                            <td><span type="submit" name="status" class="btn btn-sm btn-success">Diterima</span></td>
                                        <?php else : ?>
                                            <td><span type="submit" name="status" class="btn btn-sm btn-danger">Ditolak</span></td>
                                        <?php endif ?>
                                        <td><?= $row->date ?></td>
                                    </tr>
                                <?php endforeach ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="7" align="center"> Belum ada surat yang diajukan</td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-gray-800">PENGAJUAN SURAT - SKD</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Surat</th>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>Berkas</th>
                                <th>Status</th>
                                <th>Tanggal Pengajuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            error_reporting(0);
                            if (!empty($dataSkd)) : ?>
                                <?php foreach ($dataSkd as $row) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <?php if ($row->jenissurat == '1') : ?>
                                            <td>SKTM</td>
                                        <?php elseif ($row->jenissurat == '2') : ?>
                                            <td>SKD</td>
                                        <?php else : ?>
                                            <td>SKK</td>
                                        <?php endif ?>
                                        <td><?= $row->nik ?></td>
                                        <td><?= $row->nama ?></td>
                                        <td><button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#lihatFile2<?= $row->id; ?>"><i class="fa fa-fw fa-eye"></i></button></td>
                                        <?php if ($row->status == '0') : ?>
                                            <td><span type="submit" name="status" class="btn btn-sm btn-warning">Waiting</span></td>
                                        <?php elseif ($row->status == '1') : ?>
                                            <td><span type="submit" name="status" class="btn btn-sm btn-success">Diterima</span></td>
                                        <?php else : ?>
                                            <td><span type="submit" name="status" class="btn btn-sm btn-danger">Ditolak</span></td>
                                        <?php endif ?>
                                        <td><?= $row->date ?></td>
                                    </tr>
                                <?php endforeach ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="7" align="center"> Belum ada surat yang diajukan</td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                        <!-- <?php var_dump($test); ?> -->
                    </table>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-gray-800">PENGAJUAN SURAT - SKK</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Surat</th>
                                <th>NIK Pemohon</th>
                                <th>Nama Jenazah</th>
                                <th>Berkas</th>
                                <th>Status</th>
                                <th>Tanggal Pengajuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            error_reporting(0);
                            if (!empty($dataSkk)) : ?>
                                <?php foreach ($dataSkk as $row) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <?php if ($row->jenissurat == '1') : ?>
                                            <td>SKTM</td>
                                        <?php elseif ($row->jenissurat == '2') : ?>
                                            <td>SKD</td>
                                        <?php else : ?>
                                            <td>SKK</td>
                                        <?php endif ?>
                                        <td><?= $row->nikPemohon ?></td>
                                        <td><?= $row->namaJenazah ?></td>
                                        <td><button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#lihatFile3<?= $row->id; ?>"><i class="fa fa-eye"></i></button></td>
                                        <?php if ($row->status == '0') : ?>
                                            <td><span type="submit" name="status" class="btn btn-sm btn-warning">Waiting</span></td>
                                        <?php elseif ($row->status == '1') : ?>
                                            <td><span type="submit" name="status" class="btn btn-sm btn-success">Diterima</span></td>
                                        <?php else : ?>
                                            <td><span type="submit" name="status" class="btn btn-sm btn-danger">Ditolak</span></td>
                                        <?php endif ?>
                                        <td><?= $row->date ?></td>
                                    </tr>
                                <?php endforeach ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="7" align="center"> Belum ada surat yang diajukan</td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <?php $no = 1;
    if (!empty($dataSktm)) : ?>
        <?php foreach ($dataSktm as $row) : ?>
            <div class="modal fade" id="lihatFile<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="fileLampiran" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fileLampiran">File ID: <?= $row->id ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="modal-title" id="fileLampiran">File : <?= $row->suratpernyataan ?></h5>
                            <embed type="image/png" width="100%" height="450px;" src="<?= base_url('./uploads/') ?>/<?= $row->suratpernyataan ?>"></embed>
                            <h5 class="modal-title" id="fileLampiran">File : <?= $row->ktp ?></h5>
                            <embed type="image/png" width="100%" height="450px;" src="<?= base_url('./uploads/') ?>/<?= $row->ktp ?>"></embed>
                            <h5 class="modal-title" id="fileLampiran">File : <?= $row->kk ?></h5>
                            <embed type="image/png" width="100%" height="450px;" src="<?= base_url('./uploads/') ?>/<?= $row->kk ?>"></embed>
                            <h5 class="modal-title" id="fileLampiran">File : <?= $row->kip ?></h5>
                            <embed type="image/png" width="100%" height="450px;" src="<?= base_url('./uploads/') ?>/<?= $row->kip ?>"></embed>
                            <h5 class="modal-title" id="fileLampiran">File : <?= $row->lptb ?></h5>
                            <embed type="image/png" width="100%" height="450px;" src="<?= base_url('./uploads/') ?>/<?= $row->lptb ?>"></embed>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php else : ?>
    <?php endif ?>

    <?php $no = 1;
    if (!empty($dataSkd)) : ?>
        <?php foreach ($dataSkd as $row) : ?>
            <div class="modal fade" id="lihatFile2<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="fileLampiran" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fileLampiran">File ID: <?= $row->id ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="modal-title" id="fileLampiran">File : <?= $row->suratpernyataan ?></h5>
                            <embed type="image/png" width="100%" height="450px;" src="<?= base_url('./uploads/') ?>/<?= $row->suratpernyataan ?>"></embed>
                            <h5 class="modal-title" id="fileLampiran">File : <?= $row->ktp ?></h5>
                            <embed type="image/png" width="100%" height="450px;" src="<?= base_url('./uploads/') ?>/<?= $row->ktp ?>"></embed>
                            <h5 class="modal-title" id="fileLampiran">File : <?= $row->kk ?></h5>
                            <embed type="image/png" width="100%" height="450px;" src="<?= base_url('./uploads/') ?>/<?= $row->kk ?>"></embed>
                            <h5 class="modal-title" id="fileLampiran">File : <?= $row->lptb ?></h5>
                            <embed type="image/png" width="100%" height="450px;" src="<?= base_url('./uploads/') ?>/<?= $row->lptb ?>"></embed>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php else : ?>
    <?php endif ?>

    <?php $no = 1;
    if (!empty($dataSkk)) : ?>
        <?php foreach ($dataSkk as $row) : ?>
            <div class="modal fade" id="lihatFile3<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="fileLampiran" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fileLampiran">File ID: <?= $row->id ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="modal-title" id="fileLampiran">File : <?= $row->ktpPemohon ?></h5>
                            <embed type="image/png" width="100%" height="450px;" src="<?= base_url('./uploads/') ?>/<?= $row->ktpPemohon ?>"></embed>
                            <h5 class="modal-title" id="fileLampiran">File : <?= $row->ktpJenazah ?></h5>
                            <embed type="image/png" width="100%" height="450px;" src="<?= base_url('./uploads/') ?>/<?= $row->ktpJenazah ?>"></embed>
                            <h5 class="modal-title" id="fileLampiran">File : <?= $row->kkJenazah ?></h5>
                            <embed type="image/png" width="100%" height="450px;" src="<?= base_url('./uploads/') ?>/<?= $row->kkJenazah ?>"></embed>
                            <h5 class="modal-title" id="fileLampiran">File : <?= $row->lptb ?></h5>
                            <embed type="image/png" width="100%" height="450px;" src="<?= base_url('./uploads/') ?>/<?= $row->lptb ?>"></embed>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="id" class="btn btn-info btn-simple">Update</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php else : ?>
    <?php endif ?>
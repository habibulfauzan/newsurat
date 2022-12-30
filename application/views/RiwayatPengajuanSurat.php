<?php
function hariIndo($day)
{
    switch ($day) {
        case 'Sunday':
            return 'Minggu';
        case 'Monday':
            return 'Senin';
        case 'Tuesday':
            return 'Selasa';
        case 'Wednesday':
            return 'Rabu';
        case 'Thursday':
            return 'Kamis';
        case 'Friday':
            return 'Jumat';
        case 'Saturday':
            return 'Sabtu';
        default:
            return 'hari tidak valid';
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-gray-800">RIWAYAT PENGAJUAN SURAT - SKTM</h3>
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
                            <th>Cetak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- status 0 = pending, 1 = acc
                                        jenissurat 1 = 'SKTM', 2 = 'SKD', 3 = 'SKK' -->
                        <?php $no = 1;
                        error_reporting(0);
                        if (!empty($surat_user)) : ?>
                            <?php foreach ($surat_user as $row) : ?>
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
                                    <td><button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#lihatFile<?= $row->id; ?>"><i class="fa fa-eye"></i></button></td>
                                    <?php if ($row->status == '0') : ?>
                                        <td><span class="btn btn-sm btn-warning">Waiting</span></td>
                                    <?php elseif ($row->status == '1') : ?>
                                        <td><span class="btn btn-sm btn-success">Diterima</span></td>
                                    <?php else : ?>
                                        <td><span class="btn btn-sm btn-danger">Ditolak</span></td>
                                    <?php endif ?>
                                    <td><?= $row->date ?></td>
                                    <?php if ($row->status == 1) : ?>
                                        <td><button class="btn btn-simple btn-success btn-sm" data-toggle="modal" data-target="#cetakSuratSktm<?= $row->id; ?>"><i class="fas fa-fw fa-print"></i></button></td>
                                    <?php else : ?>
                                        <td><button class="btn btn-simple btn-success btn-sm" title="Surat belum disetujui" disabled><i class="fas fa-fw fa-print"></i></button></td>
                                    <?php endif ?>
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
            <h3 class="m-0 font-weight-bold text-gray-800">RIWAYAT PENGAJUAN SURAT - SKD</h3>
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
                            <th>Cetak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        error_reporting(0);
                        if (!empty($surat_user2)) : ?>
                            <?php foreach ($surat_user2 as $row) : ?>
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
                                    <td><button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#lihatFile2<?= $row->id; ?>"><i class="fa fa-eye"></i></button></td>
                                    <?php if ($row->status == '0') : ?>
                                        <td><span type="submit" name="submit" class="btn btn-sm btn-warning">Waiting</span></td>
                                    <?php elseif ($row->status == '1') : ?>
                                        <td><span type="submit" name="submit" class="btn btn-sm btn-success">Diterima</span></td>
                                    <?php else : ?>
                                        <td><span type="submit" name="submit" class="btn btn-sm btn-danger">Ditolak</span></td>
                                    <?php endif ?>
                                    <td><?= $row->date ?></td>
                                    <?php if ($row->status == 1) : ?>
                                        <td><button class="btn btn-simple btn-success btn-sm" data-toggle="modal" data-target="#cetakSuratSkd<?= $row->id; ?>"><i class="fas fa-fw fa-print"></i></button></td>
                                    <?php else : ?>
                                        <td><button class="btn btn-simple btn-success btn-sm" title="Surat belum disetujui" disabled><i class="fas fa-fw fa-print"></i></button></td>
                                    <?php endif ?>
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
            <h3 class="m-0 font-weight-bold text-gray-800">RIWAYAT PENGAJUAN SURAT - SKK</h3>
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
                            <th>Cetak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        error_reporting(0);
                        if (!empty($surat_user3)) : ?>
                            <?php foreach ($surat_user3 as $row) : ?>
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
                                        <td><span type="submit" name="submit" class="btn btn-sm btn-warning">Waiting</span></td>
                                    <?php elseif ($row->status == '1') : ?>
                                        <td><span type="submit" name="submit" class="btn btn-sm btn-success">Diterima</span></td>
                                    <?php else : ?>
                                        <td><span type="submit" name="submit" class="btn btn-sm btn-danger">Ditolak</span></td>
                                    <?php endif ?>
                                    <td><?= $row->date ?></td>
                                    <?php if ($row->status == 1) : ?>
                                        <td><button class="btn btn-simple btn-success btn-sm" data-toggle="modal" data-target="#cetakSuratSkk<?= $row->id; ?>"><i class="fas fa-fw fa-print"></i></button></td>
                                    <?php else : ?>
                                        <td><button class="btn btn-simple btn-success btn-sm" title="Surat belum disetujui" disabled><i class="fas fa-fw fa-print"></i></button></td>
                                    <?php endif ?>
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
if (!empty($surat_user)) : ?>
    <?php foreach ($surat_user as $row) : ?>
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

<?php
if (!empty($surat_user2)) : ?>
    <?php foreach ($surat_user2 as $row) : ?>
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

<?php
if (!empty($surat_user3)) : ?>
    <?php foreach ($surat_user3 as $row) : ?>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
<?php else : ?>
<?php endif ?>


<!-- START MODAL CETAK SKTM -->
<?php
if (!empty($surat_user)) : ?>
    <?php foreach ($surat_user as $row) : ?>
        <div class="modal fade" id="cetakSuratSktm<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="fileLampiran" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="fileLampiran">File ID: <?= $row->id ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table border="0" align="center">
                            <tr>
                                <td><img src="<?= base_url() ?>/assets/img/logo_kecil.png" width="70" height="87" alt=""></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <center>
                                        <font size="5"><b>PEMERINTAH KOTA PEKANBARU</b></font><br>
                                        <font size="5"><b>KECAMATAN PAYUNG SEKAK</b></font><br>
                                        <font size="5"><b>KELURAHAN TAMPAN</b></font><br>
                                        <font size="2"><i>Jalan Kayu Manis No. 133 Telepon (0761) --- Kode Pos 28292 Pekanbaru</i></font><br>
                                    </center>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="45">
                                    <hr color="black">
                                </td>
                            </tr>
                        </table>
                        <br>
                        <table border="0" align="center">
                            <tr>
                                <td>
                                    <center>
                                        <font size="4"><b>SURAT KETERANGAN TIDAK MAMPU</b></font><br>
                                        <hr style="margin:0px" color="black">
                                        <span>Nomor : <?= $row->id; ?>/SKTM/<?= date('Y/m'); ?></span>
                                    </center>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <br>
                        <table border="0" align="center">
                            <tr>
                                <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lurah Tampan Kecamatan Payung Sekaki Kota Pekanbaru dengan ini <br> menerangkan bahwa :
                                </td>
                            </tr>
                        </table>
                        <br>
                        <table border="0" align="center">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?= $row->nama; ?></td>
                            </tr>
                            <tr>
                                <td>Tempat, tanggal lahir</td>
                                <td>:</td>
                                <td><?= $row->tempatLahir . ", " . $row->tanggalLahir ?></td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>:</td>
                                <td><?= $row->agama ?></td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td><?= $row->nik ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?= $row->alamat ?></td>
                            </tr>
                        </table>
                        <br>
                        <table border="0" align="center">
                            <tr>
                                <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adalah benar-benar penduduk asli Kelurahan Tampan Kecamatan Payung <br>Sekaki Kota Pekanbaru dan yang tersebut diatas benar tergolong penduduk <br> <b><u>tidak mampu</u></b>.
                                </td>
                            </tr>
                        </table>
                        <br>
                        <table border="0" align="center">
                            <tr>
                            </tr>
                        </table>
                        <table border="0" align="center">
                            <tr>
                                <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat ini diberikan kepada yang bersangkutan agar dapat dipergunakan<br>&nbsp;&nbsp;&nbsp;&nbsp;untuk sebagaimana mestinya.
                                </td>
                            </tr>
                        </table>
                        <br>
                        <br>
                        <br>
                        <?php $spasi = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
                        <?php $spasi3 = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
                        <?php $spasi2 = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
                        <table border="0" align="center">
                            <tr>
                                <th></th>
                                <th width="100px"></th>
                                <th><?= $spasi ?>Pekanbaru, <?php echo date('d F Y'); ?></th>
                            </tr>
                            <tr>
                                <th><br> </th>
                                <th></th>
                                <th><?= $spasi ?>LURAH TAMPAN</th>
                            </tr>
                            <tr>
                                <td rowspan="15"></td>
                                <td></td>
                                <td rowspan="15"><?= $spasi ?><img src="<?= base_url() ?>/assets/img/ttd_lurah.png" width="200" height="100" alt=""></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b style="text-transform:uppercase"><u></u></b></td>
                                <td></td>
                                <td><?= $spasi3 ?><b><u>Hermayeni, S.Pd</u></b><br><?= $spasi2 ?>NIP. 197008021995122001</td>
                            </tr>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <form method="post" action="<?= base_url(); ?>sistem/cetakSurat/<?= $row->id; ?>">
                            <input type="hidden" name="id" value=<?= $row->id ?>>
                            <button type="submit" class="btn btn-primary">Cetak</button>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
<?php else : ?>
<?php endif ?>
<!-- END MODAL CETAK SKTM -->

<!-- START MODAL CETAK SKD -->
<?php
if (!empty($surat_user2)) : ?>
    <?php foreach ($surat_user2 as $row) : ?>
        <div class="modal fade" id="cetakSuratSkd<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="fileLampiran" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="fileLampiran">File ID: <?= $row->id ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table border="1" align="center">
                            <table border="0" align="center">
                                <tr>
                                    <td><img src="<?= base_url() ?>/assets/img/logo_kecil.png" width="70" height="87" alt=""></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <center>
                                            <font size="5"><b>PEMERINTAH KOTA PEKANBARU</b></font><br>
                                            <font size="5"><b>KECAMATAN PAYUNG SEKAK</b></font><br>
                                            <font size="5"><b>KELURAHAN TAMPAN</b></font><br>
                                            <font size="2"><i>Jalan Kayu Manis No. 133 Telepon (0761) --- Kode Pos 28292 Pekanbaru</i></font><br>
                                        </center>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="45">
                                        <hr color="black">
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <table border="0" align="center">
                                <tr>
                                    <td>
                                        <center>
                                            <font size="5"><b>SURAT KETERANGAN DOMISILI</b></font><br>
                                            <hr style="margin:0px" color="black">
                                            <span>Nomor : <?= $row->id; ?>/SKD/<?= date('Y/m'); ?></span>
                                        </center>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <br>
                            <table border="0" align="center">
                                <tr>
                                    <td>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lurah Tampan Kecamatan Payung Sekaki Kota Pekanbaru dengan ini<br> menerangkan bahwa:
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <table border="0" align="center">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?= $row->nama; ?></td>
                                </tr>
                                <tr>
                                    <td>Tempat, tanggal lahir</td>
                                    <td>:</td>
                                    <td><?= $row->tempatLahir . ', ' . $row->tanggalLahir ?></td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>:</td>
                                    <td><?= $row->agama; ?></td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td><?= $row->nik; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $row->alamat; ?></td>
                                </tr>
                            </table>
                            <br>
                            <table border="0" align="center">
                                <tr>
                                    <td>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama tersebut diatas benar penduduk kami yang berdomisili di <br> Kelurahan Tampan Kecamatan Payung Sekaki Kota Pekanbaru.<br>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <table border="0" align="center">
                                <tr>
                                    <td>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikianlah Surat Keterangan ini diberikan untuk dapat dipergunakan <br>sebagaimana mestinya.
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <br>
                            <br>
                            <?php $spasi = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
                            <?php $spasi3 = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
                            <?php $spasi2 = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>

                            <table border="0" align="center">
                                <tr>
                                    <th></th>
                                    <th width="100px"></th>
                                    <th><?= $spasi ?>&nbsp;&nbsp;&nbsp;&nbsp; Pekanbaru, <?php echo date('d m Y'); ?></th>
                                </tr>
                                <tr>

                                    <td> <br> </td>
                                    <td></td>
                                    <th><?= $spasi ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LURAH TAMPAN</th>
                                </tr>
                                <tr>
                                    <td rowspan="15"></td>
                                    <td></td>
                                    <td rowspan="15"><?= $spasi ?><img src="<?= base_url() ?>/assets/img/ttd_lurah.png" width="200" height="100" alt=""></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><b style="text-transform:uppercase"><u></u></b></td>
                                    <td></td>
                                    <td><?= $spasi3 ?><b><u>Hermayeni, S.Pd</u></b><br><?= $spasi2 ?>NIP. 197008021995122001</td>
                                </tr>
                            </table>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <form method="post" action="<?= base_url(); ?>sistem/cetakSurat/<?= $row->id; ?>">
                            <input type="hidden" name="id" value=<?= $row->id ?>>
                            <button type="submit" class="btn btn-primary">Cetak</button>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
<?php else : ?>
<?php endif ?>
<!-- END MODAL CETAK SKD -->

<!-- START MODAL CETAK SKK -->
<?php
if (!empty($surat_user3)) : ?>
    <?php foreach ($surat_user3 as $row) : ?>
        <div class="modal fade" id="cetakSuratSkk<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="fileLampiran" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="fileLampiran">File ID: <?= $row->id ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table border="1" align="center">
                            <table border="0" align="center">
                                <tr>
                                    <td><img src="<?= base_url() ?>/assets/img/logo_kecil.png" width="70" height="87" alt=""></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <center>
                                            <font size="5"><b>PEMERINTAH KOTA PEKANBARU</b></font><br>
                                            <font size="5"><b>KECAMATAN PAYUNG SEKAK</b></font><br>
                                            <font size="5"><b>KELURAHAN TAMPAN</b></font><br>
                                            <font size="2"><i>Jalan Kayu Manis No. 133 Telepon (0761) --- Kode Pos 28292 Pekanbaru</i></font><br>
                                        </center>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="45">
                                        <hr color="black">
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <table border="0" align="center">
                                <tr>
                                    <td>
                                        <center>
                                            <font size="5"><b>SURAT KETERANGAN KEMATIAN</b></font><br>
                                            <hr style="margin:0px" color="black">
                                            <span>Nomor : <?= $row->id; ?>/SKK/<?= date('Y/m'); ?></span>
                                        </center>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <br>
                            <table border="0" align="center">
                                <tr>
                                    <td>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lurah Tampan Kecamatan Payung Sekaki Kota Pekanbaru dengan ini<br> menerangkan bahwa:
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <table border="0" align="center">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?= $row->namaJenazah ?></td>
                                </tr>
                                <tr>
                                    <td>Tempat, tanggal lahir</td>
                                    <td>:</td>
                                    <td><?= $row->tempatLahirJenazah . ', ' . $row->tanggalLahirJenazah ?></td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>:</td>
                                    <td><?= $row->agamaJenazah ?></td>
                                </tr>
                            </table>
                            <br>
                            <table border="0" align="center">
                                <tr>
                                    <td>
                                        Orang tersebut benar telah meninggal dunia pada:<br>
                                    </td>
                                </tr>
                            </table>
                            <table border="0" align="center">
                                <tr>
                                    <td>Hari</td>
                                    <td>:</td>
                                    <td><?= hariIndo(date('l', strtotime($row->tanggakKematian))) ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>:</td>
                                    <td><?= $row->tanggakKematian ?></td>
                                </tr>
                            </table>
                            <br>
                            <table border="0" align="center">
                                <tr>
                                    <td>
                                        Surat Keterangan ini dibuat berdasarkan laporan dari:
                                    </td>
                                </tr>
                            </table>

                            <table border="0" align="center">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?= $row->nama ?></td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td><?= $row->nikPemohon ?></td>
                                </tr>
                                <tr>
                                    <td>Tempat, tanggal lahir</td>
                                    <td>:</td>
                                    <td><?= $row->tempatLahir . ', ' . $row->tanggalLahir ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $row->alamat ?></td>
                                </tr>
                            </table>
                            <br>
                            <table border="0" align="center">
                                <tr>
                                    <td>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikianlah Surat Keterangan ini diberikan untuk dapat dipergunakan <br>sebagaimana mestinya.
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <br>
                            <br>
                            <?php $spasi = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
                            <?php $spasi3 = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
                            <?php $spasi2 = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>

                            <table border="0" align="center">
                                <tr>
                                    <th></th>
                                    <th width="100px"></th>
                                    <th><?= $spasi ?>&nbsp;&nbsp;&nbsp;&nbsp; Pekanbaru, <?php echo date('d m Y'); ?></th>
                                </tr>
                                <tr>

                                    <td> <br> </td>
                                    <td></td>
                                    <th><?= $spasi ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LURAH TAMPAN</th>
                                </tr>
                                <tr>
                                    <td rowspan="15"></td>
                                    <td></td>
                                    <td rowspan="15"><?= $spasi ?><img src="<?= base_url() ?>/assets/img/ttd_lurah.png" width="200" height="100" alt=""></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><b style="text-transform:uppercase"><u></u></b></td>
                                    <td></td>
                                    <td><?= $spasi3 ?><b><u>Hermayeni, S.Pd</u></b><br><?= $spasi2 ?>NIP. 197008021995122001</td>
                                </tr>
                            </table>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="<?= base_url(); ?>sistem/cetakSurat/<?= $row->id; ?>">
                            <input type="hidden" name="id" value=<?= $row->id ?>>
                            <button type="submit" class="btn btn-primary">Cetak</button>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
<?php else : ?>
<?php endif ?>
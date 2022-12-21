<!-- SKTM -->
<?php $no = 1;
if (!empty($dataSktm)) : ?>
    <?php foreach ($dataSktm as $row) : ?>
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
                <td>No. NIK</td>
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
    <?php endforeach ?>

    <script>
        window.print();
    </script>
<?php endif ?>

<!-- SKD -->
<?php $no = 1;
if (!empty($dataSkd)) : ?>
    <?php foreach ($dataSkd as $row) : ?>
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
                    <td>No. NIK</td>
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
                    <th><?= $spasi ?>&nbsp;&nbsp;&nbsp;&nbsp; Pekanbaru, <?php echo date('Y m d'); ?></th>
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
    <?php endforeach ?>
    <script>
        window.print();
    </script>
<?php endif ?>
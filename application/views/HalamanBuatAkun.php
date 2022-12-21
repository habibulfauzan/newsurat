<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" method="POST" action="<?= base_url('HalamanBuatAkun/tampil'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nik" name="nik" placeholder="NIK" value="<?= set_value('nik'); ?>">
                                <?= form_error('nik', '<small class=text-danger pl-3>', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                <?= form_error('password', '<small class=text-danger pl-3>', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nik'); ?>">
                                <?= form_error('nama', '<small class=text-danger pl-3>', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class=text-danger pl-3>', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="tempatlahir" name="tempatlahir" placeholder="Tempat Lahir" value="<?= set_value('tempatlahir'); ?>">
                                <?= form_error('tempatlahir', '<small class=text-danger pl-3>', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control form-control-user" id="tanggallahir" name="tanggallahir" placeholder="Tanggal Lahir" value="<?= set_value('tempatlahir'); ?>">
                                <?= form_error('tanggallahir', '<small class=text-danger pl-3>', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat" value="<?= set_value('alamat'); ?>">
                                <?= form_error('alamat', '<small class=text-danger pl-3>', '</small>'); ?>
                            </div>
                            <!-- <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="agama" name="agama" placeholder="Agama" value="<?= set_value('agama'); ?>">
                            <?= form_error('agama', '<small class=text-danger pl-3>', '</small>'); ?>
                        </div> -->

                            <div class="form-group">
                                <?= form_dropdown(
                                    'agama',
                                    $options,
                                    '',
                                    ['agama ' => 'agama', 'class' => 'form-control form-control-sm', 'style' => "
                                display: block;
                                width: 100%;
                                height: calc(2.9em + .75rem + 2px);
                                padding: 0.375rem .75rem;
                                font-weight: 350;
                                line-height: 1.5;
                                color: #495057;
                                background-color: #fff;
                                background-clip: padding-box;
                                border: 1px solid #ced4da;
                                border-radius: 50px;
                                transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;"]
                                ); ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Daftar Akun
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('HalamanLogin/tampil'); ?>">Sudah memiliki akun? Masuk!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
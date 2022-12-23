    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <!-- <div class="col-lg-7"> -->
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Halaman Login</h1>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <form class="user" method="post" action="<?= base_url('HalamanLogin/tampil'); ?>">
                                        <div class=" form-group">
                                            <input type="text" class="form-control form-control-user" id="nik" aria-describedby="NIK" placeholder="NIK" name="nik" value="<?= set_value('nik') ?>">
                                            <?= form_error('nik', '<small class=text-danger pl-3>', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                                            <?= form_error('password', '<small class=text-danger pl-3>', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-dark btn-user btn-block">
                                            Masuk
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('HalamanBuatAkun/tampil'); ?>">Buat Akun!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
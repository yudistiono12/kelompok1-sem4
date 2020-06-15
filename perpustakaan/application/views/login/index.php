 <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <form role="form" method="post" action="<?= base_url('home/login'); ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" autocomplete="off" value="<?= set_value('username'); ?>">
                                    <?= form_error('username', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    <?= form_error('password', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        <div class="text-center">
                            <a href="<?= base_url('home/registrasi'); ?>">Buat Akun</a>
                        </div>
                        <div class="text-center">
                            <a href="<?= base_url('login/lupa_pass'); ?>">Lupa Password ?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ilstration_img wow fadeInRight d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">
            
            <img src="<?= base_url('assets/homee/'); ?>img/banner/illustration.png" alt="">
        </div>
    </div>
    <!-- slider_area_end -->
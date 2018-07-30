<!--Content-->
<!--==================================================-->
<section>
    <div class="container">
        <div class="row section-color">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-loginTop boxOut-loginUp">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textLogin font-openSans center">
                            Untuk berbagi berita dan memberikan komentar
                            <br>
                            dapatkan  rekomendasi berita sesuai dengan minat Anda
                        </div>
                    </div>
                    <?= $this->element(_FRONT_TEMPLATE_DIR . "/makassar-terkini/flash/mobile/dispatcher");?>
                    <?php
                        echo $this->Form->create('Account', array('action' => 'mobile_lupa_password', 'type' => 'post'));
                    ?>
                    <div class="row box-email" style="display: block;">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-username">
                            <div class="boxFieldUsername">
                                <input type="email" class="form-control field-boxLeft font-openSans" placeholder="Email" name="data[User][email]">
                            </div>
                            <div class="boxIconUsername center flex">
                                <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/login-mail.png", true)?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-checkBox">                            
                            <div class="col-md-12 col-sm-12 col-xs-12 box-login" style="display: block;">
                                <div class="col-md-12 col-sm-12 col-xs-12 font-openSans-bold">
                                    <a href="<?= Router::url("/m/login", true) ?>">
                                        Login
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 box-buttonLogin">
                            <button type="submit" class="btn button-login font-openSans-bold">RESET PASSWORD</button>
                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-daftarAkun font-sourceSansProSemibold center">
                            Belum punya akun? Daftar <a href="<?= Router::url("/m/register", true) ?>">Disini</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 flex">
                    <div class="persen40 boxOut-lineLogin"></div>
                    <div class="persen20 boxOut-atauLogin font-sourceSansPro flex center">
                        atau
                    </div>
                    <div class="persen40 boxOut-lineLogin"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-loginBottom">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-3 col-sm-3 col-xs-3 boxOut-facebookLogo center flex">
                                <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/facebook-white.png", true)?>">
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-9 boxOut-facebookText">
                                <div class="col-md-12 col-sm-12 col-xs-12 box-facebookText font-openSans-bold center flex">
                                    <a href="<?= Router::url("/m/social_login/Facebook", true) ?>">
                                        Login  Facebook
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-3 col-sm-3 col-xs-3 boxOut-googleLogo center flex">
                                <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/google-white.png", true)?>">
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-9 boxOut-googleText">
                                <div class="col-md-12 col-sm-12 col-xs-12 box-googleText font-openSans-bold center flex">
                                    <a href="<?= Router::url("/m/social_login/Google", true) ?>">
                                        Login  Google+
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-buttonDesktop">
                    <div class="box-buttonDesktop center-block">
                        <button type="button" class="btn button-desktop font-openSans-bold"><a href="<?= Router::url("/", true) ?>">DESKTOP VERSION</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {

        $.material.init()

        $('#sidebar').affix({
            offset: {
                top: 1000
            }
        });

    });
</script>
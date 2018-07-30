<style type="text/css">

    .boxOut-footer-true{
        bottom: 0px !important;
    }

    .boxOut-footer-false{
        bottom: 0px !important;
    }

    .footer-true{
        bottom: -130px !important;
        margin-top: 0px;
    }

    .footer-false{
        bottom: -220px;
        margin-top: 0px;
    }

    .log-reg-button > button:hover {
        background-color: #da8d01;
        color: #FFF;
    }

</style>

<script type="text/javascript">

    $(document).ready(function () {


        $(window).scroll(function () {
            if (topp == false) {
                if ($(window).scrollTop() + $('.s-header').height() > $('.s-header').height()) {
                    $('.boxOut-footer-login').addClass('footer-false');
                    $('.boxOut-footer-login').removeClass('footer-true');
                    $('.boxOut-footer-login').removeClass('boxOut-footer');
                } else {
                    $('.boxOut-footer-login').addClass('footer-false');
                    $('.boxOut-footer-login').removeClass('footer-true');
                    $('.boxOut-footer-login').removeClass('boxOut-footer');
                }
            }
            else if (topp == true) {
                if ($(window).scrollTop() + $('.s-header').height() > $('.s-header').height()) {
                    $('.boxOut-footer-login').addClass('footer-true');
                    $('.boxOut-footer-login').removeClass('footer-false');
                    $('.boxOut-footer-login').removeClass('boxOut-footer');
                } else {
                    $('.boxOut-footer-login').addClass('footer-true');
                    $('.boxOut-footer-login').removeClass('footer-false');
                    $('.boxOut-footer-login').removeClass('boxOut-footer');
                }
            }
        });


    });
</script>

<?php
$now = new DateTime();
?><!--Content-->
<!--==================================================-->
<section class="s-main-content" style="overflow: hidden;">
    <?php
    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 1, "idx" => 1]);
    ?>
    <div class="row backgroundContent" style="margin-bottom: 10px;">
        <div class="s-container">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 index-contentBack">

                            <?= $this->element(_FRONT_TEMPLATE_DIR . "/makassar-terkini/flash/dispatcher"); ?>
                            <div class="log-reg-midwrap">
<div class="col-md-12 col-sm-12 col-xs-12" style="border-left: 1px solid #e0e1e2; border-right: 1px solid #e0e1e2;">
<div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="log-reg-left">
                                    <div class="log-reg-title">
                                        LOGIN PAGE
                                    </div>

                                    <div class="log-reg-subtitle">
                                        Silahkan Login Untuk Mendapatkan Beragam Fasilitas
                                    </div>
                                    <?php
                                    echo $this->Form->create('Account', array('action' => 'login_member', 'type' => 'post'));
                                    ?>
                                    <div class="log-reg-logbar">
                                        <input type="text" placeholder="Email / Username" name="data[User][email]">
                                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/gembok.png", true) ?>">
                                    </div>

                                    <div class="log-reg-logbar">
                                        <input type="password" placeholder="Password" name="data[User][password]">
                                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/profile.png", true) ?>">
                                    </div>

                                    <!-- MEJIK -->

                                    <div class="log-reg-misc">
                                        <div class="warning">
                                            <div class="log-reg-misc-left">
                                                <a href="<?= Router::url("/lupa-password", true) ?>"> Lupa password?</a>
                                            </div>

                                            <div class="log-reg-misc-right">
                                                <a href="#"> Tetap masuk</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="log-reg-button-long-0">
                                        <button> LOGIN </button>
                                    </div>
                                    <?php echo $this->Form->end(); ?>
                                    <div class="log-reg-atau">
                                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/ataw.png", true) ?>">
                                    </div>

                                    <div class="log-reg-button-long">
                                        <button style="background-color: #294D80;"><a href="<?= Router::url("/users/social_login/Facebook", true) ?>" style="color:white;"> Login Facebook </a></button>
                                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/fb.png", true) ?>">
                                    </div>

                                    <div class="log-reg-button-long">
                                        <button style="background-color: #870206;"> <a href="<?= Router::url("/users/social_login/Google", true) ?>" style="color:white;">Login Google+ </a></button>
                                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/gplus.png", true) ?>">
                                    </div>
                                </div>
</div>
<div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="log-reg-right">
                                    <div class="log-reg-title">
                                        DAFTAR
                                    </div>

                                    <div class="log-reg-subtitle">
                                        Daftar akun makassarterkini.com untuk memulai.
                                    </div>

                                    <div class="log-reg-toReg">
                                        <div class="log-reg-subtitle">
                                            Masukkan email Anda!
                                        </div>
                                        <?php
                                        echo $this->Form->create('Account', array('action' => 'registration', 'type' => 'post'));
                                        ?>
                                        <div class="log-reg-regbar">
                                            <input type="email" placeholder="Example:useranda@gmail.com" id="daftar-input-email" name="data[User][email]">
                                        </div>

                                        <div class="log-reg-button">
                                            <button type="submit" class="daftar">DAFTAR</button>
                                            <div class="log-reg-button-img">
                                                <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/send.png", true) ?>">
                                            </div>
                                        </div>
                                        <?php echo $this->Form->end(); ?>
                                    </div>
                                </div>
</div>
</div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 2]);
    ?>       
</section>
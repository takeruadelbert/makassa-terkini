<?php
$now = new DateTime();
?>
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

    @media (max-width:1920px) {
        .footer-false {
            bottom: -130px;
            margin-top: 0px;
        }
    }

    @media (max-width:1366px) {

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
<!--Content-->
<!--==================================================-->
<section class="s-main-content" style="overflow: hidden;">
    <?php
    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 1, "idx" => 1]);
    ?>
    <div class="row backgroundContent" style="margin-bottom: 10px;">
        <?= $this->element(_FRONT_TEMPLATE_DIR . "/makassar-terkini/flash/dispatcher"); ?>
        <div class="s-container">
            <div class="col-sm-3">

            </div>
            <div class="col-sm-5">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 index-contentBack">
                        <div class="log-reg-module">

                            <div class="log-reg-left">
                                <div class="log-reg-title">
                                    RESET PASSWORD PAGE
                                </div>

                                <div class="log-reg-subtitle">
                                    Silahkan Masukkan Password Baru Anda.
                                </div>
                                <?php
                                echo $this->Form->create();
                                ?>
                                <div class="log-reg-logbar">
                                    <input type="password" placeholder="New Password" name="data[User][password]">
                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/gembok.png", true) ?>">
                                </div>

                                <div class="log-reg-logbar">
                                    <input type="password" placeholder="Repeat Password" name="data[User][repeat_password]">
                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/gembok.png", true) ?>">
                                </div>
                                <div class="log-reg-button-long-0">
                                    <button> Ganti Password </button>
                                </div>
                                <?php echo $this->Form->end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">

            </div>
        </div>
    </div>
    <?php
    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 2]);
    ?>
</section>

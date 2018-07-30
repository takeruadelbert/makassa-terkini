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
    
    .backgroundContent{
        margin-top: 50px;
        margin-bottom: 50px;
    }

    @media (max-width:1920px) {
        .footer-false {
            bottom: -210px;
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
    <div class="row backgroundContent">
        <?= $this->element(_FRONT_TEMPLATE_DIR . "/makassar-terkini/flash/dispatcher");?>
        <div class="s-container">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 index-contentBack">
                        <div class="log-reg-module"> 
                            <div class="log-reg-midwrap">
                                <div class="log-reg-right">
                                    <div class="log-reg-title">
                                        LUPA PASSWORD
                                    </div>                                    
                                    <div class="log-reg-toReg">
                                        <div class="log-reg-subtitle">
                                            Masukkan email Anda!
                                        </div>
                                        <?php
                                        echo $this->Form->create('Account', array('action' => 'lupa_password', 'type' => 'post'));
                                        ?>
                                        <div class="log-reg-regbar">
                                            <input type="email" placeholder="Example:useranda@gmail.com" id="daftar-input-email" name="data[User][email]">
                                        </div>

                                        <div class="log-reg-button">
                                            <button type="submit" class="daftar">KIRIM</button>
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
    <?php
    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 2]);
    ?>
</section>


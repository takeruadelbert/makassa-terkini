<!--Content-->
<!--==================================================-->
<section>
    <div class="container">        
        <div class="row section-color">
            <?php
                echo $this->Form->create('Account', array('action' => 'registration', 'type' => 'post'));
            ?>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-loginTop boxOut-loginUp">
                    <?= $this->element(_FRONT_TEMPLATE_DIR . "/makassar-terkini/flash/mobile/dispatcher");?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textLogin font-openSans center">
                            Daftar akun makassarterkini.com untuk memulai
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textMail font-openSans-bold center">
                            Masukkan email Anda!
                        </div>
                    </div>
                    <div class="row box-email">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-username">
                            <div class="boxFieldUsername">
                                <input type="email" class="form-control field-boxLeft font-openSans" placeholder="Example : Useranda@email.com" name="data[User][email]">
                            </div>
                            <div class="boxIconUsername center flex">
                                <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/login-mail.png", true)?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 box-buttonLogin">
                            <button type="submit" class="btn button-login font-sourceSansProSemibold center-block">
                                DAFTAR
                                <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrow-buttonWhite.png", true)?>">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-buttonDesktop">
                    <div class="box-buttonDesktop center-block">
                        <button type="button" class="btn button-desktop font-openSans-bold">DESKTOP VERSION</button>
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
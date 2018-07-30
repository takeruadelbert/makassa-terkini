<?php
$now = new DateTime();
?>
<!--Content-->
<!--==================================================-->
<section class="s-main-content" style="overflow: hidden;">
    <?php
    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 1, "idx" => 1]);
    ?>
    <div class="row backgroundContent" style="margin-bottom: 10px;">
        <?= $this->element(_FRONT_TEMPLATE_DIR . "/makassar-terkini/flash/dispatcher"); ?>
        <div class="s-container">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 index-contentBack">
                        <div class="log-reg-module"> 
                            <div class="log-reg-midwrap">
                                <div class="log-reg-right">
                                    <div class="log-reg-title">
                                        BERHENTI BERLANGGANAN NEWSLETTER
                                    </div>
                                    <br> <br>
                                    <div class="log-reg-toReg">
                                        <div class="log-reg-button">
                                            <button type="button" class="daftar" style="width: 150px;"><a href="<?= Router::url("/", true) ?>" style="color: white;"> &nbsp;&nbsp;&nbsp; KEMBALI KE HOME</a></button>
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

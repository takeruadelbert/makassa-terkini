<style type="text/css">
    .adv-hidden{
        display: none;
    }

    .adv-bottom{
        margin-bottom: 0px !important;
        margin-top: 20px;
    }
    .content-disclaimer p{
        margin-bottom: 20px;
    }

    .content-adv {
        //margin-top: 125px !important;
    }

    .footer-false{
        bottom: -220px;
    }

    .boxOut-footer-false {
        bottom: -220px !important;
    }

</style>


<!-- Advertisement Top -->
<!--==================================================-->
<!-- Header -->
<!--==================================================-->
<?php
$now = new DateTime();
?>
<!--Content-->
<!--==================================================-->
<section class="s-main-content content-adv">

    <!-- Adv Middle Top -->
    <!--==================================================-->
    <?php
    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 1, "idx" => 1]);
    ?>
    <div class="container-fluid content-disclaimer">
        <div class="col-sm-12 font-sourceSansPro" style="text-align: justify;">
            <div class="s-fancy-header-red">
                <span class="s-title">Disclaimer</span>
            </div>
            <?php
            $disclaimer = ClassRegistry::init("Disclaimer")->find("first");
            echo $disclaimer['Disclaimer']['content'];
            ?>
        </div>
    </div>

    <!-- Adv Middle Top -->
    <!--==================================================-->
    <?php
    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 1, "bottom" => true]);
    ?>
</section>
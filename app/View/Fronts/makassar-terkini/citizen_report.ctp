<style type="text/css">
    .s-fancy-header-red .s-sub-menu li a {
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 2px;
        padding-bottom: 2px;
    }

    .s-fancy-header-red .s-sub-menu li a {
        margin-left: 0px;
        margin-right: 0px;
    }

    .s-fancy-header-red .s-sub-menu {
        padding-left: 30px;
    }

    .s-fancy-header-red .s-title {
        font-style: normal;
    }

    .orange-tooltip{
        display: none;
    }

    .news-module-hor-icon{
        display: none;
    }

    .news-head-gadget .greyspan {
        width: 480px;
    }

    .news-head-bt .greyspan {
        width: 480px !important;
    }

    .adv-lastContent{
        margin-top: 20px;
    }

    .atau-hidden{
        display: none;
    }

    .adv-bottom{
        margin-top: 20px;
        margin-bottom: 0px !important;
    }
    .list-unstyled li.active a{
        background-color: #ed1c24;
    }
</style>
<!-- Advertisement Top -->
<!--==================================================-->
<!-- Header -->
<!--==================================================-->

<!-- Adv left -->
<!--==================================================-->
<!--<div class="adv adv-160-600 adv-top-left adv-left">

</div>-->

<!-- Adv Right -->
<!--==================================================-->
<!--<div class="adv adv-160-600 adv-top-right adv-right">

</div>-->

<script type="text/javascript">

    function advFixer() {
        if ($(window).width() < 1460) {
            var windowWidth = $(window).width();
            var req = 1152;
            var iklanWidth = (windowWidth - req) / 2;
            $('.adv-top-left').css('width', iklanWidth);
            $('.adv-top-right').css('width', iklanWidth);
            $('.adv-top-left').css('left', '7px');
            $('.adv-top-right').css('right', '7px');
        } else {
            var marginLeft = ($(window).width() - 1100) / 2;
            var fixer = (marginLeft - 160 - 25);
            $('.adv-top-left').css('left', fixer);
            $('.adv-top-right').css('right', fixer);
        }

    }

    advFixer();

    $(document).ready(function () {

        $(window).resize(function () {
            advFixer();
        });


        jQuery('#flexslider').flexslider({
            animation: "fade", slideshowSpeed: 7000,
            animationSpeed: 600,
            randomize: false,
            pauseOnHover: true,
            prevText: "",
            nextText: "",
            after: function (slider) {
                jQuery('#flexslider .slider-caption').animate({bottom: 12, }, 400)
            },
            before: function (slider) {
                jQuery('#flexslider .slider-caption').animate({bottom: -105, }, 400)
            },
            start: function (slider) {
                var slide_control_width = 100 / 8;
                jQuery('#flexslider .flex-control-nav li').css('width', slide_control_width + '%');
                jQuery('#flexslider .slider-caption').animate({bottom: 12, }, 400)
            }
        });


    });
</script>

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
    <!-- Adv Left -->
    <!--==================================================-->
    <!--    <div class="adv adv-160-600 adv-top-left">
    
        </div>-->

    <!-- Adv Right -->
    <!--==================================================-->
    <!--    <div class="adv adv-160-600 adv-top-right">
    
        </div>-->

    <!-- Middel Content -->
    <!--==================================================-->
    <div class="s-col-2-per-3 pull-left" style="/*background: #123;*/">

        <div class="s-fancy-header-red">
            <span class="s-title" style="text-transform: uppercase;">Citizen Report</span>
            <ul class="list-unstyled s-sub-menu">
                <?php
                $active_all = "";
                $active_berita = "";
                $active_foto = "";
                $active_video = "";
                if (isset($this->request->query["type"]) || !empty($this->request->query["type"])) {
                    switch ($this->request->query["type"]) {
                        case "berita" :
                            $active_berita = "active";
                            break;
                        case "foto" :
                            $active_foto = "active";
                            break;
                        case "video" :
                            $active_video = "active";
                            break;
                    }
                } else {
                    $active_all = "active";
                }
                ?>
                <li>
                    <a class="<?= $active_all ?>" href="<?= Router::url("/citizen-report", true) ?>">
                        Keseluruhan
                    </a>
                </li>
                <li>
                    <a class="<?= $active_berita ?>" href="<?= Router::url("/citizen-report?type=berita", true) ?>">
                        Berita Artikel
                    </a>
                </li>
                <li>
                    <a class="<?= $active_foto ?>" href="<?= Router::url("/citizen-report?type=foto", true) ?>">
                        Berita Foto
                    </a>
                </li>
                <li>
                    <a class="<?= $active_video ?>" href="<?= Router::url("/citizen-report?type=video", true) ?>">
                        Berita Video
                    </a>
                </li>
            </ul>
        </div>
        <?php
        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 10, "idx" => 0]);
        ?>
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_citizen_report"); ?>
        <?php
        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 10, "idx" => 1]);
        ?>
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_berita_terkini"); ?>
    </div>

    <!-- Middel Content -->
    <!--==================================================-->
    <div class="s-col-1-per-3 pull-right" style="">
        <?php
        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 10, "idx" => 0]);
        ?>
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_berita_pop"); ?>
        <?php
        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 10, "idx" => 1]);
        ?>
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_event_terkini"); ?>
        <?php
        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 10, "upperFence" => 2]);
        ?>
    </div>
    <span class="clearfix"></span>
    <?php
    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 1, "idx" => 1,"bottom"=>true]);
    ?>
</section>
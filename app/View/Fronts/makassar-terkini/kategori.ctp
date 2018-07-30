<?php
$now = new DateTime();
?>
<style type="text/css">
    .s-fancy-header-red .s-sub-menu li a {
        padding-top: 2px;
        padding-bottom: 2px;
    }

    .s-fancy-header-red .s-sub-menu li a {
        margin-left: 10px !important;
        margin-right: 10px !important;
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
        width: 480px;
    }

    .adv-lastContent{
        margin-top: 20px;
    }

    .list-unstyled li.active a{
        background-color: #ed1c24;
    }

    /* editCss */
    .adv.adv-1100-90-true{
        bottom: -90px;
    }

    .adv.adv-1100-90-false{
        bottom: -90px;
    }

    .boxOut-footer-false {
        bottom: -210px !important;
    }

    .boxOut-footer-true {
        bottom: -300px !important;
    }


</style>
<script type="text/javascript">

    function sharePositioning() {
        var marginLeft = ($(window).width() - 1100) / 2;
        var leftFixed = (marginLeft - 80 - 15);
        $('.share-container').css('left', leftFixed);
    }

    sharePositioning();

    $(document).ready(function () {

        $(window).resize(function () {
            sharePositioning();
        });


        $(window).scroll(function () {
            if (topp == false) {
                if ($(window).scrollTop() + $('.s-header').height() > $('.s-header').height()) {
                    $('.share-container').addClass('shareFixed');
                    $('.share-container').removeClass('shareAbsolute');
                    $('.adv-1100-90-bottom').addClass('adv-1100-90-true');
                    $('.adv-1100-90-bottom').removeClass('adv-1100-90-false');

                } else {
                    $('.share-container').removeClass('shareFixed');
                    $('.share-container').addClass('shareAbsolute');
                    $('.adv-1100-90-bottom').removeClass('adv-1100-90-true');
                    $('.adv-1100-90-bottom').addClass('adv-1100-90-false');

                }
            }
            else if (topp == true) {
                if ($(window).scrollTop() + $('.s-header').height() > $('.s-header').height()) {
                    $('.share-container').addClass('shareFixedtrue');
                    $('.share-container').removeClass('shareAbsolute');
                    $('.adv-1100-90-bottom').removeClass('adv-1100-90-true');
                    $('.adv-1100-90-bottom').addClass('adv-1100-90-false');

                } else {
                    $('.share-container').removeClass('shareFixedtrue');
                    $('.share-container').addClass('shareAbsolute');
                    $('.adv-1100-90-bottom').addClass('adv-1100-90-true');
                    $('.adv-1100-90-bottom').removeClass('adv-1100-90-false');
                }
            }
        });


    });
</script>
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


<!--Content-->
<!--==================================================-->
<section class="s-main-content">

    <!-- Adv Middle Top -->
    <!--==================================================-->
    <?php
    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 1, "idx" => 1]);
    ?>
    <!-- Adv Left -->
    <!--==================================================-->
    <div class="adv adv-160-600 adv-top-left">

    </div>

    <!-- Adv Right -->
    <!--==================================================-->
    <div class="adv adv-160-600 adv-top-right">

    </div>

    <!-- Middel Content -->
    <!--==================================================-->
    <div class="s-col-2-per-3 pull-left f-content-area" style="/*background: #123;*/">
        <div class="s-fancy-header-red">
            <span class="s-title" style="font-weight: bold;"><?= $parentCategories[0]['NewsCategory']['name'] ?></span>
            <ul class="list-unstyled s-sub-menu">
                <?php
                $is_active = "";
                foreach ($childCategories as $k => $sub_category) {
                    if ($categoryType == $sub_category['NewsCategory']['name']) {
                        $is_active = "active";
                    } else {
                        if ($k == 0) {
                            $is_active = "active";
                        } else {
                            $is_active = "";
                        }
                    }
                    ?>
                    <li style="margin: 0px 0px 0px 0px;">
                        <a class="<?= $is_active ?>" href="<?= Router::url("/kategori/{$sub_category['NewsCategory']['uniq']}", true) ?>"><?= $sub_category['NewsCategory']['name'] ?></a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <?php
        if ($categoryType == "news" || $parentCategories[0]['NewsCategory']['parent_id'] == 1) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 4, "idx" => 0]);
        } else if ($categoryType == "bisnis" || $parentCategories[0]['NewsCategory']['parent_id'] == 2) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 5, "idx" => 0]);
        } else if ($categoryType == "tekno" || $parentCategories[0]['NewsCategory']['parent_id'] == 3) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 6, "idx" => 0]);
        } else if ($categoryType == "lifestyle" || $parentCategories[0]['NewsCategory']['parent_id'] == 4) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 7, "idx" => 0]);
        } else if ($categoryType == "sport" || $parentCategories[0]['NewsCategory']['parent_id'] == 5) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 8, "idx" => 0]);
        } else if ($categoryType == "gallery" || $parentCategories[0]['NewsCategory']['parent_id'] == 6) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 9, "idx" => 0]);
        }
        ?>
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_berita_gadget"); ?>
        <?php
        if ($categoryType == "news" || $parentCategories[0]['NewsCategory']['parent_id'] == 1) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 4, "idx" => 1]);
        } else if ($categoryType == "bisnis" || $parentCategories[0]['NewsCategory']['parent_id'] == 2) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 5, "idx" => 1]);
        } else if ($categoryType == "tekno" || $parentCategories[0]['NewsCategory']['parent_id'] == 3) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 6, "idx" => 1]);
        } else if ($categoryType == "lifestyle" || $parentCategories[0]['NewsCategory']['parent_id'] == 4) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 7, "idx" => 1]);
        } else if ($categoryType == "sport" || $parentCategories[0]['NewsCategory']['parent_id'] == 5) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 8, "idx" => 1]);
        } else if ($categoryType == "gallery" || $parentCategories[0]['NewsCategory']['parent_id'] == 6) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 9, "idx" => 1]);
        }
        ?>
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_berita_terkini"); ?>
    </div>

    <!-- Middel Content -->
    <!--==================================================-->
    <div class="s-col-1-per-3 pull-right f-extra-area" style="">
        <?php
        if ($categoryType == "news" || $parentCategories[0]['NewsCategory']['parent_id'] == 1) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 4, "idx" => 0]);
        } else if ($categoryType == "bisnis" || $parentCategories[0]['NewsCategory']['parent_id'] == 2) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 5, "idx" => 0]);
        } else if ($categoryType == "tekno" || $parentCategories[0]['NewsCategory']['parent_id'] == 3) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 6, "idx" => 0]);
        } else if ($categoryType == "lifestyle" || $parentCategories[0]['NewsCategory']['parent_id'] == 4) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 7, "idx" => 0]);
        } else if ($categoryType == "sport" || $parentCategories[0]['NewsCategory']['parent_id'] == 5) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 8, "idx" => 0]);
        } else if ($categoryType == "gallery" || $parentCategories[0]['NewsCategory']['parent_id'] == 6) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 9, "idx" => 0]);
        }
        ?>
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_berita_pop"); ?>
        <?php
        if ($categoryType == "news" || $parentCategories[0]['NewsCategory']['parent_id'] == 1) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 4, "idx" => 1]);
        } else if ($categoryType == "bisnis" || $parentCategories[0]['NewsCategory']['parent_id'] == 2) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 5, "idx" => 1]);
        } else if ($categoryType == "tekno" || $parentCategories[0]['NewsCategory']['parent_id'] == 3) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 6, "idx" => 1]);
        } else if ($categoryType == "lifestyle" || $parentCategories[0]['NewsCategory']['parent_id'] == 4) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 7, "idx" => 1]);
        } else if ($categoryType == "sport" || $parentCategories[0]['NewsCategory']['parent_id'] == 5) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 8, "idx" => 1]);
        } else if ($categoryType == "gallery" || $parentCategories[0]['NewsCategory']['parent_id'] == 6) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 9, "idx" => 1]);
        }
        ?>
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_event_terkini"); ?>
        <?php
        if ($categoryType == "news" || $parentCategories[0]['NewsCategory']['parent_id'] == 1) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 4, "upperFence" => 1]);
        } else if ($categoryType == "bisnis" || $parentCategories[0]['NewsCategory']['parent_id'] == 2) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 5, "upperFence" => 1]);
        } else if ($categoryType == "tekno" || $parentCategories[0]['NewsCategory']['parent_id'] == 3) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 6, "upperFence" => 1]);
        } else if ($categoryType == "lifestyle" || $parentCategories[0]['NewsCategory']['parent_id'] == 4) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 7, "upperFence" => 1]);
        } else if ($categoryType == "sport" || $parentCategories[0]['NewsCategory']['parent_id'] == 5) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 8, "upperFence" => 1]);
        } else if ($categoryType == "gallery" || $parentCategories[0]['NewsCategory']['parent_id'] == 6) {
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 9, "upperFence" => 1]);
        }
        ?>
    </div>
    <span class="clearfix"></span>
    <?php
    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 4, "bottom" => true]);
    ?>
</section>
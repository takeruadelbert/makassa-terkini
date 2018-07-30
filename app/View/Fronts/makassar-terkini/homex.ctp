<!--Content-->
<!--==================================================-->
<?php
echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 2, "position" => 1, "idx" => 0, "class" => "adv-top-left"]);
?>
<!-- Adv Right -->
<!--==================================================-->
<?php
echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 2, "position" => 1, "idx" => 1, "class" => "adv-top-right"]);
?>
<style type="text/css">
    .news-head-rk .greyspan {
        width: 480px !important;
    }

    .news-head-kategori .greyspan {
        width: 520px !important;
    }

    .mini-ls {
        right: -520px !important;
    }

    .berita-rekomendasi-ls{
        right: -480px !important;
    }

    .slider-beritaTerkini{
        display: none;
    }

    .news-head-bt {
        margin-top: 35px;
    }

    .carousel-inner > .item > a .s-timedate{
        font-size: 14px !important;
        font-weight: 500;
    }

    .carousel-inner > .item > a h3{
        min-height: 17px;
    }

    .carousel-inner > .item > a h3{
        min-height: 17px;
    }

    .carousel-inner > .item > a:first-child h3{
        font-size: 22px !important;
        font-weight: 500;
        min-height: 26px;
    }

    .footer-out{
        margin-top: 220px;
    }

    .s-big-carousel-edit .next{
        margin-top: -452px;
    }

    .s-big-carousel-edit .carousel-inner > .item:last-child.active.left{
        margin-top: -452px;
    }

    .s-big-carousel-edit .carousel-inner > .item:first-child.next.left{
        margin-top: 0;
    }


    .s-big-carousel-edit .carousel-inner > .item.active.right {
        margin-top: -452px;
    }

    .s-big-carousel-edit .carousel-inner > .item:first-child.active.right {
        margin-top: 0;
    }

    .s-big-carousel-edit .carousel-inner > .item:last-child.prev.right {
        margin-top: -452px;
    }





</style>
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
            var fixer = (marginLeft - 150 - 25);
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
<section class="s-main-content" style="overflow: hidden;">

    <!-- Adv Middle Top -->
    <!--==================================================-->
    <?php
    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 1, "idx" => 1]);
    ?>
    <!-- Adv Left -->
    <!--==================================================-->

    <!-- Big Carousel -->
    <!--==================================================-->
    <div class="s-big-carousel s-big-carousel-edit">
        <div id="main-carousel" class="carousel slide" data-ride="carousel" style="height: inherit; position: relative;">

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox" style="height: 452px;">
                <?php
                foreach ($slideshow_news as $k => $slideshow) {
                    ?>
                    <div class="item <?= $k == 0 ? "active" : "" ?>" style="">
                        <?php
                        foreach ($slideshow['SlideshowDetail'] as $slideshow_detail) {
                            $news_title = seoUrl($slideshow_detail['News']['title_ind']);
                            ?>
                            <a href="<?= Router::url("/berita/{$slideshow_detail['News']['id']}/$news_title") ?>" class="s-news-node" style="background: url('<?= str_replace('\\', '/', Router::url("{$slideshow_detail['News']['thumbnail_path']}", true)) ?>') no-repeat center center; background-size: cover; ">
                                <div class="" style="width: 100%; height: 100%; overflow: hidden; float: left; position: relative;">
                                    <span class="tag-top" style="background: <?= $slideshow_detail['News']['NewsCategory']['color'] ?>;"><?= $slideshow_detail['News']['NewsCategory']['name'] ?></span>
                                </div>
                                <div class="s-news-info-cnt" style="">
                                    <h3>
                                        <?= $slideshow_detail['News']['title_ind'] ?>
                                    </h3>
                                    <span class="s-time">
                                        <!--<span class="s-clock-white-filled pull-left"></span>-->
                                        <span class="pull-left"><?= $this->Html->cvtWaktuInter($slideshow_detail['News']['news_date']) ?></span>
                                    </span>
                                </div>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>

            </div>

            <!-- Controls -->
            <a class="s-left-btn" href="#main-carousel" role="button" data-slide="prev" style="">
                <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/big-car-left.png", true) ?>">
            </a>
            <a class="s-right-btn" href="#main-carousel" role="button" data-slide="next">
                <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/big-car-right.png", true) ?>">
            </a>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#main-carousel').carousel('pause');
        });
    </script>

    <!-- News Ticker -->
    <!--==================================================-->
    <div class="s-news-ticker">
        <span class="s-label">
            Berita Terkini:
        </span>
        <div class="s-ticker" style="width: 938px;">
            <div id="ticker-carousel" class="carousel slide" data-ride="carousel" style="height: inherit; position: relative;">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <?php
                    foreach ($recentNews as $k => $newsItem) {
                        $newsTitle = seoUrl($newsItem['News']['title_ind']);
                        ?>
                        <a href="<?= Router::url("/berita/{$newsItem['News']['id']}/$newsTitle") ?>" class="item s-ellipsis <?= $k == 0 ? "active" : "" ?> ">
                            <?= $newsItem['News']['title_ind'] ?>
                        </a>
                        <?php
                    }
                    ?>

                </div>


                    <!-- Controls -->
                    <a class="s-tick" href="#ticker-carousel" role="button" data-slide="prev" style="top: 7px; right: 36px;">
                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/news-tick-left.png", true) ?>">
                    </a>
                    <a class="s-tick" href="#ticker-carousel" role="button" data-slide="next" style="top: 7px; right: 16px;">
                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/news-tick-right.png", true) ?>">
                    </a>

            </div>
        </div>
    </div>

    <!-- Middel Content -->
    <!--==================================================-->
    <div class="s-col-2-per-3 pull-left f-content-area" style="/*background: #123;*/">
        <?php
        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 1, "idx" => 0]);
        ?>
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_berita_terkini"); ?>
        <?php
        echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_slider_news");
        ?>
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_berita_rekomendasi"); ?>
        <?php
        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 1, "idx" => 1]);
        ?>
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_berita_kategori"); ?>
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_citizen_report"); ?>
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_video_populer"); ?>
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_foto_populer"); ?>
    </div>

    <!-- Middel Content -->
    <!--==================================================-->
    <div class="s-col-1-per-3 pull-right f-extra-area" style="">
        <?php
        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 1, "idx" => 0]);
        ?>
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_berita_pop"); ?>
        <?php
        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 1, "idx" => 1]);
        ?>
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_event_terkini"); ?>
        <?php
        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 1, "upperFence" => 1]);
        ?>
    </div>
</section>

<!--<script type="text/javascript">
    $(document).ready(function() {
        $('#iklan_modal').modal('show');
        $('#main-carousel').carousel('pause');
    });
</script>-->

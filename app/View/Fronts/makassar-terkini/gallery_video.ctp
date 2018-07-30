<style type="text/css">
    .s-clock-white-filled{
        display: none;
    }

    .news-head-bt .greyspan {
        width: 545px;
    }

    .main-stick {
        position: static !important;
    }

    .atau-hidden{
        display: none;
    }

    .s-big-carousel .carousel-inner .item .s-news-node:nth-child(1){
        width:487px !important;
    }

    .s-big-carousel .carousel-inner .item .s-news-node:nth-child(2){
        height: 225px !important;
    }

    .s-big-carousel .carousel-inner .item .s-news-node:nth-child(2) .news-module-ver-title, .s-big-carousel .carousel-inner .item .s-news-node:nth-child(3) .news-module-ver-title{
        font-size: 14px !important;
        min-height: 20px !important;
        width: 80% !important;
        max-height: 45px !important;
    }

    .s-big-carousel .carousel-inner .item .s-news-node:nth-child(2) .news-module-ver-time, .s-big-carousel .carousel-inner .item .s-news-node:nth-child(3) .news-module-ver-time{
        font-size: 10px;
    }

    .carousel-inner > .item > a .news-module-ver-title{
        height: auto !important;
        min-height: 35px !important;
        width: 88% !important;
        max-height: 62px !important;
    }

    .news-module-ver-time{
        font-size: 10px !important;
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
<script type="text/javascript">

    function advFixer() {
        var marginLeft = ($(window).width() - 1100) / 2;
        var fixer = (marginLeft - 150 - 25);
        $('.adv-top-left').css('left', fixer);
        $('.adv-top-right').css('right', fixer);
    }

    advFixer();

    $(document).ready(function () {

        $(window).resize(function () {
            advFixer();
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


    <!-- Middel Content -->
    <!--==================================================-->
    <div class="s-col-2-per-3 pull-left f-content-area" style="/*background: #123;*/">
        <!-- Big Carousel -->
        <!--==================================================-->
        <div class="s-big-carousel s-big-carousel-edit" style="width: 790px;">
            <div id="main-carousel" class="carousel slide" data-ride="carousel" style="height: inherit; position: relative;">

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox" style="height: inherit;">
                    <?php
                    foreach ($slideshowVideoNews as $k => $slideshows) {
                        ?>
                        <div class="item <?= $k == 0 ? "active" : "" ?>" style="">
                            <?php
                            foreach ($slideshows['GalleryVideoSlideshowDetail'] as $videos) {
                                $videos_title = seoUrl($videos['News']['title_ind']);
                                ?>
                                <a href="<?= Router::url("/video/{$videos['News']['id']}/$videos_title", true) ?>" class="s-news-node" style="background: url('<?= str_replace('\\', '/', Router::url($videos['News']['thumbnail_path'], true)) ?>') no-repeat center center; background-size: cover; ">
                                    <div class="" style="width: 100%; height: 100%; overflow: hidden; float: left; position: relative;">
                                        <span class="tag-top"><?= $videos['News']['NewsCategory']['name'] ?></span>
                                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/play-icon.png", true) ?>" width="86px" style="position: absolute; top: calc(50% - 43px); left: calc(50% - 43px); height: 86px;">
                                    </div>
                                    <div class="news-module-ver-content" style="width: 100%; float: left; padding-left: 15px; position: absolute; bottom: 3px; left: 0px;">
                                        <div class="news-module-ver-title" style="color: #fff; font-size: 20px; width: 70%;">
                                            <?= $videos['News']['title_ind'] ?>
                                        </div>
                                        <div class="news-module-ver-etc">
                                            <div class="news-module-ver-time pull-left" style="margin-top: 0px; color: #fff; font-size: 14px;">
                                                <span class="s-clock-white-filled pull-left"></span>
                                                <span class="pull-left"><?= $this->Html->cvtWaktuInter($videos['News']['news_date']) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span style="background: #808184; padding: 10px 15px; position: absolute; right: 5px; bottom: 5px; color: #fff;">
                                        <?php
                                        App::import("Vendor", "getid3", array('file' => 'getid3/getid3.php'));
                                        $getid3 = new getID3;
                                        $getid3->analyze(WWW_ROOT . ltrim(str_replace('\\', '/', $videos['News']['video_path']), "/"));
                                        echo $getid3->info["playtime_string"];
                                        ?>
                                    </span>
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
        <?php
        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 1, "idx" => 0]);
        ?>
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_video_terkini"); ?>
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_video_rekomendasi"); ?>
        <?php
        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 1, "idx" => 1]);
        ?>
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
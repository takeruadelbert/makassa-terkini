<?php
$now = new DateTime();
?>
<!--Content-->
<!--==================================================-->
<section>
    <div class="container">
        <div class="row section-color">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-marginTop">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-homeMenu">
                            <div class="row">
                                <div class="persen32 boxOut-tabTitle font-sourceSansProSemibold flex">
                                    CITIZEN REPORT
                                </div>
                                <div class="persen68 boxOut-citizenReportTab">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <ul class="nav nav-tabs edit-navtabs-profil font-sourceSansProSemibold">
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
                                            <li class="<?= $active_all ?> tab-title">
                                                <a href="<?= Router::url("/m/citizen-report", true) ?>">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-homeTab-1">
                                                            Keseluruhan
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="<?= $active_berita ?> tab-title">
                                                <a  href="<?= Router::url("/m/citizen-report?type=berita", true) ?>">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-homeTab-2">
                                                            Berita
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="<?= $active_video ?> tab-title">
                                                <a  href="<?= Router::url("/m/citizen-report?type=video", true) ?>">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-homeTab-3">
                                                            Video
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="<?= $active_foto ?> tab-title">
                                                <a href="<?= Router::url("/m/citizen-report?type=foto", true) ?>">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-homeTab-3">
                                                            Foto
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="tab-content">
                                <div id="galleryTab1" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-reportContent scroll" id="scrollt1" data-ui="jscroll-default" data-container=".boxOut-beritaBanyak" data-template="#mobile-citizen-report-nodes" data-order="News.news_date desc" data-limit="10" data-url="<?= Router::url("/fronts/ajax_news", true); ?>" data-current-page="1">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-beritaBanyak">
                                                <?php
                                                foreach ($citizen_report as $reports) {
                                                    $citizen_report_title = seoUrl($reports['News']['title_ind']);
                                                    ?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-berita">
                                                        <div class="col-md-4 col-sm-4 col-xs-4 boxOut-beritaFoto">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 box-beritaFoto">
                                                                <a href="<?= Router::url("/m/citizen-report/{$reports['News']['id']}/$citizen_report_title") ?>">
                                                                    <img src="<?= Router::url("{$reports['News']['thumbnail_path']}", true) ?>" />
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-8 boxOut-beritaTitle font-sourceSansPro center-news">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-beritaTitle">
                                                                        <a href="<?= Router::url("/m/citizen-report/{$reports['News']['id']}/$citizen_report_title") ?>">
                                                                            <?= $reports['News']['title_ind'] ?>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-beritaJam font-openSans flex">
                                                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 galleryText-time">
                                                                                <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-clock-grey.png", true) ?>" />
                                                                                <?= $this->Html->cvtTanggal($reports['News']['news_date']) ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-userGray.png", true) ?>" />
                                                                            <?= !empty($reports['Author']['id']) ? $reports['Author']['Biodata']['first_name'] : "-" ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan_mobile", [ "position" => 10]); ?>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-beritaTerkait">
                                            <div class="col-md-6 col-sm-6 col-xs-6 box-beritaTerkait font-openSans-bold flex">
                                                BERITA TERBARU
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-reportContent">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-beritaBanyak">
                                                <?php
                                                foreach ($recentNews as $k => $recents) {
                                                    $recent_news_title = seoUrl($recents['News']['title_ind']);
                                                    if ($k % 4 == 0 && $k != 0) {
                                                        ?>
                                                        <div class="row">
                                                            <?php
                                                            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan_mobile", [ "position" => 10]);
                                                        }
                                                        ?>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-berita">
                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-beritaFoto">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-beritaFoto">
                                                                    <?php
                                                                    if ($recents['News']['news_type_id'] == 1) {
                                                                        ?>
                                                                        <a href="<?= Router::url("/m/citizen-report/{$recents['News']['id']}/$recent_news_title") ?>">
                                                                            <?php
                                                                        } else if ($recents['News']['news_type_id'] == 2) {
                                                                            ?>
                                                                            <a href="<?= Router::url("/m/citizen-report-foto/{$recents['News']['id']}/$recent_news_title") ?>">
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <a href="<?= Router::url("/m/citizen-report/{$recents['News']['id']}/$recent_news_title") ?>">
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                                <img src="<?= Router::url("{$recents['News']['thumbnail_path']}", true) ?>" />
                                                                            </a>
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-beritaTitle font-sourceSansPro center-news">
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-beritaTitle">
                                                                                            <?php
                                                                                            if ($recents['News']['news_type_id'] == 1) {
                                                                                                ?>
                                                                                                <a href="<?= Router::url("/m/berita/{$recents['News']['id']}/$recent_news_title") ?>">
                                                                                                    <?php
                                                                                                } else if ($recents['News']['news_type_id'] == 2) {
                                                                                                    ?>
                                                                                                    <a href="<?= Router::url("/m/foto/{$recents['News']['id']}/$recent_news_title") ?>">
                                                                                                        <?php
                                                                                                    } else {
                                                                                                        ?>
                                                                                                        <a href="<?= Router::url("/m/video/{$recents['News']['id']}/$recent_news_title") ?>">
                                                                                                            <?php
                                                                                                        }
                                                                                                        ?>
                                                                                                        <?= $recents['News']['title_ind'] ?>
                                                                                                    </a>
                                                                                                    </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-beritaJam font-openSans flex">
                                                                                                            <div class="col-md-7 col-sm-7 col-xs-7">
                                                                                                                <div class="col-md-12 col-sm-12 col-xs-12 galleryText-time">
                                                                                                                    <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-clock-grey.png", true) ?>" />
                                                                                                                    <?= $this->Html->cvtTanggal($recents['News']['news_date']) ?>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-5 col-sm-5 col-xs-5">
                                                                                                                <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-userGray.png", true) ?>" />
                                                                                                                <?= $recents['Author']['Biodata']['first_name'] ?>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <?php
                                                                                                    if ($recents['News']['is_sponsor'] == 1) {
                                                                                                        ?>
                                                                                                        <div class="boxOut-beritaSponsor font-sourceSansProSemibold">
                                                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                                                <div class="sponsorTriangle center-block"></div>
                                                                                                            </div>
                                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 box-beritaSponsor center flex">
                                                                                                                <a href="#">
                                                                                                                    SPONSOR
                                                                                                                </a>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                    </div>                                                        
                                                                                                    </div>
                                                                                                    </div>
                                                                                                    <?php
                                                                                                }
                                                                                                ?>
                                                                                                </div>
                                                                                                </div>
                                                                                                </div>
                                                                                                </div>                                                                                             
                                                                                                </div>
                                                                                                <div class="footer-circle center flex">
                                                                                                    <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/footer-arrowUp.png", true) ?>">
                                                                                                </div>
                                                                                                </div>
                                                                                                </div>
                                                                                                </div>
                                                                                                </div>
                                                                                                </div>
                                                                                                </div>
                                                                                                </section>
                                                                                                <script>
                                                                                                    $(document).ready(function () {
                                                                                                        $.material.init();

                                                                                                        $(".scroll").waypoint({
                                                                                                            handler: function (direction) {
                                                                                                                if (direction == "down") {
                                                                                                                    var $this = $("#data-scroll");
                                                                                                                    var page = parseInt($this.data("current-page")) + 1;
                                                                                                                    var url = $this.data("url");
                                                                                                                    var limit = $this.data("limit");
                                                                                                                    var order = $this.data("order");
                                                                                                                    var templateE = $this.data("template");
                                                                                                                    var container = $this.data("container");
                                                                                                                    var term = $this.data("search");
                                                                                                                    var remove = $this.data("remove");
                                                                                                                    if (typeof $this.data("category") === "undefined") {
                                                                                                                        var category = "";
                                                                                                                    } else {
                                                                                                                        var category = $this.data("category");
                                                                                                                    }
                                                                                                                    $.ajax({
                                                                                                                        url: url,
                                                                                                                        data: {page: page, limit: limit, order: order, category: category, term: term},
                                                                                                                        dataType: "json",
                                                                                                                        type: "GET",
                                                                                                                        success: function (json) {
                                                                                                                            var templateNews = Handlebars.compile($(templateE).html(), {noEscape: true});
                                                                                                                            var result = templateNews({news: buildNewsData(json.data.items)});
                                                                                                                            $(container).append(result);
                                                                                                                            $this.data("current-page", page);
                                                                                                                            Waypoint.refreshAll();
                                                                                                                            if (json.data.pagination_info.endItem >= json.data.pagination_info.totalItem) {

                                                                                                                            }
                                                                                                                        }
                                                                                                                    });
                                                                                                                }
                                                                                                            },
                                                                                                            offset: 'bottom-in-view',
                                                                                                        })
                                                                                                    });
                                                                                                </script>
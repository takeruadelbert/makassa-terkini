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
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <ul class="nav nav-tabs edit-navtabs-profil font-sourceSansProSemibold">
                                        <li class="active tab-title">
                                            <a data-toggle="tab" href="#galleryTab1" data-scroll="1">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-homeTab-1">
                                                        Foto Terbaru
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="tab-title">
                                            <a data-toggle="tab" href="#galleryTab2" data-scroll="2">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-homeTab-2">
                                                        Foto Terpopuler
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="tab-title">
                                            <a data-toggle="tab" href="#galleryTab3" data-scroll="3">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-homeTab-3">
                                                        Foto Terekomendasi
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="tab-content">
                                <div id="galleryTab1" class="tab-pane fade in active">
                                    <div id="scrollt1" data-ui="jscroll-default" data-container="#recentNews" data-template="#gallery-news-home-nodes" data-order="News.news_date desc" data-limit="3" data-url="<?= Router::url("/fronts/ajax_gallery_photos", true); ?>" data-current-page="1">
                                        <div id="recentNews">
                                            <?php
                                            foreach ($recentNews as $k => $recents) {
                                                $recent_photo_news_title = seoUrl($recents['News']['title_ind']);
                                                if ($k == 0) {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-galleryHeadline" style="background-image: url('<?= Router::url($recents['News']['thumbnail_path'], true) ?>');">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-galleryHeadline">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 galleryHeadline">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-headlineTitle font-sourceSansPro">
                                                                            <table>
                                                                                <tr>
                                                                                    <td valign="bottom">
                                                                                        <a href="<?= Router::url("/m/foto/{$recents['News']['id']}/$recent_photo_news_title") ?>">
                                                                                            <?= $recents['News']['title_ind'] ?>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-headlineTime">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 galleryText-time font-sourceSansPro">
                                                                                <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-clock-white.png", true) ?>" />
                                                                                <?= $this->Html->cvtWaktuInter($recents['News']['news_date']) ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="gallery-count font-sourceSansProSemibold flex">
                                                                <?= count($recents['NewsImage']) ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                } else {
                                                    if ($k % 3 == 0) {
                                                        ?>
                                                        <div class="row">
                                                            <?php
                                                            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan_mobile", [ "position" => 16]);
                                                            ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    if ($k == 1) {
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-indexContent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-banyakPhoto">
                                                                    <?php
                                                                }
                                                                ?>
                                                                <div class="row row-boxPhotoList">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-photoList">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-photoTitle font-sourceSansProSemibold">
                                                                                <a href="<?= Router::url("/m/foto/{$recents['News']['id']}/$recent_photo_news_title") ?>">
                                                                                    <?= $recents['News']['title_ind'] ?>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 galleryGray-time font-sourceSansPro">
                                                                                <!-- masukan class hidden untuk menghilangkan Sponsor, hilangkan hidden untuk munculkan Sponsor -->
                                                                                <?php
                                                                                if ($recents['News']['is_sponsor'] == 1) {
                                                                                    ?>
                                                                                    <div class="col-md-2 col-sm-2 col-xs-2 boxOut-sponsor">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 gallerySponsor font-sourceSansProSemibold flex">                                                                            
                                                                                                <a href="#">
                                                                                                    SPONSOR
                                                                                                </a>                                                                            
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                                <div class="sponsorTriangle-down center-block"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                                <!------------------------ ------------------------->
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 gallerySponsor-time">
                                                                                    <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-clock-grey.png", true) ?>" />
                                                                                    <?= $this->Html->cvtWaktuInter($recents['News']['news_date']) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pictureGalleri">
                                                                                <a href="<?= Router::url("/m/foto/{$recents['News']['id']}/$recent_photo_news_title") ?>">
                                                                                    <img src="<?= Router::url($recents['News']['thumbnail_path'], true) ?>" />
                                                                                </a>
                                                                                <div class="gallery-count font-sourceSansProSemibold flex">
                                                                                    <?= count($recents['NewsImage']) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                if ($k == 1) {
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div id="galleryTab2" class="tab-pane fade">
                                    <div id="scrollt2" data-ui="jscroll-default" data-container="#popularNews" data-template="#gallery-news-home-nodes" data-order="News.popular_rate desc" data-limit="3" data-url="<?= Router::url("/fronts/ajax_gallery_photos", true); ?>" data-current-page="1">
                                        <div id="popularNews">
                                            <?php
                                            foreach ($newsPopulars as $k => $recents) {
                                                $recent_photo_news_title = seoUrl($recents['News']['title_ind']);
                                                if ($k == 0) {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-galleryHeadline" style="background-image: url('<?= Router::url($recents['News']['thumbnail_path'], true) ?>');">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-galleryHeadline">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 galleryHeadline">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-headlineTitle font-sourceSansPro">
                                                                            <table>
                                                                                <tr>
                                                                                    <td valign="bottom">
                                                                                        <a href="<?= Router::url("/m/foto/{$recents['News']['id']}/$recent_photo_news_title") ?>">
                                                                                            <?= $recents['News']['title_ind'] ?>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-headlineTime">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 galleryText-time font-sourceSansPro">
                                                                                <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-clock-white.png", true) ?>" />
                                                                                <?= $this->Html->cvtWaktuInter($recents['News']['news_date']) ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="gallery-count font-sourceSansProSemibold flex">
                                                                <?= count($recents['NewsImage']) ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                } else {
                                                    if ($k % 3 == 0) {
                                                        ?>
                                                        <div class="row">
                                                            <?php
                                                            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan_mobile", [ "position" => 16]);
                                                            ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    if ($k == 1) {
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-indexContent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-banyakPhoto">
                                                                    <?php
                                                                }
                                                                ?>
                                                                <div class="row row-boxPhotoList">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-photoList">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-photoTitle font-sourceSansProSemibold">
                                                                                <a href="<?= Router::url("/m/foto/{$recents['News']['id']}/$recent_photo_news_title") ?>">
                                                                                    <?= $recents['News']['title_ind'] ?>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 galleryGray-time font-sourceSansPro">
                                                                                <!-- masukan class hidden untuk menghilangkan Sponsor, hilangkan hidden untuk munculkan Sponsor -->
                                                                                <?php
                                                                                if ($recents['News']['is_sponsor'] == 1) {
                                                                                    ?>
                                                                                    <div class="col-md-2 col-sm-2 col-xs-2 boxOut-sponsor">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 gallerySponsor font-sourceSansProSemibold flex">                                                                            
                                                                                                <a href="#">
                                                                                                    SPONSOR
                                                                                                </a>                                                                            
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                                <div class="sponsorTriangle-down center-block"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                                <!------------------------ ------------------------->
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 gallerySponsor-time">
                                                                                    <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-clock-grey.png", true) ?>" />
                                                                                    <?= $this->Html->cvtWaktuInter($recents['News']['news_date']) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pictureGalleri">
                                                                                <a href="<?= Router::url("/m/foto/{$recents['News']['id']}/$recent_photo_news_title") ?>">
                                                                                    <img src="<?= Router::url($recents['News']['thumbnail_path'], true) ?>" />
                                                                                </a>
                                                                                <div class="gallery-count font-sourceSansProSemibold flex">
                                                                                    <?= count($recents['NewsImage']) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                if ($k == 1) {
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div id="galleryTab3" class="tab-pane fade">
                                    <div id="scrollt3" data-ui="jscroll-default" data-container="#recommendedNews" data-template="#gallery-news-home-nodes" data-order="News.popular_rate desc" data-limit="3" data-url="<?= Router::url("/fronts/ajax_gallery_photos", true); ?>" data-current-page="1">
                                        <div id="recommendedNews">
                                            <?php
                                            foreach ($recommendedNews as $k => $recents) {
                                                $recent_photo_news_title = seoUrl($recents['News']['title_ind']);
                                                if ($k == 0) {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-galleryHeadline" style="background-image: url('<?= Router::url($recents['News']['thumbnail_path'], true) ?>');">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-galleryHeadline">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 galleryHeadline">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-headlineTitle font-sourceSansPro">
                                                                            <table>
                                                                                <tr>
                                                                                    <td valign="bottom">
                                                                                        <a href="<?= Router::url("/m/foto/{$recents['News']['id']}/$recent_photo_news_title") ?>">
                                                                                            <?= $recents['News']['title_ind'] ?>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-headlineTime">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 galleryText-time font-sourceSansPro">
                                                                                <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-clock-white.png", true) ?>" />
                                                                                <?= $this->Html->cvtWaktuInter($recents['News']['news_date']) ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="gallery-count font-sourceSansProSemibold flex">
                                                                <?= count($recents['NewsImage']) ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                } else {
                                                    if ($k % 3 == 0) {
                                                        ?>
                                                        <div class="row">
                                                            <?php
                                                            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan_mobile", [ "position" => 16]);
                                                            ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    if ($k == 1) {
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-indexContent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-banyakPhoto">
                                                                    <?php
                                                                }
                                                                ?>
                                                                <div class="row row-boxPhotoList">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-photoList">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-photoTitle font-sourceSansProSemibold">
                                                                                <a href="<?= Router::url("/m/foto/{$recents['News']['id']}/$recent_photo_news_title") ?>">
                                                                                    <?= $recents['News']['title_ind'] ?>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 galleryGray-time font-sourceSansPro">
                                                                                <!-- masukan class hidden untuk menghilangkan Sponsor, hilangkan hidden untuk munculkan Sponsor -->
                                                                                <?php
                                                                                if ($recents['News']['is_sponsor'] == 1) {
                                                                                    ?>
                                                                                    <div class="col-md-2 col-sm-2 col-xs-2 boxOut-sponsor">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 gallerySponsor font-sourceSansProSemibold flex">                                                                            
                                                                                                <a href="#">
                                                                                                    SPONSOR
                                                                                                </a>                                                                            
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                                <div class="sponsorTriangle-down center-block"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                                <!------------------------ ------------------------->
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 gallerySponsor-time">
                                                                                    <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-clock-grey.png", true) ?>" />
                                                                                    <?= $this->Html->cvtWaktuInter($recents['News']['news_date']) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pictureGalleri">
                                                                                <a href="<?= Router::url("/m/foto/{$recents['News']['id']}/$recent_photo_news_title") ?>">
                                                                                    <img src="<?= Router::url($recents['News']['thumbnail_path'], true) ?>" />
                                                                                </a>
                                                                                <div class="gallery-count font-sourceSansProSemibold flex">
                                                                                    <?= count($recents['NewsImage']) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                if ($k == 1) {
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
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
</section>
<script>
    var waypoint, waypoint2, waypoint3;
    $(document).ready(function () {
        $.material.init();

        waypoint = new Waypoint({
            element: document.getElementById('scrollt1'),
            handler: function (direction) {
                if (direction == "down") {
                    var $this = $("#scrollt1");
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
                        data: {page: page, limit: limit, order: order, category: category, conditions: "tab1"},
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
        });
        waypoint2 = new Waypoint({
            element: document.getElementById('scrollt2'),
            handler: function (direction) {
                if (direction == "down") {
                    var $this = $("#scrollt2");
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
                        data: {page: page, limit: limit, order: order, category: category, conditions: "tab2"},
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
        });
        waypoint3 = new Waypoint({
            element: document.getElementById('scrollt3'),
            handler: function (direction) {
                if (direction == "down") {
                    var $this = $("#scrollt3");
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
                        data: {page: page, limit: limit, order: order, category: category, conditions: "tab3"},
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
        });
        enableScroll(1);
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            enableScroll($(e.target).data("scroll"));
        });
    });

    function enableScroll(n) {
        if (n == 1) {
            waypoint.enable();
            waypoint2.disable();
            waypoint3.disable();
        } else if (n == 2) {
            waypoint2.enable();
            waypoint.disable();
            waypoint3.disable();
        } else if (n == 3) {
            waypoint3.enable();
            waypoint2.disable();
            waypoint.disable();
        }
        Waypoint.refreshAll();
    }
</script>
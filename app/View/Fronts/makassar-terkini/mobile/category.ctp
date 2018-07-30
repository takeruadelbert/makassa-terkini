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
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-title">
                            <div class="box-title font-sourceSansProSemibold flex">
                                <?= strtoupper($parentCategories[0]['NewsCategory']['name']) ?>
                            </div>
                            <div class="box-titleTriangle"></div>
                            <div class="boxOut-subMenu flex">
                                <div class="box-subMenu">
                                    <ul class="nav nav-tabs edit-navtabs-profil font-sourceSansPro">
                                        <?php
                                        foreach ($childCategories as $sub_category) {
                                            ?>
                                            <li>
                                                <a href="<?= Router::url("/m/kategori/{$sub_category['NewsCategory']['uniq']}") ?>">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <?= $sub_category['NewsCategory']['name'] ?>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 tab-content scroll">
                            <div id="homeTab1" class="col-md-12 col-sm-12 col-xs-12 tab-pane fade in active">
                                <div class="row">
                                    <div id="data-scroll" class="col-md-12 col-sm-12 col-xs-12 boxOut-indexContent" data-ui="jscroll-default" data-container=".boxOut-beritaBanyak" data-template="#news-preview-nodes" data-order="News.news_date desc" data-limit="10" data-url="<?= Router::url("/fronts/ajax_news", true); ?>" data-current-page="1" data-category="<?= $categoryType ?>">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-beritaBanyak">
                                                <?php
                                                foreach ($categoryNews as $k => $detail_category_news) {
                                                    $detail_category_news_title = seoUrl($detail_category_news['News']['title_ind']);
                                                    if ($k % 3 == 0 && $k != 0) {
                                                        ?>
                                                        <div class="row">
                                                            <?php
                                                            if ($categoryType == "news" || $parentCategories[0]['NewsCategory']['parent_id'] == 1) {
                                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan_mobile", [ "position" => 4]);
                                                            } else if ($categoryType == "bisnis" || $parentCategories[0]['NewsCategory']['parent_id'] == 2) {
                                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan_mobile", [ "position" => 5]);
                                                            } else if ($categoryType == "tekno" || $parentCategories[0]['NewsCategory']['parent_id'] == 3) {
                                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan_mobile", [ "position" => 6]);
                                                            } else if ($categoryType == "lifestyle" || $parentCategories[0]['NewsCategory']['parent_id'] == 4) {
                                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan_mobile", [ "position" => 7]);
                                                            } else if ($categoryType == "sport" || $parentCategories[0]['NewsCategory']['parent_id'] == 5) {
                                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan_mobile", [ "position" => 8]);
                                                            } else if ($categoryType == "gallery" || $parentCategories[0]['NewsCategory']['parent_id'] == 6) {
                                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan_mobile", [ "position" => 9]);
                                                            }
                                                            ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-berita">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 batas-border">
                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-beritaFoto">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-beritaFoto">
                                                                    <a href="<?= Router::url("/m/berita/{$detail_category_news['News']['id']}/$detail_category_news_title") ?>">
                                                                        <img src="<?= Router::url("{$detail_category_news['News']['thumbnail_path']}", true) ?>" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-beritaTitle font-sourceSansPro center-news">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-beritaTitle">
                                                                            <a href="<?= Router::url("/m/berita/{$detail_category_news['News']['id']}/$detail_category_news_title") ?>"">
                                                                                <?= $detail_category_news['News']['title_ind'] ?>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-beritaJam">
                                                                            <?= $this->Html->getTimeago(strtotime($detail_category_news["News"]['news_date'])) ?>
                                                                        </div>
                                                                    </div>
                                                                    <!-- jika ingin memunculkan tanda sponsor hilangkan class "hidden", jika ingin hilangkan sponsor tambah class "hidden" -->
                                                                    <?php
                                                                    if ($detail_category_news['News']['is_sponsor'] == 1) {
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
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
<div class="container-fluid">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 index-contentBack">
                <div class="news-head-bt" style="margin-top:10px !important;">
                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/berita-terkini.png", true) ?>">

                    <div class="redspan">
                        <div class="greyspan">
                        </div>
                    </div>
                </div>
                <div class="s-berita-terkini-container">
                    <?php
                    foreach ($recentNews as $newsItem) {
                        $newsTitle = seoUrl($newsItem['News']['title_ind']);
                    ?>
                        <div class="news-module-hor">
                            <div class="news-module-hor-img">
                                <img src="<?= Router::url($newsItem["News"]["thumbnail_path"], true) ?>">
                            </div>

                            <div class="news-module-hor-content font-sourceSansPro center-news">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="news-module-hor-title">
                                    <?php
                                        if($newsItem['News']['news_type_id'] == 1) {
                                    ?>
                                    <a href="<?= Router::url("/berita/{$newsItem['News']['id']}/$newsTitle", true) ?>">
                                    <?php
                                        } else if($newsItem['News']['news_type_id'] == 2) {
                                    ?>
                                    <a href="<?= Router::url("/foto/{$newsItem['News']['id']}/$newsTitle", true) ?>">
                                    <?php
                                        } else {
                                    ?>
                                    <a href="<?= Router::url("/video/{$newsItem['News']['id']}/$newsTitle", true) ?>">
                                    <?php
                                        }
                                    ?>
                                        <?= $newsItem['News']['title_ind'] ?>
                                    </a>
                                </div>

                                <div class="news-module-hor-etc" style="width:100%;">                                    
                                    <div class="news-module-hor-info pull-left" style="margin-top:3px;">
                                        <a href="<?= Router::url("/kategori/{$newsItem['NewsCategory']['uniq']}", true) ?>">
                                            <?= $newsItem['NewsCategory']['name'] ?>
                                        </a>
                                    </div>
                                    <div class="news-module-hor-info pull-left" style="margin-top:3px;">
                                        -
                                    </div>
                                    <div class="news-module-hor-info pull-left" style="margin-top:3px;">
                                        <?= $this->Html->getTimeago(strtotime($newsItem["News"]['news_date'])) ?>
                                    </div>
                                    <?php
                                    if($newsItem['News']['is_sponsor']) {
                                    ?>
                                    <div class="news-module-hor-tag pull-left" style="margin-top:3px;">
                                        SPONSOR
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>

                                <div class="news-module-hor-desc" style="width:100%;">
                                    <?php
                                    $limit = 200;
                                    $sinopsys = strip_tags($newsItem['News']['sinopsys_ind']);
                                    if(strlen($sinopsys) < $limit) {
                                        echo $sinopsys;
                                    } else {                                    
                                        echo substr($sinopsys,0,$limit) . "...";
                                    }
                                    ?>
                                </div>

                                
</div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <div class="news-bottom-button">
                <div class="col-md-12 col-sm-12 col-xs-12">
<div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="bottom-lb berita-terkini-more-remove">
                        <div class="button-lb">
                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/more.png", true) ?>">
                            <a href="javascript:void(false);" class="more-news" data-remove=".berita-terkini-more-remove" data-container=".s-berita-terkini-container" data-template="#news-preview-nodes" data-order="News.news_date desc" data-limit="10" data-url="<?= Router::url("/fronts/ajax_news", true); ?>" data-current-page="1">
                                LEBIH BANYAK
                            </a>
                        </div>

                    </div>
</div>

<div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="bottom-ls">
                        <div class="button-ls">
                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/all-window.png", true) ?>">
                            <a href="<?= Router::url("/berita-terkini", true) ?>">
                                LIHAT SEMUA
                            </a>
                        </div>
                    </div>
</div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.f-berita-terkini-lebih-banyak').on('click', function () {
            dinamika_iklan();
        });
    });
</script>
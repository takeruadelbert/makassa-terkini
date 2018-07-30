<div class="container-fluid">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 index-contentBack">
                <div class="news-head-gadget">
                    <?php
                    $categoryLogo = ClassRegistry::init("NewsCategory")->find("first",[
                        "conditions" => [
                            "NewsCategory.uniq" => $categoryType,
                        ],
                    ]);
                    if(!empty($categoryLogo)) {
                    ?>
                    <img src="<?= Router::url(str_replace('\\', '/', $categoryLogo['NewsCategory']['logo_path']), true) ?>">
                    <?php
                    }
                    ?>
                    <div class="redspan">
                        <div class="greyspan">
                        </div>
                    </div>
                </div>
                    <div class="s-berita-lebih-banyak-gadget">
                        <?php
                        foreach ($currentNews as $news_item) {
                            $judulBerita = seoUrl($news_item['News']['title_ind']);
                            if ($news_item['News']['news_type_id'] == 1) {
                                ?>
                        <a href="<?= Router::url("/berita/{$news_item['News']['id']}/{$judulBerita}") ?>" class="news-module-hor">
                        <?php
                            } else if ($news_item['News']['news_type_id'] == 2) {
                        ?>
                            <a href="<?= Router::url("/foto/{$news_item['News']['id']}/{$judulBerita}") ?>" class="news-module-hor">
                        <?php
                            } else {
                        ?>
                                <a href="<?= Router::url("/video/{$news_item['News']['id']}/{$judulBerita}") ?>" class="news-module-hor"> 
                        <?php
                            }
                        ?>
                                    <div class="news-module-hor-img">
                                        <img src="<?= str_replace('\\', '/', Router::url("{$news_item['News']['thumbnail_path']}", true)) ?>">
                                    </div>
                                    <div class="news-module-hor-content font-sourceSansPro">
                                        <div>
                                            <div class="news-module-hor-title">
                                            <?= $news_item['News']['title_ind'] ?>
                                            </div>
                                            
                                            <div class="news-module-hor-etc">                                    
                                                <div class="news-module-hor-info pull-left" style="margin-top:3px;">
                                                <?= $news_item['NewsCategory']['name'] ?>
                                                </div>
                                                <div class="news-module-hor-info pull-left" style="margin-top:3px;">
                                                    -
                                                </div>
                                                <div class="news-module-hor-time pull-left" style="margin-top:3px;">
                                                <?= $this->Html->getTimeago(strtotime($news_item["News"]["news_date"])); ?>
                                                </div>
                                            <?php
                                                if ($news_item['News']['is_sponsor'] == 1) {
                                            ?>
                                                <div class="news-module-hor-tag pull-left" style="margin-top:3px;">
                                                    SPONSOR
                                                </div>
                                            <?php
                                                }
                                            ?>
                                            </div>

                                            <div class="news-module-hor-desc">
                                            <?php
                                            $limit = 220;
                                            $sinopsys = strip_tags($news_item['News']['sinopsys_ind']);
                                            if(strlen($sinopsys) < $limit) {
                                                echo $sinopsys;
                                            } else {                                    
                                                echo substr($sinopsys,0,$limit) . "...";
                                            }
                                            ?>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </a>

                        <?php
                            }
                        ?>
                                </div>

                            <div class="news-bottom-button">
                                <div class="bottom-lb berita-kategori-more-remove">
                                    <div class="button-lb">
                                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/more.png", true) ?>">
                                        <a href="javascript:void(false);" class="more-news" data-category="<?= implode(",", $currentNewsFilter["category"]) ?>" data-remove=".berita-kategori-more-remove" data-container=".s-berita-lebih-banyak-gadget" data-template="#news-preview-nodes" data-order="News.news_date desc" data-limit="<?= $currentNewsFilter["limit"] ?>" data-url="<?= Router::url("/fronts/ajax_news", true); ?>" data-current-page="<?= $currentNewsFilter["page"] ?>">
                                            LEBIH BANYAK
                                        </a>
                                    </div>

                                </div>

                                <div class="bottom-ls berita-kategori-more-remove">
                                    <div class="button-ls">
                                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/all-window.png", true) ?>">
                                        <a href="<?= Router::url("/kategori/$categoryType/lihat-semua", true) ?>">
                                            LIHAT SEMUA
                                        </a>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
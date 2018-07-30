<div class="container-fluid">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 index-contentBack">
                <div class="news-head-rk">
                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/video-lainnya.png", true)?>" style="width: auto; height: 35px;">

                    <div class="redspan">
                        <div class="greyspan">
                        </div>
                        <a href="<?= Router::url("/galeri-video/lihat-semua", true) ?>" class="mini-ls">
                            LIHAT SEMUA
                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/all-window-red.png", true)?>">
                        </a>
                    </div>
                </div>
                <div id="rekomendasi-carousel" class="carousel slide" data-ride="carousel" style="height: inherit; position: relative;">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <?php
                            foreach($videoNews as $k => $videos) {
                                $video_news_title = seoUrl($videos['News']['title_ind']);
                                if($k < 6) {
                            ?>
                            <div class="news-module-ver">
                                <a href="<?= Router::url("/video/{$videos['News']['id']}/$video_news_title", true) ?>">
                                    <div class="news-module-ver-img">
                                        <img src="<?= str_replace('\\', '/', Router::url($videos['News']['thumbnail_path'], true)) ?>">
                                    </div>
                                    <div class="news-module-ver-content font-sourceSansPro">
                                        <div class="news-module-ver-title" style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden">
                                            <?= $videos['News']['title_ind'] ?>
                                        </div>

                                        <div class="news-module-ver-etc">
                                            <?php
                                            if($videos['News']['is_sponsor']) {
                                            ?>
                                            <div class="news-module-ver-tag pull-left">
                                                SPONSOR
                                            </div>
                                            <?php
                                            }
                                            ?>
                                            <div class="news-module-ver-icon pull-left">
                                                <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/clock.png", true)?>">
                                            </div>

                                            <div class="news-module-ver-time pull-left">
                                                <?= $this->Html->cvtWaktuInter($videos['News']['news_date']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                                } else {
                                    break;                                    
                                }
                            }
                            ?>
                        </div>                   
                        <div class="item">
                            <?php
                            foreach($videoNews as $k => $videos) {
                                $video_news_title = seoUrl($videos['News']['title_ind']);
                                if($k > 5 && $k < 12) {
                            ?>
                            <div class="news-module-ver">
                                <a href="<?= Router::url("/video/{$videos['News']['id']}/$video_news_title", true) ?>">
                                    <div class="news-module-ver-img">
                                        <img src="<?= str_replace('\\', '/', Router::url($videos['News']['thumbnail_path'], true)) ?>">
                                    </div>
                                    <div class="news-module-ver-content font-sourceSansPro">
                                        <div class="news-module-ver-title" style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden">
                                            <?= $videos['News']['title_ind'] ?>
                                        </div>

                                        <div class="news-module-ver-etc">
                                            <?php
                                            if($videos['News']['is_sponsor']) {
                                            ?>
                                            <div class="news-module-ver-tag pull-left">
                                                SPONSOR
                                            </div>
                                            <?php
                                            }
                                            ?>
                                            <div class="news-module-ver-icon pull-left">
                                                <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/clock.png", true)?>">
                                            </div>

                                            <div class="news-module-ver-time pull-left">
                                                <?= $this->Html->cvtWaktuInter($videos['News']['news_date']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                                }
                            }
                            ?>
                        </div> 
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-bottom: 15px;">
            <div style="width: calc(100% - 70px); display: block; float: left; height: 2px; background: #57585a;"></div>
            <div style="position: relative; float: left; width: 50px; text-align: center; margin-top: -10px;">
                <a class="s-tick" href="#rekomendasi-carousel" role="button" data-slide="prev" style="top: 7px; right: 36px;">
                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/news-tick-left.png", true)?>">
                </a>
                <a class="s-tick" href="#rekomendasi-carousel" role="button" data-slide="next" style="top: 7px; right: 16px;">
                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/news-tick-right.png", true)?>">
                </a>
            </div>
            <div style="width: 20px; display: block; float: right; height: 2px; background: #57585a;"></div>
        </div>
    </div>
</div>


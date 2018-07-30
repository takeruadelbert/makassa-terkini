<div class="container-fluid">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 index-contentBack">
                <div class="news-head-bt">
                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/foto-rekomendasi.png", true) ?>" style="width: auto; height: 35px;">

                    <div class="redspan">
                        <div class="greyspan line-fotoRekomendasi">
                        </div>
                    </div>

                    <div style="position: relative; float: right; text-align: center; margin-top: -4px;">
                        <a href="<?= Router::url("/galeri-foto/lihat-semua", true) ?>" class="pull-left">
                            <span style="font-size: 12px; color: #ec2227; margin-right: 15px;">LIHAT SEMUA</span>
                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/all-window-red.png", true) ?>" height="10px">
                        </a>
                        <span class="atau-hidden">
                            <span class="pull-left" style="margin-left: 5px; margin-right: 5px;">atau</span>
                            <a class="s-tick" href="#foto-populer-carousel" role="button" data-slide="prev" style="top: 7px; right: 36px;">
                                <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/news-tick-left.png", true) ?>" width="12px">
                            </a>
                            <a class="s-tick" href="#foto-populer-carousel" role="button" data-slide="next" style="top: 7px; right: 16px;">
                                <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/news-tick-right.png", true) ?>" width="12px">
                            </a>
                        </span>
                    </div>
                </div>


                <div id="foto-populer-carousel" class="carousel slide" data-ride="carousel" style="height: inherit; position: relative;">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active " style="text-align: justify;">
                            <?php
                            foreach ($recommendedPhotoNews as $k => $recommendedNews) {
                                $recommended_photo_news_title = seoUrl($recommendedNews['News']['title_ind']);
                                if ($k < 6) {
                                    ?>
                                    <div class="news-module-ver">
                                        <a href="<?= Router::url("/foto/{$recommendedNews['News']['id']}/$recommended_photo_news_title", true) ?>">
                                            <div class="news-module-ver-img">
                                                <img src="<?= Router::url($recommendedNews['News']['thumbnail_path'], true) ?>">
                                                <span class="foto-count"><?= count($recommendedNews['NewsImage']) ?></span>
                                            </div>

                                            <div class="news-module-ver-content font-sourceSansPro">
                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left">
                                                        Telah dilihat <?= $recommendedNews['News']['hits'] ?> kali
                                                    </div>
                                                </div>

                                                <div class="news-module-ver-title">
                                                    <?= $recommendedNews['News']['title_ind'] ?>
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
                        <div class="item " style="text-align: justify;">
                            <?php
                            foreach ($recommendedPhotoNews as $k => $recommendedNews) {
                                $recommended_photo_news_title = seoUrl($recommendedNews['News']['title_ind']);
                                if ($k > 5 && $k < 12) {
                                    ?>
                                    <div class="news-module-ver">
                                        <a href="<?= Router::url("foto/{$recommendedNews['News']['id']}/$recommended_photo_news_title", true) ?>">                                
                                            <div class="news-module-ver-img">
                                                <img src="<?= Router::url($recommendedNews['News']['thumbnail_path'], true) ?>">
                                                <span class="foto-count"><?= count($recommendedNews['NewsImage']) ?></span>
                                            </div>

                                            <div class="news-module-ver-content font-sourceSansPro">
                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left">
                                                        Telah dilihat <?= $recommendedNews['News']['hits'] ?> kali
                                                    </div>
                                                </div>

                                                <div class="news-module-ver-title">
                                                    <?= $recommendedNews['News']['title_ind'] ?>
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
    </div>
</div>
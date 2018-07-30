<div class="container-fluid">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 index-contentBack">
                <div class="news-head-bt">
                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/video-pop.png", true) ?>" style="width: auto; height: 35px;">

                    <div class="redspan">
                        <div class="greyspan">
                        </div>
                    </div>

                    <div style="position: relative; float: right; text-align: center; margin-top: -4px;">
                        <a href="<?= Router::url("/foto-populer", true) ?>" class="pull-left">
                            <span style="font-size: 12px; color: #ec2227; margin-right: 10px;">LIHAT SEMUA</span>
                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/all-window-red.png", true) ?>" height="10px">
                        </a>
                        <span class="pull-left" style="margin-left: 5px; margin-right: 5px; color: #A1A1A1; font-style: italic;">atau</span>
                        <a class="s-tick" href="#video-populer-carousel" role="button" data-slide="prev" style="top: 7px; right: 36px;">
                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/news-tick-left.png", true) ?>" width="12px">
                        </a>
                        <a class="s-tick" href="#video-populer-carousel" role="button" data-slide="next" style="top: 7px; right: 16px;">
                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/news-tick-right.png", true) ?>" width="12px">
                        </a>
                    </div>
                </div>

                <div id="video-populer-carousel" class="carousel slide" data-ride="carousel" style="height: inherit; position: relative;">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active " style="">
                            <?php
                            foreach ($news_video_popular as $k => $news_video1) {
                                $news_photo1_title = seoUrl($news_video1['News']['title_ind']);
                                if ($k < 6) {
                                    ?>
                                    <div class="news-module-ver">
                                        <div class="news-module-ver-img">
                                            <img src="<?= Router::url("{$news_video1['News']['thumbnail_path']}", true) ?>">
                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/white-video.png", true) ?>" style="width:50px !important;height:50px !important;position: absolute; top: 50px; left: 230px;">
                                        </div>
                                        <div class="news-module-ver-content font-sourceSansPro">
                                            <div class="news-module-ver-etc">
                                                <div class="news-module-ver-time pull-left">
                                                    Telah dilihat <?= $news_video1['News']['hits'] ?> kali
                                                </div>
                                            </div>

                                            <div class="news-module-ver-title edit-height-ver-title">
                                                <a href="<?= Router::url("/video/{$news_video1['News']['id']}/$news_photo1_title", true) ?>"> <?= $news_video1['News']['title_ind'] ?> </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>                       

                        <div class="item" style="">
                            <?php
                            foreach ($news_video_popular as $k => $news_video2) {
                                $news_photo2_title = seoUrl($news_video2['News']['title_ind']);
                                if ($k > 5 && $k < 12) {
                                    ?>
                                    <div class="news-module-ver">
                                        <div class="news-module-ver-img">
                                            <img src="<?= Router::url("{$news_video2['News']['thumbnail_path']}", true) ?>">
                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/white-video.png", true) ?>" style="width:50px !important;height:50px !important; position: absolute; top: 50px; left: 230px; ">
                                        </div>

                                        <div class="news-module-ver-content font-sourceSansPro">
                                            <div class="news-module-ver-etc">
                                                <div class="news-module-ver-time pull-left">
                                                    Telah dilihat <?= $news_video2['News']['hits'] ?> kali
                                                </div>
                                            </div>

                                            <div class="news-module-ver-title edit-height-ver-title">
                                                <a href="<?= Router::url("/video/{$news_video2['News']['id']}/$news_photo2_title", true) ?>"> <?= $news_video2['News']['title_ind'] ?> </a>
                                            </div>
                                        </div>
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
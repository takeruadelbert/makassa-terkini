<div class="container-fluid">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 index-contentBack">
                <div class="news-head-bt">
                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/video-terkini.png", true)?>" style="width: auto; height: 35px;">

                    <div class="redspan">
                        <div class="greyspan">
                        </div>
                    </div>

                    <div style="position: relative; float: right; text-align: center; margin-top: -4px;">
                        <a href="<?= Router::url("/galeri-video/lihat-semua", true) ?>" class="pull-left">
                            <span style="font-size: 12px; color: #ec2227; margin-right: 15px;">LIHAT SEMUA</span>
                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/all-window-red.png", true)?>" height="10px">
                        </a>
                    </div>
                </div>


                <div class="s-video-terkini-container" style="text-align: justify;">
                    <?php
                    foreach($recentVideoNews as $recentVideos) {
                        $recent_video_news_title = seoUrl($recentVideos['News']['title_ind']);
                    ?>                    
                    <div class="news-module-ver">
                        <a href="<?= Router::url("/video/{$recentVideos['News']['id']}/$recent_video_news_title") ?>">
                            <div class="news-module-ver-img">
                                <img src="<?= Router::url($recentVideos['News']['thumbnail_path'], true) ?>">
                                <span class="duration">
                                    <?php
                                    App::import("Vendor", "getid3", array('file' => 'getid3/getid3.php'));
                                    $getid3 = new getID3;
                                    $getid3->analyze(WWW_ROOT . ltrim(str_replace('\\', '/', $recentVideos['News']['video_path']), "/"));
                                    echo $getid3->info["playtime_string"];
                                    ?>
                                </span>
                            </div>

                            <div class="news-module-ver-content font-sourceSansPro">
                                <div class="news-module-ver-etc">
                                    <div class="news-module-ver-time pull-left">
                                        Telah dilihat <?= $recentVideos['News']['hits'] ?> kali
                                    </div>
                                </div>

                                <div class="news-module-ver-title">
                                    <?= $recentVideos['News']['title_ind'] ?>
                                </div>

                            </div>
                        </a>
                    </div>                    
                    <?php
                    }
                    ?>                    
                </div>
            </div>
        </div>
    </div>
</div>



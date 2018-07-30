<div class="row backgroundContent">
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 index-contentBack">
                    <div class="news-wrapper-pop">
                        <div class="news-wrapper-pop-header">
                            <div class="news-wrapper-pop-left">
                                <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/berita-pop.png", true) ?>">
                            </div>

                            <div class="news-wrapper-pop-right">
                                <a href="<?= Router::url("/berita-populer", true) ?>" style="color: white;">LIHAT SEMUA</a> <a href="<?= Router::url("/berita-populer", true) ?>"><img src="<?= Router::url("/front_file/makassar-terkini/img/icon/all-window.png", true) ?>"></a>
                            </div>
                        </div>
                        <?php
                            foreach ($newsPopulars as $populars) {
                                $news_popular_title = seoUrl($populars['News']['title_ind']);
                        ?>
                        <div class="news-module-hor-pop">
                            <div class="news-module-hor-img-pop">
                                <?php
                                    if($populars['News']['news_type_id'] == 1) {
                                ?>
                                <a href="<?= Router::url("/berita/{$populars['News']['id']}/$news_popular_title", true) ?>">
                                <?php
                                    } else if($populars['News']['news_type_id'] == 2) {
                                ?>
                                <a href="<?= Router::url("/foto/{$populars['News']['id']}/$news_popular_title", true) ?>">
                                <?php
                                    } else {
                                ?>
                                <a href="<?= Router::url("/video/{$populars['News']['id']}/$news_popular_title", true) ?>">
                                <?php
                                    }
                                ?>
                                    <img class="center-img" src="<?= Router::url("{$populars['News']['thumbnail_path']}", true) ?>">
                                </a>
                            </div>

                            <div class="news-module-hor-content-pop font-sourceSansPro">
                                <div class="news-module-hor-title-pop">
                                    <?php
                                    if($populars['News']['news_type_id'] == 1) {
                                    ?>
                                    <a href="<?= Router::url("/berita/{$populars['News']['id']}/$news_popular_title", true) ?>" style="color:white;">
                                    <?php
                                        } else if($populars['News']['news_type_id'] == 2) {
                                    ?>
                                    <a href="<?= Router::url("/foto/{$populars['News']['id']}/$news_popular_title", true) ?>" style="color:white;">
                                    <?php
                                        } else {
                                    ?>
                                    <a href="<?= Router::url("/video/{$populars['News']['id']}/$news_popular_title", true) ?>" style="color:white;">
                                    <?php
                                        }
                                    ?>
                                        <?= $populars['News']['title_ind'] ?>
                                    </a>
                                </div>

                                <div class="news-module-hor-desc-pop">
                                    Dilihat <?= $populars['News']['hits'] ?> kali 
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
<div class="container-fluid">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 index-contentBack">
                <div class="news-head-terkait">
                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/berita-terkait.png", true) ?>">

                    <div class="redspan">
                        <div class="greyspan" style="width: 540px !important;">
                        </div>
                    </div>
                </div>
                <div id="rekomendasi-carousel" class="carousel slide" data-ride="carousel" style="height: inherit; position: relative;">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                        <?php
                        foreach ($similar_news as $k => $similar) {
                            $similar_news_title = seoUrl($similar[0]['News']['title_ind']);
                            if($k < 6) {
                        ?>                        
                            <div class="news-module-ver news-module-verRekomendasi">
                                <div class="news-module-ver-img">
                                    <?php
                                    if($similar[0]['News']['news_type_id'] == 1) {
                                    ?>
                                    <a href="<?= Router::url("/berita/{$similar[0]['News']['id']}/$similar_news_title", true) ?>"> 
                                    <?php
                                    } else if($similar[0]['News']['news_type_id'] == 2) {
                                    ?>
                                    <a href="<?= Router::url("/foto/{$similar[0]['News']['id']}/$similar_news_title", true) ?>">  
                                    <?php
                                    } else {
                                    ?>
                                    <a href="<?= Router::url("/video/{$similar[0]['News']['id']}/$similar_news_title", true) ?>">
                                    <?php
                                    }
                                    ?>
                                        <img src="<?= str_replace('\\', '/', Router::url("{$similar[0]['News']['thumbnail_path']}", true)) ?>" width="100%" height="150px">
                                    </a>
                                </div>
                                <div class="news-module-ver-content font-sourceSansPro">
                                    <div class="news-module-ver-title">
                                        <?php
                                        if($similar[0]['News']['news_type_id'] == 1) {
                                        ?>
                                        
                                        <a href="<?= Router::url("/berita/{$similar[0]['News']['id']}/$similar_news_title", true) ?>"> 
                                            
                                        <?php
                                        } else if($similar[0]['News']['news_type_id'] == 2) {
                                        ?> 
                                        
                                        <a href="<?= Router::url("/foto/{$similar[0]['News']['id']}/$similar_news_title", true) ?>">   
                                            
                                        <?php
                                        } else {
                                        ?>
                                        <a href="<?= Router::url("/video/{$similar[0]['News']['id']}/$similar_news_title", true) ?>">
                                           
                                        <?php
                                        }
                                        ?>
                                            <?= $similar[0]['News']['title_ind'] ?>
                                        </a>
                                    </div>

                                    <div class="news-module-ver-etc">
                                        <?php
                                            if ($similar[0]['News']['is_sponsor'] == 1) {
                                        ?>
                                        <div class="news-module-ver-tag pull-left">
                                            SPONSOR
                                        </div>
                                        <?php
                                            }
                                        ?>
                                        <div class="news-module-ver-time pull-left">
                                            <?= $this->Html->cvtWaktuInter($similar[0]['News']['publish_date']) ?>
                                        </div>
                                    </div>
                                </div>
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
                        foreach ($similar_news as $k => $similar) {
                            $similar_news_title = seoUrl($similar[0]['News']['title_ind']);
                            if($k > 5 && $k < 12) {
                        ?>                        
                            <div class="news-module-ver news-module-verRekomendasi">
                                <div class="news-module-ver-img">
                                    <?php
                                    if($similar[0]['News']['news_type_id'] == 1) {
                                    ?>
                                    <a href="<?= Router::url("/berita/{$similar[0]['News']['id']}/$similar_news_title", true) ?>"> 
                                    <?php
                                    } else if($similar[0]['News']['news_type_id'] == 2) {
                                    ?>
                                    <a href="<?= Router::url("/foto/{$similar[0]['News']['id']}/$similar_news_title", true) ?>">   
                                    <?php
                                    } else {
                                    ?>
                                    <a href="<?= Router::url("/video/{$similar[0]['News']['id']}/$similar_news_title", true) ?>">
                                    <?php
                                    }
                                    ?>
                                        <img src="<?= str_replace('\\', '/', Router::url("{$similar[0]['News']['thumbnail_path']}", true)) ?>" width="100%" height="150px">
                                    </a>
                                </div>
                                <div class="news-module-ver-content font-sourceSansPro">
                                    <div class="news-module-ver-title">
                                        <?php
                                        if($similar[0]['News']['news_type_id'] == 1) {
                                        ?>
                                        <p style = "text-overflow: ellipsis; white-space: nowrap; overflow:hidden">
                                        <a href="<?= Router::url("/berita/{$similar[0]['News']['id']}/$similar_news_title", true) ?>">
                                        </p>
                                        <?php
                                        } else if($similar[0]['News']['news_type_id'] == 2) {
                                        ?>
                                        <p style = "text-overflow: ellipsis; white-space: nowrap; overflow:hidden">
                                        <a href="<?= Router::url("/foto/{$similar[0]['News']['id']}/$similar_news_title", true) ?>">   
                                            </p>
                                        <?php
                                        } else {
                                        ?>
                                        <p style = "text-overflow: ellipsis; white-space: nowrap; overflow:hidden">
                                        <a href="<?= Router::url("/video/{$similar[0]['News']['id']}/$similar_news_title", true) ?>">
                                            </p>
                                        <?php
                                        }
                                        ?>
                                            <?= $similar[0]['News']['title_ind'] ?>
                                        </a>
                                    </div>
                                    <div class="news-module-ver-etc">
                                        <?php
                                            if ($similar[0]['News']['is_sponsor'] == 1) {
                                        ?>
                                        <div class="news-module-ver-tag pull-left">
                                            SPONSOR
                                        </div>
                                        <?php
                                            }
                                        ?>

                                        <div class="news-module-ver-time pull-left">
                                             <?= $this->Html->cvtWaktuInter($similar[0]['News']['publish_date']) ?>
                                        </div>
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

        <div class="row" style="margin-bottom: 15px;">
            <div style="width: calc(100% - 70px); display: block; float: left; height: 2px; background: #57585a;"></div>
            <div style="position: relative; float: left; width: 50px; text-align: center; margin-top: -10px;">
                <a class="s-tick" href="#rekomendasi-carousel" role="button" data-slide="prev" style="top: 7px; right: 36px;">
                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/news-tick-left.png", true) ?>">
                </a>
                <a class="s-tick" href="#rekomendasi-carousel" role="button" data-slide="next" style="top: 7px; right: 16px;">
                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/news-tick-right.png", true) ?>">
                </a>
            </div>
            <div style="width: 20px; display: block; float: right; height: 2px; background: #57585a;"></div>
        </div>
    </div>
</div>
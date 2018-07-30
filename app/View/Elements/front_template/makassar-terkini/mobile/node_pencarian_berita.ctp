<div class="row" id="news">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div id="data-scroll" class="col-md-12 col-sm-12 col-xs-12 boxOut-searchBerita scroll" data-ui="jscroll-default" data-container=".boxOut-beritaBanyak" data-template="#news-preview-nodes" data-order="News.publish_date desc" data-limit="3" data-url="<?= Router::url("/fronts/ajax_news", true); ?>" data-current-page="1" data-search="<?= $this->request->query['term'] ?>">
            <div class="row" id="berita">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-indexContent">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-beritaBanyak">
                            <?php
                            foreach($searchResult as $k => $results) {
                                $search_result_title = seoUrl($results['News']['title_ind']);
                                if($k % 4 == 0 && $k != 0) {
                            ?>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-advertise center flex font-sourceSansProSemibold">
                                    ADVERTISE
                                </div>
                            </div>
                            <?php
                                }                                                    
                            ?>
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-berita">
                                <div class="col-md-4 col-sm-4 col-xs-4 boxOut-beritaFoto">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-beritaFoto">
                                        <?php
                                        if($results['News']['news_type_id'] == 1) {
                                        ?>
                                        <a href="<?= Router::url("/m/berita/{$results['News']['id']}/$search_result_title") ?>">
                                        <?php
                                        } else if($results['News']['news_type_id'] == 2) {
                                        ?>
                                        <a href="<?= Router::url("/m/foto/{$results['News']['id']}/$search_result_title") ?>">
                                        <?php
                                        } else {
                                        ?>
                                        <a href="<?= Router::url("/m/video/{$results['News']['id']}/$search_result_title") ?>">
                                        <?php
                                        }
                                        ?>
                                            <img src="<?= Router::url("{$results['News']['thumbnail_path']}", true) ?>" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8 boxOut-beritaTitle font-sourceSansPro center-news">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-beritaTitle font-arial">
                                                <?php
                                                if($results['News']['news_type_id'] == 1) {
                                                ?>
                                                <a href="<?= Router::url("/m/berita/{$results['News']['id']}/$search_result_title") ?>">
                                                <?php
                                                } else if($results['News']['news_type_id'] == 2) {
                                                ?>
                                                <a href="<?= Router::url("/m/foto/{$results['News']['id']}/$search_result_title") ?>">
                                                <?php
                                                } else {
                                                ?>
                                                <a href="<?= Router::url("/m/video/{$results['News']['id']}/$search_result_title") ?>">
                                                <?php
                                                }
                                                ?>
                                                    <?= $results['News']['title_ind'] ?>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-beritaJam">
                                                <div class="box-beritaKategori">
                                                    <?= $results['NewsCategory']['name'] ?>
                                                </div>
                                                <div class="box-beritaJamKategori">
                                                    <?= $this->Html->getTimeago(strtotime($results["News"]['news_date'])) ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- jika ingin memunculkan tanda sponsor hilangkan class "hidden", jika ingin hilangkan sponsor tambah class "hidden" -->
                                        <?php
                                            if ($results['News']['is_sponsor'] == 1) {
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

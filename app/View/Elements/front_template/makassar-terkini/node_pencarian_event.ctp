<div class="container-fluid">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 index-contentBack">
                <div class="news-head-bt">
                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/pencarian-berita.png", true) ?>" style="width: auto; height: 35px;">

                    <div class="redspan">
                        <div class="greyspan" style="width: 544px;">
                        </div>
                    </div>
                </div>
                <div class="s-berita-lebih-banyak-container">
                    <?php
                    foreach ($searchResult as $res) {
                        $event_search_title = seoUrl($res['Event']['title_ind']);
                        ?>
                        <a href="<?= Router::url("/event/{$res['Event']['id']}/$event_search_title", true); ?>" class="news-module-hor">
                            <div class="news-module-hor-img">
                                <img src="<?= Router::url("{$res['EventImage'][0]['path']}", true); ?>"/>
                            </div>
                            <div class="news-module-hor-content font-sourceSansPro">
                                <div class="news-module-hor-title">
                                    <?= $res['Event']['title_ind']; ?>
                                </div>
                                <div class="news-module-hor-desc">
                                    <?php
                                    $title = strip_tags(html_entity_decode($res['Event']['sinopsys_ind']));
                                    $length = 130;
                                    if(strlen($title) > $length) {
                                        echo substr($title, 0, $length) . "...";
                                    } else {
                                        echo $title;
                                    }
                                    ?>
                                </div>
                                <div class="news-module-hor-etc">
                                    
                                    <div class="news-module-hor-icon pull-left">
                                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/clock.png", true); ?>">
                                    </div>
                                    <div class="news-module-hor-time pull-left">
                                        <?= $this->Html->getTimeago(strtotime($res["Event"]['created'])); ?>
                                    </div>
                                    <div class="news-module-hor-time pull-left">
                                        <?php
                                        for($i = 0; $i < 10; $i++) {
                                            echo "&nbsp;";
                                        }
                                        ?>
                                    </div>
                                    <?php
                                        if ($res['Event']['is_sponsor'] == 1) {
                                    ?>
                                    <div class="news-module-hor-tag pull-left">
                                        SPONSOR
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </a>
                        <?php
                    }
                    ?>                    
                </div>
            </div>
        </div>
    </div>
</div>
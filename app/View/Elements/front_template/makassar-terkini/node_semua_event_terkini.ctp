<div class="container-fluid">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 index-contentBack">
                <div class="news-head-bt">
                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/event-terkini.png", true) ?>" style="width: auto; height: 35px;">

                    <div class="redspan">
                        <div class="greyspan" style="width: 544px;">
                        </div>
                    </div>
                </div>
                <div class="s-berita-lebih-banyak-container">
                    <?php
                    foreach ($eventTerkini as $res) {
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
                                    <?= strip_single("a",$res['Event']['sinopsys_ind']); ?>
                                </div>
                                <div class="news-module-hor-etc">
                                    <?php
                                        if ($res['Event']['is_sponsor'] == 1) {
                                    ?>
                                    <div class="news-module-hor-tag pull-left">
                                        SPONSOR
                                        <div class="orange-tooltip">
                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/orgTooltip.png", true); ?>">
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                    <div class="news-module-hor-info pull-left">
                                        Info kota
                                    </div>
                                    <div class="news-module-hor-icon pull-left">
                                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/clock.png", true); ?>">
                                    </div>
                                    <div class="news-module-hor-time pull-left">
                                        <?= $this->Html->getTimeago(strtotime($res["Event"]['created'])); ?>
                                    </div>
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
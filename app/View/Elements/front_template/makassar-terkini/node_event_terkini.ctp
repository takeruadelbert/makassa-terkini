<div class="row backgroundContent">
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 index-contentBack">

                    <div class="news-wrapper-terkini">
                        <div class="news-wrapper-terkini-header">
                            <div class="news-wrapper-terkini-left">
                                EVENT TERKINI
                            </div>

                            <div class="news-wrapper-terkini-right">
                                <a href="<?= Router::url("/event", true) ?>" style="color: white;">LIHAT SEMUA</a> <a href="<?= Router::url("/event", true) ?>"><img src="<?= Router::url("/front_file/makassar-terkini/img/icon/all-window.png", true) ?>"></a>
                            </div>
                        </div>
                        
                        <?php
                            foreach ($events as $recent_events) {
                                $events_title = seoUrl($recent_events['Event']['title_ind']);
                        ?>
                        <div class="news-module-ver-terkini">
                            <div class="news-module-ver-img-terkini">
                                <a href="<?= Router::url("/event/{$recent_events['Event']['id']}/$events_title}", true) ?>">
                                    <img src="<?= Router::url("{$recent_events['EventImage'][0]['path']}", true) ?>" width="270" height="128">
                                </a>
                            </div>

                            <div class="news-module-ver-content-terkini font-sourceSansPro">
                                <div class="news-module-ver-title-terkini">
                                    <a href="<?= Router::url("/event/{$recent_events['Event']['id']}/$events_title}", true) ?>" style="color: white;"> 
                                        <?= $recent_events['Event']['title_ind'] ?>
                                    </a>
                                </div>

                                <div class="news-module-ver-etc-terkini">
                                    

                                    <div class="news-module-ver-time-terkini pull-left">
                                        <?= $this->Html->cvtWaktuInter($recent_events['Event']['created']) ?>
                                    </div>
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

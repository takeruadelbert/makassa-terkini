<!--Content-->
<!--==================================================-->
<section>
    <div class="container">
        <div class="row section-color">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-marginTop">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleYear">
                            <div class="col-md-12 col-sm-12 col-xs-12 box-titleYear font-sourceSansProSemibold">
                                Event 2016
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakContent">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-infoProfil">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-judul flex">
                                                <div class="col-md-11 col-sm-11 col-xs-11 font-sourceSansProSemibold">
                                                    Januari
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-1 box-circleUp">
                                                    <img class="button-show" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowDown-grey.png", true)?>" />
                                                    <img class="button-hide hidden" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowUp-grey.png", true)?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-popup-pilihan">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-infoUser-hide popup-infoUser">
                                                    <?php
                                                    foreach($events as $jan_event) {
                                                        $jan_event_title = seoUrl($jan_event['Event']['title_ind']);
                                                        $bulan = $this->Html->getBulan($jan_event['Event']['created']);
                                                        if($bulan == "Januari") {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakEvent">
                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-pictureEvent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-pictureEvent">
                                                                    <a href="<?= Router::url("/m/event/{$jan_event['Event']['id']}/$jan_event_title") ?>">
                                                                        <img src="<?= Router::url("{$jan_event['EventImage'][0]['path']}", true) ?>" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-eventContent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleEvent font-sourceSansProBold">
                                                                            <a href="<?= Router::url("/m/event/{$jan_event['Event']['id']}/$jan_event_title") ?>">
                                                                                <?= $jan_event['Event']['title_ind'] ?>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textEvent font-sourceSansPro">
                                                                            <?= $jan_event['Event']['sinopsys_ind'] ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keteranganEvent font-sourceSansPro">
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-lokasi.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <span class="google-findlocationname" data-lat="<?= $jan_event['Event']['latitude'] ?>" data-long="<?= $jan_event['Event']['longitude'] ?>"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-tanggal.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtTanggal($jan_event['Event']['date']) ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-jam.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtJam($jan_event['Event']['time']) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-infoProfil">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-judul flex">
                                                <div class="col-md-11 col-sm-11 col-xs-11 font-sourceSansProSemibold">
                                                    Februari
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-1 box-circleUp">
                                                    <img class="button-show" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowDown-grey.png", true)?>" />
                                                    <img class="button-hide hidden" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowUp-grey.png", true)?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-popup-pilihan">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-infoUser-hide popup-infoUser">
                                                    <?php
                                                    foreach($events as $feb_event) {
                                                        $feb_event_title = seoUrl($feb_event['Event']['title_ind']);
                                                        $bulan = $this->Html->getBulan($feb_event['Event']['created']);
                                                        if($bulan == "Februari") {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakEvent">
                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-pictureEvent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-pictureEvent">
                                                                    <a href="<?= Router::url("/m/event/{$feb_event['Event']['id']}/$feb_event_title") ?>">
                                                                        <img src="<?= Router::url("{$feb_event['EventImage'][0]['path']}", true) ?>" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-eventContent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleEvent font-sourceSansProBold">
                                                                            <a href="<?= Router::url("/m/event/{$feb_event['Event']['id']}/$feb_event_title") ?>">
                                                                                <?= $feb_event['Event']['title_ind'] ?>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textEvent font-sourceSansPro">
                                                                            <?= $feb_event['Event']['sinopsys_ind'] ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keteranganEvent font-sourceSansPro">
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-lokasi.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <span class="google-findlocationname" data-lat="<?= $feb_event['Event']['latitude'] ?>" data-long="<?= $feb_event['Event']['longitude'] ?>"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-tanggal.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtTanggal($feb_event['Event']['date']) ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-jam.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtJam($feb_event['Event']['time']) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-infoProfil">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-judul flex">
                                                <div class="col-md-11 col-sm-11 col-xs-11 font-sourceSansProSemibold">
                                                    Maret
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-1 box-circleUp">
                                                    <img class="button-show" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowDown-grey.png", true)?>" />
                                                    <img class="button-hide hidden" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowUp-grey.png", true)?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-popup-pilihan">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-infoUser-hide popup-infoUser">                                                    
                                                    <?php
                                                    foreach($events as $march_event) {
                                                        $march_event_title = seoUrl($march_event['Event']['title_ind']);
                                                        $bulan = $this->Html->getBulan($march_event['Event']['created']);
                                                        if($bulan == "Maret") {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakEvent">
                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-pictureEvent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-pictureEvent">
                                                                    <a href="<?= Router::url("/m/event/{$march_event['Event']['id']}/$march_event_title") ?>">
                                                                        <img src="<?= Router::url("{$march_event['EventImage'][0]['path']}", true) ?>" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-eventContent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleEvent font-sourceSansProBold">
                                                                            <a href="<?= Router::url("/m/event/{$march_event['Event']['id']}/$march_event_title") ?>">
                                                                                <?= $march_event['Event']['title_ind'] ?>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textEvent font-sourceSansPro">
                                                                            <?= $march_event['Event']['sinopsys_ind'] ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keteranganEvent font-sourceSansPro">
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-lokasi.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <span class="google-findlocationname" data-lat="<?= $march_event['Event']['latitude'] ?>" data-long="<?= $march_event['Event']['longitude'] ?>"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-tanggal.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtTanggal($march_event['Event']['date']) ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-jam.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtJam($march_event['Event']['time']) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-infoProfil">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-judul flex">
                                                <div class="col-md-11 col-sm-11 col-xs-11 font-sourceSansProSemibold">
                                                    April
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-1 box-circleUp">
                                                    <img class="button-show" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowDown-grey.png", true)?>" />
                                                    <img class="button-hide hidden" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowUp-grey.png", true)?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-popup-pilihan">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-infoUser-hide popup-infoUser">
                                                    <?php
                                                    foreach($events as $april_event) {
                                                        $april_event_title = seoUrl($april_event['Event']['title_ind']);
                                                        $bulan = $this->Html->getBulan($april_event['Event']['created']);
                                                        if($bulan == "April") {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakEvent">
                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-pictureEvent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-pictureEvent">
                                                                    <a href="<?= Router::url("/m/event/{$april_event['Event']['id']}/$april_event_title") ?>">
                                                                        <img src="<?= Router::url("{$april_event['EventImage'][0]['path']}", true) ?>" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-eventContent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleEvent font-sourceSansProBold">
                                                                            <a href="<?= Router::url("/m/event/{$april_event['Event']['id']}/$april_event_title") ?>">
                                                                                <?= $april_event['Event']['title_ind'] ?>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textEvent font-sourceSansPro">
                                                                            <?= $april_event['Event']['sinopsys_ind'] ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keteranganEvent font-sourceSansPro">
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-lokasi.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <span class="google-findlocationname" data-lat="<?= $april_event['Event']['latitude'] ?>" data-long="<?= $april_event['Event']['longitude'] ?>"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-tanggal.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtTanggal($april_event['Event']['date']) ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-jam.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtJam($april_event['Event']['time']) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-infoProfil">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-judul flex">
                                                <div class="col-md-11 col-sm-11 col-xs-11 font-sourceSansProSemibold">
                                                    Mei
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-1 box-circleUp">
                                                    <img class="button-show" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowDown-grey.png", true)?>" />
                                                    <img class="button-hide hidden" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowUp-grey.png", true)?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-popup-pilihan">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-infoUser-hide popup-infoUser">                                                    
                                                    <?php
                                                    foreach($events as $may_event) {
                                                        $may_event_title = seoUrl($may_event['Event']['title_ind']);
                                                        $bulan = $this->Html->getBulan($may_event['Event']['created']);
                                                        if($bulan == "Mei") {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakEvent">
                                                            <div class="col-md-5 col-sm-5 col-xs-5 boxOut-pictureEvent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-pictureEvent">
                                                                    <a href="<?= Router::url("/m/event/{$may_event['Event']['id']}/$may_event_title") ?>">
                                                                        <img src="<?= Router::url("{$may_event['EventImage'][0]['path']}", true) ?>" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-7 col-sm-7 col-xs-7 boxOut-eventContent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleEvent font-sourceSansProBold">
                                                                            <a href="<?= Router::url("/m/event/{$may_event['Event']['id']}/$may_event_title") ?>">
                                                                                <?= $may_event['Event']['title_ind'] ?>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textEvent font-sourceSansPro">
                                                                            <?= $may_event['Event']['sinopsys_ind'] ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keteranganEvent font-sourceSansPro">
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-lokasi.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <span class="google-findlocationname" data-lat="<?= $may_event['Event']['latitude'] ?>" data-long="<?= $may_event['Event']['longitude'] ?>"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-5 col-sm-5 col-xs-5 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-tanggal.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtTanggal($may_event['Event']['date']) ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-sm-3 col-xs-3 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-jam.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtJam($may_event['Event']['time']) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-infoProfil">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-judul flex">
                                                <div class="col-md-11 col-sm-11 col-xs-11 font-sourceSansProSemibold">
                                                    Juni
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-1 box-circleUp">
                                                    <img class="button-show" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowDown-grey.png", true)?>" />
                                                    <img class="button-hide hidden" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowUp-grey.png", true)?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-popup-pilihan">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-infoUser-hide popup-infoUser">                                                    
                                                    <?php
                                                    foreach($events as $june_event) {
                                                        $june_event_title = seoUrl($june_event['Event']['title_ind']);
                                                        $bulan = $this->Html->getBulan($june_event['Event']['created']);
                                                        if($bulan == "Juni") {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakEvent">
                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-pictureEvent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-pictureEvent">
                                                                    <a href="<?= Router::url("/m/event/{$june_event['Event']['id']}/$june_event_title") ?>">
                                                                        <img src="<?= Router::url("{$june_event['EventImage'][0]['path']}", true) ?>" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-eventContent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleEvent font-sourceSansProBold">
                                                                            <a href="<?= Router::url("/m/event/{$june_event['Event']['id']}/$june_event_title") ?>">
                                                                                <?= $june_event['Event']['title_ind'] ?>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textEvent font-sourceSansPro">
                                                                            <?= $june_event['Event']['sinopsys_ind'] ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keteranganEvent font-sourceSansPro">
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-lokasi.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <span class="google-findlocationname" data-lat="<?= $june_event['Event']['latitude'] ?>" data-long="<?= $june_event['Event']['longitude'] ?>"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-tanggal.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtTanggal($june_event['Event']['date']) ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-jam.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtJam($june_event['Event']['time']) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-infoProfil">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-judul flex">
                                                <div class="col-md-11 col-sm-11 col-xs-11 font-sourceSansProSemibold">
                                                    Juli
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-1 box-circleUp">
                                                    <img class="button-show" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowDown-grey.png" , true)?>"/>
                                                    <img class="button-hide hidden" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowUp-grey.png", true)?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-popup-pilihan">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-infoUser-hide popup-infoUser">                                                    
                                                    <?php
                                                    foreach($events as $july_event) {
                                                        $july_event_title = seoUrl($july_event['Event']['title_ind']);
                                                        $bulan = $this->Html->getBulan($july_event['Event']['created']);
                                                        if($bulan == "Juli") {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakEvent">
                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-pictureEvent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-pictureEvent">
                                                                    <a href="<?= Router::url("/m/event/{$july_event['Event']['id']}/$july_event_title") ?>">
                                                                        <img src="<?= Router::url("{$july_event['EventImage'][0]['path']}", true) ?>" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-eventContent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleEvent font-sourceSansProBold">
                                                                            <a href="<?= Router::url("/m/event/{$july_event['Event']['id']}/$july_event_title") ?>">
                                                                                <?= $july_event['Event']['title_ind'] ?>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textEvent font-sourceSansPro">
                                                                            <?= $july_event['Event']['sinopsys_ind'] ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keteranganEvent font-sourceSansPro">
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-lokasi.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <span class="google-findlocationname" data-lat="<?= $july_event['Event']['latitude'] ?>" data-long="<?= $july_event['Event']['longitude'] ?>"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-tanggal.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtTanggal($july_event['Event']['date']) ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-jam.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtJam($july_event['Event']['time']) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-infoProfil">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-judul flex">
                                                <div class="col-md-11 col-sm-11 col-xs-11 font-sourceSansProSemibold">
                                                    Agustus
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-1 box-circleUp">
                                                    <img class="button-show" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowDown-grey.png", true)?>" />
                                                    <img class="button-hide hidden" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowUp-grey.png", true)?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-popup-pilihan">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-infoUser-hide popup-infoUser">                                                    
                                                    <?php
                                                    foreach($events as $aug_event) {
                                                        $aug_event_title = seoUrl($aug_event['Event']['title_ind']);
                                                        $bulan = $this->Html->getBulan($aug_event['Event']['created']);
                                                        if($bulan == "Agustus") {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakEvent">
                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-pictureEvent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-pictureEvent">
                                                                    <a href="<?= Router::url("/m/event/{$aug_event['Event']['id']}/$aug_event_title") ?>">
                                                                        <img src="<?= Router::url("{$aug_event['EventImage'][0]['path']}", true) ?>" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-eventContent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleEvent font-sourceSansProBold">
                                                                            <a href="<?= Router::url("/m/event/{$aug_event['Event']['id']}/$aug_event_title") ?>">
                                                                                <?= $aug_event['Event']['title_ind'] ?>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textEvent font-sourceSansPro">
                                                                            <?= $aug_event['Event']['sinopsys_ind'] ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keteranganEvent font-sourceSansPro">
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-lokasi.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <span class="google-findlocationname" data-lat="<?= $july_event['Event']['latitude'] ?>" data-long="<?= $july_event['Event']['longitude'] ?>"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-tanggal.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtTanggal($aug_event['Event']['date']) ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-jam.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtJam($aug_event['Event']['time']) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-infoProfil">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-judul flex">
                                                <div class="col-md-11 col-sm-11 col-xs-11 font-sourceSansProSemibold">
                                                    September
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-1 box-circleUp">
                                                    <img class="button-show" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowDown-grey.png", true)?>" />
                                                    <img class="button-hide hidden" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowUp-grey.png", true)?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-popup-pilihan">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-infoUser-hide popup-infoUser">                                                    
                                                    <?php
                                                    foreach($events as $sept_event) {
                                                        $sept_event_title = seoUrl($sept_event['Event']['title_ind']);
                                                        $bulan = $this->Html->getBulan($sept_event['Event']['created']);
                                                        if($bulan == "September") {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakEvent">
                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-pictureEvent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-pictureEvent">
                                                                    <a href="<?= Router::url("/m/event/{$sept_event['Event']['id']}/$sept_event_title") ?>">
                                                                        <img src="<?= Router::url("{$sept_event['EventImage'][0]['path']}", true) ?>" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-eventContent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleEvent font-sourceSansProBold">
                                                                            <a href="<?= Router::url("/m/event/{$sept_event['Event']['id']}/$sept_event_title") ?>">
                                                                                <?= $sept_event['Event']['title_ind'] ?>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textEvent font-sourceSansPro">
                                                                            <?= $sept_event['Event']['sinopsys_ind'] ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keteranganEvent font-sourceSansPro">
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-lokasi.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <span class="google-findlocationname" data-lat="<?= $aug_event['Event']['latitude'] ?>" data-long="<?= $aug_event['Event']['longitude'] ?>"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-tanggal.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtTanggal($sept_event['Event']['date']) ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-jam.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtJam($sept_event['Event']['time']) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-infoProfil">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-judul flex">
                                                <div class="col-md-11 col-sm-11 col-xs-11 font-sourceSansProSemibold">
                                                    Oktober
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-1 box-circleUp">
                                                    <img class="button-show" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowDown-grey.png", true)?>" />
                                                    <img class="button-hide hidden" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowUp-grey.png", true)?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-popup-pilihan">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-infoUser-hide popup-infoUser">                                                    
                                                    <?php
                                                    foreach($events as $okt_event) {
                                                        $okt_event_title = seoUrl($okt_event['Event']['title_ind']);
                                                        $bulan = $this->Html->getBulan($okt_event['Event']['created']);
                                                        if($bulan == "Oktober") {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakEvent">
                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-pictureEvent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-pictureEvent">
                                                                    <a href="<?= Router::url("/m/event/{$okt_event['Event']['id']}/$okt_event_title") ?>">
                                                                        <img src="<?= Router::url("{$okt_event['EventImage'][0]['path']}", true) ?>" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-eventContent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleEvent font-sourceSansProBold">
                                                                            <a href="<?= Router::url("/m/event/{$okt_event['Event']['id']}/$okt_event_title") ?>">
                                                                                <?= $okt_event['Event']['title_ind'] ?>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textEvent font-sourceSansPro">
                                                                            <?= $okt_event['Event']['sinopsys_ind'] ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keteranganEvent font-sourceSansPro">
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-lokasi.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <span class="google-findlocationname" data-lat="<?= $okt_event['Event']['latitude'] ?>" data-long="<?= $okt_event['Event']['longitude'] ?>"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-tanggal.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtTanggal($okt_event['Event']['date']) ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-jam.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtJam($okt_event['Event']['time']) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-infoProfil">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-judul flex">
                                                <div class="col-md-11 col-sm-11 col-xs-11 font-sourceSansProSemibold">
                                                    November
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-1 box-circleUp">
                                                    <img class="button-show" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowDown-grey.png", true)?>" />
                                                    <img class="button-hide hidden" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowUp-grey.png", true)?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-popup-pilihan">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-infoUser-hide popup-infoUser">                                                    
                                                    <?php
                                                    foreach($events as $nov_event) {
                                                        $nov_event_title = seoUrl($nov_event['Event']['title_ind']);
                                                        $bulan = $this->Html->getBulan($nov_event['Event']['created']);
                                                        if($bulan == "November") {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakEvent">
                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-pictureEvent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-pictureEvent">
                                                                    <a href="<?= Router::url("/m/event/{$nov_event['Event']['id']}/$nov_event_title") ?>">
                                                                        <img src="<?= Router::url("{$nov_event['EventImage'][0]['path']}", true) ?>" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-eventContent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleEvent font-sourceSansProBold">
                                                                            <a href="<?= Router::url("/m/event/{$nov_event['Event']['id']}/$nov_event_title") ?>">
                                                                                <?= $nov_event['Event']['title_ind'] ?>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textEvent font-sourceSansPro">
                                                                            <?= $nov_event['Event']['sinopsys_ind'] ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keteranganEvent font-sourceSansPro">
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-lokasi.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <span class="google-findlocationname" data-lat="<?= $nov_event['Event']['latitude'] ?>" data-long="<?= $nov_event['Event']['longitude'] ?>"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-tanggal.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtTanggal($nov_event['Event']['date']) ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-jam.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtJam($nov_event['Event']['time']) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-infoProfil">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-judul flex">
                                                <div class="col-md-11 col-sm-11 col-xs-11 font-sourceSansProSemibold">
                                                    Desember
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-1 box-circleUp">
                                                    <img class="button-show" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowDown-grey.png", true)?>" />
                                                    <img class="button-hide hidden" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowUp-grey.png" , true)?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-popup-pilihan">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-infoUser-hide popup-infoUser">                                                    
                                                    <?php
                                                    foreach($events as $dec_event) {
                                                        $dec_event_title = seoUrl($dec_event['Event']['title_ind']);
                                                        $bulan = $this->Html->getBulan($dec_event['Event']['created']);
                                                        if($bulan == "Desember") {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakEvent">
                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-pictureEvent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-pictureEvent">
                                                                    <a href="<?= Router::url("/m/event/{$dec_event['Event']['id']}/$dec_event_title") ?>">
                                                                        <img src="<?= Router::url("{$dec_event['EventImage'][0]['path']}", true) ?>" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-eventContent">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleEvent font-sourceSansProBold">
                                                                            <a href="<?= Router::url("/m/event/{$dec_event['Event']['id']}/$dec_event_title") ?>">
                                                                                <?= $dec_event['Event']['title_ind'] ?>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textEvent font-sourceSansPro">
                                                                            <?= $dec_event['Event']['sinopsys_ind'] ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keteranganEvent font-sourceSansPro">
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-lokasi.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <span class="google-findlocationname" data-lat="<?= $dec_event['Event']['latitude'] ?>" data-long="<?= $dec_event['Event']['longitude'] ?>"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-tanggal.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtTanggal($dec_event['Event']['date']) ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                                                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                                                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-jam.png", true)?>" />
                                                                                </div>
                                                                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                                                                    <?= $this->Html->cvtJam($dec_event['Event']['time']) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-buttonDesktop">
                    <div class="box-buttonDesktop center-block">
                        <button type="button" class="btn button-desktop font-openSans-bold"><a href="<?= Router::url("/", true) ?>">DESKTOP VERSION</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {

        $.material.init()

        $(".google-findlocationname").each(function(){
            var $this=$(this);
            var lat=$this.data("lat");
            var long=$this.data("long");
            $.ajax({
                url:"http://maps.googleapis.com/maps/api/geocode/json",
                dataType:"json",
                type:"GET",
                data:{sensor:false,latlng:lat+","+long},
                success:function(response){
                    var adrs=response.results[0].address_components[5].short_name;
                    $this.html(adrs);
                }
            })
        })
    })

</script>
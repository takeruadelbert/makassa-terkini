<style type="text/css">

    .box-content{
        background-color: white;
        padding-top: 20px;
        padding-bottom: 40px;
    }

    .box-tahun{
        color: #E62129;
        font-size: 60px;
        line-height: 50px;
    }

    .field-inputSearchEvent{
        height: 31px;
        border: 1px solid #CCCCCC;
        border-right: 0px none;
        border-radius: 5px 0px 0px 5px;
        box-shadow: none !important;
        font-size: 11px;
    }

    .field-inputSearchEvent:hover, .field-inputSearchEvent:focus {
        border: 1px solid #CCCCCC;
        border-right: 0px none;
    }

    .field-inputSearchEvent::-webkit-input-placeholder { 
        color: #CCCCCC !important; 
        font-style: italic !important; 
        font-size: 11px !important;
        font-weight: bold;
    }
    .field-inputSearchEvent:-moz-placeholder { 
        color: #CCCCCC !important; 
        font-style: italic !important;
        font-size: 11px !important;
        font-weight: bold;
    }
    .field-inputSearchEvent::-moz-placeholder { 
        color:#CCCCCC !important;
        font-style: italic !important;
        font-size: 11px !important;
        font-weight: bold;
    }
    .field-inputSearchEvent:-ms-input-placeholder { 
        color: #CCCCCC !important;
        font-style: italic !important;
        font-size: 11px !important;
        font-weight: bold;
    }

    .btn-cariEvent{
        font-size: 14px;
        height: 31px;
        width: 31px;
        padding-top: 7px;
        background-color: #1CC4BE;
        color: white;
        padding: 0px !important;
        border: 1px solid #CCCCCC;
        border-top-left-radius: 0px !important;
        border-bottom-left-radius: 0px !important;
        border-top-right-radius: 5px !important;
        border-bottom-right-radius: 5px !important;
        text-align: center;
    }

    .btn-cariEvent:hover{
        background-color: #15A19C !important;
        border-color: #CCCCCC !important;
        color: white !important;
    }

    .box-sortirEvent{
        padding-top: 5px;
        font-size: 12px;
        padding-left: 10px;
    }

    .boxOut-jarakHasil{
        padding-top: 15px;
    }

    .boxOut-sideLeft{
        padding-right: 25px;
    }

    .boxOut-lefLine{
        border-right: 5px solid #DCDDDD;
        padding-top: 15px;
    }

    .box-mounth{
        padding-right: 10px;
    }

    .mounth{
        font-size: 24px;
        padding-bottom: 10px;
    }

    .sideMenu-li a{
        color: black;
    }

    .sideMenu-li.active a{
        color: #2F318B !important;
    }

    .circleBlue{
        height: 23px;
        width: 23px;
        background-color: #2F318B;
        border-radius: 100%;
        border: 3px solid white;
        position: absolute;
        margin-left: 10px;
        margin-top: 7px;
        display: none;
    }

    .circleBlue.active{
        display: block;
    }

    .content-list{
        height: 550px;
    }

    .content-page {
    }
    .page-mark {
        color: #808080;
        font-size: 16px;
    }
    .page-numbering {
        text-align: right;
        font-size: 11px;
    }

    .show-page {
        display: none;
    }
    .show-page.active {
        display: block;
    }

    .boxOut-paddingContent{
        padding-right: 18px;
    }

    .boxOut-event{
        background-color: #F8FAFB;
        margin-bottom: 15px;
    }

    .box-fotoEvent{
        height: 156px;
        padding-right: 10px;
    }

    .box-fotoEvent img{
        height: 100%;
        width: 100%;
    }

    .boxOut-keteranganEvent{
        padding-left: 10px;
    }

    .judulEvent{
        font-size: 20px;
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .keteranganEvent{
        text-align: justify;
        font-size: 14px;
        color: #332C2B;
        height: 80px;
        overflow: hidden;
    }

    .keteranganEvent p{
        max-height: 80px;
        overflow: hidden;
    }

    .box-iconEvent{
        font-size: 8.5px;
        padding-top: 10px;
    }

    .box-iconEvent img{
        width: 13px;
        height: 13px;
        margin-right: 5px;
        margin-top: -5px;
    }

    .boxOut-rate{
        padding-left: 20px;
        padding-right: 20px;
        padding-top: 25px;
    }

    .rate-hotel{
        font-size: 37px;
        line-height: 30px;
        color: #303B85;
    }

    .range-hotel{
        font-size: 19px;
        color: #303B85;
    }

    .status-hotel{
        color: #303B85;
        line-height: 10px;
        font-size: 13px;
    }

    .star-hotel img{
        width: 10px;
        height: 9px;
    }

    .button-selengkapnya{
        background-color: #FF6600;
        color: white;
        width: 100%;
        font-size: 14.5px;
        height: 37px;
        border-radius: 5px;
        padding: 0px;
        text-align: left;
        margin-top: 10px;
        text-align: center;
    }

    .button-selengkapnya:hover{
        background-color: #E65E03;
    }

    .button-selengkapnya img{
        height: 15px;
        padding-left: 10px;
    }




    .pagenum {
        width: 16px;
        height: 16px;
        text-align: center;
        display: inline-block;
        background-color: #cccccc;
        color: white;
        border-radius: 2px;
    }
    .pagenum.active {
        background-color: #1CC4BE;
    }
    .pagenum:focus {
        color: white;
        background-color: #1CC4BE;
    }
    .pagenum:hover {
        color: white;
        background-color: #1CC4BE;
        transition-duration: 0.5s;
    }

    .dropdown-konfirmasiPembayaran, .dropdown-konfirmasiPembayaran:focus{
        height:20px;
        width: 130px;
        border-radius: 0px;
        padding: 0px 5px;
        background-color: white;
        border: none !important;
        box-shadow: none;
        color: #757475;
        font-size: 11px;
        font-style: italic;
        float: left;
    }


    .box-sortirEvent select {
        border: none !important;
        -webkit-appearance: none;
        -moz-appearance: none;
        /*            background: url('../img/icon/arrow-downBlack.png') no-repeat;*/
        background-position: 97% 50%;
        text-indent: 0.01px;
        text-overflow: "";
    }

    .adv-bottom{
        margin-top: 20px;
        margin-bottom: 0px !important;
    }
</style>
<?php
$now = new DateTime();
?>
<!--Content-->
<!--==================================================-->
<section class="s-main-content">
    <div class="s-fancy-header-red">
        <span class="s-title">Event Terkini</span>
    </div>
    <span class="clearfix"></span>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content">
                <div class="col-md-12 col-sm-12 col-xs-12 box-content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 flex">
                                <div class="col-md-3 col-sm-3 col-xs-3 box-tahun font-oswald-demiBold center">
                                    2016
                                </div>
                                <form type="GET" action="<?= Router::url("/event_search") ?>">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control font-openSans field-inputSearchEvent" placeholder="Ketik nama event" name="term">
                                            <div class="input-group-btn">
                                                <button class="btn btn-cariEvent" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakHasil">
                                <div class="persen20 boxOut-sideLeft">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-lefLine" id="sideMenu-profil">
                                        <ul class="nav nav-profil">
                                            <?php
                                            $janActive = "";
                                            $febActive = "";
                                            $marActive = "";
                                            $aprilActive = "";
                                            $meiActive = "";
                                            $juniActive = "";
                                            $juliActive = "";
                                            $agusActive = "";
                                            $septActive = "";
                                            $oktoActive = "";
                                            $novActive = "";
                                            $desActive = "";
                                            $currentMonth = date("F");
                                            if (!empty($this->request->query['bulan'])) {
                                                if ($this->request->query['bulan'] == 1) {
                                                    $janActive = "active";
                                                } else if ($this->request->query['bulan'] == 2) {
                                                    $febActive = "active";
                                                } else if ($this->request->query['bulan'] == 3) {
                                                    $marActive = "active";
                                                } else if ($this->request->query['bulan'] == 4) {
                                                    $aprilActive = "active";
                                                } else if ($this->request->query['bulan'] == 5) {
                                                    $meiActive = "active";
                                                } else if ($this->request->query['bulan'] == 6) {
                                                    $juniActive = "active";
                                                } else if ($this->request->query['bulan'] == 7) {
                                                    $juliActive = "active";
                                                } else if ($this->request->query['bulan'] == 8) {
                                                    $agusActive = "active";
                                                } else if ($this->request->query['bulan'] == 9) {
                                                    $septActive = "active";
                                                } else if ($this->request->query['bulan'] == 10) {
                                                    $oktoActive = "active";
                                                } else if ($this->request->query['bulan'] == 11) {
                                                    $novActive = "active";
                                                } else if ($this->request->query['bulan'] == 12) {
                                                    $desActive = "active";
                                                }
                                            } else {
                                                if ($currentMonth == 'January') {
                                                    $janActive = "active";
                                                } else if ($currentMonth == 'February') {
                                                    $febActive = "active";
                                                } else if ($currentMonth == 'March') {
                                                    $marActive = "active";
                                                } else if ($currentMonth == 'April') {
                                                    $aprilActive = "active";
                                                } else if ($currentMonth == 'May') {
                                                    $meiActive = "active";
                                                } else if ($currentMonth == 'June') {
                                                    $juniActive = "active";
                                                } else if ($currentMonth == 'July') {
                                                    $juliActive = "active";
                                                } else if ($currentMonth == 'August') {
                                                    $agusActive = "active";
                                                } else if ($currentMonth == 'September') {
                                                    $septActive = "active";
                                                } else if ($currentMonth == 'October') {
                                                    $oktoActive = "active";
                                                } else if ($currentMonth == 'November') {
                                                    $novActive = "active";
                                                } else if ($currentMonth == 'December') {
                                                    $desActive = "active";
                                                }
                                            }
                                            ?>
                                            <li class="sideMenu-li col-md-12 col-sm-12 col-xs-12 <?= $janActive ?>">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-mounth">
                                                    <a data-toggle="tab" href="#Januari">
                                                        <div class="persen95 font-openSans-bold mounth text-right">
                                                            Januari
                                                        </div>
                                                        <div class="persen5">
                                                            <div class="circleBlue <?= $janActive ?>">

                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="sideMenu-li col-md-12 col-sm-12 col-xs-12 <?= $febActive ?>">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-mounth">
                                                    <a data-toggle="tab" href="#Februari">
                                                        <div class="persen95 font-openSans-bold mounth text-right">
                                                            Februari
                                                        </div>
                                                        <div class="persen5">
                                                            <div class="circleBlue <?= $febActive ?>">

                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="sideMenu-li col-md-12 col-sm-12 col-xs-12 <?= $marActive ?>">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-mounth">
                                                    <a data-toggle="tab" href="#Maret">
                                                        <div class="persen95 font-openSans-bold mounth text-right">
                                                            Maret
                                                        </div>
                                                        <div class="persen5">
                                                            <div class="circleBlue <?= $marActive ?>">

                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="sideMenu-li col-md-12 col-sm-12 col-xs-12 <?= $aprilActive ?>">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-mounth">
                                                    <a data-toggle="tab" href="#April">
                                                        <div class="persen95 font-openSans-bold mounth text-right">
                                                            April
                                                        </div>
                                                        <div class="persen5">
                                                            <div class="circleBlue <?= $aprilActive ?>">

                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="sideMenu-li col-md-12 col-sm-12 col-xs-12 <?= $meiActive ?>">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-mounth">
                                                    <a data-toggle="tab" href="#Mei">
                                                        <div class="persen95 font-openSans-bold mounth text-right">
                                                            Mei
                                                        </div>
                                                        <div class="persen5">
                                                            <div class="circleBlue <?= $meiActive ?>">

                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="sideMenu-li col-md-12 col-sm-12 col-xs-12 <?= $juniActive ?>">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-mounth">
                                                    <a data-toggle="tab" href="#Juni">
                                                        <div class="persen95 font-openSans-bold mounth text-right">
                                                            Juni
                                                        </div>
                                                        <div class="persen5">
                                                            <div class="circleBlue <?= $juniActive ?>">

                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="sideMenu-li col-md-12 col-sm-12 col-xs-12 <?= $juliActive ?>">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-mounth">
                                                    <a data-toggle="tab" href="#Juli">
                                                        <div class="persen95 font-openSans-bold mounth text-right">
                                                            Juli
                                                        </div>
                                                        <div class="persen5">
                                                            <div class="circleBlue <?= $juliActive ?>">

                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="sideMenu-li col-md-12 col-sm-12 col-xs-12 <?= $agusActive ?>">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-mounth">
                                                    <a data-toggle="tab" href="#Agustus">
                                                        <div class="persen95 font-openSans-bold mounth text-right">
                                                            Agustus
                                                        </div>
                                                        <div class="persen5">
                                                            <div class="circleBlue <?= $agusActive ?>">

                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="sideMenu-li col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-mounth <?= $septActive ?>">
                                                    <a data-toggle="tab" href="#September">
                                                        <div class="persen95 font-openSans-bold mounth text-right">
                                                            September
                                                        </div>
                                                        <div class="persen5">
                                                            <div class="circleBlue <?= $septActive ?>">

                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="sideMenu-li col-md-12 col-sm-12 col-xs-12 <?= $oktoActive ?>">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-mounth">
                                                    <a data-toggle="tab" href="#Oktober">
                                                        <div class="persen95 font-openSans-bold mounth text-right">
                                                            Oktober
                                                        </div>
                                                        <div class="persen5">
                                                            <div class="circleBlue <?= $oktoActive ?>">

                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="sideMenu-li col-md-12 col-sm-12 col-xs-12 <?= $novActive ?>">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-mounth">
                                                    <a data-toggle="tab" href="#November">
                                                        <div class="persen95 font-openSans-bold mounth text-right">
                                                            November
                                                        </div>
                                                        <div class="persen5">
                                                            <div class="circleBlue <?= $novActive ?>">

                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="sideMenu-li col-md-12 col-sm-12 col-xs-12 <?= $desActive ?>">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-mounth">
                                                    <a data-toggle="tab" href="#Desember">
                                                        <div class="persen95 font-openSans-bold mounth text-right">
                                                            Desember
                                                        </div>
                                                        <div class="persen5">
                                                            <div class="circleBlue <?= $desActive ?>">

                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="persen80 tab-content boxOut-paddingContent">
                                    <div id="Januari" class="col-md-12 col-sm-12 col-xs-12 boxOut-QA tab-pane fade in <?= $janActive ?>">
                                        <div class="row">
                                            <div class="row content-list">
                                                <div id="page1" class="show-page active">
                                                    <?php
                                                    if (!empty($janEvents)) {
                                                        foreach ($janEvents as $jan_event) {
                                                            $jan_event_title = seoUrl($jan_event['Event']['title_ind']);
                                                            $bulan = $this->Html->getBulan($jan_event['Event']['date']);
                                                            if ($bulan == "Januari") {
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-event">
                                                                        <div class="persen30 box-fotoEvent">
                                                                            <img src="<?= Router::url("{$jan_event['EventImage'][0]['path']}", true) ?>">
                                                                        </div>
                                                                        <div class="persen70">
                                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-keteranganEvent">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                                        <?= $jan_event['Event']['title_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 keteranganEvent font-openSans">
                                                                                        <?= $jan_event['Event']['sinopsys_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-iconEvent font-openSans-bold">
                                                                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/event-location.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;" class="google-findlocationname" data-lat="<?= $jan_event['Event']['latitude'] ?>" data-long="<?= $jan_event['Event']['longitude'] ?>"></span>
                                                                                        </div>
                                                                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-calendar.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtTanggalInter($jan_event['Event']['date']) ?></span>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-clock.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtJam($jan_event['Event']['time']) ?></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-rate font-openSans-bold">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 rateWisata">
                                                                                                &nbsp;<br>
                                                                                                &nbsp;
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 flex">
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 status-hotel">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 star-hotel text-right">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 center">
                                                                                                <button type="button" class="btn button-selengkapnya font-openSans-bold center"><a href="<?= Router::url("/event/{$jan_event['Event']['id']}/$jan_event_title") ?>">Selengkapnya</a><img src="<?= Router::url("/front_file/makassar-terkini/img/icon/arrowCircle-right.png", true) ?>"></button>
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
                                                    } else {
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                <center>Tidak Ada Event</center>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <?php
                                            if (!empty($janEvents)) {
                                                ?>
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pagination">
                                                    <div class="row content-page">
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-mark font-openSans-bold">
                                                            Halaman <?= $paginationInfoJanEvent['currentPage'] ?> dari <?= $paginationInfoJanEvent['totalPage'] ?>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-numbering font-openSans-bold">
                                                            <?= $this->MakassarTerkini->paginationEvent($paginationInfoJanEvent, $this->request->query, Router::url("", true), 5, 1) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div id="Februari" class="col-md-12 col-sm-12 col-xs-12 boxOut-QA tab-pane fade in <?= $febActive ?>">
                                        <div class="row">
                                            <div class="row content-list">
                                                <div id="page1" class="show-page active">
                                                    <?php
                                                    if (!empty($febEvents)) {
                                                        foreach ($febEvents as $feb_event) {
                                                            $feb_event_title = seoUrl($feb_event['Event']['title_ind']);
                                                            $bulan = $this->Html->getBulan($feb_event['Event']['date']);
                                                            if ($bulan == "Februari") {
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-event">
                                                                        <div class="persen30 box-fotoEvent">
                                                                            <img src="<?= Router::url("{$feb_event['EventImage'][0]['path']}", true) ?>">
                                                                        </div>
                                                                        <div class="persen70">
                                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-keteranganEvent">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                                        <?= $feb_event['Event']['title_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 keteranganEvent font-openSans">
                                                                                        <?= $feb_event['Event']['sinopsys_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-iconEvent font-openSans-bold">
                                                                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/event-location.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;" class="google-findlocationname" data-lat="<?= $feb_event['Event']['latitude'] ?>" data-long="<?= $feb_event['Event']['longitude'] ?>"></span>
                                                                                        </div>
                                                                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-calendar.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtTanggalInter($feb_event['Event']['date']) ?></span>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-clock.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtJam($feb_event['Event']['time']) ?></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-rate font-openSans-bold">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 rateWisata">
                                                                                                &nbsp;<br>
                                                                                                &nbsp;
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 flex">
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 status-hotel">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 star-hotel text-right">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 center">
                                                                                                <button type="button" class="btn button-selengkapnya font-openSans-bold center"><a href="<?= Router::url("/event/{$feb_event['Event']['id']}/$feb_event_title") ?>" style="color: white;">Selengkapnya</a><img src="<?= Router::url("/front_file/makassar-terkini/img/icon/arrowCircle-right.png", true) ?>"></button>
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
                                                    } else {
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                <center>Tidak Ada Event</center>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>                                                
                                            </div>
                                            <?php
                                            if (!empty($febEvents)) {
                                                ?>
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pagination">
                                                    <div class="row content-page">
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-mark font-openSans-bold">
                                                            Halaman <?= $paginationInfoFebEvent['currentPage'] ?> dari <?= $paginationInfoFebEvent['totalPage'] ?>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-numbering font-openSans-bold">
                                                            <?= $this->MakassarTerkini->paginationEvent($paginationInfoFebEvent, $this->request->query, Router::url("", true), 5, 2) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div id="Maret" class="col-md-12 col-sm-12 col-xs-12 boxOut-QA tab-pane fade in <?= $marActive ?>">
                                        <div class="row">
                                            <div class="row content-list">
                                                <div id="page1" class="show-page active">
                                                    <?php
                                                    if (!empty($marchEvents)) {
                                                        foreach ($marchEvents as $march_event) {
                                                            $march_event_title = seoUrl($march_event['Event']['title_ind']);
                                                            $bulan = $this->Html->getBulan($march_event['Event']['date']);
                                                            if ($bulan == "Maret") {
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-event">
                                                                        <div class="persen30 box-fotoEvent">
                                                                            <img src="<?= Router::url("{$march_event['EventImage'][0]['path']}", true) ?>">
                                                                        </div>
                                                                        <div class="persen70">
                                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-keteranganEvent">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                                        <?= $march_event['Event']['title_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 keteranganEvent font-openSans">
                                                                                        <?= $march_event['Event']['sinopsys_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-iconEvent font-openSans-bold">
                                                                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/event-location.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;" class="google-findlocationname" data-lat="<?= $feb_event['Event']['latitude'] ?>" data-long="<?= $march_event['Event']['longitude'] ?>"></span>
                                                                                        </div>
                                                                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-calendar.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtTanggalInter($march_event['Event']['date']) ?></span>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-clock.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtJam($march_event['Event']['time']) ?></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-rate font-openSans-bold">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 rateWisata">
                                                                                                &nbsp;<br>
                                                                                                &nbsp;
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 flex">
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 status-hotel">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 star-hotel text-right">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 center">
                                                                                                <button type="button" class="btn button-selengkapnya font-openSans-bold center"><a href="<?= Router::url("/event/{$march_event['Event']['id']}/$march_event_title") ?>" style="color: white;">Selengkapnya</a><img src="<?= Router::url("/front_file/makassar-terkini/img/icon/arrowCircle-right.png", true) ?>"></button>
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
                                                    } else {
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                <center>Tidak Ada Event</center>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>                                                
                                            </div>
                                            <?php
                                            if (!empty($marchEvents)) {
                                                ?>
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pagination">
                                                    <div class="row content-page">
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-mark font-openSans-bold">
                                                            Halaman <?= $paginationInfoMarchEvent['currentPage'] ?> dari <?= $paginationInfoMarchEvent['totalPage'] ?>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-numbering font-openSans-bold">
                                                            <?= $this->MakassarTerkini->paginationEvent($paginationInfoMarchEvent, $this->request->query, Router::url("", true), 5, 3) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div id="April" class="col-md-12 col-sm-12 col-xs-12 boxOut-QA tab-pane fade in <?= $aprilActive ?>">
                                        <div class="row">
                                            <div class="row content-list">
                                                <div id="page1" class="show-page active">
                                                    <?php
                                                    if (!empty($aprilEvents)) {
                                                        foreach ($aprilEvents as $april_event) {
                                                            $april_event_title = seoUrl($april_event['Event']['title_ind']);
                                                            $bulan = $this->Html->getBulan($april_event['Event']['date']);
                                                            if ($bulan == "April") {
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-event">
                                                                        <div class="persen30 box-fotoEvent">
                                                                            <img src="<?= Router::url("{$april_event['EventImage'][0]['path']}", true) ?>">
                                                                        </div>
                                                                        <div class="persen70">
                                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-keteranganEvent">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                                        <?= $april_event['Event']['title_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 keteranganEvent font-openSans">
                                                                                        <?= $april_event['Event']['sinopsys_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-iconEvent font-openSans-bold">
                                                                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/event-location.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;" class="google-findlocationname" data-lat="<?= $april_event['Event']['latitude'] ?>" data-long="<?= $april_event['Event']['longitude'] ?>"></span>
                                                                                        </div>
                                                                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-calendar.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtTanggalInter($april_event['Event']['date']) ?></span>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-clock.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtJam($april_event['Event']['time']) ?></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-rate font-openSans-bold">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 rateWisata">
                                                                                                &nbsp;<br>
                                                                                                &nbsp;
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 flex">
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 status-hotel">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 star-hotel text-right">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 center">
                                                                                                <button type="button" class="btn button-selengkapnya font-openSans-bold center"><a href="<?= Router::url("/event/{$april_event['Event']['id']}/$april_event_title") ?>" style="color: white;">Selengkapnya</a><img src="<?= Router::url("/front_file/makassar-terkini/img/icon/arrowCircle-right.png", true) ?>"></button>
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
                                                    } else {
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                <center>Tidak Ada Event</center>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <?php
                                            if (!empty($aprilEvents)) {
                                                ?>
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pagination">
                                                    <div class="row content-page">
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-mark font-openSans-bold">
                                                            Halaman <?= $paginationInfoAprilEvent['currentPage'] ?> dari <?= $paginationInfoAprilEvent['totalPage'] ?>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-numbering font-openSans-bold">
                                                            <?= $this->MakassarTerkini->paginationEvent($paginationInfoAprilEvent, $this->request->query, Router::url("", true), 5, 4) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div id="Mei" class="col-md-12 col-sm-12 col-xs-12 boxOut-QA tab-pane fade in <?= $meiActive ?>">
                                        <div class="row">
                                            <div class="row content-list">
                                                <div id="page1" class="show-page active">
                                                    <?php
                                                    if (!empty($mayEvents)) {
                                                        foreach ($mayEvents as $may_event) {
                                                            $may_event_title = seoUrl($may_event['Event']['title_ind']);
                                                            $bulan = $this->Html->getBulan($may_event['Event']['date']);
                                                            if ($bulan == "Mei") {
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-event">
                                                                        <div class="persen30 box-fotoEvent">
                                                                            <img src="<?= Router::url("{$may_event['EventImage'][0]['path']}", true) ?>">
                                                                        </div>
                                                                        <div class="persen70">
                                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-keteranganEvent">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                                        <?= $may_event['Event']['title_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 keteranganEvent font-openSans">
                                                                                        <?= $may_event['Event']['sinopsys_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-iconEvent font-openSans-bold">
                                                                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/event-location.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;" class="google-findlocationname" data-lat="<?= $may_event['Event']['latitude'] ?>" data-long="<?= $may_event['Event']['longitude'] ?>"></span>
                                                                                        </div>
                                                                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-calendar.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtTanggalInter($may_event['Event']['date']) ?></span>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-clock.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtJam($may_event['Event']['time']) ?></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-rate font-openSans-bold">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 rateWisata">
                                                                                                &nbsp;<br>
                                                                                                &nbsp;
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 flex">
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 status-hotel">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 star-hotel text-right">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 center">
                                                                                                <button type="button" class="btn button-selengkapnya font-openSans-bold center"><a href="<?= Router::url("/event/{$may_event['Event']['id']}/$may_event_title") ?>" style="color: white;">Selengkapnya</a><img src="<?= Router::url("/front_file/makassar-terkini/img/icon/arrowCircle-right.png", true) ?>"></button>
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
                                                    } else {
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                <center>Tidak Ada Event</center>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>                                                    
                                                </div>                                                
                                            </div>
                                            <?php
                                            if (!empty($mayEvents)) {
                                                ?>
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pagination">
                                                    <div class="row content-page">
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-mark font-openSans-bold">
                                                            Halaman <?= $paginationInfoMayEvent['currentPage'] ?> dari <?= $paginationInfoMayEvent['totalPage'] ?>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-numbering font-openSans-bold">
                                                            <?= $this->MakassarTerkini->paginationEvent($paginationInfoMayEvent, "", Router::url("", true), 5, 5) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div id="Juni" class="col-md-12 col-sm-12 col-xs-12 boxOut-QA tab-pane fade in <?= $juniActive ?>">
                                        <div class="row">
                                            <div class="row content-list">
                                                <div id="page1" class="show-page active">
                                                    <?php
                                                    if (!empty($juneEvents)) {
                                                        foreach ($juneEvents as $june_event) {
                                                            $june_event_title = seoUrl($june_event['Event']['title_ind']);
                                                            $bulan = $this->Html->getBulan($june_event['Event']['date']);
                                                            if ($bulan == "Juni") {
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-event">
                                                                        <div class="persen30 box-fotoEvent">
                                                                            <img src="<?= Router::url("{$june_event['EventImage'][0]['path']}", true) ?>">
                                                                        </div>
                                                                        <div class="persen70">
                                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-keteranganEvent">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                                        <?= $june_event['Event']['title_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 keteranganEvent font-openSans">
                                                                                        <?= $june_event['Event']['sinopsys_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-iconEvent font-openSans-bold">
                                                                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/event-location.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;" class="google-findlocationname" data-lat="<?= $june_event['Event']['latitude'] ?>" data-long="<?= $june_event['Event']['longitude'] ?>"></span>
                                                                                        </div>
                                                                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-calendar.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtTanggalInter($june_event['Event']['date']) ?></span>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-clock.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtJam($june_event['Event']['time']) ?></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-rate font-openSans-bold">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 rateWisata">
                                                                                                &nbsp;<br>
                                                                                                &nbsp;
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 flex">
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 status-hotel">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 star-hotel text-right">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 center">
                                                                                                <button type="button" class="btn button-selengkapnya font-openSans-bold center"><a href="<?= Router::url("/event/{$june_event['Event']['id']}/$june_event_title") ?>" style="color: white;">Selengkapnya</a><img src="<?= Router::url("/front_file/makassar-terkini/img/icon/arrowCircle-right.png", true) ?>"></button>
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
                                                    } else {
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                <center>Tidak Ada Event</center>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>                                                    
                                                </div>                                                
                                            </div>
                                            <?php
                                            if (!empty($juneEvents)) {
                                                ?>
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pagination">
                                                    <div class="row content-page">
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-mark font-openSans-bold">
                                                            Halaman <?= $paginationInfoJuneEvent['currentPage'] ?> dari <?= $paginationInfoJuneEvent['totalPage'] ?>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-numbering font-openSans-bold">
                                                            <?= $this->MakassarTerkini->paginationEvent($paginationInfoJuneEvent, "", Router::url("", true), 5, 6) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div id="Juli" class="col-md-12 col-sm-12 col-xs-12 boxOut-QA tab-pane fade in <?= $juliActive ?>">
                                        <div class="row">
                                            <div class="row content-list">
                                                <div id="page1" class="show-page active">
                                                    <?php
                                                    if (!empty($julyEvents)) {
                                                        foreach ($julyEvents as $july_event) {
                                                            $july_event_title = seoUrl($july_event['Event']['title_ind']);
                                                            $bulan = $this->Html->getBulan($july_event['Event']['date']);
                                                            if ($bulan == "Juli") {
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-event">
                                                                        <div class="persen30 box-fotoEvent">
                                                                            <img src="<?= Router::url("{$july_event['EventImage'][0]['path']}", true) ?>">
                                                                        </div>
                                                                        <div class="persen70">
                                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-keteranganEvent">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                                        <?= $july_event['Event']['title_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 keteranganEvent font-openSans">
                                                                                        <?= $july_event['Event']['sinopsys_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-iconEvent font-openSans-bold">
                                                                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/event-location.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;" class="google-findlocationname" data-lat="<?= $july_event['Event']['latitude'] ?>" data-long="<?= $july_event['Event']['longitude'] ?>"></span>
                                                                                        </div>
                                                                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-calendar.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtTanggalInter($july_event['Event']['date']) ?></span>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-clock.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtJam($july_event['Event']['time']) ?></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-rate font-openSans-bold">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 rateWisata">
                                                                                                &nbsp;<br>
                                                                                                &nbsp;
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 flex">
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 status-hotel">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 star-hotel text-right">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 center">
                                                                                                <button type="button" class="btn button-selengkapnya font-openSans-bold center"><a href="<?= Router::url("/event/{$july_event['Event']['id']}/$july_event_title") ?>" style="color: white;">Selengkapnya</a><img src="<?= Router::url("/front_file/makassar-terkini/img/icon/arrowCircle-right.png", true) ?>"></button>
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
                                                    } else {
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                <center>Tidak Ada Event</center>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>                                                
                                            </div>
                                            <?php
                                            if (!empty($julyEvents)) {
                                                ?>
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pagination">
                                                    <div class="row content-page">
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-mark font-openSans-bold">
                                                            Halaman <?= $paginationInfoJulyEvent['currentPage'] ?> dari <?= $paginationInfoJulyEvent['totalPage'] ?>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-numbering font-openSans-bold">
                                                            <?= $this->MakassarTerkini->paginationEvent($paginationInfoJulyEvent, $this->request->query, Router::url("", true), 5, 7) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div id="Agustus" class="col-md-12 col-sm-12 col-xs-12 boxOut-QA tab-pane fade in <?= $agusActive ?>">
                                        <div class="row">
                                            <div class="row content-list">
                                                <div id="page1" class="show-page active">
                                                    <?php
                                                    if (!empty($augustEvents)) {
                                                        foreach ($augustEvents as $august_event) {
                                                            $august_event_title = seoUrl($august_event['Event']['title_ind']);
                                                            $bulan = $this->Html->getBulan($august_event['Event']['date']);
                                                            if ($bulan == "Agustus") {
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-event">
                                                                        <div class="persen30 box-fotoEvent">
                                                                            <img src="<?= Router::url("{$august_event['EventImage'][0]['path']}", true) ?>">
                                                                        </div>
                                                                        <div class="persen70">
                                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-keteranganEvent">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                                        <?= $august_event['Event']['title_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 keteranganEvent font-openSans">
                                                                                        <?= $august_event['Event']['sinopsys_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-iconEvent font-openSans-bold">
                                                                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/event-location.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;" class="google-findlocationname" data-lat="<?= $august_event['Event']['latitude'] ?>" data-long="<?= $august_event['Event']['longitude'] ?>"></span>
                                                                                        </div>
                                                                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-calendar.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtTanggalInter($august_event['Event']['date']) ?></span>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-clock.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtJam($august_event['Event']['time']) ?></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-rate font-openSans-bold">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 rateWisata">
                                                                                                &nbsp;<br>
                                                                                                &nbsp;
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 flex">
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 status-hotel">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 star-hotel text-right">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 center">
                                                                                                <button type="button" class="btn button-selengkapnya font-openSans-bold center"><a href="<?= Router::url("/event/{$august_event['Event']['id']}/$august_event_title") ?>" style="color: white;">Selengkapnya</a><img src="<?= Router::url("/front_file/makassar-terkini/img/icon/arrowCircle-right.png", true) ?>"></button>
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
                                                    } else {
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                <center>Tidak Ada Event</center>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>                                                
                                            </div>
                                            <?php
                                            if (!empty($augustEvents)) {
                                                ?>
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pagination">
                                                    <div class="row content-page">
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-mark font-openSans-bold">
                                                            Halaman <?= $paginationInfoAugustEvent['currentPage'] ?> dari <?= $paginationInfoAugustEvent['totalPage'] ?>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-numbering font-openSans-bold">
                                                            <?= $this->MakassarTerkini->paginationEvent($paginationInfoAugustEvent, $this->request->query, Router::url("", true), 5, 8) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div id="September" class="col-md-12 col-sm-12 col-xs-12 boxOut-QA tab-pane fade in <?= $septActive ?>">
                                        <div class="row">
                                            <div class="row content-list">
                                                <div id="page1" class="show-page active">
                                                    <?php
                                                    if (!empty($septEvents)) {
                                                        foreach ($septEvents as $sept_event) {
                                                            $sept_event_title = seoUrl($sept_event['Event']['title_ind']);
                                                            $bulan = $this->Html->getBulan($sept_event['Event']['date']);
                                                            if ($bulan == "September") {
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-event">
                                                                        <div class="persen30 box-fotoEvent">
                                                                            <img src="<?= Router::url("{$sept_event['EventImage'][0]['path']}", true) ?>">
                                                                        </div>
                                                                        <div class="persen70">
                                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-keteranganEvent">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                                        <?= $sept_event['Event']['title_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 keteranganEvent font-openSans">
                                                                                        <?= $sept_event['Event']['sinopsys_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-iconEvent font-openSans-bold">
                                                                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/event-location.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;" class="google-findlocationname" data-lat="<?= $sept_event['Event']['latitude'] ?>" data-long="<?= $sept_event['Event']['longitude'] ?>"></span>
                                                                                        </div>
                                                                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-calendar.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtTanggalInter($sept_event['Event']['date']) ?></span>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-clock.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtJam($sept_event['Event']['time']) ?></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-rate font-openSans-bold">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 rateWisata">
                                                                                                &nbsp;<br>
                                                                                                &nbsp;
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 flex">
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 status-hotel">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 star-hotel text-right">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 center">
                                                                                                <button type="button" class="btn button-selengkapnya font-openSans-bold center"><a href="<?= Router::url("/event/{$sept_event['Event']['id']}/$sept_event_title") ?>" style="color: white;">Selengkapnya</a><img src="<?= Router::url("/front_file/makassar-terkini/img/icon/arrowCircle-right.png", true) ?>"></button>
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
                                                    } else {
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                <center>Tidak Ada Event</center>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>                                                
                                            </div>
                                            <?php
                                            if (!empty($septEvents)) {
                                                ?>
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pagination">
                                                    <div class="row content-page">
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-mark font-openSans-bold">
                                                            Halaman <?= $paginationInfoSeptEvent['currentPage'] ?> dari <?= $paginationInfoSeptEvent['totalPage'] ?>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-numbering font-openSans-bold">
                                                            <?= $this->MakassarTerkini->paginationEvent($paginationInfoSeptEvent, $this->request->query, Router::url("", true), 5, 9) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div id="Oktober" class="col-md-12 col-sm-12 col-xs-12 boxOut-QA tab-pane fade in <?= $oktoActive ?>">
                                        <div class="row">
                                            <div class="row content-list">
                                                <div id="page1" class="show-page active">
                                                    <?php
                                                    if (!empty($oktoEvents)) {
                                                        foreach ($oktoEvents as $okto_event) {
                                                            $okto_event_title = seoUrl($okto_event['Event']['title_ind']);
                                                            $bulan = $this->Html->getBulan($okto_event['Event']['date']);
                                                            if ($bulan == "Oktober") {
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-event">
                                                                        <div class="persen30 box-fotoEvent">
                                                                            <img src="<?= Router::url("{$okto_event['EventImage'][0]['path']}", true) ?>">
                                                                        </div>
                                                                        <div class="persen70">
                                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-keteranganEvent">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                                        <?= $okto_event['Event']['title_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 keteranganEvent font-openSans">
                                                                                        <?= $okto_event['Event']['sinopsys_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-iconEvent font-openSans-bold">
                                                                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/event-location.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;" class="google-findlocationname" data-lat="<?= $okto_event['Event']['latitude'] ?>" data-long="<?= $okto_event['Event']['longitude'] ?>"></span>
                                                                                        </div>
                                                                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-calendar.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtTanggalInter($okto_event['Event']['date']) ?></span>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-clock.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtJam($okto_event['Event']['time']) ?></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-rate font-openSans-bold">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 rateWisata">
                                                                                                &nbsp;<br>
                                                                                                &nbsp;
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 flex">
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 status-hotel">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 star-hotel text-right">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 center">
                                                                                                <button type="button" class="btn button-selengkapnya font-openSans-bold center"><a href="<?= Router::url("/event/{$okto_event['Event']['id']}/$okto_event_title") ?>" style="color: white;">Selengkapnya</a><img src="<?= Router::url("/front_file/makassar-terkini/img/icon/arrowCircle-right.png", true) ?>"></button>
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
                                                    } else {
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                <center>Tidak Ada Event</center>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>                                                
                                            </div>
                                            <?php
                                            if (!empty($oktoEvents)) {
                                                ?>
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pagination">
                                                    <div class="row content-page">
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-mark font-openSans-bold">
                                                            Halaman <?= $paginationInfoSeptEvent['currentPage'] ?> dari <?= $paginationInfoSeptEvent['totalPage'] ?>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-numbering font-openSans-bold">
                                                            <?= $this->MakassarTerkini->paginationEvent($paginationInfoSeptEvent, $this->request->query, Router::url("", true), 5, 10) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div id="November" class="col-md-12 col-sm-12 col-xs-12 boxOut-QA tab-pane fade in <?= $novActive ?>">
                                        <div class="row">
                                            <div class="row content-list">
                                                <div id="page1" class="show-page active">
                                                    <?php
                                                    if (!empty($novEvents)) {
                                                        foreach ($novEvents as $nov_event) {
                                                            $nov_event_title = seoUrl($nov_event['Event']['title_ind']);
                                                            $bulan = $this->Html->getBulan($nov_event['Event']['date']);
                                                            if ($bulan == "November") {
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-event">
                                                                        <div class="persen30 box-fotoEvent">
                                                                            <img src="<?= Router::url("{$nov_event['EventImage'][0]['path']}", true) ?>">
                                                                        </div>
                                                                        <div class="persen70">
                                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-keteranganEvent">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                                        <?= $nov_event['Event']['title_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 keteranganEvent font-openSans">
                                                                                        <?= $nov_event['Event']['sinopsys_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-iconEvent font-openSans-bold">
                                                                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/event-location.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;" class="google-findlocationname" data-lat="<?= $nov_event['Event']['latitude'] ?>" data-long="<?= $nov_event['Event']['longitude'] ?>"></span>
                                                                                        </div>
                                                                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-calendar.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtTanggalInter($nov_event['Event']['date']) ?></span>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-clock.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtJam($nov_event['Event']['time']) ?></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-rate font-openSans-bold">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 rateWisata">
                                                                                                &nbsp;<br>
                                                                                                &nbsp;
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 flex">
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 status-hotel">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 star-hotel text-right">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 center">
                                                                                                <button type="button" class="btn button-selengkapnya font-openSans-bold center"><a href="<?= Router::url("/event/{$nov_event['Event']['id']}/$nov_event_title") ?>" style="color: white;">Selengkapnya</a><img src="<?= Router::url("/front_file/makassar-terkini/img/icon/arrowCircle-right.png", true) ?>"></button>
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
                                                    } else {
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                <center>Tidak Ada Event</center>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>                                                
                                            </div>
                                            <?php
                                            if (!empty($novEvents)) {
                                                ?>
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pagination">
                                                    <div class="row content-page">
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-mark font-openSans-bold">
                                                            Halaman <?= $paginationInfoNovEvent['currentPage'] ?> dari <?= $paginationInfoNovEvent['totalPage'] ?>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-numbering font-openSans-bold">
                                                            <?= $this->MakassarTerkini->paginationEvent($paginationInfoNovEvent, $this->request->query, Router::url("", true), 5, 11) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div id="Desember" class="col-md-12 col-sm-12 col-xs-12 boxOut-QA tab-pane fade in <?= $desActive ?>">
                                        <div class="row">
                                            <div class="row content-list">
                                                <div id="page1" class="show-page active">
                                                    <?php
                                                    if (!empty($decEvents)) {
                                                        foreach ($decEvents as $dec_event) {
                                                            $dec_event_title = seoUrl($dec_event['Event']['title_ind']);
                                                            $bulan = $this->Html->getBulan($dec_event['Event']['date']);
                                                            if ($bulan == "Desember") {
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-event">
                                                                        <div class="persen30 box-fotoEvent">
                                                                            <img src="<?= Router::url("{$dec_event['EventImage'][0]['path']}", true) ?>">
                                                                        </div>
                                                                        <div class="persen70">
                                                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-keteranganEvent">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                                        <?= $dec_event['Event']['title_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 keteranganEvent font-openSans">
                                                                                        <?= $dec_event['Event']['sinopsys_ind'] ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-iconEvent font-openSans-bold">
                                                                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/event-location.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;" class="google-findlocationname" data-lat="<?= $dec_event['Event']['latitude'] ?>" data-long="<?= $dec_event['Event']['longitude'] ?>"></span>
                                                                                        </div>
                                                                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-calendar.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtTanggalInter($dec_event['Event']['date']) ?></span>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/iconEventGreen-clock.png", true) ?>">
                                                                                            <span style="font-weight: 700; font-size: 12px;"><?= $this->Html->cvtJam($dec_event['Event']['time']) ?></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-rate font-openSans-bold">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 rateWisata">
                                                                                                &nbsp;<br>
                                                                                                &nbsp;
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 flex">
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 status-hotel">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                                <div class="col-md-6 col-sm-6 col-xs-6 star-hotel text-right">
                                                                                                    &nbsp;
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 center">
                                                                                                <button type="button" class="btn button-selengkapnya font-openSans-bold center"><a href="<?= Router::url("/event/{$dec_event['Event']['id']}/$dec_event_title") ?>" style="color: white;">Selengkapnya</a><img src="<?= Router::url("/front_file/makassar-terkini/img/icon/arrowCircle-right.png", true) ?>"></button>
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
                                                    } else {
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 judulEvent font-openSans-bold">
                                                                <center>Tidak Ada Event</center>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>                                                
                                            </div>
                                            <?php
                                            if (!empty($decEvents)) {
                                                ?>
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pagination">
                                                    <div class="row content-page">
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-mark font-openSans-bold">
                                                            Halaman <?= $paginationInfoDecEvent['currentPage'] ?> dari <?= $paginationInfoDecEvent['totalPage'] ?>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6 page-numbering font-openSans-bold">
                                                            <?= $this->MakassarTerkini->paginationEvent($paginationInfoDecEvent, $this->request->query, Router::url("", true), 5, 12) ?>
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
            </div>
        </div>
    </div>


    <!-- Adv Middle Top -->
    <!--==================================================-->
    <?php
    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 18,"bottom"=>true]);
    ?>

</section>
<script type="text/javascript">
    $(document).ready(function () {

        $('#sideMenu-profil').find('a').on('click', function (e) {
            $(this).find('.circleBlue').show().parents('.sideMenu-li').siblings().find('a').find('.circleBlue').hide();
            e.preventDefault();
        });


    });
</script>
<script>
    $(document).ready(function () {
        $(".google-findlocationname").each(function () {
            var $this = $(this);
            var lat = $this.data("lat");
            var long = $this.data("long");
            $.ajax({
                url: "http://maps.googleapis.com/maps/api/geocode/json",
                dataType: "json",
                type: "GET",
                data: {sensor: false, latlng: lat + "," + long},
                success: function (response) {
                    var adrs = response.results[0].address_components[5].short_name;
                    $this.html(adrs);
                }
            })
        })
    })
</script>
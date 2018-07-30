<div class="container-fluid">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 index-contentBack">
                <div class="news-head-kategori">
                    <img src="<?=Router::url("/front_file/makassar-terkini/img/icon/berita-kategori.png", true) ?>">

                    <div class="redspan">
                        <div class="greyspan">
                        </div>

                        <a href="<?= Router::url("/semua-berita-kategori", true) ?>" class="mini-ls">
                            LIHAT SEMUA
                            <img src="<?=Router::url("/front_file/makassar-terkini/img/icon/all-window-red.png", true) ?>">
                        </a>
                    </div>
                </div>
                <div class="s-berita-rekomendasi" style="">
                    <ul class="nav nav-tabs s-pp-nav-right edit-navbarSideMenu" id="myTab00">
                        <li class="active" style="width: inherit; display: block;">
                            <a data-target="#m-pa" data-toggle="tab">
                                <div class="col-md-9 col-sm-9 col-xs-9 text-right" style="padding-right: 10px; font-size: 19px;">
                                    News
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 box-menuLogo center">
                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/sideMenu-2.png", true)?>" style="width: 20px; height: 15px;" />
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 box-menuLogoRed center">
                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/sideMenu-2-red.png", true)?>" style="width: 20px; height: 15px;" />
                                </div>
                            </a>                        
                        </li>
                        <li  style="width: inherit; display: block;">
                            <a data-target="#m-ep" data-toggle="tab">
                                <div class="col-md-9 col-sm-9 col-xs-9 text-right" style="padding-right: 10px; font-size: 19px;">
                                    BISNIS
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 box-menuLogo center" style="margin-top: -3px;">
                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/sideMenu-3.png", true)?>" style="width: 17px; height: 17px;" />
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 box-menuLogoRed center" style="margin-top: -3px;">
                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/sideMenu-3-red.png", true)?>" style="width: 17px; height: 17px;" />
                                </div>
                            </a>
                        </li>
                        <li  style="width: inherit; display: block;">
                            <a data-target="#m-kb" data-toggle="tab">
                                <div class="col-md-9 col-sm-9 col-xs-9 text-right" style="padding-right: 10px; font-size: 19px;">
                                    TEKNO
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 box-menuLogo center" style="margin-top: 0px;">
                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/sideMenu-4.png", true)?>" style="width: 17px; height: 17px;" />
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 box-menuLogoRed center" style="margin-top: 0px;">
                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/sideMenu-4-red.png", true)?>" style="width: 17px; height: 17px;" />
                                </div>
                            </a>
                        </li>
                        <li  style="width: inherit; display: block;">
                            <a data-target="#m-kbf" data-toggle="tab">
                                <div class="col-md-9 col-sm-9 col-xs-9 text-right" style="padding-right: 10px; font-size: 19px;">
                                    LIFE STYLE
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 box-menuLogo center" style="margin-top: 0px;">
                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/sideMenu-5.png", true)?>" style="width: 17px; height: 16px;" />
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 box-menuLogoRed center" style="margin-top: 0px;">
                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/sideMenu-5-red.png", true)?>" style="width: 17px; height: 16px;" />
                                </div>
                            </a>
                        </li>
                        <li  style="width: inherit; display: block;">
                            <a data-target="#m-kbv" data-toggle="tab">
                                <div class="col-md-9 col-sm-9 col-xs-9 text-right" style="padding-right: 10px; font-size: 19px;">
                                    SPORT
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 box-menuLogo center" style="margin-top: 0px;">
                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/sideMenu-6.png", true)?>" style="width: 17px; height: 17px;" />
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 box-menuLogoRed center" style="margin-top: 0px;">
                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/sideMenu-6-red.png", true)?>" style="width: 17px; height: 17px;" />
                                </div>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content pull-left" style="width: 580px; display: block;">
                        <div class="tab-pane active" id="m-pa" style="padding-top: 10px; padding-right: 10px;">
                            <div id="news-kategori-carousel" class="carousel slide" data-ride="carousel" style="height: inherit; position: relative;">
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active ">
                                        <?php
                                        foreach($categoryNews as $k => $all_news) {
                                            $all_news_title = seoUrl($all_news['News']['title_ind']);
                                            if($k == 0) {
                                        ?>
                                        <div class="news-module-ver s-news-lg pull-left news-module-verKategori">
                                            <div class="news-module-ver-img">
                                                <a href="<?= Router::url("/berita/{$all_news['News']['id']}/$all_news_title") ?>">
                                                    <div style="height:174px; overflow:hidden;">
                                                    <img src="<?= str_replace('\\', '/', Router::url("{$all_news['News']['thumbnail_path']}", true)) ?>" style="left: 50%; margin-left: -50%; position: relative; width: auto !important; height: 100% !important;">
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="news-module-ver-content font-sourceSansPro">
                                                <div class="news-module-ver-title news-module-ver-titlePrimary">
                                                    <a href="<?= Router::url("/berita/{$all_news['News']['id']}/$all_news_title") ?>">
                                                        <?= $all_news['News']['title_ind'] ?>
                                                    </a>
                                                </div>
                                                
                                                <a href="<?= Router::url("/berita/{$all_news['News']['id']}/$all_news_title") ?>">
                                                    <?php
                                                    $limit = 50;
                                                    $sinopsys11 = strip_tags(html_entity_decode($all_news['News']['sinopsys_ind']));
                                                    if(strlen($sinopsys11) < $limit) {
                                                        echo $sinopsys11;
                                                    } else {                                    
                                                        echo substr($sinopsys11,0,$limit) . "...";
                                                    }
                                                    ?>
                                                </a>
                                                <br>
                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left">
                                                        <?= $this->Html->cvtWaktuInter($all_news['News']['news_date']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            } else if($k < 4){
                                        ?>
                                        <div class="s-news-node s-news-xs pull-right" style="width: 288px; margin-bottom: 10px;">
                                            <div class="" style="width: 99px; height: 75px; overflow: hidden; float: left;">
                                                <a href="<?= Router::url("/berita/{$all_news['News']['id']}/$all_news_title") ?>">
                                                    <img src="<?= str_replace('\\', '/', Router::url("{$all_news['News']['thumbnail_path']}", true)) ?>" style="left: 50%; margin-left: -60%; position: relative; width: auto !important; height: 100% !important;">
                                                </a>
                                            </div>

                                            <div class="news-module-ver-content" style="width: 188px; float: left; padding-left: 15px;">
                                                <div class="news-module-ver-title" style="min-height: 25px; height: inherit; max-height: 45px;">
                                                    <a href="<?= Router::url("/berita/{$all_news['News']['id']}/$all_news_title") ?>">
                                                        <?= $all_news['News']['title_ind'] ?>
                                                    </a>
                                                </div>

                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left" style="margin-top: 0px;">
                                                        <?= $this->Html->cvtWaktuInter($all_news['News']['news_date']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                             }
                                        }
                                        ?>
                                    </div>
                                    <div class="item">
                                        <?php
                                        foreach($categoryNews as $k => $all_news) {
                                            if($k == 4) {
                                        ?>
                                        <div class="news-module-ver s-news-lg pull-left news-module-verKategori">
                                            <div class="news-module-ver-img">
                                                <a href="<?= Router::url("/berita/{$all_news['News']['id']}/$all_news_title") ?>">
                                                    <div style="height:174px; overflow:hidden;">
                                                    <img src="<?= str_replace('\\', '/', Router::url("{$all_news['News']['thumbnail_path']}", true)) ?>" style="left: 50%; margin-left: -60%; position: relative; width: auto !important; height: 100% !important;">
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="news-module-ver-content font-sourceSansPro">
                                                <div class="news-module-ver-title news-module-ver-titlePrimary">
                                                    <a href="<?= Router::url("/berita/{$all_news['News']['id']}/$all_news_title") ?>">
                                                        <?= $all_news['News']['title_ind'] ?>
                                                    </a>
                                                </div>
                                                
                                                <?php
                                                $sinopsys12 = strip_tags(html_entity_decode($all_news['News']['sinopsys_ind']));
                                                if(strlen($sinopsys12) < $limit) {
                                                    echo $sinopsys12;
                                                } else {                                    
                                                    echo substr($sinopsys12,0,$limit) . "...";
                                                }
                                                ?>
                                                <br>
                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left">
                                                        <?= $this->Html->cvtWaktuInter($all_news['News']['news_date']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            } else if($k > 4 && $k < 8){
                                        ?>
                                        <div class="s-news-node s-news-xs pull-right" style="width: 288px; margin-bottom: 10px;">
                                            <div class="" style="width: 99px; height: 75px; overflow: hidden; float: left;">
                                                <a href="<?= Router::url("/berita/{$all_news['News']['id']}/$all_news_title") ?>">
                                                    <img src="<?= str_replace('\\', '/', Router::url("{$all_news['News']['thumbnail_path']}", true)) ?>" style="left: 50%; margin-left: -60%; position: relative; width: auto !important; height: 100% !important;">
                                                </a>
                                            </div>

                                            <div class="news-module-ver-content" style="width: 188px; float: left; padding-left: 15px;">
                                                <div class="news-module-ver-title" style="min-height: 25px; height: inherit; max-height: 45px;">
                                                    <a href="<?= Router::url("/berita/{$all_news['News']['id']}/$all_news_title") ?>">
                                                        <?= $all_news['News']['title_ind'] ?>
                                                    </a>
                                                </div>

                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left" style="margin-top: 0px;">
                                                        <?= $this->Html->cvtWaktuInter($all_news['News']['news_date']) ?>
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
                            <div style="position: relative; float: right; text-align: center; margin-top: -4px; margin-right: 70px;">
                                <a href="<?= Router::url("/kategori/news/lihat-semua", true) ?>" class="pull-left" style="margin-right: 20px; background-color: #F3F3F3; padding: 0px 10px;">
                                    <span style="font-size: 12px; color: #ec2227; margin-right: 10px;">LIHAT SEMUA</span>
                                    <img src="<?=Router::url("/front_file/makassar-terkini/img/icon/all-window-red.png", true) ?>" height="10px" style="margin-top: -2px;">
                                </a>
                                <a class="s-tick" href="#news-kategori-carousel" role="button" data-slide="prev" style="top: 7px; right: 36px;">
                                    <img src="<?=Router::url("/front_file/makassar-terkini/img/icon/news-tick-left.png", true) ?>" width="12px">
                                </a>
                                <a class="s-tick" href="#news-kategori-carousel" role="button" data-slide="next" style="top: 7px; right: 16px;">
                                    <img src="<?=Router::url("/front_file/makassar-terkini/img/icon/news-tick-right.png", true) ?>" width="12px">
                                </a>
                            </div>


                        </div>
                        <div class="tab-pane" id="m-ep" style="padding-top: 10px; padding-right: 10px;">
                            <div id="bisnis-kategori-carousel" class="carousel slide" data-ride="carousel" style="height: inherit; position: relative;">
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active ">
                                        <?php
                                        foreach($categoryBusiness as $k => $all_business) {
                                            $all_business_title = seoUrl($all_business['News']['title_ind']);
                                            if($k == 0) {
                                        ?>
                                        <div class="news-module-ver s-news-lg pull-left news-module-verKategori">
                                            <div class="news-module-ver-img">
                                                <a href="<?= Router::url("/berita/{$all_news['News']['id']}/$all_business_title") ?>">
                                                <div style="height:174px; overflow:hidden;">
                                                    <img src="<?= str_replace('\\', '/', Router::url("{$all_business['News']['thumbnail_path']}", true)) ?>" style="left: 50%; margin-left: -50%; position: relative; width: auto !important; height: 100% !important;">
                                                </div>
                                                </a>
                                            </div>

                                            <div class="news-module-ver-content font-sourceSansPro">
                                                <div class="news-module-ver-title news-module-ver-titlePrimary">
                                                    <a href="<?= Router::url("/berita/{$all_news['News']['id']}/$all_business_title") ?>">
                                                        <?= $all_business['News']['title_ind'] ?>
                                                    </a>
                                                </div>
                                                
                                                <?php
                                                $sinopsys2 = strip_tags(html_entity_decode($all_business['News']['sinopsys_ind']));
                                                if(strlen($sinopsys2) < $limit) {
                                                    echo $sinopsys2;
                                                } else {                                    
                                                    echo substr($sinopsys2,0,$limit) . "...";
                                                }
                                                ?>
                                                <br>
                                                <div class="news-module-ver-etc">

                                                    <div class="news-module-ver-time pull-left">
                                                        <?= $this->Html->cvtWaktuInter($all_business['News']['news_date']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            } else if($k < 4){
                                        ?>
                                        <div class="s-news-node s-news-xs pull-right" style="width: 288px; margin-bottom: 10px;">
                                            <div class="" style="width: 99px; height: 75px; overflow: hidden; float: left;">
                                                <a href="<?= Router::url("/berita/{$all_news['News']['id']}/$all_business_title") ?>">
                                                    <img src="<?= str_replace('\\', '/', Router::url("{$all_business['News']['thumbnail_path']}", true)) ?>" style="left: 50%; margin-left: -60%; position: relative; width: auto !important; height: 100% !important;">
                                                </a>
                                            </div>

                                            <div class="news-module-ver-content" style="width: 188px; float: left; padding-left: 15px;">
                                                <div class="news-module-ver-title"  style="min-height: 25px; height: inherit; max-height: 45px;">
                                                    <a href="<?= Router::url("/berita/{$all_news['News']['id']}/$all_business_title") ?>">
                                                        <?= $all_business['News']['title_ind'] ?>
                                                    </a>
                                                </div>

                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left" style="margin-top: 0px;">
                                                        <?= $this->Html->cvtWaktuInter($all_business['News']['news_date']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                             }
                                        }
                                        ?>
                                    </div>
                                    <div class="item">
                                        <?php
                                        foreach($categoryBusiness as $k => $all_business) {
                                            if($k == 4) {
                                        ?>
                                        <div class="news-module-ver s-news-lg pull-left news-module-verKategori">
                                            <div class="news-module-ver-img">
                                                <a href="<?= Router::url("/berita/{$all_news['News']['id']}/$all_business_title") ?>">
                                                <div style="height:174px; overflow:hidden;">
                                                    <img src="<?= str_replace('\\', '/', Router::url("{$all_business['News']['thumbnail_path']}", true)) ?>" style="left: 50%; margin-left: -50%; position: relative; width: auto !important; height: 100% !important;">
                                                </div>
                                                </a>
                                            </div>

                                            <div class="news-module-ver-content font-sourceSansPro">
                                                <div class="news-module-ver-title news-module-ver-titlePrimary">
                                                    <a href="<?= Router::url("/berita/{$all_news['News']['id']}/$all_business_title") ?>">
                                                        <?= $all_business['News']['title_ind'] ?>
                                                    </a>
                                                </div>
                                                
                                                <?php
                                                $sinopsys3 = strip_tags(html_entity_decode($all_business['News']['sinopsys_ind']));
                                                if(strlen($sinopsys3) < $limit) {
                                                    echo $sinopsys3;
                                                } else {                                    
                                                    echo substr($sinopsys3,0,$limit) . "...";
                                                }
                                                ?>
                                                <br>
                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left">
                                                        <?= $this->Html->cvtWaktuInter($all_business['News']['news_date']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            } else if($k > 4 && $k < 8){
                                        ?>
                                        <div class="s-news-node s-news-xs pull-right" style="width: 288px; margin-bottom: 10px;">
                                            <div class="" style="width: 99px; height: 75px; overflow: hidden; float: left;">
                                                <a href="<?= Router::url("/berita/{$all_news['News']['id']}/$all_business_title") ?>">
                                                    <img src="<?= str_replace('\\', '/', Router::url("{$all_business['News']['thumbnail_path']}", true)) ?>" style="left: 50%; margin-left: -60%; position: relative; width: auto !important; height: 100% !important;">
                                                </a>
                                            </div>

                                            <div class="news-module-ver-content" style="width: 188px; float: left; padding-left: 15px;">
                                                <div class="news-module-ver-title" style="min-height: 25px; height: inherit; max-height: 45px;">
                                                    <a href="<?= Router::url("/berita/{$all_news['News']['id']}/$all_business_title") ?>">
                                                        <?= $all_business['News']['title_ind'] ?>
                                                    </a>
                                                </div>

                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left" style="margin-top: 0px;">
                                                        <?= $this->Html->cvtWaktuInter($all_business['News']['news_date']) ?>
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
                            <div style="position: relative; float: right; text-align: center; margin-top: -4px; margin-right: 70px;">
                                <a href="<?= Router::url("/kategori/bisnis/lihat-semua", true) ?>" class="pull-left" style="margin-right: 20px; background-color: #F3F3F3; padding: 0px 10px;">
                                    <span style="font-size: 12px; color: #ec2227; margin-right: 10px;">LIHAT SEMUA</span>
                                    <img src="<?=Router::url("/front_file/makassar-terkini/img/icon/all-window-red.png", true) ?>" height="10px" style="margin-top: -2px;">
                                </a>
                                <a class="s-tick" href="#bisnis-kategori-carousel" role="button" data-slide="prev" style="top: 7px; right: 36px;">
                                    <img src="<?=Router::url("/front_file/makassar-terkini/img/icon/news-tick-left.png", true) ?>" width="12px">
                                </a>
                                <a class="s-tick" href="#bisnis-kategori-carousel" role="button" data-slide="next" style="top: 7px; right: 16px;">
                                    <img src="<?=Router::url("/front_file/makassar-terkini/img/icon/news-tick-right.png", true) ?>" width="12px">
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane" id="m-kb" style="padding-top: 10px; padding-right: 10px;">
                            <div id="tekno-kategori-carousel" class="carousel slide" data-ride="carousel" style="height: inherit; position: relative;">
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active ">
                                        <?php
                                        foreach($categoryTekno as $k => $all_tekno) {
                                            $all_tekno_title = seoUrl($all_tekno['News']['title_ind']);
                                            if($k == 0) {
                                        ?>
                                        <div class="news-module-ver news-module-verKategori s-news-lg pull-left">
                                            <div class="news-module-ver-img">
                                                <a href="<?= Router::url("/berita/{$all_tekno['News']['id']}/$all_tekno_title") ?>">
                                                <div style="height:174px; overflow:hidden;">
                                                    <img src="<?= str_replace('\\', '/', Router::url("{$all_tekno['News']['thumbnail_path']}", true)) ?>" style="left: 50%; margin-left: -50%; position: relative; width: auto !important; height: 100% !important;">
                                                </div>
                                                </a>
                                            </div>

                                            <div class="news-module-ver-content font-sourceSansPro">
                                                <div class="news-module-ver-title news-module-ver-titlePrimary">
                                                    <a><?= $all_tekno['News']['title_ind'] ?>
                                                </div>
                                                
                                                <a href="<?= Router::url("/berita/{$all_tekno['News']['id']}/$all_tekno_title") ?>"> 
                                                    <?php
                                                    $sinopsys4 = strip_tags(html_entity_decode($all_tekno['News']['sinopsys_ind']));
                                                    if(strlen($sinopsys4) < $limit) {
                                                        echo $sinopsys4;
                                                    } else {                                    
                                                        echo substr($sinopsys4,0,$limit) . "...";
                                                    }
                                                    ?>
                                                </a>
                                                <br>
                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left">
                                                        <?= $this->Html->cvtWaktuInter($all_tekno['News']['news_date']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            } else if($k < 4){
                                        ?>
                                        <div class="s-news-node s-news-xs pull-right" style="width: 288px; margin-bottom: 10px;">
                                            <div class="" style="width: 99px; height: 75px; overflow: hidden; float: left;">
                                                <a href="<?= Router::url("/berita/{$all_tekno['News']['id']}/$all_tekno_title") ?>">
                                                    <img src="<?= str_replace('\\', '/', Router::url("{$all_tekno['News']['thumbnail_path']}", true)) ?>" style="left: 50%; margin-left: -60%; position: relative; width: auto !important; height: 100% !important;">
                                                </a>
                                            </div>

                                            <div class="news-module-ver-content" style="width: 188px; float: left; padding-left: 15px;">
                                                <div class="news-module-ver-title"  style="min-height: 25px; height: inherit; max-height: 45px;">
                                                    <a href="<?= Router::url("/berita/{$all_tekno['News']['id']}/$all_tekno_title") ?>">
                                                        <?= $all_tekno['News']['title_ind'] ?>
                                                    </a>
                                                </div>

                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left" style="margin-top: 0px;">
                                                        <?= $this->Html->cvtWaktuInter($all_tekno['News']['news_date']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                             }
                                        }
                                        ?>
                                    </div>
                                    <div class="item">
                                        <?php
                                        foreach($categoryTekno as $k => $all_tekno) {
                                            if($k == 4) {
                                        ?>
                                        <div class="news-module-ver news-module-verKategori s-news-lg pull-left">
                                            <div class="news-module-ver-img">
                                                <a href="<?= Router::url("/berita/{$all_tekno['News']['id']}/$all_tekno_title") ?>">
                                                <div style="height:174px; overflow:hidden;">
                                                    <img src="<?= str_replace('\\', '/', Router::url("{$all_tekno['News']['thumbnail_path']}", true)) ?>" style="left: 50%; margin-left: -50%; position: relative; width: auto !important; height: 100% !important;">
                                                </div>
                                                </a>
                                            </div>

                                            <div class="news-module-ver-content font-sourceSansPro">
                                                <div class="news-module-ver-title news-module-ver-titlePrimary">
                                                    <a href="<?= Router::url("/berita/{$all_tekno['News']['id']}/$all_tekno_title") ?>">
                                                        <?= $all_tekno['News']['title_ind'] ?>
                                                    </a>
                                                </div>
                                                
                                                <?php
                                                $sinopsys42 = strip_tags(html_entity_decode($all_tekno['News']['sinopsys_ind']));
                                                if(strlen($sinopsys42) < $limit) {
                                                    echo $sinopsys42;
                                                } else {                                    
                                                    echo substr($sinopsys42,0,$limit) . "...";
                                                }
                                                ?>

                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left">
                                                        <?= $this->Html->cvtWaktuInter($all_tekno['News']['news_date']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            } else if($k > 4 && $k < 8){
                                        ?>
                                        <div class="s-news-node s-news-xs pull-right" style="width: 288px; margin-bottom: 10px;">
                                            <div class="" style="width: 99px; height: 75px; overflow: hidden; float: left;">
                                                <a href="<?= Router::url("/berita/{$all_tekno['News']['id']}/$all_tekno_title") ?>">
                                                    <img src="<?= str_replace('\\', '/', Router::url("{$all_tekno['News']['thumbnail_path']}", true)) ?>" style="left: 50%; margin-left: -60%; position: relative; width: auto !important; height: 100% !important;">
                                                </a>
                                            </div>

                                            <div class="news-module-ver-content" style="width: 188px; float: left; padding-left: 15px;">
                                                <div class="news-module-ver-title" style="min-height: 25px; height: inherit; max-height: 45px;">
                                                    <a href="<?= Router::url("/berita/{$all_tekno['News']['id']}/$all_tekno_title") ?>">
                                                        <?= $all_tekno['News']['title_ind'] ?>
                                                    </a>
                                                </div>

                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left" style="margin-top: 0px;">
                                                        <?= $this->Html->cvtWaktuInter($all_tekno['News']['news_date']) ?>
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
                            <div style="position: relative; float: right; text-align: center; margin-top: -4px; margin-right: 70px;">
                                <a href="<?= Router::url("/kategori/tekno/lihat-semua", true) ?>" class="pull-left"  style="margin-right: 20px; background-color: #F3F3F3; padding: 0px 10px;">
                                    <span style="font-size: 12px; color: #ec2227; margin-right: 10px;">LIHAT SEMUA</span>
                                    <img src="<?=Router::url("/front_file/makassar-terkini/img/icon/all-window-red.png", true) ?>" height="10px" style="margin-top: -2px;">
                                </a>
                                <a class="s-tick" href="#tekno-kategori-carousel" role="button" data-slide="prev" style="top: 7px; right: 36px;">
                                    <img src="<?=Router::url("/front_file/makassar-terkini/img/icon/news-tick-left.png", true) ?>" width="12px">
                                </a>
                                <a class="s-tick" href="#tekno-kategori-carousel" role="button" data-slide="next" style="top: 7px; right: 16px;">
                                    <img src="<?=Router::url("/front_file/makassar-terkini/img/icon/news-tick-right.png", true) ?>" width="12px">
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane" id="m-kbf" style="padding-top: 10px; padding-right: 10px;">
                            <div id="lifestyle-kategori-carousel" class="carousel slide" data-ride="carousel" style="height: inherit; position: relative;">
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active ">
                                        <?php
                                        foreach($categoryLifestyle as $k => $all_lifestyle) {
                                            $all_lifestyle_title = seoUrl($all_lifestyle['News']['title_ind']);
                                            if($k == 0) {
                                        ?>
                                        <div class="news-module-ver s-news-lg pull-left news-module-verKategori">
                                            <div class="news-module-ver-img">
                                                <a href="<?= Router::url("/berita/{$all_lifestyle['News']['id']}/$all_lifestyle_title") ?>">
                                                <div style="height:174px; overflow:hidden;">
                                                    <img src="<?= str_replace('\\', '/', Router::url("{$all_lifestyle['News']['thumbnail_path']}", true)) ?>" style="left: 50%; margin-left: -50%; position: relative; width: auto !important; height: 100% !important;">
                                                </div>
                                                </a>
                                            </div>

                                            <div class="news-module-ver-content font-sourceSansPro">
                                                <div class="news-module-ver-title news-module-ver-titlePrimary">
                                                    <a><?= $all_lifestyle['News']['title_ind'] ?>
                                                </div>
                                                
                                                <a href="<?= Router::url("/berita/{$all_lifestyle['News']['id']}/$all_lifestyle_title") ?>"> 
                                                    <?php
                                                    $sinopsys5 = strip_tags(html_entity_decode($all_lifestyle['News']['sinopsys_ind']));
                                                    if(strlen($sinopsys5) < $limit) {
                                                        echo $sinopsys5;
                                                    } else {                                    
                                                        echo substr($sinopsys5,0,$limit) . "...";
                                                    }
                                                    ?>
                                                </a>
                                                <br>
                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left">
                                                        <?= $this->Html->cvtWaktuInter($all_lifestyle['News']['news_date']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            } else if($k < 4){
                                        ?>
                                        <div class="s-news-node s-news-xs pull-right" style="width: 288px; margin-bottom: 10px;">
                                            <div class="" style="width: 99px; height: 75px; overflow: hidden; float: left;">
                                                <a href="<?= Router::url("/berita/{$all_lifestyle['News']['id']}/$all_lifestyle_title") ?>">
                                                    <img src="<?= str_replace('\\', '/', Router::url("{$all_lifestyle['News']['thumbnail_path']}", true)) ?>" style="left: 50%; margin-left: -60%; position: relative; width: auto !important; height: 100% !important;">
                                                </a>
                                            </div>

                                            <div class="news-module-ver-content" style="width: 188px; float: left; padding-left: 15px;">
                                                <div class="news-module-ver-title"  style="min-height: 25px; height: inherit; max-height: 45px;">
                                                    <a href="<?= Router::url("/berita/{$all_lifestyle['News']['id']}/$all_lifestyle_title") ?>">
                                                        <?= $all_lifestyle['News']['title_ind'] ?>
                                                    </a>
                                                </div>

                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left" style="margin-top: 0px;">
                                                        <?= $this->Html->cvtWaktuInter($all_lifestyle['News']['news_date']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                             }
                                        }
                                        ?>
                                    </div>
                                    <div class="item">
                                        <?php
                                        foreach($categoryLifestyle as $k => $all_lifestyle) {
                                            if($k == 4) {
                                        ?>
                                        <div class="news-module-ver news-module-verKategori s-news-lg pull-left">
                                            <div class="news-module-ver-img">
                                                <a href="<?= Router::url("/berita/{$all_lifestyle['News']['id']}/$all_lifestyle_title") ?>">
                                                <div style="height:174px; overflow:hidden;">
                                                    <img src="<?= str_replace('\\', '/', Router::url("{$all_lifestyle['News']['thumbnail_path']}", true)) ?>" style="left: 50%; margin-left: -50%; position: relative; width: auto !important; height: 100% !important;">
                                                </div>
                                                </a>
                                            </div>

                                            <div class="news-module-ver-content font-sourceSansPro">
                                                <div class="news-module-ver-title news-module-ver-titlePrimary">
                                                    <a href="<?= Router::url("/berita/{$all_lifestyle['News']['id']}/$all_lifestyle_title") ?>">
                                                        <?= $all_lifestyle['News']['title_ind'] ?>
                                                    </a>
                                                </div>
                                                
                                                <?php
                                                $sinopsys52 = strip_tags(html_entity_decode($all_lifestyle['News']['sinopsys_ind']));
                                                if(strlen($sinopsys52) < $limit) {
                                                    echo $sinopsys52;
                                                } else {                                    
                                                    echo substr($sinopsys52,0,$limit) . "...";
                                                }
                                                ?>
                                                <br>
                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left">
                                                        <?= $this->Html->cvtWaktuInter($all_lifestyle['News']['news_date']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            } else if($k > 4 && $k < 8){
                                        ?>
                                        <div class="s-news-node s-news-xs pull-right" style="width: 288px; margin-bottom: 10px;">
                                            <div class="" style="width: 99px; height: 75px; overflow: hidden; float: left;">
                                                <a href="<?= Router::url("/berita/{$all_lifestyle['News']['id']}/$all_lifestyle_title") ?>">
                                                    <img src="<?= str_replace('\\', '/', Router::url("{$all_lifestyle['News']['thumbnail_path']}", true)) ?>" style="left: 50%; margin-left: -60%; position: relative; width: auto !important; height: 100% !important;">
                                                </a>
                                            </div>

                                            <div class="news-module-ver-content" style="width: 188px; float: left; padding-left: 15px;">
                                                <div class="news-module-ver-title" style="min-height: 25px; height: inherit; max-height: 45px;">
                                                    <a href="<?= Router::url("/berita/{$all_lifestyle['News']['id']}/$all_lifestyle_title") ?>">
                                                        <?= $all_lifestyle['News']['title_ind'] ?>
                                                    </a>
                                                </div>

                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left" style="margin-top: 0px;">
                                                        <?= $this->Html->cvtWaktuInter($all_lifestyle['News']['news_date']) ?>
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
                            <div style="position: relative; float: right; text-align: center; margin-top: -4px; margin-right: 70px;">
                                <a href="<?= Router::url("/kategori/lifestyle/lihat-semua", true) ?>" class="pull-left" style="margin-right: 20px; background-color: #F3F3F3; padding: 0px 10px;">
                                    <span style="font-size: 12px; color: #ec2227; margin-right: 10px;">LIHAT SEMUA</span>
                                    <img src="<?=Router::url("/front_file/makassar-terkini/img/icon/all-window-red.png", true) ?>" height="10px" style="margin-top: -2px;">
                                </a>
                                <a class="s-tick" href="#lifestyle-kategori-carousel" role="button" data-slide="prev" style="top: 7px; right: 36px;">
                                    <img src="<?=Router::url("/front_file/makassar-terkini/img/icon/news-tick-left.png", true) ?>" width="12px">
                                </a>
                                <a class="s-tick" href="#lifestyle-kategori-carousel" role="button" data-slide="next" style="top: 7px; right: 16px;">
                                    <img src="<?=Router::url("/front_file/makassar-terkini/img/icon/news-tick-right.png", true) ?>" width="12px">
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane" id="m-kbv" style="padding-top: 10px; padding-right: 10px;">
                            <div id="sport-kategori-carousel" class="carousel slide" data-ride="carousel" style="height: inherit; position: relative;">
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active ">
                                        <?php
                                        foreach($categorySport as $k => $all_sport) {
                                            $all_sport_title = seoUrl($all_sport['News']['title_ind']);
                                            if($k == 0) {
                                        ?>
                                        <div class="news-module-ver s-news-lg pull-left news-module-verKategori">
                                            <div class="news-module-ver-img">
                                                <a href="<?= Router::url("/berita/{$all_sport['News']['id']}/$all_sport_title") ?>">
                                                <div style="height:174px; overflow:hidden;">
                                                    <img src="<?= str_replace('\\', '/', Router::url("{$all_sport['News']['thumbnail_path']}", true)) ?>" style="left: 50%; margin-left: -50%; position: relative; width: auto !important; height: 100% !important;">
                                                </div>
                                                </a>
                                            </div>

                                            <div class="news-module-ver-content font-sourceSansPro">
                                                <div class="news-module-ver-title news-module-ver-titlePrimary">
                                                    <a href="<?= Router::url("/berita/{$all_sport['News']['id']}/$all_sport_title") ?>">
                                                        <?= $all_sport['News']['title_ind'] ?>
                                                    </a>
                                                </div>
                                                
                                                <a href="<?= Router::url("/berita/{$all_sport['News']['id']}/$all_sport_title") ?>"> 
                                                    <?php
                                                    $sinopsys6 = strip_tags(html_entity_decode($all_sport['News']['sinopsys_ind']));
                                                    if(strlen($sinopsys6) < $limit) {
                                                        echo $sinopsys6;
                                                    } else {                                    
                                                        echo substr($sinopsys6,0,$limit) . "...";
                                                    }
                                                    ?>
                                                </a>
                                                <br>
                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left">
                                                        <?= $this->Html->cvtWaktuInter($all_sport['News']['news_date']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            } else if($k < 4){
                                        ?>
                                        <div class="s-news-node s-news-xs pull-right" style="width: 288px; margin-bottom: 10px;">
                                            <div class="" style="width: 99px; height: 75px; overflow: hidden; float: left;">
                                                <a href="<?= Router::url("/berita/{$all_sport['News']['id']}/$all_sport_title") ?>">
                                                    <img src="<?= str_replace('\\', '/', Router::url("{$all_sport['News']['thumbnail_path']}", true)) ?>" style="left: 50%; margin-left: -60%; position: relative; width: auto !important; height: 100% !important;">
                                                </a>
                                            </div>

                                            <div class="news-module-ver-content" style="width: 188px; float: left; padding-left: 15px;">
                                                <div class="news-module-ver-title" style="min-height: 25px; height: inherit; max-height: 45px;">
                                                    <a href="<?= Router::url("/berita/{$all_sport['News']['id']}/$all_sport_title") ?>">
                                                        <?= $all_sport['News']['title_ind'] ?>
                                                    </a>
                                                </div>

                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left" style="margin-top: 0px;">
                                                        <?= $this->Html->cvtWaktuInter($all_sport['News']['news_date']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                             }
                                        }
                                        ?>
                                    </div>
                                    <div class="item">
                                        <?php
                                        foreach($categorySport as $k => $all_sport) {
                                            if($k == 4) {
                                        ?>
                                        <div class="news-module-ver news-module-verKategori s-news-lg pull-left">
                                            <div class="news-module-ver-img">
                                                <a href="<?= Router::url("/berita/{$all_sport['News']['id']}/$all_sport_title") ?>">
                                                <div style="height:174px; overflow:hidden;">
                                                    <img src="<?= str_replace('\\', '/', Router::url("{$all_sport['News']['thumbnail_path']}", true)) ?>" style="left: 50%; margin-left: -50%; position: relative; width: auto !important; height: 100% !important;">
                                                </div>
                                                </a>
                                            </div>

                                            <div class="news-module-ver-content font-sourceSansPro">
                                                <div class="news-module-ver-title news-module-ver-titlePrimary">
                                                    <a href="<?= Router::url("/berita/{$all_sport['News']['id']}/$all_sport_title") ?>">
                                                        <?= $all_sport['News']['title_ind'] ?>
                                                    </a>
                                                </div>
                                                
                                                <?php
                                                $sinopsys62 = strip_tags(html_entity_decode($all_sport['News']['sinopsys_ind']));
                                                if(strlen($sinopsys62) < $limit) {
                                                    echo $sinopsys62;
                                                } else {                                    
                                                    echo substr($sinopsys62,0,$limit) . "...";
                                                }
                                                ?>
                                                <br>
                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left">
                                                        <?= $this->Html->cvtWaktuInter($all_sport['News']['news_date']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            } else if($k > 4 && $k < 8){
                                        ?>
                                        <div class="s-news-node s-news-xs pull-right" style="width: 288px; margin-bottom: 10px;">
                                            <div class="" style="width: 99px; height: 75px; overflow: hidden; float: left;">
                                                <a href="<?= Router::url("/berita/{$all_sport['News']['id']}/$all_sport_title") ?>">
                                                    <img src="<?= str_replace('\\', '/', Router::url("{$all_sport['News']['thumbnail_path']}", true)) ?>" style="left: 50%; margin-left: -60%; position: relative; width: auto !important; height: 100% !important;">
                                                </a>
                                            </div>

                                            <div class="news-module-ver-content" style="width: 188px; float: left; padding-left: 15px;">
                                                <div class="news-module-ver-title"  style="min-height: 25px; height: inherit; max-height: 45px;">
                                                    <a href="<?= Router::url("/berita/{$all_sport['News']['id']}/$all_sport_title") ?>">
                                                        <?= $all_sport['News']['title_ind'] ?>
                                                    </a>
                                                </div>

                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left" style="margin-top: 0px;">
                                                        <?= $this->Html->cvtWaktuInter($all_sport['News']['news_date']) ?>
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
                            <div style="position: relative; float: right; text-align: center; margin-top: -4px; margin-right: 70px;">
                                <a href="<?= Router::url("/kategori/sport/lihat-semua", true) ?>" class="pull-left" style="margin-right: 20px; background-color: #F3F3F3; padding: 0px 10px;">
                                    <span style="font-size: 12px; color: #ec2227; margin-right: 10px;">LIHAT SEMUA</span>
                                    <img src="<?=Router::url("/front_file/makassar-terkini/img/icon/all-window-red.png", true) ?>" height="10px" style="margin-top: -2px;">
                                </a>
                                <a class="s-tick" href="#sport-kategori-carousel" role="button" data-slide="prev" style="top: 7px; right: 36px;">
                                    <img src="<?=Router::url("/front_file/makassar-terkini/img/icon/news-tick-left.png", true) ?>" width="12px">
                                </a>
                                <a class="s-tick" href="#sport-kategori-carousel" role="button" data-slide="next" style="top: 7px; right: 16px;">
                                    <img src="<?=Router::url("/front_file/makassar-terkini/img/icon/news-tick-right.png", true) ?>" width="12px">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

        </div>
    </div>
</div>

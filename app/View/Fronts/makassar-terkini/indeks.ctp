<!DOCTYPE html>
<html>
    <head>
        <title>Indeks</title>
        <?php include('_css.php'); ?>
        <style type="text/css">
            .s-fancy-header-red .s-title {
                font-style: normal;
            }

            .field-searchInput{
                box-shadow: none;
                border: none;
                border-top-left-radius: 2px;
                border-bottom-left-radius: 2px;
            }

            .s-pp-nav-left li a {
                font-weight: normal;
                height: 50px;
                line-height: 30px;
            }

            .s-pp-nav-left li.active a::after {
                width: 16px;
                height: 22px;
                top: 15px;
            }

            .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
                color: white;
                background-color: #ED1C24;
                font-weight: normal !important;
            }

            .s-pp-nav-left li a:hover {
                font-weight: normal;
            }

            .field-searchInput::-webkit-input-placeholder { color: #A9ABAE !important; font-style: italic !important; }
            .field-searchInput:-moz-placeholder { color: #A9ABAE !important; font-style: italic !important; }
            .field-searchInput::-moz-placeholder { color: #A9ABAE !important; font-style: italic !important; }
            .field-searchInput:-ms-input-placeholder { color: #A9ABAE !important; font-style: italic !important; }

            .adv-bottom{
                margin-bottom: 0px !important;
            }

            .content-adv{
                margin-top: 40px !important;
            }

            /*            .s-main-content{
                            margin-top: -90px !important;
                        }*/

            .s-main-content{
                margin-top: -100px !important;
            }

        </style>
    </head>

    <body class="body-offcanvas"
    <?php
    $now = new DateTime();
    ?>
          <!--Content-->
          <!--==================================================-->
          <section class="s-main-content content-adv">

            <!-- Adv Middle Top -->
            <!--==================================================-->
            <?php
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 1, "idx" => 1]);
            ?>
            <div class="container-fluid">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 index-contentBack">
                            <div class="" style="position: relative;">

                                <div class="s-fancy-header-red">
                                    <span class="s-title">Indeks Kanal</span>
                                    <ul class="list-unstyled s-sub-menu" style="">

                                        <div class="pull-right">
                                            <form>
                                                <div class="pull-left">
                                                    <span style="margin-left: 15px; margin-right: 15px">
                                                        From
                                                    </span>
                                                    <input type="text" class="daterangestart" style="height:20px;color:#000;" name="find_start" value="<?= isset($this->request->query["find_start"]) ? $this->request->query["find_start"] : "" ?>"/>
                                                </div>
                                                <div class="pull-left">
                                                    <span style="margin-left: 15px; margin-right: 15px">
                                                        To
                                                    </span>
                                                    <input type="text" class="daterangeend" style="height:20px;color:#000;" name="find_end" value="<?= isset($this->request->query["find_end"]) ? $this->request->query["find_end"] : "" ?>"/>
                                                </div>
                                                <button class="pull-left" type="submit" style="width: 51px; height: 18px; padding: 0px; border: 0px; margin-top: 7px; margin-left: 15px; margin-right: 15px;">
                                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/cari-orange.png", true) ?>" class="pull-left">
                                                </button>
                                            </form>
                                        </div>
                                    </ul>
                                </div>
                                <span class="clearfix"></span>
                                <p class="text-center" style="width: 100%; border-bottom: 1px solid #bbbdbf; padding-bottom: 16px;">
                                    <?php
                                    if (($startNewsDate == $endNewsDate) && ($startNewsDate == date("Y-m-d"))) {
                                        ?>
                                        Indeks Berita Hari Ini : <?= $this->Html->cvtHariTanggal(null, true) ?>
                                        <?php
                                    } else {
                                        ?>
                                        Indeks Berita : <?= $this->Html->periode($startNewsDate, $endNewsDate) ?>
                                        <?php
                                    }
                                    ?>
                                </p>
                                <span class="clearfix"></span>
                                <ul class="nav nav-tabs s-pp-nav-left pull-left font-sourceSansPro" id="myTab00" style="font-size: 15px;"> <!-- f-flyLeft-nav flyLeftAbsolute -->
                                    <li class="active" style="width: inherit; display: block;"><a href="#tab-all" data-target="#tab-all" data-toggle="tab">Keseluruhan</a></li>
                                    <?php
                                    $categories = ClassRegistry::init("NewsCategory")->find("all");
                                    foreach ($categories as $all) {
                                        ?>
                                        <li class="" style="width: inherit; display: block;"><a href="#tab-<?= $all['NewsCategory']['uniq'] ?>" data-target="#tab-<?= $all['NewsCategory']['uniq'] ?>" data-toggle="tab"><?= $all['NewsCategory']['name'] ?></a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>

                                <div class="tab-content pull-right" style="width: calc(100% - 160px); display: block;">
                                    <div class="tab-pane active" id="tab-all" style="padding-top: 10px;">
                                        <?php
                                        foreach ($allNews as $news) {
                                            $news_title = seoUrl($news['News']['title_ind']);
                                            ?>
                                            <div class="baris-indeks" style="">
                                                <div class="waktu" style="">
                                                    <span><?= $this->Html->cvtJam($news['News']['created']) ?> WITA</span>
                                                    <span class="clearfix"></span>
                                                    <span><?= $this->Html->cvtHariTanggal($news['News']['created']) ?></span>
                                                </div>
                                                <div class="konektor" style="">
                                                    <span class="node" style="">
                                                    </span>
                                                </div>
                                                <div class="berita" style="">
                                                    <span style="text-transform: uppercase;">
                                                        <a href="<?= Router::url("/kategori/{$news['NewsCategory']['uniq']}", true) ?>">
                                                            <?= $news["NewsCategory"]['name'] ?>
                                                        </a>
                                                    </span>
                                                    <span class="clearfix"></span>
                                                    <span>
                                                        <?php
                                                        if ($news['News']['news_type_id'] == 1) {
                                                            ?>
                                                            <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title", true) ?>">
                                                                <?php
                                                            } else if ($news['News']['news_type_id'] == 2) {
                                                                ?>
                                                                <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title", true) ?>">
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title", true) ?>">
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                    <?= $news["News"]['title_ind'] ?>
                                                                </a>
                                                                </span>
                                                                </div>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            </div>
                                                            <?php
                                                            foreach ($categories as $category) {
                                                                ?>
                                                                <div class="tab-pane" id="tab-<?= $category['NewsCategory']['uniq'] ?>" style="padding-top: 10px;">    

                                                                    <?php
                                                                    foreach ($result[$category['NewsCategory']['uniq']]['data'] as $news) {
                                                                        ?>
                                                                        <div class="baris-indeks" style="">
                                                                            <div class="waktu" style="">
                                                                                <span><?= $this->Html->cvtJam($news['News']['created']) ?> WITA</span>
                                                                                <span class="clearfix"></span>
                                                                                <span><?= $this->Html->cvtHariTanggal($news['News']['created']) ?></span>
                                                                            </div>
                                                                            <div class="konektor" style="">
                                                                                <span class="node" style="">
                                                                                </span>
                                                                            </div>
                                                                            <div class="berita" style="">
                                                                                <span style="text-transform: uppercase;">
                                                                                    <?= $news["NewsCategory"]['name'] ?>
                                                                                </span>
                                                                                <span class="clearfix"></span>
                                                                                <span>
                                                                                    <?= $news["News"]['title_ind'] ?>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>

                                                            </div>
                                                            </div>
                                                            </div>
                                                            </div>

                                                            <div class="row">

                                                            </div>
                                                            </div>
                                                            </div>


            <!-- Adv Middle Top -->
            <!--==================================================-->
            <?php
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 1, "class" => "adv-bottom"]);
            ?>
                                                            </section>

                                                            <style type="text/css">
                                                                #chartdiv {
                                                                    width       : 100%;
                                                                    height      : 500px;
                                                                    font-size   : 11px;
                                                                }
                                                            </style>
                                                            </body>
                                                            </html>
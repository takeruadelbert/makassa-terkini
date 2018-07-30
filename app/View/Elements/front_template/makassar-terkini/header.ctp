<?php
$news_categories = $allCategories;
$now = new DateTime();
?>
<script>
	var topp = false;
</script>
<header class="s-header" style="position: fixed; z-index: 9; width: 100%; top: 0px;">
    <?php
    if(!empty(ClassRegistry::init("Advert")->find('first', array("conditions" => array("Advert.advert_position_id" => 1, "Advert.advert_type_id" => 1))))) {
        $adv_header_atas = ClassRegistry::init("Advert")->find('all',[
            "conditions" => [
                "Advert.advert_type_id" => 1,
                "Advert.advert_position_id" => 1,
            ],
            "order" => "Advert.id",
        ]);
        if($adv_header_atas[0]['Advert']['advert_status_id'] == 2 || $now > new DateTime($adv_header_atas[0]['Advert']['expired_date'])) {
		?>
		<script>
			topp = true;
		</script>
		<?php
        } else {
    ?>
    <div class="adv adv-top">
        <div class="adv-closer f-close-top-adv">
            <span>close/tutup</span>
            <span class="the-x">X</span>
        </div>        
        <a target="_blank" class="advHeader advCountable" data-counted="false" data-id="<?= $adv_header_atas[0]['Advert']['id'] ?>" href="<?= $adv_header_atas[0]['Advert']['url'] ?>"> 
            <img src="<?= str_replace('\\', '/', Router::url("{$adv_header_atas[0]['Advert']['path']}", true)) ?>">           
        </a>
    </div>
    <?php
        }
    }
    ?>
    <!-- Begin Navbar -->
    <div id="hover-header" class="s-header-c0"><!-- 35px -->
        <div class="s-container text-right">
            <div class="header-time font-sourceSansProSemibold">
                <?php
                // set default timezone
                date_default_timezone_set('Asia/Jakarta'); // CDT

                $current_date = date('m/d/Y H:i:s');
                echo "WAKTU SERVER : " . $this->Html->cvtHariTanggalJam($current_date);
                ?>
            </div>
            <div class="header-login">
                <div class="header-loginLine">
                    <?php
                    if ($page == "profile_member") {
                        ?>
                        <a href="<?= Router::url("/logout", true) ?>">
                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/pp-white.png", true)?>">&nbsp;Logout
                        </a>(<a href="<?= Router::url("/profile_member", true) ?>">
                            <?php
                            if($this->Session->check("credential.member.Biodata")) {
                                echo $this->Session->read("credential.member.Biodata.full_name");
                            } else {
                                echo $this->Session->read("credential.member.SocialProfile.0.display_name");
                            }
                            ?>
                        </a>)
                        <?php
                    } else {
                        if($this->Session->check("credential.member")) {
                        ?>
                        <a href="<?= Router::url("/logout", true) ?>">
                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/pp-white.png", true)?>">&nbsp;Logout
                        </a>(<a href="<?= Router::url("/profile_member", true) ?>">
                            <?php
                            if($this->Session->check("credential.member.Biodata")) {
                                echo $this->Session->read("credential.member.Biodata.full_name");
                            } else {
                                echo $this->Session->read("credential.member.SocialProfile.0.display_name");
                            }
                            ?>
                        </a>)
                        <?php
                        } else {
                        ?>
                        <a href="<?= Router::url("/login-register", true) ?>">
                            <div class="header-loginFont"><img src="<?= Router::url("/front_file/makassar-terkini/img/icon/pp-white.png", true)?>">Login / Daftar</div>
                        </a>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="header-socialMedia">
                <?php
                $social_medias = ClassRegistry::init("SocialMedia")->find("all", [
                    "conditions" => [
                        "SocialMedia.showing_status_id" => 1,
                    ]
                ]);
                foreach ($social_medias as $socials) {
                ?>
                <a href="<?= $socials['SocialMedia']['url'] ?>">
                <?php
                    if($socials['SocialMedia']['uniq'] == 'path') {
                ?>
                <img src="<?= Router::url("/img/icons/path.png", true) ?>" width="20" height="20">
                <?php
                    } else {
                ?>
                <i class="fa fa-<?= $socials['SocialMedia']['uniq'] ?>" aria-hidden="true"></i>
                <?php
                    }
                ?>                    
                </a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="s-header-sprt--white"><!-- 3px -->
        <div class="s-container">
            <div class="s-beauty-line" style="">
            </div>
        </div>
    </div>
    <div id="parentDisplayMenu" class="s-header-c1"><!-- 81px -->
        <div class="s-container">
            <div class="s-tbl pull-left" style="width: 269px;">
                <div class="s-cell" style="text-align: center;">
                    <a href="<?= Router::url("/", true) ?>"><img src="<?= Router::url("/front_file/makassar-terkini/img/icon/logo.png", true) ?>" width="150" height="auto"></a>
                </div>
            </div>
            <ul class="s-ul-header-nav f-header-nav font-arial header-arialSize" style="/*font-size: 13px !important;*/">
                <li class="flex-item"><a class="active" href="<?= Router::url("/", true) ?>"><img src="<?= Router::url("/front_file/makassar-terkini/img/icon/home.png", true) ?>"></a></li>
                <?php
                foreach ($news_categories as $item) {
                    if ($item['NewsCategory']['parent_id'] == null) {
                        ?>
                        <li class="flex-item"><a data-id="<?= $item['NewsCategory']['uniq'] ?>" href="<?= Router::url("/kategori/{$item['NewsCategory']['uniq']}", true) ?>"><?= $item['NewsCategory']['name'] ?></a></li>
                        <?php
                    }
                }
                ?>
                <li class="flex-item"><a id="indeks" class="ignore" href="<?= Router::url("/indeks", true) ?>">indeks</a></li>
                <li class="flex-item"><a id="citizen-report" class="ignore" href="<?= Router::url("/citizen-report", true) ?>">citizen report</a></li>
                <li class="flex-item">
                    <a id="search-head" class="ignore" href="#"><img src="<?= Router::url("/front_file/makassar-terkini/img/icon/header-search.png", true) ?>" width="30px"></a>
                </li>
            </ul>

            <div id="search-cont" class="s-search-cont" style="display: none;">
                <form type="GET" action="<?= Router::url("/search") ?>">
                    <input class="form-control pull-left field-header-cari" placeholder="Judul berita..." style="" name="term">
                    <button class="btn btn-success pull-left" style="">
                        Cari
                    </button>
                </form>
            </div>
            <div id="news" class="s-mega-menu f-mega-menu" style="display: none;">
                <div class="s-menu">
                    <ul>
                        <?php
                        foreach ($news_categories as $sub) {
                            if ($sub['NewsCategory']['parent_id'] != null) {
                                if ($sub['NewsCategory']['parent_id'] == 1) {
                                    ?>
                                    <li><a href="<?= Router::url("/kategori/{$sub['NewsCategory']['uniq']}") ?>"><?= $sub['NewsCategory']['name'] ?></a></li>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="s-news-cnt">
                    <?php
                        $previewNews = ClassRegistry::init("NewsCategoryPreview")->find('first',[
                            "conditions" => [
                                "NewsCategoryPreview.uniq" => "pnews",
                            ],
                            "contain" => [
                                "NewsCategoryPreviewDetail" => [
                                    "News",
                                    "order" => "NewsCategoryPreviewDetail.is_primary desc", 
                                ]
                            ],
                        ]);
                        foreach ($previewNews['NewsCategoryPreviewDetail'] as $k => $news) {
                            $news_title = seoUrl($news['News']['title_ind']);
                            if($k == 0) {
                    ?>
                    <div class="s-headline s-news-node">
                        <div class="img-container">
                            <?php
                                if($news['News']['news_type_id'] == 1) {
                            ?>
                            <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                } else if($news['News']['news_type_id'] == 2){
                            ?>
                            <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                } else {
                            ?>
                            <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                }
                            ?>
                                <img src="<?= str_replace('\\', '/', Router::url("{$news['News']['thumbnail_path']}", true)) ?>" alt="">
                            </a>
                        </div>
                        <div class="header-titlePrimary">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <span class="s-time">
                                <!--<span class="pull-left" style="margin-top: 2px;"><?= $this->Html->cvtWaktuInter($news['News']['publish_date']) ?></span>-->
                                <span class="pull-left header-primaryTime" style="margin-top: 2px;"><?= $this->Html->cvtWaktuInter($news['News']['news_date']) ?></span>
                            </span>
                                </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php
                                    if($news['News']['news_type_id'] == 1) {
                                ?>
                                <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    } else if($news['News']['news_type_id'] == 2){
                                ?>
                                <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    } else {
                                ?>
                                <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    }
                                ?>
                                    <?= $news['News']['title_ind'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                           } else {
                    ?>
                    <?php
                        if($news['News']['news_type_id'] == 1) {
                    ?>
                    <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                    <?php
                        } else if($news['News']['news_type_id'] == 2){
                    ?>
                    <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title") ?>">
                    <?php
                        } else {
                    ?>
                    <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                    <?php
                        }
                    ?>
                        <div class="s-news-node">
                            <div class="img-container"> 
                                <img src="<?= str_replace('\\', '/', Router::url("{$news['News']['thumbnail_path']}", true)) ?>" alt="">
                            </div>
                            <div class="header-titleSecondary">
                                    <?php
                                    if($news['News']['news_type_id'] == 1) {
                                    ?>
                                    <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                                    <?php
                                        } else if($news['News']['news_type_id'] == 2){
                                    ?>
                                    <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title") ?>">
                                    <?php
                                        } else {
                                    ?>
                                    <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                                    <?php
                                        }
                                    ?>
                                        <?= $news['News']['title_ind'] ?>
                                    </a>
                                
                            </div>
                        </div>
                    </a>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <div id="bisnis" class="s-mega-menu f-mega-menu" style="display: none;">
                <div class="s-menu">
                    <ul>
                        <?php                        
                        foreach ($news_categories as $sub) {
                            if ($sub['NewsCategory']['parent_id'] != null) {
                                if ($sub['NewsCategory']['parent_id'] == 2) {
                                    ?>
                                    <li><a href="<?= Router::url("/kategori/{$sub['NewsCategory']['uniq']}") ?>"><?= $sub['NewsCategory']['name'] ?></a></li>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="s-news-cnt">
                    <?php
                        $previewBisnis = ClassRegistry::init("NewsCategoryPreview")->find('first',[
                            "conditions" => [
                                "NewsCategoryPreview.uniq" => "pbisnis",
                            ],
                            "contain" => [
                                "NewsCategoryPreviewDetail" => [
                                    "News",
                                    "order" => "NewsCategoryPreviewDetail.is_primary desc", 
                                ]
                            ],
                        ]);
                        foreach ($previewBisnis['NewsCategoryPreviewDetail'] as $k => $news) {
                            $news_title = seoUrl($news['News']['title_ind']);
                           if($k == 0) {
                    ?>
                    <div class="s-headline s-news-node">
                        <div class="img-container">
                            <?php
                                if($news['News']['news_type_id'] == 1) {
                            ?>
                            <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                } else if($news['News']['news_type_id'] == 2) {
                            ?>
                            <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                } else {
                            ?>
                            <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                }
                            ?>
                                <img src="<?= str_replace('\\', '/', Router::url("{$news['News']['thumbnail_path']}", true)) ?>" alt="">
                            </a>
                        </div>
                        <div class="header-titlePrimary">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <span class="s-time">
                                <!--<span class="pull-left" style="margin-top: 2px;"><?= $this->Html->cvtWaktuInter($news['News']['publish_date']) ?></span>-->
                                <span class="pull-left header-primaryTime" style="margin-top: 2px;"><?= $this->Html->cvtWaktuInter($news['News']['news_date']) ?></span>
                            </span>
                                </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php
                                    if($news['News']['news_type_id'] == 1) {
                                ?>
                                <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    } else if($news['News']['news_type_id'] == 2){
                                ?>
                                <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    } else {
                                ?>
                                <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    }
                                ?>
                                    <?= $news['News']['title_ind'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                           } else {
                    ?>
                    <div class="s-news-node">
                        <div class="img-container">
                            <?php
                                if($news['News']['news_type_id'] == 1) {
                            ?>
                            <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                } else if($news['News']['news_type_id'] == 2) {
                            ?>
                            <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                }
                            ?>
                                <img src="<?= str_replace('\\', '/', Router::url("{$news['News']['thumbnail_path']}", true)) ?>" alt="">
                            </a>
                        </div>
                        <div class="header-titleSecondary">
                                <?php
                                    if($news['News']['news_type_id'] == 1) {
                                ?>
                                <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    } else if($news['News']['news_type_id'] == 2){
                                ?>
                                <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    } else {
                                ?>
                                <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    }
                                ?>
                                    <?= $news['News']['title_ind'] ?>
                                </a>
                        </div>
                    </div>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <div id="tekno" class="s-mega-menu f-mega-menu" style="display: none;">
                <div class="s-menu">
                    <ul>
                        <?php
                        foreach ($news_categories as $sub) {
                            if ($sub['NewsCategory']['parent_id'] != null) {
                                if ($sub['NewsCategory']['parent_id'] == 3) {
                                    ?>
                                    <li><a href="<?= Router::url("/kategori/{$sub['NewsCategory']['uniq']}") ?>"><?= $sub['NewsCategory']['name'] ?></a></li>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="s-news-cnt">
                    <?php
                        $previewTekno = ClassRegistry::init("NewsCategoryPreview")->find('first',[
                            "conditions" => [
                                "NewsCategoryPreview.uniq" => "ptekno",
                            ],
                            "contain" => [
                                "NewsCategoryPreviewDetail" => [
                                    "News",
                                    "order" => "NewsCategoryPreviewDetail.is_primary desc", 
                                ]
                            ],
                        ]);
                        foreach ($previewTekno['NewsCategoryPreviewDetail'] as $k => $news) {
                            $news_title = seoUrl($news['News']['title_ind']);
                           if($k == 0) {
                    ?>
                    <div class="s-headline s-news-node">
                        <div class="img-container">
                            <?php
                                if($news['News']['news_type_id'] == 1) {
                            ?>
                            <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                } else if($news['News']['news_type_id']) {
                            ?>
                            <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                } else {
                            ?>
                            <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                }
                            ?>
                                <img src="<?= str_replace('\\', '/', Router::url("{$news['News']['thumbnail_path']}", true)) ?>" alt="">
                            </a>
                        </div>
                        <div class="header-titlePrimary">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <span class="s-time">
                                <!--<span class="pull-left" style="margin-top: 2px;"><?= $this->Html->cvtWaktuInter($news['News']['publish_date']) ?></span>-->
                                <span class="pull-left header-primaryTime" style="margin-top: 2px;"><?= $this->Html->cvtWaktuInter($news['News']['news_date']) ?></span>
                            </span>
                                </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php
                                    if($news['News']['news_type_id'] == 1) {
                                ?>
                                <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    } else if($news['News']['news_type_id'] == 2){
                                ?>
                                <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    } else {
                                ?>
                                <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    }
                                ?>
                                    <?= $news['News']['title_ind'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                           } else {
                    ?>
                    <div class="s-news-node">
                        <div class="img-container">
                            <?php
                                if($news['News']['news_type_id'] == 1) {
                            ?>
                            <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                } else if($news['News']['news_type_id'] == 2) {
                            ?>
                            <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                } else {
                            ?>
                            <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                }
                            ?>
                                <img src="<?= str_replace('\\', '/', Router::url("{$news['News']['thumbnail_path']}", true)) ?>" alt="">
                            </a>
                        </div>
                        <div class="header-titleSecondary">
                                <?php
                                    if($news['News']['news_type_id'] == 1) {
                                ?>
                                <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    } else if($news['News']['news_type_id'] == 2){
                                ?>
                                <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    } else {
                                ?>
                                <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    }
                                ?>
                                    <?= $news['News']['title_ind'] ?>
                                </a>
                        </div>
                    </div>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <div id="lifestyle" class="s-mega-menu f-mega-menu" style="display: none;">
                <div class="s-menu">
                    <ul>
                        <?php
                        foreach ($news_categories as $sub) {
                            if ($sub['NewsCategory']['parent_id'] != null) {
                                if ($sub['NewsCategory']['parent_id'] == 4) {
                                    ?>
                                    <li><a href="<?= Router::url("/kategori/{$sub['NewsCategory']['uniq']}") ?>"><?= $sub['NewsCategory']['name'] ?></a></li>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="s-news-cnt">
                    <?php
                        $previewLifestyle = ClassRegistry::init("NewsCategoryPreview")->find('first',[
                            "conditions" => [
                                "NewsCategoryPreview.uniq" => "plifestyle",
                            ],
                            "contain" => [
                                "NewsCategoryPreviewDetail" => [
                                    "News",
                                    "order" => "NewsCategoryPreviewDetail.is_primary desc", 
                                ]
                            ],
                        ]);
                        foreach ($previewLifestyle['NewsCategoryPreviewDetail'] as $k => $news) {
                            $news_title = seoUrl($news['News']['title_ind']);
                            if($k == 0) {
                    ?>
                    <div class="s-headline s-news-node">
                        <div class="img-container">
                            <?php
                                if($news['News']['news_type_id'] == 1 || $news['News']['news_type_id'] == 2) {
                            ?>
                            <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                } else {
                            ?>
                            <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                }
                            ?>
                                <img src="<?= str_replace('\\', '/', Router::url("{$news['News']['thumbnail_path']}", true)) ?>" alt="">
                            </a>
                        </div>
                        <div class="header-titlePrimary">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <span class="s-time">
                                <!--<span class="pull-left" style="margin-top: 2px;"><?= $this->Html->cvtWaktuInter($news['News']['publish_date']) ?></span>-->
                                <span class="pull-left header-primaryTime" style="margin-top: 2px;"><?= $this->Html->cvtWaktuInter($news['News']['news_date']) ?></span>
                            </span>
                                </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php
                                    if($news['News']['news_type_id'] == 1) {
                                ?>
                                <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    } else if($news['News']['news_type_id'] == 2){
                                ?>
                                <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    } else {
                                ?>
                                <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    }
                                ?>
                                    <?= $news['News']['title_ind'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                           } else {
                    ?>
                    <div class="s-news-node">
                        <div class="img-container">
                            <?php
                                if($news['News']['news_type_id'] == 1) {
                            ?>
                            <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                } else if($news['News']['news_type_id'] == 2) {
                            ?>
                            <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                } else {
                            ?>
                            <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                }
                            ?>
                                <img src="<?= str_replace('\\', '/', Router::url("{$news['News']['thumbnail_path']}", true)) ?>" alt="">
                            </a>
                        </div>
                        <div class="header-titleSecondary">
                                <?php
                                    if($news['News']['news_type_id'] == 1) {
                                ?>
                                <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    } else if($news['News']['news_type_id'] == 2){
                                ?>
                                <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    } else {
                                ?>
                                <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    }
                                ?>
                                    <?= $news['News']['title_ind'] ?>
                                </a>
                        </div>
                    </div>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <div id="sport" class="s-mega-menu f-mega-menu" style="display: none;">
                <div class="s-menu">
                    <ul>
                        <?php
                        foreach ($news_categories as $sub) {
                            if ($sub['NewsCategory']['parent_id'] != null) {
                                if ($sub['NewsCategory']['parent_id'] == 5) {
                                    ?>
                                    <li><a href="<?= Router::url("/kategori/{$sub['NewsCategory']['uniq']}") ?>"><?= $sub['NewsCategory']['name'] ?></a></li>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="s-news-cnt">
                    <?php
                        $previewSport = ClassRegistry::init("NewsCategoryPreview")->find('first',[
                            "conditions" => [
                                "NewsCategoryPreview.uniq" => "psport",
                            ],
                            "contain" => [
                                "NewsCategoryPreviewDetail" => [
                                    "News",
                                    "order" => "NewsCategoryPreviewDetail.is_primary desc", 
                                ]
                            ],
                        ]);
                        foreach ($previewSport['NewsCategoryPreviewDetail'] as $k => $news) {
                            $news_title = seoUrl($news['News']['title_ind']);
                           if($k == 0) {
                    ?>
                    <div class="s-headline s-news-node">
                        <div class="img-container">
                            <?php
                                if($news['News']['news_type_id'] == 1) {
                            ?>
                            <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                } else if($news['News']['news_type_id'] == 2) {
                            ?>
                            <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                } else {
                            ?>
                            <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                }
                            ?>
                                <img src="<?= str_replace('\\', '/', Router::url("{$news['News']['thumbnail_path']}", true)) ?>" alt="">
                            </a>
                        </div>
                        <div class="header-titlePrimary">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <span class="s-time">
                                <!--<span class="pull-left" style="margin-top: 2px;"><?= $this->Html->cvtWaktuInter($news['News']['publish_date']) ?></span>-->
                                <span class="pull-left header-primaryTime" style="margin-top: 2px;"><?= $this->Html->cvtWaktuInter($news['News']['news_date']) ?></span>
                            </span>
                                </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php
                                    if($news['News']['news_type_id'] == 1) {
                                ?>
                                <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    } else if($news['News']['news_type_id'] == 2){
                                ?>
                                <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    } else {
                                ?>
                                <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    }
                                ?>
                                    <?= $news['News']['title_ind'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                           } else {
                    ?>
                    <div class="s-news-node">
                        <div class="img-container">
                            <?php
                                if($news['News']['news_type_id'] == 1) {
                            ?>
                            <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                } else if($news['News']['news_type_id'] == 2) {
                            ?>  
                            <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                } else {
                            ?>
                            <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                }
                            ?>
                                <img src="<?= str_replace('\\', '/', Router::url("{$news['News']['thumbnail_path']}", true)) ?>" alt="">
                            </a>
                        </div>
                        <div class="header-titleSecondary">
                                <?php
                                    if($news['News']['news_type_id'] == 1) {
                                ?>
                                <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    } else if($news['News']['news_type_id'] == 2){
                                ?>
                                <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    } else {
                                ?>
                                <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    }
                                ?>
                                    <?= $news['News']['title_ind'] ?>
                                </a>
                        </div>
                    </div>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <div id="gallery" class="s-mega-menu f-mega-menu" style="display: none;">
                <div class="s-menu">
                    <ul>
                        <?php
                        foreach ($news_categories as $sub) {
                            if ($sub['NewsCategory']['parent_id'] != null) {
                                if ($sub['NewsCategory']['parent_id'] == 6) {
                                    ?>
                                    <li><a href="<?= Router::url("/galeri-{$sub['NewsCategory']['uniq']}") ?>"><?= $sub['NewsCategory']['name'] ?></a></li>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="s-news-cnt">
                    <?php
                        $previewGallery = ClassRegistry::init("NewsCategoryPreview")->find('first',[
                            "conditions" => [
                                "NewsCategoryPreview.uniq" => "pgallery",
                            ],
                            "contain" => [
                                "NewsCategoryPreviewDetail" => [
                                    "News",
                                    "order" => "NewsCategoryPreviewDetail.is_primary desc", 
                                ]
                            ],
                        ]);
                        foreach ($previewGallery['NewsCategoryPreviewDetail'] as $k => $news) {
                            $news_title = seoUrl($news['News']['title_ind']);
                            if($k == 0) {
                    ?>
                    <div class="s-headline s-news-node">
                        <div class="img-container">
                            <?php
                                if($news['News']['news_type_id'] == 1) {
                            ?>
                            <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                } else if($news['News']['news_type_id'] == 2) {
                            ?>
                            <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                } else {
                            ?>
                            <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                }
                            ?>
                                <img src="<?= str_replace('\\', '/', Router::url("{$news['News']['thumbnail_path']}", true)) ?>" alt="">
                            </a>
                        </div>
                        <div class="header-titlePrimary">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <span class="s-time">
                                <!--<span class="pull-left" style="margin-top: 2px;"><?= $this->Html->cvtWaktuInter($news['News']['publish_date']) ?></span>-->
                                <span class="pull-left header-primaryTime" style="margin-top: 2px;"><?= $this->Html->cvtWaktuInter($news['News']['news_date']) ?></span>
                            </span>
                                </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php
                                    if($news['News']['news_type_id'] == 1) {
                                ?>
                                <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    } else if($news['News']['news_type_id'] == 2){
                                ?>
                                <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    } else {
                                ?>
                                <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    }
                                ?>
                                    <?= $news['News']['title_ind'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                           } else {
                    ?>
                    <div class="s-news-node">
                        <div class="img-container">
                            <?php
                                if($news['News']['news_type_id'] == 1) {
                            ?>
                            <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                } else if($news['News']['news_type_id'] == 2) {
                            ?>
                            <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title") ?>">    
                            <?php
                                } else {
                            ?>
                            <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                            <?php
                                }
                            ?>
                                <img src="<?= str_replace('\\', '/', Router::url("{$news['News']['thumbnail_path']}", true)) ?>" alt="">
                            </a>
                        </div>
                        <div class="header-titleSecondary">
                                <?php
                                    if($news['News']['news_type_id'] == 1) {
                                ?>
                                <a href="<?= Router::url("/berita/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    } else if($news['News']['news_type_id'] == 2){
                                ?>
                                <a href="<?= Router::url("/foto/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    } else {
                                ?>
                                <a href="<?= Router::url("/video/{$news['News']['id']}/$news_title") ?>">
                                <?php
                                    }
                                ?>
                                    <?= $news['News']['title_ind'] ?>
                                </a>
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
</header>

<script>
    $(document).ready(function () {
        
        $(".f-mega-menu").mouseleave(function(){
            $(this).hide();
        });
        
        $('#parentDisplayMenu').mouseleave(function() {
            $(this).find('.f-mega-menu').hide();
        });
            
    });
</script>
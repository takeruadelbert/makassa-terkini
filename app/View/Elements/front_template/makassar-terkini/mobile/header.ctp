<div id="nav" class="container navbar-static">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 header-color">
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div id="nav">
                    <div class="navbar navbar-default navbar-static navbar-edit">
                        <div class="navbar-header page-scroll col-md-12 col-sm-12 col-xs-12">
                            <button type="button" class="navbar-toggle offcanvas-toggle navbar-toggle-edit pull-right" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas" style="float:left;">
                                <span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </span>
                            </button>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 text-toggleMenu font-openSansBold">
                            MENU
                        </div>

                        <div id="js-bootstrap-offcanvas" class="navbar-offcanvas navbar-offcanvas-touch">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-sideMenuHeight">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-sideMenuHeader">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 header-boxSearch">
                                            <form type="GET" action="<?= Router::url("/m/search") ?>"  class="input-group">
                                                <input type="text" class="form-control field-search font-openSans" placeholder="Cari berita di sini..." name="term">
                                                <div class="input-group-btn">
                                                    <a href="<?= Router::url("/m/search", true) ?>" class="btn btn-default btn-search flex" role="button"><i class="glyphicon glyphicon-search"></i></a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-10 col-sm-10 col-xs-10">
                                                <?php
                                                if($page == "profile") {
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-2 col-sm-2 col-xs-2 boxOut-pictureLogin">
                                                            <?php
                                                            if(empty($this->Session->read("credential.member.SocialProfile.0.picture"))) {
                                                                if(!empty($this->Session->read("credential.member.User.profile_picture")) || $this->Session->read("credential.member.User.profile_picture") != null) {
                                                            ?>
                                                            <img src="<?= str_replace('\\', '/', Router::url($this->Session->read("credential.member.User.profile_picture"), true))?>" />
                                                            <?php
                                                                } else {
                                                            ?>
                                                            <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-pictureUser.png", true)?>" />
                                                            <?php
                                                                }
                                                            } else {
                                                            ?>
                                                            <img src="<?= str_replace('\\', '/', Router::url($this->Session->read("credential.member.SocialProfile.0.picture"), true))?>" />
                                                            <?php
                                                            }
                                                            ?>                                                            
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10 boxOut-sideTextName font-openSansBold">
                                                            <ul class="nav navbar-nav">
                                                                <li class="dropdown">
                                                                    <a class="dropdown-toggle font-openSansBold" href="#">
                                                                        <?php
                                                                        if($this->Session->check("credential.member.Biodata")) {
                                                                            echo $this->Session->read("credential.member.Biodata.full_name");
                                                                        } else {
                                                                            echo $this->Session->read("credential.member.SocialProfile.0.display_name");
                                                                        }
                                                                        ?>                                                                        
                                                                        <span class="caret"></span>
                                                                    </a>
                                                                    <ul class="dropdown-menu font-openSans">
                                                                        <li><a href="<?= Router::url("/m/profile", true) ?>">Profile</a></li>
                                                                        <li><a href="<?= Router::url("/m/profile", true) ?>">Setting</a></li>
                                                                        <li><a href="<?= Router::url("/m/logout", true) ?>">Logout</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                } else {
                                                    if($this->Session->check("credential.member")) {
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-2 col-sm-2 col-xs-2 boxOut-pictureLogin">
                                                            <?php
                                                            if(empty($this->Session->read("credential.member.SocialProfile.0.picture"))) {
                                                                if(!empty($this->Session->read("credential.member.User.profile_picture")) || $this->Session->read("credential.member.User.profile_picture") != null) {
                                                            ?>
                                                            <img src="<?= str_replace('\\', '/', Router::url($this->Session->read("credential.member.User.profile_picture"), true))?>" />
                                                            <?php
                                                                } else {
                                                            ?>
                                                            <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-pictureUser.png", true)?>" />
                                                            <?php
                                                                }
                                                            } else {
                                                            ?>
                                                            <img src="<?= str_replace('\\', '/', Router::url($this->Session->read("credential.member.SocialProfile.0.picture"), true))?>" />
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10 boxOut-sideTextName font-openSansBold">
                                                            <ul class="nav navbar-nav">
                                                                <li class="dropdown">
                                                                    <a class="dropdown-toggle font-openSansBold" href="#">
                                                                        <?php
                                                                        if($this->Session->check("credential.member.Biodata")) {
                                                                            echo $this->Session->read("credential.member.Biodata.full_name");
                                                                        } else {
                                                                            echo $this->Session->read("credential.member.SocialProfile.0.display_name");
                                                                        }
                                                                        ?>  
                                                                        <span class="caret"></span>
                                                                    </a>
                                                                    <ul class="dropdown-menu font-openSans">
                                                                        <li><a href="<?= Router::url("/m/profile", true) ?>">Profile</a></li>
                                                                        <li><a href="<?= Router::url("/m/profile", true) ?>">Setting</a></li>
                                                                        <li><a href="<?= Router::url("/m/logout", true) ?>">Logout</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                    } else {
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-2 col-sm-2 col-xs-2 boxOut-pictureLogin">
                                                            <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-pictureLogin.png", true)?>" />
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10 boxOut-sideTextLogin font-openSansBold">
                                                            <a href="<?= Router::url("/m/login", true) ?>">
                                                                LOGIN
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                    }
                                                }
                                                ?>                                              
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-2 boxOut-sideMenuClose">
                                                <button type="button" class="navbar-toggle offcanvas-toggle navbar-toggle-edit" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
                                                    <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-close.png", true)?>" />
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 sideMenu-headerShadow">
                                    <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/header-shadow.png", true)?>" />
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-sideMenuContent">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-sideMenuContent">
                                        <ul class="nav navbar-nav edit-navbarSideMenu">
                                            <li class="dropdown edit-sideMenuDropContent">
                                                <div class="col-md-10 col-sm-10 col-xs-10 boxOut-menuPrimary " >
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-menuPrimary flex">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <a href="<?= Router::url("/m", true) ?>">
                                                                <div class="col-md-2 col-sm-2 col-xs-2 box-menuLogo center">
                                                                    <img class="sideMenu-1" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-1.png", true)?>" />
                                                                </div>
                                                                <div class="col-md-2 col-sm-2 col-xs-2 box-menuLogoRed center">
                                                                    <img class="sideMenu-1" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-1-red.png", true)?>" />
                                                                </div>
                                                                <div class="col-md-10 col-sm-10 col-xs-10 boxOut-menuText font-openSansBold">
                                                                    HOME
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-2 boxOut-buttonPlus"> <!-- Hilangkan class="dropdown-toggle" data-toggle="dropdown" role="button" -->
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-buttonPlus flex">
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="dropdown edit-sideMenuDropContent">                                                
                                                <div class="col-md-10 col-sm-10 col-xs-10 boxOut-menuPrimary " >
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-menuPrimary flex">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <a href="#">
                                                                <div class="col-md-2 col-sm-2 col-xs-2 box-menuLogo center">
                                                                    <img class="sideMenu-2" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-2.png", true)?>" />
                                                                </div>
                                                                <div class="col-md-2 col-sm-2 col-xs-2 box-menuLogoRed center">
                                                                    <img class="sideMenu-2" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-2-red.png", true)?>" />
                                                                </div>
                                                                <div class="col-md-10 col-sm-10 col-xs-10 boxOut-menuText font-openSansBold">
                                                                    NEWS
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-arrowPrimary">
                                                        <img class="sideMenu-arrowRed" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-arrowRed.png", true)?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-2 boxOut-buttonPlus dropdown-toggle" data-toggle="dropdown" role="button">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-buttonPlus flex">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-menuLogo center">
                                                            <img class="icon-plus" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-plus.png", true)?>" />
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-menuLogoRed center">
                                                            <img class="icon-minus" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-minus.png", true)?>" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <ul class="dropdown-menu edit-sideMenuDrop font-openSans">
                                                    <?php
                                                    $news_category = ClassRegistry::init("NewsCategory")->find("all",[
                                                        "conditions" => [
                                                            "OR" => [
                                                                "NewsCategory.uniq" => "news",
                                                                "NewsCategory.parent_id" => 1,
                                                            ],
                                                        ],
                                                    ]);
                                                    foreach($news_category as $news) {
                                                    ?>
                                                    <li>
                                                        <a href="<?= Router::url("/m/kategori/{$news['NewsCategory']['uniq']}") ?>">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-secondaryTitle">
                                                                <?= $news['NewsCategory']['name'] ?>
                                                            </div>
                                                        </a> 
                                                    </li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </li>

                                            <li class="dropdown edit-sideMenuDropContent">
                                                <div class="col-md-10 col-sm-10 col-xs-10 boxOut-menuPrimary " >
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-menuPrimary flex">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <a href="#">
                                                                <div class="col-md-2 col-sm-2 col-xs-2 box-menuLogo center">
                                                                    <img class="sideMenu-3" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-3.png", true)?>" />
                                                                </div>
                                                                <div class="col-md-2 col-sm-2 col-xs-2 box-menuLogoRed center">
                                                                    <img class="sideMenu-3" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-3-red.png", true)?>" />
                                                                </div>
                                                                <div class="col-md-10 col-sm-10 col-xs-10 boxOut-menuText font-openSansBold">
                                                                    BISNIS
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-arrowPrimary">
                                                        <img class="sideMenu-arrowRed" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-arrowRed.png", true)?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-2 boxOut-buttonPlus dropdown-toggle" data-toggle="dropdown" role="button">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-buttonPlus flex">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-menuLogo center">
                                                            <img class="icon-plus" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-plus.png", true)?>" />
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-menuLogoRed center">
                                                            <img class="icon-minus" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-minus.png", true)?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="dropdown-menu edit-sideMenuDrop font-openSans">
                                                    <?php
                                                    $bisnis_category = ClassRegistry::init("NewsCategory")->find("all",[
                                                        "conditions" => [
                                                            "OR" => [
                                                                "NewsCategory.uniq" => "bisnis",
                                                                "NewsCategory.parent_id" => 2,
                                                            ],
                                                        ],
                                                    ]);
                                                    foreach($bisnis_category as $bisnis) {
                                                    ?>
                                                    <li>
                                                        <a href="<?= Router::url("/m/kategori/{$bisnis['NewsCategory']['uniq']}") ?>">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-secondaryTitle">
                                                                <?= $bisnis['NewsCategory']['name'] ?>
                                                            </div>
                                                        </a> 
                                                    </li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </li>

                                            <li class="dropdown edit-sideMenuDropContent">
                                                <div class="col-md-10 col-sm-10 col-xs-10 boxOut-menuPrimary " >
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-menuPrimary flex">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <a href="#">
                                                                <div class="col-md-2 col-sm-2 col-xs-2 box-menuLogo center">
                                                                    <img class="sideMenu-4" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-4.png", true)?>" />
                                                                </div>
                                                                <div class="col-md-2 col-sm-2 col-xs-2 box-menuLogoRed center">
                                                                    <img class="sideMenu-4" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-4-red.png", true)?>" />
                                                                </div>
                                                                <div class="col-md-10 col-sm-10 col-xs-10 boxOut-menuText font-openSansBold">
                                                                    TEKNO
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-arrowPrimary">
                                                        <img class="sideMenu-arrowRed" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-arrowRed.png", true)?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-2 boxOut-buttonPlus dropdown-toggle" data-toggle="dropdown" role="button">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-buttonPlus flex">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-menuLogo center">
                                                            <img class="icon-plus" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-plus.png", true)?>" />
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-menuLogoRed center">
                                                            <img class="icon-minus" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-minus.png", true)?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="dropdown-menu edit-sideMenuDrop font-openSans">
                                                    <?php
                                                    $tekno_category = ClassRegistry::init("NewsCategory")->find("all",[
                                                        "conditions" => [
                                                            "OR" => [
                                                                "NewsCategory.uniq" => "tekno",
                                                                "NewsCategory.parent_id" => 3,
                                                            ],
                                                        ],
                                                    ]);
                                                    foreach($tekno_category as $tekno) {
                                                    ?>
                                                    <li>
                                                        <a href="<?= Router::url("/m/kategori/{$tekno['NewsCategory']['uniq']}") ?>">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-secondaryTitle">
                                                                <?= $tekno['NewsCategory']['name'] ?>
                                                            </div>
                                                        </a> 
                                                    </li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </li>

                                            <li class="dropdown edit-sideMenuDropContent">
                                                <div class="col-md-10 col-sm-10 col-xs-10 boxOut-menuPrimary " >
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-menuPrimary flex">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <a href="#">
                                                                <div class="col-md-2 col-sm-2 col-xs-2 box-menuLogo center">
                                                                    <img class="sideMenu-5" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-5.png", true)?>" />
                                                                </div>
                                                                <div class="col-md-2 col-sm-2 col-xs-2 box-menuLogoRed center">
                                                                    <img class="sideMenu-5" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-5-red.png", true)?>" />
                                                                </div>
                                                                <div class="col-md-10 col-sm-10 col-xs-10 boxOut-menuText font-openSansBold">
                                                                    LIFE STYLE
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-arrowPrimary">
                                                        <img class="sideMenu-arrowRed" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-arrowRed.png", true)?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-2 boxOut-buttonPlus dropdown-toggle" data-toggle="dropdown" role="button">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-buttonPlus flex">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-menuLogo center">
                                                            <img class="icon-plus" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-plus.png", true)?>" />
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-menuLogoRed center">
                                                            <img class="icon-minus" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-minus.png", true)?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="dropdown-menu edit-sideMenuDrop font-openSans">
                                                    <?php
                                                    $lifestyle_category = ClassRegistry::init("NewsCategory")->find("all",[
                                                        "conditions" => [
                                                            "OR" => [
                                                                "NewsCategory.uniq" => "lifestyle",
                                                                "NewsCategory.parent_id" => 4,
                                                            ],
                                                        ],
                                                    ]);
                                                    foreach($lifestyle_category as $lifestyle) {
                                                    ?>
                                                    <li>
                                                        <a href="<?= Router::url("/m/kategori/{$lifestyle['NewsCategory']['uniq']}") ?>">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-secondaryTitle">
                                                                <?= $lifestyle['NewsCategory']['name'] ?>
                                                            </div>
                                                        </a> 
                                                    </li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </li>

                                            <li class="dropdown edit-sideMenuDropContent">
                                                <div class="col-md-10 col-sm-10 col-xs-10 boxOut-menuPrimary " >
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-menuPrimary flex">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <a href="#">
                                                                <div class="col-md-2 col-sm-2 col-xs-2 box-menuLogo center">
                                                                    <img class="sideMenu-6" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-6.png", true)?>" />
                                                                </div>
                                                                <div class="col-md-2 col-sm-2 col-xs-2 box-menuLogoRed center">
                                                                    <img class="sideMenu-6" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-6-red.png", true)?>" />
                                                                </div>
                                                                <div class="col-md-10 col-sm-10 col-xs-10 boxOut-menuText font-openSansBold">
                                                                    SPORT
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-arrowPrimary">
                                                        <img class="sideMenu-arrowRed" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-arrowRed.png", true)?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-2 boxOut-buttonPlus dropdown-toggle" data-toggle="dropdown" role="button">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-buttonPlus flex">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-menuLogo center">
                                                            <img class="icon-plus" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-plus.png", true)?>" />
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-menuLogoRed center">
                                                            <img class="icon-minus" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-minus.png", true)?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="dropdown-menu edit-sideMenuDrop font-openSans">
                                                    <?php
                                                    $sport_category = ClassRegistry::init("NewsCategory")->find("all",[
                                                        "conditions" => [
                                                            "OR" => [
                                                                "NewsCategory.uniq" => "sport",
                                                                "NewsCategory.parent_id" => 5,
                                                            ],
                                                        ],
                                                    ]);
                                                    foreach($sport_category as $sport) {
                                                    ?>
                                                    <li>
                                                        <a href="<?= Router::url("/m/kategori/{$sport['NewsCategory']['uniq']}") ?>">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-secondaryTitle">
                                                                <?= $sport['NewsCategory']['name'] ?>
                                                            </div>
                                                        </a> 
                                                    </li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </li>

                                            <li class="dropdown edit-sideMenuDropContent">
                                                <div class="col-md-10 col-sm-10 col-xs-10 boxOut-menuPrimary " >
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-menuPrimary flex">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <a href="<?= Router::url("/m/citizen-report", true) ?>">
                                                                <div class="col-md-2 col-sm-2 col-xs-2 box-menuLogo center">
                                                                    <img class="sideMenu-7" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-7.png", true)?>" />
                                                                </div>
                                                                <div class="col-md-2 col-sm-2 col-xs-2 box-menuLogoRed center">
                                                                    <img class="sideMenu-7" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-7-red.png", true)?>" />
                                                                </div>
                                                                <div class="col-md-10 col-sm-10 col-xs-10 boxOut-menuText font-openSansBold">
                                                                    CITIZEN REPORT
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-arrowPrimary">
                                                        <img class="sideMenu-arrowRed" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-arrowRed.png", true)?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-2 boxOut-buttonPlus"> <!-- Hilangkan class="dropdown-toggle" data-toggle="dropdown" role="button" -->
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-buttonPlus flex">
                                                    </div>
                                                </div>                                              
                                            </li>

                                            <li class="dropdown edit-sideMenuDropContent">
                                                <div class="col-md-10 col-sm-10 col-xs-10 boxOut-menuPrimary " >
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-menuPrimary flex">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <a href="<?= Router::url("/m/event", true) ?>">
                                                                <div class="col-md-2 col-sm-2 col-xs-2 box-menuLogo center">
                                                                    <img class="sideMenu-8" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-8.png", true)?>" />
                                                                </div>
                                                                <div class="col-md-2 col-sm-2 col-xs-2 box-menuLogoRed center">
                                                                    <img class="sideMenu-8" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-8-red.png", true)?>" />
                                                                </div>
                                                                <div class="col-md-10 col-sm-10 col-xs-10 boxOut-menuText font-openSansBold">
                                                                    EVENT
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-arrowPrimary">
                                                        <img class="sideMenu-arrowRed" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-arrowRed.png", true)?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-2 boxOut-buttonPlus"> <!-- Hilangkan class="dropdown-toggle" data-toggle="dropdown" role="button" -->
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-buttonPlus flex">
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="dropdown edit-sideMenuDropContent">
                                                <div class="col-md-10 col-sm-10 col-xs-10 boxOut-menuPrimary " >
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-menuPrimary flex">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <a href="#">
                                                                <div class="col-md-2 col-sm-2 col-xs-2 box-menuLogo center">
                                                                    <img class="sideMenu-9" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-9.png", true)?>" />
                                                                </div>
                                                                <div class="col-md-2 col-sm-2 col-xs-2 box-menuLogoRed center">
                                                                    <img class="sideMenu-9" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-9-red.png", true)?>" />
                                                                </div>
                                                                <div class="col-md-10 col-sm-10 col-xs-10 boxOut-menuText font-openSansBold">
                                                                    MORE
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-arrowPrimary">
                                                        <img class="sideMenu-arrowRed" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-arrowRed.png", true)?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-2 boxOut-buttonPlus dropdown-toggle" data-toggle="dropdown" role="button">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-buttonPlus flex">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-menuLogo center">
                                                            <img class="icon-plus" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-plus.png", true)?>" />
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-menuLogoRed center">
                                                            <img class="icon-minus" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-minus.png", true)?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="dropdown-menu edit-sideMenuDrop font-openSans">
                                                    <li>
                                                        <a href="<?= Router::url("/m/galeri-foto", true) ?>">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-secondaryTitle">
                                                                Galeri Foto
                                                            </div>
                                                        </a> 
                                                        <a href="<?= Router::url("/m/galeri-video", true) ?>">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-secondaryTitle">
                                                                Galeri Video
                                                            </div>
                                                        </a>
                                                    </li>                                                    
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 sideMenu-footer">
                                        <div class="col-md-4 col-sm-4 col-xs-4 font-openSansBold text-right">
                                            Follow us 
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <?php
                                            $social_medias = ClassRegistry::init("SocialMedia")->find("all", [
                                                "conditions" => [
                                                    "SocialMedia.showing_status_id" => 1,
                                                ]
                                            ]);
                                            foreach ($social_medias as $socials) {
                                            ?>
                                            <div class="persen20 center">
                                                <a href="<?= $socials['SocialMedia']['url'] ?>">
                                                    <?php
                                                    if($socials['SocialMedia']['uniq'] != 'path') {
                                                    ?>
                                                    <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/sideMenu-{$socials['SocialMedia']['uniq']}.png", true)?>" />
                                                    <?php
                                                    } else {
                                                    ?>
                                                    <img src="<?= Router::url("/img/icons/path-black.png", true) ?>" width="70" height="70">
                                                    <?php
                                                    }
                                                    ?>
                                                </a>
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
            <div class="col-md-10 col-sm-10 col-xs-10 boxOut-logo">
                <a href="<?= Router::url("/m", true) ?>">
                    <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/logo.png", true)?>" width="auto" height="100" style="display: block; margin-left: 28%;">
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 header-shadow">
            <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/header-shadow.png", true)?>">
        </div>
    </div>
</div>
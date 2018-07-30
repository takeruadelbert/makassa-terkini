<!--Footer-->
<!--==================================================-->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row footerTop-backgroundColor">
            <div class="container">
                <?php
                $dividedCategory = [];
                foreach ($allCategories as $k => $category) {
                    $n = $k % 4;
                    $dividedCategory[$n][] = $category;
                }
                ?>
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-footerTop font-sourceSansProSemibold">
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <?php
                        foreach ($dividedCategory as $room) {
                        ?>
                        <div class="col-md-3 col-sm-3 col-xs-3 footer-jarakText">                            
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php
                                foreach ($room as $category) {
                                ?>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 footer-text">
                                        <a href="<?= Router::url("/kategori/{$category["NewsCategory"]["uniq"]}", true) ?>"><?=$category["NewsCategory"]["name"]?></a>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>                            
                        </div>                        
                        <?php
                        }
                        ?>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 footer-social">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-socialMedia">
                                        <div class="col-md-3 col-sm-3 col-xs-3 social-fb center">
                                            <?php
                                            $facebook = ClassRegistry::init("SocialMedia")->find('first',[
                                                "conditions" => [
                                                    "SocialMedia.uniq" => "facebook",
                                                ]
                                            ]);
                                            ?>
                                            <a href="<?= $facebook['SocialMedia']['url'] ?>">
                                                <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/newsletter-fb.png", true)?>">
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-3 social-twitter center">
                                            <?php
                                            $twitter = ClassRegistry::init("SocialMedia")->find('first',[
                                                "conditions" => [
                                                    "SocialMedia.uniq" => "twitter",
                                                ]
                                            ]);
                                            ?>
                                            <a href="<?= $twitter['SocialMedia']['url'] ?>">
                                                <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/newsletter-twitter.png", true)?>">
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-3 social-google center">
                                            <?php
                                            $gplus = ClassRegistry::init("SocialMedia")->find('first',[
                                                "conditions" => [
                                                    "SocialMedia.uniq" => "google-plus",
                                                ]
                                            ]);
                                            ?>
                                            <a href="<?= $gplus['SocialMedia']['url'] ?>">
                                                <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/newsletter-google.png", true)?>">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-buttonBerhenti center">
                                        <a href="<?= Router::url("/newsletters/stop_subscribe/$userId", true) ?>">
                                            <button class="btn btn-default button-berhenti font-sourceSansPro">
                                                Berhenti berlangganan
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footerBottom-backgroundColor">
            <div class="container">
                <div class="col-md-12 col-sm-12 col-xs-12 footer-copyright font-sourceSansProSemibold">
                    <div class="footer-left-section">
                        © 2016 - MAKASSAR TERKINI. All Right Reserved
                        </br>
                        Developed & Maintenance By : PT. iLugroup Multimedia Indonesia
                    </div>

                    <div class="footer-right-section">
                        <ul>
                            <li><a href="<?= Router::url("/kontak", true) ?>">Contact</a></li>
                            <li><a href="#">Redaksi</a></li>
                            <li><a href="#">Career</a></li>
                            <li><a href="#">Sitemap</a></li>
                            <li><a href="<?= Router::url("/disklaimer", true) ?>">Disclaimer</a></li>
                            <li><a href="<?= Router::url("/m", true) ?>">Mobile Version</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
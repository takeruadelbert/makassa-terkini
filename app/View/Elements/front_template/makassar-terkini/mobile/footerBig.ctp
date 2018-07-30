<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-footerSubscribe">
            <div class="persen15 boxOut-footerSubscribeIcon">
                <img class="footer-SubscribeIcon" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-subscribe.png", true)?>" />
            </div>
            <div class="persen85">
                <div class="col-md-5 col-sm-5 col-xs-5">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 font-titleSubscribe font-sourceSansProSemibold">
                            Subscribe !!!
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 font-textSubscribe font-sourceSansPro">
                            Jangan sampai ketinggalan berita terkini,
                            <br>
                            langganan newsletter kami sekarang!
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-7">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-subscribeField">
                            <?php
                            echo $this->Form->create('Newsletter', array('action' => 'subscribe', 'type' => 'post'));
                            ?>
                            <div class="input-group">
                                <input type="email" class="form-control field-footerSubscribe font-sourceSansPro" placeholder="Masukkan email Anda!" name="data[Newsletter][email]" required>
                                <div class="input-group-btn">
                                    <button type="submit" class="btn button-subscribe-footer font-sourceSansProSemibold">Kirim</button>
                                </div>
                            </div>
                            <?php
                            echo $this->Form->end();
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-footerExample font-sourceSansPro">
                            example@mail.com
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-footerSocial">
            <div class="col-md-4 col-sm-4 col-xs-4 boxOut-footerSocialText font-sourceSansProSemibold">
                Tetap Terhubung Dengan Kami 
            </div>
            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-footerSocialImg">
                <?php
                $socialMedia = ClassRegistry::init("SocialMedia")->find("all");
                $uniq = "";
                $i = 0;
                foreach($socialMedia as $media) {
                    if($media['SocialMedia']['uniq'] == "google-plus") {
                        $uniq = "google";
                    } else if($media['SocialMedia']['uniq'] == "path") {
                        $uniq = "pinterest";
                    } else {
                        $uniq = $media['SocialMedia']['uniq'];
                    }
                    $i++;
                ?>
                <div class="persen20 inherit center">
                    <a href="<?= $media['SocialMedia']['url'] ?>">
                        <img class="footer-<?= $uniq ?>" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/social-$i.png", true)?>" />
                    </a>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 footerBig-contentBackground">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-footerLogo center">
                    <a href="<?= Router::url("/m", true) ?>">
                        <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/logo.png", true)?>" style="width: auto;"/>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-footerAbout">
                    <div class="col-md-4 col-sm-4 col-xs-4 font-sourceSansPro">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-aboutField">
                            <a href="<?= Router::url("/m/kontak", true) ?>">
                                Tentang Kami
                            </a>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-aboutField">
                            <a href="<?= Router::url("/m/kontak", true) ?>">
                                Hubungi Kami
                            </a>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-aboutField">
                            <a href="<?= Router::url("/m/kontak", true) ?>">
                                Peluang Karir
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 font-sourceSansPro">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-aboutField">
                            <a href="<?= Router::url("/m/kontak", true) ?>">
                                Redaksi
                            </a>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-aboutField">
                            <a href="<?= Router::url("/m/kontak", true) ?>">
                                Disclaimer
                            </a>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-aboutField">
                            <a href="<?= Router::url("/m/kontak", true) ?>">
                                Privacy Policy
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 font-sourceSansPro">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-aboutField">
                            <a href="<?= Router::url("/m/kontak", true) ?>">
                                Pedoman Media Siber
                            </a>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-aboutField">
                            <a href="#">
                                Iklan
                            </a>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-aboutField">
                            <a href="<?= Router::url("/m/event", true) ?>">
                                Event Terkini
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-buttonDesktop-footer">
                    <div class="box-buttonDesktop-footer center-block">
                        <button type="button" class="btn button-desktop-footer font-openSans-bold"><a href="<?= Router::url("/", true) ?>">DESKTOP VERSION</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 footerLittle-background font-sourceSansProSemibold center">
            © 2016 - <a href="<?= Router::url("/", true) ?>" style="color: white;">MAKASSAR TERKINI</a> - All Right Reserved
            <br>
            Developed & Maintenance By: <a href="<?= _DEVELOPER_WEBSITE ?>" style="color: white;"><?= _DEVELOPER_NAME ?></a>
        </div>
    </div>
</div>
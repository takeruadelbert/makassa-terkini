<style type="text/css">

    /* editCss */
    .boxOut-footer-true{
        bottom:-220px;
    }

    .boxOut-footer-false{
        bottom:-130px;
    }

</style>

<span class="clearfix"></span>
<footer style="position: relative; /*margin-top: 220px;*/" class="font-arial boxOut-footer boxOut-footer-login footer-false">
    <a id="to_top" href="#" style="position: absolute; right: 10px; top: -60px;">
        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/anchor.png", true) ?>" width="40">
    </a>
    <?php
    $dividedCategory = [];
    foreach ($allCategories as $k => $category) {
        $n = $k % 4;
        $dividedCategory[$n][] = $category;
    }
    ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 backgroundFooter">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="container">
                    <div class="col-md-12 col-sm-12 col-xs-12 font-openSans">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <?php
                            foreach ($dividedCategory as $k => $room) {
                                if ($k != 2) {
                                    ?>
                                    <div class="col-md-3 col-sm-6 col-xs-12 footer-jarakText">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 footer-text">
                                                    <a href="<?= Router::url("/kategori/{$room[0]["NewsCategory"]["uniq"]}", true) ?>"><?= $room[0]["NewsCategory"]["name"] ?></a>
                                                </div>
                                            </div>
                                            <?php
                                            $i = 0;
                                            foreach ($room[0]['Child'] as $sub) {
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 footer-text">
                                                        <a href="<?= Router::url("/kategori/{$sub["uniq"]}", true) ?>"><?= $sub["name"] ?></a>
                                                    </div>  
                                                </div>                                                
                                                <?php
                                                $i++;                                                
                                            }
                                            if($i < 5) {
                                            ?>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 footer-text">
                                                    <a href="<?= Router::url("/kategori/pendidikan", true) ?>">Pendidikan</a>
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
                                <?php
                            }
                            ?>
                            <div class="col-md-3 col-sm-6 col-xs-12 footer-jarakText">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 footer-text">
                                            <a href="#">More</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 footer-text">
                                            <a href="<?= Router::url("/kategori/tekno", true) ?>">Tekno</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 footer-text">
                                            <a href="<?= Router::url("/kategori/sport", true) ?>">Sport</a>
                                        </div>
                                    </div><div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 footer-text">
                                            <a href="<?= Router::url("/galeri-video", true) ?>">Video</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 footer-text">
                                            <a href="<?= Router::url("/galeri-foto", true) ?>">Foto</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 footer-text">
                                            <a href="<?= Router::url("/kategori/psmmakassar", true) ?>">PSM Makassar</a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="row">
                                <div class="col-md-12 footer-terhubung">
                                    <div class="row">
                                        <div class="col-md-12 footer-logo">
                                            <a href="<?= Router::url("/", true) ?>"><img src="<?= Router::url("/front_file/makassar-terkini/img/icon/logo.png", true) ?>" width="250" height="100"></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 footer-titleBerita font-arial">
                                            Dapatkan Berita Terbaru kami secara <font style="font-weight: bold; font-style: italic;">Gratis!</font>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 footer-button">
                                            <?php
                                            echo $this->Form->create('Newsletter', array('action' => 'subscribe', 'type' => 'post'));
                                            ?>
                                            <div class="input-group">
                                                <input type="email" name="data[Newsletter][email]" class="form-control field-newsletterEmail font-openSans" placeholder="masukan email anda ..." style="color: black;" required>
                                                <div class="input-group-btn">
                                                    <button class="btn btn-default btn-subscribedEmail font-sourceSansProSemibold" type="submit">KIRIM</button>
                                                </div>
                                            </div>
                                            <?php
                                            echo $this->Form->end();
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 footer-subBerita">
                                            example@mail.com
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
    <div class="row redHeader">
        <div class="container">
            <div class="col-md-12 col-sm-12 footer-copyright font-sourceSansPro">
                <div class="footer-left-section">
                    Copyright © 2016 – <a href="<?= Router::url("/", true) ?>" style="color: white;">Makassar Terkini</a>
                    </br>
                    <font color="white">Developed & Maintenance By : </font> <a href="<?= _DEVELOPER_WEBSITE ?>" style="color: white;"><?= _DEVELOPER_NAME ?></a>
                </div>

                <div class="footer-right-section">
                    <ul style="margin-bottom:0px;">
                        <li><a class="font-sourceSansProSemibold" href="<?= Router::url("/tentang_kami", true) ?>">Contact</a></li>
                        <li><a class="font-sourceSansProSemibold" href="<?= Router::url("/pedoman", true) ?>">Pedoman</a></li>
                        <li><a class="font-sourceSansProSemibold" href="#">Redaksi</a></li>
                        <li><a class="font-sourceSansProSemibold" href="#">Career</a></li>
                        <li><a class="font-sourceSansProSemibold" href="#">Sitemap</a></li>
                        <li><a class="font-sourceSansProSemibold" href="<?= Router::url("/disklaimer", true) ?>">Disclaimer</a></li>
                        <li><a class="font-sourceSansProSemibold" href="<?= Router::url("/m/", true) ?>">Mobile Version</a></li>
                    </ul>
                    <ul style="margin-bottom: 0px;">
                        <li>Best View in Google Chrome</li>                        
                    </ul>
                    <ul>
                        <li>Cloud Hosting by DewaWeb</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php
if (!empty(ClassRegistry::init("Advert")->find('first', array("conditions" => array("Advert.advert_position_id" => 1, "Advert.advert_type_id" => 5))))) {
    $adv_header_atas = ClassRegistry::init("Advert")->find('first', [
        "conditions" => [
            "Advert.advert_type_id" => 5,
            "Advert.advert_position_id" => 1,
        ],
    ]);
    $now = new DateTime();
    if ($adv_header_atas['Advert']['advert_status_id'] == 2 || $now > new DateTime($adv_header_atas['Advert']['expired_date'])) {
        
    } else {
        ?>
        <div class="modal fade" tabindex="-1" role="dialog" id="iklan_modal" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body adv" style="background: #ed1b23; width: 600px; height: 400px; padding: 0px;">
                        <div class="adv-closer" data-dismiss="modal">
                            <span>close/tutup</span>
                            <span class="the-x">X</span>
                        </div>
                        <p style="color: #fff;">
                            <a target="_blank" class="advHeader advCountable" data-counted="false" data-id="<?= $adv_header_atas['Advert']['id'] ?>" href="<?= $adv_header_atas['Advert']['url'] ?>"> 
                                <img src="<?= str_replace('\\', '/', Router::url("{$adv_header_atas['Advert']['path']}", true)) ?>">
                            </a>
                        </p>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <?php
    }
}
?>
<script type="text/javascript">
    /* header matter */
    var headerHeight = $('.s-header').height() + 10;

    // $(document).ready(function(){
    $('.s-main-content').css('top', headerHeight);
    // });



    function dinamika_iklan() {
//        console.log('dinamika_iklan');
        if ($('.f-extra-area').height() < $('.f-content-area').height()) {
            $(window).scroll(function () {

                var scroll_detector = $(window).scrollTop() + $(window).height();


                if ($('html').find('.s-big-carousel').length != 0) {
                    var batas_iklan = $('.f-extra-area').height() + 829;
                } else {

                    var batas_iklan = $('.f-extra-area').height() + 220;
                }

                if (scroll_detector > batas_iklan) {
                    $('.f-extra-area').addClass('main-freeze');
                } else {
                    $('.f-extra-area').removeClass('main-freeze');
                }

//                console.log($(window).scrollTop() + $(window).height() + "___" + $('.f-extra-area').height());
                var pentokan = $(document).height() - $('footer').height();

                if (scroll_detector > pentokan) {
//                    console.log('sadsdadsa');
                    $('.f-extra-area').addClass('main-stick');
                } else {
                    $('.f-extra-area').removeClass('main-stick');
                }
            });
        }
        ;
    }
    ;

    $(document).on('ready', function () {

        /* left and right advertisement */
        $('.adv-top-left, .adv-top-right').css('top', $('.s-header').height() + 10);

        $(document).on('mouseover', '.f-header-nav a:not(.ignore)', function () {
//            console.log($(this).data('id'));

            $('.f-mega-menu').fadeOut();
            $('.f-mega-menu#' + $(this).data('id')).fadeIn();
        });

        $(document).on('mouseover', '.f-header-nav a.ignore', function () {
            $('.f-mega-menu').fadeOut();
        });

        $(document).on('mouseleave', '.f-mega-menu', function () {

            $('.f-mega-menu').fadeOut();
        });

        $(document).on('click', '.f-close-top-adv', function(){
            $('.adv-top').remove();

            topp = true;

            headerHeight = $('.s-header').height() + 10;

            $('.adv-top-left, .adv-top-right').css('top', $('.s-header').height()+10);


            $('.s-main-content').css('top', headerHeight);
            $('.boxOut-footer-login').addClass('footer-true');

        });


        $(document).on('click', '.f-close-top-adv', function () {
            $('.adv-top').remove();

            headerHeight = $('.s-header').height() + 10;

            $('.adv-top-left, .adv-top-right').css('top', $('.s-header').height() + 10);


            $('.s-main-content').css('margin-top', headerHeight);
            $('.boxOut-footer-login').addClass('footer-true');

        });

        $(document).on('click', '#search-head', function () {
            $('#search-cont').slideToggle();
        });

        var timer;
        function hide() {
            //Hide your menu bar
        }
        function show() {
            //Show your menu bar
        }

        $("#buttonID").hover(
                function () {
                    clearTimeout(timer);
                    show();
                }, function () {
            timer = setTimeout(function () {
                hide()
            }, 1000);
        }
        );




        function scrollTo(hash) {
            // location.hash = "#" + hash;
            location.hash = hash;
        }

        $('.f-flyright-nav a').on('click', function () {
            scrollTo($(this).attr('href'));
        });

        $('#to_top').on('click', function () {
            var body = $("html, body");
            body.stop().animate({scrollTop: 0}, '500', 'swing', function () {
            });
        });


    });



    function sharePositioning() {
        var marginright = ($(window).width() - 1100) / 2;
        var rightFixed = (marginright);
        $('.f-flyright-nav').css('right', rightFixed);
    }

    sharePositioning();

    $(document).ready(function () {

        $(window).resize(function () {
            sharePositioning();
        });


        $(window).scroll(function () {
            if ($(window).scrollTop() + $('.s-header').height() > $('.s-header').height() + $('.adv-1100-90').height()) {
                $('.f-flyright-nav').addClass('flyRightFixed');
                $('.f-flyright-nav').removeClass('flyRightAbsolute');
            } else {
                $('.f-flyright-nav').removeClass('flyRightFixed');
                $('.f-flyright-nav').addClass('flyRightAbsolute');
            }
        });

        $(window).scroll(function () {
            if ($(window).scrollTop() + $('.s-header').height() > $('.s-header').height() + $('.adv-1100-90').height()) {
                $('.f-flyLeft-nav').addClass('flyLeftFixed');
                $('.f-flyLeft-nav').removeClass('flyLeftAbsolute');
            } else {
                $('.f-flyLeft-nav').removeClass('flyLeftFixed');
                $('.f-flyLeft-nav').addClass('flyLeftAbsolute');
            }
        });

        dinamika_iklan();

        $(window).scroll(function () {
            if (topp == false) {
                if ($(window).scrollTop() + $('.s-header').height() > $('.s-header').height()) {
                    $('.boxOut-footer').addClass('boxOut-footer-true');
                    $('.boxOut-footer').removeClass('boxOut-footer-false');
                    
                } else {
                    $('.boxOut-footer').addClass('boxOut-footer-false');
                    $('.boxOut-footer').removeClass('boxOut-footer-true');
                }
            }
            else if (topp == true) {
                if ($(window).scrollTop() + $('.s-header').height() > $('.s-header').height()) {
                    $('.boxOut-footer').addClass('boxOut-footer-false');
                    $('.boxOut-footer').removeClass('boxOut-footer-true');
                } else {
                    $('.boxOut-footer').addClass('boxOut-footer-true');
                    $('.boxOut-footer').removeClass('boxOut-footer-false');
                }
            }
        });


    });
</script>

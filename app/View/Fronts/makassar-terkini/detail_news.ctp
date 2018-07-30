<?php
$now = new DateTime();
?>
<style type="text/css">

    .shareFixed {
        position: fixed; top: 220px; width: 80px;  border-top-left-radius: 5px;  border: 1px solid #ed1c24; padding-bottom: 10px;
        margin-left: -100px;
    }

    .shareFixedtrue {
        position: fixed; top: 130px; width: 80px;  border-top-left-radius: 5px;  border: 1px solid #ed1c24; padding-bottom: 10px;
        margin-left: -100px;
    }

    .shareAbsolute {
        position: absolute; top: 0; transform: translateY(0px); width: 80px;  border-top-left-radius: 5px; border: 1px solid #ed1c24; padding-bottom: 10px;
        margin-left: -100px;
    }

    .s-main-content{
        margin-top: 0px !important;
        top: 220px;
    }

    .adv-1100-90{
        margin-bottom: 0px !important;
    }

    .boxOut-ulasan{
        padding: 20px;
        //background-color: #f1c40f;
        margin-bottom: 10px;
        border-bottom: 2px solid #d0d2d4;;
    }

    .titlePrimary-text{
        font-size: 16px;
        margin-bottom: 15px;
        color: #444;
    }

    .title-text{
        font-size: 14px;
        color: #444;
        margin-bottom: 5px;
    }

    #textAreaResize{
        resize: none;
    }

    .editTextArea{
        display: block;
        width: 100%;
        padding: 6px 10px;
        font-size: 12px;
        line-height: 1.42857;
        color: #757475;
        background-color: #FFF;
        background-image: none;
        border: 1px solid #d0d2d4;
        border-radius: 0px;
        box-shadow: none;
        transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
    }

    .editTextArea::-webkit-input-placeholder { color: #A9ABAE !important; font-style: italic !important; }
    .editTextArea:-moz-placeholder { color: #A9ABAE !important; font-style: italic !important; }
    .editTextArea::-moz-placeholder { color: #A9ABAE !important; font-style: italic !important; }
    .editTextArea:-ms-input-placeholder { color: #A9ABAE !important; font-style: italic !important; }


    .field-ulasan::-webkit-input-placeholder { color: #A9ABAE !important; font-style: italic !important; }
    .field-ulasan:-moz-placeholder { color: #A9ABAE !important; font-style: italic !important; }
    .field-ulasan::-moz-placeholder { color: #A9ABAE !important; font-style: italic !important; }
    .field-ulasan:-ms-input-placeholder { color: #A9ABAE !important; font-style: italic !important; }


    .form-control-subscribe::-webkit-input-placeholder { color: #A9ABAE !important; font-style: italic !important; }
    .form-control-subscribe:-moz-placeholder { color: #A9ABAE !important; font-style: italic !important; }
    .form-control-subscribe::-moz-placeholder { color: #A9ABAE !important; font-style: italic !important; }
    .form-control-subscribe:-ms-input-placeholder { color: #A9ABAE !important; font-style: italic !important; }

    .form-control-subscribe, .form-control-subscribe:focus, .form-control-subscribe:active{
        box-shadow: none;
        height: 40px;
        padding-left: 20px;
        border: none;
    }

    .button-ulasan{
        background-color: #ed1b23;
        color: white;
        width: 120px;
        font-size: 12px;
        height: 30px;
        border-radius: 0px;
        padding: 0px;
        text-align: center;
        padding-left: 0px;
        float: right;
    }

    .button-ulasan:hover{
        background-color: #dd1b23;
    }

    .field-ulasan{
        height:34px;
        border-radius: 0px;
        padding: 0px 10px;
        background-color: white;
        border: 1px solid #DCDDDD;
        box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.075) inset;
        color: #757475;
        font-size: 11px;
        font-weight: normal;
    }

    .adv.adv-790-100 {
        margin-top: 10px;
    }

    .button-subcribe{
        background: #ff6600; 
        color: #fff; 
        font-size: 16px; 
        padding: 10px 20px; 
        border: 0px; 
        border-top-right-radius: 5px; 
        border-bottom-right-radius: 5px;
        height: 40px !important;
    }

    .button-subcribe:hover, .button-subcribe:focus, .button-subcribe:active{
        background: #DB5800;
        color: #fff; 
    }

    .mini-ls{
        right: -530px;
    }

    .news-module-ver-icon{
        display: none; 
    }

    .news-head-rk .greyspan {
        width: 535px;
    }

    .adv-bottom{
        margin-top: 20px;
        margin-bottom: 0px !important;
    }

    .boxOut-countUlasan{
        border-bottom: 2px solid #d0d2d4;
        //margin-bottom: 10px;
        margin-top: 10px;
        font-weight: bold;
        padding-left: 20px;
        padding-bottom: 5px;
        font-size: 18px;
    }

    .boxOut-review{
        margin-bottom: 20px;
    }

    .boxOut-pictureReview{
        padding-right: 15px;
    }

    .boxOut-pictureReview img{
        width: 100%;
        height: 115px;
    }

    .review-name a{
        font-size: 16px;
        color: #ff6600;
        font-weight: bold;
    }

    .review-time{
        margin-left: 20px;
    }

    .boxOut-nameReview{
        height: 30px;
        overflow: hidden;
        padding-right: 20px;
    }

    .boxOut-deskripsiReview{
        margin-top: 5px;
        text-align: justify;
        padding-right: 20px;
    }

    .box-review{
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .button-lainnya{
        background-color: #ff6600;
        color: white;
        width: 120px;
        font-size: 14px;
        height: 30px;
        border-radius: 0px;
        padding: 0px;
        text-align: center;
        padding-left: 0px;
        float: none;
        margin-bottom: 20px;
        margin-top: 20px;
    }

    .button-lainnya:hover{
        background-color: #DB5800;
    }

    .boxOut-bacaJuga{
        width: 300px; 
        height: auto; 
        display: inline-block; 
        background: #f5f5f5; 
        padding: 20px 20px;
    }

    .boxOut-peringatanLogin{
        padding: 20px;
        color: red;
        border-bottom: 2px solid #d0d2d4;
    }

    .boxOut-peringatanLogin a{
        color: red;
    }

    .boxOut-peringatanLogin a:hover{
        color: #C42025;
    }

    .news-module-ver-title {
        font-weight: bold;
        font-size: 14px;
        padding-top: 5px;
        padding-right: 5px;
        height: 25px;
        overflow: hidden;
    }

    .first-td{
        width: 80px;
    }

    .second-td{
        width: 10px;
    }

    /* editCss */
    .adv.adv-1100-90-true{
        bottom: -220px;
    }

    .adv.adv-1100-90-false{
        bottom: -130px;
    }

</style>


<script type="text/javascript">

    function sharePositioning() {
        var marginLeft = ($(window).width() - 1100) / 2;
        var leftFixed = (marginLeft - 80 - 15);
        $('.share-container').css('left', leftFixed);
    }

    sharePositioning();

    $(document).ready(function () {

        $(window).resize(function () {
            sharePositioning();
        });


        $(window).scroll(function () {
            if (topp == false) {
                if ($(window).scrollTop() + $('.s-header').height() > $('.s-header').height()) {
                    $('.share-container').addClass('shareFixed');
                    $('.share-container').removeClass('shareAbsolute');
                    $('.adv-1100-90-bottom').addClass('adv-1100-90-true');
                    $('.adv-1100-90-bottom').removeClass('adv-1100-90-false');

                } else {
                    $('.share-container').removeClass('shareFixed');
                    $('.share-container').addClass('shareAbsolute');
                    $('.adv-1100-90-bottom').removeClass('adv-1100-90-true');
                    $('.adv-1100-90-bottom').addClass('adv-1100-90-false');

                }
            }
            else if (topp == true) {
                if ($(window).scrollTop() + $('.s-header').height() > $('.s-header').height()) {
                    $('.share-container').addClass('shareFixedtrue');
                    $('.share-container').removeClass('shareAbsolute');
                    $('.adv-1100-90-bottom').removeClass('adv-1100-90-true');
                    $('.adv-1100-90-bottom').addClass('adv-1100-90-false');

                } else {
                    $('.share-container').removeClass('shareFixedtrue');
                    $('.share-container').addClass('shareAbsolute');
                    $('.adv-1100-90-bottom').addClass('adv-1100-90-true');
                    $('.adv-1100-90-bottom').removeClass('adv-1100-90-false');
                }
            }
        });


    });
</script>
<script type="text/javascript">

    function advFixer() {
        if ($(window).width() < 1460) {
            var windowWidth = $(window).width();
            var req = 1152;
            var iklanWidth = (windowWidth - req) / 2;
            $('.adv-top-left').css('width', iklanWidth);
            $('.adv-top-right').css('width', iklanWidth);
            $('.adv-top-left').css('left', '7px');
            $('.adv-top-right').css('right', '7px');
        } else {
            var marginLeft = ($(window).width() - 1100) / 2;
            var fixer = (marginLeft - 160 - 25);
            $('.adv-top-left').css('left', fixer);
            $('.adv-top-right').css('right', fixer);
        }

    }

    advFixer();

    $(document).ready(function () {

        $(window).resize(function () {
            advFixer();
        });


        jQuery('#flexslider').flexslider({
            animation: "fade", slideshowSpeed: 7000,
            animationSpeed: 600,
            randomize: false,
            pauseOnHover: true,
            prevText: "",
            nextText: "",
            after: function (slider) {
                jQuery('#flexslider .slider-caption').animate({bottom: 12, }, 400)
            },
            before: function (slider) {
                jQuery('#flexslider .slider-caption').animate({bottom: -105, }, 400)
            },
            start: function (slider) {
                var slide_control_width = 100 / 8;
                jQuery('#flexslider .flex-control-nav li').css('width', slide_control_width + '%');
                jQuery('#flexslider .slider-caption').animate({bottom: 12, }, 400)
            }
        });


    });
</script>
<section class="s-main-content">

    <!--share-->
    <!--==================================================-->
    <div class="share-container shareAbsolute" style="">
        <?php
        $num_fb_share = $currentNews['News']['fb_share_counts'];
        $num_twitter_share = $currentNews['News']['twitter_share_counts'];
        $num_gplus_share = $currentNews['News']['gplus_share_counts'];
        $total_share = $num_fb_share + $num_twitter_share + $num_gplus_share;
        $current_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        ?>
        <div class="s-share-counter text-center" style="background: #ed1c24; line-height: 30px;">
            <span style="color: #fff; line-height: 30px; font-size: 16px;"><?= $total_share ?></span>
            <span style="color: #fff; line-height: 30px; font-size: 10px;">Share</span>
        </div>
        <a href="#" onclick="shareFacebook(<?= $currentNews['News']['id'] ?>)" style="background: url('<?= Router::url("/front_file/makassar-terkini/img/icon/side-fb.png", true) ?>') no-repeat; position: relative; width: 50px; height: 66px; display: block; margin-left: auto; margin-right: auto; margin-top: 15px;">
            <span class="text-center" style="width: 100%; position: absolute; bottom: 2px; left: 0px; color: #fff; font-size: 12px;"><?= $num_fb_share ?></span>
        </a>
        <a href="https://twitter.com/intent/tweet?url=<?= Router::url('', true) ?>&text=<?= $currentNews['News']['title_ind'] ?>" style="background: url('<?= Router::url("/front_file/makassar-terkini/img/icon/side-twitter.png", true) ?>') no-repeat; position: relative; width: 50px; height: 66px; display: block; margin-left: auto; margin-right: auto; margin-top: 15px;">
            <span class="text-center" style="width: 100%; position: absolute; bottom: 2px; left: 0px; color: #fff; font-size: 12px;"><?= $num_twitter_share ?></span>
        </a>
        <a href="https://plus.google.com/share?url=<?= $current_link ?>&hl=en" onclick="shareGoogle(<?= $currentNews['News']['id'] ?>)" style="background: url('<?= Router::url("/front_file/makassar-terkini/img/icon/side-gp.png", true) ?>') no-repeat; position: relative; width: 50px; height: 66px; display: block; margin-left: auto; margin-right: auto; margin-top: 15px;">
            <span class="text-center" style="width: 100%; position: absolute; bottom: 2px; left: 0px; color: #fff; font-size: 12px;"><?= $num_gplus_share ?></span>
        </a>
    </div>

    <!-- Adv Middle Top -->
    <!--==================================================-->
    <?php
    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 1, "idx" => 1]);
    ?>
    <!-- Middle Content -->
    <!--==================================================-->
    <div class="s-col-2-per-3 pull-left" style="/*background: #123;*/ float:left !important;">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <?= $this->element(_FRONT_TEMPLATE_DIR . "/makassar-terkini/flash/dispatcher"); ?>
            <h1 style="font-size: 24px; font-weight: 700; margin-bottom: 15px; margin-top: 10px;"><?= $currentNews['News']['title_ind'] ?></h1>
            <span class="clearfix"></span>
            <div class="col-md-12 col-sm-12 col-xs-12" style="background-image: url('<?= Router::url("/front_file/makassar-terkini/img/icon/title-line.png", true) ?>'); background-size: auto; background-repeat: no-repeat; background-position: center right">
                <div class="pull-left" style="background: #ed1b23; padding: 4px 15px; color: #fff;"><?= $currentNews['NewsCategory']['name'] ?></div>

                <div class="pull-left" style="padding-left: 15px; padding-right: 15px; background-color: white; margin-top: -5px;">
                    <div class="news-module-hor-icon pull-left">
                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/profile.png", true) ?>">
                    </div>
                    <div class="news-module-hor-time pull-left">
                        <?= $currentNews['Author']['Biodata']['full_name'] ?>
                    </div>
                </div>

                <div class="pull-left" style="padding-left: 15px; padding-right: 15px; background-color: white; margin-top: -5px;">
                    <div class="news-module-hor-icon pull-left">
                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/clock.png", true) ?>">
                    </div>
                    <div class="news-module-hor-time pull-left">
                        <?= $this->Html->getTimeago(strtotime($currentNews["News"]['news_date'])) ?>
                    </div>
                </div>
            </div>
            <br>
            <?php
            if ($currentNews['NewsType']['id'] == 1) {
                ?>
                <img src="<?= str_replace('\\', '/', Router::url("{$currentNews['News']['thumbnail_path']}", true)) ?>" width="100%" alt="" style="margin-top: 15px;">
                <?php
                if (!empty($currentNews['News']['thumbnail_description'])) {
                    ?>
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 15px; text-align: center; font-size: 12.5px; background: rgb(245, 245, 245) none repeat scroll 0% 0%; margin-bottom: 20px;">
                        <div class="col-md-12 col-sm-12 col-xs-12" style="max-height: 55px; overflow: hidden">
                            <?= $currentNews['News']['thumbnail_description'] ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
            } else {
                ?>
                <br>
                <video width="640" height="360" controls autoplay onclick="this.paused ? this.play() : this.pause();" style="margin-left: auto; margin-right: auto; display: block">
                    <source src="<?= str_replace('\\', '/', Router::url("{$currentNews['News']['video_path']}", true)) ?>" type="video/mp4">
                </video>
                <?php
                if (!empty($currentNews['News']['thumbnail_description'])) {
                    ?>
                    <div style="background: #fefbe1; padding: 10px 20px; margin-top: 10px;">
                        <h4>
                            Deskripsi Video :
                        </h4>
                        <p>
                            <?= $currentNews['News']['thumbnail_description'] ?>
                        </p>
                    </div>
                    <?php
                }
            }
            ?>
            <br>
            <div style="margin-top: 15px; min-height:400px;">
                <?php
                if (!empty($seeAlsoNews) && count($seeAlsoNews['SeeAlsoFeatureDetail']) > 1) {
                    ?>
                    <div class="pull-right" style="width: 250px; height: auto; display: inline-block; background: #f5f5f5; padding: 20px 20px 20px 40px; margin-left: 20px; margin-bottom: 20px;">
                        <h3 style="margin-top: 0px; font-weight: bold;">Baca juga:</h3>
                        <ul class="s-baca-juga" style="font-weight: bold;">
                            <?php
                            foreach ($seeAlsoNews['SeeAlsoFeatureDetail'] as $bacaJuga) {
                                $baca_juga_title = seoUrl($bacaJuga['News']['title_ind']);
                                ?>
                                <li>
                                    <?php
                                    if ($bacaJuga['News']['news_type_id'] == 1) {
                                        ?>
                                        <a href="<?= Router::url("/berita/{$bacaJuga['News']['id']}/$baca_juga_title", true) ?>">
                                            <?php
                                        } else if ($bacaJuga['News']['news_type_id'] == 2) {
                                            ?>
                                            <a href="<?= Router::url("/foto/{$bacaJuga['News']['id']}/$baca_juga_title", true) ?>">
                                                <?php
                                            } else {
                                                ?>
                                                <a href="<?= Router::url("/video/{$bacaJuga['News']['id']}/$baca_juga_title", true) ?>">
                                                    <?php
                                                }
                                                ?>                        
                                                <?= $bacaJuga['News']['title_ind'] ?>
                                            </a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                        </ul>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <?= $currentNews['News']['content_ind'] ?>            
                                    </div>

                                    <div style="background: #e6f5fa; padding: 20px 20px; margin-bottom: 10px;">
                                        <table width="100%">
                                            <tr>
                                                <td class="first-td">Editor</td>
                                                <td class="second-td">:</td>
                                                <td><?= !empty($currentNews['Editor']['id']) ? $currentNews['Editor']['Biodata']['full_name'] : "-" ?></td>
                                            </tr>
                                            <tr>
                                                <td class="first-td">Publisher</td>
                                                <td class="second-td">:</td>
                                                <td><?= !empty($currentNews['Publisher']['id']) ? $currentNews['Publisher']['Biodata']['full_name'] : "-" ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <?php
                                    if ($currentNews['NewsCategory']['uniq'] == "news" || $currentNews['NewsCategory']['parent_id'] == 1) {
                                        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 11]);
                                    } else if ($currentNews['NewsCategory']['uniq'] == "bisnis" || $currentNews['NewsCategory']['parent_id'] == 2) {
                                        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 12]);
                                    } else if ($currentNews['NewsCategory']['uniq'] == "tekno" || $currentNews['NewsCategory']['parent_id'] == 3) {
                                        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 13]);
                                    } else if ($currentNews['NewsCategory']['uniq'] == "lifestyle" || $currentNews['NewsCategory']['parent_id'] == 4) {
                                        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 14]);
                                    } else if ($currentNews['NewsCategory']['uniq'] == "sport" || $currentNews['NewsCategory']['parent_id'] == 5) {
                                        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 15]);
                                    } else if ($currentNews['NewsCategory']['uniq'] == "gallery" || $currentNews['NewsCategory']['parent_id'] == 6) {
                                        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 3, "position" => 16]);
                                    }
                                    ?>
                                    <!-- Ulasan -->
                                    <!-- ================================================== -->
                                    <?php
                                    $numOfComments = ClassRegistry::init("NewsComment")->find("all", [
                                        "conditions" => [
                                            "NewsComment.news_id" => $news_id,
                                            "NewsComment.comment_status_id" => 1,
                                        ],
                                    ]);
                                    ?>
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-countUlasan">
                                        <?= count($numOfComments) ?> Ulasan
                                    </div>                                

                                    <?php
                                    if ($this->Session->check("credential.member")) {
                                        ?>
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-ulasan">
                                            <?php
                                            echo $this->Form->create('NewsComment', array('action' => 'comment_news', 'type' => 'post'));
                                            ?>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 title-text font-sourceSansProSemibold">
                                                    Tulis Ulasan Anda Disini
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <textarea id="textAreaResize" class="form-control editTextArea" rows="4" placeholder="Ketik disini" name="data[NewsComment][comment]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 font-sourceSansProSemibold">
                                                    <button type="submit" class="btn button-ulasan font-sourceSansProSemibold">Kirim Ulasan</button>
                                                </div>
                                                <input type="hidden" name="data[NewsComment][news_id]" value="<?= $currentNews['News']['id'] ?>">
                                                <input type="hidden" name="data[NewsComment][comment_status_id]" value="2">
                                                <input type="hidden" name="data[NewsComment][account_id]" value="<?= $this->Session->read("credential.member.Account.id") ?>">
                                                <input type="hidden" name="data[NewsComment][comentator_name]" value="<?= $this->Session->read("credential.member.Biodata.full_name") ?>">
                                            </div>
                                            <?php
                                            echo $this->Form->end();
                                            ?>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-peringatanLogin">
                                            Anda harus <a href="<?= Router::url("/login-register", true) ?>"><u>Login</u></a> terlebih dahulu
                                        </div>
                                        <?php
                                    }
                                    ?>

                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-review">
                                        <?php
                                        foreach ($commentNews as $comments) {
                                            ?>        
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-review">
                                                    <div class="col-md-2 col-sm-2 col-xs-2 boxOut-pictureReview">
                                                        <a href="#">
                                                            <img src="<?= str_replace('\\', '/', Router::url($comments['Account']['User']['profile_picture'], true)) ?>">
                                                        </a>
                                                    </div>
                                                    <div class="col-md-10 col-sm-10 col-xs-10">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-nameReview">
                                                            <span class="review-name">
                                                                <a href="#">
                                                                    <?= $comments['Account']['Biodata']['full_name'] ?>
                                                                </a>
                                                            </span>
                                                            <span class="review-time">
                                                                <?= $this->Html->cvtWaktu($comments['NewsComment']['created']) ?>
                                                            </span>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-deskripsiReview">
                                                            <?= $comments['NewsComment']['comment'] ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>           
                                    </div>
                                    <?php
                                    if (count($numOfComments) > 2) {
                                        ?>
                                        <div class="berita-more-comments">
                                            <div class="col-md-12 col-sm-12 col-xs-12 center">
                                                <button type="button" class="btn button-lainnya center-block">
                                                    <a style="color: white;" href="javascript:void(false);" class="more-comments" data-remove=".berita-more-comments" data-container=".boxOut-review" data-template="#comments-preview-nodes" data-order="NewsComment.created desc" data-limit="2" data-url="<?= Router::url("/fronts/ajax_comment/$news_id", true); ?>" data-current-page="1">
                                                        Lihat Lainnya
                                                    </a>
                                                </button>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <div style="background: #fad4bb; padding: 15px 30px; overflow: hidden;">
                                        <div class="pull-left">
                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/news-ltr.png", true) ?>">
                                        </div>
                                        <div class="pull-left" style="margin-left: 30px;">
                                            <h2 style="margin: 0px; color: #ed1c24; font-weight: 700;">Subscribe !!!</h2>
                                            <p style="font-size:12px; padding-right: 40px;">
                                                Jangan sampai ketinggalan berita terkini, <br/>
                                                langganan newsletter kami sekarang!
                                            </p>
                                        </div>
                                        <?php
                                        echo $this->Form->create('Newsletter', array('action' => 'subscribe', 'type' => 'post'));
                                        ?>
                                        <div style="margin-top: 22px;">
                                            <div class="input-group">
                                                <input type="email" name="data[Newsletter][email]" class="form-control form-control-subscribe" placeholder="Masukkan email anda!" aria-describedby="basic-addon2" required>
                                                <a href="#" class="input-group-addon font-sourceSansProSemibold button-subcribe" id="basic-addon2" style="">
                                                    Kirim
                                                </a>
                                            </div>
                                            <span style="color:#5C5C5C; font-size: 11px; font-style: italic; margin-left: 20px;">
                                                example@mail.com
                                            </span>
                                        </div>
                                        <?php
                                        echo $this->Form->end();
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <?php
                                            if ($currentNews['News']['news_type_id'] == 1) {
                                                echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_berita_terkait");
                                            } else {
                                                echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_video_lainnya");
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    </div>
                                    </div>


                                    <!-- Middle Content -->
                                    <!--==================================================-->
                                    <div class="s-col-1-per-3 pull-right" style="float:right !important;">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <?php
                                            if ($currentNews['NewsCategory']['uniq'] == "news" || $currentNews['NewsCategory']['parent_id'] == 1) {
                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 11, "idx" => 0]);
                                            } else if ($currentNews['NewsCategory']['uniq'] == "bisnis" || $currentNews['NewsCategory']['parent_id'] == 2) {
                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 12, "idx" => 0]);
                                            } else if ($currentNews['NewsCategory']['uniq'] == "tekno" || $currentNews['NewsCategory']['parent_id'] == 3) {
                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 13, "idx" => 0]);
                                            } else if ($currentNews['NewsCategory']['uniq'] == "lifestyle" || $currentNews['NewsCategory']['parent_id'] == 4) {
                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 14, "idx" => 0]);
                                            } else if ($currentNews['NewsCategory']['uniq'] == "sport" || $currentNews['NewsCategory']['parent_id'] == 5) {
                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 15, "idx" => 0]);
                                            } else if ($currentNews['NewsCategory']['uniq'] == "gallery" || $currentNews['NewsCategory']['parent_id'] == 6) {
                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 16, "idx" => 0]);
                                            }
                                            ?>
                                            <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_berita_pop"); ?>
                                            <?php
                                            if ($currentNews['NewsCategory']['uniq'] == "news" || $currentNews['NewsCategory']['parent_id'] == 1) {
                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 11, "idx" => 1]);
                                            } else if ($currentNews['NewsCategory']['uniq'] == "bisnis" || $currentNews['NewsCategory']['parent_id'] == 2) {
                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 12, "idx" => 1]);
                                            } else if ($currentNews['NewsCategory']['uniq'] == "tekno" || $currentNews['NewsCategory']['parent_id'] == 3) {
                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 13, "idx" => 1]);
                                            } else if ($currentNews['NewsCategory']['uniq'] == "lifestyle" || $currentNews['NewsCategory']['parent_id'] == 4) {
                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 14, "idx" => 1]);
                                            } else if ($currentNews['NewsCategory']['uniq'] == "sport" || $currentNews['NewsCategory']['parent_id'] == 5) {
                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 15, "idx" => 1]);
                                            } else if ($currentNews['NewsCategory']['uniq'] == "gallery" || $currentNews['NewsCategory']['parent_id'] == 6) {
                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 16, "idx" => 1]);
                                            }
                                            ?>
                                            <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_event_terkini"); ?>
                                            <?php
                                            if ($currentNews['NewsCategory']['uniq'] == "news" || $currentNews['NewsCategory']['parent_id'] == 1) {
                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 11, "upperFence" => 1]);
                                            } else if ($currentNews['NewsCategory']['uniq'] == "bisnis" || $currentNews['NewsCategory']['parent_id'] == 2) {
                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 12, "upperFence" => 1]);
                                            } else if ($currentNews['NewsCategory']['uniq'] == "tekno" || $currentNews['NewsCategory']['parent_id'] == 3) {
                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 13, "upperFence" => 1]);
                                            } else if ($currentNews['NewsCategory']['uniq'] == "lifestyle" || $currentNews['NewsCategory']['parent_id'] == 4) {
                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 14, "upperFence" => 1]);
                                            } else if ($currentNews['NewsCategory']['uniq'] == "sport" || $currentNews['NewsCategory']['parent_id'] == 5) {
                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 15, "upperFence" => 1]);
                                            } else if ($currentNews['NewsCategory']['uniq'] == "gallery" || $currentNews['NewsCategory']['parent_id'] == 6) {
                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 16, "upperFence" => 1]);
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    </section>
                                    <span class="clearfix"></span>
                                    <?php
                                    if ($currentNews['NewsCategory']['uniq'] == "news" || $currentNews['NewsCategory']['parent_id'] == 1) {
                                        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 11,"bottom"=>true]);
                                    } else if ($currentNews['NewsCategory']['uniq'] == "bisnis" || $currentNews['NewsCategory']['parent_id'] == 2) {
                                        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 12,"bottom"=>true]);
                                    } else if ($currentNews['NewsCategory']['uniq'] == "tekno" || $currentNews['NewsCategory']['parent_id'] == 3) {
                                        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 13,"bottom"=>true]);
                                    } else if ($currentNews['NewsCategory']['uniq'] == "lifestyle" || $currentNews['NewsCategory']['parent_id'] == 4) {
                                        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 14,"bottom"=>true]);
                                    } else if ($currentNews['NewsCategory']['uniq'] == "sport" || $currentNews['NewsCategory']['parent_id'] == 5) {
                                        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 15,"bottom"=>true]);
                                    } else if ($currentNews['NewsCategory']['uniq'] == "gallery" || $currentNews['NewsCategory']['parent_id'] == 6) {
                                        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 16,"bottom"=>true]);
                                    }
                                    ?>
                                    <div id="fb-root"></div>
                                    <script>
                                        (function (d, s, id) {
                                            var js, fjs = d.getElementsByTagName(s)[0];
                                            if (d.getElementById(id))
                                                return;
                                            js = d.createElement(s);
                                            js.id = id;
                                            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=139331869805917";
                                            fjs.parentNode.insertBefore(js, fjs);
                                        }(document, 'script', 'facebook-jssdk'));
                                    </script>

                                    <script>
                                        var title = '<?= $currentNews['News']['title_ind'] ?>';
                                        var news_id = <?= $currentNews['News']['id'] ?>;
                                        window.fbAsyncInit = function () {
                                            FB.init({
                                                appId: '139331869805917',
                                                xfbml: true,
                                                version: 'v2.5'
                                            });
                                        };

                                        (function (d, s, id) {
                                            var js, fjs = d.getElementsByTagName(s)[0];
                                            if (d.getElementById(id)) {
                                                return;
                                            }
                                            js = d.createElement(s);
                                            js.id = id;
                                            js.src = "//connect.facebook.net/en_US/sdk.js";
                                            fjs.parentNode.insertBefore(js, fjs);
                                        }(document, 'script', 'facebook-jssdk'));
                                        function shareFacebook(id) {
                                            var image_path = '<?= Router::url($currentNews['News']['thumbnail_path'], true) ?>';
//                                            replaceMetaTag(image_path);
                                            FB.ui(
                                                    {
                                                        method: 'feed',
                                                        name: 'Makassar Terkini',
                                                        link: '<?= $current_link ?>',
                                                        picture: image_path,
                                                        caption: title,
                                                        description: title,
                                                        message: ''
                                                    }, function (response) {
                                                if (response && !response.error_message) {
                                                    alert('Posting completed.');
                                                    $.ajax({
                                                        url: BASE_URL + "/news/count_share_facebook/" + news_id,
                                                        dataType: "json",
                                                        type: "PUT",
                                                        data: {newsID: news_id},
                                                        success: function (json) {
                                                            //                        alert("Sukses!");
                                                        }
                                                    });
                                                }
                                            }
                                            );
                                        }

                                        function shareGoogle(id) {
                                            $.ajax({
                                                url: BASE_URL + "/news/count_share_gplus/" + news_id,
                                                dataType: "json",
                                                type: "PUT",
                                                data: {newsID: news_id},
                                                success: function (json) {
                                                    //                        alert("Sukses!");
                                                }
                                            });
                                        }
                                        
//                                        function replaceMetaTag(image_path) {
//                                            $("meta[property='og\\:image']").attr("content", image_path);
//                                        }
                                    </script>
                                    <script>
                                        //Twitter Widgets JS
                                        window.twttr = (function (d, s, id) {
                                            var t, js, fjs = d.getElementsByTagName(s)[0];
                                            if (d.getElementById(id))
                                                return;
                                            js = d.createElement(s);
                                            js.id = id;
                                            js.src = "https://platform.twitter.com/widgets.js";
                                            fjs.parentNode.insertBefore(js, fjs);
                                            return window.twttr || (t = {_e: [], ready: function (f) {
                                                    t._e.push(f)
                                                }});
                                        }(document, "script", "twitter-wjs"));

                                        //Once twttr is ready, bind a callback function to the tweet event
                                        twttr.ready(function (twttr) {
                                            twttr.events.bind('tweet', function (event) {
                                                console.log('tweet, tweet');
                                                $.ajax({
                                                    url: BASE_URL + "/news/count_share_twitter/" + news_id,
                                                    dataType: "json",
                                                    type: "PUT",
                                                    data: {newsID: news_id},
                                                    success: function (json) {
                                                        //                    alert("Sukses!");
                                                    }
                                                });
                                            });
                                        });
                                    </script>
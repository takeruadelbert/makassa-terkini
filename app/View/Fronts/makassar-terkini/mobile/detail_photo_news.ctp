<?php
$now = new DateTime();
?>
<!--Content-->
<!--==================================================-->
<section>
    <div class="container">
        <div class="row section-color">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-marginTop">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-deskripsiGalleri">
                            <?= $this->element(_FRONT_TEMPLATE_DIR . "/makassar-terkini/flash/mobile/dispatcher"); ?>
                            <div class="row">                                
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleBerita font-arial">
                                    <?= $currentNews['News']['title_ind'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-shareGallery">
                                    <div class="persen63">
                                        <div class="persen20">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-kategoriBerita font-openSans-bold flex">
                                                <?= $currentNews['NewsCategory']['name'] ?>
                                            </div>
                                        </div>
                                        <div class="persen80">
                                            <div class="col-md-5 col-sm-5 col-xs-5 boxOut-username flex font-openSans">
                                                <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-userGray.png", true) ?>" />
                                                <?= $currentNews['Author']['Biodata']['first_name'] ?>
                                            </div>
                                            <div class="col-md-7 col-sm-7 col-xs-7 boxOut-date flex font-openSans">
                                                <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-clock-grey.png", true) ?>" />
                                                <?= $this->Html->cvtTanggal($currentNews['News']['publish_date']) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="persen37">
                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-beritaShare flex font-sourceSansProBold">
                                                <?php
                                                $num_fb_share = $currentNews['News']['fb_share_counts'];
                                                $num_twitter_share = $currentNews['News']['twitter_share_counts'];
                                                $num_gplus_share = $currentNews['News']['gplus_share_counts'];
                                                $total_share = $num_fb_share + $num_twitter_share + $num_gplus_share;
                                                $current_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                                ?>
                                                <font><?= $total_share ?></font>
                                                <font>Share</font>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <div class="col-md-4 col-sm-4 col-xs-4">
                                                <a href="#" onclick="shareFacebook(<?= $currentNews['News']['id'] ?>)">
                                                    <div class="berita-share-facebook flex">
                                                        <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/social-1.png", true) ?>" />
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-4">
                                                <a href="https://twitter.com/intent/tweet?url=<?= Router::url('', true) ?>&text=<?= $currentNews['News']['title_ind'] ?>">
                                                    <div class="berita-share-twitter center-block flex">
                                                        <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/social-2.png", true) ?>"/>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-4">
                                                <a href="https://plus.google.com/share?url=<?= $current_link ?>&hl=en" onclick="shareGoogle(<?= $currentNews['News']['id'] ?>)">
                                                    <div class="berita-share-google center-block flex">
                                                        <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/social-3.png", true) ?>" />
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            foreach ($currentNews['NewsImage'] as $k => $images) {
                                ?>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-indexGallery">
                                                    <a href="#" data-toggle="modal" data-target="#photo-<?= $k + 1 ?>">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-indexGallery flex" style="background-image: url('<?= Router::url("{$images['path']}", true) ?>');">

                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keteranganFoto font-openSans">
                                                    <?= $images['description'] ?>
                                                </div>
                                            </div>
                                        </div>

                                        <!----------------------------- Modal photo ------------------------------->
                                        <div class="row">
                                            <div id="photo-<?= $k + 1 ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog modal-lg modal-margin modal-edit">
                                                    <div class="modal-content editModal-content">
                                                        <div class="modal-header editModal-header">
                                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                                <button class="btn button-close font-openSans-bold" type="button" data-dismiss="modal"><img class="" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrow-fotoLeft.png", true) ?>">Back to article</button>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                                <button class="btn button-share font-openSans-bold" type="button">Share <img class="" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/share-white.png", true) ?>"></button>
                                                            </div>
                                                        </div>
                                                        <div class="modal-body editModal-body">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-fotoModal">
                                                                    <img class="" src="<?= Router::url("{$images['path']}", true) ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textModal font-openSans">
                                                                    <?= $images['description'] ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-----------------------------  ------------------------------->

                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <br> <br>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-beritaTerkait">
                            <div class="col-md-6 col-sm-6 col-xs-6 box-beritaTerkait font-openSans-bold flex">
                                BERITA TERKAIT
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-beritaBanyak">
                            <?php
                            foreach ($similar_news as $k => $similars) {
                                if ($k < 3) {
                                    $similar_news_title = seoUrl($similars[0]['News']['title_ind']);
                                    ?>
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-berita">
                                        <div class="col-md-4 col-sm-4 col-xs-4 boxOut-beritaFoto">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-beritaFoto">
                                                <?php
                                                if ($similars[0]['News']['news_type_id'] == 1) {
                                                    ?>
                                                    <a href="<?= Router::url("/m/berita/{$similars[0]['News']['id']}/$similar_news_title", true) ?>">
                                                        <?php
                                                    } else if ($similars[0]['News']['news_type_id'] == 2) {
                                                        ?>
                                                        <a href="<?= Router::url("/m/foto/{$similars[0]['News']['id']}/$similar_news_title", true) ?>">
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <a href="<?= Router::url("/m/video/{$similars[0]['News']['id']}/$similar_news_title", true) ?>">
                                                                <?php
                                                            }
                                                            ?>                                        
                                                            <img src="<?= Router::url("{$similars[0]['News']['thumbnail_path']}") ?>" />
                                                        </a>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-8 boxOut-beritaTitle font-sourceSansPro center-news">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-beritaTitle">
                                                                        <?php
                                                                        if ($similars[0]['News']['news_type_id'] == 1) {
                                                                            ?>
                                                                            <a href="<?= Router::url("/m/berita/{$similars[0]['News']['id']}/$similar_news_title", true) ?>">
                                                                                <?php
                                                                            } else if ($similars[0]['News']['news_type_id'] == 2) {
                                                                                ?>
                                                                                <a href="<?= Router::url("/m/foto/{$similars[0]['News']['id']}/$similar_news_title", true) ?>">
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <a href="<?= Router::url("/m/video/{$similars[0]['News']['id']}/$similar_news_title", true) ?>">
                                                                                        <?php
                                                                                    }
                                                                                    ?>                                        
                                                                                    <?= $similars[0]['News']['title_ind'] ?>
                                                                                </a>
                                                                                </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-beritaJam">
                                                                                        <?= $this->Html->getTimeago(strtotime($similars[0]["News"]['publish_date'])) ?>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- jika ingin memunculkan tanda sponsor hilangkan class "hidden", jika ingin hilangkan sponsor tambah class "hidden" -->
                                                                                <?php
                                                                                if ($similars[0]['News']['is_sponsor'] == 1) {
                                                                                    ?>
                                                                                    <div class="boxOut-beritaSponsor font-sourceSansProSemibold">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                            <div class="sponsorTriangle center-block"></div>
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-beritaSponsor center flex">
                                                                                            <a href="#">
                                                                                                SPONSOR
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                    </div>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                                </div>
                                                                                </div>
                                                                                <?php
                                                                            } else {
                                                                                break;
                                                                            }
                                                                        }
                                                                        ?>
                                                                        </div>
                                                                        </div>                                       

                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-comment">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-comment">
                                                                                        <!-- Ulasan -->
                                                                                        <!-- ================================================== -->
                                                                                        <?php
                                                                                        $numOfComments = ClassRegistry::init("NewsComment")->find("count", [
                                                                                            "conditions" => [
                                                                                                "NewsComment.news_id" => $news_id,
                                                                                                "NewsComment.comment_status_id" => 1,
                                                                                            ],
                                                                                        ]);
                                                                                        ?>
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-countUlasan">
                                                                                            <?= $numOfComments ?> Ulasan
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
                                                                                                            <textarea id="textAreaResize" class="form-control editTextArea" rows="6" placeholder="Ketik disini" name="data[NewsComment][comment]"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="row">
                                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 font-sourceSansProSemibold">
                                                                                                        <button type="submit" class="btn button-ulasan font-sourceSansProSemibold">Kirim Ulasan</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <input type="hidden" name="data[NewsComment][news_id]" value="<?= $news_id ?>">
                                                                                                <input type="hidden" name="data[NewsComment][comentator_name]" value="<?= $this->Session->read("credential.member.Biodata.full_name") ?>">
                                                                                                <input type="hidden" name="data[NewsComment][account_id]" value="<?= $this->Session->read("credential.member.Account.id") ?>">
                                                                                                <?php
                                                                                                echo $this->Form->end();
                                                                                                ?>
                                                                                            </div>
                                                                                            <?php
                                                                                        } else {
                                                                                            ?>
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-peringatanLogin">
                                                                                                Anda harus <a href="<?= Router::url("/m/login", true) ?>"><u>Login</u></a> terlebih dahulu
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
                                                                                        if ($numOfComments > 2) {
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

                                                                                        <div class="row">                                        
                                                                                            <?php
                                                                                            if ($currentNews['NewsCategory']['uniq'] == "news" || $currentNews['NewsCategory']['parent_id'] == 1) {
                                                                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan_mobile", [ "position" => 11]);
                                                                                            } else if ($currentNews['NewsCategory']['uniq'] == "bisnis" || $currentNews['NewsCategory']['parent_id'] == 2) {
                                                                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan_mobile", [ "position" => 12]);
                                                                                            } else if ($currentNews['NewsCategory']['uniq'] == "tekno" || $currentNews['NewsCategory']['parent_id'] == 3) {
                                                                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan_mobile", [ "position" => 13]);
                                                                                            } else if ($currentNews['NewsCategory']['uniq'] == "lifestyle" || $currentNews['NewsCategory']['parent_id'] == 4) {
                                                                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan_mobile", [ "position" => 14]);
                                                                                            } else if ($currentNews['NewsCategory']['uniq'] == "sport" || $currentNews['NewsCategory']['parent_id'] == 5) {
                                                                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan_mobile", [ "position" => 15]);
                                                                                            } else if ($currentNews['NewsCategory']['uniq'] == "gallery" || $currentNews['NewsCategory']['parent_id'] == 6) {
                                                                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan_mobile", [ "position" => 16]);
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
                                                                        </section>

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
                                                                                FB.ui(
                                                                                        {
                                                                                            method: 'feed',
                                                                                            name: 'Makassar Terkini',
                                                                                            link: '<?= $current_link ?>',
                                                                                            picture: 'http://makassarterkini.com/img/LOGO-MT.png',
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
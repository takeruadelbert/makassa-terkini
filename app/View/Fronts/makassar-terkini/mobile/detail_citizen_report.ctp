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
                    <?php
                    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan_mobile", [ "position" => 17]);
                    ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-beritaContent">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleBerita font-arial">
                                <?= $currentCitizenReport['News']['title_ind'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="persen63">
                                    <div class="persen20">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-kategoriBerita font-openSans-bold flex">
                                            <?= $currentCitizenReport['NewsCategory']['name'] ?>
                                        </div>
                                    </div>
                                    <div class="persen80">
                                        <div class="col-md-5 col-sm-5 col-xs-5 boxOut-username flex font-openSans">
                                            <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-userGray.png", true) ?>" />
                                            <?= $currentCitizenReport['Author']['Biodata']['full_name'] ?>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-7 boxOut-date flex font-openSans">
                                            <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-clock-grey.png", true) ?>" />
                                            <?= $this->Html->cvtTanggal($currentCitizenReport['News']['news_date']) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="persen37">
                                    <div class="col-md-5 col-sm-5 col-xs-5">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-beritaShare flex font-sourceSansProBold">
                                            <font>143 </font>
                                            <font>Share</font>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-7 col-xs-7">
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <a href="">
                                                <div class="berita-share-facebook flex">
                                                    <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/social-1.png", true) ?>" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <a href="">
                                                <div class="berita-share-twitter center-block flex">
                                                    <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/social-2.png", true) ?>" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <a href="">
                                                <div class="berita-share-google center-block flex">
                                                    <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/social-3.png", true) ?>" />
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-fotoBerita">
                                <img src="<?= Router::url($currentCitizenReport['News']['thumbnail_path'], true) ?>" />
                            </div>
                        </div>
                        <?php
                        if (!empty($currentCitizenReport['News']['thumbnail_description'])) {
                            ?>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-fotoTitle font-openSans">
                                    <?= $currentCitizenReport['News']['thumbnail_description'] ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-isiBerita-1 font-sourceSansPro">
                                        <?= $currentCitizenReport['News']['content_ind'] ?>
                                    </div>
                                </div>
                                <?php
                                if (!empty($seeAlsoNews) && count($seeAlsoNews['SeeAlsoFeatureDetail'] > 1)) {
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-bacaJuga">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-bacaText font-sourceSansProSemibold">
                                                    Baca Juga :
                                                </div>
                                            </div>
                                            <?php
                                            foreach ($seeAlsoNews['SeeAlsoFeatureDetail'] as $baca_juga) {
                                                $baca_juga_title = seoUrl($baca_juga['News']['title_ind']);
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-beritaLain">
                                                        <div class="persen5">
                                                            <div class="point-red center-block"></div>
                                                        </div>
                                                        <div class="persen95">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleBeritaLain">
                                                                <?php
                                                                if ($baca_juga['News']['news_type_id'] == 1) {
                                                                    ?>
                                                                    <a href="<?= Router::url("/m/berita/{$baca_juga['News']['id']}/$baca_juga_title", true) ?>">
                                                                        <?php
                                                                    } else if ($baca_juga['News']['news_type_id'] == 2) {
                                                                        ?>
                                                                        <a href="<?= Router::url("/m/foto/{$baca_juga['News']['id']}/$baca_juga_title", true) ?>">
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <a href="<?= Router::url("/m/video/{$baca_juga['News']['id']}/$baca_juga_title", true) ?>">
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                            <?= $baca_juga['News']['title_ind'] ?>
                                                                        </a>
                                                                        </div>
                                                                        </div>
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
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-editor font-sourceSansPro">
                                                                        <table>
                                                                            <tr>
                                                                                <td class="kolom-editor">Editor</td>
                                                                                <td class="kolom-titik center">:</td>
                                                                                <td><?= $currentCitizenReport['Editor']['Biodata']['full_name'] ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Publisher</td>
                                                                                <td class="center">:</td>
                                                                                <td><?= $currentCitizenReport['Publisher']['Biodata']['full_name'] ?></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan_mobile", [ "position" => 17]);
                                                                ?>
                                                                </div>
                                                                </div>
                                                                </div>
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
                                                                        foreach ($similar_news as $similars) {
                                                                            $similar_news_title = seoUrl($similars[0]['News']['title_ind']);
                                                                            ?>
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-berita">
                                                                                <div class="col-md-4 col-sm-4 col-xs-4 boxOut-beritaFoto">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-beritaFoto">
                                                                                        <?php
                                                                                        if ($similars[0]['News']['news_type_id'] == 1) {
                                                                                            ?>
                                                                                            <a href="<?= Router::url("/m/berita/{$similars[0]['News']['id']}/$similar_news_title") ?>">
                                                                                                <?php
                                                                                            } else if ($similars[0]['News']['news_type_id'] == 2) {
                                                                                                ?>
                                                                                                <a href="<?= Router::url("/m/foto/{$similars[0]['News']['id']}/$similar_news_title") ?>">
                                                                                                    <?php
                                                                                                } else {
                                                                                                    ?>
                                                                                                    <a href="<?= Router::url("/m/video/{$similars[0]['News']['id']}/$similar_news_title") ?>">
                                                                                                        <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                    <img src="<?= Router::url("{$similars[0]['News']['thumbnail_path']}", true) ?>" />
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
                                                                                                                    <a href="<?= Router::url("/m/berita/{$similars[0]['News']['id']}/$similar_news_title") ?>">
                                                                                                                        <?php
                                                                                                                    } else if ($similars[0]['News']['news_type_id'] == 2) {
                                                                                                                        ?>
                                                                                                                        <a href="<?= Router::url("/m/foto/{$similars[0]['News']['id']}/$similar_news_title") ?>">
                                                                                                                            <?php
                                                                                                                        } else {
                                                                                                                            ?>
                                                                                                                            <a href="<?= Router::url("/m/video/{$similars[0]['News']['id']}/$similar_news_title") ?>">
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
                                                                                                                                            "NewsComment.news_id" => $citizen_report_id,
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
                                                                                                                                    <?php
                                                                                                                                    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan_mobile", [ "position" => 17]);
                                                                                                                                    ?>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>            
                                                                                                                    </div>
                                                                                                                    </div>
                                                                                                                    </div>
                                                                                                                    </div>
                                                                                                                    </section>
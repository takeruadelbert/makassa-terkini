<style type="text/css">
    .form-horizontal .form-group {
        margin-left: 0px;
        margin-right: 0px;
    }
    .tab-pane {
        position: relative;
    }
    div#cover {
        overflow: hidden;
        cursor:   pointer;   
    }

</style>
<!--Content-->
<!--==================================================-->
<section>
    <div class="container">
        <div class="row section-color">
            <div class="row">
                <?php
                $set_background_image = "";
                $url_image = "";
                if (!empty($this->Session->read("credential.member.User.cover_path")) || $this->Session->read("credential.member.User.cover_path") != null) {
                    $url_image = $this->Session->read("credential.member.User.cover_path");
                    $set_background_image = "style='background-image: url(\"" . str_replace("\\", "/", Router::url($url_image, true)) . "\")'";
                }
                ?>
                <?php
                echo $this->Form->create('User', array('action' => 'mobile_change_cover', 'type' => 'file', 'id' => 'changeCover'));
                ?>
                <input type="file" name="data[User][0][cover]" id="file" style="display: none;">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-top" <?= $set_background_image ?> id="cover">
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-profilUser">
                    <div class="col-md-8 col-sm-8 col-xs-8 inherit">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-profilName font-openSans-bold">
                            <table class="col-md-12 col-sm-12 col-xs-12 table-profilName">
                                <tr>
                                    <td>
                                        <?php
                                        if ($this->Session->check("credential.member.Biodata")) {
                                            echo $this->Session->read("credential.member.Biodata.full_name");
                                        } else {
                                            echo $this->Session->read("credential.member.SocialProfile.0.display_name");
                                        }
                                        ?>  
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-editProfil font-openSans-bold">
                            <button type="button" class="btn button-editProfil font-openSans-bold red">EDIT PROFIL</button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <?php
                        echo $this->Form->create('User', array('action' => 'mobile_change_profile_picture', 'type' => 'file', 'id' => 'changeProfilePicture'));
                        ?>
                        <div class="boxOut-pictureProfil">
                            <?php
                            if (empty($this->Session->read("credential.member.SocialProfile.0.picture"))) {
                                if (!empty($this->Session->read("credential.member.User.profile_picture")) || $this->Session->read("credential.member.User.profile_picture") != null) {
                                    ?>
                                    <img src="<?= str_replace('\\', '/', Router::url($this->Session->read("credential.member.User.profile_picture"), true)) ?>" id="input-pp" />
                                    <input type="file" id="file-pp" style="display: none;" name="data[User][0][profile_picture]"/>
                                    <?php
                                }
                            } else {
                                ?>
                                <img src="<?= str_replace('\\', '/', Router::url($this->Session->read("credential.member.SocialProfile.0.picture"), true)) ?>" />
                                <?php
                            }
                            ?>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-menuTabProfil">
                    <div class="col-md-12 col-sm-12 col-xs-12 font-sourceSansProSemibold">
                        <ul class="nav nav-tabs edit-navtabs-profil">
                            <li class="active tab-title">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <a data-toggle="tab" href="#tab1">Profil Anda</a>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="triangle-red"></div>
                                </div>
                            </li>
                            <li class="tab-title">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <a data-toggle="tab" href="#tab2">Edit Profil</a>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="triangle-red"></div>
                                </div>
                            </li>
                            <li class="tab-title">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <a data-toggle="tab" href="#tab3">Kirim Berita</a>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="triangle-red"></div>
                                </div>
                            </li>
                            <li class="tab-title">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <a data-toggle="tab" href="#tab4">Kirim Berita Foto</a>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="triangle-red"></div>
                                </div>
                            </li>
                            <li class="tab-title">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <a data-toggle="tab" href="#tab5">Kirim Berita Video</a>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="triangle-red"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>        
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-containTab">
                    <div class="tab-content">
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-infoProfil">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-judul flex">
                                                <div class="col-md-11 col-sm-11 col-xs-11 font-sourceSansProSemibold">
                                                    Profil
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-1 box-circleUp">
                                                    <img class="button-show" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowDown-grey.png", true) ?>" />
                                                    <img class="button-hide hidden" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowUp-grey.png", true) ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-popup-pilihan">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-infoUser-hide popup-infoUser">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <p class="form-control-static"><?= $this->Session->read("credential.member.User.username") ?></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <p class="form-control-static"><?= $this->Session->read("credential.member.User.email") ?></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Full Name</label>
                                                        <p class="form-control-static"><?= $this->Session->read("credential.member.Biodata.first_name") . " " . $this->Session->read("credential.member.Biodata.last_name") ?></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Short Bio</label>
                                                        <p class="form-control-static"><?= $this->Session->read("credential.member.Biodata.biography") ?></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Birthday</label>
                                                        <p class="form-control-static"><?= $this->Html->cvtTanggal($this->Session->read("credential.member.Biodata.birth_date")) ?></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jenis Kelamin</label>
                                                        <p class="form-control-static"><?= !empty($this->Session->read("credential.member.Biodata.gender_id")) ? $this->Echo->gender($this->Session->read("credential.member.Biodata.gender_id")) : "" ?></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <p class="form-control-static"><?= $this->Session->read("credential.member.Biodata.phone") ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-infoProfil">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-judul flex">
                                                <div class="col-md-11 col-sm-11 col-xs-11 font-sourceSansProSemibold">
                                                    Artikel
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-1 box-circleUp">
                                                    <img class="button-show" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowDown-grey.png", true) ?>" />
                                                    <img class="button-hide hidden" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowUp-grey.png", true) ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-popup-pilihan">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-infoUser-hide popup-infoUser">
                                                    <?php
                                                    foreach($member_news_article as $article_member) {
                                                        $member_news_article_title = seoUrl($article_member['News']['title_ind']);
                                                    ?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-berita">
                                                        <div class="col-md-4 col-sm-4 col-xs-4 boxOut-beritaFoto">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 box-beritaFoto">
                                                                <a href="<?= Router::url("/m/berita/{$article_member['News']['id']}/$member_news_article_title", true) ?>">
                                                                    <img src="<?= Router::url("{$article_member['News']['thumbnail_path']}", true)?>"/>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-8 boxOut-beritaTitle font-sourceSansPro">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-beritaTitle">
                                                                    <a href="<?= Router::url("/m/berita/{$article_member['News']['id']}/$member_news_article_title", true) ?>">
                                                                        <?= $article_member['News']['title_ind'] ?>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-beritaJam">
                                                                    <?= $this->Html->getTimeago(strtotime($article_member["News"]['publish_date'])) ?>
                                                                </div>
                                                            </div>
                                                            <?php
                                                                if ($article_member['News']['is_sponsor'] == 1) {
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
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-infoProfil">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-judul flex">
                                                <div class="col-md-11 col-sm-11 col-xs-11 font-sourceSansProSemibold">
                                                    Foto
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-1 box-circleUp">
                                                    <img class="button-show" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowDown-grey.png", true) ?>" />
                                                    <img class="button-hide hidden" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowUp-grey.png", true) ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-popup-pilihan">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-infoUser-hide popup-infoUser">
                                                    <?php
                                                    foreach($member_news_photo as $photo_member) {
                                                        $member_news_photo_title = seoUrl($photo_member['News']['title_ind']);
                                                    ?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-berita">
                                                        <div class="col-md-4 col-sm-4 col-xs-4 boxOut-beritaFoto">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 box-beritaFoto">
                                                                <a href="<?= Router::url("/m/foto/{$photo_member['News']['id']}/$member_news_photo_title") ?>">
                                                                    <img src="<?= Router::url("{$photo_member['News']['thumbnail_path']}", true)?>"/>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-8 boxOut-beritaTitle font-sourceSansPro">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-beritaTitle">
                                                                    <a href="<?= Router::url("/m/foto/{$photo_member['News']['id']}/$member_news_photo_title") ?>">
                                                                        <?= $photo_member['News']['title_ind'] ?>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-beritaJam">
                                                                    <?= $this->Html->getTimeago(strtotime($photo_member["News"]['publish_date'])) ?>
                                                                </div>
                                                            </div>
                                                            <?php
                                                                if ($photo_member['News']['is_sponsor'] == 1) {
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
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-infoProfil">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-judul flex">
                                                <div class="col-md-11 col-sm-11 col-xs-11 font-sourceSansProSemibold">
                                                    Video
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-1 box-circleUp">
                                                    <img class="button-show" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowDown-grey.png", true) ?>"/>
                                                    <img class="button-hide hidden" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrowUp-grey.png", true) ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-popup-pilihan">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-infoUser-hide popup-infoUser">
                                                    <?php
                                                    foreach($member_news_video as $video_member) {
                                                        $member_news_video_title = seoUrl($video_member['News']['title_ind']);
                                                    ?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-berita">
                                                        <div class="col-md-4 col-sm-4 col-xs-4 boxOut-beritaFoto">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 box-beritaFoto">
                                                                <a href="<?= Router::url("/m/video/{$video_member['News']['id']}/$member_news_video_title") ?>">
                                                                    <img src="<?= Router::url("{$video_member['News']['thumbnail_path']}", true)?>"/>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-8 boxOut-beritaTitle font-sourceSansPro">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-beritaTitle">
                                                                    <a href="<?= Router::url("/m/video/{$video_member['News']['id']}/$member_news_video_title") ?>">
                                                                        <?= $video_member['News']['title_ind'] ?>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-beritaJam">
                                                                    <?= $this->Html->getTimeago(strtotime($video_member["News"]['publish_date'])) ?>
                                                                </div>
                                                            </div>
                                                            <?php
                                                                if ($video_member['News']['is_sponsor'] == 1) {
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab2" class="tab-pane fade">
                            <?php
                            echo $this->Form->create('Account', array('action' => 'mobile_edit_profile', 'type' => 'post'));
                            ?>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleField font-openSans-bold">
                                            Username
                                        </div>
                                    </div>
                                    <div class="row row-paddingBottom">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <?php
                                            $unlock = "";
                                            if(!empty($this->Session->read("credential.member.User.username")) || $this->Session->read("credential.member.User.username") != null) {
                                                $unlock = "readonly";
                                            }
                                            ?>
                                            <input type="text" placeholder="" class="form-control field-nomorOrder font-sansPro" name="data[User][username]" value="<?= $this->Session->read("credential.member.User.username") ?>" <?= $unlock ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleField font-openSans-bold">
                                            Email
                                        </div>
                                    </div>
                                    <div class="row row-paddingBottom">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" placeholder="" class="form-control field-nomorOrder font-sansPro" name='data[User][email]' value='<?= $this->Session->read("credential.member.User.email") ?>' readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleField font-openSans-bold">
                                            First Name
                                        </div>
                                    </div>
                                    <div class="row row-paddingBottom">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" placeholder="" class="form-control field-nomorOrder font-sansPro" name='data[Biodata][first_name]' value='<?= $this->Session->read("credential.member.Biodata.first_name") ?>'>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-12 col-xs-12"></div>
                                <div class="col-md-5 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleField font-openSans-bold">
                                            Last Name
                                        </div>
                                    </div>
                                    <div class="row row-paddingBottom">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" placeholder="" class="form-control field-nomorOrder font-sansPro" name='data[Biodata][last_name]' value='<?= $this->Session->read("credential.member.Biodata.last_name") ?>'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleField font-openSans-bold">
                                            Short Bio
                                        </div>
                                    </div>
                                    <div class="row row-paddingBottom">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <textarea class="form-control editTextArea" name='data[Biodata][biography]'><?= $this->Session->read("credential.member.Biodata.biography") ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleField font-openSans-bold">
                                            Birthday
                                        </div>
                                    </div>
                                    <div class="row row-paddingBottom">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input id="birthday" type="text" class="form-control field-nomorOrder font-sansPro datepicker" name='data[Biodata][birth_date]' value='<?= $this->Session->read("credential.member.Biodata.birth_date") ?>'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleField font-openSans-bold">
                                            Jenis Kelamin
                                        </div>
                                    </div>
                                    <?php
                                    $checked_pria = "";
                                    $checked_wanita = "";
                                    if($this->Session->read("credential.member.Biodata.gender_id") == 1) {
                                        $checked_pria = "checked";
                                    } else {
                                        $checked_wanita = "checked";
                                    }
                                    ?>
                                    <div class="row row-paddingBottom">
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxCheckBox font-openSans">
                                                <div class="checkbox edit-checbox">
                                                    <input id="gender-1" type="radio" name="data[Biodata][gender_id]" class="gender" value='1' <?= $checked_pria ?>>
                                                    <label for="gender-1">
                                                        Pria
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxCheckBox font-openSans">
                                                <div class="checkbox edit-checbox">
                                                    <input id="gender-2" type="radio" name="data[Biodata][gender_id]" class="gender" value='2' <?= $checked_wanita ?>>
                                                    <label for="gender-2">
                                                        Wanita
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleField font-openSans-bold">
                                            Phone
                                        </div>
                                    </div>
                                    <div class="row row-paddingBottom">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" placeholder="" class="form-control field-nomorOrder font-sansPro" name='data[Biodata][phone]' value='<?= $this->Session->read("credential.member.Biodata.phone") ?>' onkeydown="return (event.which >= 48 && event.which <= 57) || event.which == 8 || event.which == 46;"required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleField font-openSans-bold">
                                            Current Password
                                        </div>
                                    </div>
                                    <div class="row row-paddingBottom">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="password" placeholder="" class="form-control field-nomorOrder font-sansPro" name='data[User][current_password]'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleField font-openSans-bold">
                                            New Password
                                        </div>
                                    </div>
                                    <div class="row row-paddingBottom">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="password" placeholder="" class="form-control field-nomorOrder font-sansPro" name='data[User][password]'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleField font-openSans-bold">
                                            Re-Type New Password
                                        </div>
                                    </div>
                                    <div class="row row-paddingBottom">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="password" placeholder="" class="form-control field-nomorOrder font-sansPro" name="data[User][retype_password]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-buttonProfil">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-8 col-sm-8 col-xs-8 box-buttonSimpanProfil">
                                            <button type="submit" class="btn button-simpanProfil font-openSans-bold">Simpan Perubahan</button>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4 box-buttonBatalProfil">
                                            <button type="reset" class="btn button-buttonBatalProfil font-openSans-bold">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                        <div id="tab3" class="tab-pane fade">
                            <?php
                                echo $this->Form->create("News", array("action" => "mobile_add_news_article", "type" => "file","id"=>"form1"));
                            ?>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakField flex">
                                        <div class="col-md-3 col-sm-3 col-xs-3 boxOut-titleBerita font-sourceSansProSemibold">
                                            Judul Berita
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <input type="text" placeholder="" class="form-control field-berita font-sansPro" name="data[News][title_ind]">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakField flex">
                                        <div class="col-md-3 col-sm-3 col-xs-3 boxOut-titleBerita font-sourceSansProSemibold">
                                            Kategori Berita
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <select class="form-control dropdown-kategoriOption font-sourceSansPro" name="data[News][news_category_id]">
                                                <option value="" selected disabled hidden>-Pilih Kategori Berita-</option>
                                                <?php
                                                $new_category = ClassRegistry::init("NewsCategory")->find('list', array("fields" => array("NewsCategory.id", "NewsCategory.name")));
                                                foreach ($new_category as $item) {
                                                ?>
                                                <option value="<?= $item ?>"><?= $item ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakField flex">
                                        <div class="col-md-3 col-sm-3 col-xs-3 boxOut-titleBerita font-sourceSansProSemibold">
                                            Kata Kunci Berita
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" placeholder="" class="form-control field-berita font-sansPro" name="data[News][meta_key]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-3 col-sm-3 col-xs-3"></div>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keteranganField font-sourceSansPro">
                                                Tuliskan Kata Kunci Berita dan Pisahkan dengan Tanda (,) Koma 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-isiBerita">
                                        <div class="form-group">
                                            <?php
                                                echo $this->Form->input("News.content_ind", array("type"=>"textarea", "div" => array("class" => "col-xs-12"), "label" => false, "class" => "form-control ckeditor-fix"));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-uploadFoto">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-md-5 col-sm-5 col-xs-5 boxOut-titleUploadFoto font-sourceSansProSemibold">
                                                    Upload Foto
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 lampir-file">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 targetFile">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-fieldTambahFoto">
                                                                <input type="text" placeholder=" - Cari Foto -" class="form-control field-berita font-sansPro lampir-file-<?php echo 1; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="col-md-5 col-sm-5 col-xs-5">
                                                                <span type="button" class="btn button-uploadFoto font-sourceSansPro btn-file"><img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-upload.png", true) ?>" />Upload<input type="file" name="data[NewsImage][0][gambar]" accept="image/*"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-keteranganUploadFoto font-sourceSansProSemibold">
                                                <font class="title-keteranganUpload">Keterangan :</font>
                                                <br>
                                                1. Upload File Type : jpg, png, gif, jpeg
                                                <br>
                                                2. Upload File Maksimum Ukuran : 10 MB
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-buttonBerita">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-7 col-sm-7 col-xs-7 box-buttonSaveBerita">
                                                <button type="submit" class="btn button-saveBerita font-sourceSansPro"><img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-save.png", true) ?>" />Save</button>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-5 ">
                                                <button type="reset" class="btn button-cancelBerita font-sourceSansPro"><img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-cancel.png", true) ?>" />Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                        <div id="tab4" class="tab-pane fade">
                            <?php
                                echo $this->Form->create("News", array("action" => "mobile_add_news_photo", "type" => "file","id"=>"form2"));
                            ?>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakField flex">
                                        <div class="col-md-3 col-sm-3 col-xs-3 boxOut-titleBerita font-sourceSansProSemibold">
                                            Judul Berita
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <input type="text" placeholder="" class="form-control field-berita font-sansPro" name="data[News][title_ind]">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakField flex">
                                        <div class="col-md-3 col-sm-3 col-xs-3 boxOut-titleBerita font-sourceSansProSemibold">
                                            Kategori Berita
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <select class="form-control dropdown-kategoriOption font-sourceSansPro" name="data[News][news_category_id]">
                                                <option value="" selected disabled hidden>-Pilih Kategori Berita-</option>
                                                <?php
                                                $new_category = ClassRegistry::init("NewsCategory")->find('list', array("fields" => array("NewsCategory.id", "NewsCategory.name")));
                                                foreach ($new_category as $item) {
                                                ?>
                                                <option value="<?= $item ?>"><?= $item ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakField flex">
                                        <div class="col-md-3 col-sm-3 col-xs-3 boxOut-titleBerita font-sourceSansProSemibold">
                                            Kata Kunci Berita
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" placeholder="" class="form-control field-berita font-sansPro" name="data[News][meta_key]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-3 col-sm-3 col-xs-3"></div>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keteranganField font-sourceSansPro">
                                                Tuliskan Kata Kunci Berita dan Pisahkan dengan Tanda (,) Koma 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-isiBerita">
                                        <div class="form-group">
                                            <?php
                                                echo $this->Form->input("News.content_indo", array("type"=>"textarea", "div" => array("class" => "col-xs-12"), "label" => false, "class" => "form-control ckeditor-fix"));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-uploadFoto">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-md-5 col-sm-5 col-xs-5 boxOut-titleUploadFoto font-sourceSansProSemibold">
                                                    Upload Foto
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 lampir-file">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 targetFile">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-fieldTambahFoto">
                                                                <input type="text" placeholder=" - Cari Foto -" class="form-control field-berita font-sansPro lampir-file-<?php echo 1; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="col-md-5 col-sm-5 col-xs-5">
                                                                <span type="button" class="btn button-uploadFoto font-sourceSansPro btn-file"><img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-upload.png", true) ?>" />Upload<input type="file" name="data[NewsImage][0][gambar]" accept="image/*"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-keteranganUploadFoto font-sourceSansProSemibold">
                                                <font class="title-keteranganUpload">Keterangan :</font>
                                                <br>
                                                1. Upload File Type : jpg, png, gif, jpeg
                                                <br>
                                                2. Upload File Maksimum Ukuran : 10 MB
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-buttonBerita">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-7 col-sm-7 col-xs-7 box-buttonSaveBerita">
                                                <button type="submit" class="btn button-saveBerita font-sourceSansPro"><img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-save.png", true) ?>" />Save</button>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-5 ">
                                                <button type="reset" class="btn button-cancelBerita font-sourceSansPro"><img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-cancel.png", true) ?>" />Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                        <div id="tab5" class="tab-pane fade">
                            <?php
                                echo $this->Form->create("News", array("action" => "add_news_video", "type" => "file","id"=>"form3")); 
                            ?>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakField flex">
                                        <div class="col-md-3 col-sm-3 col-xs-3 boxOut-titleBerita font-sourceSansProSemibold">
                                            Judul Berita
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <input type="text" placeholder="" class="form-control field-berita font-sansPro" name="data[News][title_ind]">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakField flex">
                                        <div class="col-md-3 col-sm-3 col-xs-3 boxOut-titleBerita font-sourceSansProSemibold">
                                            Kategori Berita
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <select class="form-control dropdown-kategoriOption font-sourceSansPro" name="data[News][news_category_id]">
                                                <option value="" selected disabled hidden>-Pilih Kategori Berita-</option>
                                                <?php
                                                $new_category = ClassRegistry::init("NewsCategory")->find('list', array("fields" => array("NewsCategory.id", "NewsCategory.name")));
                                                foreach ($new_category as $item) {
                                                ?>
                                                <option value="<?= $item ?>"><?= $item ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-jarakField flex">
                                        <div class="col-md-3 col-sm-3 col-xs-3 boxOut-titleBerita font-sourceSansProSemibold">
                                            Kata Kunci Berita
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" placeholder="" class="form-control field-berita font-sansPro" name="data[News][meta_key]">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-3 col-sm-3 col-xs-3"></div>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keteranganField font-sourceSansPro">
                                                Tuliskan Kata Kunci Berita dan Pisahkan dengan Tanda (,) Koma 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>                                
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-isiBerita">
                                        <div class="form-group">
                                            <?php
                                                echo $this->Form->input("News.content_indonesia", array("type"=>"textarea", "div" => array("class" => "col-xs-12"), "label" => false, "class" => "form-control ckeditor-fix"));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-uploadFoto">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-md-5 col-sm-5 col-xs-5 boxOut-titleUploadFoto font-sourceSansProSemibold">
                                                    Upload Video
                                                </div>
                                                <div class="col-md-7 col-sm-7 col-xs-7 lampir-file-video">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 targetFile-video">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-fieldTambahFoto">
                                                                <input type="text" placeholder=" - Cari Video -" class="form-control field-berita font-sansPro lampir-file-video-<?php echo 1; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="col-md-5 col-sm-5 col-xs-5">
                                                                <span type="button" class="btn button-uploadFoto font-sourceSansPro btn-file-video"><img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-upload.png", true) ?>" />Upload<input type="file" name="data[News][0][video]" accept="video/*"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8 col-xs-8 boxOut-keteranganUploadFoto font-sourceSansProSemibold">
                                                <font class="title-keteranganUpload">Keterangan :</font>
                                                <br>
                                                1. Upload File Type : mp4, mkv, flv, wmv
                                                <br>
                                                2. Upload File Maksimum Ukuran : 1 GB
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-buttonBerita">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-7 col-sm-7 col-xs-7 box-buttonSaveBerita">
                                                <button type="submit" class="btn button-saveBerita font-sourceSansPro"><img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-save.png", true) ?>" />Save</button>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-5 ">
                                                <button type="reset" class="btn button-cancelBerita font-sourceSansPro"><img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-cancel.png", true) ?>" />Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-buttonDesktop">
                    <div class="box-buttonDesktop center-block">
                        <button type="button" class="btn button-desktop font-openSans-bold"><a href="<?= Router::url("/", true) ?>" style="color: #444444;">DESKTOP VERSION</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function () {


        $.material.init();
        loadckeditor();

        var $jasa = $('input.gender');
        $jasa.click(function () {
            $jasa.filter(':checked').not(this).removeAttr('checked');
        });


        $(".addFile").on("click", function () {
            $(".targetFile").append(
                    '<div class="col-md-12 col-sm-12 col-xs-12 boxOut-fieldTambahFoto">' +
                    '<input type="text" placeholder=" - Cari Foto -" class="form-control field-berita font-sansPro lampir-file-1" readonly>' +
                    '</div>'
                    );
            countFoto++;
        });


        $(document).on('change', '.btn-file :file', function () {
            var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });


        $('.btn-file :file').on('fileselect', function (event, numFiles, label) {

            var input = $(this).parents('.lampir-file').find('.lampir-file-1'),
                    log = numFiles > 1 ? numFiles + ' files selected' : label;

            if (input.length) {
                input.val(log);
            } else {
                if (log)
                    alert(log);
            }

        });


        $(".addFile").on("click", function () {
            $(".targetFile-video").append(
                    '<div class="col-md-12 col-sm-12 col-xs-12 boxOut-fieldTambahFoto">' +
                    '<input type="text" placeholder=" - Cari Foto -" class="form-control field-berita font-sansPro lampir-file-video-1" readonly>' +
                    '</div>'
                    );
            countFoto++;
        });


        $(document).on('change', '.btn-file-video :file', function () {
            var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });


        $('.btn-file-video :file').on('fileselect', function (event, numFiles, label) {

            var input = $(this).parents('.lampir-file-video').find('.lampir-file-video-1'),
                    log = numFiles > 1 ? numFiles + ' files selected' : label;

            if (input.length) {
                input.val(log);
            } else {
                if (log)
                    alert(log);
            }

        });      
          

        $("#input-pp").click(function (event) {
            event.preventDefault();
            $("#file-pp").click();
        });

        $("#file-pp").on("change", function () {
            var fileName = $("#file-pp").val();
            if (fileName) {
                $("#changeProfilePicture").submit();
            } else {
                alert("Silahkan pilih gambar yang ingin diupload.");
            }
        });

        $("#file").on("change", function () {
            var fileName = $(this).val();
            if (fileName) {
                $("#changeCover").submit();
            } else {
                alert("Silahkan pilih gambar yang ingin diupload.");
            }
        });
        $("#cover").on("click", function (event) {
            event.preventDefault();
            $("#file").click();
        })
    });
    
    function loadckeditor() {
        CKEDITOR.editorConfig = function (config) {
        };
        $(".ckeditor-fix").each(function () {
            var $e = $(this);
            var instanceId = $(this).attr('id');
            CKEDITOR.replace(instanceId, {
            });
        });
    }
</script>
<!--    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNI9DqfA0Hdaycx7k7yzbXwnqju1rYut0&type=geocode&libraries=places"></script>
    <script src="../js/download/gmaps.js"></script>-->
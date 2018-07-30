<?php
$now = new DateTime();
?>
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

    input#file {
        height: 30px;
        cursor: pointer;
        position: absolute;
        top: 0px;
        right: 0px;
        font-size: 100px;
        z-index: 2;

        opacity: 0.0; /* Standard: FF gt 1.5, Opera, Safari */
        filter: alpha(opacity=0); /* IE lt 8 */
        -ms-filter: "alpha(opacity=0)"; /* IE 8 */
        -khtml-opacity: 0.0; /* Safari 1.x */
        -moz-opacity: 0.0; /* FF lt 1.5, Netscape */
    }
</style>

<!--Content-->
<!--==================================================-->
<section class="s-main-content">
    <?= $this->element(_FRONT_TEMPLATE_DIR . "/makassar-terkini/flash/dispatcher"); ?>
    <?php
    if (empty($this->Session->read("credential.member.User.cover_path"))) {
        ?>
        <div class="s-cover-picture-cnt" style="background: url('https://www.limexb360.co.uk/media//backgroundimages/g/a/galaxy-wallpapers-10.jpg') no-repeat center center; background-size: cover; ">
            <?php
        } else {
            ?>
            <div class="s-cover-picture-cnt" style="background: url('<?= str_replace('\\', '/', Router::url($this->Session->read("credential.member.User.cover_path"), true)) ?>') no-repeat center center; background-size: cover; ">
                <?php
            }
            ?>
            <div class="s-profile-cnt">
                <?php
                echo $this->Form->create('User', array('action' => 'change_cover', 'type' => 'file', 'id' => 'changeCover'));
                ?>
                <div class="pull-left btn btn-default s-cc-btn" style="" id="cover">
                    <input type="file" name="data[User][0][cover]" id="file">
                    Change Cover
                </div>
                <h2 class="s-pn pull-right" style="">
                    <?= $this->Session->read("credential.member.Biodata.full_name") ?>
                </h2>
                <input type="submit" class="hidden"/>
                <?php echo $this->Form->end(); ?>
                <h2 class="s-pn pull-right" style="">
                    <?= $this->Session->read("credential.member.Account.Biodata.first_name") . " " . $this->Session->read("credential.member.Account.Biodata.last_name") ?>
                </h2>
                <?php
                echo $this->Form->create('User', array('action' => 'change_profile_picture', 'type' => 'file', 'id' => 'changeProfilePicture'));
                if (!empty($this->Session->read("credential.member.SocialProfile.0.picture"))) {
                    ?>
                    <div class="s-pp" style="background: url('<?= $this->Session->read("credential.member.SocialProfile.0.picture") ?>') no-repeat center center; background-size: cover; cursor: pointer; "></div>
                    <?php
                } else {
                    ?>
                    <div class="s-pp">
                        <input id="input-pp" type="image" src="<?= str_replace('\\', '/', Router::url($this->Session->read("credential.member.User.profile_picture"), true)) ?>" style="cursor: pointer;" width="163" height="163"/>
                        <input type="file" id="file-pp" style="display: none;" name="data[User][0][profile_picture]"/>
                    </div>
                    <?php
                }
                echo $this->Form->end();
                ?>
            </div>
        </div>
        <div style="width: 100%; height: auto; display: block; margin-top: 30px; margin-bottom: 30px; overflow: hidden;" id="tabs">
            <ul class="nav nav-tabs s-pp-nav-left" id="myTab00" style="float: left; width: 252px;">
                <li class="active" style="width: inherit; display: block;"><a data-target="#m-pa" data-toggle="tab">Profil Anda</a></li>
                <li  style="width: inherit; display: block;"><a data-target="#m-ep" data-toggle="tab">Edit Profil</a></li>
                <li  style="width: inherit; display: block;"><a data-target="#m-kb" data-toggle="tab">Kirim Berita</a></li>
                <li  style="width: inherit; display: block;"><a data-target="#m-kbf" data-toggle="tab">Kirim Berita Foto</a></li>
                <li  style="width: inherit; display: block;"><a data-target="#m-kbv" data-toggle="tab">Kirim Berita Video</a></li>
            </ul>

            <div class="tab-content pull-left" style="">
                <div class="tab-pane active" id="m-pa">
                    <div class="s-container-573" style="">
                        <ul class="nav nav-tabs s-pp-nav-pa" id="myTab">
                            <li><a data-target="#profile" data-toggle="tab">Profil</a></li>
                            <li><a data-target="#artikel" data-toggle="tab">Artikel</a></li>
                            <li><a data-target="#settings" data-toggle="tab">Foto</a></li>
                            <li><a data-target="#video" data-toggle="tab">Video</a></li>
                        </ul>

                        <div class="tab-content s-profile-user">
                            <div class="tab-pane active" id="profile">
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
                            <div class="tab-pane" id="artikel">
                                <div class="s-berita-terkini-container">
                                    <?php
                                    foreach ($member_news_article as $article) {
                                        $member_news_article_title = seoUrl($article['News']['title_ind']);
                                        ?>
                                        <a href="<?= Router::url("/berita/{$article['News']['id']}/$member_news_article_title") ?>" class="news-module-hor">
                                            <div class="news-module-hor-img">
                                                <img src="<?= str_replace('\\', '/', Router::url("{$article['News']['thumbnail_path']}", true)) ?>">
                                            </div>

                                            <div class="news-module-hor-content font-sourceSansPro" style="width: 312px; padding-top: 0px;">
                                                <div class="news-module-hor-title">
                                                    <?= $article['News']['title_ind'] ?>
                                                </div>

                                                <div class="news-module-hor-desc">
                                                    <?= $article['News']['sinopsys_ind'] ?>
                                                </div>

                                                <div class="news-module-hor-etc">
                                                    <div class="news-module-hor-tag pull-left">
                                                        SPONSOR
                                                        <div class="orange-tooltip">
                                                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/orgTooltip.png", true) ?>">
                                                        </div>
                                                    </div>

                                                    <div class="news-module-hor-info pull-left">
                                                        Info kota
                                                    </div>

                                                    <div class="news-module-hor-icon pull-left">
                                                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/clock.png", true) ?>">
                                                    </div>

                                                    <div class="news-module-hor-time pull-left">
                                                        <?= $this->Html->getTimeago(strtotime($article["News"]['publish_date'])) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <?php
                                    }
                                    ?>                                    
                                </div>
                            </div>
                            <div class="tab-pane" id="settings">
                                <div class="s-video-terkini-container s-foto-video-profile" style="text-align: justify;">
                                    <?php
                                    foreach ($member_news_photo as $photo) {
                                        $member_news_photo_title = seoUrl($photo['News']['title_ind']);
                                        ?>
                                        <div class="news-module-ver">
                                            <div class="news-module-ver-img">
                                                <a href="<?= Router::url("/foto/{$photo['News']['id']}/$member_news_photo_title") ?>">
                                                    <img src="<?= str_replace('\\', '/', Router::url("{$photo['News']['thumbnail_path']}", true)) ?>" width="100%" height="150px">
                                                    <span class="foto-count">
                                                        <?php
                                                        $count = 0;
                                                        foreach ($member_news_photo[0]['NewsImage'] as $images) {
                                                            $count++;
                                                        }
                                                        echo $count;
                                                        ?>
                                                    </span>
                                                </a>
                                            </div>

                                            <div class="news-module-ver-content font-sourceSansPro">
                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left">
                                                        Telah dilihat <?= $article['News']['hits'] ?> kali
                                                    </div>
                                                </div>

                                                <div class="news-module-ver-title">
                                                    <a href="<?= Router::url("/foto/{$photo['News']['id']}/$member_news_photo_title") ?>">
                                                        <?= $article['News']['title_ind'] ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tab-pane" id="video">
                                <div class="s-video-terkini-container s-foto-video-profile" style="text-align: justify;">
                                    <?php
                                    foreach ($member_news_video as $video) {
                                        $member_news_video_title = seoUrl($video['News']['title_ind']);
                                        ?>
                                        <div class="news-module-ver">
                                            <div class="news-module-ver-img">
                                                <a href="<?= Router::url("/video/{$video['News']['id']}/$member_news_video_title") ?>">
                                                    <img src="<?= str_replace('\\', '/', Router::url("{$video['News']['thumbnail_path']}", true)) ?>" width="100%" height="150px">
                                                </a>
                                                <span class="duration">
                                                    <?php
                                                    App::import("Vendor", "getid3", array('file' => 'getid3/getid3.php'));
                                                    $getid3 = new getID3;
                                                    $getid3->analyze(WWW_ROOT . ltrim($video['News']['video_path'], "/"));
                                                    echo $getid3->info["playtime_string"];
                                                    ?>
                                                </span>
                                            </div>

                                            <div class="news-module-ver-content font-sourceSansPro">
                                                <div class="news-module-ver-etc">
                                                    <div class="news-module-ver-time pull-left">
                                                        Telah dilihat <?= $video['News']['hits'] ?> kali
                                                    </div>
                                                </div>

                                                <div class="news-module-ver-title">
                                                    <a href="<?= Router::url("/video/{$video['News']['id']}/$member_news_video_title") ?>">
                                                        <?= $video['News']['title_ind'] ?>
                                                    </a>
                                                </div>
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
                <div class="tab-pane" id="m-ep">
                    <div class="s-container-573" style="border-left: 2px solid #bfbdbd; padding-left: 15px;">
                        <!-- ------------------ EDIT PROFILE ------------------  -->
                        <?php
                        echo $this->Form->create('Account', array('action' => 'edit_profile', 'type' => 'post'));
                        ?>
                        <div class="form-group">
                            <?php
                            $unlock = "";
                            if (!empty($this->Session->read("credential.member.User.username"))) {
                                $unlock = "readonly";
                            }
                            ?>
                            <label>Username</label>
                            <input type="text" class="form-control" id="" placeholder="Username" name="data[User][username]" value="<?= $this->Session->read("credential.member.User.username") ?>" <?= $unlock ?>>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="" placeholder="email@email.com" name="data[User][email]" value="<?= $this->Session->read("credential.member.User.email") ?>" readonly>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-5">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" id="" placeholder="First Name" name="data[Biodata][first_name]" value="<?= $this->Session->read("credential.member.Biodata.first_name") ?>">
                                </div>
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-5">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" id="" placeholder="Last Name" name="data[Biodata][last_name]" value="<?= $this->Session->read("credential.member.Biodata.last_name") ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Short Bio</label>
                            <textarea class="form-control" name="data[Biodata][biography]" placeholder="Short Biography"><?= $this->Session->read("credential.member.Biodata.biography") ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Birthday</label>
                            <input type="text" class="form-control datepicker" id="" placeholder="Birthday" name="data[Biodata][birth_date]" value="<?= $this->Session->read("credential.member.Biodata.birth_date") ?>">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <span class="clearfix"></span>
                            <?php
                            $checked_pria = "";
                            $checked_wanita = "";
                            if ($this->Session->read("credential.member.Biodata.gender_id") == 1) {
                                $checked_pria = "checked";
                            } else {
                                $checked_wanita = "checked";
                            }
                            ?>
                            <label class="radio-inline">
                                <input type="radio" id="inlineRadio1" value="1" name="data[Biodata][gender_id]" <?= $checked_pria ?>> Pria
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="inlineRadio2" value="2" name="data[Biodata][gender_id]" <?= $checked_wanita ?>> Wanita
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" id="" placeholder="08783210xxxx" name="data[Biodata][phone]" value="<?= $this->Session->read("credential.member.Biodata.phone") ?>" onkeydown="return (event.which >= 48 && event.which <= 57) || event.which == 8 || event.which == 46;">
                        </div>
                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="password" class="form-control" id="" placeholder="" name="data[User][current_password]">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="" placeholder="" name="data[User][password]">
                        </div>
                        <div class="form-group">
                            <label>Re-Type New Password</label>
                            <input type="password" class="form-control" id="" placeholder="" name="data[User][retype_password]">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-info" value="save" style="background: #ff6600;">Simpan Perubahan</button>
                            <button type="reset" class="btn btn-default" value="reset">Batal</button>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
                <div class="tab-pane" id="m-kb">
                    <div class="s-container-573" style=" padding-left: 15px;">
                        <!-- ------------------ Kirim Berita Artikel ------------------  -->
                        <div class="form-horizontal">
                            <?php
                            echo $this->Form->create("News", array("action" => "add_news_article", "type" => "file", "id" => "form1"));
                            ?>
                            <div style="background: #f3f3f3; padding: 15px;">

                                <div class="form-group">
                                    <div class="col-xs-3 profile-label">
                                        <label class="control-label">Judul Berita</label>
                                    </div>
                                    <div class="col-xs-9">
                                        <input type="text" class="form-control profile-input" id="" placeholder="" name="data[News][title_ind]">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-3 profile-label">
                                        <label class="control-label">Kategori Berita</label>
                                    </div>
                                    <div class="col-xs-9">
                                        <select class="form-control profile-input" name="data[News][news_category_id]">
                                            <option value="">- Pilih Kategori Berita -</option>
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
                                <div class="form-group">
                                    <div class="col-xs-3 profile-label">
                                        <label class="control-label">Kata Kunci Berita</label>
                                    </div>
                                    <div class="col-xs-9">
                                        <input type="text" class="form-control profile-input" id="" placeholder="" name="data[News][meta_key]">
                                        <span class="clearfix"></span>
                                        <span style="font-style: italic;">Tuliskan Kata Kunci Berita dan Pisahkan dengan Tanda (,) Koma </span>
                                    </div>
                                </div>
                            </div>

                            <div style="background: #f3f3f3; padding: 5px; display: inline-block; margin-top: 10px;"> <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/isi-berita.png", true) ?>">&nbsp; Isi Berita</div>
                            <div style="background: #f3f3f3; padding: 15px;">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->input("News.content_ind", array("type" => "textarea", "div" => array("class" => "col-xs-12"), "label" => false, "class" => "form-control ckeditor-fix"));
                                    ?>
                                </div>
                            </div>
                            <div style="width: 245px; position: absolute; top: 49px; right: -259px; background: #f3f3f3; padding: 10px;">
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label class="control-label">Upload Foto </label>
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="file" class="control-label" id="" placeholder="" name="data[NewsImage][0][gambar]" accept="image/*">
                                    </div>
                                </div>
                                <div class="area-tambah-foto">
                                </div>

                                <div style="font-size: 12px; ">
                                    Keterangan :<br/>
                                    1. Upload File Type : jpg, jpeg, png, gif<br/>
                                    2. Upload File Maksimum Ukuran : 10 MB
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-xs-12 text-center">
                                <button type="submit" class="btn btn-success" style="padding-left: 30px; padding-right: 30px;">
                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/profile-pen.png", true) ?>" height="14px" style="margin-right: 10px; margin-top: -3px;">
                                    Save
                                </button>
                                <button type="reset" class="btn btn-default" style="padding-left: 30px; padding-right: 30px;">
                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/profile-x.png", true) ?>" height="14px" style="margin-right: 10px; margin-top: -3px;">
                                    Cancel
                                </button>
                            </div>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
                <div class="tab-pane" id="m-kbf">
                    <div class="s-container-573" style=" padding-left: 15px;">
                        <!-- ------------------ Kirim Berita FOTO ------------------  -->
                        <div class="form-horizontal">
                            <?php
                            echo $this->Form->create("News", array("action" => "front_add_news_photo", "type" => "file", "id" => "form2"));
                            ?>                            
                            <div style="background: #f3f3f3; padding: 15px;">

                                <div class="form-group">
                                    <div class="col-xs-3  profile-label">
                                        <label class="control-label">Judul Berita</label>
                                    </div>
                                    <div class="col-xs-9">
                                        <input type="text" class="form-control profile-input" id="" placeholder="" name="data[News][title_ind]">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-3  profile-label">
                                        <label class="control-label">Kategori Berita</label>
                                    </div>
                                    <div class="col-xs-9">
                                        <select class="form-control profile-input" name="data[News][news_category_id]">
                                            <option value="">- Pilih Kategori Berita -</option>
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
                                <div class="form-group">
                                    <div class="col-xs-3  profile-label">
                                        <label class="control-label">Kata Kunci Berita</label>
                                    </div>
                                    <div class="col-xs-9">
                                        <input type="text" class="form-control profile-input" id="" placeholder="" name="data[News][meta_key]">
                                        <span class="clearfix"></span>
                                        <span style="font-style: italic;">Tuliskan Kata Kunci Berita dan Pisahkan dengan Tanda (,) Koma </span>
                                    </div>
                                </div>                                
                            </div>

                            <div style="background: #f3f3f3; padding: 5px; display: inline-block; margin-top: 10px;"> <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/isi-berita.png", true) ?>">&nbsp; Isi Berita</div>
                            <div style="background: #f3f3f3; padding: 15px;">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->input("News.content_indo", array("type" => "textarea", "div" => array("class" => "col-xs-12"), "label" => false, "class" => "form-control ckeditor-fix"));
                                    ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contentUpload">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding: 18px 15px 5px 15px;">
                                                <div>Upload Foto</div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding: 10px 15px 10px 15px;">
                                                <div class="form-group" style="margin-bottom: 0px;">
                                                    <div class="" style="float: right;">
                                                        <span style="" id="photo-uploader-content-button">		
                                                            <noscript>			
                                                            <p>Please enable JavaScript to use file uploader.</p>
                                                            <!-- or put a simple form for upload here -->
                                                            </noscript>         
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 qq-upload-list" id="photo-uploader-content-list" style="padding: 10px 15px 15px 15px;">
                                            <div class="col-md-12 col-sm-12 col-xs-12 "style="border-bottom: 1px solid #BDBDBD; margin-bottom: 5px;">
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    Gambar
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    Deskripsi
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    Default
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    Aksi
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-xs-12 text-center">
                                    <button type="submit" class="btn btn-success" style="padding-left: 30px; padding-right: 30px;">
                                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/profile-pen.png", true) ?>" height="14px" style="margin-right: 10px; margin-top: -3px;">
                                        Save
                                    </button>
                                    <button type="reset" class="btn btn-default" style="padding-left: 30px; padding-right: 30px;">
                                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/profile-x.png", true) ?>" height="14px" style="margin-right: 10px; margin-top: -3px;">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="m-kbv">
                    <div class="s-container-573" style=" padding-left: 15px;">
                        <!-- ------------------ Kirim Berita Video ------------------  -->
                        <div class="form-horizontal">
                            <?php
                            echo $this->Form->create("News", array("action" => "add_news_video", "type" => "file", "id" => "form3"));
                            ?>
                            <div style="background: #f3f3f3; padding: 15px;">
                                <div class="form-group">
                                    <div class="col-xs-3 profile-label">
                                        <label class="control-label">Judul Berita</label>
                                    </div>
                                    <div class="col-xs-9">
                                        <input type="text" class="form-control profile-input" id="" placeholder="" name="data[News][title_ind]">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-3 profile-label">
                                        <label class="control-label">Kategori Berita</label>
                                    </div>
                                    <div class="col-xs-9">
                                        <select class="form-control profile-input" name="data[News][news_category_id]">
                                            <option value="">- Pilih Kategori Berita -</option>
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
                                <div class="form-group">
                                    <div class="col-xs-3 profile-label">
                                        <label class="control-label">Kata Kunci Berita</label>
                                    </div>
                                    <div class="col-xs-9">
                                        <input type="text" class="form-control profile-input" id="" placeholder="" name="data[News][meta_key]">
                                        <span class="clearfix"></span>
                                        <span style="font-style: italic;">Tuliskan Kata Kunci Berita dan Pisahkan dengan Tanda (,) Koma </span>
                                    </div>
                                </div>                                
                            </div>

                            <div style="background: #f3f3f3; padding: 5px; display: inline-block; margin-top: 10px;"> <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/isi-berita.png", true) ?>">&nbsp; Isi Berita</div>
                            <div style="background: #f3f3f3; padding: 15px;">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->input("News.content_indonesia", array("type" => "textarea", "div" => array("class" => "col-xs-12"), "label" => false, "class" => "form-control ckeditor-fix"));
                                    ?>
                                </div>
                            </div>
                            <div style="width: 245px; position: absolute; top: 49px; right: -259px; background: #f3f3f3; padding: 10px;">
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label class="control-label">Upload Video</label>
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="file" class="control-label" id="" placeholder="" name="data[News][0][video]" accept="video/*">
                                    </div>
                                </div>
                                <div class="area-tambah-video">
                                </div>
                                <div style="font-size: 12px; ">
                                    Keterangan :<br/>
                                    1. Upload File Type : mp4, flv, mkv, wmv<br/>
                                    2. Upload File Maksimum Ukuran : 1 GB
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-xs-12 text-center">
                                    <button type="submit" class="btn btn-success" style="padding-left: 30px; padding-right: 30px;">
                                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/profile-pen.png", true) ?>" height="14px" style="margin-right: 10px; margin-top: -3px;">
                                        Save
                                    </button>
                                    <button type="reset" class="btn btn-default" style="padding-left: 30px; padding-right: 30px;">
                                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/profile-x.png", true) ?>" height="14px" style="margin-right: 10px; margin-top: -3px;">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <span class="clearfix"></span>

        <!-- Adv Middle Top -->
        <!--==================================================-->
        <?php
        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 2]);
        ?>
</section>
<script>
    $(document).ready(function () {
        loadckeditor();
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

    $("#file").on("change", function () {
        var fileName = $(this).val();
        if (fileName) {
            $("#changeCover").submit();
        } else {
            alert("Silahkan pilih gambar yang ingin diupload.");
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
    })
</script>

<script src="<?php echo Router::url('/', true); ?>js/file_uploader/client/fileuploader.js" type="text/javascript"></script>
<link href="<?php echo Router::url('/', true); ?>js/file_uploader/client/fileuploader-product.css" rel="stylesheet" type="text/css">
<script>
    var count = 0;
    function createUploaderContentThumbnail() {
        var uploader = new qq.FileUploader({
            element: document.getElementById('photo-uploader-content-button'),
            listElement: document.getElementById('photo-uploader-content-list'),
            action: BASE_URL + '/news/upload_image',
            allowedExtensions: ['bmp', 'jpg', 'jpeg', 'png'],
            debug: true,
            maxConnections: 1,
            fileTemplate: '<div class="col-md-12 col-sm-12 col-xs-12">' +
                    '<div class="col-md-3 col-sm-3 col-xs-3">' +
                    '<span class="qq-upload-file hidden"></span>' +
                    '<span class="qq-upload-spinner"></span>' +
                    '<span class="qq-upload-size hidden"></span>' +
                    '<a class="qq-upload-cancel" href="#" onclick="hapusRow(this)">Cancel</a>' +
                    '<a class="qq-upload-remove" href="#" onclick="hapusRow(this)">Hapus</a>' +
                    '<span class="qq-upload-failed-text" style="color: red">Gagal</span>' +
                    '</div></div>',
            template: '<div class="qq-uploader">' +
                    '<div class="qq-upload-drop-area"><span>Drop file disini untuk mengupload file</span></div>' +
                    '<div style="width:75px; height:35px;"class="qq-upload-button">Upload</div>' +
                    '<div class="qq-upload-list"></div>' +
                    '</div>',
            onComplete: function (id, fileName, responseJSON) {
                if (responseJSON.error === undefined) {
                    var src = BASE_URL + responseJSON.src || '<?php echo Router::url("/img/no_image.jpg"); ?>';
                    $('#photo-uploader-content-list .qq-upload-success').eq(id).prepend('<div class="col-md-3 col-sm-3 col-xs-3"><img src="' + src + '" width="100" name="data[NewsImage][' + count + '][gambar]"></div><div class="col-md-3 col-sm-3 col-xs-3"><input class="form-control" type="text" maxlength="50" name="data[NewsImage][' + count + '][description]"></div><div class="col-md-3 col-sm-3 col-xs-3"><input value="0" class="gallery_photo_default" type="checkbox" name=""><input value="0" class="gallery_photo_default" type="hidden" name="data[NewsImage][' + count + '][default_image]"></div><input type="hidden" value="' + responseJSON.src + '" name="data[NewsImage][' + count + '][path]">');
                    $('#buttonSubmitForm').removeAttr('disabled');
                    $('#buttonSubmitForm').removeAttr('style');
                    count++;
                } else {
                    setTimeout($('.qq-upload-fail').remove(), 2000);
                }
                toggleCheckbox();
            },
            onRemove: function (serverIndex) {
                alert('File berhasil dihapus');
                toggleCheckbox();
            },
            onProgress: function (id, fileName, loaded, total) {
                $('#buttonSubmitForm').attr('style', 'background: #c0c0c0');
                $('#buttonSubmitForm').attr('disabled', true);
            }
        });
    }
    createUploaderContentThumbnail();
    function hapusRow(e) {
        if (confirm("Anda yakin menghapus data ini?")) {
            $(e).closest(".row").remove();
        }
    }

    $(document).ready(function () {
        toggleCheckbox();
    })

    function toggleCheckbox() {
        $(".gallery_photo_default").on("click", function () {
            $(".gallery_photo_default").prop("checked", false).prop("value", 0);
            $(this).prop("checked", true).prop("value", 1).siblings().prop("value", 1);
        })
    }
</script>
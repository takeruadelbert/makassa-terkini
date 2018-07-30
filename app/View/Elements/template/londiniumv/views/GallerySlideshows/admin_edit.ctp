<?php echo $this->Form->create("GallerySlideshow", array("class" => "form-horizontal form-separate", "action" => "edit", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Ubah Slideshow Galeri Foto") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Slideshow Galeri Foto")?></h6>
                        </div>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->label("GallerySlideshow.name", __("Nama Slideshow"), array("class" => "col-sm-3 col-md-4 control-label"));
                                        echo $this->Form->input("GallerySlideshow.name", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                        ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background:#2179cc">
                                        <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Slideshow Berita")?></h6>
                                    </div>
                                    <div class="panel-body">
				        <div class="form-group">
                                            <div class="col-md-5">
                                                <?php
                                                echo $this->Form->label("Dummy.0.news_category_id", __("Kategori Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("Dummy.0.news_category_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control news-title-photo", "empty" => "-- Pilih Kategori Berita --", "data-news-title-photo-target" => ".news-title-photo-target", "value" => $this->data['GallerySlideshowDetail'][0]['News']['NewsCategory']['id']));
                                                ?>
                                            </div>
                                            <div class="col-md-5">
                                                <label class="col-sm-3 col-md-4 control-label">Judul Berita</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <select class="form-control news-title-photo-target" name="data[GallerySlideshowDetail][0][news_id]">
                                                        <?php
                                                        $selected1 = "";
                                                        $news1 = ClassRegistry::init("News")->find("all",[
                                                            "conditions" => [
                                                                "News.news_category_id" => $this->data['GallerySlideshowDetail'][0]['News']['news_category_id'],
                                                                "News.news_type_id" => 2,
                                                            ],
                                                        ]);
                                                        foreach($news1 as $title1) {
                                                            if($title1['News']['id'] == $this->data['GallerySlideshowDetail'][0]['News']['id']) {
                                                                $selected1 = "selected";
                                                            } else {
                                                                $selected1 = "";
                                                            }
                                                        ?>
                                                            <option value="<?= $title1['News']['id'] ?>" <?= $selected1 ?>><?= $title1['News']['title_ind'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                            echo $this->Form->input("GallerySlideshowDetail.0.id", array("type" => "hidden", "class" => "form-control"));
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <?php
                                                $checked = "";
                                                $class="";
                                                if($this->data['GallerySlideshowDetail']['0']['is_primary'] == 1) {
                                                    $checked = "checked";
                                                    $class="class='marked'";
                                                }
                                                ?>
                                                <label class="checkbox-inline checkbox-success">
                                                    <input type="checkbox" <?=$class?> id="checkbox1" name="data[GallerySlideshowDetail][0][is_primary]" value="<?= $checked == "" ? "0" : "1" ?>" onclick="addClassCheck(this)" <?= $checked ?>> <b>Default Primary</b> &nbsp;
                                                    <input type="hidden" id="checkbox1-hidden" name="data[GallerySlideshowDetail][0][is_primary]" value="0" disabled>
                                                    <input type="hidden" id="checkbox1-hidden1" name="data[GallerySlideshowDetail][0][is_primary]" value="1" disabled>
                                                </label>
                                            </div>
				        </div>
                                        <div class="form-group">
                                            <div class="col-md-5">
                                                <?php
                                                echo $this->Form->label("Dummy.1.news_category_id", __("Kategori Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("Dummy.1.news_category_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control news-title-photo2", "empty" => "-- Pilih Kategori Berita --", "data-news-title-photo2-target" => ".news-title-photo2-target", "value" => $this->data['GallerySlideshowDetail'][1]['News']['NewsCategory']['id']));
                                                ?>
                                            </div>
                                            <div class="col-md-5">
                                                <label class="col-sm-3 col-md-4 control-label">Judul Berita</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <select class="form-control news-title-photo2-target" name="data[GallerySlideshowDetail][1][news_id]">
                                                        <?php
                                                        $selected2 = "";
                                                        $news2 = ClassRegistry::init("News")->find("all",[
                                                            "conditions" => [
                                                                "News.news_category_id" => $this->data['GallerySlideshowDetail'][1]['News']['news_category_id'],
                                                                "News.news_type_id" => 2,
                                                            ],
                                                        ]);
                                                        foreach($news2 as $title2) {
                                                            if($title2['News']['id'] == $this->data['GallerySlideshowDetail'][1]['News']['id']) {
                                                                $selected2 = "selected";
                                                            } else {
                                                                $selected2 = "";
                                                            }
                                                        ?>
                                                            <option value="<?= $title2['News']['id'] ?>" <?= $selected2 ?>><?= $title2['News']['title_ind'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                            echo $this->Form->input("GallerySlideshowDetail.1.id", array("type" => "hidden", "class" => "form-control"));
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <?php
                                                $checked = "";
                                                $class="";
                                                if($this->data['GallerySlideshowDetail']['1']['is_primary'] == 1) {
                                                    $checked = "checked";
                                                    $class="class='marked'";
                                                }
                                                ?>
                                                <label class="checkbox-inline checkbox-success">
                                                    <input type="checkbox" <?=$class?> id="checkbox2" name="data[GallerySlideshowDetail][1][is_primary]" value="<?= $checked == "" ? "0" : "1" ?>" onclick="addClassCheck(this)" <?= $checked ?>> <b>Default Primary</b> &nbsp;
                                                    <input type="hidden" id="checkbox2-hidden" name="data[GallerySlideshowDetail][1][is_primary]" value="0" disabled>
                                                    <input type="hidden" id="checkbox2-hidden2" name="data[GallerySlideshowDetail][1][is_primary]" value="1" disabled>
                                                </label>
                                            </div>
				        </div>
                                        <div class="form-group">
                                            <div class="col-md-5">
                                                <?php
                                                echo $this->Form->label("Dummy.2.news_category_id", __("Kategori Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("Dummy.2.news_category_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control news-title-photo3", "empty" => "-- Pilih Kategori Berita --", "data-news-title-photo3-target" => ".news-title-photo3-target", "value" => $this->data['GallerySlideshowDetail'][2]['News']['NewsCategory']['id']));
                                                ?>
                                            </div>
                                            <div class="col-md-5">
                                                <label class="col-sm-3 col-md-4 control-label">Judul Berita</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <select class="form-control news-title-photo3-target" name="data[GallerySlideshowDetail][2][news_id]">
                                                        <?php
                                                        $selected3 = "";
                                                        $news3 = ClassRegistry::init("News")->find("all",[
                                                            "conditions" => [
                                                                "News.news_category_id" => $this->data['GallerySlideshowDetail'][2]['News']['news_category_id'],
                                                                "News.news_type_id" => 2,
                                                            ],
                                                        ]);
                                                        foreach($news3 as $title3) {
                                                            if($title3['News']['id'] == $this->data['GallerySlideshowDetail'][2]['News']['id']) {
                                                                $selected3 = "selected";
                                                            } else {
                                                                $selected3 = "";
                                                            }
                                                        ?>
                                                            <option value="<?= $title3['News']['id'] ?>" <?= $selected3 ?>><?= $title3['News']['title_ind'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                            echo $this->Form->input("GallerySlideshowDetail.2.id", array("type" => "hidden", "class" => "form-control"));
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <?php
                                                $checked = "";
                                                $class="";
                                                if($this->data['GallerySlideshowDetail']['2']['is_primary'] == 1) {
                                                    $checked = "checked";
                                                    $class="class='marked'";
                                                }
                                                ?>
                                                <label class="checkbox-inline checkbox-success">
                                                    <input type="checkbox" <?=$class?> id="checkbox3" name="data[GallerySlideshowDetail][2][is_primary]" value="<?= $checked == "" ? "0" : "1" ?>" onclick="addClassCheck(this)" <?= $checked ?>> <b>Default Primary</b> &nbsp;
                                                    <input type="hidden" id="checkbox3-hidden" name="data[GallerySlideshowDetail][2][is_primary]" value="0" disabled>
                                                    <input type="hidden" id="checkbox3-hidden3" name="data[GallerySlideshowDetail][2][is_primary]" value="1" disabled>
                                                </label>
                                            </div>
				        </div>
				    </div>
				</div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->label("GallerySlideshow.slideshow_type_id", __("Tipe Slideshow"), array("class" => "col-sm-3 col-md-4 control-label"));
                                        echo $this->Form->input("GallerySlideshow.slideshow_type_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "empty" => "-- Pilih Tipe Slideshow --"));
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->label("GallerySlideshow.showing_status_id", __("Status Slideshow"), array("class" => "col-sm-3 col-md-4 control-label"));
                                        echo $this->Form->input("GallerySlideshow.showing_status_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control  news-title", "empty" => "-- Pilih Status Slideshow --"));
                                        ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <div class="form-actions text-center">
                        <input name="Button" type="button" onclick="history.go(-1);" class="btn btn-success" value="<?= __("Kembali")?>">
                        <input type="reset" value="Reset" class="btn btn-info">
                        <input type="submit" value="<?= __("Simpan")?>" class="btn btn-danger">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Form->end() ?>

<script>
    function addClassCheck(element){

        if(element.checked){
            element.classList.add("marked");
        }else{
            element.classList.remove("marked");
        }

        if(document.getElementsByClassName("marked").length>1){
          alert("Silahkan pilih salah satu saja.");
            element.checked=false;
            element.classList.remove("marked");
        }

    }    
</script>
<script>
    $(document).ready(function() {
        $("#checkbox1").change(function() {
            if($('#checkbox1').is(':checked')) {
                $('#checkbox1-hidden').attr("disabled", "true");
                $('#checkbox1-hidden1').removeAttr("disabled");
            } else {
                $('#checkbox1-hidden').removeAttr("disabled");
                $('#checkbox1-hidden1').attr("disabled","true");
            }
        });

        $("#checkbox2").change(function() {
            if($('#checkbox2').is(':checked')) {
                $('#checkbox2-hidden').attr("disabled", "true");
                $('#checkbox2-hidden2').removeAttr("disabled");
            } else {
                $('#checkbox2-hidden').removeAttr("disabled");
                $('#checkbox2-hidden2').attr("disabled","true");
            }
        });

        $("#checkbox3").change(function() {
            if($('#checkbox3').is(':checked')) {
                $('#checkbox3-hidden').attr("disabled", "true");
                $('#checkbox3-hidden3').removeAttr("disabled");
            } else {
                $('#checkbox3-hidden').removeAttr("disabled");
                $('#checkbox3-hidden3').attr("disabled","true");
            }
        });
    });
</script>
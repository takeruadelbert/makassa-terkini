<?php echo $this->Form->create("News", array("class" => "form-horizontal form-separate", "type" => "file", "action" => "edit_news_article", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Ubah Berita Artikel") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <div class="panel-heading" style="background:#2179cc">
                        <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Berita Artikel") ?></h6>
                    </div>
                    <div class="well block">
                        <div class="tabbable">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#default-tab1" data-toggle="tab">Berita Bahasa Indonesia</a></li>
                                <li><a href="#default-tab2" data-toggle="tab">Berita Bahasa Inggris</a></li>
                            </ul>
                            <div class="tab-content with-padding">
                                <div class="tab-pane fade in active" id="default-tab1">
                                    <table width="100%" class="table">
                                        <tr>
                                            <td colspan="3" style="width:200px">
                                                <div class="form-group">
                                                    <?php
                                                    echo $this->Form->label("News.title_ind", __("Judul"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                    echo $this->Form->input("News.title_ind", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="width:200px">
                                                <div class="form-group">
                                                    <?php
                                                    echo $this->Form->label("News.sinopsys_ind", __("Sinopsis"), array("class" => "col-sm-8 control-label"));
                                                    echo $this->Form->input("News.sinopsys_ind", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix"));
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="width:200px">
                                                <div class="form-group">
                                                    <?php
                                                    echo $this->Form->label("News.content_ind", __("Konten"), array("class" => "col-sm-8 control-label"));
                                                    echo $this->Form->input("News.content_ind", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix"));
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="default-tab2">
                                    <table width="100%" class="table">
                                        <tr>
                                            <td colspan="3" style="width:200px">
                                                <div class="form-group">
                                                    <?php
                                                    echo $this->Form->label("News.title_en", __("Judul"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                    echo $this->Form->input("News.title_en", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="width:200px">
                                                <div class="form-group">
                                                    <?php
                                                    echo $this->Form->label("News.sinopsys_en", __("Sinopsis"), array("class" => "col-sm-8 control-label"));
                                                    echo $this->Form->input("News.sinopsys_en", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix"));
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="width:200px">
                                                <div class="form-group">
                                                    <?php
                                                    echo $this->Form->label("News.content_en", __("Konten"), array("class" => "col-sm-8 control-label"));
                                                    echo $this->Form->input("News.content_en", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix"));
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <table width="100%" class="table">
                            <tr>
                                <td colspan="3" style="width:200px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php
                                                echo $this->Form->label("News.news_category_id", __("Kategori Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("News.news_category_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "empty" => "-- Pilih Kategori --"));
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php
                                                echo $this->Form->label("News.meta_key", __("Kata Kunci"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("News.meta_key", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="width:200px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php
                                                echo $this->Form->label("News.author_id", __("Author"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("News.author_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled", "type" => "text", "value" => $this->data['Author']['Biodata']['full_name']));
                                                echo $this->Form->input("News.author_id", array("type" => "hidden", "class" => "form-control", "value" => $this->data['News']['author_id']));
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php
                                                if (empty($this->data['Editor']['id'])) {
                                                    if($this->Session->read("credential.admin.User.UserGroup.name") != 'author') {
                                                        echo $this->Form->label("News.editor_id", __("Editor"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                        echo $this->Form->input("News.editor_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled", "type" => "text", "value" => $this->Session->read("credential.admin.Biodata.full_name")));
                                                        echo $this->Form->input("News.editor_id", array("type" => "hidden", "class" => "form-control", "value" => $this->Session->read("credential.admin.Account.id")));
                                                    } else {
                                                        echo $this->Form->label("News.editor_id", __("Editor"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                        echo $this->Form->input("News.editor_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled", "type" => "text"));
                                                    }
                                                } else {
                                                    echo $this->Form->label("News.editor_id", __("Editor"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                    echo $this->Form->input("News.editor_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled", "type" => "text", "value" => $this->data['Editor']['Biodata']['full_name']));
                                                    echo $this->Form->input("News.editor_id", array("type" => "hidden", "class" => "form-control", "value" => $this->data['News']['editor_id']));
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="width:200px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php
                                                if (empty($this->data['Publisher']['id'])) {
                                                    if($this->Session->read("credential.admin.User.UserGroup.name") == 'publisher' || $this->Session->read("credential.admin.User.UserGroup.name") == 'editor dan publisher') {
                                                        echo $this->Form->label("News.publisher_id", __("Publisher"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                        echo $this->Form->input("News.publisher_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled", "type" => "text", "value" => $this->Session->read("credential.admin.Biodata.full_name")));
                                                        echo $this->Form->input("News.publisher_id", array("type" => "hidden", "class" => "form-control", "value" => $this->Session->read("credential.admin.Account.id")));
                                                    } else {
                                                        echo $this->Form->label("News.publisher_id", __("Publisher"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                        echo $this->Form->input("News.publisher_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled", "type" => "text"));
                                                    }
                                                } else {
                                                    echo $this->Form->label("News.publisher_id", __("Publisher"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                    echo $this->Form->input("News.publisher_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled", "type" => "text", "value" => $this->data['Publisher']['Biodata']['full_name']));
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php
                                                echo $this->Form->label("News.keterangan", __("Keterangan"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("News.keterangan", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="width:200px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php
                                                echo $this->Form->label("NewsImage.0.gambar", __("Foto Artikel"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("NewsImage.0.gambar", array("type" => "file", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "accept" => "image/*"));
                                                echo $this->Form->input("NewsImage.0.id", array("type" => "hidden", "class" => "form-control"));
                                                ?>
                                                <div class="col-md-4"> </div>
                                                <div class="col-md-8">
                                                    <img id="gambar" src = "<?php echo Router::url($this->data['News']['thumbnail_path'], true) ?>" type="file" width="100"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php
                                                echo $this->Form->label("News.thumbnail_description", __("Deskripsi Foto Artikel"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("News.thumbnail_description", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="width:200px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="checkbox-inline checkbox-success">
                                                    <?php
                                                    for ($i = 0; $i < 5; $i++) {
                                                        echo "&nbsp;";
                                                    }
                                                    ?>
                                                    <b>Berita Rekomendasi</b>
                                                    <?php
                                                    for ($i = 0; $i < 9; $i++) {
                                                        echo "&nbsp; &nbsp; &nbsp;";
                                                    }

                                                    $checked = "";
                                                    if ($this->data['News']['is_recommended'] == 1) {
                                                        $checked = "checked";
                                                    }
                                                    ?>
                                                    <input type="checkbox" class="styled" name="data[News][is_recommended]" value='<?= $checked == "" ? "0" : "1" ?>' id="newsRecommended" <?= $checked ?>>
                                                    <input type="hidden" name="data[News][is_recommended]" value="1" id="newsRecommendedHidden1" disabled>
                                                    <input type="hidden" name="data[News][is_recommended]" value="0" id="newsRecommendedHidden2" disabled>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="checkbox-inline checkbox-success">
                                                    <?php
                                                    for ($i = 0; $i < 5; $i++) {
                                                        echo "&nbsp;";
                                                    }
                                                    ?>
                                                    <b>Sponsor</b>
                                                    <?php
                                                    for ($i = 0; $i < 9; $i++) {
                                                        echo "&nbsp; &nbsp; &nbsp; &nbsp;";
                                                    }

                                                    $checked = "";
                                                    if ($this->data['News']['is_sponsor'] == 1) {
                                                        $checked = "checked";
                                                    }
                                                    ?>
                                                    <input type="checkbox" class="styled" name="data[News][is_sponsor]" value='<?= $checked == "" ? "0" : "1" ?>' id="newsSponsor" <?= $checked ?>>
                                                    <input type="hidden" name="data[News][is_sponsor]" value="1" id="newsSponsorHidden1" disabled>
                                                    <input type="hidden" name="data[News][is_sponsor]" value="0" id="newsSponsorHidden2" disabled>  
                                                </label>
                                            </div>
                                        </div>                                        
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="width:200px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php
                                                echo $this->Form->label("News.news_date", __("Tanggal & Waktu Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("News.news_date", array("type" => "text", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control datetime"));
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <div class="form-actions text-center">
                        <input name="Button" type="button" onclick="history.go(-1);" class="btn btn-success" value="<?= __("Kembali") ?>">
                        <input type="reset" value="Reset" class="btn btn-info">
                        <input type="submit" value="<?= __("Simpan") ?>" class="btn btn-danger">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Form->end() ?>

<script>
    $(document).ready(function () {
        $('#newsRecommended').change(function () {
            if ($('#newsRecommended').is(':checked')) {
                $('#newsRecommendedHidden2').attr("disabled", true);
                $('#newsRecommendedHidden1').removeAttr("disabled");
            } else {
                $('#newsRecommendedHidden1').attr("disabled", true);
                $('#newsRecommendedHidden2').removeAttr("disabled");
            }
        });
        
        $('#newsSponsor').change(function () {
            if ($('#newsSponsor').is(':checked')) {
                $('#newsSponsorHidden2').attr("disabled", true);
                $('#newsSponsorHidden1').removeAttr("disabled");
            } else {
                $('#newsSponsorHidden1').attr("disabled", true);
                $('#newsSponsorHidden2').removeAttr("disabled");
            }
        });
//        $('#gambar').change(function() {
//            
//        })l
    });
</script>
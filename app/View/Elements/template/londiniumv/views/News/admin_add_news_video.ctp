<?php echo $this->Form->create("News", array("class" => "form-horizontal form-separate", "type"=>"file", "action" => "add_news_video", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Tambah Berita Video") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <div class="panel-heading" style="background:#2179cc">
                        <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Berita Video")?></h6>
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
                                                    echo $this->Form->label("News.content_en", __("Konten"), array("class" => "col-sm-8control-label"));
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
                                                echo $this->Form->input("News.author_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "type" => "text", "disabled", "value" => $this->Session->read("credential.admin.Biodata.full_name")));
                                                echo $this->Form->input("News.author_id", array("type" => "hidden", "class" => "form-control", "value" => $this->Session->read("credential.admin.Account.id")));
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php
                                                echo $this->Form->label("News.editor_id", __("Editor"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("News.editor_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "type" => "text", "readonly"));
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
                                                echo $this->Form->label("News.publisher_id", __("Publisher"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("News.publisher_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "type" => "text", "readonly"));
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
                                                <label class="checkbox-inline checkbox-success">
                                                    <?php
                                                        for($i = 0; $i < 5; $i++) {
                                                            echo "&nbsp;";
                                                        }
                                                    ?>
                                                    <b>Berita Rekomendasi</b>
                                                    <?php
                                                    for($i = 0; $i < 9; $i++) {
                                                        echo "&nbsp; &nbsp; &nbsp;";
                                                    }
                                                    ?>
                                                    <input type="checkbox" class="styled" name="data[News][is_recommended]" value='1' id="newsRecommended">
                                                </label>
                                            </div>
                                        </div>
                                        <div class = "col-md-6">
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
                                                    ?>
                                                    <input type="checkbox" class="styled" name="data[News][is_sponsor]" value='1' id="newsSponsor">
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
                                                echo $this->Form->label("News.0.video", __("Video"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("News.0.video", array("type" => "file", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "accept" => "video/*"));
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php
                                                echo $this->Form->label("News.0.gambar", __("Thumbnail Foto"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("News.0.gambar", array("type" => "file", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "accept" => "image/*"));
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
                                                echo $this->Form->label("News.news_date", __("Tanggal & Waktu Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("News.news_date", array("type" => "text", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control datetime", "value" => date("Y-m-d H:i:s")));
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php
                                                echo $this->Form->label("News.thumbnail_description", __("Deskripsi Thumbnail Foto"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("News.thumbnail_description", array("type" => "text", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
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
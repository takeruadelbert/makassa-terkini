<?php echo $this->Form->create("News", array("class" => "form-horizontal form-separate", "type" => "file", "action" => "add_news_photo", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Tambah Berita Foto") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <div class="panel-heading" style="background:#2179cc">
                        <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Berita Foto") ?></h6>
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
                                                echo $this->Form->label("News.news_date", __("Tanggal & Waktu Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("News.news_date", array("type" => "text", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control datetime", "value" => date("Y-m-d H:i:s")));
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h6 class="panel-title"><i class="icon-upload"></i><?= __("Upload Foto") ?></h6>
                                <div class="">
                                    <span style="" id="file-uploader-content-button">		
                                        <noscript>			
                                        <p>Please enable JavaScript to use file uploader.</p>
                                        <!-- or put a simple form for upload here -->
                                        </noscript>         
                                    </span>
                                </div>
                            </div>

                            <div class="panel-body" id="photo-panel">
                                <div class="block-row qq-upload-list" id="file-uploader-content-list">
                                    <div class="row row-table">
                                        <div class="col-md-3">Gambar</div>
                                        <div class="col-md-3">Deskripsi</div>
                                        <div class="col-md-3">Default</div>
                                        <div class="col-md-3">Aksi</div>
                                    </div>
                                    <?php
                                    $i = 0;
                                    if (!(empty($this->data['NewsImage']))) {
                                        foreach ($this->data['NewsImage'] as $newsImage) {
                                            ?>
                                            <div class="row row-table row-remove-<?php echo $i ?>">
                                                <div class="col-md-3"><img src="<?php echo Router::url($newsImage['path']) ?>" width="100" name="data[NewsImage][<?= $i ?>][gambar]"></div>
                                                <div class="col-md-3"><input value="<?php echo $newsImage['description'] ?>" class="form-control" type="text" maxlength="50" name="data[NewsImage][<?php echo $i ?>][description]"></div>
                                                <div class="col-md-3">
                                                    <input <?php echo $newsImage['default_image'] ? "checked" : "" ?> value="<?php echo $newsImage['default_image'] ?>" class="gallery_photo_default" type="checkbox" name=""/>
                                                    <input <?php echo $newsImage['default_image'] ? "checked" : "" ?> value="<?php echo $newsImage['default_image'] ?>" class="gallery_photo_default" type="hidden" name="data[NewsImage][<?php echo $i ?>][default_image]"/>
                                                </div>
                                                <input type="hidden" value="<?php echo $newsImage['path'] ?>" name="data[NewsImage][<?php echo $i ?>][path]">
                                                <div class="col-md-3"><a class="" onclick="hapusRow(this);">Hapus</a><span class="qq-upload-failed-text" style="color: red">Gagal</span></div>
                                            </div>
                                            <?php
                                            $i++;
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
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

<script src="<?php echo Router::url('/', true); ?>js/file_uploader/client/fileuploader.js" type="text/javascript"></script>
<link href="<?php echo Router::url('/', true); ?>js/file_uploader/client/fileuploader-product.css" rel="stylesheet" type="text/css">
<script>
                            var count = <?= $i ?>;
                            var countHapus = 0;
                            function createUploaderContentThumbnail() {
                                var uploader = new qq.FileUploader({
                                    element: document.getElementById('file-uploader-content-button'),
                                    listElement: document.getElementById('file-uploader-content-list'),
                                    action: BASE_URL + 'admin/news/upload_image',
                                    allowedExtensions: ['bmp', 'jpg', 'jpeg', 'png', 'gif'],
                                    debug: false,
                                    maxConnections: 1,
                                    fileTemplate: '<div class="row row-table">' +
                                            '<div class="col-md-3">' +
                                            '<span class="qq-upload-file hidden"></span>' +
                                            '<span class="qq-upload-spinner"></span>' +
                                            '<span class="qq-upload-size hidden"></span>' +
                                            '<a class="qq-upload-cancel" href="#" onclick="hapusRow(this)">Cancel</a>' +
                                            '<a class="qq-upload-remove" href="#" onclick="hapusRow(this)">Hapus</a>' +
                                            '<span class="qq-upload-failed-text" style="color: red">Gagal</span>' +
                                            '</div></div>',
                                    template: '<div class="qq-uploader">' +
                                            '<div class="qq-upload-drop-area"><span>Drop file disini untuk mengupload file</span></div>' +
                                            '<div class="qq-upload-button">Browse file</div>' +
                                            '<div class="qq-upload-list"></div>' +
                                            '</div>',
                                    onComplete: function (id, fileName, responseJSON) {
                                        if (responseJSON.error === undefined) {
                                            var src = BASE_URL + responseJSON.src || '<?php echo Router::url("/img/no_image.jpg"); ?>';
                                            $('#file-uploader-content-list .qq-upload-success').eq((id - countHapus)).prepend('<div class="col-md-3"><img src="' + src + '" width="100" name="data[NewsImage][' + count + '][gambar]"></div><div class="col-md-3"><input class="form-control" type="text" maxlength="1000" name="data[NewsImage][' + count + '][description]"></div><div class="col-md-3"><input value="0" class="gallery_photo_default" type="checkbox" name=""><input value="0" class="gallery_photo_default" type="hidden" name="data[NewsImage][' + count + '][default_image]"></div><input type="hidden" value="' + responseJSON.src + '" name="data[NewsImage][' + count + '][path]">');
                                            $('#buttonSubmitForm').removeAttr('disabled');
                                            $('#buttonSubmitForm').removeAttr('style');
                                            count++;
                                        } else {
                                            setTimeout($('.qq-upload-fail').remove(), 2000);
                                        }
                                        toggleCheckbox();
                                    },
                                    onRemove: function (serverIndex) {                                        
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
                                    countHapus++;
                                    $(e).closest(".row").remove();
                                    alert('File berhasil dihapus');
                                } else {
                                    $(e).closest(".row").append('<div class="col-md-3"><a class="qq-upload-remove" href="#" onclick="hapusRow(this)">Hapus</a></div>');
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
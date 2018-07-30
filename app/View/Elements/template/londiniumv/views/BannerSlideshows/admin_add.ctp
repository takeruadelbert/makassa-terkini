<?php echo $this->Form->create("BannerSlideshow", array("class" => "form-horizontal form-separate", "type" => "file", "action" => "add", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Tambah Slideshow Banner") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Slideshow Banner") ?></h6>
                        </div>
                        <tr>
                            <td colspan="3" style="width:200px">
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
                                                <div class="col-md-2">Gambar</div>
                                                <div class="col-md-4">URL</div>
                                                <div class="col-md-2">Start Date</div>
                                                <div class="col-md-2">Expired Date</div>
                                                <div class="col-md-2">Aksi</div>
                                            </div>
                                            <?php
                                            $i = 0;
                                            $bannerSlideshows = ClassRegistry::init("BannerSlideshow")->find("all");
                                            if (!empty($bannerSlideshows)) {
                                                foreach ($bannerSlideshows as $banners) {
                                                    ?>
                                                    <div class="row row-table row-remove-<?php echo $i ?> qq-upload-success">
                                                        <div class="col-md-2"><img src="<?php echo Router::url($banners['BannerSlideshow']['path']) ?>" width="100"></div>
                                                        <div class="col-md-4"><input value="<?php echo $banners['BannerSlideshow']['url'] ?>" class="form-control" type="text" maxlength="50" name="data[BannerSlideshow][<?php echo $i ?>][url]"></div>
                                                        <input type="hidden" value="<?php echo $banners['BannerSlideshow']['path'] ?>" name="data[BannerSlideshow][<?php echo $i ?>][path]">
                                                        <input type="hidden" value="<?php echo $banners['BannerSlideshow']['id'] ?>" name="data[BannerSlideshow][<?php echo $i ?>][id]">
                                                        <div class="col-md-2"><input value="<?php echo $banners['BannerSlideshow']['start_date'] ?>" class="form-control datepicker" type="text" maxlength="50" name="data[BannerSlideshow][<?php echo $i ?>][start_date]"></div>
                                                        <div class="col-md-2"><input value="<?php echo $banners['BannerSlideshow']['expired_date'] ?>" class="form-control datepicker" type="text" maxlength="50" name="data[BannerSlideshow][<?php echo $i ?>][expired_date]"></div>
                                                        <div class="col-md-2"><a class="" onclick="hapusGambar(<?php echo $banners['BannerSlideshow']['id'] ?>, '<?php echo Router::url("/admin/bannerSlideshows/delete/") ?>', <?php echo $i ?>);">Hapus</a><span class="qq-upload-failed-text" style="color: red">Gagal</span></div>
                                                    </div>
                                                    <?php
                                                    $i++;
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    $banner = ClassRegistry::init("BannerSlideshow")->find("first");
                                    if(isset($banner) && !empty($banner)) {
                                        echo $this->Form->label("BannerSlideshow.banner_slideshow_status_id", __("Status Banner"), array("class" => "col-sm-3 col-md-4 control-label"));
                                        echo $this->Form->input("BannerSlideshow.banner_slideshow_status_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "value" => $banner['BannerSlideshow']['banner_slideshow_status_id']));
                                    } else {
                                        echo $this->Form->label("BannerSlideshow.banner_slideshow_status_id", __("Status Banner"), array("class" => "col-sm-3 col-md-4 control-label"));
                                        echo $this->Form->input("BannerSlideshow.banner_slideshow_status_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "empty" => "-- Pilih Status Banner --"));
                                    }
                                    ?>
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
                        <input name="Button" type="button" onclick="history.go(-1);" class="btn btn-success" value="<?= __("Kembali") ?>">
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
                                    action: BASE_URL + 'admin/bannerSlideshows/upload_image',
                                    allowedExtensions: ['bmp', 'jpg', 'jpeg', 'png', 'gif'],
                                    debug: false,
                                    fileTemplate: '<div class="row row-table target-append">' +
                                            '<div class="col-md-2">' +
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
                                            $('#file-uploader-content-list .target-append').eq((id - countHapus)).prepend('<div class="col-md-2"><img src="' + src + '" width="100" name="data[Gambar][' + count + '][gambar]"></div><div class="col-md-4"><input class="form-control" type="text" maxlength="1000" name="data[Gambar][' + count + '][url]"></div><input type="hidden" value="' + responseJSON.src + '" name="data[Gambar][' + count + '][path]"><div class="col-md-2"><input class="form-control datepicker" type="text" maxlength="1000" name="data[Gambar][' + count + '][start_date]"></div><div class="col-md-2"><input class="form-control datepicker" type="text" maxlength="1000" name="data[Gambar][' + count + '][expired_date]"></div>');
                                            $('#buttonSubmitForm').removeAttr('disabled');
                                            $('#buttonSubmitForm').removeAttr('style');
                                            reloadDatePicker();
                                            count++;
                                        } else {
                                            setTimeout($('.qq-upload-fail').remove(), 2000);
                                        }
//                toggleCheckbox();
                                    },
                                    onRemove: function (serverIndex) {
                                        alert('File berhasil dihapus');
//                toggleCheckbox();
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
                                }
                            }

                            function hapusGambar(id, url, e) {
                                hapusDataUrl(id, url, function () {
                                    $("#photo-panel .row-remove-" + e).remove();
                                    alert('File berhasil dihapus');
                                });
                            }
                            function hapusAtribut(id, url, e) {
                                hapusDataUrl(id, url, function () {
                                    $(e).closest(".row-table").remove();
                                });
                            }

                            $(document).ready(function () {
//        toggleCheckbox();
                            })
//
//    function toggleCheckbox() {
//        $(".gallery_photo_default").on("click", function () {
//            $(".gallery_photo_default").prop("checked", false).prop("value", 0);
//            $(this).prop("checked", true).prop("value", 1).siblings().prop("value", 1);
//        })
//    }
</script>
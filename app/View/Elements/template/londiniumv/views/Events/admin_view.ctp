<?php echo $this->Form->create("Event", array("class" => "form-horizontal form-separate", "type" => "file", "action" => "view", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Lihat Event") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <div class="panel-heading" style="background:#2179cc">
                        <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Event") ?></h6>
                    </div>
                    <div class="well block">
                        <div class="tabbable">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#default-tab1" data-toggle="tab">Event Bahasa Indonesia</a></li>
                                <li><a href="#default-tab2" data-toggle="tab">Event Bahasa Inggris</a></li>
                            </ul>
                            <div class="tab-content with-padding">
                                <div class="tab-pane fade in active" id="default-tab1">
                                    <table width="100%" class="table">
                                        <tr>
                                            <td colspan="3" style="width:200px">
                                                <div class="form-group">
                                                    <?php
                                                    echo $this->Form->label("Event.title_ind", __("Event Bahasa Indonesia"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                    echo $this->Form->input("Event.title_ind", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled" => true));
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="width:200px">
                                                <div class="form-group">
                                                    <?php
                                                    echo $this->Form->label("Event.sinopsys_ind", __("Sinopsis Bahasa Indonesia"), array("class" => "col-sm-8 control-label"));
                                                    echo $this->Form->input("Event.sinopsys_ind", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix", "disabled" => true));
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="width:200px">
                                                <div class="form-group">
                                                    <?php
                                                    echo $this->Form->label("Event.content_ind", __("Konten Bahasa Indonesia"), array("class" => "col-sm-8 control-label"));
                                                    echo $this->Form->input("Event.content_ind", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix", "disabled" => true));
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
                                                    echo $this->Form->label("Event.title_en", __("Event Bahasa Inggris"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                    echo $this->Form->input("Event.title_en", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled" => true));
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="width:200px">
                                                <div class="form-group">
                                                    <?php
                                                    echo $this->Form->label("Event.sinopsys_en", __("Sinopsis Bahasa Inggris"), array("class" => "col-sm-8 control-label"));
                                                    echo $this->Form->input("Event.sinopsys_en", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix", "disabled" => true));
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="width:200px">
                                                <div class="form-group">
                                                    <?php
                                                    echo $this->Form->label("Event.content_en", __("Konten Bahasa Inggris"), array("class" => "col-sm-8 control-label"));
                                                    echo $this->Form->input("Event.content_en", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix", "disabled" => true));
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h6 class="panel-title"><i class="icon-upload"></i><?= __("Galeri Foto") ?></h6>
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
                                    <div class="col-md-4">Gambar</div>
                                    <div class="col-md-4">Deskripsi</div>
                                    <div class="col-md-4">Default</div>
                                </div>
                                <?php
                                $i = 0;
                                foreach ($this->data['EventImage'] as $eventImage) {
                                    ?>
                                    <div class="row row-table row-remove-<?php echo $i ?> qq-upload-success">
                                        <div class="col-md-4"><img src="<?php echo Router::url($eventImage['path']) ?>" width="100"></div>
                                        <div class="col-md-4"><input value="<?php echo $eventImage['description'] ?>" class="form-control" type="text" maxlength="50" name="data[EventImage][<?php echo $i ?>][description]" disabled="true"></div>
                                        <div class="col-md-4">
                                            <input <?php echo $eventImage['default_image'] ? "checked" : "" ?> value="<?php echo $eventImage['default_image'] ?>" class="gallery_photo_default" type="checkbox" name="" disabled/>
                                            <input <?php echo $eventImage['default_image'] ? "checked" : "" ?> value="<?php echo $eventImage['default_image'] ?>" class="gallery_photo_default" type="hidden" name="data[EventImage][<?php echo $i ?>][default_image]" disabled/>
                                        </div>
                                        <input type="hidden" value="<?php echo $eventImage['path'] ?>" name="data[EventImage][<?php echo $i ?>][path]">
                                        <input type="hidden" value="<?php echo $eventImage['id'] ?>" name="data[EventImage][<?php echo $i ?>][id]">
                                    </div>
                                    <?php
                                    $i++;
                                }
                                ?>
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
                                                echo $this->Form->label("Event.date", __("Event Date"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("Event.date", array("type" => "text", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control datepicker", "disabled" => true));
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php
                                                echo $this->Form->label("Event.time", __("Time Event"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("Event.time", array("type" => "text", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control spinner-time", "value" => "13:00", "disabled" => true));
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
                                                echo $this->Form->label("Event.country_id", __("Negara"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("Event.country_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "empty" => "-- Pilih Negara --", "disabled" => true));
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php
                                                echo $this->Form->label("Event.state_id", __("Provinsi"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("Event.state_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "empty" => "- Pilih Provinsi -", "disabled" => true));
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
                                                echo $this->Form->label("Event.city_id", __("Kota"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("Event.city_id", array("empty" => "- Pilih Kota -", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled" => true));
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php
                                                echo $this->Form->label("Event.event_status_id", __("Status"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("Event.event_status_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "empty" => "-- Pilih Status --", "disabled" => true));
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
                                                    <b>Sponsor</b>
                                                    <?php
                                                    for ($i = 0; $i < 9; $i++) {
                                                        echo "&nbsp; &nbsp; &nbsp;";
                                                    }

                                                    $checked = "";
                                                    if ($this->data['Event']['is_sponsor'] == 1) {
                                                        $checked = "checked";
                                                    }
                                                    ?>
                                                    <input type="checkbox" class="styled" name="data[Event][is_sponsor]" value='<?= $checked == "" ? "0" : "1" ?>' id = "eventSponsor" <?= $checked ?> disabled>
                                                    <input type="hidden" name="data[Event][is_sponsor]" value="1" id="eventSponsorHidden1" disabled>
                                                    <input type="hidden" name="data[Event][is_sponsor]" value="0" id="eventSponsorHidden2" disabled>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="width:200px">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                            $map_options = array(
                                                "id" => "map_canvas",
                                                "width" => "100%",
                                                "height" => "400px",
                                                "localize" => false,
                                                "zoom" => 10,
                                                "address" => "Indonesia, Bandung",
                                                "marker" => true,
                                                "infoWindow" => true
                                            );
                                            ?>
                                            <?= $this->GoogleMap->map($map_options); ?>
                                            <?= $this->GoogleMap->addMarker("map_canvas", 1, array("latitude" => -6.9174639, "longitude" => 107.6191228)); ?>
                                            <?= $this->GoogleMap->addMarker("map_canvas", 2, "Indonesia, Lembang");
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php
                                                echo $this->Form->label("Event.latitude", __("Latitude"), array("class" => "col-sm-3 control-label"));
                                                echo $this->Form->input("Event.latitude", array("div" => array("class" => "col-sm-3"), "label" => false, "class" => "form-control", "type" => "text", "id" => "lat", "disabled" => true));
                                                echo $this->Form->label("Event.longitude", __("Longitude"), array("class" => "col-sm-3 control-label"));
                                                echo $this->Form->input("Event.longitude", array("div" => array("class" => "col-sm-3"), "label" => false, "class" => "form-control", "type" => "text", "id" => "long", "disabled" => true));
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">

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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Form->end() ?>

<script type="text/javascript">
    window.onload = function () {
        var lat = $('#lat').val();
        var long = $('#long').val();
        var marker = new google.maps.Marker({
        });
        var mapOptions = {
            center: new google.maps.LatLng(lat, long),
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var infoWindow = new google.maps.InfoWindow();
        var latlngbounds = new google.maps.LatLngBounds();
        var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
        var position = new google.maps.LatLng(lat, long);
        marker.setPosition(position);
        marker.setMap(map);
        google.maps.event.addListener(map, 'click', function (e) {
            marker.setPosition(e.latLng);
            marker.setMap(map);
            marker.setAnimation(google.maps.Animation.DROP);
            $('#lat').val(e.latLng.lat() + "");
            $('#long').val(e.latLng.lng() + "");
        });
    }
</script>

<script src="<?php echo Router::url('/', true); ?>js/file_uploader/client/fileuploader.js" type="text/javascript"></script>
<link href="<?php echo Router::url('/', true); ?>js/file_uploader/client/fileuploader-product.css" rel="stylesheet" type="text/css">
<script>
    var count = $('#file-uploader-content-list .row').size();
    function createUploaderContentThumbnail() {
        var uploader = new qq.FileUploader({
            element: document.getElementById('file-uploader-content-button'),
            listElement: document.getElementById('file-uploader-content-list'),
            action: BASE_URL + 'admin/events/upload_image',
            allowedExtensions: ['bmp', 'jpg', 'jpeg', 'png'],
            debug: true,
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
                    $('#file-uploader-content-list .row').last().prepend('<div class="col-md-3"><img src="' + src + '" width="100"></div><div class="col-md-3"><input class="form-control" type="text" maxlength="50" name="data[EventImage][' + count + '][description]"></div><div class="col-md-3"><input value="0" class="gallery_photo_default" type="checkbox" name=""><input value="0" class="gallery_photo_default" type="hidden" name="data[EventImage][' + count + '][default_image]"></div><input type="hidden" value="' + responseJSON.src + '" name="data[EventImage][' + count + '][path]">');
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

    function hapusGambar(id, url, e) {
        hapusDataUrl(id, url, function () {
            $("#photo-panel .row-remove-" + e).remove();
        });
    }
    function hapusAtribut(id, url, e) {
        hapusDataUrl(id, url, function () {
            $(e).closest(".row-table").remove();
        });
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

<style>
    select{
        padding: 11px 50px 11px 10px;
        background: rgba(255,255,255,1);
        border-radius: 7px;
        -webkit-border-radius: 7px;
        -moz-border-radius: 7px;
        border: 0;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        color: #8ba2d4;
    }
</style>
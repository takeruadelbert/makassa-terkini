<?php echo $this->Form->create("CompanyProfile", array("type" => "file", "class" => "form-horizontal form-separate", "action" => "edit", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr">
                PROFIL
                <small class = "display-block"> </small>
            </h6>
        </div>
        <table width="100%" class="table">
            <tr>
                <td colspan="3" style="width:200px">
                    <div class = "row">
                        <div class = "col-md-6">
                            <div class="form-group">
                                <?php
                                echo $this->Form->label("CompanyProfile.company_name", __("Nama Instansi"), array("class" => "col-sm-3 col-md-4 control-label"));
                                echo $this->Form->input("CompanyProfile.company_name", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                ?>
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <?php
                                echo $this->Form->label("CompanyProfile.address", __("Alamat"), array("class" => "col-sm-3 col-md-4 control-label"));
                                echo $this->Form->input("CompanyProfile.address", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                ?>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="width:200px">
                    <div class = "row">
                        <div class = "col-md-6">
                            <div class="form-group">
                                <?php
                                echo $this->Form->label("CompanyProfile.state_id", __("Provinsi"), array("class" => "col-sm-3 col-md-4 control-label"));
                                echo $this->Form->input("CompanyProfile.state_id", array("empty" => "- Pilih Provinsi -", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control city-state", "data-city-state-target" => ".city-state-target"));
                                ?>
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <?php
                                echo $this->Form->label("CompanyProfile.city_id", __("Kota"), array("class" => "col-sm-3 col-md-4 control-label"));
                                echo $this->Form->input("CompanyProfile.city_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control city-state-target", "empty" => "- Pilih Kota -"));
                                ?>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="width:200px">
                    <div class = "row">
                        <div class = "col-md-6">
                            <div class="form-group">
                                <?php
                                echo $this->Form->label("CompanyProfile.postal_code", __("Kode Pos"), array("class" => "col-sm-3 col-md-4 control-label"));
                                echo $this->Form->input("CompanyProfile.postal_code", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                ?>
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <?php
                                echo $this->Form->label("CompanyProfile.phone", __("Telpon"), array("class" => "col-sm-3 col-md-4 control-label"));
                                echo $this->Form->input("CompanyProfile.phone", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                ?>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="width:200px">
                    <div class = "row">
                        <div class = "col-md-6">
                            <div class="form-group">
                                <?php
                                echo $this->Form->label("CompanyProfile.email", __("E-mail"), array("class" => "col-sm-3 col-md-4 control-label"));
                                echo $this->Form->input("CompanyProfile.email", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                ?>
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <?php
                                echo $this->Form->label("CompanyProfile.file_logo", __("Logo"), array("class" => "col-sm-3 col-md-4 control-label"));
                                echo $this->Form->input("CompanyProfile.file_logo", array("type" => "file", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "accept" => "image/*"));
                                ?>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="width:200px">
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-11">
                            <?php
                            $map_options = array(
                                "id" => "map_canvas",
                                "width" => "1300px",
                                "height" => "500px",
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
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php
                                echo $this->Form->label("CompanyProfile.latitude", __("Latitude"), array("class" => "col-sm-3 control-label"));
                                echo $this->Form->input("CompanyProfile.latitude", array("div" => array("class" => "col-sm-3"), "label" => false, "class" => "form-control", "type" => "text", "id" => "lat"));
                                echo $this->Form->label("CompanyProfile.longitude", __("Longitude"), array("class" => "col-sm-3 control-label"));
                                echo $this->Form->input("CompanyProfile.longitude", array("div" => array("class" => "col-sm-3"), "label" => false, "class" => "form-control", "type" => "text", "id" => "long"));
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
<?php echo $this->Form->end() ?>

<script type="text/javascript">
    window.onload = function () {
        var lat = $('#lat').val();
        var long = $('#long').val();
        var marker = new google.maps.Marker({
        });
        var mapOptions = {
            center: new google.maps.LatLng(-6.9174639, 107.6191228),
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
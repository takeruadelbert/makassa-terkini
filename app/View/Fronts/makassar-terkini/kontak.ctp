<?php
$now = new DateTime();
$data_profile = ClassRegistry::init("CompanyProfile")->find("first");
?>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="https://www.google.com/recaptcha/api.js?hl=id" async defer></script>
<script>
    function initialize() {
        var lat = <?= $data_profile['CompanyProfile']['latitude'] ?>;
        var long = <?= $data_profile['CompanyProfile']['longitude'] ?>;
        var marker = new google.maps.Marker({
        });
        var mapProp = {
            center: new google.maps.LatLng(lat, long),
            zoom: 5,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        marker.setPosition(new google.maps.LatLng(lat, long));
        marker.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<!--Content-->
<!--==================================================-->
<section class="s-main-content">
    <div class="container-fluid">
        <?= $this->element(_FRONT_TEMPLATE_DIR . "/makassar-terkini/flash/dispatcher"); ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="s-fancy-header-red">
                    <span class="s-title">Tentang Kami</span>
                </div>
                <div id="googleMap" style="width:1100px;height:287px;"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3" style="border-right: 1px solid #bfbdbd;">
                <strong style="color: #ed1b23; font-size: 18px; padding: 15px 0px; display: block;">Makassar Terkini</strong>
                <span class="clearfix"></span>                
                <ul class="list-unstyled s-kontak-left-info" style="border-top: 1px dashed #bfbdbd; padding: 15px 0px;">
                    <li>
                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/loc.png", true) ?>" class="pull-left" width="26">
                        <p style="margin-left: 40px;">
                            <?= $data_profile['CompanyProfile']['address'] ?><br/>
                            Makassar <?= $data_profile['CompanyProfile']['postal_code'] ?>
                        </p>
                    </li>
                    <li>
                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/call.png", true) ?>" class="pull-left" width="26">
                        <p style="margin-left: 40px;">
                            Telp. <?= $data_profile['CompanyProfile']['phone'] ?><br/>
                            Fax: 0411 871983
                        </p>
                    </li>
                    <li>
                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/mail.png", true) ?>" class="pull-left" width="26">
                        <p style="margin-left: 40px;">
                            <?= $data_profile['CompanyProfile']['email'] ?>
                        </p>
                    </li>
                    <li>
                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/fb2.png", true) ?>" class="pull-left"width="26">
                        <p style="margin-left: 40px;">
                            Makassar Terkini
                        </p>
                    </li>
                    <li>
                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/twitter.png", true) ?>" class="pull-left"width="26">
                        <p style="margin-left: 40px;">
                            @makassarterkini
                        </p>
                    </li>
                </ul>
            </div>
            <div class="col-sm-8" style="padding: 15px;">
                <?php
                echo $this->Form->create('', array('type' => 'post'));
                ?>
                <div class="col-md-6" style="padding-left: 15px; padding-right: 15px;">
                    <div class="form-group">
                        <label>Nama Anda*</label>
                        <input type="text" name="nama" class="form-control no-border-radius" id="" placeholder="" style="background: #f3f3f3;" required>
                    </div>
                </div>
                <div class="col-md-6" style="padding-left: 15px; padding-right: 15px;">
                    <div class="form-group">
                        <label>Email Anda*</label>
                        <input type="email" name="email" class="form-control no-border-radius" id="" placeholder="" style="background: #f3f3f3;" required>
                    </div>
                </div>
                <span class="clearfix"></span>
                <div class="col-md-12" style="padding-left: 15px; padding-right: 15px;">
                    <div class="form-group">
                        <label>Judul pesan*</label>
                        <input type="text" name="judul" class="form-control no-border-radius" id="" placeholder="" style="background: #f3f3f3;" required>
                    </div>
                </div>
                <span class="clearfix"></span>
                <div class="col-md-12" style="padding-left: 15px; padding-right: 15px;">
                    <div class="form-group">
                        <label>Isi pesan*</label>
                        <textarea class="form-control no-border-radius" name="isi" style="background: #f3f3f3;" rows="7" required></textarea>
                    </div>
                </div>
                <div class="col-md-12" style="padding-left: 15px; padding-right: 15px;">
                    <!--<iframe class="pull-left" src="https://www.google.com/recaptcha/api2/anchor?k=6Le-wvkSAAAAAPBMRTvw0Q4Muexq9bi0DJwx_mJ-&amp;co=aHR0cHM6Ly93d3cuZ29vZ2xlLmNvbTo0NDM.&amp;hl=en&amp;v=r20160516082654&amp;size=normal&amp;cb=6kfaogej01f2" title="recaptcha widget" width="304" height="78" role="presentation" frameborder="0" scrolling="no" name="undefined"></iframe>-->
                    <div class="g-recaptcha pull-left" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" data-type="image"></div> <br>
                    <button type="submit" class="pull-left btn btn-info" style="margin-left: 15px;">Submit</button>
                </div>
                <?php
                $this->Form->end();
                ?>
            </div>
        </div>
    </div>

    <!-- Adv Middle Top -->
    <!--==================================================-->
    <?php
    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 1,"idx"=>1]);
    ?>
</section>

<style type="text/css">
    #chartdiv {
        width       : 100%;
        height      : 500px;
        font-size   : 11px;
    }
</style>
<!--<script type="text/javascript">
    var chart = AmCharts.makeChart( "chartdiv", {
      "type": "pie",
      "theme": "light",
      "dataProvider": [ {
        "country": "Lithuania",
        "litres": 501.9
    }, {
        "country": "Czech Republic",
        "litres": 301.9
    }, {
        "country": "Ireland",
        "litres": 201.1
    }, {
        "country": "Germany",
        "litres": 165.8
    }, {
        "country": "Australia",
        "litres": 139.9
    }, {
        "country": "Austria",
        "litres": 128.3
    }, {
        "country": "UK",
        "litres": 99
    }, {
        "country": "Belgium",
        "litres": 60
    }, {
        "country": "The Netherlands",
        "litres": 50
    } ],
    "valueField": "litres",
    "titleField": "country",
    "balloon":{
     "fixedPosition":true
     },
     "export": {
        "enabled": true
    }
} );
</script>-->
